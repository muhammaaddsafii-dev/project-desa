@extends('application.layouts.master')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h5 class="mb-2 mb-lg-0"><b>DETAIL KEGIATAN</b></h5>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="">Beranda</a></li>
                        <li class="current">Detail Kegiatan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Portfolio Details Section -->
        <section id="portfolio-details" class="portfolio-details section">
            <!-- Section Title -->
            <!-- <div class="container section-title" data-aos="fade-up">
                <h3>Detail Kegiatan</h3>
                <p>
                  Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                  consectetur velit
                </p>
              </div> -->
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up">
                <div class="portfolio-details-slider swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($activity->images as $image)
                            <div class="swiper-slide">
                                <img src="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $image->image_path }}" alt="{{ $activity->title }}" />
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="row justify-content-between gy-4 mt-4">
                    <div class="col-lg-8" data-aos="fade-up">
                        <div class="portfolio-description">
                            <h2>{{ $activity->title }}</h2>
                            <p>
                                {!! $activity->description !!}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="portfolio-info">
                            <h3>Informasi Kegiatan</h3>
                            <ul>
                                <li><strong>JENIS Kegiatan</strong> {{ $activity->category }}</li>
                                <li><strong>Tanggal Kegiatan</strong> {{ $activity->date }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Portfolio Details Section -->
    </main>
@endsection
