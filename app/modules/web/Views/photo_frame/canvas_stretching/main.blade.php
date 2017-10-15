<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="">
        <meta name="theme-color" content="#e2e4ff">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <title>Canvas Stretching Only | Canvas Print</title>
        <link rel="stylesheet" href="{{ URL::asset('web/photo_frame/streaching/static/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('web/photo_frame/streaching/static/css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/streaching/static/css/frameshop-w.css?v=1.0.3d') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/streaching/static/css/flaticon/flaticon.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/static/css/custom.css') }}">
        
        <script src="{{ URL::asset('web/photo_frame/streaching/static/js/jquery-2.1.3.min.js') }}"></script>
        <script src="{{ URL::asset('web/photo_frame/streaching/static/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('web/photo_frame/streaching/static/js/lodash.min.js') }}"></script>
        <script src="{{ URL::asset('web/photo_frame/streaching/static/js/shoppingCart.min.js') }}"></script>
        <script src="{{ URL::asset('web/photo_frame/streaching/static/js/jquery-ui.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
        
       
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
                            <a class="active" href="#">Canvas Stretching Only</a>
                        </li>
                        <!--<li>
                            <a href="#">Framed Plain Mirrors</a>
                        </li>
                        <li>
                            <a href="#">Photo Frame</a>
                        </li> -->
                    </ul>
                </div>
            </div> 
            <script>
                var pricingArray = [
                        {
                            min: 20,
                            max: 27,
                            price: 19.8
                        },
                        {
                            min: 28,
                            max: 32,
                            price: 20.9
                        },
                        {
                            min: 33,
                            max: 37,
                            price: 22.00
                        },
                        {
                            min: 38,
                            max: 42,
                            price: 23.10
                        },
                        {
                            min: 43,
                            max: 47,
                            price: 24.20
                        },
                        {
                            min: 48,
                            max: 52,
                            price: 26.20
                        },
                        {
                            min: 53,
                            max: 57,
                            price: 27.50
                        },
                        {
                            min: 58,
                            max: 62,
                            price: 29.70
                        },
                        {
                            min: 63,
                            max: 67,
                            price: 31.90
                        },
                        {
                            min: 68,
                            max: 72,
                            price: 34.10
                        },
                        {
                            min: 73,
                            max: 77,
                            price: 36.30
                        },
                        {
                            min: 78,
                            max: 82,
                            price: 38.50
                        },
                        {
                            min: 83,
                            max: 87,
                            price: 40.70
                        },
                        {
                            min: 88,
                            max: 92,
                            price: 42.90
                        },
                        {
                            min: 93,
                            max: 97,
                            price: 45.10
                        },
                        {
                            min: 98,
                            max: 102,
                            price: 47.30
                        },
                        {
                            min: 103,
                            max: 107,
                            price: 50.60
                        },
                        {
                            min: 108,
                            max: 112,
                            price: 52.80
                        },
                        {
                            min: 113,
                            max: 117,
                            price: 56.10
                        },
                        {
                            min: 118,
                            max: 122,
                            price: 59.40
                        },
                        {
                            min: 123,
                            max: 127,
                            price: 62.70
                        },
                        {
                            min: 128,
                            max: 132,
                            price: 66.00
                        },
                        {
                            min: 133,
                            max: 137,
                            price: 69.30
                        },
                        {
                            min: 138,
                            max: 142,
                            price: 72.60
                        },
                        {
                            min: 143,
                            max: 147,
                            price: 75.90
                        },
                        {
                            min: 148,
                            max: 152,
                            price: 79.20
                        },
                        {
                            min: 153,
                            max: 157,
                            price: 83.60
                        },
                        {
                            min: 158,
                            max: 162,
                            price: 86.90
                        },
                        {
                            min: 163,
                            max: 167,
                            price: 91.30
                        },
                        {
                            min: 168,
                            max: 172,
                            price: 95.70
                        },
                        {
                            min: 173,
                            max: 177,
                            price: 99.00
                        },
                        {
                            min: 178,
                            max: 182,
                            price: 103.40
                        },
                        {
                            min: 183,
                            max: 187,
                            price: 107.80
                        },
                        {
                            min: 188,
                            max: 192,
                            price: 112.20
                        },
                        {
                            min: 193,
                            max: 197,
                            price: 116.60
                        },
                        {
                            min: 198,
                            max: 202,
                            price: 122.20
                        },
                        {
                            min: 203,
                            max: 207,
                            price: 126.60
                        },
                        {
                            min: 208,
                            max: 212,
                            price: 130.90
                        },
                        {
                            min: 213,
                            max: 217,
                            price: 136.40
                        },
                        {
                            min: 218,
                            max: 222,
                            price: 141.90
                        },
                        {
                            min: 223,
                            max: 227,
                            price: 146.30
                        },
                        {
                            min: 228,
                            max: 232,
                            price: 151.80
                        },
                        {
                            min: 233,
                            max: 237,
                            price: 157.30
                        },
                        {
                            min: 238,
                            max: 242,
                            price: 162.80
                        },
                        {
                            min: 243,
                            max: 247,
                            price: 168.30
                        },
                        {
                            min: 248,
                            max: 252,
                            price: 173.80
                        },
                        {
                            min: 253,
                            max: 257,
                            price: 180.40
                        },
                        {
                            min: 258,
                            max: 262,
                            price: 185.90
                        },
                        {
                            min: 263,
                            max: 267,
                            price: 191.40
                        },
                        {
                            min: 268,
                            max: 272,
                            price: 198.00
                        },
                        {
                            min: 273,
                            max: 277,
                            price: 204.60
                        },
                        {
                            min: 278,
                            max: 282,
                            price: 210.10
                        },
                        {
                            min: 283,
                            max: 287,
                            price: 216.70
                        },
                        {
                            min: 288,
                            max: 292,
                            price: 223.30
                        },
                        {
                            min: 293,
                            max: 297,
                            price: 229.90
                        },
                        {
                            min: 298,
                            max: 302,
                            price: 236.50
                        },
                        {
                            min: 303,
                            max: 307,
                            price: 244.20
                        },
                        {
                            min: 308,
                            max: 312,
                            price: 250.80
                        },
                        {
                            min: 313,
                            max: 317,
                            price: 257.40
                        },
                        {
                            min: 318,
                            max: 320,
                            price: 265.10
                        }
                    ];

                function filterdPrice(totalDimention, arr) {
                    arr = arr || pricingArray;
                    totalDimention = parseInt(totalDimention);
                    for (var i = 0, l = arr.length; i < l; i++) {
                        var item = arr[i],
                            min = item.min,
                            max = item.max;
                        if (totalDimention >= min && totalDimention <= max) {
                            return item.price;
                        } else {
                        }
                    }
                }

                function totalDimention() {
                    return (!Number.isNaN(parseFloat($("[name=imgwidth]").val())) ? parseFloat($("[name=imgwidth]").val()) : 0 ) + (!Number.isNaN(parseFloat($("[name=imgheight]").val())) ? parseFloat($("[name=imgheight]").val()) : 0 );
                }

                $(document).ready(function () {

                    var totalVal = totalDimention();

                    function onImageUploadeSelect() {
                        var inp = $('.upload-input-inside-btn'),
                            uploadedImgHolder = $('#uploaded-image-holder');
                        inp.on('change', function (e) {
                            var $this = $(this),
                                elm = e.target,
                                ext = $this.val().split('.').pop().toLowerCase();
                            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                                alert("only 'gif','png','jpg','jpeg' are allowd!");
                            } else {

                                if (elm.files && elm.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        console.log('reader');
                                        console.log(reader);
                                        console.log(elm.files);
                                        console.log(elm.files[0]);
                                        console.log(e);
                                        console.log(e.target.result);
//                                        var imageURL = URL.createObjectURL(elm.files[0]);
                                        var imageURL = e.target.result;
                                        uploaded_img = new Image();
                                        uploaded_img.src = imageURL;
                                        uploaded_img.onload = function () {
                                            var pixelWidth = uploaded_img.width;
                                            var pixelHeight = uploaded_img.height;
                                            imageURL = imageURL.replace(/^[a-z]{4}\:\/{2}[a-z]{1,}\:[0-9]{1,4}.(.*)/, '/$1');
                                            var filename = imageURL.substring(imageURL.lastIndexOf('/') + 1);
                                            $('#result').hide();

                                            var cv = document.createElement('canvas'),
                                                ctx = cv.getContext('2d'),
                                                img = new Image();
                                            img.src = imageURL;
                                            cv.width = img.width;
                                            cv.height = img.height;
                                            img.onload = function () {
                                                ctx.drawImage(img, 0, 0, cv.width, cv.height);
                                                console.log(img.src);
                                                uploadedImgHolder.html(
                                                    '   <div id="imgup" style="text-align:center;">  ' +
                                                    '       <span id="imgv" style="display: none;">' + imageURL + '</span>  ' +
                                                    '       <img id="user-image-upload" src="' + imageURL + '" data-pixel-width="392" data-pixel-height="400">  ' +
                                                    '  </div>  '
                                                );
                                                $("#pricerow").html(
                                                    '   <button id="fs-addToCartButton" style="cursor:pointer;" class="button fat-button add-to-cart-button" data-disabled="false" role="button" onclick="addtocart(); return false;"><i class="fa fa-shopping-cart"></i>  ' +
                                                    '  Add To Cart</button>  '
                                                );

                                                $('#width').val((uploaded_img.width / 37.795276).toFixed(2)).trigger("input");
                                                $('#height').val((uploaded_img.height / 37.795276).toFixed(2)).trigger("input");
                                            };
                                        };
                                    };
                                    reader.readAsDataURL(elm.files[0]);
                                }
                            }
                        });
                    }

                    onImageUploadeSelect();

                    $("[name=imgwidth]").on('input', function (e) {
                        txtWidthKeyup();
                    });
                    $("[name=imgheight]").on('input', function (e) {
                        txtHeightKeyup();
                    });
                    $("#upimg").click(function () {
                        up_img();
                    });
                    get_price();


                    var im = $('#user-image-upload');
                    if (im.length) {
                        var pixelWidth = im.attr('data-pixel-width');
                        var pixelHeight = im.attr('data-pixel-height');

                        if (pixelWidth && pixelHeight) {
                            $('#width').val((pixelWidth / 30).toFixed(1));
                            $('#height').val((pixelHeight / 30).toFixed(1)).change();
                            get_price();

                        }

                    }


                });

                function roundNumber(num, dec) {
                    var result = Math.round(num * Math.pow(10, dec)) / Math.pow(10, dec);
                    return result;
                }

                function txtWidthKeyup() {
                    if ($('#imgup').length == 1) {
                        var w1 = parseFloat($("#width").val());
                        var w2 = parseFloat($("#width2").val());
                        var h1 = $("#height").val();
                        var h2 = $("#height2").val();
                        h1 = roundNumber(((parseFloat(w1) / parseFloat(w2)) * parseFloat(h2)), 2);
                    }
                    if (isValidSize()) {
                        $('#fs-addToCartButton').removeAttr('disabled');
                    } else {
                        $('#fs-addToCartButton').prop('disabled', 'disabled');
                    }
                    get_price();
                }

                function txtHeightKeyup() {
                    if ($('#imgup').length == 1) {
                        var h1 = parseFloat($("#height").val());
                        var h2 = parseFloat($("#height2").val());
                        var w1 = $("#width").val();
                        var w2 = $("#width2").val();
                        w1 = roundNumber(((parseFloat(h1) / parseFloat(h2)) * parseFloat(w2)), 2);
                    }
                    if (isValidSize()) {
                        $('#fs-addToCartButton').removeAttr('disabled');
                    } else {
                        $('#fs-addToCartButton').prop('disabled', 'disabled');
                    }

                    get_price();
                }

                function get_price() {
                    w = $("[name=imgwidth]").val();
                    h = $("[name=imgheight]").val();
                    c = $("#file").val();
                    $(".wid").each(function () {
                        if ($("#cid").val() != '27556') {
                            var newval = parseFloat(w / $("#nump").val()).toFixed(2);
                            $(this).html(newval);
                        }
                        else {
                            var nw = w / 2;
                            $("#wid1").html(nw / 2);
                            $("#wid2").html(nw);
                            $("#wid3").html(nw / 2);
                        }
                    });
                    $("#price").html("<img src='static/images/loading.gif' />");
                    var totalPrice = typeof(filterdPrice(totalDimention())) !== 'undefined' ? filterdPrice(totalDimention()) : pricingArray[0].price;
                    $('#price').html(totalPrice).data('totalPrice', totalPrice);
                }

                function addtocart() {
                    w = $("[name=imgwidth]").val();
                    h = $("[name=imgheight]").val();
                    c = $("#file").val();
                    var n = $("#nump").val();
                    var i = $("#imgv").html();
                    $("#imgup").append("<div class='adding-to-cart'><br /><img src='static/images/loading.gif' /> Adding to Cart...</div>");
                    $.post('add-to-cart-only-streaching', {
                        action: 'add2cart',
                         "_token": "{{ csrf_token() }}",
                        w: w,
                        h: h,
                        c: c,
                        n: n,
                        i: i,
                        tr: $(".the-radio:checked").val(),
                        tp: $('#price').data('totalPrice')
                    }, function (e) {
                        window.location = "mycart";
                    });
                }

                function isValidSize() {
                    var t = ((function isValidSize() {
                        var w = $("[name=imgwidth]").val();
                        var h = $("[name=imgheight]").val();
                        return !(w < 10 || h < 10 || w > 180 || h > 180 || (w > 140 && h > 140) || ((w > 140 && h > 180) || (w > 180 && h > 140)));
                    })());

                    if (t) {
                        $('#dimension-alert').fadeOut(150);
                    } else {
                        $('#dimension-alert').fadeIn(150);
                    }

                    return t;
                }

                $(document).ready(function () {
                    $("#fs-addToCartButton").appendTo("#pricerow");
                    $('form[name=userupload]').on('submit', function (e) {
                        e.preventDefault();
                    });
                });
            </script>
            <style>
                .fs-page-title {
                    text-align: center;
                    color: #394694;
                    margin-bottom: 20px;
                }

                h4 {
                    text-align: center;
                }

                h3 {
                    margin-bottom: 15px;
                }

                #canvas-edge img {
                    width: 100%;
                    cursor: pointer;
                    padding: 2px;
                    -webkit-transition: all 0.1s ease-in-out 0s;
                    -moz-transition: all 0.1s ease-in-out 0s;
                    -ms-transition: all 0.1s ease-in-out 0s;
                    -o-transition: all 0.1s ease-in-out 0s;
                    transition: all 0.1s ease-in-out 0s;
                    transform-style: preserve-3d;
                }

                #canvas-edge img:hover {
                    opacity: 0.9;
                    transform: scale(1.1);
                }

                #cloneedge:checked + label {
                    border: 2px solid rgb(58, 70, 146);
                    transform: scale(1.1);
                }

                #wrapedge:checked + label {
                    border: 2px solid rgb(58, 70, 146);
                    transform: scale(1.1);
                }

                #whiteedge:checked + label {
                    border: 2px solid rgb(58, 70, 146);
                    transform: scale(1.1);
                }

                #blackedge:checked + label {
                    border: 2px solid rgb(58, 70, 146);
                    transform: scale(1.1);
                }

                #canvas-edge input {
                    display: none;
                }

                #label-total {
                    font-weight: 400;
                    font-size: 3rem;
                }

                #price {
                    font-size: 3rem;
                }

                #user-image-upload {
                    width: 85%;
                }

                #pricerow {
                    margin-bottom: 20px;
                }

                #result img {
                    width: 100%;
                }

                #upload-canvas .fa-upload {
                    font-size: 5rem;
                    margin: 5px;
                    display: inline-block;
                }

                #upload-button {
                    margin: auto !important;
                }
            </style>

            <div class="main-container">
                <div class="">
                    <div class="col-xs-12 col-sm-10 col-sm-push-1" id="bg-wrapper">
                        
                        <div class="col-xs-12">
                            <div class="row">
                                <form name="userupload" action="/index.php" method="post"
                                      enctype="multipart/form-data">

                                      {{ csrf_field() }}

                                    <input type="hidden" id="baseWidth" value="10">
                                    <input type="hidden" id="baseHeight" value="10">
                                    <input type="hidden" id="basePrice" value="7">
                                    <input type="hidden" id="stepPrice" value="0.2">
                                    <input type="hidden" name="file" id="file" value="Canvas_Print_and_Stretch_1_Panel">
                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="cid" id="cid" value="27547"/>
                                    <input type="hidden" name="nump" id="nump" value="1"/>
                                    <input type="hidden" id="width2" value="120">
                                    <input type="hidden" id="height2" value="60">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="left-side-bar">
                                            <p id="result" align="center">
                                                <span id="loading" style="display: none;">
                                                    <img src="static/images/loading.gif"/>
                                                </span>

                                                <img src="{{ URL::asset('web/photo_frame/canvas_print/static/images/Canvas-Print-and-Stretch-1-Panel.jpg') }}"/>
                                            </p>
                                            <div id="uploaded-image-holder">
                                            </div>
                                            <p align="center">Your image will be printed, protected and stretched using high
                                                quality
                                                canvas materials. You'll receive it ready to hang.</p>
                                        </div>    
                                    </div>
                                    <div id="upload-canvas" class="col-xs-12 col-sm-6">
                                        <div class="right-side-bar">
                                            <h3>Upload your photo</h3>
                                            <div title="Print and frame your images or just preview them! (Optional)" class="button upload-button">
                                                <i class="fa fa-upload"></i>
                                                <input type="file" id="upload-button" class="button upload-input-inside-btn">
                                            </div>
                                            <h3 style="margin-top: 30px;margin-bottom: 20px;">Enter Canvas Size</h3>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="imgwidth">Width</label>
                                                    <input type="number" name="imgwidth" id="width" value="120" size="5"
                                                           maxlength="5" max="180" min="10" step="1">
                                                    cm
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="imgheight">Height</label>
                                                    <input type="number" name="imgheight" id="height" value="60" size="5"
                                                           maxlength="5" max="180" min="10" step="1">
                                                    cm
                                                </div>
                                            </div>
                                            <div class="alert alert-danger" role="alert" id="dimension-alert"
                                                 style="display:none;">
                                                <p>Sizes must be between:</p>
                                                <p> Min <b>10 x 10 cm</b> , Max <b>180 x 140 cm</b></p>
                                                <p>For larger sizes please
                                                    <a rel="nofollow" href="/contact-us/"><b>contact
                                                            us.</b></a>
                                                </p>
                                            </div>
                                            <div class="row hidden" id="canvas-edge">
                                                <div class="col-xs-12">
                                                    <h3>Choose A Canvas Edge</h3>
                                                    <div class="col-xs-3">
                                                        <input id="cloneedge" class="the-radio" type="radio" name="radio2"
                                                               value="Clone"
                                                               checked="checked"/>
                                                        <label for="cloneedge">
                                                            <img src="static/images/clone_edge.jpg"
                                                                 alt="Canvas printed with cloned edge"/>
                                                            <h4>Cloned Edge</h4>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <input id="wrapedge" class="the-radio" type="radio" name="radio2"
                                                               value="Wrap"/>
                                                        <label for="wrapedge">
                                                            <img src="static/images/wrap_edge.jpg"
                                                                 alt="Canvas printed with gallery wrap edge"/>
                                                            <h4>Gallery Wrap Edge</h4>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <input id="whiteedge" class="the-radio" type="radio" name="radio2"
                                                               value="White"/>
                                                        <label for="whiteedge">
                                                            <img src="static/images/white_edge.jpg"
                                                                 alt="Canvas printed with white edge"/>
                                                            <h4>White Edge</h4>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <input id="blackedge" class="the-radio" type="radio" name="radio2"
                                                               value="Black"/>
                                                        <label for="blackedge">
                                                            <img src="static/images/black_edge.jpg"
                                                                 alt="Canvas printed with black edge"/>
                                                            <h4>Black Edge</h4>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 20px;">
                                                <div class="col-xs-12">
                                                    <span id="label-total">Total Price: </span>
                                                    <span style="font-size: 20px;">AUD</span>
                                                    <span id="price"></span>
                                                </div>
                                                <div id="pricerow" class="col-xs-12">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

             <div style="background-color: #2b2b2b;margin-top: -10px;" class="col-md-12">
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


    <style>
                .fs-page-title {
                    text-align: center;
                    color: #394694;
                    margin-bottom: 20px;
                }

                h4 {
                    text-align: center;
                }

                h3 {
                    margin-bottom: 15px;
                }

                #canvas-edge img {
                    width: 100%;
                    cursor: pointer;
                    padding: 2px;
                    -webkit-transition: all 0.1s ease-in-out 0s;
                    -moz-transition: all 0.1s ease-in-out 0s;
                    -ms-transition: all 0.1s ease-in-out 0s;
                    -o-transition: all 0.1s ease-in-out 0s;
                    transition: all 0.1s ease-in-out 0s;
                    transform-style: preserve-3d;
                }

                #canvas-edge img:hover {
                    opacity: 0.9;
                    transform: scale(1.1);
                }

                .cloneedge:checked + label {
                    border: 2px solid rgb(58, 70, 146);
                    transform: scale(1.1);
                }

                #wrapedge:checked + label {
                    border: 2px solid rgb(58, 70, 146);
                    transform: scale(1.1);
                }

                #whiteedge:checked + label {
                    border: 2px solid rgb(58, 70, 146);
                    transform: scale(1.1);
                }

                #blackedge:checked + label {
                    border: 2px solid rgb(58, 70, 146);
                    transform: scale(1.1);
                }

                #canvas-edge input {
                    display: none;
                }

                #label-total {
                    font-weight: 400;
                    font-size: 20px;
                }

                #price {
                    font-size: 20px;
                }

                #user-image-upload {
                    width: 85%;
                }

                #result img {
                    width: 100%;
                }

                #upload-canvas .fa-upload {
                    font-size: 5rem;
                    margin: 5px;
                    display: inline-block;
                }

                #upload-button {
                    margin: auto !important;
                }
                .left-side-bar{
                    background: #fff;
                    padding: 15px;
                }

                .right-side-bar{
                    background: #fff;
                    padding: 15px;
                }

                h3{
                    margin-top: 0;
                    font-size: 20px;
                }

                .main-container{
                    padding-bottom: 80px;
                }
            </style> 

    </body>
</html>