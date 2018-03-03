<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <title>Customise your picture frame online | Off The Wall Picture Framing</title>

  <meta id="csrf_token_id" name="csrf-token" content="{{ csrf_token() }}">

 
  <meta name="description" content="Design Your Own Picture Frame and order Online. We Have The Largest Range of Custom Picture Frames In Australia. Design your picture Framing Now!"/>      
  
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('static/css/libraries.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('static/css/offthewall-common.min.css') }}"/>

  <link href="{{ URL::asset('static/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />

</head>
<body>

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

<div class="menu-container">
    <div class="col-sm-11 col-sm-offset-1">
        <div class="row">
          <ul class="main-menu">
            <li>
              <a class="active" href="#">Custom Picture Framing</a>
            </li>
            <!-- <li>
              <a href="#">Canvas Prints</a>
            </li>
            <li>
              <a href="#">Framed Plain Mirrors</a>
            </li>
            <li>
              <a href="#">Photo Frame</a>
            </li> -->
          </ul>
        </div>
      </div>
</div>      

<div id="main-flex-layout-wrapper" class="offtwl__a main-flex-layout-wrapper">
  <div id="content-body-wrapper" class="content-body-wrapper bg-grey">
    <div class="offtwl__c">
      <div class="text-thin">
        <div class="offtwl__d">
          <div class="" id="manual-frame-wrapper">
            <div class="" id="grey-bg-holder">
              <div class="container">
                <div class="row" id="offtwl__product-feature">

                  <div class="col-xs-12 col-sm-4 col-sm-push-8">
                    <div id="offtwl__canvas-frame">
                      <canvas id="canvas" width="500" height="500" data-toggle="modal"
                              data-target="#canvas-frame-modal">This text is displayed if your
                        Please update your browser to the latest version.
                      </canvas>
                    </div>
                  </div>

                  <div style="margin-top: 20px;background: #fff;" id="offtwl__info-container-b" class="col-xs-12 col-sm-8 col-sm-pull-4">
                      
                      @include('web::custom_photo_frame.dimension')
                      @include('web::custom_photo_frame.other_step')
                      @include('web::custom_photo_frame.add_to_cart')

                  </div>

                </div>
              </div>
            </div>

            @include('web::custom_photo_frame.bottom_tab')
            
          </div>
        </div>
      </div>
    </div>


    
            <div style="background-color: #2b2b2b;" class="col-md-12">
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
    <div class="modal fade active" id="more-info-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Hanging Information</h4>
          </div>
          <div class="modal-body">
            <div class="offtwl__inner-z">
              All frames that we produce will come with a hanging system built in. The two most common are
              <strong>Metal Hangers</strong> and <strong>D-Rings + String</strong>. You are welcome to
              request either of these options in the customer remarks during checkout and we will
              accommodate where possible.
              <h4>Metal Hangers</h4>
              Metal hangers as pictured below, are used for smaller frames with MDF backing (usually 18x24
              inches or less). We generally supply them in both directions for hanging unless noted
              otherwise. They work with most types of screws, nails or picture framing hooks that you can
              use on walls.
              <br><img style="display: block; width: 250px;"
                       src="./static/images/picture-frame-metal-hangers.jpg"
                       alt="Metal hangers used for hanging picture frames on walls."/>
              <h4>D-Rings + String</h4>
              We use a strong picture framing grade string and d-rings screwed into the frame for larger
              frames or when foamcore backing is used (approx larger than 18x24 inches). Please be sure to
              order your frames in the correct orientation (portrait or landscape) as this is the
              direction the string is attached. We recommend hanging the frames with at least two fixing
              points on the wall.<br>
              <img style="display: block; width: 250px;"
                   src="./static/images/picture-frame-string-backing.jpg"
                   alt="D-Rings and string used for hanging picture frames on walls"/>
              <h4>Custom Options</h4>
              If you have a preference for a particular hanging method, or orientation, please notify us
              in the cutomer remarks during checkout. If we aren't notified we will follow the above
              default set of options and additional hangers or changes after the frame has been made may
              attract a surcharge. We also offer security hooks, coated wire and split batten hanging
              methods that vary in cost based on the size of the frame. We're happy to discuss hanging
              requirements with you, if you have any custom requests or general queries please
              <a href="/contact-us">get in touch with us.</a>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ URL::asset('static/js/libraries.min.js') }}"></script>
    <script src="{{ URL::asset('static/js/frame-call.min.js') }}"></script>

  </div>
</div>

<style type="text/css">
  .offtwl__cardbox{
    background: transparent;
  }
</style>

</body>
</html>