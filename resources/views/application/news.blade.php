@extends('application.layouts.master')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h3 class="mb-2 mb-lg-0"><b>BERITA DESA</b></h3>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Beranda</a></li>
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
                    <div class="col-lg-4">
                        <article>
                            <div class="post-img">
                                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid" />
                            </div>

                            <p class="post-category">Politics</p>

                            <h2 class="title">
                                <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0" />
                                <div class="post-meta">
                                    <p class="post-author">Maria Doe</p>
                                    <p class="post-date">
                                        <time datetime="2022-01-01">Jan 1, 2022</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- End post list item -->

                    <div class="col-lg-4">
                        <article>
                            <div class="post-img">
                                <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid" />
                            </div>

                            <p class="post-category">Sports</p>

                            <h2 class="title">
                                <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author-2.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0" />
                                <div class="post-meta">
                                    <p class="post-author">Allisa Mayer</p>
                                    <p class="post-date">
                                        <time datetime="2022-01-01">Jun 5, 2022</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- End post list item -->

                    <div class="col-lg-4">
                        <article>
                            <div class="post-img">
                                <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid" />
                            </div>

                            <p class="post-category">Entertainment</p>

                            <h2 class="title">
                                <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et
                                    soluta</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author-3.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0" />
                                <div class="post-meta">
                                    <p class="post-author">Mark Dower</p>
                                    <p class="post-date">
                                        <time datetime="2022-01-01">Jun 22, 2022</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- End post list item -->

                    <div class="col-lg-4">
                        <article>
                            <div class="post-img">
                                <img src="assets/img/blog/blog-4.jpg" alt="" class="img-fluid" />
                            </div>

                            <p class="post-category">Sports</p>

                            <h2 class="title">
                                <a href="blog-details.html">Non rem rerum nam cum quo minus olor distincti</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author-4.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0" />
                                <div class="post-meta">
                                    <p class="post-author">Lisa Neymar</p>
                                    <p class="post-date">
                                        <time datetime="2022-01-01">Jun 30, 2022</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- End post list item -->

                    <div class="col-lg-4">
                        <article>
                            <div class="post-img">
                                <img src="assets/img/blog/blog-5.jpg" alt="" class="img-fluid" />
                            </div>

                            <p class="post-category">Politics</p>

                            <h2 class="title">
                                <a href="blog-details.html">Accusamus quaerat aliquam qui debitis facilis
                                    consequatur</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author-5.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0" />
                                <div class="post-meta">
                                    <p class="post-author">Denis Peterson</p>
                                    <p class="post-date">
                                        <time datetime="2022-01-01">Jan 30, 2022</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- End post list item -->

                    <div class="col-lg-4">
                        <article>
                            <div class="post-img">
                                <img src="assets/img/blog/blog-6.jpg" alt="" class="img-fluid" />
                            </div>

                            <p class="post-category">Entertainment</p>

                            <h2 class="title">
                                <a href="blog-details.html">Distinctio provident quibusdam numquam aperiam aut</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author-6.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0" />
                                <div class="post-meta">
                                    <p class="post-author">Mika Lendon</p>
                                    <p class="post-date">
                                        <time datetime="2022-01-01">Feb 14, 2022</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- End post list item -->
                </div>
            </div>
        </section>
        <!-- /Blog Posts Section -->

        <!-- Pagination 2 Section -->
        <section id="pagination-2" class="pagination-2 section">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <ul>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- /Pagination 2 Section -->
    </main>
@endsection
