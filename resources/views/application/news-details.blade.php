@extends('application.layouts.master')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h3 class="mb-2 mb-lg-0"><b>DETAIL BERITA</b></h3>
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
                                    Dolorum optio tempore voluptas dignissimos cumque fuga qui
                                    quibusdam quia
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-person"></i>
                                            <a href="blog-details.html">John Doe</a>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-clock"></i>
                                            <a href="blog-details.html"><time datetime="2020-01-01">Jan 1, 2022</time></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End meta top -->

                                <div class="content">
                                    <p>
                                        Similique neque nam consequuntur ad non maxime aliquam
                                        quas. Quibusdam animi praesentium. Aliquam et laboriosam
                                        eius aut nostrum quidem aliquid dicta. Et eveniet enim.
                                        Qui velit est ea dolorem doloremque deleniti aperiam unde
                                        soluta. Est cum et quod quos aut ut et sit sunt. Voluptate
                                        porro consequatur assumenda perferendis dolore.
                                    </p>

                                    <p>
                                        Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt
                                        non reiciendis. Sequi in accusamus harum vel aspernatur.
                                        Excepturi numquam nihil cumque odio. Et voluptate
                                        cupiditate.
                                    </p>

                                    <blockquote>
                                        <p>
                                            Et vero doloremque tempore voluptatem ratione vel aut.
                                            Deleniti sunt animi aut. Aut eos aliquam doloribus minus
                                            autem quos.
                                        </p>
                                    </blockquote>

                                    <p>
                                        Sed quo laboriosam qui architecto. Occaecati repellendus
                                        omnis dicta inventore tempore provident voluptas mollitia
                                        aliquid. Id repellendus quia. Asperiores nihil magni dicta
                                        est suscipit perspiciatis. Voluptate ex rerum assumenda
                                        dolores nihil quaerat. Dolor porro tempora et quibusdam
                                        voluptas. Beatae aut at ad qui tempore corrupti velit
                                        quisquam rerum. Omnis dolorum exercitationem harum qui qui
                                        blanditiis neque. Iusto autem itaque. Repudiandae hic quae
                                        aspernatur ea neque qui. Architecto voluptatem magni. Vel
                                        magnam quod et tempora deleniti error rerum nihil tempora.
                                    </p>

                                    <h3>Et quae iure vel ut odit alias.</h3>
                                    <p>
                                        Officiis animi maxime nulla quo et harum eum quis a. Sit
                                        hic in qui quos fugit ut rerum atque. Optio provident
                                        dolores atque voluptatem rem excepturi molestiae qui.
                                        Voluptatem laborum omnis ullam quibusdam perspiciatis
                                        nulla nostrum. Voluptatum est libero eum nesciunt aliquid
                                        qui. Quia et suscipit non sequi. Maxime sed odit. Beatae
                                        nesciunt nesciunt accusamus quia aut ratione aspernatur
                                        dolor. Sint harum eveniet dicta exercitationem minima.
                                        Exercitationem omnis asperiores natus aperiam dolor
                                        consequatur id ex sed. Quibusdam rerum dolores sint
                                        consequatur quidem ea. Beatae minima sunt libero soluta
                                        sapiente in rem assumenda. Et qui odit voluptatem. Cum
                                        quibusdam voluptatem voluptatem accusamus mollitia aut
                                        atque aut.
                                    </p>
                                    <img src="assets/img/blog/blog-inside-post.jpg" class="img-fluid" alt="" />

                                    <h3>
                                        Ut repellat blanditiis est dolore sunt dolorum quae.
                                    </h3>
                                    <p>
                                        Rerum ea est assumenda pariatur quasi et quam. Facilis nam
                                        porro amet nostrum. In assumenda quia quae a id
                                        praesentium. Quos deleniti libero sed occaecati aut porro
                                        autem. Consectetur sed excepturi sint non placeat quia
                                        repellat incidunt labore. Autem facilis hic dolorum
                                        dolores vel. Consectetur quasi id et optio praesentium aut
                                        asperiores eaque aut. Explicabo omnis quibusdam esse. Ex
                                        libero illum iusto totam et ut aut blanditiis. Veritatis
                                        numquam ut illum ut a quam vitae.
                                    </p>
                                    <p>
                                        Alias quia non aliquid. Eos et ea velit. Voluptatem maxime
                                        enim omnis ipsa voluptas incidunt. Nulla sit eaque
                                        mollitia nisi asperiores est veniam.
                                    </p>
                                </div>
                                <!-- End post content -->
                            </article>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 sidebar">
                    <div class="widgets-container">
                        <!-- Search Widget -->
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">Pencarian</h3>
                            <form action="">
                                <input type="text" />
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                        <!--/Search Widget -->

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">
                            <h3 class="widget-title">Berita Lain</h3>

                            <div class="post-item">
                                <img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0" />
                                <div>
                                    <h4>
                                        <a href="blog-details.html">Nihil blanditiis at in nihil autem</a>
                                    </h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div>
                            <!-- End recent post item-->

                            <div class="post-item">
                                <img src="assets/img/blog/blog-recent-2.jpg" alt="" class="flex-shrink-0" />
                                <div>
                                    <h4>
                                        <a href="blog-details.html">Quidem autem et impedit</a>
                                    </h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div>
                            <!-- End recent post item-->

                            <div class="post-item">
                                <img src="assets/img/blog/blog-recent-3.jpg" alt="" class="flex-shrink-0" />
                                <div>
                                    <h4>
                                        <a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a>
                                    </h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div>
                            <!-- End recent post item-->

                            <div class="post-item">
                                <img src="assets/img/blog/blog-recent-4.jpg" alt="" class="flex-shrink-0" />
                                <div>
                                    <h4>
                                        <a href="blog-details.html">Laborum corporis quo dara net para</a>
                                    </h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div>
                            <!-- End recent post item-->

                            <div class="post-item">
                                <img src="assets/img/blog/blog-recent-5.jpg" alt="" class="flex-shrink-0" />
                                <div>
                                    <h4>
                                        <a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a>
                                    </h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div>
                            <!-- End recent post item-->
                        </div>
                        <!--/Recent Posts Widget -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
