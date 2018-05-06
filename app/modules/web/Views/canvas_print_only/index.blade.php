<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/mstile-144x144.png?v=kPPlxk2lY8">
  <meta name="theme-color" content="#e2e4ff">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <title>Canvas Prints | Photos Printed On Canvas </title>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('canvas_print_only/static/css/libraries.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('canvas_print_only/static/css/offthewall-common.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/static/css/custom.css') }}">
  <script src="{{ URL::asset('canvas_print_only/static/js/libraries.min.js') }}"></script>
</head>
<body>
  <div id="body-flex-wrapper" class="offtwl__a main-flex-layout-wrapper">
    
    <div id="content-body-wrapper" class="content-body-wrapper">

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
                      <a href="{{URL::to('')}}/canvas-printing-only">Canvas Printing Only</a>
                  </li>
                   <li>
                      <a class="active" href="{{URL::to('')}}/canvas-stretching-only">Canvas Stretching Only</a>
                  </li>
                  <li>
                      <a href="{{URL::to('')}}/canvas-print-and-streatch">Canvas Print and Stretch</a>
                  </li>                        
                  
              </ul>
          </div>
      </div> 


      <div class="container-fluid main-container">
        <div class="row">
          <div class="col-xs-12 col-sm-10 center-block" id="bg-wrapper">
            <div class="offtwl_d">
              <div class="page-title">
                <h1 class="primary-title">Canvas Stretching Only</h1>
                <h3 class="sub-title">Transform your images into a work of art.</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-6 left-side-bar">
                <p id="offtwl_static_preview" class="text-center"><span id="loading"
                                                    style="display: none;"><img
                            src="{{URL::to('')}}/canvas_print_only/static/images/loading.gif"/></span>
                  <img src="{{ URL::asset('web/photo_frame/canvas_print/static/images/Canvas-Print-and-Stretch-1-Panel.jpg') }}"/>
                </p>
                <div id="offtwl_uploaded-image-holder">
                </div>
                
              </div>
              <div class="col-xs-12 col-sm-6">
                <div id="offtwl_upload-canvas-holder" class="right-side-bar">
                  <form name="offtwl_userupload-form" action="/index.php" method="post" enctype="multipart/form-data">

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
                    <h3>Upload your photo</h3>
                    <div title="Print and frame your images or just preview them! (Optional)" class="button upload-button">
                      <i class="fa fa-upload"></i>
                      <input type="file" id="upload-button" class="button upload-input-inside-btn">
                      <input type="hidden" id="image-ratio" data-is-locked="false" value="0.015">
                    </div>
                    <h3>Enter Canvas Size</h3>
                    <div class="clearfix">
                      <div class="offtwl__dimension-container">
                        <div>
                          <label for="width">Width</label>
                        </div>
                        <input type="number" name="offtwl_imgwidth" id="width" value="120" size="5"
                               maxlength="5" max="180" min="10" step="1" data-for="height">
                      </div>
                      <div id="multiply-dimensions-sign">X</div>
                      <div class="offtwl__dimension-container">
                        <div>
                          <label for="height">Height</label>
                        </div>
                        <input type="number" name="offtwl_imgheight" id="height" value="60" size="5"
                               maxlength="5" max="180" min="10" step="1" data-for="width">
                        cm
                      </div>
                    </div>
                    <div class="alert alert-danger" role="alert" id="offtwl_dmnsn-warning"
                         style="display:none;">
                      <p>Sizes must be between:</p>
                      <p> Min <b>10 x 10 cm</b> , Max <b>180 x 140 cm</b></p>
                      <p>For larger sizes please
                        <a rel="nofollow" href="/contact-us/"><b>contact
                            us.</b></a>
                      </p>
                    </div>
                    
                    <div class="mt-20">
                      <div class="">
                        <span id="label-total">Total Price: </span>
                        <span style="font-size: 3rem;">$</span>
                        <span id="price"></span>
                      </div>
                      <div id="pricerow" class="col-xs-12">
                      </div>
                    </div>
                  </form>

                  <div>
                    <p>Have an existing canvas print or painting that you want to have stretched? Off The Wall Framing provides experienced professional stretching services. We take your existing canvas and stretch it over the highest quality pine stretcher bar frame to transform your rolled canvas into a ready-to-hang artwork.</p>

                    <p>We offer stretching services to both our local and online customers. Either bring your rolled canvas into our Rockdale store or post your canvas to us for a quick turnaround service.</p>

                    <p>
                    We also offer a Canvas Printing Service. If you would like to customise your own canvas print, please check out our canvas printing and stretching service here.</p>
                    <p>Any questions please contact us to receive professional feedback:</p>
                    <p>(02) 9567 2422</p>
                    <p>
                        <a href="mailto:Offthewallframing@gmail.com">Offthewallframing@gmail.com</a>
                    </p>

                  <p>425 Princes Highway</p>
                  <p>ROCKDALE NSW 2216</p>

                    

                  </div>
                </div>
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
                                    <a href="{{URL::to('')}}/picture-framer">About us</a>
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

    h3 {
      font-size: 20px;
  }

    h1{
      color: #fff !important;
      font-size: 25px !important;
      text-transform: uppercase;
      padding-top: 0 !important;
    }

    h3.sub-title{
        color: #ffffff80 !important;
        font-size: 18px !important;
    }

    .left-side-bar{
        background: #fff;
        padding: 15px;
    }

    .right-side-bar{
        background: #fff;
        padding: 15px;
    }

  </style>
 
  <script>
      (function(){$('[data-toggle="tooltip"]').tooltip();var i=[{min:20,max:27,price:38.5},{min:28,max:32,price:40.7},{min:33,max:37,price:42.9},{min:38,max:42,price:46.2},{min:43,max:47,price:48.4},{min:48,max:52,price:51.7},{min:53,max:57,price:55},{min:58,max:62,price:59.4},{min:63,max:67,price:62.7},{min:68,max:72,price:67.1},{min:73,max:77,price:71.5},{min:78,max:82,price:75.9},{min:83,max:87,price:80.3},{min:88,max:92,price:84.7},{min:93,max:97,price:90.2},{min:98,max:102,price:94.6},{min:103,max:107,price:100.1},{min:108,max:112,price:105.6},{min:113,max:117,price:112.2},{min:118,max:122,price:117.7},{min:123,max:127,price:124.3},{min:128,max:132,price:130.9},{min:133,max:137,price:137.5},{min:138,max:142,price:144.1},{min:143,max:147,price:151.8},{min:148,max:152,price:158.4},{min:153,max:157,price:166.1},{min:158,max:162,price:173.8},{min:163,max:167,price:181.5},{min:168,max:172,price:190.3},{min:173,max:177,price:198},{min:178,max:182,price:206.8},{min:183,max:187,price:215.6},{min:188,max:192,price:224.4},{min:193,max:197,price:233.2},{min:198,max:202,price:242.1},{min:203,max:207,price:251.9},{min:208,max:212,price:261.8},{min:213,max:217,price:271.7},{min:218,max:222,price:282.7},{min:223,max:227,price:292.6},{min:228,max:232,price:303.6},{min:233,max:237,price:314.6},{min:238,max:242,price:325.6},{min:243,max:247,price:336.6},{min:248,max:252,price:347.6},{min:253,max:257,price:359.7},{min:258,max:262,price:370.7},{min:263,max:267,price:382.8},{min:268,max:272,price:394.9},{min:273,max:277,price:408.1},{min:278,max:282,price:420.2},{min:283,max:287,price:433.4},{min:288,max:292,price:446.6},{min:293,max:297,price:459.8},{min:298,max:302,price:473},{min:303,max:307,price:487.3},{min:308,max:312,price:500.5},{min:313,max:317,price:514.8},{min:318,max:320,price:529.1}];function a(a,t){t=t||i;a=parseInt(a);for(var e=0,r=t.length;e<r;e++){var n=t[e],m=n.min,o=n.max;if(a>=m&&a<=o)return n.price}}function t(){return(!Number.isNaN(parseFloat($("[name=offtwl_imgwidth]").val()))?parseFloat($("[name=offtwl_imgwidth]").val()):0)+(!Number.isNaN(parseFloat($("[name=offtwl_imgheight]").val()))?parseFloat($("[name=offtwl_imgheight]").val()):0)}var e;function r(i){if("true"==$("#image-ratio").attr("data-is-locked"))if("width"==$(i).attr("data-for"))$("#width").val(($(i).val()/e).toFixed(1));else $("#height").val(($(i).val()*e).toFixed(1))}$(document).ready(function(){var i=t();function a(){var i=$(".upload-input-inside-btn"),a=$("#offtwl_uploaded-image-holder");i.on("change",function(i){var t=$(this),r=i.target,n=t.val().split(".").pop().toLowerCase();if(-1==$.inArray(n,["gif","png","jpg","jpeg"]))alert("only 'gif','png','jpg','jpeg' are allowd!");else if(r.files&&r.files[0]){var m=new FileReader;m.onload=function(i){void 0;void 0;void 0;void 0;void 0;void 0;var t=i.target.result;uploaded_img=new Image;uploaded_img.src=t;uploaded_img.onload=function(){var i=uploaded_img.width;var r=uploaded_img.height;$("#offtwl_static_preview").hide();void 0;void 0;$("#image-ratio").attr("data-is-locked","false");e=parseFloat(i)/r;$("[name=offtwl_imgwidth]").on("input change",function(i){var a=i.target;if("true"==$("#image-ratio").attr("data-is-locked"))if("width"==$(a).attr("data-for"))$("#width").val(parseInt($(a).val()*e));else $("#height").val(parseInt($(a).val()/e))});$("[name=offtwl_imgheight]").on("input change",function(i){var a=i.target;if("true"==$("#image-ratio").attr("data-is-locked"))if("width"==$(a).attr("data-for"))$("#width").val(parseInt($(a).val()*e));else $("#height").val(parseInt($(a).val()/e))});void 0;void 0;a.html('   <div id="offtwl_imgup" style="text-align:center;">  '+'       <span id="offtwl_img_ph" style="display: none;">'+t+"</span>  "+'       <img id="offtwl_user-image-upload" src="'+t+'" data-pixel-width="392" data-pixel-height="400">  '+"  </div>  ");$("#pricerow").html('   <button id="offtwl_addToCartButton" style="cursor:pointer;" class="button fat-button add-to-cart-button" data-disabled="false" role="button" ><i class="fa fa-shopping-cart"></i>  '+"  Add To Cart</button>  ");var n=(uploaded_img.width/37.795276).toFixed(2);var m=(uploaded_img.height/37.795276).toFixed(2);$("#width").val(n).trigger("input");$("#height").val(m).trigger("input");$("#image-ratio").attr("data-is-locked","true")}};m.readAsDataURL(r.files[0])}})}a();$("[name=offtwl_imgwidth]").on("input change",function(i){m()});$("[name=offtwl_imgheight]").on("input change",function(i){o()});$("#upimg").click(function(){up_img()});l();var r=$("#offtwl_user-image-upload");if(r.length){var n=r.attr("data-pixel-width");var d=r.attr("data-pixel-height");if(n&&d){$("#width").val((n/30).toFixed(1));$("#height").val((d/30).toFixed(1)).change();l()}}});function n(i,a){var t=Math.round(i*Math.pow(10,a))/Math.pow(10,a);return t}function m(){if(1==$("#offtwl_imgup").length){var i=parseFloat($("#width").val());var a=parseFloat($("#width2").val());var t=$("#height").val();var e=$("#height2").val();t=n(parseFloat(i)/parseFloat(a)*parseFloat(e),2)}if(p())$("#offtwl_addToCartButton").removeAttr("disabled");else $("#offtwl_addToCartButton").prop("disabled","disabled");l()}function o(){if(1==$("#offtwl_imgup").length){var i=parseFloat($("#height").val());var a=parseFloat($("#height2").val());var t=$("#width").val();var e=$("#width2").val();t=n(parseFloat(i)/parseFloat(a)*parseFloat(e),2)}if(p())$("#offtwl_addToCartButton").removeAttr("disabled");else $("#offtwl_addToCartButton").prop("disabled","disabled");l()}function l(){w=$("[name=offtwl_imgwidth]").val();h=$("[name=offtwl_imgheight]").val();c=$("#file").val();$(".wid").each(function(){if("27556"!=$("#cid").val()){var i=parseFloat(w/$("#nump").val()).toFixed(2);$(this).html(i)}else{var a=w/2;$("#wid1").html(a/2);$("#wid2").html(a);$("#wid3").html(a/2)}});$("#price").html("<img src='static/images/loading.gif' />");var e="undefined"!==typeof a(t())?a(t()):i[0].price;$("#price").html(e).data("totalPrice",e)}function d(){w=$("[name=offtwl_imgwidth]").val();h=$("[name=offtwl_imgheight]").val();c=$("#file").val();var i=$("#nump").val();var a=$("#offtwl_img_ph").html();$("#offtwl_imgup").append("<div class='adding-to-cart'><br /><img src='static/images/loading.gif' /> Adding to Cart...</div>");$.post("add-to-cart-only-streaching",{action:"add2cart","_token": "{{ csrf_token() }}",w:w,h:h,c:c,n:i,i:a,tr:$(".offtwl_edge-radio:checked").val(),tp:$("#price").data("totalPrice")},function(i){window.location = "mycart";})}$(document).on("click","#offtwl_addToCartButton",function(){d();return false});function p(){var i=function i(){var a=$("[name=offtwl_imgwidth]").val();var t=$("[name=offtwl_imgheight]").val();return!(a<10||t<10||a>180||t>180||a>140&&t>140||a>140&&t>180||a>180&&t>140)}();if(i)$("#offtwl_dmnsn-warning").fadeOut(150);else $("#offtwl_dmnsn-warning").fadeIn(150);return i}$(document).ready(function(){$("#offtwl_addToCartButton").appendTo("#pricerow");$("form[name=offtwl_userupload-form]").on("submit",function(i){i.preventDefault()})})})();
  </script>
</body>
</html>
