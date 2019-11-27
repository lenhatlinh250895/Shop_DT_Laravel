<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index28:48-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home Version One || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <base href="{{asset('')}}">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="{{asset('public/css/material-design-iconic-font.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/css/font-awesome.min.css')}}">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="{{asset('public/css/fontawesome-stars.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('public/css/meanmenu.css')}}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{asset('public/css/owl.carousel.min.css')}}">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="{{asset('public/css/slick.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('public/css/animate.css')}}">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="{{asset('public/css/jquery-ui.min.css')}}">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="{{asset('public/css/venobox.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('public/css/nice-select.css')}}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset('public/css/magnific-popup.css')}}">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="{{asset('public/css/helper.css')}}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('public/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('public/css/responsive.css')}}">
        <!-- Modernizr js -->
        <script src="{{asset('public/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            @include('frontend.layout.header')
            <!-- Header Area End Here -->
            @include('frontend.layout.menu')
            @yield('content')
            <!-- Begin Footer Area -->
            @include('frontend.layout.footer')
        </div>
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="{{asset('public/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('public/js/vendor/popper.min.js')}}"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
        <!-- Ajax Mail js -->
        <script src="{{asset('public/js/ajax-mail.js')}}"></script>
        <!-- Meanmenu js -->
        <script src="{{asset('public/js/jquery.meanmenu.min.js')}}"></script>
        <!-- Wow.min js -->
        <script src="{{asset('public/js/wow.min.js')}}"></script>
        <!-- Slick Carousel js -->
        <script src="{{asset('public/js/slick.min.js')}}"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific popup js -->
        <script src="{{asset('public/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Isotope js -->
        <script src="{{asset('public/js/isotope.pkgd.min.js')}}"></script>
        <!-- Imagesloaded js -->
        <script src="{{asset('public/js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- Mixitup js -->
        <script src="{{asset('public/js/jquery.mixitup.min.js')}}"></script>
        <!-- Countdown -->
        <script src="{{asset('public/js/jquery.countdown.min.js')}}"></script>
        <!-- Counterup -->
        <script src="{{asset('public/js/jquery.counterup.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{asset('public/js/waypoints.min.js')}}"></script>
        <!-- Barrating -->
        <script src="{{asset('public/js/jquery.barrating.min.js')}}"></script>
        <!-- Jquery-ui -->
        <script src="{{asset('public/js/jquery-ui.min.js')}}"></script>
        <!-- Venobox -->
        <script src="{{asset('public/js/venobox.min.js')}}"></script>
        <!-- Nice Select js -->
        <script src="{{asset('public/js/jquery.nice-select.min.js')}}"></script>
        <!-- ScrollUp js -->
        <script src="{{asset('public/js/scrollUp.min.js')}}"></script>
        <!-- Main/Activator js -->
        <script src="{{asset('public/js/main.js')}}"></script>
        <script src="public/js/script.js"></script>
        <script>
            $(document).ready(function() {
                $("#updatecart").click(function() {
                    $('#tbl_cart > tbody > tr').each(function(){
                    var id = (this.id);
                    var qty = $(this).find(".cart-plus-minus-box").val();
                    var token = $("input[name='_token']").val();
                    $.ajax({
                        url: 'updCart',
                        type: 'POST',
                        cache: false,
                        data: {"_token":token,"id":id,"qty":qty},
                        success:function(data){
                            if(data == "oke")
                                location.reload();
                        }
                        });
                    });
        
                }); 
            });
        </script>
    </body>

<!-- index30:23-->
</html>