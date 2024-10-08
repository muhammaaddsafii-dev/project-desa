@extends('application.layouts.master')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h3 class="mb-2 mb-lg-0"><b>BERITA DESA</b></h3>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">
            <div class="container">
                <div class="row gy-4">
                    @foreach ($news as $newsItem)
                        <div class="col-lg-4">
                            <article>
                                <div class="post-img">
                                    <img src="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $newsItem->image }}"
                                        alt="" class="img-fluid" />
                                </div>

                                <h2 class="title">
                                    <a href="{{ route('news.details', ['slug' => $newsItem->slug]) }}">{{ $newsItem->title }}</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="assets/img/blog/blog-author.png" alt=""
                                        class="img-fluid post-author-img flex-shrink-0" />
                                    <div class="post-meta">
                                        <p class="post-author">Maria Doe</p>
                                        {{-- <p class="post-date">
                                            <time datetime="2022-01-01">Jan 1, 2022</time>
                                        </p> --}}
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- End post list item -->
                    @endforeach
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
                    {{ $news->links() }}
                </div>
            </div>
        </section>
        <!-- /Pagination 2 Section -->
    </main>
@endsection
