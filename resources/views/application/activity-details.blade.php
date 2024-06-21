@extends('application.layouts.master')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h3 class="mb-2 mb-lg-0"><b>DETAIL KEGIATAN</b></h3>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Beranda</a></li>
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
                        <div class="swiper-slide">
                            <img src="assets/img/portfolio/app-1.jpg" alt="" />
                        </div>

                        <div class="swiper-slide">
                            <img src="assets/img/portfolio/product-1.jpg" alt="" />
                        </div>

                        <div class="swiper-slide">
                            <img src="assets/img/portfolio/branding-1.jpg" alt="" />
                        </div>

                        <div class="swiper-slide">
                            <img src="assets/img/portfolio/books-1.jpg" alt="" />
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="row justify-content-between gy-4 mt-4">
                    <div class="col-lg-8" data-aos="fade-up">
                        <div class="portfolio-description">
                            <h2>This is an example of portfolio details</h2>
                            <p>
                                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos
                                itaque inventore commodi labore quia quia. Exercitationem
                                repudiandae officiis neque suscipit non officia eaque itaque
                                enim. Voluptatem officia accusantium nesciunt est omnis
                                tempora consectetur dignissimos. Sequi nulla at esse enim cum
                                deserunt eius.
                            </p>
                            <p>
                                Amet consequatur qui dolore veniam voluptatem voluptatem sit.
                                Non aspernatur atque natus ut cum nam et. Praesentium error
                                dolores rerum minus sequi quia veritatis eum. Eos et doloribus
                                doloremque nesciunt molestiae laboriosam.
                            </p>

                            <p>
                                Impedit ipsum quae et aliquid doloribus et voluptatem quasi.
                                Perspiciatis occaecati earum et magnam animi. Quibusdam non
                                qui ea vitae suscipit vitae sunt. Repudiandae incidunt cumque
                                minus deserunt assumenda tempore. Delectus voluptas
                                necessitatibus est.
                            </p>

                            <p>
                                Sunt voluptatum sapiente facilis quo odio aut ipsum repellat
                                debitis. Molestiae et autem libero. Explicabo et quod
                                necessitatibus similique quis dolor eum. Numquam eaque
                                praesentium rem et qui nesciunt.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="portfolio-info">
                            <h3>Informasi Berita</h3>
                            <ul>
                                <li><strong>Kategori</strong> Internal</li>
                                <li><strong>Penulis</strong>Admin Desa</li>
                                <li><strong>Tanggal Berita</strong> 01 March, 2020</li>
                                <!-- <li>
                        <strong>Project URL</strong> <a href="#">www.example.com</a>
                      </li>
                      <li>
                        <a href="#" class="btn-visit align-self-start"
                          >Visit Website</a
                        >
                      </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Portfolio Details Section -->
    </main>
@endsection
