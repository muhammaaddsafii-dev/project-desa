@extends('application.layouts.master')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h3 class="mb-2 mb-lg-0"><b>KEGIATAN DESA</b></h3>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Kegiatan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Blog Posts Section -->
        <section id="portfolio" class="portfolio section mt-4">
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
        <!-- /Blog Posts Section -->

        <!-- Pagination 2 Section -->
        <section id="pagination-2" class="pagination-2 section">
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    {{ $activities->links() }}
                </div>
            </div>
        </section>
        <!-- /Pagination 2 Section -->
    </main>
@endsection
