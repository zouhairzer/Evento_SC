<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Event HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- CSS here -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets/css/slicknav.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/gijgo.css">
	<link rel="stylesheet" href="/assets/css/animate.min.css">
	<link rel="stylesheet" href="/assets/css/magnific-popup.css">
	<link rel="stylesheet" href="/assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="/assets/css/themify-icons.css">
	<link rel="stylesheet" href="/assets/css/slick.css">
	<link rel="stylesheet" href="/assets/css/nice-select.css">
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
<header>
    <!--? Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="index.html"><img src="/assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a style="color:blue; " onmouseover="this.style.backgroundColor='#e6e6e6'" onmouseout="this.style.backgroundColor='white'" href="/login">Sign In</a></li>
                                        <li><a style="color:blue; " onmouseover="this.style.backgroundColor='#e6e6e6'" onmouseout="this.style.backgroundColor='white'" href="/register">Sign up</a></li>
                                        <li>
                                            <form action="/logout" method="get">
                                                @csrf
                                                <button type="submit" style="border:none; background:white; color:blue; cursor: pointer;" onmouseover="this.style.backgroundColor='#e6e6e6'" onmouseout="this.style.backgroundColor='white'">logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            </div>
                        </div>
                    </div>   
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
</main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-9 col-sm-10">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay=".1s">Committed to success</span>
                                <h1 data-animation="fadeInLeft" data-delay=".5s">Evento</h1>
                                <!-- Hero-btn -->
                                <div class="slider-btns">
                                    <li>
                                        <form action="{{ route('search')}}" method="GET">
                                            <div class="input-group">
                                                <div class="form-outline">
                                                    <input id="search-input" type="search" id="form1" name="search" class="form-control" />
                                                </div>
                                                <!-- Add margin to the button and make it smaller -->
                                                <button id="search-button" type="submit" style="border:none; background:blue;  cursor: pointer;" onmouseover="this.style.backgroundColor='#33B2FF'" onmouseout="this.style.backgroundColor='blue'">Search</button>
                                            </div>
                                        </form>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-9 col-sm-10">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay=".1s">Committed to success</span>
                                <h1 data-animation="fadeInLeft" data-delay=".5s">Digital Conference For Designers</h1>
                                <!-- Hero-btn -->
                                <div class="slider-btns">
                                    <a data-animation="fadeInLeft" data-delay="1.0s" href="industries.html" class="btn hero-btn">Download</a>
                                    <a data-animation="fadeInRight" data-delay="1.0s" class="popup-video video-btn"  href="https://www.youtube.com/watch?v=up68UAfH0d0">
                                        <i class="fas fa-play"></i></a>
                                    <p class="video-cap d-none d-sm-blcok" data-animation="fadeInRight" data-delay="1.0s">Story Vidoe<br> Watch</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
        <!-- Counter Section Begin -->
        <div class="counter-section d-none d-sm-block">
            <div class="cd-timer" id="countdown" >
                <div class="cd-item">
                    <span>96</span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span>15</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>07</span>
                    <p>Min</p>
                </div>
                <div class="cd-item">
                    <span>02</span>
                    <p>Sec</p>
                </div>
            </div>
        </div>
        <!-- Counter Section End -->
    </div>
    <!-- slider Area End-->
    <!-- About Law Start -->
    <section class="about-low-area section-padding2">
        <div class="container">
            <a href="#" type="button" class="btn btn-outline-success" style="border-radius: 40px; padding: 10px 10px; font-size: 14px;">
                Check
            </a>
            @if(session('Accpeter'))
                <div class="alert alert-success d-flex justify-content-center">
                    {{ session('Accpeter') }}
                </div>
            @endif
            @if(session('Rejecter'))
                <div class="alert alert-danger d-flex justify-content-center">
                    {{ session('Rejecter') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <h2>{{ $details->titre }}</h2>
                        </div>
                        <p>{{ $details->description }}</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <div class="single-caption mb-20">
                                <div class="caption-icon">
                                    <span class="flaticon-communications-1"></span>
                                </div>
                                <div class="caption">
                                    <h5>Where</h5>
                                    <p>{{ $details->lieu }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <div class="single-caption mb-20">
                                <div class="caption-icon">
                                    <span class="flaticon-education"></span>
                                </div>
                                <div class="caption">
                                    <h5>When</h5>
                                    <p>Dtae début : {{ $details->date }}</p>
                                    <p>Dtae fin : {{ $details->date_fin }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center;">
                            <form action="/get/ticket" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $details->user_id }}">
                                <input type="hidden" name="event_id" value="{{ $details->id }}">
                                <button type="submit" class="btn mt-50">{{ $details->prix }} DH</button>
                            </form>
                            <a href="/" class="text-body text-sm font-weight-bold mx-5 icon-move-right mt-5" href="javascript:;">
                                Back TO
                                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                            </a>
                            @foreach($reservation as $reservations)
                                @if($reservations->status === 'accepter')
                                    <div style="text-align: center; margin-top: 50px;">
                                        <form action="/get/pdf/{{ $details->id }}" method="post">
                                            @csrf
                                            <button type="submit" style="background-color: green; color:white; border-radius: 10px; width: 100px; cursor:pointer;"> 
                                                Get Ticket 
                                                <i class="fas fa-arrow-down" style="margin-left: 5px;"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="/images/{{ $details->image }}" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="/images/{{ $details->image }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    </main>
    
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding pt-5">
            <div class="container">
               <!--  -->
               <div class="row footer-wejed justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <!-- logo -->
                        <div class="footer-logo mb-20">
                        <a href="index.html"><img src="/assets/img/logo/logo2_footer.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>5000+</span>
                        <p>Talented Hunter</p>
                    </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>451</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <!-- Footer Bottom Tittle -->
                        <div class="footer-tittle-bottom">
                            <span>568</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
               </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex justify-content-between align-items-center">
                         <div class="col-xl-10 col-lg-8 ">
                             <div class="footer-copy-right">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                         </div>
                         <div class="col-xl-2 col-lg-4">
                             <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
      <!-- Scroll Up -->
      <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/animated.headline.js"></script>
    <script src="/assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="/assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <script src="/assets/js/jquery.sticky.js"></script>
    
    <!-- counter , waypoint -->
    <script src="/assets/js/jquery.counterup.min.js"></script>
    <script src="/assets/js/waypoints.min.js"></script>
    <script src="/assets/js/jquery.countdown.min.js"></script>
    <!-- contact js -->
    <script src="/assets/js/contact.js"></script>
    <script src="/assets/js/jquery.form.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <script src="/assets/js/mail-script.js"></script>
    <script src="/assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/main.js"></script>
    
    </body>
</html>