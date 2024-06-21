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
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ 'assets/img/lg.png' }}" alt="" /> -->
                <h5 class="sitename"><b>DESA GEOCIRCLE</b></h5>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Beranda<br /></a></li>
                    <li class="dropdown">
                        <a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#about">Tentang Desa</a></li>
                            <li><a href="#about">Visi dan Misi</a></li>
                            <li><a href="#team">Struktur</a></li>
                            <li><a href="#">Dll</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Info Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#faq">Pengumuman</a></li>
                            <li><a href="/blog.html">Berita</a></li>
                            <li><a href="#portfolio">Kegiatan</a></li>
                            <li><a href="#">Dll</a></li>
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
                                    <li><a href="#">Peta Dll</a></li>
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

            <a class="btn-getstarted" href="index.html"><b>Login</b></a>
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
</body>

</html>
