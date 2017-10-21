<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Canvas Prints | Photos Printed On Canvas </title>
    <link rel="stylesheet" href="{{ URL::asset('web/photo_frame/canvas_print/static/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('web/photo_frame/canvas_print/static/css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/canvas_print/static/css/frameshop-w.css?v=1.0.3d') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/canvas_print/static/css/flaticon/flaticon.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/static/css/custom.css') }}">
    
    <script src="{{ URL::asset('web/photo_frame/canvas_print/static/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/canvas_print/static/js/bootstrap.min.js') }}"></script>    
    <script src="{{ URL::asset('web/photo_frame/canvas_print/static/js/shoppingCart.min.js') }}"></script>
    
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
                            <a href="{{URL::to('')}}/only-printing">Canvas Printing Only</a>
                        </li>
                         <li>
                            <a href="{{URL::to('')}}/canvas-stretching">Canvas Stretching Only</a>
                        </li>
                        <li>
                            <a class="active" href="{{URL::to('')}}/canvas-print">Canvas Print and Stretch</a>
                        </li>                        
                    </ul>
                </div>
            </div>


            <script>
                (function() {
                    var pricingArray = [
                        {
                            min: 20,
                            max: 27,
                            price: 38.5
                        },
                        {
                            min: 28,
                            max: 32,
                            price: 40.7
                        },
                        {
                            min: 33,
                            max: 37,
                            price: 42.9
                        },
                        {
                            min: 38,
                            max: 42,
                            price: 46.2
                        },
                        {
                            min: 43,
                            max: 47,
                            price: 48.4
                        },
                        {
                            min: 48,
                            max: 52,
                            price: 51.7
                        },
                        {
                            min: 53,
                            max: 57,
                            price: 55
                        },
                        {
                            min: 58,
                            max: 62,
                            price: 59.4
                        },
                        {
                            min: 63,
                            max: 67,
                            price: 62.7
                        },
                        {
                            min: 68,
                            max: 72,
                            price: 67.1
                        },
                        {
                            min: 73,
                            max: 77,
                            price: 71.5
                        },
                        {
                            min: 78,
                            max: 82,
                            price: 75.9
                        },
                        {
                            min: 83,
                            max: 87,
                            price: 80.3
                        },
                        {
                            min: 88,
                            max: 92,
                            price: 84.7
                        },
                        {
                            min: 93,
                            max: 97,
                            price: 90.2
                        },
                        {
                            min: 98,
                            max: 102,
                            price: 94.6
                        },
                        {
                            min: 103,
                            max: 107,
                            price: 100.1
                        },
                        {
                            min: 108,
                            max: 112,
                            price: 105.6
                        },
                        {
                            min: 113,
                            max: 117,
                            price: 112.2
                        },
                        {
                            min: 118,
                            max: 122,
                            price: 117.7
                        },
                        {
                            min: 123,
                            max: 127,
                            price: 124.3
                        },
                        {
                            min: 128,
                            max: 132,
                            price: 130.9
                        },
                        {
                            min: 133,
                            max: 137,
                            price: 137.5
                        },
                        {
                            min: 138,
                            max: 142,
                            price: 144.1
                        },
                        {
                            min: 143,
                            max: 147,
                            price: 151.8
                        },
                        {
                            min: 148,
                            max: 152,
                            price: 158.4
                        },
                        {
                            min: 153,
                            max: 157,
                            price: 166.1
                        },
                        {
                            min: 158,
                            max: 162,
                            price: 173.8
                        },
                        {
                            min: 163,
                            max: 167,
                            price: 181.5
                        },
                        {
                            min: 168,
                            max: 172,
                            price: 190.3
                        },
                        {
                            min: 173,
                            max: 177,
                            price: 198
                        },
                        {
                            min: 178,
                            max: 182,
                            price: 206.8
                        },
                        {
                            min: 183,
                            max: 187,
                            price: 215.6
                        },
                        {
                            min: 188,
                            max: 192,
                            price: 224.4
                        },
                        {
                            min: 193,
                            max: 197,
                            price: 233.2
                        },
                        {
                            min: 198,
                            max: 202,
                            price: 242.1
                        },
                        {
                            min: 203,
                            max: 207,
                            price: 251.9
                        },
                        {
                            min: 208,
                            max: 212,
                            price: 261.8
                        },
                        {
                            min: 213,
                            max: 217,
                            price: 271.7
                        },
                        {
                            min: 218,
                            max: 222,
                            price: 282.7
                        },
                        {
                            min: 223,
                            max: 227,
                            price: 292.6
                        },
                        {
                            min: 228,
                            max: 232,
                            price: 303.6
                        },
                        {
                            min: 233,
                            max: 237,
                            price: 314.6
                        },
                        {
                            min: 238,
                            max: 242,
                            price: 325.6
                        },
                        {
                            min: 243,
                            max: 247,
                            price: 336.6
                        },
                        {
                            min: 248,
                            max: 252,
                            price: 347.6
                        },
                        {
                            min: 253,
                            max: 257,
                            price: 359.7
                        },
                        {
                            min: 258,
                            max: 262,
                            price: 370.7
                        },
                        {
                            min: 263,
                            max: 267,
                            price: 382.8
                        },
                        {
                            min: 268,
                            max: 272,
                            price: 394.9
                        },
                        {
                            min: 273,
                            max: 277,
                            price: 408.1
                        },
                        {
                            min: 278,
                            max: 282,
                            price: 420.2
                        },
                        {
                            min: 283,
                            max: 287,
                            price: 433.4
                        },
                        {
                            min: 288,
                            max: 292,
                            price: 446.6
                        },
                        {
                            min: 293,
                            max: 297,
                            price: 459.8
                        },
                        {
                            min: 298,
                            max: 302,
                            price: 473
                        },
                        {
                            min: 303,
                            max: 307,
                            price: 487.3
                        },
                        {
                            min: 308,
                            max: 312,
                            price: 500.5
                        },
                        {
                            min: 313,
                            max: 317,
                            price: 514.8
                        },
                        {
                            min: 318,
                            max: 320,
                            price: 529.1
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
                    var aspectRatio;

                    function maintainRatio(target) {
                        if ("true" == $("#image-ratio").attr("data-is-locked")) {
                            if ($(target).attr("data-for") == "width") {
                                $("#width").val(($(target).val() / aspectRatio).toFixed(1));
                                
                            } else {
                                $("#height").val(($(target).val() * aspectRatio).toFixed(1));
                                
                            }

                        }
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

                                            var imageURL = e.target.result;
                                            uploaded_img = new Image();
                                            uploaded_img.src = imageURL;
                                            uploaded_img.onload = function () {
                                                var pixelWidth = uploaded_img.width;
                                                var pixelHeight = uploaded_img.height;

                                                $('#result').hide();
                                                console.log(uploaded_img.height);
                                                console.log(uploaded_img.width);
                                              
                                            $("#image-ratio").attr("data-is-locked", "false");

                                                aspectRatio = parseFloat(pixelWidth) / pixelHeight;
                                          
                                                console.log('assigned aspectRatio');
                                                console.log(aspectRatio);

                                                uploadedImgHolder.html(
                                                    '   <div id="imgup" style="text-align:center;">  ' +
                                                    '       <span id="imgv" style="display: none;">' + imageURL + '</span>  ' +
                                                    '       <img id="user-image-upload" src="' + imageURL + '" data-pixel-width="392" data-pixel-height="400">  ' +
                                                    '  </div>  '
                                                );
                                                $("#pricerow").html(
                                                    '   <button id="fs-addToCartButton" style="cursor:pointer;" class="button fat-button add-to-cart-button" data-disabled="false" role="button" ><i class="fa fa-shopping-cart"></i>  ' +
                                                    '  Add To Cart</button>  '
                                                );
                                                var widthFinalVal = (uploaded_img.width / 37.795276).toFixed(2);
                                                var heightFinalVal = (uploaded_img.height / 37.795276).toFixed(2);
                                                $('#width').val(widthFinalVal).trigger("input");
                                                $('#height').val(heightFinalVal).trigger("input");
                                            $("#image-ratio").attr("data-is-locked", "true");
                                            };
                                        };
                                        reader.readAsDataURL(elm.files[0]);
                                    }
                                }
                            });
                        }

                        onImageUploadeSelect();

                        $("[name=imgwidth]").on('input change', function (e) {
                            txtWidthKeyup();
                            maintainRatio(e.target);
                        });
                        $("[name=imgheight]").on('input change', function (e) {
                            txtHeightKeyup();
                            maintainRatio(e.target);
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
                        $.post('add-to-cart-canvas-print', {
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
                    $(document).on('click', '#fs-addToCartButton', function () {
                        addtocart();
                        return false;
                    });
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
                }());
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
            <div class="container-fluid text-sleek main-container">
                
                <div class="col-xs-12 col-sm-10 col-sm-push-1" id="bg-wrapper">
                   
                    <div class="col-xs-12">
                        <div class="row">
                            <form name="userupload" action="/index.php" method="post"
                                  enctype="multipart/form-data">
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
                                        <p id="result" align="center"><span id="loading"  style="display: none;">
                                            <img
                                                    src="web/photo_frame/canvas_print/static/images/loading.gif"/></span>
                                            <img
                                                src="{{ URL::asset('web/photo_frame/canvas_print/static/images/Canvas-Print-and-Stretch-1-Panel.jpg') }}"/>
                                        </p>
                                        <div id="uploaded-image-holder">
                                        </div>
                                        <p style="margin-top: 20px;" align="center">Your image will be printed, protected and stretched using high
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
                                            <input type="hidden" id="image-ratio" data-is-locked="false" value="0.015">
                                        </div>
                                        <h3>Enter Canvas Size</h3>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="imgwidth">Width</label>
                                                <input type="number" name="imgwidth" id="width" value="120" size="5"
                                                       maxlength="5" max="180" min="10" step="1" data-for="height">
                                                cm
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="imgheight">Height</label>
                                                <input type="number" name="imgheight" id="height" value="60" size="5"
                                                       maxlength="5" max="180" min="10" step="1" data-for="width">
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
                                        <div class="row" id="canvas-edge">
                                            <div class="col-xs-12">
                                                <h3>Choose A Canvas Edge</h3>
                                               @if(count($canvas_edge_r) > 0)
                                                    <?php $count = 1 ?>
                                                    @foreach($canvas_edge_r as $canvas_edge)

                                                        <div class="col-xs-3">
                                                            <input id="{{$canvas_edge->title}}" class="cloneedge the-radio" type="radio" name="radio2"
                                                                   value="{{$canvas_edge->value}}"
                                                                   @if($count==1) checked="checked" @endif  />
                                                            <label for="{{$canvas_edge->title}}">
                                                                <img src="{{ URL::asset($canvas_edge->image_link) }}"
                                                                     alt="{{$canvas_edge->title}}"/>
                                                                <h4>{{$canvas_edge->title}}</h4>
                                                            </label>
                                                        </div>
                                                        <?php $count++; ?>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
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
                    <div class="col-xs-12 col-sm-6 col-sm-push-6">
                        <p style="background: #fff;padding: 15px;margin-top: 30px;">Transform your photo into a piece of art for your home or a thoughtful gift for a loved one
                            by
                            printing on
                            canvas. Our stretched canvas is available in square, rectangle, and panoramic shapes, in a
                            wide
                            selection of sizes, and in fact any canvas size you want. Both our canvas and wooden frames
                            are
                            of a
                            very high quality and we also include a protective coat on your canvas to ensure the colours
                            don't
                            fade. It also helps keeping dirt, finger prints and moisture out.</p>
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
</body>
</html>