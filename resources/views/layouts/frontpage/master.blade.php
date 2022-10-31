<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>@yield('title')</title>

<!-- Fav Icon -->
<link rel="icon" href="assets/images/favicon-3.ico" type="image/x-icon">

<!-- Stylesheets -->
<link href="{{asset('asset_frontpage/css/font-awesome-all.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/flaticon.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/owl.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/jquery.fancybox.min.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/color.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/global.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/nice-select.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/jquery-ui.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/elpath.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/style.css')}}" rel="stylesheet">
<link href="{{asset('asset_frontpage/css/responsive.css')}}" rel="stylesheet">
<style>
    @media screen and (max-width: 600px) {
        .site-title{
            display: none;
        }
    }
</style>
@yield('linkheader')
</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper">


        <!-- mouse-pointer -->
        <div class="mouse-pointer style-three" id="mouse-pointer">
            <div class="icon"><i class="far fa-angle-left"></i><i class="far fa-angle-right"></i></div>
        </div>
        <!-- mouse-pointer end -->


        <!-- preloader -->
        {{-- <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">x</div>
                <div id="handle-preloader" class="handle-preloader home-3">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="i" class="letters-loading">
                                i
                            </span>
                            <span data-text-preloader="x" class="letters-loading">
                                x
                            </span>
                        </div>
                    </div>  
                </div>
            </div>
        </div> --}}
        <!-- preloader end -->


        <!--Search Popup-->
        <div id="search-popup" class="search-popup">
            <div class="popup-inner">
                <div class="upper-box clearfix">
                    <figure class="logo-box pull-left"><a href="index.html"><img src="{{asset('asset_frontpage/images/logo-5.png')}}" alt=""></a></figure>
                    <div class="close-search pull-right"><span class="icon-179"></span></div>
                </div>
                <div class="overlay-layer"></div>
                <div class="auto-container">
                    <div class="search-form">
                        <form method="post" action="index.html">
                            <div class="form-group">
                                <fieldset>
                                    <input type="search" class="form-control" name="search-input" value="" placeholder="Type your keyword and hit" required >
                                    <button type="submit"><i class="icon-1"></i></button>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- sidebar cart item -->
        <div class="xs-sidebar-group info-group info-sidebar">
            <div class="xs-overlay xs-bg-black"></div>
            <div class="xs-sidebar-widget">
                <div class="sidebar-widget-container">
                    <div class="widget-heading">
                        <a href="#" class="close-side-widget"><i class="icon-179"></i></a>
                    </div>
                    <div class="sidebar-textwidget">
                        <div class="sidebar-info-contents">
                            <div class="content-inner">
                                <div class="logo">
                                    <a href="index.html"><img src="{{asset('asset_frontpage/images/logo-16.png')}}" alt="" /></a>
                                </div>
                                <div class="text-box">
                                    <h4>About Atrix</h4>
                                    <p>Lorem ipsum dolor amet consectetur adipisicing  sed do eiusmod tempor incididunt labore magna aliqua enim minim veniam nostrud exercitation aboris nis aliquip exeo.</p>
                                </div>
                                <div class="info-inner">
                                    <h4>Find Us Our Location</h4>
                                    <ul class="info clearfix">
                                        <li><i class="icon-180"></i>629 12th St, Modesto, CA 95354 United States</li>
                                        <li><i class="icon-181"></i><a href="mailto:atrixmain@gmail.com">atrixmain@gmail.com</a></li>
                                        <li><i class="icon-182"></i><a href="tel:123045615523">+1 (230)-456-155-23</a></li>
                                    </ul>
                                </div>
                                <div class="social-inner">
                                    <h4>Follow Us On</h4>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END sidebar widget item -->


        <!-- main header -->
        <header class="main-header header-style-two header-style-three">
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo">
                                <a href="/" style="color: white">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-3">
                                            <img src="{{asset('asset_frontpage/images/kota_jambi_logo.png')}}" class="float_right" style="max-width: 50px;" alt="">
                                        </div>
                                        <div class="col-lg-6 col-sm-3 site-title" style="padding-left: 0px !important">
                                            <b>MUSEUM SIGINJEI</b>
                                        </div>
                                    </div>
                                </a>
                            </figure>
                        </div>
                        <div class="menu-area clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix home-menu">
                                        <li class="{{(request()->is('/'))?'current': ''}}">
                                            <a href="/">Home</a>
                                        </li>
                                        <li class="{{(request()->is('koleksi*'))?'current': ''}}">
                                            <a href="{{route('koleksi')}}">Koleksi</a>
                                        </li>
                                        <li class="{{(request()->is('virtual*'))?'current': ''}}">
                                            <a href="/">Virtual Tour</a>
                                        </li>
                                        <li class="{{(request()->is('event*'))?'current': ''}}">
                                            <a href="{{route('event')}}">Kegiatan</a>
                                        </li>
                                        <li class="{{(request()->is('berita*'))?'current': ''}}">
                                            <a href="{{route('berita')}}">Berita</a>
                                        </li>
                                        <li class="{{(request()->is('kontak*'))?'current': ''}}">
                                            <a href="{{route('kontak')}}">Kontak</a>
                                        </li>
                                        <li class="{{(request()->is('tentang*'))?'current': ''}}">
                                            <a href="{{route('tentang')}}">Tentang</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="nav-right">
                            {{-- <div class="search-box-outer search-toggler">
                                <i class="icon-1"></i>
                            </div> --}}
                            {{-- <div class="nav-btn nav-toggler navSidebar-button clearfix">
                                <i class="icon-22"></i>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="index.html"><img src="{{asset('asset_frontpage/images/kota_jambi_logo.png')}}" style="max-width: 50px;" alt=""></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="nav-right">
                            <div class="search-box-outer search-toggler">
                                <i class="icon-1"></i>
                            </div>
                            <div class="nav-btn nav-toggler navSidebar-button clearfix">
                                <i class="icon-22"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                {{-- <div class="nav-logo"><a href="index.html"><img src="{{asset('asset_frontpage/images/mobile-logo.png')}}" alt="" title=""></a></div> --}}
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

        @yield('slider')
        @yield('content')


        <!-- footer-three -->
        <footer class="footer-three p_relative" style="background: #1a2345;">
            <div class="pattern-layer">
                <div class="pattern-1 p_absolute b_0"  data-parallax='{"x": 100}'  style="background-image: url({{asset('asset_frontpage/images/shape/shape-62.png')}});"></div>
                <div class="pattern-2 p_absolute r_0 b_0"  data-parallax='{"x": 100}'  style="background-image: url({{asset('asset_frontpage/images/shape/shape-63.png')}});"></div>
            </div>
            <div class="auto-container">
                <div class="footer-widget-section">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget about-widget wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <figure class="footer-logo p_relative d_block mb_35"><a href="index-3.html"><img src="{{asset('asset_frontpage/images/logo-4.png')}}" alt=""></a></figure>
                                <div class="text">
                                    <p>Lorem ipsum dolor amet consecto adi pisicing elit sed eiusm tempor incididunt labore dolore magna aliqua enim ad minim.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml_80 wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="widget-title">
                                    <h4>Links</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.html">About</a></li>
                                        <li><a href="index.html">Services</a></li>
                                        <li><a href="index.html">Job</a></li>
                                        <li><a href="index.html">opportunities</a></li>
                                        <li><a href="index.html">Location</a></li>
                                        <li><a href="index.html">Article</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                                <div class="widget-title">
                                    <h4>Services</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.html">About</a></li>
                                        <li><a href="index.html">Services</a></li>
                                        <li><a href="index.html">Job</a></li>
                                        <li><a href="index.html">opportunities</a></li>
                                        <li><a href="index.html">Location</a></li>
                                        <li><a href="index.html">Article</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="widget-title">
                                    <h4>Contacts</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list clearfix">
                                        <li>Flat 20, Reynolds Neck, North Helenaville, FV77 8WS</li>
                                        <li><a href="tel:23055873407">+2(305) 587-3407</a></li>
                                        <li><a href="mailto:sample@example.com">sample@example.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="bottom-inner clearfix">
                        <div class="copyright pull-left">
                            <p><a href="index.html">ATRIX</a> &copy; 2021 All Right Reserved</p>
                        </div>
                        <ul class="footer-nav clearfix pull-right">
                            <li><a href="index.html">Terms of Service</a></li>
                            <li><a href="index.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-three end -->


        <!--Scroll to top-->
        <div class="scroll-to-top">
            <div>
                <div class="scroll-top-inner">
                    <div class="scroll-bar">
                        <div class="bar-inner"></div>
                    </div>
                    <div class="scroll-bar-text g_color_2">Go To Top</div>
                </div>
            </div>
        </div>
        <!-- Scroll to top end -->
    </div>

    <script src="{{asset('asset_frontpage/js/jquery.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/popper.min.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/plugins.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/owl.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/wow.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/validation.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/appear.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/scrollbar.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/parallax.min.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/circle-progress.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/jquery.countTo.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/nav-tool.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/isotope.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('asset_frontpage/js/parallax-scroll.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- main-js -->
    <script src="{{asset('asset_frontpage/js/script.js')}}"></script>
    @yield('linkfooter')

</body><!-- End of .page_wrapper -->
</html>
