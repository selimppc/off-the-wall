<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png?v=kPPlxk2lY8">
    <meta name="theme-color" content="#e2e4ff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="csrf_token" content="e2555755-9d35-490a-9a83-abc401c5c629">
    <title>Custom Plain Mirrors & Framing | Off The Wall</title>
    <meta name="description" content="Plain mirrors cut to size and framed to your designs."/>
    
    <link rel="stylesheet" href="{{ URL::asset('web/photo_frame/plain_mirror/static/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('web/photo_frame/plain_mirror/static/css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/plain_mirror/static/css/lightcase/font-lightcase.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/plain_mirror/static/css/lightcase/lightcase.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/plain_mirror/static/css/frameshop-w.css?v=1.0.3d') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/plain_mirror/static/css/flaticon/flaticon.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/static/css/custom.css') }}">
    
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/lodash.min.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/PxLoader.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/PxLoaderImage.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/lightcase.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/shoppingCart.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $.getScript('static/js/multiple-file.min.js');

            $('.input-row input, .input-row textarea').on('change input', function () {
                if ($(this).val() == '') {
                    $(this).prev().attr('data-empty-input', true);
                    $(this).attr('data-empty-input', true);
                } else {
                    $(this).prev().attr('data-empty-input', false);
                    $(this).attr('data-empty-input', false);
                }
            }).on('focus', function () {
                $(this).prev().attr('data-sibling-focus', true);
            }).on('blur', function () {
                $(this).prev().attr('data-sibling-focus', false);
            }).each(function () {
                if ($(this).attr('required')) {
                    $(this).prev('label').attr('data-input-required', '');
                }
            });

            $('.input-row input, .input-row textarea').change();

        });
    </script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</head>
