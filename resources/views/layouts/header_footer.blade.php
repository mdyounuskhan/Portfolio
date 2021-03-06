<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>The Plaza - eCommerce Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="The Plaza eCommerce Template">
    <meta name="keywords" content="plaza, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{asset('frontend')}}/img/favicon.ico" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/animate.css" />


    <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section header-normal">
        <div class="container-fluid">
            <!-- logo -->
            <div class="site-logo">
                <a href="{{ url('/') }}"><img src="{{asset('frontend')}}/img/logo.png" alt="logo"></a>
            </div>
            <!-- responsive -->
            <div class="nav-switch">
                <i class="fa fa-bars"></i>
            </div>
            <div class="header-right">
                <a href="{{url('cart')}}" class="card-bag"><img src="{{asset('frontend')}}/img/icons/bag.png"
                        alt=""><span>{{App\Cart::where('customer_ip', $_SERVER['REMOTE_ADDR'])->count()}}</span></a>
                <a href="#" class="search"><img src="{{asset('frontend')}}/img/icons/search.png" alt=""></a>
            </div>
            <!-- site menu -->
            <ul class="main-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                @php
                $menus = App\Category::where('menu_status',1)->get();
                @endphp
                @foreach ($menus as $menu)
                <li><a href=" {{ url('category/product') }}/{{ $menu->id }} "> {{ $menu->category_name }} </a></li>
                @endforeach
                <li><a href="{{ url('contact') }}">Contact</a></li>
            </ul>
        </div>
    </header>
    <!-- Header section end -->







    @yield('content')









    <!-- Footer top section -->
    <section class="footer-top-section home-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-8 col-sm-12">
                    <div class="footer-widget about-widget">
                        <img src="{{asset('frontend')}}img/logo.png" class="footer-logo" alt="">
                        <p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus
                            urna, id dapibus erat iaculis ut. Integer ac sem.</p>
                        <div class="cards">
                            <img src="{{asset('frontend')}}/img/cards/card.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">usefull Links</h6>
                        <ul>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Bloggers</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Press</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">Sitemap</h6>
                        <ul>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Bloggers</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Press</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">Shipping & returns</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Track Orders</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">Contact</h6>
                        <div class="text-box">
                            <p>The Plaza Ltd </p>
                            <p>Momtaz Plaza (4th floor), House#7, Road#4 Opposite of Labaid Hospital, Dhaka 1205</p>
                            <p>+8801700000000</p>
                            <p>office@theplaza.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer top section end -->


    <!-- Footer section -->
    <footer class="footer-section">
        <div class="container">
            <p class="copyright">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                    aria-hidden="true"></i> by <a href="" target="_blank">The Plaza</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </footer>
    <!-- Footer section end -->


    <!--====== Javascripts & Jquery ======-->
    <script src="{{asset('frontend')}}/js/jquery-3.2.1.min.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontend')}}/js/mixitup.min.js"></script>
    <script src="{{asset('frontend')}}/js/sly.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.nicescroll.min.js"></script>
    <script src="{{asset('frontend')}}/js/main.js"></script>
</body>

@yield('cupon_apply')

</html>
