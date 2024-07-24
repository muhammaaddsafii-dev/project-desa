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
                            <a class="dropdown-item" href="/peta-kependudukan">Peta Kependudukan</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/peta-sarana-prasarana">Peta Sarana Prasarana</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/peta-kondisi-jalan">Peta Kondisi Jalan</a>
                        </li>
                    </ul>
                </div>
                <!-- <nav class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
                href="#"
                role="button"
                aria-expanded="false"
                style="font-size: 14px; margin-top: 10px"
                >Kategori Peta</a
              >
              <ul class="dropdown-menu" style="font-size: 14px">
                <li><a class="dropdown-item" href="#">Peta 1</a></li>
                <li><a class="dropdown-item" href="#">Peta 2</a></li>
                <li><a class="dropdown-item" href="#">Peta 3</a></li>
              </ul>
            </nav> -->
            </div>
        </div>
        <!-- End Page Title -->
    </main>

    <div id="map"></div>
    <script>
        var icons = {
            rumah: L.icon({
                iconUrl: "assets/img/legend/home.png",
                iconSize: [15, 15],
            }),
            jalan: L.icon({
                iconUrl: "assets/img/legend/jalanlokal.png",
                iconSize: [22, 22],
            }),
            sungai: L.icon({
                iconUrl: "assets/img/legend/sungai.png",
                iconSize: [22, 22],
            }),
            drainase: L.icon({
                iconUrl: "assets/img/legend/drainase.png",
                iconSize: [22, 22],
            }),
            batasadmin: L.icon({
                iconUrl: "assets/img/legend/batasadmin.png",
                iconSize: [22, 22],
            }),
            batastanahdesa: L.icon({
                iconUrl: "assets/img/legend/batastanahdesa.png",
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
                "<h4>PETA KEPENDUDUKAN DESA KEMASAN</h4>DIBUAT: GEOCIRCLE INDONESIA";
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

        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/penduduk.geojson", function(data) {
            rumah.addData(data);
            map.addLayer(rumah);
        });
        // Deklarasi variabel rumah
        var rumah = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                var icon = icons.rumah; // Sesuaikan dengan tipe ikon yang diinginkan
                return L.marker(latlng, {
                    icon: icon
                });
            },
            onEachFeature: function(feature, layer) {
                var content = "Pemilik Rumah : " + feature.properties.Nama_Kepal;

                layer.on({
                    click: function(e) {
                        layer.bindPopup(content).openPopup();
                    },
                });
            },
        });

        /* memanggil data file geojson line */
        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/jalan.geojson", function(data) {
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

            onEachFeature: function(feature, layer) {
                layer.on({
                    click: function(e) {
                        //Fungsi ketika icon simbol di-klik
                        jalan.bindPopup(content);
                    },

                    mouseover: function(e) {
                        jalan.bindTooltip(feature.properties.KETERANGAN);
                    },

                    //mouseout: function (e) {
                    //fasum.closePopup();
                    //},
                });
            },
        });

        // Memuat data GeoJSON
        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/perairan.geojson", function(data) {
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
                    click: function(e) {
                        layer.bindPopup(feature.properties.JENIS);
                    },
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
        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/tanah_desa.geojson", function(data) {
            TanahDesa.addData(data);
            map.addLayer(TanahDesa);
        });
        //Deklarasi variabel batas admin
        var TanahDesa = L.geoJSON(null, {
            style: function(feature) {
                return {
                    pane: "pane_tanahdesa",
                    weight: 2.0,
                    opacity: 0.5,
                    color: "orange",
                };
            },
            onEachFeature: function(feature, layer) {
                var content =
                    "NIK: " +
                    feature.properties.NIK +
                    "<br>" +
                    "Alamat OBJP: " +
                    feature.properties.ALMAT_OBJP +
                    "<br>" +
                    "Luas (m2): " +
                    feature.properties.LUAS +
                    "<br>";

                layer.on({
                    click: function(e) {
                        //Fungsi ketika obyek di klik}
                        TanahDesa.bindPopup(content);
                    },
                    mouseover: function(e) {
                        //Fungsi mouse berada di atas objek untuk highlight
                        var TanahDesa = e.target; //variabel layer}
                        TanahDesa.setStyle({
                            //Highlight style
                            color: "red", //Warna garis tepi polygon
                            weight: 0.2, //Tebal garis tepi polygon
                            opacity: 1, //Transparansi garis tepi polygon
                            fillColor: "#62f71b", //Warna tengah polygon
                            fillOpacity: 0.4, //Transparansi polygon
                        });
                        TanahDesa.bindTooltip(feature.properties.NAMA_WP);
                    },
                    mouseout: function(e) {
                        //Fungsi mouse keluar dari obyek
                        TanahDesa.resetStyle(e.target); //Mengembalikan style garis ke style awal
                        map.closePopup(); //Menutup popup
                    },
                });
            },
        });
        /* memanggil data file geojson area */
        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/batas_admin.geojson", function(data) {
            BatasDukuh.addData(data);
            map.addLayer(BatasDukuh);
            //map.fitBounds(fasum.getBounds());
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
                    "Dukuh: " +
                    feature.properties.DUKUH +
                    "<br>" +
                    "RT: " +
                    feature.properties.RT +
                    "<br>" +
                    "RW: " +
                    feature.properties.RW +
                    "<br>" +
                    "Ketua RT: " +
                    feature.properties.KETUA_RT +
                    "<br>";

                layer.on({
                    click: function(e) {
                        //Fungsi ketika obyek di klik}
                        BatasDukuh.bindPopup(content);
                    },
                    mouseover: function(e) {
                        //Fungsi mouse berada di atas objek untuk highlight
                        var BatasDukuh = e.target; //variabel layer}
                        BatasDukuh.setStyle({
                            //Highlight style
                            color: "grey", //Warna garis tepi polygon
                            weight: 0.2, //Tebal garis tepi polygon
                            opacity: 1, //Transparansi garis tepi polygon
                            fillColor: "#beeff6", //Warna tengah polygon
                            fillOpacity: 0.4, //Transparansi polygon
                        });
                        BatasDukuh.bindTooltip(feature.properties.DUKUH);
                    },
                    mouseout: function(e) {
                        //Fungsi mouse keluar dari obyek
                        BatasDukuh.resetStyle(e.target); //Mengembalikan style garis ke style awal
                        map.closePopup(); //Menutup popup
                    },
                });
            },
        });
        map.createPane("pane_jalan");
        map.getPane("pane_jalan").style.zIndex = 404;
        map.getPane("pane_jalan").style["mix-blend-mode"] = "normal";

        map.createPane("pane_sungai");
        map.getPane("pane_sungai").style.zIndex = 403;
        map.getPane("pane_sungai").style["mix-blend-mode"] = "normal";

        map.createPane("pane_irigasi");
        map.getPane("pane_irigasi").style.zIndex = 402;
        map.getPane("pane_irigasi").style["mix-blend-mode"] = "normal";

        map.createPane("pane_batasdukuh");
        map.getPane("pane_batasdukuh").style.zIndex = 401;
        map.getPane("pane_batasdukuh").style["mix-blend-mode"] = "normal";

        map.createPane("pane_tanahdesa");
        map.getPane("pane_tanahdesa").style.zIndex = 400;
        map.getPane("pane_tanahdesa").style["mix-blend-mode"] = "normal";

        // Fungsi untuk membuat label dengan ikon
        var createLayerLabel = (icon, label) =>
            `<img src="${icon.options.iconUrl}" width="20" height="20"> ${label}`;

        var addGroupedLayerControl = (layers) => {
            var groupedOverlays = {
                Kependudukan: {
                    [createLayerLabel(icons.rumah, "Rumah Penduduk")]: layers.rumah,
                },
                "Jaringan Jalan": {
                    [createLayerLabel(icons.jalan, "Jalan")]: layers.jalan,
                },
                "Jaringan Air": {
                    [createLayerLabel(icons.sungai, "Sungai")]: layers.sungai,
                    [createLayerLabel(icons.drainase, "Irigasi")]: layers.irigasi,
                },
                "Tanah Desa": {
                    [createLayerLabel(icons.batastanahdesa, "Tanah Desa")]: layers.tanahdesa,
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
            rumah: rumah,
            jalan: jalan,
            sungai: sungaiLayer,
            irigasi: irigasiLayer,
            tanahdesa: TanahDesa,
            batasdukuh: BatasDukuh,
        };

        addGroupedLayerControl(layers);

        var controlSearch = new L.Control.Search({
            position: "topleft",
            textPlaceholder: "Cari Rumah...",
            layer: rumah,
            initial: false,
            zoom: 20,
            marker: {
                circle: {
                    radius: 10, // Sesuaikan ukuran radius lingkaran
                    color: "red", // Warna lingkaran
                    opacity: 0.5, // Opasitas lingkaran
                },
            },
            propertyName: "Nama_Kepal", // Pastikan nama field yang sesuai untuk pencarian
        });

        map.addControl(controlSearch);

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
