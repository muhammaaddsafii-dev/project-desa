@extends('application.layouts.master')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h5 class="mb-2 mb-lg-0"><b>DETAIL BERITA</b></h5>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Beranda</a></li>
                        <li class="current">Detail Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Details Section -->
                    <div id="blog-details" class="blog-details section">
                        <div class="container">
                            <article class="article">
                                <div class="post-img">
                                    <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid" />
                                </div>

                                <h2 class="title">
                                    {{ $news->title }}
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-person"></i>
                                            <a href="blog-details.html">{{ $news->author->name }}</a>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-clock"></i>
                                            <a href="blog-details.html"><time
                                                    datetime="2020-01-01">{{ $news->published_at }}</time></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End meta top -->

                                <div class="content">

                                    {!! $news->content !!}

                                </div>
                                <!-- End post content -->
                            </article>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 sidebar">
                    <div class="widgets-container">
                        <!-- Search Widget -->
                        {{-- <div class="search-widget widget-item">
                            <h3 class="widget-title">Pencarian</h3>
                            <form action="">
                                <input type="text" />
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div> --}}
                        <!--/Search Widget -->

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">
                            <h3 class="widget-title">Berita Lain</h3>
                            @foreach($recentNews as $item)
                            <div class="post-item">
                                <img src="https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/{{ $item->image }}" alt="" class="flex-shrink-0" />
                                <div>
                                    <h4>
                                        <a href="/detail-berita/{{$item->slug}}">{{$item->title}}</a>
                                    </h4>
                                    <time datetime="2020-01-01">{{$item->published_at}}</time>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--/Recent Posts Widget -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
