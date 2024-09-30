<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pemerintah Desa Kemasan</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />

    <!-- Leaflet CSS Library -->
    <!-- <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
      crossorigin=""
    /> -->
    <link rel="stylesheet" href="{{ asset('assets/map-assets/Plugin/libs/leaflet/leaflet.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/map-assets/Plugin/fontawesome 5.15.4/all.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/map-assets/Plugin/libs/leaflet-search/leaflet-search.src.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/map-assets/Plugin/libs/leaflet-control-search/leaflet-search.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/map-assets/Plugin/libs/leaflet-locatecontrol/L.Control.Locate.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/map-assets/Plugin/libs/leaflet/Control.Geocoder.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/map-assets/Plugin/libs/leaflet-mouseposition/L.Control.MousePosition.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="https://rawgit.com/MarcChasse/leaflet.ScaleFactor/master/leaflet.scalefactor.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/map-assets/Plugin/libs/leaflet-minimap/Control.MiniMap.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/map-assets/Plugin/libs/leaflet-easybutton-master/easy-button.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/map-assets/Plugin/libs/leaflet-layergrup-control/leaflet.groupedlayercontrol.css') }}" />
    <style>
        html,
        body,
        #map {
            height: 93%;
        }

        #legenda {
            position: absolute;
            margin-bottom: -5px;
            bottom: 1px;
            left: 0px;
            padding: 10px;
            z-index: 700;
        }

        .scrollable-menu {
            max-height: 200px;
            /* Sesuaikan dengan tinggi yang diinginkan */
            overflow-y: auto;
            /* Menambahkan scrollbar vertikal */
        }

        /* Background pada Judul */
        *.info {
            padding: 6px 8px;
            font: 12px/14px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            text-align: center;
        }

        .info h4 {
            margin: 0 0 5px;
            color: rgb(0, 0, 0);
            font-weight: 700;
        }

        .leaflet-control-layers-list {
            max-height: 150px;
            overflow-y: auto;
            overflow-x: auto;
        }

        .leaflet-control-layers label {
            display: flex;
            align-items: center;
        }

        .leaflet-control-layers img {
            margin-right: 5px;
        }

        .search-tip b {
            margin: 5px;
            background: #beeef6;
            border-radius: 5px;

            .list-group-item-action.active {
                background-color: #0d6efd;
                border-color: #0d6efd;
            }

        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="index-page">
    <script src="{{ asset('assets/map-assets/Plugin/fontawesome 5.15.4/all.js') }}"></script>
    <!-- Leaflet JavaScript Library -->
    <script src="https://unpkg.com/leaflet@ 1.5.1/dist/leaflet.js"></script>

    <!-- leaflet js plugin -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/leaflet/leaflet-src.js') }}"></script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/leaflet-search/leaflet-search.src.js') }}"></script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/leaflet-control-search/leaflet-search.src.js') }}"></script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/fuse/fuse.js') }}"></script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/leaflet/Control.Geocoder.js') }}"></script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/leaflet-locatecontrol/L.Control.Locate.min.js') }}"></script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/leaflet-browser-print-master/leaflet.browser.print.js') }}">
    </script>
    <script
        src="{{ asset('assets/map-assets/Plugin/libs/leaflet-browser-print-master/leaflet.browser.print.utils.js') }}">
    </script>
    <script
        src="{{ asset('assets/map-assets/Plugin/libs/leaflet-browser-print-master/leaflet.browser.print.sizes.js') }}">
    </script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/leaflet-minimap/Control.MiniMap.js') }}"
        type="text/javascript">
    </script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/leaflet-layergrup-control/leaflet.groupedlayercontrol.js') }}">
    </script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/esri-leaflet/esri-leaflet-debug.js') }}"></script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/leaflet-easybutton-master/easy-button.js') }}"></script>
    <script src="{{ asset('assets/map-assets/Plugin/libs/leaflet-mouseposition/L.Control.MousePosition.js') }}">
    </script>
    <script src="https://rawgit.com/MarcChasse/leaflet.ScaleFactor/master/leaflet.scalefactor.min.js"></script>
    <script src="{{ asset('assets/map-assets/Plugin/js_map/Autolinker.min.js') }}"></script>
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('assets/img/favicon.png') }}" alt="" />
                @foreach ($assets as $asset)
                <h5 class="sitename"><b>{{ $asset->nama_desa }}</b></h5>
                @endforeach
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" class="active">Beranda<br /></a></li>
                    <li class="dropdown">
                        <a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="/#about">Tentang Desa</a></li>
                            <li><a href="/#about">Visi dan Misi</a></li>
                            <li><a href="/#team">Struktur</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Info Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="/#faq">Pengumuman</a></li>
                            <li><a href="/berita">Berita</a></li>
                            <li><a href="/#portfolio">Kegiatan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Data Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li class="dropdown">
                                <a href="#"><span>Statistik</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="/data-kependudukan">Kependudukan</a></li>
                                    <li><a href="#">Keuangan</a></li>
                                </ul>
                            </li>
                            <li><a href="/peta-kependudukan">Geospasial</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Layanan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="/admin/login">Surat Online</a></li>
                            <li><a href="/admin/login">Pengaduan</a></li>
                            <li><a href="/admin/login">Panduan</a></li>
                        </ul>
                    </li>
                    <li><a href="/#contact">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="/admin/login"><b>Login</b></a>
        </div>
    </header>

    @yield('content')

    <footer id="footer" class="footer">
        <div class="copyright text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div>
                        ©Copyright <strong><span>Pemerintah Desa Kemasan</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                        Powered by <a href="https://www.geo-circle.com/">GeoCircle Indonesia</a>
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href=""><i class="bi bi-whatsapp"></i></a>
                    <a
                        href="https://www.instagram.com/geo_circle?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i
                            class="bi bi-instagram"></i></a>
                    <a href="https://www.geo-circle.com/"><i class="bi bi-globe"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</body>

</html>