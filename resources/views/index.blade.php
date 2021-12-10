<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pure Ocean</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('tema_pub/assets/img/logo/icon.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/ticker-style.css') }}">
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('tema_pub/assets/css/style.css') }}">
</head>

<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ asset('tema_pub/assets/img/logo/logo.jpeg') }}" alt="100">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-sm-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li class="title"><span class="flaticon-energy"></span> trending-title</li>
                                    <li>Class property employ ancho red multi level mansion</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-date">
                                    <li><span class="flaticon-calendar"></span> +880166 253 232</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid gray-bg">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                            <div class="">
                                <a href="/"><img src="{{ asset('tema_pub/assets/img/logo/logo.jpeg') }}" alt="70" width="200"></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="{{ asset('tema_pub/assets/img/gallery/header_card.png') }}" alt="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="/"><img src="{{ asset('tema_pub/assets/img/logo/logo.jpeg') }}" alt=""></a>
                            </div>
                            <!-- Main-menu menu principal -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/">Principal</a></li>
                                        <li><a href="sobre">Sobre</a></li>
                                        <li><a href="contato">Contato</a></li>
                                        <li><a href="#">Links Úteis</a>
                                            <ul class="submenu">
                                                <li><a target="_blank" href="http://www.cruzeiro.com.br">Site do Maior de Minas</a></li>
                                                <li><a target="_blank" href="https://pt.wikipedia.org/wiki/Cruzeiro_Esporte_Clube">Cruzeiro Wikipedia</a></li>
                                                <li><a target="_blank" href="https://cruzeiropedia.org/P%C3%A1gina_principal">CruzeiroPédia</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="header-right f-right d-none d-lg-block">
                                <!-- Heder social -->
                                <ul class="header-social">
                                    <li><a href="https://www.fb.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                                <!-- Search Nav -->
                                <div class="nav-search search-switch">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="slider-active">
                            @if(!is_null($noticias))
                                @foreach($noticias as $key => $value)
                                    <div class="single-slider">
                                        <div class="trending-top mb-30">
                                            <div class="trend-top-img">
                                                <img src="storage/img_noticia/{{$value->url_img}}" alt="">
                                                <div class="trend-top-cap">
                                                    <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">Business</span>
                                                    <h2><a href="noticias/{{$value->id}}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{$value->titulo}}</a></h2>
                                                    <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">by {{$value->autor}} - {{$value->created_at->format('d/m/Y H:m')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                            <!-- Trending Top# TEXTO PRINCIPAL -->
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="storage/url_img/{{$texto->url_img}}" alt="">
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgb">TEMA</span>
                                            <h2><a href="principal/{{$texto->id}}">{{$texto->titulo}}</a></h2>
                                            <p>{{$texto->autor}}  - {{$texto->created_at->format('d/m/Y H:m')}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="embededContent oembed-provider- oembed-provider-youtube" data-align="none" data-maxheight="1080" data-maxwidth="1920" data-oembed="https://www.youtube.com/watch?v={{ $videos->url_video }}" data-oembed_provider="youtube" data-resizetype="responsive"><br>
                                        <iframe allowfullscreen="true" allowscriptaccess="always" scrolling="no" src="//www.youtube.com/embed/{{ $videos->url_video }}?wmode=transparent&amp;jqoemcache=EvEVO" width="100%" height="200px" frameborder="0"></iframe>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->

    <!--   Weekly2-News start -->
    <div class="weekly2-news-area pt-50 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner -->
                    <div class="col-lg-3">
                        <div class="home-banner2 d-none d-lg-block">
                            <img src="{{ asset('tema_pub/assets/img/gallery/body_card2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4>Most Popular</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex">
                                        <!-- Single -->
                                        @if(!is_null($noticias))
                                            @foreach($noticias as $key => $value)
                                                <div class="weekly2-single">
                                                    <div class="weekly2-img">
                                                        <img src="storage/img_noticia/{{$value->url_img}}" alt="">
                                                    </div>
                                                    <div class="weekly2-caption">
                                                        <h4><a href="/noticias/{{$value->id}}">{{$value->titulo}}</a></h4>
                                                        <p>{{$value->autor}}  |  {{$value->created_at->format('d/m/Y H:m')}}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->


</main>
<footer>
    <!-- Footer Start-->
    <div class="footer-main footer-bg">

        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Search model Begin -->
<div class="search-model-box">
    <div class="d-flex align-items-center h-100 justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- JS here -->

    <script src="{{ asset('tema_pub/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('tema_pub/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('tema_pub/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('tema_pub/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('tema_pub/assets/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('tema_pub/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('tema_pub/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('tema_pub/assets/js/contact.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('tema_pub/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('tema_pub/assets/js/main.js') }}"></script>

</body>
</html>
