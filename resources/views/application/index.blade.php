@extends('application.layouts.master')

@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
                data-aos="zoom-out">
                <!-- <img
                                                                                                            src="{{ 'assets/img/hero-img.svg' }}"
                                                                                                            class="img-fluid animated"
                                                                                                            alt=""
                                                                                                          /> -->
                <h1 style="color: black">
                    <b>Selamat Datang di</b><span>
                        @foreach ($assets as $asset)
                            <b>{{ $asset->nama_desa }}</b>
                    </span>
                    @endforeach
                </h1>
                <p style="color: azure">
                    <i>"Desa Cerdas, Maju, Transparan, dan Sejahtera"</i>
                </p>
                <div class="d-flex">
                    <a href="#features" class="btn-get-started scrollto">Layanan</a>
                    @foreach ($assets as $asset)
                        <a href="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $asset->header_video }}"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-info-square-fill icon"></i>
                            </div>
                            <h4>
                                <a href="#faq" class="stretched-link">Pengumuman</a>
                            </h4>
                            <p>
                                Informasi pengumuman untuk seluruh masyarakat Desa Geocircle.
                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-newspaper icon"></i>
                            </div>
                            <h4><a href="#onfocus" class="stretched-link">Berita</a></h4>
                            <p>
                                Informasi pengumuman untuk seluruh masyarakat Desa Geocircle.
                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-images icon"></i>
                            </div>
                            <h4>
                                <a href="#portfolio" class="stretched-link">Kegiatan</a>
                            </h4>
                            <p>Dokumentasi kegiatan-kegiatan Desa Geocircle.</p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-envelope-plus-fill icon"></i>
                            </div>
                            <h4>
                                <a href="#features" class="stretched-link">Surat Online</a>
                            </h4>
                            <p>
                                Pengajuan kebutuhan surat menyurat masyarakat Desa Geocircle.
                            </p>
                        </div>
                    </div>
                    <!-- End Service Item -->
                </div>
            </div>
        </section>
        <!-- /Featured Services Section -->
        <!-- Faq Section -->
        {{-- <section id="faq" class="faq section" style="background-color: #e2fbff">
            <div class="container-fluid">
                <div class="row gy-4">
                    <div class="col-lg-12 d-flex flex-column justify-content-center order-2 order-lg-1">
                        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100" style="text-align: center">
                            <h3 style="color: #df1529">
                                <b>PENGUMUMAN</b>
                            </h3>
                            <p>Informasi terkait segala pengumuman di Desa Geocircle.</p>
                        </div>

                        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
                            @foreach ($announcements as $announcement)
                                <div class="faq-item">
                                    <i class="faq-icon bi bi-info-circle-fill"></i>
                                    <h3>
                                        <b>{{ $announcement->title }}</b> |
                                        <span class="badge bg-danger"
                                            style="color: white">{{ $announcement->published_at }}</span>
                                    </h3>
                                    <div class="faq-content" style="text-align: justify">
                                        <p>
                                            <br />
                                            {!! $announcement->content !!}
                                        </p>
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div>
                            @endforeach
                            <!-- End Faq item-->
                        </div>
                    </div>

                    <!-- <div class="col-lg-5 order-1 order-lg-2">
                                                                <img
                                                                  src="{{ 'assets/img/faq.jpg' }}"
                                                                  class="img-fluid"
                                                                  alt=""
                                                                  data-aos="zoom-in"
                                                                  data-aos-delay="100"
                                                                />
                                                              </div> -->
                </div>
            </div>
        </section>
        <!-- /Faq Section --> --}}
        <section id="faq" class="faq section" style="background-color: #e2fbff">
            <div class="container-fluid">
                <div class="row gy-4">
                    <div class="col-lg-12 d-flex flex-column justify-content-center order-2 order-lg-1">
                        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100" style="text-align: center">
                            <h3 style="color: #df1529">
                                <b>PENGUMUMAN</b>
                            </h3>
                            <p>Informasi terkait segala pengumuman di Desa Geocircle.</p>
                        </div>

                        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
                            @foreach ($announcements as $announcement)
                                <div class="faq-item">
                                    <i class="faq-icon bi bi-info-circle-fill"></i>
                                    <h3>
                                        <b>{{ $announcement->title }}</b> |
                                        <span class="badge bg-danger"
                                            style="color: white">{{ $announcement->published_at }}</span>
                                    </h3>
                                    <div class="faq-content" style="text-align: justify">
                                        <p>
                                            <span class="row d-flex justify-content-center">
                                                @foreach ($announcement->images as $image)
                                                    <span class="col-lg-4 col-sm-12">
                                                        <img src="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $image->image_path }}"
                                                            class="img-fluid">
                                                    </span>
                                                @endforeach
                                            </span>
                                            <br>
                                            {!! $announcement->content !!}
                                        </p>

                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div>
                            @endforeach
                            <!-- End Faq item-->

                        </div>
                    </div>

                    <!-- <div class="col-lg-5 order-1 order-lg-2">
                                                              <img
                                                                src="assets/img/faq.jpg"
                                                                class="img-fluid"
                                                                alt=""
                                                                data-aos="zoom-in"
                                                                data-aos-delay="100"
                                                              />
                                                            </div> -->
                </div>
            </div>
        </section>








        <!-- About Section -->
        <section id="about" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up" style="margin-bottom: -70px">
                <h3><b>TENTANG DESA</b></h3>
                <p>Informasi terkait Desa Geocircle beserta visi dan misi nya</p>
            </div>
            <!-- End Section Title -->
            @foreach ($assets as $asset)
                <div class="container" data-aos="fade-up">
                    <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-lg-5">
                            <div class="about-img">
                                <img src="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $asset->header_image }}"
                                    class="img-fluid" alt="" />
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <!-- <h3 class="pt-0 pt-lg-5">
                                                                                                                Neque officiis dolore maiores et exercitationem quae est seda
                                                                                                                lidera pat claero
                                                                                                              </h3> -->

                            <!-- Tabs -->
                            <ul class="nav nav-pills mb-3">
                                <li>
                                    <a class="nav-link active" data-bs-toggle="pill" href="#TentangDesa">Tentang Desa</a>
                                </li>
                                <li>
                                    <a class="nav-link" data-bs-toggle="pill" href="#VisiMisi">Visi & Misi</a>
                                </li>
                            </ul>
                            <!-- End Tabs -->

                            <!-- Tab Content -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="TentangDesa">
                                    <div class="d-flex align-items-center mt-4">
                                        <h4>Lokasi dan Geografi:</h4>
                                    </div>
                                    <p style="text-align: justify">
                                        {!! $asset->lokasi_dan_geografi !!}
                                    </p>
                                    <p style="text-align: justify">
                                        {!! $asset->penduduk_dan_demografi !!}
                                    </p>

                                    <div class="d-flex align-items-center mt-4">
                                        <h4>Potensi dan Sumber Daya:</h4>
                                    </div>
                                    <p style="text-align: justify">
                                        {!! $asset->potensi_dan_sumberdaya !!}
                                    </p>
                                </div>
                                <!-- End Tab 1 Content -->

                                <div class="tab-pane fade" id="VisiMisi">
                                    <div class="d-flex align-items-center mt-4">
                                        <h4>Visi</h4>
                                    </div>
                                    <p>
                                        {!! $asset->visi !!}
                                    </p>

                                    <div class="d-flex align-items-center mt-4">
                                        <h4>Misi</h4>
                                    </div>
                                    <p>
                                        {!! $asset->misi !!}
                                    </p>
                                </div>
                                <!-- End Tab 2 Content -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
        <!-- /About Section -->

        <!-- Team Section -->
        <section id="team" class="team section" style="background-color: #e2fbff">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h3><b>STRUKTUR DESA</b></h3>
                <p>Informasi terkait sturktur kepengurusan Desa Geocircle.</p>
            </div>
            <!-- Call To Action Section -->
            <section id="call-to-action" class="call-to-action section"
                style="padding-bottom: 20px; background-color: #e2fbff">
                <div class="container" data-aos="zoom-out">
                    <div class="row g-5">
                        @foreach ($organizers as $organizer)
                            @if ($organizer->position == 'Kepala Desa')
                                <div
                                    class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                                    <h3>Kepala Desa: <b>{{ $organizer->name }}</b></h3>
                                    <p style="text-align: justify">
                                        {!! $organizer->quote !!}
                                    </p>
                                </div>

                                <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                                    <div class="img">
                                        <img src="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $organizer->image }}"
                                            class="img-fluid" alt="" />
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- /Call To Action Section -->
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5">
                    @foreach ($organizers as $organizer)
                        @if ($organizer->position !== 'Kepala Desa')
                            <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                                <div class="team-member">
                                    <div class="member-img">
                                        <img src="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $organizer->image }}"
                                            class="img-fluid" alt="" />
                                    </div>
                                    <div class="member-info">
                                        <div class="social">
                                            <a href=""><i class="bi bi-twitter-x"></i></a>
                                            <a href=""><i class="bi bi-facebook"></i></a>
                                            <a href=""><i class="bi bi-instagram"></i></a>
                                            <a href=""><i class="bi bi-linkedin"></i></a>
                                        </div>
                                        <h4>{{ $organizer->name }}</h4>
                                        <span>{{ $organizer->position }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!-- End Team Member -->
                </div>
            </div>
        </section>
        <!-- /Team Section -->

        <!-- Onfocus Section -->
        <section id="onfocus" class="onfocus section">
            <div class="container-fluid p-0" data-aos="fade-up">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <div class="content d-flex flex-column justify-content-center h-100">
                            <section id="recent-posts" class="recent-posts section" style="background: #97c3cb">
                                <!-- Section Title -->
                                <div class="container section-title" data-aos="fade-up">
                                    <h3><b>BERITA DESA</b></h3>
                                    <p>Informasi terkait berita-berita Desa Geocircle.</p>
                                </div>
                                <!-- End Section Title -->

                                <div class="container">
                                    <div class="row gy-4">
                                        @foreach ($recentNews as $recent)
                                            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $recent->image }}"
                                                            alt="" class="img-fluid" />
                                                    </div>

                                                    <p class="post-category">Politics</p>

                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('news.details', ['slug' => $recent->slug]) }}">{{ $recent->title }}</a>
                                                    </h2>

                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/blog/blog-author.jpg') }}"
                                                            alt=""
                                                            class="img-fluid post-author-img flex-shrink-0" />
                                                        <div class="post-meta">
                                                            <p class="post-author">{{ $recent->author->name }}</p>
                                                            <p class="post-date">
                                                                <time
                                                                    datetime="{{ $recent->created_at->format('Y-m-d') }}">{{ $recent->created_at->format('M d, Y') }}</time>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                            <a href="" class="read-more align-self-end"
                                style="margin-top: 20px"><span>Lainnya</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Onfocus Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h3><b>KEGIATAN</b></h3>
                <p>
                    Informasi dan dokumentasi terkait kegiatan-kegiatan yang dilakukan
                    Desa Geocircle.
                </p>
            </div>
            <!-- End Section Title -->

            {{-- <div class="container-fluid">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-internal">Internal</li>
                        <li data-filter=".filter-eksternal">Eksternal</li>
                    </ul>
                    <!-- End Portfolio Filters -->

                    <div class="row g-0 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($activities as $activity)
                            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-internal">
                                <div class="portfolio-content h-100">
                                    <img src="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $activity->image }}"
                                        alt="" class="img-fluid" />
                                    <div class="portfolio-info">
                                        <a href="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $activity->image }}"
                                            data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                                class="bi bi-zoom-in"></i></a>
                                        <a href="{{ route('activity_details', $activity->id) }}" title="More Details"
                                            class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- End Portfolio Item -->
                    </div>

                </div>
            </div> --}}
            <div class="container-fluid">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-internal">Internal</li>
                        <li data-filter=".filter-eksternal">Eksternal</li>
                    </ul>
                    <!-- End Portfolio Filters -->

                    <div class="row g-0 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($activities as $activity)
                            <div
                                class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ strtolower($activity->category) }}">
                                <div class="portfolio-content h-100">
                                    <img src="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $activity->image }}"
                                        alt="" class="img-fluid" />
                                    <div class="portfolio-info">
                                        <a href="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $activity->image }}"
                                            data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                                class="bi bi-zoom-in"></i></a>
                                        <a href="{{ route('activity_details', $activity->id) }}" title="More Details"
                                            class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- End Portfolio Item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /Portfolio Section -->

        <section id="services" class="services section" style="background-color:#97c3cb">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up" style="color: white;">
                <h3 style="color: white;""><b>DATA DESA</b></h3>
                <p style="color: white;">
                    Informasi terkait data statistik dan data geospasial Desa Geocircle
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5">
                    <div class="col-xl-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ asset('assets/img/services-1.jpg') }}" class="img-fluid" alt="" />
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-bounding-box"></i>
                                </div>
                                <a href="service-details.html" class="stretched-link">
                                    <h3>Teritorial</h3>
                                </a>
                                <p>
                                    Provident nihil minus qui consequatur non omnis maiores. Eos
                                    accusantium minus dolores iure perferendis.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-xl-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ asset('assets/img/services-2.jpg') }}" class="img-fluid" alt="" />
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <a href="service-details.html" class="stretched-link">
                                    <h3>Kependudukan</h3>
                                </a>
                                <p>
                                    Ut autem aut autem non a. Sint sint sit facilis nam iusto
                                    sint. Libero corrupti neque eum hic non ut nesciunt dolorem.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-xl-4" data-aos="zoom-in" data-aos-delay="400">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ asset('assets/img/services-3.jpg') }}" class="img-fluid" alt="" />
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-map-fill"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Geospasial</h3>
                                </a>
                                <p>
                                    Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                                    Minus ea aut. Vel qui id voluptas adipisci eos earum
                                    corrupti.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->
                </div>
            </div>
        </section>

        <section id="features" class="features section">
            <div class="container section-title" data-aos="fade-up">
                <h3><b>LAYANAN</b></h3>
                <p>
                    Informasi terkait panduan pengajuan surat secara online di Desa
                    Geocircle
                </p>
            </div>
            <div class="container" data-aos="fade-up">
                <ul class="nav nav-tabs row gy-4 d-flex">
                    <li class="nav-item col-4 col-md-4 col-lg-4">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                            <i class="bi bi-ui-checks" style="color: #0dcaf0"></i>
                            <h4>Panduan</h4>
                        </a>
                    </li>
                    <!-- End Tab 1 Nav -->

                    <li class="nav-item col-4 col-md-4 col-lg-4">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                            <i class="bi bi-envelope-plus-fill" style="color: #16e149"></i>
                            <h4>Surat Online</h4>
                        </a>
                    </li>
                    <!-- End Tab 2 Nav -->

                    <li class="nav-item col-4 col-md-4 col-lg-4">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                            <i class="bi bi- bi-megaphone-fill" style="color: #d10b0b"></i>
                            <h4>Pangaduan</h4>
                        </a>
                    </li>
                    <!-- End Tab 3 Nav -->
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="features-tab-1">
                        <div class="row gy-4">
                            <div class="col-lg-12 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                                <h3>Panduan</h3>
                                <p>
                                    Berikut Informasi Panduan Panggunaan Website Desa Kemasan:
                                </p>
                                <ul>
                                    <li>
                                        <i class="bi bi-info-circle-fill"></i> Website Desa
                                        Kemasan digunakan sebagai salah satu sarana perseberan
                                        informasi, manajemen data dan penunjang operasional desa
                                        agar lebih efektif dan efesien.
                                    </li>
                                    <li>
                                        <i class="bi bi-info-circle-fill"></i> Pengguna Website
                                        Desa Kemasan digunakan terkhusus untuk warga Desa Kemasan
                                        setempat.
                                    </li>
                                    <li>
                                        <i class="bi bi-info-circle-fill"></i> Fasilitas website
                                        meliputi pemberian informasi, pengaduan dan permohonan
                                        surat secara online.
                                    </li>
                                    <li>
                                        <i class="bi bi-info-circle-fill"></i> Informasi lebih
                                        lanjut silahkan hubungi pihak desa melalui kontak yang
                                        tersedia.
                                    </li>
                                </ul>
                                <p class="fst-italic">
                                    <b>Mohon untuk digunakan secara bijak! Terima kasih.</b>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Tab Content 1 -->

                    <div class="tab-pane fade" id="features-tab-2">
                        <div class="row gy-4">
                            <div class="col-lg-12 order-2 order-lg-1">
                                <h3>Surat Online</h3>
                                <p>Berikut langkah-langkah pembuatan surat online:</p>
                                <ul>
                                    <li>
                                        <i class="bi bi-info-circle-fill"></i> Pembuatan surat
                                        online hanya bisa dilakulan oleh warga Desa Kemasan.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i> Silahkan login
                                        dahulu dengan memasukkan NIK dan password.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i> Masuk ke menu
                                        permohonan surat
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i> Silahkan pilih
                                        jenis permohonan surat yang ingin diajukan
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i> Selanjutnya isikan
                                        form yang tersedia
                                    </li>
                                    <li>
                                        <i class="bi bi-info-circle-fill"></i> Jika anda memilih
                                        opsi hard file maka file akan di cetak dan wajib diambil
                                        di kantor kelurahan tetapi jika anda memilih opsi soft
                                        file surat bisa di download dalam bentuk pdf.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i> Pilih kirim.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i> Tunggu status dari
                                        proses menjadi selesai. Apabila status telah berganti
                                        selesai surat dapat diambil ke Kantor Kelurahan.
                                    </li>
                                </ul>
                                <p class="fst-italic">
                                    <b>Mohon untuk digunakan secara bijak! Terima kasih.</b>
                                </p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="padding: 10px"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End Tab Content 2 -->

                    <div class="tab-pane fade" id="features-tab-3">
                        <div class="row gy-4">
                            <div class="col-lg-12 order-2 order-lg-1">
                                <h3>Pengaduan</h3>
                                <p>Berikut langkah-langkah pengaduan online:</p>
                                <ul>
                                    <li>
                                        <i class="bi bi-info-circle-fill"></i> Pengaduan hanya
                                        bisa dilakulan oleh warga Desa Kemasan.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i> Silahkan login
                                        dahulu dengan memasukkan NIK dan password.
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i> Masuk ke menu
                                        pengaduan
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i> Silahkan isikan
                                        form yang tersedia
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i> Pilih kirim.
                                    </li>
                                </ul>
                                <p class="fst-italic">
                                    <b>Sampaikan aduanmu secara bijak dan sopan! Terima
                                        kasih.</b>
                                </p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="padding: 10px"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End Tab Content 3 -->
                </div>
            </div>
        </section>

        <section id="contact" class="contact section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h3><b>KONTAK</b></h3>
                <p>Informasi terkait layanan dan segala sesuatu Desa Geocircle.</p>
            </div>
            <!-- End Section Title -->

            <div class="mb-5">
                <iframe style="width: 100%; height: 400px"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7906.22851765392!2d110.41752489271606!3d-7.777707988797493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59f429cb44e5%3A0x889572c558f9cfef!2sCorongan%2C%20Maguwoharjo%2C%20Depok%2C%20Sleman%20Regency%2C%20Special%20Region%20of%20Yogyakarta!5e0!3m2!1sen!2sid!4v1718164458945!5m2!1sen!2sid"
                    width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <!-- End Google Maps -->
            <div class="container" data-aos="fade">
                <div class="row gy-5 gx-lg-5 ">
                    <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                        <div class="info-item">
                            <div class="row">
                                <div class="col-1 my-auto">
                                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                                </div>
                                <div class="col-11">
                                    <h4>Lokasi:</h4>
                                    <p>Corongan, Maguwoharjo, Sleman DIY</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                        <div class="info-item">
                            <div class="row">
                                <div class="col-1 my-auto">
                                    <i class="bi bi-envelope flex-shrink-0"></i>
                                </div>
                                <div class="col-11">
                                    <h4>Email:</h4>
                                    <p>geocircle@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                        <div class="info-item">
                            <div class="row">
                                <div class="col-1 my-auto">
                                    <i class="bi bi-phone flex-shrink-0"></i>
                                </div>
                                <div class="col-11">
                                    <h4>Telp:</h4>
                                    <p>085171231926</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </main>
@endsection
