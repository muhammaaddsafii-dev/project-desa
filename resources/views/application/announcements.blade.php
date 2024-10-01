@extends('application.layouts.master')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h3 class="mb-2 mb-lg-0"><b>PENGUMUMAN</b></h3>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Pengumuman</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Blog Posts Section -->
        <section id="faq" class="faq section" style="background-color: #e2fbff">
            <div class="container-fluid">
                <div class="row gy-4">
                    <div class="col-lg-12 d-flex flex-column justify-content-center order-2 order-lg-1">
                        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100" style="text-align: center">
                            <h3 style="color: #df1529">
                                <b>PENGUMUMAN</b>
                            </h3>
                            <p>Informasi terkait segala pengumuman di Desa Kemasan.</p>
                        </div>
    
                        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
                            @foreach ($announcements as $announcement)
                            <div class="faq-item">
                                <i class="faq-icon bi bi-info-circle-fill"></i>
                                <h3>
                                    <b>{{ $announcement->title }}</b> |
                                    <span class="badge bg-danger" style="color: white">{{ $announcement->published_at
                                        }}</span>
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
        <!-- /Blog Posts Section -->

        <!-- Pagination 2 Section -->
        <section id="pagination-2" class="pagination-2 section">
            {{-- <div class="container">
                <div class="d-flex justify-content-center">
                    <ul>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
            </div> --}}
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    {{ $announcements->links() }}
                </div>
            </div>
        </section>
        <!-- /Pagination 2 Section -->
    </main>
@endsection
