<!DOCTYPE html>
<!-- saved from url=www/html/miracle/miracle_template.html -->
<html class=" js canvas canvastext no-touch cssanimations csstransforms csstransforms3d csstransitions">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Page Title -->
    <title>Miracle | Responsive Multi-Purpose HTML5 Template</title>
    <link rel="shortcut icon" href="images/favicon.png">

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="description" content="Miracle | Responsive Multi-Purpose HTML5 Template">
    <meta name="author" content="SoapTheme">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Theme Styles -->


    <link href="{{ URL::asset('etsb/web_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('etsb/web_assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('etsb/web_assets/css/css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('etsb/web_assets/css/css3') }}" rel="stylesheet" type="text/css" >

    <link href="{{ URL::asset('etsb/web_assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('etsb/web_assets/css/owl.transitions.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('etsb/web_assets/css/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('etsb/web_assets/css/custom.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('etsb/web_assets/slider_assets/css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" >

    <link href="{{ URL::asset('etsb/web_assets/slider_assets/layerslider/css/layerslider.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('etsb/web_assets/slider_assets/css/style2.css') }}" rel="stylesheet" type="text/css" >

    <script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/respond.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/jquery-1.9.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/jssor.slider.mini.js') }}"></script>

</head>
<body>
<div id="page-wrapper">
    <header id="header" class="header-color-white header-sticky">
        @include('web::layout.header')
    </header>

    @yield('content')

    <footer id="footer" class="style4">

        {{$as}}

        @include('web::layout.footer')
    </footer>
</div>

<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/jquery-2.1.3.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/jquery.noconflict.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/modernizr.2.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/jquery-ui.1.11.2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/jquery.plugins.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/js/main.js') }}"></script>


<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/slider_assets/layerslider/js/layerslider.kreaturamedia.jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/slider_assets/js/bootstrap.file-input.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/web_assets/slider_assets/js/custom.js') }}"></script>

</body>
</html>


{{--
<script>
    jQuery(document).ready(function ($) {

        var jssor_1_SlideoTransitions = [
            [{b:5500.0,d:3000.0,o:-1.0,r:240.0,e:{r:2.0}}],
            [{b:-1.0,d:1.0,o:-1.0,c:{x:51.0,t:-51.0}},{b:0.0,d:1000.0,o:1.0,c:{x:-51.0,t:51.0},e:{o:7.0,c:{x:7.0,t:7.0}}}],
            [{b:-1.0,d:1.0,o:-1.0,sX:9.0,sY:9.0},{b:1000.0,d:1000.0,o:1.0,sX:-9.0,sY:-9.0,e:{sX:2.0,sY:2.0}}],
            [{b:-1.0,d:1.0,o:-1.0,r:-180.0,sX:9.0,sY:9.0},{b:2000.0,d:1000.0,o:1.0,r:180.0,sX:-9.0,sY:-9.0,e:{r:2.0,sX:2.0,sY:2.0}}],
            [{b:-1.0,d:1.0,o:-1.0},{b:3000.0,d:2000.0,y:180.0,o:1.0,e:{y:16.0}}],
            [{b:-1.0,d:1.0,o:-1.0,r:-150.0},{b:7500.0,d:1600.0,o:1.0,r:150.0,e:{r:3.0}}],
            [{b:10000.0,d:2000.0,x:-379.0,e:{x:7.0}}],
            [{b:10000.0,d:2000.0,x:-379.0,e:{x:7.0}}],
            [{b:-1.0,d:1.0,o:-1.0,r:288.0,sX:9.0,sY:9.0},{b:9100.0,d:900.0,x:-1400.0,y:-660.0,o:1.0,r:-288.0,sX:-9.0,sY:-9.0,e:{r:6.0}},{b:10000.0,d:1600.0,x:-200.0,o:-1.0,e:{x:16.0}}]
        ];

        var jssor_1_options = {
            $AutoPlay: true,
            $SlideDuration: 800,
            $SlideEasing: $Jease$.$OutQuint,
            $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizing
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 1920);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });

</script>--}}
