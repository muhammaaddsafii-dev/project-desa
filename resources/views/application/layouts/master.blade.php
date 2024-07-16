<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Template Web Desa GCI</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ 'assets/img/favicon.png' }}" rel="icon" />
    <link href="{{ 'assets/img/apple-touch-icon.png' }}" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ 'assets/vendor/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet" />
    <link href="{{ 'assets/vendor/bootstrap-icons/bootstrap-icons.css' }}" rel="stylesheet" />
    <link href="{{ 'assets/vendor/aos/aos.css' }}" rel="stylesheet" />
    <link href="{{ 'assets/vendor/glightbox/css/glightbox.min.css' }}" rel="stylesheet" />
    <link href="{{ 'assets/vendor/swiper/swiper-bundle.min.css' }}" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="{{ 'assets/css/main.css' }}" rel="stylesheet" />

    <!-- =======================================================
      * Template Name: HeroBiz
      * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
      * Updated: Jun 06 2024 with Bootstrap v5.3.3
      * Author: BootstrapMade.com
      * License: https://bootstrapmade.com/license/
      ======================================================== -->



    <!-- Leaflet CSS Library -->
    <!-- <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
      crossorigin=""
    /> -->
    <link rel="stylesheet" href="{{ 'assets/Plugin/libs/leaflet/leaflet.css' }}" />
    <link rel="stylesheet" href="{{ 'assets/Plugin/fontawesome 5.15.4/all.css' }}" />

    <link rel="stylesheet" href="{{ 'assets/Plugin/libs/leaflet-search/leaflet-search.src.css' }}" />
    <link rel="stylesheet" href="{{ 'assets/Plugin/libs/leaflet-search2/leaflet-search.css' }}" />
    <link rel="stylesheet" href="{{ 'assets/Plugin/libs/leaflet-locatecontrol/L.Control.Locate.min.css' }}" />

    <link rel="stylesheet" href="{{ 'assets/Plugin/libs/leaflet/Control.Geocoder.css' }}" />
    <link rel="stylesheet" href="{{ 'assets/Plugin/libs/leaflet-mouseposition/L.Control.MousePosition.css' }}" />
    <link rel="stylesheet" type="text/css"
        href="https://rawgit.com/MarcChasse/leaflet.ScaleFactor/master/leaflet.scalefactor.min.css" />
    <link rel="stylesheet" href="{{ 'assets/Plugin/libs/leaflet-minimap/Control.MiniMap.css' }}" />
    <link rel="stylesheet" href="{{ 'assets/Plugin/libs/leaflet-easybutton-master/easy-button.css' }}" />
    <link rel="stylesheet" href="{{ 'assets/Plugin/libs/lealflet-layertreecontrol/L.LayerTreeControl.css' }}" />
    <style>
        html,
        body,
        #map {
            height: 95%;
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
    </style>


</head>

<body class="index-page">
    <script src="{{ 'assets/Plugin/fontawesome 5.15.4/all.js' }}"></script>
    <!-- Leaflet JavaScript Library -->
    <script src="https://unpkg.com/leaflet@ 1.5.1/dist/leaflet.js"></script>

    <!-- leaflet js plugin -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet/leaflet.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet/leaflet-src.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet-search/leaflet-search.src.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet-search2/leaflet-search.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/fuse/fuse.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet/Control.Geocoder.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet-locatecontrol/L.Control.Locate.min.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet-browser-print-master/leaflet.browser.print.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet-browser-print-master/leaflet.browser.print.utils.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet-browser-print-master/leaflet.browser.print.sizes.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet-minimap/Control.MiniMap.js' }}" type="text/javascript"></script>
    <script src="{{ 'assets/Plugin/libs/lealflet-layertreecontrol/L.LayerTreeControl.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/esri-leaflet/esri-leaflet-debug.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet-easybutton-master/easy-button.js' }}"></script>
    <script src="{{ 'assets/Plugin/libs/leaflet-mouseposition/L.Control.MousePosition.js' }}"></script>
    <script src="https://rawgit.com/MarcChasse/leaflet.ScaleFactor/master/leaflet.scalefactor.min.js"></script>
    <script src="{{ 'assets/Plugin/js_map/Autolinker.min.js' }}"></script>
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ 'assets/img/lg.png' }}" alt="" /> -->
                <h5 class="sitename"><b>DESA GEOCIRCLE</b></h5>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" class="active">Beranda<br /></a></li>
                    <li class="dropdown">
                        <a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#about">Tentang Desa</a></li>
                            <li><a href="#about">Visi dan Misi</a></li>
                            <li><a href="#team">Struktur</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Info Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#faq">Pengumuman</a></li>
                            <li><a href="/berita">Berita</a></li>
                            <li><a href="/kegiatan">Kegiatan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Data Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li class="dropdown">
                                <a href="#"><span>Statistik</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Teritorial</a></li>
                                    <li><a href="#">Kependudukan</a></li>
                                    <li><a href="#">dll</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#"><span>Geospasial</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Peta Fasilitas Umum</a></li>
                                    <li><a href="#">Peta Tutupan Lahan</a></li>
                                    <li><a href="#">Peta Kependudukan</a></li>
                                    <li><a href="/map">Peta Dll</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Keuangan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Layanan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Surat Online</a></li>
                            <li><a href="#">Pengaduan</a></li>
                            <li><a href="#">Panduan</a></li>
                            <li><a href="#">Dll</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="/"><b>Login</b></a>
        </div>
    </header>

    @yield('content')

    <footer id="footer" class="footer">
        <div class="copyright text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div>
                        © Copyright <strong><span>MyWebsite</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
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
    <script src="{{ 'assets/vendor/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ 'assets/vendor/php-email-form/validate.js' }}"></script>
    <script src="{{ 'assets/vendor/aos/aos.js' }}"></script>
    <script src="{{ 'assets/vendor/glightbox/js/glightbox.min.js' }}"></script>
    <script src="{{ 'assets/vendor/swiper/swiper-bundle.min.js' }}"></script>
    <script src="{{ 'assets/vendor/imagesloaded/imagesloaded.pkgd.min.js' }}"></script>
    <script src="{{ 'assets/vendor/isotope-layout/isotope.pkgd.min.js' }}"></script>

    <!-- Main JS File -->
    <script src="{{ 'assets/js/main.js' }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
