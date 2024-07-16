@extends('application.layouts.master')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h3 class="mb-2 mb-lg-0"><b>PETA DESA</b></h3>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Geospasial</a></li>
                        <li class="current">Peta Kependudukan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->
    </main>

    <div class="btn-group dropup" id="legenda">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
            aria-expanded="false" style="font-size: small">
            Legenda
        </button>
        <div class="dropdown-menu scrollable-menu" style="font-size: small" aria-labelledby="dropdownMenuButton">
            <span class="badge bg-success" style="margin-left: 9px; font-size: small">Fasilitas Umum</span>
            <a class="dropdown-item"><img src="{{'assets/assets-map/img/legend/kantorpemerintah.png'}}" height="18" width="18" />
                Fasilitas Sosial</a>
            <a class="dropdown-item"><img src="{{'assets/assets-map/img/legend/industri.png'}}" height="18" width="18" />
                Perkantoran</a>
            <a class="dropdown-item"><img src="{{'assets/assets-map/img/legend/pendidikan.png'}}" height="18" width="18" />
                Pendidikan</a>
            <a class="dropdown-item"><img src="{{'assets/assets-map/img/legend/pdj.png'}}" height="18" width="18" />
                Perdagangan dan Jasa</a>
            <a class="dropdown-item"><img src="{{'assets/assets-map/img/legend/masjid.png'}}" height="18" width="18" />
                Peribadatan</a>

            <a class="dropdown-item"><img src="{{'assets/assets-map/img/legend/makam.png'}}" height="18" width="18" />
                Makam</a>
            <span class="badge bg-success"
                style="
                margin-left: 9px;
                font-size: small;
                margin-bottom: 6px;
                margin-top: 6px;
              ">Jaringan
                Jalan</span>
            <a class="dropdown-item"><img src="{{'assets/assets-map/img/legend/jalanlokal.png'}}" height="18" width="18" />
                Jalan Lokal</a>
            <span class="badge bg-success"
                style="
                margin-left: 9px;
                font-size: small;
                margin-bottom: 6px;
                margin-top: 6px;
              ">Perairan</span>
            <a class="dropdown-item"><img src="{{'assets/assets-map/img/legend/sungai.png'}}" height="18" width="18" />
                Sungai</a>
            <a class="dropdown-item"><img src="{{'assets/assets-map/img/legend/drainase.png'}}" height="18" width="18" />
                Irigasi</a>
            <span class="badge bg-success"
                style="
                margin-left: 9px;
                font-size: small;
                margin-bottom: 6px;
                margin-top: 6px;
              ">Batas
                Administrasi</span>
            <a class="dropdown-item"><img src="{{'assets/assets-map/img/legend/batasadmin.png'}}" height="18" width="18" />
                Batas Padukuhan</a>
        </div>
    </div>

    <div id="map"></div>
    <script>
        /* Initial Map */
        var map = L.map("map", {
            zoomControl: false,
            maxZoom: 30,
            minZoom: 1,
        }).setView([-7.5752, 110.68339], 15);
        /* Judul dan Subjudul */
        var title = new L.Control();
        title.onAdd = function(map) {
            this._div = L.DomUtil.create("div", "info");
            this.update();
            return this._div;
        };
        title.update = function() {
            this._div.innerHTML =
                "<h4>PETA SARANA PRASARANA DESA KEMASAN</h4>DIBUAT: GEOCIRCLE INDONESIA";
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
            layer_OSM: L.tileLayer(
                "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                    subdomains: ["a", "b", "c"],
                    minZoom: 0,
                    maxZoom: 30,
                }
            ),
            //Basemap: GoogleMaps
            layer_GoogleMaps: L.tileLayer(
                "https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}", {
                    minZoom: 0,
                    maxZoom: 30,
                }
            ),
        };

        map.addLayer(basemapLayers.layer_GoogleMaps);

        var basemapLayersCopy = {
            //Basemap: OpenStreetMap
            layer_OSM: L.tileLayer(
                "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                    subdomains: ["a", "b", "c"],
                    minZoom: 0,
                    maxZoom: 13,
                }
            ),

            //Basemap: GoogleMaps
            layer_GoogleMaps: L.tileLayer(
                "https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}", {
                    minZoom: 0,
                    maxZoom: 13,
                }
            ),
        };
        /* memanggil data file geojson point */
        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/fasum.geojson", function(data) {
            fasum.addData(data);
            map.addLayer(fasum);
            //map.fitBounds(fasum.getBounds());
        });
        //Mengatur Simbol Titik
        function FasumSimbologi(JENIS) {
            if (JENIS == "Fasilitas Sosial") {
                return "{{'assets/assets-map/img/legend/kantorpemerintah.png'}}";
            } else if (JENIS == "Perkantoran") {
                return "{{'assets/assets-map/img/legend/industri.png'}}";
            } else if (JENIS == "Ruang Terbuka Hijau") {
                return "{{'assets/assets-map/img/legend/makam.png'}}";
            } else if (JENIS == "Pendidikan") {
                return "{{'assets/assets-map/img/legend/pendidikan.png'}}";
            } else if (JENIS == "Perdagangan dan Jasa") {
                return "{{'assets/assets-map/img/legend/pdj.png'}}";
            } else {
                return "{{'assets/assets-map/img/legend/masjid.png'}}";
            }
        }
        //Menampilkan Data Titik
        var fasum = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                var smallIcon = new L.Icon({
                    pane: "pane_fasum",
                    iconSize: [30, 30],
                    iconAnchor: [13, 27],
                    popupAnchor: [1, -24],
                    iconUrl: FasumSimbologi(feature.properties.JENIS.toString()),
                });
                return L.marker(latlng, {
                    icon: smallIcon,
                });
            },
            onEachFeature: function(feature, layer) {
                /* Variable content untuk memanggil atribut dari data file geojson */
                var content =
                    "Jenis Fasum : " +
                    feature.properties.JENIS +
                    "<br>" +
                    "Nama Fasum : " +
                    feature.properties.TOPONIM +
                    "<br>";

                layer.on({
                    click: function(e) {
                        //Fungsi ketika icon simbol di-klik
                        fasum.bindPopup(content);
                    },

                    mouseover: function(e) {
                        fasum.bindTooltip(feature.properties.JENIS);
                    },

                    //mouseout: function (e) {
                    //fasum.closePopup();
                    //},
                });
            },
        });
        /* memanggil data file geojson line */
        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/jalan.geojson", function(data) {
            jalan.addData(data);
            map.addLayer(jalan);
            //map.fitBounds(fasum.getBounds());
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

        /* memanggil data file geojson line */
        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/perairan.geojson", function(data) {
            perairan.addData(data);
            map.addLayer(perairan);
            //map.fitBounds(fasum.getBounds());
        });

        //Menampilkan Data Garis
        var perairan = L.geoJson(null, {
            style: function(feature) {
                if (feature.properties.JENIS == "Sungai") {
                    return {
                        pane: "pane_perairan",
                        opacity: 1,
                        color: "#38a9eb",
                        weight: 2.0,
                    };
                }
                if (feature.properties.JENIS == "Irigasi") {
                    return {
                        pane: "pane_perairan",
                        opacity: 1,
                        color: "#33efc0",
                        weight: 1.0,
                    };
                }
            },

            onEachFeature: function(feature, layer) {
                layer.on({
                    click: function(e) {
                        //Fungsi ketika icon simbol di-klik
                        perairan.bindPopup(content);
                    },

                    mouseover: function(e) {
                        perairan.bindTooltip(feature.properties.JENIS);
                    },

                    //mouseout: function (e) {
                    //fasum.closePopup();
                    //},
                });
            },
        });
        /* memanggil data file geojson area */
        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/tanah_desa.geojson", function(data) {
            TanahDesa.addData(data);
            map.addLayer(TanahDesa);
            //map.fitBounds(fasum.getBounds());
        });
        //Deklarasi variabel batas admin
        var TanahDesa = L.geoJSON(null, {
            style: function(feature) {
                return {
                    pane: "pane_tanahdesa",
                    weight: 2.0,
                    opacity: 0.5,
                    color: "red",
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
                    color: "#42ff6b",
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
                            fillColor: "#62f71b", //Warna tengah polygon
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
        map.createPane("pane_batasdukuh");
        map.getPane("pane_batasdukuh").style.zIndex = 400;
        map.getPane("pane_batasdukuh").style["mix-blend-mode"] = "normal";

        map.createPane("pane_tanahdesa");
        map.getPane("pane_tanahdesa").style.zIndex = 400;
        map.getPane("pane_tanahdesa").style["mix-blend-mode"] = "normal";

        map.createPane("pane_perairan");
        map.getPane("pane_perairan").style.zIndex = 400;
        map.getPane("pane_perairan").style["mix-blend-mode"] = "normal";

        map.createPane("pane_jalan");
        map.getPane("pane_jalan").style.zIndex = 400;
        map.getPane("pane_jalan").style["mix-blend-mode"] = "normal";

        map.createPane("pane_fasum");
        map.getPane("pane_fasum").style.zIndex = 400;
        map.getPane("pane_fasum").style["mix-blend-mode"] = "normal";

        var overlayMaps = {
            "Fasilitas Umum": fasum,
            "Jaringan Jalan": jalan,
            "Jaringan Air": perairan,
            "Tanah Desa": TanahDesa,
            "Batas Dukuh": BatasDukuh,
        };

        L.control
            .layers(basemapLayers, overlayMaps, {
                collapsed: true,
            })
            .addTo(map);

        /*cari layer*/
        var searchControl = new L.Control.Search({
            position: "topleft",
            textPlaceholder: "Cari Padukuhan...",
            layer: BatasDukuh, //Nama variabel layer
            propertyName: "DUKUH", //Field untuk pencarian
            marker: false,
            moveToLocation: function(latlng, title, map) {
                var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                map.setView(latlng, zoom);
            },
        });
        searchControl
            .on("search:locationfound", function(e) {
                e.layer.setStyle({
                    fillColor: "#ffff00",
                    color: "#0000ff",
                });
            })
            .on("search:collapsed", function(e) {
                featuresLayer.eachLayer(function(layer) {
                    featuresLayer.resetStyle(layer);
                });
            });
        map.addControl(searchControl);

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
        var miniMap = new L.Control.MiniMap(basemapLayersCopy.layer_GoogleMaps, {
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
