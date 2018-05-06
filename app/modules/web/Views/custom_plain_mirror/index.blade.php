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
    <link rel="stylesheet" href="{{ URL::asset('plain_mirror/static/css/libraries.home.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plain_mirror/static/css/style.home.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/static/css/custom.css') }}">
    </head>
  <body>

    <div id="body-flex-wrapper" class="body-flex-wrapper-style">
        
        <div id="body-wrapper" class="container-fluid body-wrapper-style" style="padding: 0;">

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


            <div id="main-flex-layout-wrapper" class="offtwl__a main-flex-layout-wrapper main-container">
              <div id="body-wrapper" class="container-fluid content-body-wrapper">
                <div class="offtwl__c">
                  <div class="text-thin">
                    <div class="offtwl__d">
                      <div class="container" id="manual-frame-wrapper">
                        <form name="userupload" action="{{route('custom_plain_mirror_frame_it')}}" method="post" enctype="multipart/form-data">

                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <div class="offtwl__page-title" style="background: #fff;padding: 20px;">
                            <h1 class="main-title">Framed Plain Mirrors</h1>
                            <h3 class="sub-heading">Custom cut mirrors, framed to fit any decor.</h3>
                             <div style="text-align: left;margin-top: 10px;" class="">
                                <p>Customise your own decor with a cut to size framed mirror. Firstly choose a size, then simply 'Add a Frame'. You'll get a mirror professionally cut and framed to your designs. Please note that the price above does not include the frame, the cost of framing will vary based on your selection and will be instantly quoted to you in the next section.</p>
                                <p>Our mirrors are only available as
                                  <strong>framed</strong>
                                  mirrors when purchasing online. We can only provide unframed plain, polished or bevelled mirrors for delivery within the Sydney metro area, or as a pick-up order from our store. Please
                                  <a href="/contact-us/">contact us</a>
                                  for more information or for custom mirror requests.
                                </p>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-4 col-sm-push-8 right-side-bar">
                              <!--<div id="plain-mirror-image">
                                  <img border="0" src="static/images/Plain-Mirror-2.jpg" class="dropshadow">
                              </div>-->
                              <input type="hidden" name="offtwl__file" value="Plain_Mirror">
                              <input type="hidden" name="offtwl__url_action" id="offtwl__url_action" value=""/>
                              <input type="hidden" name="action" value="add">
                              <input type="hidden" id="offtwl__baseWidth" value="10">
                              <input type="hidden" id="offtwl__baseHeight" value="10">
                              <input type="hidden" id="offtwl__basePrice" value="7">
                              <input type="hidden" id="offtwl__stepPrice" value="0.2">
                              <div id="offtwl__canvas-frame">
                                <canvas id="canvas" width="500" height="500" data-toggle="modal" data-target="#canvas-frame-modal" style="cursor:zoom-in;">This text is displayed if your
                                  browser does
                                  not
                                  support
                                  canvas. Please update your browser to the latest version.
                                </canvas>
                                <div id="canvas-frame-modal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Custom Frame Preview</h4>
                                      </div>
                                      <div class="modal-body" id="cloned-canvas-holder">
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-sm-pull-4">
                              <div class="left-side-bar">
                                <p>High quality 4mm plain mirrors, cleanly cut to size and professionally framed.</p>
                                <h3>Enter Mirror Size</h3>
                                <!--<p>Width:
                                    <input type="number" name="offtwl__imgwidth" value="50" size="3" maxlength="5" step="0.1">
                                    cm
                                </p>
                                <p>Height:
                                    <input type="number" name="offtwl__imgheight" value="50" size="3" maxlength="5" step="0.1">
                                    cm
                                </p>-->
                                <div id="offtwl__dimensions-unit-selection" hidden>
                                  <fieldset id="offtwl__unit-choice-radio">
                                    <label for="offtwl__unit-cm" class="material-radio">
                                      <input name="offtwl__unit-type" id="offtwl__unit-cm" value="cm" checked="checked" type="radio">
                                      <span class="outer"><span class="inner"></span></span>
                                      cm
                                    </label>
                                  </fieldset>
                                </div>
                                <form>
                                  <div class="row">
                                    <fieldset>
                                      <input type="hidden" id="offtwl__image-ratio" data-is-locked="false" value="0.015">
                                      <div class="col-xs-12" id="offtwl__dimensions-input-wrapper">
                                        <ul class="list-inline">
                                          <li class="offtwl__measure-container">
                                            <p>Width:
                                              <input type="number" name="offtwl__imgwidth" id="offtwl__imgwidth" value="35" size="3" maxlength="5" min="10" max="152.5" step="0.1" class="inch-cm" data-cm-min="10" data-cm-max="152.5" data-redraw data-calc-product data-for="width"/>
                                              cm
                                            </p>
                                          </li>
                                          <!--                                                            <div id="multiply-dimensions-sign">X</div>-->
                                          <li class="offtwl__measure-container">
                                            <p>Height:
                                              <input type="number" name="offtwl__imgheight" id="offtwl__imgheight" value="50" size="3" maxlength="5" min="10" max="152.5" step="0.1" class="inch-cm" data-cm-min="10" data-cm-max="152.5" data-inch-min="4" data-inch-max="60" data-cm-step="0.1" data-inch-step="0.25" data-redraw data-calc-product data-for="height"/>
                                              cm
                                            </p>
                                          </li>
                                        </ul>
                                        <!--                                                            <div class="offtwl__preset-size-container visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">-->
                                        <div class="offtwl__preset-size-container hidden">
                                          <select name="Preset Size" id="offtwl__preset-size-list">
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
                                <div class="alert alert-danger" role="alert" id="offtwl__measurement-alert" style="display:none;">
                                  <p>Sizes must be between:</p>
                                  <p> Min <b>10 x 10 cm</b> , Max <b>152 x 101.5 cm</b></p>
                                  <p>For larger sizes please
                                    <a rel="nofollow" href="/contact-us/"><b>contact
                                        us.</b></a>
                                  </p>
                                </div>
                                <div class="offtwl__fsd">
                                  <span id="label-total">Price: </span>
                                  <span id="price"></span>
                                </div>
                                <h3>Choose Your Frame</h3>
                                <p>Click on the 'Add a Frame' button to head to our online framing section. Choose your favourite frame to suit your decor.</p>
                                <input type="hidden" name="offtwl__frameitCanvasImg" id="offtwl__frameitCanvasImg" value="">
                                <button id="cart-button" type="image" name="frameitImg" class="btn btn-primary btn-lg">Add a Frame
                                </button>
                                <p align="center">
                                </p>
                                <input type="hidden" name="offtwl__price_val" id="offtwl__price_val">
                                <input type="hidden" name="offtwl__initial_default_img" id="offtwl__initial_default_img" value="static/images/Plain-Mirror-2.jpg">
                                
                              </div>
                             
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


        </div>

    </div>

    <div style="background-color: #2b2b2b;margin-top: -15px;" class="col-md-12">
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
    <script src="{{ URL::asset('plain_mirror/static/js/libraries.home.min.js') }}"></script>
    <script src="{{ URL::asset('plain_mirror/static/js/script.home.min.js') }}"></script>
  </body>
</html>