<body>
    <div id="body-flex-wrapper" class="body-flex-wrapper-style">
        
        <div id="body-wrapper" class="container-fluid body-wrapper-style">


            <div class="header_container">

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="logo_container">
                            <a href="{{URL::to('')}}">
                                <img src="{{URL::to('')}}/web/images/logo.png">
                            </a>
                        </div>
                        <div class="hot_line">
                            <a href="tel:02-95672422">02-95672422</a>

                            <div class="header_address">
                                425 Princess Highway<br/>ROCKDALE NSW 2216
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="upper_section">
                            
                            <ul class="top_menu">
                                                       
                                <li>
                                    <a href="{{URL::to('')}}">Home</a>
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

                        
                    </div>
                </div>

            </div>

            <div class="col-sm-11 col-sm-offset-1">
                <div class="row">
                    <ul class="main-menu">
                        <li>
                            <a href="#">Custom Picture Framing</a>
                        </li>
                         <li>
                            <a class="active" href="#">Plain Mirror</a>
                        </li>
                    </ul>
                </div>
            </div>

           
                    <div class="main-container" id="custom-framing-wrapper">
                        
                        <div class="col-xs-12 col-sm-10 col-sm-push-1 col-md-9 col-md-push-1">
                            <form name="userupload" action="frame-it-plain-mirror" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                                <input type="hidden" name="file" value="Plain_Mirror">
                                <input type="hidden" name="url_action" id="url_action" value=""/>
                                <input type="hidden" name="action" value="add">
                                <input type="hidden" id="baseWidth" value="10">
                                <input type="hidden" id="baseHeight" value="10">
                                <input type="hidden" id="basePrice" value="7">
                                <input type="hidden" id="stepPrice" value="0.2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!--<div id="plain-mirror-image">
                                            <img border="0" src="static/images/Plain-Mirror-2.jpg" class="dropshadow">
                                        </div>-->
                                        <div style="margin-top: 0;" id="canvas-container" class="left-side-bar">
                                            <canvas id="canvas" width="500" height="500" data-rel="lightcase" href="#canvas-lightcase" style="cursor:zoom-in;">This text is displayed if your
                                                browser does
                                                not
                                                support
                                                canvas. Please update your browser to the latest version.
                                            </canvas>
                                            <div id="canvas-lightcase" style="display:none;"></div>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="right-side-bar">
                                            <p>High quality 4mm plain mirrors, cleanly cut to size and professionally framed.</p>
                                            <h3>Enter Mirror Size</h3>
                                            
                                            <div id="dimensions-unit-selection" hidden>
                                                <fieldset id="unit-choice-radio">
                                                    <label for="unit-cm" class="material-radio">
                                                        <input name="unit-type" id="unit-cm" value="cm" checked="checked" type="radio">
                                                        <span class="outer"><span class="inner"></span></span>
                                                        cm
                                                    </label>
                                                </fieldset>
                                            </div>
                                            <form>
                                                <div class="row">
                                                    <fieldset>
                                                        <input type="hidden" id="image-ratio" data-is-locked="false" value="0.015">
                                                        <div class="col-xs-12" id="dimensions-input-wrapper">
                                                            <div class="dimensions-container">
                                                                <p style="width: 50%;float: left;">Width:
                                                                    <input style="padding: 0 5px;" type="number" name="imgwidth" id="imgwidth" value="35" size="3" maxlength="5" min="10" max="152.5" step="0.1" class="inch-cm" data-cm-min="10" data-cm-max="152.5" data-redraw data-calc-product data-for="width"/>
                                                                    cm
                                                                </p>
                                                            </div>
                                                            <!--                                                            <div id="multiply-dimensions-sign">X</div>-->
                                                            <div class="dimensions-container">
                                                                <p style="width: 50%;float: left;">Height:
                                                                    <input style="padding: 0 5px;" type="number" name="imgheight" id="imgheight" value="50" size="3" maxlength="5" min="10" max="152.5" step="0.1" class="inch-cm" data-cm-min="10" data-cm-max="152.5" data-inch-min="4" data-inch-max="60" data-cm-step="0.1" data-inch-step="0.25" data-redraw data-calc-product data-for="height"/> &nbsp;
                                                                    cm
                                                                </p>
                                                            </div>
                                                            <!--                                                            <div class="preset-size-container visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">-->
                                                            <div class="preset-size-container hidden">
                                                                <select name="Preset Size" id="preset-size-list">
                                                                    <option value="-">Standard Sizes</option>
                                                                    <option value="4x6in" data-value="4x6in" data-width-inch="4" data-height-inch="6" data-width-cm="10.2" data-height-cm="15.2">4 x 6 inches
                                                                    </option>
                                                                    <option value="5x7in" data-value="5x7in" data-width-inch="5" data-height-inch="7" data-width-cm="12.7" data-height-cm="17.8">5 x 7 inches
                                                                    </option>
                                                                    <option value="6x8in" data-value="6x8in" data-width-inch="6" data-height-inch="8" data-width-cm="15.2" data-height-cm="20.3">6 x 8 inches
                                                                    </option>
                                                                    <option value="8x10in" data-value="8x10in" data-width-inch="8" data-height-inch="10" data-width-cm="20.3" data-height-cm="25.4">8 x 10 inches
                                                                    </option>
                                                                    <option value="11x14in" data-value="11x14in" data-width-inch="11" data-height-inch="14" data-width-cm="27.9" data-height-cm="35.6">11 x 14 inches
                                                                    </option>
                                                                    <option value="12x16in" data-value="12x16in" data-width-inch="12" data-height-inch="16" data-width-cm="30.5" data-height-cm="40.6">12 x 16 inches
                                                                    </option>
                                                                    <option value="A4" data-value="A4" data-width-inch="8.3" data-height-inch="11.7" data-width-cm="21.0" data-height-cm="29.7">A4
                                                                    </option>
                                                                    <option value="A3" data-value="A3" data-width-inch="11.7" data-height-inch="16.5" data-width-cm="29.7" data-height-cm="42.0">A3
                                                                    </option>
                                                                    <option value="A2" data-value="A2" data-width-inch="23.4" data-height-inch="23.4" data-width-cm="42.0" data-height-cm="59.4">A2
                                                                    </option>
                                                                    <option value="A1" data-value="A1" data-width-inch="23.4" data-height-inch="33.1" data-width-cm="59.4" data-height-cm="84.1">A1
                                                                    </option>
                                                                    <option value="A0" data-value="A0" data-width-inch="33.1" data-height-inch="46.8" data-width-cm="84.1" data-height-cm="118.9">A0
                                                                    </option>
                                                                </select>
                                                                <i class="fa fa-unlock ratio-lock hidden-xs hidden-sm" aria-hidden="true" title="Ratio is unlocked, you can enter any size."></i>
                                                                <i class="fa fa-lock ratio-lock hidden hidden-xs hidden-sm" aria-hidden="true" title="Size ratio is now locked to your uploaded image's dimensions. To unlock the ratio, select 'Remove Image'"></i>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </form>
                                            <div class="alert alert-danger" role="alert" id="dimension-alert" style="display:none;">
                                                <p>Sizes must be between:</p>
                                                <p> Min <b>10 x 10 cm</b> , Max <b>152 x 101.5 cm</b></p>
                                                <p>For larger sizes please
                                                    <a rel="nofollow" href="/contact-us/"><b>contact
                                                            us.</b></a>
                                                </p>
                                            </div>
                                            <h3>Choose Your Frame</h3>
                                            <p>Click on the 'Add a Frame' button to head to our online framing section. Choose your favourite frame to suit your decor.</p>
                                            <input type="hidden" name="frameitCanvasImg" id="frameitCanvasImg" value="">
                                            <button id="cart-button" type="image" name="frameitImg" class="btn btn-primary btn-lg">Add a Frame
                                            </button>
                                            <p align="center">
                                              
                                                <script type="text/javascript">
                                                    function drawPresetImage(target, src) {
                                                        target = document.getElementById(target);
                                                        targetCtx = target.getContext('2d');
                                                        var img = new Image();
                                                        img.src = "http://offthewallframing.com.au/web/photo_frame/plain_mirror/static/images/Plain-Mirror-2.jpg";
                                                        img.onload = function() {
                                                            setTimeout(function(){
                                                                targetCtx.drawImage(img, 0, 0, target.width, target.height);
                                                            }, 150);
                                                        };
                                                    }
                                                    $(document).ready(function () {
                                                        var userUploadForm = $('form[name="userupload"]');
                                                        userUploadForm.on('submit', function (e) {
                                                         
                                                            var canvasImage = $('#canvas'),
                                                                cv = canvasImage[0],
                                                                canvasImageW = canvasImage.outerWidth(),
                                                                canvasImageH = canvasImage.outerHeight();

                                                            var frameitCanvasImg = $('#frameitCanvasImg');

                                                            var newCanvas = document.createElement('canvas'),
                                                                ctx = newCanvas.getContext('2d');
                                                            newCanvas.width = canvasImageW;
                                                            newCanvas.height = canvasImageH;

                                                            ctx.drawImage(cv, 0, 0, canvasImageW, canvasImageH);

                                                            frameitCanvasImg.val(newCanvas.toDataURL());

                                                        });


                                                        $("[name=imgwidth]").on('input', function () {
                                                            setTimeout('get_price()', 750);
                                                            if (isValidSize()) {
                                                                $('#cart-button').prop('disabled', false);
                                                            } else {
                                                                $('#cart-button').prop('disabled', 'disabled');
                                                            }
                                                        });

                                                        $("[name=imgheight]").on('input', function () {
                                                            setTimeout('get_price()', 750);
                                                            if (isValidSize()) {
                                                                $('#cart-button').prop('disabled', false);
                                                            } else {
                                                                $('#cart-button').prop('disabled', 'disabled');
                                                            }
                                                        });

                                                        get_price();

                                                    });

                                                    function isValidSize() {
                                                        var t = ((function isValidSize() {
                                                            var w = $("[name=imgwidth]").val();
                                                            var h = $("[name=imgheight]").val();
                                                            return !(w < 10 || h < 10 || w > 152 || h > 152 || (w > 101.5 && h > 101.5));
                                                        })());
                                                        if (t) {
                                                            $('#dimension-alert').fadeOut(150);
                                                        } else {
                                                            $('#dimension-alert').fadeIn(150);
                                                        }
                                                        return t;
                                                    }
                                                   

                                                    function get_price() {
                                                        w = $("[name=imgwidth]").val();
                                                        h = $("[name=imgheight]").val();
                                                        c = $("#file").val();
                                                        var baseWidth = Number($('#baseWidth').val()),
                                                            baseHeight = Number($('#baseHeight').val()),
                                                            basePrice = Number($('#basePrice').val()),
                                                            stepPrice = Number($('#stepPrice').val());

                                                        var wPrice = w > baseWidth ? ((w - baseWidth) * stepPrice) : 0,
                                                            hPrice = h > baseHeight ? ((h - baseHeight) * stepPrice) : 0;

                                                        var totalPrice = Number((basePrice + wPrice + hPrice).toFixed(2));
                                                        $('#price_val').val(totalPrice);
                                                        $('#price').html(totalPrice).data('totalPrice', totalPrice);
                                                    }
                                                </script>
                                            </p>
                                            <input type="hidden" name="price_val" id="price_val">
                                            <input type="hidden" name="initial_default_img" id="initial_default_img" value="static/images/Plain-Mirror-2.jpg">
                                            <span style="font-size: 20px;" id="label-total">Total Price: </span>
                                            <span style="font-size: 20px;" id="price"></span>
                                        </div>
                                        <div class="right-side-bar" style="margin-top: 30px;">
                                            <p>Customise your own decor with a cut to size framed mirror. Firstly choose a size, then simply 'Add a Frame'. You'll get a mirror professionally cut and framed to your designs. Please note that the price above does not include the frame, the cost of framing will vary based on your selection and will be instantly quoted to you in the next section.</p>
                                            <p>Our mirrors are only available as
                                                <strong>framed</strong>
                                                mirrors when purchasing online. We can only provide unframed plain, polished or bevelled mirrors for delivery within the Sydney metro area, or as a pick-up order from our store. Please
                                                <a href="/contact-us/">contact us</a>
                                                for more information or for custom mirror requests.
                                            </p>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>

                    <div style="background-color: #2b2b2b;margin-top: 30px;" class="col-md-12">
                <div class="row">

                    <div class="footer_container">

                        <div class="col-md-3 col-sm-3 col-xs-3 row-left-0">
                            <div class="footer_logo">
                                <a href="{{URL::to('')}}">
                                    <img src="{{URL::to('')}}/web/images/footer_logo.png">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <ul class="footer_menu">
                                <li>
                                    <a href="https://www.facebook.com/Off-the-wall-framing-PTY-Ltd-1180736021961295/" target="_blank"><img src="{{URL::to('')}}/images/facebook.png"></a>
                                    <a href="https://www.instagram.com/offthewallframing/" target="_blank"><img src="{{URL::to('')}}/images/instagram.png"></a>
                                    <a href="https://plus.google.com/u/0/109347086873122701317/about" target="_blank"><img src="{{URL::to('')}}/images/google-plus.png"></a>
                                </li>
                                <li>
                                    <a href="{{URL::to('')}}/about-us">About us</a>
                                </li>
                                
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

    <style type="text/css">
        .left-side-bar {
            background: #fff;
            padding: 15px;
        }
        .right-side-bar {
            background: #fff;
            padding: 15px;
        }
        h1,h3{
        font-size: 20px !important;
        padding: 0 !important;
        margin-bottom: 10px !important;
            width: 100%;
display: inline-block;
        }

        h3{
            font-size: 16px !important;
            margin-bottom: 20px !important;
        }
    </style> 

    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/FrameCreator.min.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/customFraming-1.0.min-photo-frame.js') }}"></script>
</body>
</html>