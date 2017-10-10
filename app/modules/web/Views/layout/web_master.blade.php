<!DOCTYPE html>
<html>
    <head>
        <title>{{$title}}</title>

        <link href="{{ URL::asset('web/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{ URL::asset('web/css/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('web/css/camera.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('web/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
        
        <script type="text/javascript" src="{{ URL::asset('web/scripts/jquery.min.js') }}"></script>
        <script type='text/javascript' src="{{ URL::asset('web/scripts/bootstrap.min.js') }}"></script> 
        <script type='text/javascript' src="{{ URL::asset('web/scripts/jquery.elevatezoom.js') }}"></script> 
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="keywords" content="{{@$meta_keywords}}">
        <meta name="description" content="{{@$meta_description}}">

<script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-83437553-1', 'auto');
          ga('send', 'pageview');

        </script>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="main_container position-relative">
                    <div class="corners top_left"></div>
                    <div class="corners top_right"></div>
                    <div class="corners bottom_left"></div>
                    <div class="corners bottom_right"></div>
                    <div class="top_border"></div>
                    <div class="bottom_border"></div>
                    <div class="border-left"></div>
                    <div class="border-right"></div>

                    <div class="middle_container position-relative">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="header_container">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="row">
                                        <div class="logo_container">
                                            <a href="{{URL::to('')}}">
                                                <img src="{{URL::to('')}}/web/images/logo.png">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="row">
                                        <div class="upper_section">
                                            <div class="hot_line">
                                                <a href="tel:02-95672422">02-95672422</a>
                                            </div>
                                            <ul class="top_menu">
                                                <li>
                                                    <a href="{{URL::to('')}}">Home</a>
                                                </li>           
                                                <li>
                                                    <a href="{{URL::to('')}}/picture-framer">About us</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::to('')}}/picture-framing-rockdale">Contact us</a>
                                                </li>
                                            </ul>
                                            <div class="my_bag_container">
                                                <a href="{{URL::to('')}}/mycart">
                                                    <span class="text">Cart</span>
                                                    <span class="wishlist_amount">(
                                                        @if(Session::has('product_cart'))
                                                            {{count(Session::get('product_cart'))}}
                                                        @else
                                                            0
                                                        @endif
                                                        )</span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="header_address">
                                            <p>425 Princess Highway, Rockdale NSW 2216</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mobile-hotline">

                                    <div class="hot_line">
                                        02-95672422
                                    </div>

                                </div>

                                <div class="mobile-address">                                    
                                    <p>425 Princess Highway, Rockdale NSW 2216</p>
                                </div>

                            </div>
                        </div>

                        @yield('content')


                        <div class="col-md-12">

                            <div class="footer_container">

                                <div class="col-md-3 col-sm-3 col-xs-12 row-left-0">
                                    <div class="footer_logo">
                                        <a href="#">
                                            <img src="{{URL::to('')}}/web/images/footer_logo.png">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <ul class="footer_menu">
                                        <li>
                                            <a href="https://www.facebook.com/offthewallframing/" target="_blank"><img src="{{URL::to('')}}/images/facebook.png"></a>
                                            <a href="https://www.instagram.com/offthewallframing/" target="_blank"><img src="{{URL::to('')}}/images/instagram.png"></a>
                                            <a href="https://plus.google.com/u/0/109347086873122701317/about" target="_blank"><img src="{{URL::to('')}}/images/google-plus.png"></a>
                                        </li>
                                        <li>
                                            <a href="{{URL::to('')}}/about-us">About us</a>
                                        </li>

                                        <li>
                                            <a href="{{URL::to('')}}/terms-and-conditions">Terms And Conditions</a>
                                        </li>

                                        <li>
                                            <a href="{{URL::to('')}}/privacy-security">Privacy & Security</a>
                                        </li>
                                        <!-- <li>
                                            <a href="{{URL::to('')}}/delivery-installation">Delivery & Installation</a>
                                        </li> -->
                                       <!--  <li>
                                            <a href="{{URL::to('')}}/wholesale-customers">Wholesale Customers</a>
                                        </li>
                                        <li>
                                            <a href="{{URL::to('')}}/splashbacks">Splashbacks</a>
                                        </li> -->
                                        <li>
                                            <a href="{{URL::to('')}}/picture-framing-rockdale">Contact us</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <a class="developer_company" href="http://www.visionads.com.au/" rel="nofollow" target="_blank">Seo &amp; Website by VisionsAds</a>

                        </div>


                    </div>

                </div>
            </div>
        </div>  

        <script type="text/javascript">
        var im_domain = 'visionads';
        var im_project_id = 8;
        (function(e,t){window._improvely=[];var n=e.getElementsByTagName("script")[0];var r=e.createElement("script");r.type="text/javascript";r.src="https://"+im_domain+".iljmp.com/improvely.js";r.async=true;n.parentNode.insertBefore(r,n);if(typeof t.init=="undefined"){t.init=function(e,t){window._improvely.push(["init",e,t])};t.goal=function(e){window._improvely.push(["goal",e])};t.conversion=function(e){window._improvely.push(["conversion",e])};t.label=function(e){window._improvely.push(["label",e])}}window.improvely=t;t.init(im_domain,im_project_id)})(document,window.improvely||[])
        </script>


    </body>
</html>
                                
                            