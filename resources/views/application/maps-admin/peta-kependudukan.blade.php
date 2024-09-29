@extends('application.layouts.master-admin')

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
    @if (session('success'))
        <script>
            alert('Data updated successfully');
        </script>
    @endif

    <!-- Modal Data-->
    <div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dataModalLabel">
                        <b>DETAIL DATA PENDUDUK</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editResidentForm" class="row g-3" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="OBJECTID" name="OBJECTID">
                        <div class="col-md-6">
                            <label for="id" class="form-label"><b>ID</b></label>
                            <input type="text" class="form-control" id="id" name="id" />
                        </div>
                        <div class="col-md-6">
                            <label for="nik" class="form-label"><b>NIK</b></label>
                            <input type="text" class="form-control" id="nik" name="NIK" />
                        </div>
                        <div class="col-md-6">
                            <label for="Nama_Kepal" class="form-label"><b>Kepala Keluarga</b></label>
                            <input type="text" class="form-control" id="Nama_Kepal" name="Nama_Kepal" />
                        </div>
                        <div class="col-md-6">
                            <label for="Jenis_Kela" class="form-label"><b>Jenis Kelamin</b></label>
                            <input type="text" class="form-control" id="Jenis_Kela" name="Jenis_Kela" />
                        </div>
                        <div class="col-md-6">
                            <label for="Profesi_KK" class="form-label"><b>Pekerjaan</b></label>
                            <input type="text" class="form-control" id="Profesi_KK" name="Profesi_KK" />
                        </div>
                        <div class="col-md-6">
                            <label for="Jumlah_KK" class="form-label"><b>Jumlah KK</b></label>
                            <input type="text" class="form-control" id="Jumlah_KK" name="Jumlah_KK" />
                        </div>
                        <div class="col-md-6">
                            <label for="RT" class="form-label"><b>RT</b></label>
                            <input type="text" class="form-control" id="RT" name="RT" />
                        </div>
                        <div class="col-md-6">
                            <label for="RW" class="form-label"><b>RW</b></label>
                            <input type="text" class="form-control" id="RW" name="RW" />
                        </div>
                        <div class="col-md-6">
                            <label for="Status_Tem" class="form-label"><b>Status Rumah</b></label>
                            <input type="text" class="form-control" id="Status_Tem" name="Status_Tem" />
                        </div>
                        <div class="col-md-6">
                            <label for="Luas_Lanta" class="form-label"><b>Luas Lantai</b></label>
                            <input type="text" class="form-control" id="Luas_Lanta" name="Luas_Lanta" />
                        </div>
                        <div class="col-md-6">
                            <label for="Jenis_Lanta" class="form-label"><b>Jenis Lantai</b></label>
                            <input type="text" class="form-control" id="Jenis_Lanta" name="Jenis_Lanta" />
                        </div>
                        <div class="col-md-6">
                            <label for="Jenis_Dind" class="form-label"><b>Jenis Dinding</b></label>
                            <input type="text" class="form-control" id="Jenis_Dind" name="Jenis_Dind" />
                        </div>
                        <div class="col-md-6">
                            <label for="Fasilitas_" class="form-label"><b>Fasilitas MCK</b></label>
                            <input type="text" class="form-control" id="Fasilitas_" name="Fasilitas_" />
                        </div>
                        <div class="col-md-6">
                            <label for="Fasilitas1" class="form-label"><b>Fasilitas Listrik</b></label>
                            <input type="text" class="form-control" id="Fasilitas1" name="Fasilitas1" />
                        </div>
                        <div class="col-md-6">
                            <label for="Fasilita_1" class="form-label"><b>Fasilitas Air</b></label>
                            <input type="text" class="form-control" id="Fasilita_1" name="Fasilita_1" />
                        </div>
                        <div class="col-md-6">
                            <label for="Bahan_Baka" class="form-label"><b>Bahan Bakar</b></label>
                            <input type="text" class="form-control" id="Bahan_Baka" name="Bahan_Baka" />
                        </div>
                        <div class="col-md-6">
                            <label for="Kartu_Jami" class="form-label"><b>Kartu Kesehatan</b></label>
                            <input type="text" class="form-control" id="Kartu_Jami" name="Kartu_Jami" />
                        </div>
                        <div class="col-md-6">
                            <label for="Akses_Info" class="form-label"><b>Akses Informasi</b></label>
                            <input type="text" class="form-control" id="Akses_Info" name="Akses_Info" />
                        </div>
                        <div class="col-md-6">
                            <label for="Keterangan" class="form-label"><b>Keterangan</b></label>
                            <input type="text" class="form-control" id="Keterangan" name="Keterangan" />
                        </div>
                        <!-- geometry field is omitted since it's not updated via form -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="gambarModal" tabindex="-1" aria-labelledby="gambarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gambarModalLabel">
                        <b>DETAIL GAMBAR</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="text" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div id="map"></div>
    <script>
        var icons = {
            rumah: L.icon({
                iconUrl: "{{ 'assets/map-assets/WebGIS/assets/img/legend/home.png' }}",
                iconSize: [15, 15],
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


        var rumah = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: icons.rumah,
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
                        "' alt='Gambar Rumah' style='max-width:100%; max-height:200px; display: block; margin: 0 auto;'>" +
                        "</div>";
                }

                content +=
                    "<div class='my-2'>" +
                    "<table class='table table-bordered'>" +
                    "<tr><th>ID</th><td>" + feature.properties["id"] + "</td></tr>" +
                    "<tr><th>NIK</th><td>" + feature.properties["NIK"] + "</td></tr>" +
                    "<tr><th>Kepala Keluarga</th><td>" + feature.properties["Kepala Keluarga"] + "</td></tr>" +
                    "<tr><th>Jenis Kelamin</th><td>" + feature.properties["Jenis Kelamin"] + "</td></tr>" +
                    "<tr><th>Pekerjaan</th><td>" + feature.properties["Pekerjaan"] + "</td></tr>" +
                    "<tr><th>Jumlah KK</th><td>" + feature.properties["Jumlah KK"] + "</td></tr>" +
                    "<tr><th>RT</th><td>" + feature.properties["RT"] + "</td></tr>" +
                    "<tr><th>RW</th><td>" + feature.properties["RW"] + "</td></tr>" +
                    "<tr><th>Status Rumah</th><td>" + feature.properties["Status Rumah"] + "</td></tr>" +
                    "<tr><th>Luas Lantai</th><td>" + feature.properties["Luas Lantai"] + "</td></tr>" +
                    "<tr><th>Jenis Lantai</th><td>" + feature.properties["Jenis Lantai"] + "</td></tr>" +
                    "<tr><th>Jenis Dinding</th><td>" + feature.properties["Jenis Dinding"] + "</td></tr>" +
                    "<tr><th>Fasilitas MCK</th><td>" + feature.properties["Fasilitas MCK"] + "</td></tr>" +
                    "<tr><th>Fasilitas Listrik</th><td>" + feature.properties["Fasilitas Listik"] +
                    "</td></tr>" +
                    "<tr><th>Fasilitas Air</th><td>" + feature.properties["Fasilitas Air"] + "</td></tr>" +
                    "<tr><th>Bahan Bakar</th><td>" + feature.properties["Bahan Bakar"] + "</td></tr>" +
                    "<tr><th>Kartu Kesehatan</th><td>" + feature.properties["Kartu Kesehatan"] + "</td></tr>" +
                    "<tr><th>Akses Informasi</th><td>" + feature.properties["Akses Infromasi"] + "</td></tr>" +
                    "<tr><th>Keterangan</th><td>" + feature.properties["Keterangan"] + "</td></tr>" +
                    "</table>" +
                    "</div>" +
                    "<div class='my-2 d-flex justify-content-center' style='gap: 14px;'>" +
                    "<button type='button' class='btn btn-outline-warning btn-sm lihat-gambar' data-bs-toggle='modal' data-bs-target='#gambarModal' onclick='populateForm(" +
                    JSON.stringify(feature.properties) + ")'>Lihat Gambar</button>" +
                    "<button type='button' class='btn btn-outline-info btn-sm edit-data' data-bs-toggle='modal' data-bs-target='#dataModal' onclick='populateForm(" +
                    JSON.stringify(feature.properties) + ")'>Edit Data</button>" +
                    "</div>";
                layer.bindPopup(content, {
                    maxWidth: 300 // Atur lebar maksimum popup
                });

                layer.on({
                    click: function(e) {
                        layer.bindPopup(content).openPopup(); // Gunakan layer, bukan BatasKec
                    },
                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties["Kepala Keluarga"], {
                            direction: "center"
                        }).openTooltip();
                    },
                    mouseout: function(e) {
                        rumah.resetStyle(layer); // Mengembalikan style layer ke style awal
                        layer.closeTooltip(); // Menutup tooltip saat mouse keluar dari layer
                    },
                });
            }
        });

        @foreach ($residents as $item)
            var feature = {
                "type": "Feature",
                "properties": {
                    "id": "{{ $item->id }}",
                    "NIK": "{{ $item->NIK }}",
                    "Kepala Keluarga": "{{ $item->Nama_Kepal }}",
                    "Jenis Kelamin": "{{ $item->Jenis_Kela }}",
                    "Pekerjaan": "{{ $item->Profesi_KK }}",
                    "Jumlah KK": "{{ $item->Jumlah_KK }}",
                    "RT": "{{ $item->RT }}",
                    "RW": "{{ $item->RW }}",
                    "Status Rumah": "{{ $item->Status_Tem }}",
                    "Luas Lantai": "{{ $item->Luas_Lanta }}",
                    "Jenis Lantai": "{{ $item->Jenis_Lanta }}",
                    "Jenis Dinding": "{{ $item->Jenis_Dind }}",
                    "Fasilitas MCK": "{{ $item->Fasilitas_ }}",
                    "Fasilitas Listik": "{{ $item->Fasilitas1 }}",
                    "Fasilitas Air": "{{ $item->Fasilita_1 }}",
                    "Bahan Bakar": "{{ $item->Bahan_Baka }}",
                    "Kartu Kesehatan": "{{ $item->Kartu_Jami }}",
                    "Akses Infromasi": "{{ $item->Akses_Info }}",
                    "Keterangan": "{{ $item->Keterangan }}",

                    "Gambar": "https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $item->Foto }}"
                    // Tambahkan properti lain yang Anda inginkan di sini
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [{{ $item->longitude }}, {{ $item->latitude }}]
                }
            };
            rumah.addData(feature);
        @endforeach

        map.addLayer(rumah);


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
        $.getJSON("https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/tanah_desa.geojson",
            function(data) {
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
                    "<div class='my-2'>" +
                    "<table class='table table-bordered'>" +
                    "<tr><th>NIK</th><td>" +
                    feature.properties.NIK +
                    "</td></tr>" +
                    "<tr><th>Alamat OBJP</th><td>" +
                    feature.properties.ALMAT_OBJP +
                    "</td></tr>" +
                    "<tr><th>Luas (m2)</th><td>" +
                    feature.properties.LUAS +
                    "</td></tr>" +
                    "</table>" +
                    "</div>";
                layer.on({
                    click: function(e) {
                        layer.bindPopup(content).openPopup(); // Gunakan layer, bukan BatasKec
                    },
                    mouseover: function(e) {
                        //Fungsi mouse berada di atas objek untuk highlight
                        var targetLayer = e.target; //variabel layer}
                        targetLayer.setStyle({
                            //Highlight style
                            color: "red", //Warna garis tepi polygon
                            weight: 0.2, //Tebal garis tepi polygon
                            opacity: 1, //Transparansi garis tepi polygon
                            fillColor: "#62f71b", //Warna tengah polygon
                            fillOpacity: 0.4, //Transparansi polygon
                        });
                        targetLayer
                            .bindTooltip(feature.properties.NAMA_WP, {
                                direction: "center"
                            })
                            .openTooltip();
                    },
                    mouseout: function(e) {

                        const targetLayer = e.target;
                        TanahDesa.resetStyle(
                            targetLayer); // Mengembalikan style layer ke style awal
                        targetLayer
                            .closeTooltip(); // Menutup tooltip saat mouse keluar dari layer
                    },
                });
            },
        });
        /* memanggil data file geojson area */
        $.getJSON(
            "https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/batas_admin.geojson",
            function(data) {
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

        map.createPane("pane_tanahdesa");
        map.getPane("pane_tanahdesa").style.zIndex = 400;
        map.getPane(
            "pane_tanahdesa").style["mix-blend-mode"] = "normal";

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
            propertyName: "Kepala Keluarga", // Pastikan nama field yang sesuai untuk pencarian
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

        function populateForm(properties) {
            // Set the image URL to the modal
            const modalImage = document.querySelector('#gambarModal .modal-body img');
            modalImage.src = properties["Gambar"] || ''; // Set image URL or empty string if undefined

            modalImage.alt = properties["Keterangan"] || 'Gambar Rumah';

            // Populate form fields
            document.getElementById('id').value = properties['id'];
            document.getElementById('nik').value = properties['NIK'];
            document.getElementById('Nama_Kepal').value = properties['Kepala Keluarga'];
            document.getElementById('Jenis_Kela').value = properties['Jenis Kelamin'];
            document.getElementById('Profesi_KK').value = properties['Pekerjaan'];
            document.getElementById('Jumlah_KK').value = properties['Jumlah KK'];
            document.getElementById('RT').value = properties['RT'];
            document.getElementById('RW').value = properties['RW'];
            document.getElementById('Status_Tem').value = properties['Status Rumah'];
            document.getElementById('Luas_Lanta').value = properties['Luas Lantai'];
            document.getElementById('Jenis_Lanta').value = properties['Jenis Lantai'];
            document.getElementById('Jenis_Dind').value = properties['Jenis Dinding'];
            document.getElementById('Fasilitas_').value = properties['Fasilitas MCK'];
            document.getElementById('Fasilitas1').value = properties['Fasilitas Listik'];
            document.getElementById('Fasilita_1').value = properties['Fasilitas Air'];
            document.getElementById('Bahan_Baka').value = properties['Bahan Bakar'];
            document.getElementById('Kartu_Jami').value = properties['Kartu Kesehatan'];
            document.getElementById('Akses_Info').value = properties['Akses Infromasi'];
            document.getElementById('Keterangan').value = properties['Keterangan'];

            // Set the form action dynamically based on OBJECTID (or any unique identifier)
            var form = document.getElementById('editResidentForm');
            form.action = "/peta-penduduk-admin/" + properties['id']; // This points to the route created above
        }
    </script>
@endsection
