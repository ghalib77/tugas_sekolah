@extends('.layouts.master')

@section('children')
    @include('.layouts.appbar')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Home</h1>
            </div>
            <!-- Hero -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                            <h2>Welcome Back, Admin!</h2>
                            <p class="lead">feel free to use our feature to manage your data.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <div class="section-body">
                <!-- Section article -->
                <div>
                    <h2 class="section-title">Article Pendidikan</h2>
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4">
                            <article class="article article-style-c">
                                <div class="article-header">
                                    <div class="article-image" data-background="../assets/img/news/img13.jpg">
                                    </div>
                                </div>
                                <div class="article-details">
                                    <div class="article-category"><a href="#">News</a>
                                        <div class="bullet"></div> <a href="#">5 Days</a>
                                    </div>
                                    <div class="article-title">
                                        <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                    </div>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. </p>
                                    <div class="article-user">
                                        <img alt="image" src="../assets/img/avatar/avatar-1.png">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a href="#">Hasan Basri</a>
                                            </div>
                                            <div class="text-job">Web Developer</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="section-title">Article Politik</h2>
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4">
                            <article class="article article-style-c">
                                <div class="article-header">
                                    <div class="article-image" data-background="../assets/img/news/img13.jpg">
                                    </div>
                                </div>
                                <div class="article-details">
                                    <div class="article-category"><a href="#">News</a>
                                        <div class="bullet"></div> <a href="#">5 Days</a>
                                    </div>
                                    <div class="article-title">
                                        <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                    </div>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. </p>
                                    <div class="article-user">
                                        <img alt="image" src="../assets/img/avatar/avatar-1.png">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a href="#">Hasan Basri</a>
                                            </div>
                                            <div class="text-job">Web Developer</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="section-title">Article Social</h2>
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4">
                            <article class="article article-style-c">
                                <div class="article-header">
                                    <div class="article-image" data-background="../assets/img/news/img13.jpg">
                                    </div>
                                </div>
                                <div class="article-details">
                                    <div class="article-category"><a href="#">News</a>
                                        <div class="bullet"></div> <a href="#">5 Days</a>
                                    </div>
                                    <div class="article-title">
                                        <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                    </div>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. </p>
                                    <div class="article-user">
                                        <img alt="image" src="../assets/img/avatar/avatar-1.png">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a href="#">Hasan Basri</a>
                                            </div>
                                            <div class="text-job">Web Developer</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
    @include('.layouts.footer')
    @include('.layouts.sidebar')
@stop
