@extends('application.layouts.master')

@section('content')
<main class="main">
    <!-- Page Title -->
    <div class="page-title" data-aos="fade" style="background-color: #effdff; padding: 12px">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="#">Data Desa</a></li>
                    <li class="current">Geospasial</li>
                </ol>
            </nav>

            <div class="btn-group">
                <button type="button" class="btn btn-getstarted btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false" style="font-size: 14px; margin-top: 10px">
                    Kategori Peta
                </button>
                <ul class="dropdown-menu" style="font-size: 14px">
                    <li>
                        <a class="dropdown-item" href="/peta-kependudukan-admin">Peta Kependudukan</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/peta-sarana-prasarana-admin">Peta Sarana Prasarana</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/peta-kondisi-jalan-admin">Peta Kondisi Jalan</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
</main>

<div id="map"></div>
<script>
    var icons = {
            baik: L.icon({
                iconUrl: "{{ 'assets/map-assets/WebGIS/assets/img/legend/jalan_baik.png' }}",
                iconSize: [22, 22],
            }),
            cukup: L.icon({
                iconUrl: "{{ 'assets/map-assets/WebGIS/assets/img/legend/jalan_cukupbaik.png' }}",
                iconSize: [22, 22],
            }),
            kurang: L.icon({
                iconUrl: "{{ 'assets/map-assets/WebGIS/assets/img/legend/jalan_kurangbaik.png' }}",
                iconSize: [22, 22],
            }),
            tidak: L.icon({
                iconUrl: "{{ 'assets/map-assets/WebGIS/assets/img/legend/jalan_tidakbaik.png' }}",
                iconSize: [22, 22],
            }),
            jalan: L.icon({
                iconUrl: "{{ 'assets/map-assets/WebGIS/assets/img/legend/jalanlokal.png' }}",
                iconSize: [22, 22],
            }),
            sungai: L.icon({
                iconUrl: "{{ 'assets/map-assets/WebGIS/assets/img/legend/sungai.png' }}",
                iconSize: [22, 22],
            }),
            drainase: L.icon({
                iconUrl: "{{ 'assets/map-assets/WebGIS/assets/img/legend/drainase.png' }}",
                iconSize: [22, 22],
            }),
            batasadmin: L.icon({
                iconUrl: "{{ 'assets/map-assets/WebGIS/assets/img/legend/batasadmin.png' }}",
                iconSize: [22, 22],
            }),
            batastanahdesa: L.icon({
                iconUrl: "{{ 'assets/map-assets/WebGIS/assets/img/legend/batastanahdesa.png' }}",
                iconSize: [22, 22],
            }),
        };
        /* Initial Map */
        var map = L.map("map", {
            zoomControl: false,
            maxZoom: 30,
            minZoom: 1,
        }).setView([-7.5752, 110.68339], 16);
        /* Judul dan Subjudul */
        var title = new L.Control();
        title.onAdd = function(map) {
            this._div = L.DomUtil.create("div", "info");
            this.update();
            return this._div;
        };
        title.update = function() {
            this._div.innerHTML =
                "<h4>PETA KONDISI JALAN DESA KEMASAN</h4>DIBUAT: GEOCIRCLE INDONESIA";
        };
        title.addTo(map);

        var zoomBar = L.easyBar([
            L.easyButton("<big>+</big>", function(control, map) {
                map.setZoom(map.getZoom() + 1);
            }),
            L.easyButton("fa-home fa-lg", function(control, map) {
                map.fitBounds(BatasDukuh.getBounds());
            }),
            L.easyButton("<big>-</big>", function(control, map) {
                map.setZoom(map.getZoom() - 1);
            }),
        ]);
        zoomBar.addTo(map);

        /* Geolocation Plugin  */
        var locateControl = L.control
            .locate({
                position: "topleft",
                drawCircle: true,
                follow: true,
                setView: true,
                keepCurrentZoomLevel: false,
                markerStyle: {
                    weight: 1,
                    opacity: 0.8,
                    fillOpacity: 0.8,
                },
                circleStyle: {
                    weight: 1,
                    clickable: false,
                },
                icon: "fas fa-map-marker-alt",
                metric: true,
                strings: {
                    title: "Cari Lokasimu...",
                    popoup: "You're here. Accuracy {distance} {unit}",
                    outsideMapBoundsMsg: "Not Available",
                },
                locateOptions: {
                    maxZoom: 16,
                    watch: true,
                    enableHighAccuracy: true,
                    maximumAge: 10000,
                    timeout: 10000,
                },
            })
            .addTo(map);

        /* Tile Basemap */
        var basemapLayers = {
            //Basemap: OpenStreetMap
            OSM: L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                subdomains: ["a", "b", "c"],
                minZoom: 0,
                maxZoom: 30,
            }),
            //Basemap: GoogleMaps
            GoogleMaps: L.tileLayer(
                "https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}", {
                    minZoom: 0,
                    maxZoom: 30,
                }
            ),
        };

        map.addLayer(basemapLayers.OSM);

        var basemapLayersCopy = {
            //Basemap: OpenStreetMap
            OSM: L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                subdomains: ["a", "b", "c"],
                minZoom: 0,
                maxZoom: 13,
            }),

            //Basemap: GoogleMaps
            GoogleMaps: L.tileLayer(
                "https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}", {
                    minZoom: 0,
                    maxZoom: 13,
                }
            ),
        };

        var kondisijalanGroups = {
            baik: L.featureGroup().addTo(map),
            cukup: L.featureGroup().addTo(map),
            kurang: L.featureGroup().addTo(map),
            tidak: L.featureGroup().addTo(map),
        };

        var kondisijalan = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                var icon;
                if (feature.properties["Kondisi Jalan"] === "Baik") {
                    icon = icons.baik;
                } else if (feature.properties["Kondisi Jalan"] === "Cukup Baik") {
                    icon = icons.cukup;
                } else if (feature.properties["Kondisi Jalan"] === "Kurang Baik") {
                    icon = icons.kurang;
                } else {
                    icon = icons.tidak;
                }


                return L.marker(latlng, {
                    icon: icon
                });
            },
            onEachFeature: function(feature, layer) {
                var content = "";

                // Menambahkan gambar jika tersedia
                if (feature.properties["Gambar"]) {
                    content +=
                        "<div style='margin-top: 10px; margin-bottom: 10px;'>" +
                        "<img src='" +
                        feature.properties["Gambar"] +
                        "' alt='Gambar Kondisi Jalan' style='max-width:100%; max-height:200px; display: block; margin: 0 auto;'>" +
                        "</div>";
                }

                content +=
                    "<div class='my-2'>" +
                    "<table class='table table-bordered'>" +
                    "<tr><th>Nama Jalan</th><td>" +
                    feature.properties["Nama Jalan"] +
                    "</td></tr>" +
                    "<tr><th>Perkerasan</th><td>" +
                    feature.properties["Perkerasan"] +
                    "</td></tr>" +
                    "<tr><th>Kondisi Jalan</th><td>" +
                    feature.properties["Kondisi Jalan"] +
                    "</td></tr>" +
                    "</table>" +
                    "</div>";
                layer.bindPopup(content, {
                    maxWidth: 300 // Atur lebar maksimum popup
                });

                layer.on({
                    click: function(e) {
                        layer.bindPopup(content).openPopup(); // Gunakan layer, bukan BatasKec
                    },
                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties["Nama Jalan"], {
                            direction: "center"
                        }).openTooltip();
                    },
                    mouseout: function(e) {
                        kondisijalan.resetStyle(layer); // Mengembalikan style layer ke style awal
                        layer.closeTooltip(); // Menutup tooltip saat mouse keluar dari layer
                    },
                });
                 // Menentukan grup dan menambahkan layer
                if (feature.properties["Kondisi Jalan"] === "Baik") {
                    kondisijalanGroups.baik.addLayer(layer);
                } else if (feature.properties["Kondisi Jalan"] === "Cukup Baik") {
                    kondisijalanGroups.cukup.addLayer(layer);
                } else if (feature.properties["Kondisi Jalan"] === "Kurang Baik") {
                    kondisijalanGroups.kurang.addLayer(layer);
                } else {
                    kondisijalanGroups.tidak.addLayer(layer);
                }
            }
        });

        @foreach ($kondisijalans as $item)
            var feature = {
                "type": "Feature",
                "properties": {
                    "Nama Jalan": "{{ $item->Name }}",
                    "Perkerasan": "{{ $item->PERKERASAN }}",
                    "Kondisi Jalan": "{{ $item->KONDISI }}",
                    "Gambar": "https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $item->FOTO }}"
                    // Tambahkan properti lain yang Anda inginkan di sini
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [{{ $item->longitude }}, {{ $item->latitude }}]
                }
            };
            kondisijalan.addData(feature);
        @endforeach

        map.addLayer(kondisijalan);


        /* memanggil data file geojson line */
        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/jalan.geojson", function(
            data) {
            jalan.addData(data);
            map.addLayer(jalan);
        });

        //Menampilkan Data Garis
        var jalan = L.geoJson(null, {
            style: function(feature) {
                if (feature.properties.KETERANGAN == "Jalan") {
                    return {
                        pane: "pane_jalan",
                        opacity: 1,
                        color: "red",
                        weight: 2.0,
                    };
                }
            },
        });

        // Memuat data GeoJSON
        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/perairan.geojson",
            function(data) {
                jaringanAir.addData(data);
            });

        // Buat dua feature group untuk sungai dan irigasi
        var sungaiLayer = L.featureGroup().addTo(map);
        var irigasiLayer = L.featureGroup().addTo(map);

        // Pisahkan data jaringan air berdasarkan jenis
        var jaringanAir = L.geoJson(null, {
            style: function(feature) {
                if (feature.properties.JENIS === "Sungai") {
                    return {
                        color: "#38a9eb",
                        weight: 2.0,
                        pane: "pane_sungai",
                    };
                } else if (feature.properties.JENIS === "Irigasi") {
                    return {
                        color: "#33efc0",
                        weight: 1.0,
                        pane: "pane_irigasi",
                    };
                }
            },
            onEachFeature: function(feature, layer) {
                layer.on({
                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties.JENIS);
                    },
                });

                // Menambahkan layer ke feature group yang sesuai
                if (feature.properties.JENIS === "Sungai") {
                    sungaiLayer.addLayer(layer);
                } else if (feature.properties.JENIS === "Irigasi") {
                    irigasiLayer.addLayer(layer);
                }
            },
        });

        /* memanggil data file geojson area */
        $.getJSON(
            "https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/batas_admin.geojson",
            function(data) {
                BatasDukuh.addData(data);
                map.addLayer(BatasDukuh);
            });
        //Deklarasi variabel batas admin
        var BatasDukuh = L.geoJSON(null, {
            style: function(feature) {
                return {
                    pane: "pane_batasdukuh",
                    weight: 2.0,
                    opacity: 0.5,
                    color: "black",
                    fillColor: "#b3b9ba",
                    dashArray: "10,5,1,5,1,5",
                    lineCap: "butt",
                    lineJoin: "miter",
                };
            },
            onEachFeature: function(feature, layer) {
                var content =
                    "<div class='my-2'>" +
                    "<table class='table table-bordered'>" +
                    "<tr><th>Dukuh</th><td>" +
                    feature.properties.DUKUH +
                    "</td></tr>" +
                    "<tr><th>RT</th><td>" +
                    feature.properties.RT +
                    "</td></tr>" +
                    "<tr><th>RW</th><td>" +
                    feature.properties.RW +
                    "</td></tr>" +
                    "<tr><th>Ketua RT</th><td>" +
                    feature.properties.KETUA_RT +
                    "</td></tr>" +
                    "</table>" +
                    "</div>";

                layer.on({
                    click: function(e) {
                        layer.bindPopup(content).openPopup(); // Gunakan layer, bukan BatasKec
                    },
                    mouseover: function(e) {
                        const targetLayer = e.target; // Ambil layer target
                        targetLayer.setStyle({
                            //Highlight style
                            color: "grey", //Warna garis tepi polygon
                            weight: 0.2, //Tebal garis tepi polygon
                            opacity: 1, //Transparansi garis tepi polygon
                            fillColor: "#beeff6", //Warna tengah polygon
                            fillOpacity: 0.4, //Transparansi polygon
                        });
                        targetLayer
                            .bindTooltip(feature.properties.DUKUH, {
                                direction: "center"
                            })
                            .openTooltip();
                    },
                    mouseout: function(e) {
                        const targetLayer = e.target;
                        BatasDukuh.resetStyle(
                            targetLayer); // Mengembalikan style layer ke style awal
                        targetLayer.closeTooltip(); // Menutup tooltip saat mouse keluar dari layer
                    },
                });

            },
        });

        map.createPane("pane_jalan");
        map.getPane("pane_jalan").style.zIndex = 404;
        map.getPane("pane_jalan").style[
            "mix-blend-mode"] = "normal";

        map.createPane("pane_sungai");
        map.getPane("pane_sungai").style.zIndex = 403;
        map.getPane("pane_sungai")
            .style["mix-blend-mode"] = "normal";

        map.createPane("pane_irigasi");
        map.getPane("pane_irigasi").style.zIndex = 402;
        map.getPane("pane_irigasi")
            .style["mix-blend-mode"] = "normal";

        map.createPane("pane_batasdukuh");
        map.getPane("pane_batasdukuh").style.zIndex = 401;
        map.getPane(
            "pane_batasdukuh").style["mix-blend-mode"] = "normal";

        
        // Fungsi untuk membuat label dengan ikon
        var createLayerLabel = (icon, label) =>
            `<img src="${icon.options.iconUrl}" width="20" height="20"> ${label}`;

        var addGroupedLayerControl = (layers) => {
            var groupedOverlays = {
                "Kondisi Jalan": {
                    [createLayerLabel(icons.baik, "Baik")]: layers.baik,
                    [createLayerLabel(icons.cukup, "Cukup Baik")]: layers.cukup,
                    [createLayerLabel(icons.kurang, "Kurang Baik")]: layers.kurang,
                    [createLayerLabel(icons.tidak, "Tidak Baik")]: layers.tidak,
                },
                "Jaringan Jalan": {
                    [createLayerLabel(icons.jalan, "Jalan")]: layers.jalan,
                },
                "Jaringan Air": {
                    [createLayerLabel(icons.sungai, "Sungai")]: layers.sungai,
                    [createLayerLabel(icons.drainase, "Irigasi")]: layers.irigasi,
                },
                "Batas Dukuh": {
                    [createLayerLabel(icons.batasadmin, "Batas Dukuh")]: layers.batasdukuh,
                },
            };

            L.control
                .groupedLayers(basemapLayers, groupedOverlays, {
                    collapsed: true
                })
                .addTo(map);
        };

        var layers = {
            baik: kondisijalanGroups.baik,
            cukup: kondisijalanGroups.cukup,
            kurang: kondisijalanGroups.kurang,
            tidak: kondisijalanGroups.tidak,
            jalan: jalan,
            sungai: sungaiLayer,
            irigasi: irigasiLayer,
            batasdukuh: BatasDukuh,
        };


        addGroupedLayerControl(layers);

        L.control
            .search({
                layer: kondisijalan,
                textPlaceholder: "Cari Nama Jalan...",
                initial: false,
                zoom: 20,
                propertyName: "Nama Jalan",
                buildTip: function(text, val) {
                    var type = val.layer.feature.properties["Kondisi Jalan"];
                    return (
                        '<a href="#" class="' +
                        type +
                        '">' +
                        text +
                        "<b>" +
                        type +
                        "</b></a>"
                    );
                },
            })
            .addTo(map);

        L.control
            .browserPrint({
                closePopupsOnPrint: false,
                printModes: [
                    L.control.browserPrint.mode.landscape("Tabloid", "Tabloid"),
                    L.control.browserPrint.mode.landscape(),
                    L.control.browserPrint.mode.portrait(),
                    L.control.browserPrint.mode.auto("Auto", "A4"),
                    L.control.browserPrint.mode.custom("Pilih Area", "A4"),
                ],
            })
            .addTo(map);

        /* Scale Bar */
        L.control
            .scale({
                maxWidth: 150,
                position: "bottomright",
            })
            .addTo(map);
        /* Scale Factor Plugin */
        L.control
            .scalefactor({
                maxWidth: 250,
                position: "bottomright",
            })
            .addTo(map);

        // Coordinate Position Plugin
        L.control
            .mousePosition({
                maxWidth: 150,
                position: "bottomright",
            })
            .addTo(map);

        var rect1 = {
            color: "#ff1100",
            weight: 2,
        };
        var rect2 = {
            color: "#0000AA",
            weight: 1,
            opacity: 0,
            fillOpacity: 0,
        };
        var miniMap = new L.Control.MiniMap(basemapLayersCopy.OSM, {
            width: 100,
            height: 100,
            toggleDisplay: true,
            aimingRectOptions: rect1,
            shadowRectOptions: rect2,
        }).addTo(map);

        map.on("baselayerchange", function(e) {
            miniMap.changeLayer(basemapLayersCopy[e.name]);
        });
</script>
@endsection