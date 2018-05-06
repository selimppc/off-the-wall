<?php
session_start();
?>
<!DOCTYPE html>
<?php
$_SESSION['offtwl__file'] = $_POST['offtwl__file'];
$_SESSION['offtwl__url_action'] = $_POST['offtwl__url_action'];
$_SESSION['action'] = $_POST['action'];
$_SESSION['offtwl__imgwidth'] = $_POST['offtwl__imgwidth'];
$_SESSION['offtwl__imgheight'] = $_POST['offtwl__imgheight'];
//$_SESSION['frameitImg'] = $_POST['frameitImg'];
$_SESSION['frameitImg'] = $_POST['offtwl__frameitCanvasImg'];
//$_SESSION['offtwl__frameitCanvasImg'] = $_POST['offtwl__frameitCanvasImg'];
$_SESSION['offtwl__price_val'] = $_POST['offtwl__price_val'];
$_SESSION['offtwl__initial_default_img'] = $_POST['offtwl__initial_default_img'];
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="-1"/>
    <link rel="stylesheet" href="{{ URL::asset('plain_mirror/static/css/libraries.framesit.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plain_mirror/static/css/style.frameit.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/static/css/custom.css') }}">
    <title>Frame It</title>
  </head>
  <body style="background: #018b8d;">

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

     <div class="menu-container" style="background: #fff;width: 100%;display: inline-block;padding: 10px 10px 5px 10px;
    margin-bottom: 15px;"> 
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
    </div> 

    <input type="hidden" id="offtwl__catzid" value="1148808"/>
    <input type="hidden" id="catzid" value="1420"/>
    <input type="hidden" id="offtwl__csrate" value="0.75"/>
    <input type="hidden" id="offtwl__is_zadd_cart" value="1"/>
    <input type="hidden" id="offtwl__glass_available" value="0"/>
    <input type='hidden' id='product_type' name='product_type' value='MIRROR'/>
    <input type='hidden' id='csrf_token' name='csrf_token' value='{{ csrf_token() }}'/>
    <div class="container" id="offtwl__do_frameit">
      <div class="row">
        <div class="offtwl__col-18 col-xs-12 col-sm-4 col-sm-push-8">
          <div id="body">
            <form name="offtwl__getframed" id="offtwl__getframed" method="post" action="">
              <input type="hidden" name="offtwl__sess" id="offtwl__sess" value="<?php print $_SESSION['offtwl__initial_default_img']; ?>"/>
              <input type="hidden" name="offtwl__iframe_id" id="offtwl__iframe_id"/>
              <input type="hidden" name="offtwl__is_add_cart" id="offtwl__is_add_cart" value="1"/>
              <input type="hidden" name="offtwl__islip_id" id="offtwl__islip_id"/>
              <input type="hidden" name="offtwl__ifillet_id" id="offtwl__ifillet_id"/>
              <input type="hidden" name="offtwl__iproduct_id" id="offtwl__iproduct_id" value="1149020"/>
              <input type="hidden" name="icat_id" id="icat_id" value="1420"/>
              <input type="hidden" name="original_price" id="original_price" value="<?php print $_SESSION['offtwl__price_val']; ?>"/>
              <input type="hidden" name="total_price_amount" id="total_price_amount" value="<?php print $_SESSION['offtwl__price_val']; ?>"/>
              <input type="hidden" name="totalmat" id="totalmat" value=""/>
              <input type="hidden" name="topmat_id" id="topmat_id" value=""/>
              <input type="hidden" name="topmatsize" id="topmatsize" value=""/>
              <input type="hidden" name="middlemat_id" id="middlemat_id" value=""/>
              <input type="hidden" name="middlematsize" id="middlematsize" value=""/>
              <input type="hidden" name="bottommat_id" id="bottommat_id" value=""/>
              <input type="hidden" name="bottommatsize" id="bottommatsize" value=""/>
              <input type="hidden" name="final_width" id="final_width" value="<?php print $_SESSION['offtwl__imgwidth']; ?>"/>
              <input type="hidden" name="final_height" id="final_height" value="<?php print $_SESSION['offtwl__imgheight']; ?>"/>
              <input type="hidden" id="original_image" value="/user_images/user_images_temp/82ce1c0ca17d45ea2d70e9d29ad59412/prod_images/lrg_print_1149020.jpg"/>
              <input type="hidden" id="inner_width" value="<?php print $_SESSION['offtwl__imgwidth']; ?>"/>
              <input type="hidden" id="inner_height" value="<?php print $_SESSION['offtwl__imgheight']; ?>"/>
              <input type="hidden" id="ng" name="ng"/>
              <input type="hidden" id="cg" name="cg"/>
              <input type="hidden" id="nrg" name="nrg"/>
              <input type="hidden" id="uvg" name="uvg"/>
              <input type="hidden" id="uvrc" name="uvrc"/>
              <input type="hidden" id="ppg" name="ppg"/>
              <input type="hidden" id="na" name="na"/>
              <input type="hidden" id="sa3" name="sa3"/>
              <input type="hidden" id="nsa3" name="nsa3"/>
              <input type="hidden" id="sa5" name="sa5"/>
              <input type="hidden" id="nsa5" name="nsa5"/>
              <input type="hidden" name="frame_weight" id="frame_weight" value=""/>
              <div width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="offtwl__e">
                <div>
                  <div valign="top">
                    <div border="0" align="center" cellpadding="0" cellspacing="0">
                      <div>
                        <div align="center" id="frame-it-wall"valign="top">
                          <div class="clearfix">
                            <div class="relative">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td colspan="2" align="center">
                                    <div id="offtwl__framing-image" style="display:block; margin-top: 0;" class="offtwl__te3ds">
                                      <div class="offtwl__te3" id="frame">
                                        <div class="offtwl__re3" id="slip">
                                          <div class="offtwl__e3" id="mat1">
                                            <div class="offtwl__2t3" id="mat2">
                                              <div class="offtwl__263" id="mat3">
                                                <div class="offtwl__2343" id="fillet">
                                                  <div class="offtwl__2sdf3" id="print">
                                                    <canvas class="offtwl__2sd3" id="offtwl__draw_frame"></canvas>
                                                    <!--                                                                                            <img id="offtwl__framedimg" class="offtwl__framed-image-placeholder" width="500" height="500" src="--><?php //print $_SESSION['offtwl__initial_default_img']; ?><!--" border="0" alt="Final Product"/>-->
                                                    <!--                                                                                            <img id="offtwl__framedimg" class="offtwl__framed-image-placeholder" width="" height="" src="--><?php //print $_SESSION['offtwl__initial_default_img']; ?><!--" border="0" alt="Final Product"/>-->
                                                    <img id="offtwl__framedimg" class="offtwl__framed-image-placeholder" width="" height="" src="<?php print $_SESSION['frameitImg']; ?>" border="0" alt="Final Product"/>
                                                    <!--                                                                                            <img id="offtwl__framedimg" class="offtwl__framed-image-placeholder" width="" height="" src="--><?php //print $_SESSION['offtwl__frameitCanvasImg']; ?><!--" border="0" alt="Final Product"/>-->
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td></td>
                                </tr>
                                <tr class="offtwl__te3d" id="largerimg" style="display:none;">
                                  <td height="8" colspan="3" align="center" class="hide">
                                    <a style="text-decoration: none;" href="javascript: void(true);" onclick="offtwl__viewfull();" class="lrgimg"><span
                                          class="offtwl__infoboster">View Large Image</span>
                                    </a>
                                    <br/>
                                    <br/>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div style="padding-top: 17px;" align="center" id="offtwl__prodinfo" class="info">
                          <div id="offtwl__item_size" data-total-size="<?php echo($_SESSION['offtwl__imgwidth'] + $_SESSION['offtwl__imgheight']); ?>">
                            Product Size: <?php print $_SESSION['offtwl__imgwidth']; ?> x <?php print $_SESSION['offtwl__imgheight']; ?> cm
                          </div>
                          <div id="offtwl__editholder" style="display:none; text-align:center">
                            <table width="100%" class="offtwl__f">
                              <tr>
                                <td align="left" width="61%">
                                  <div align="center">
                                    <font face="Verdana" size="2">Width:</font>
                                    <input name="newwidth" id="newwidth" size="4" value="28.80" style="font-weight: 700">
                                    <font face="Verdana" size="2">cm</font>&nbsp;<font face="Verdana" size="2">Height:</font>
                                    <input name="newheight" id="newheight" size="4" value="18.00" style="font-weight: 700">
                                    <font face="Verdana" size="2">cm</font></div>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2" width="100%">
                                  <div align="center">
                                    <a href="#" onclick="offtwl__submit_new();">
                                      <font face="Verdana"
                                            size="2">Update</font></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="offtwl__cancelme();">
                                      <font face="Verdana"
                                            size="2">Cancel</font></a>
                                  </div>
                                </td>
                            </table>
                          </div>
                          <div style="display:none;" id="offtwl__editbtn">
                            <table width="20%" align="center" class="offtwl__ef">
                              <tr>
                                <td bgcolor="#3a4692" height="25" width="134" align="center">
                                  <a href="#" onclick="offtwl__editme();" style="text-decoration: none; text-align: center; font-weight: 700">
                                    <font color="#FFFFFF" face="Verdana" size="2">Change Custome Size</font>
                                  </a>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div style="border-top-style: none; border-top-width: medium">
                          <p style="margin-left:10em;"><font color="#008000">
                            </font></p>
                        </div>
                      </div>
                      <div id="size-notice" class="hide" style="display:none">
                        <div align="center" id="offtwl__prodinfo" class="info hide">&nbsp;
                          <a href="/images/Rebate.jpg" class="zoom">
                            <b>Size info</b> (Please See
                            relation between print size and frame size)
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="offtwl__col-6 col-xs-12 col-sm-8 col-sm-pull-4">
          <div id="right" class="offtwl__dsf" style="font-size: 12px;">

             <div class="offtwl__cardbox">
              <div id="tabs" class="offtwl__ss no-radius">
                <h3 class="offtwl__cardbox-title">Select frame and wall color</h3>
                <ul class="offtwl__nv-tab">
                  <li>
                    <a href="#frames">Frames</a>
                  </li>
                  <li>
                    <a href="#offtwl__fancycolor">Wall</a>
                  </li>
                </ul>
                <div id="frames" class="offtwl__tsl">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="offtwl__iframe_categori_id">
                        <strong>Choose frames by Color:</strong>
                      </label>
                      <select class="info filtr_4" name="offtwl__iframe_categori_id" id="offtwl__iframe_categori_id" onchange="selectframelist2()">
                        <?php
                            if(!empty($frame_color_array)){
                                foreach($frame_color_array as $frame_color){
                        ?>                                    
                                    <option value="{{$frame_color}}">{{$frame_color}}</option>
                        <?php
                                }
                            }
                        ?>                       
                      </select>
                      <br class="visible-xs visible-sm"/>
                      <br/>
                    </div>
                    <div class="col-md-6">
                      <label for="frate">
                        <strong> Choose Frames by Price Rate:&nbsp;</strong>
                      </label>
                      <!--                            <select id="frate" name="frate" class="rate_s" onchange="selectframelist2()">-->
                      <select id="frate" name="frate" class="rate_s filtr_4" onchange="selectframelist2()">
                        <option value="all">all</option>
                        <option value="rate-1">1</option>
                        <option value="rate-2">2</option>
                        <option value="rate-3">3</option>
                        <option value="rate-4">4</option>
                        <option value="rate-5">5</option>
                        <option value="rate-6">6</option>
                        <option value="rate-7">7</option>
                        <option value="rate-8">8</option>
                        <option value="rate-9">9</option>
                        <option value="rate-10">10</option>
                      </select>
                    </div>
                  </div>
                
                  <div style="color: #f72;margin-top: 15px;font-size: 18px;">Please select frame</div>
                  <div id="displayframes" class="ui-tabs-inner-content-frame list offtwl__select-frame-container">
                      @include('web::custom_plain_mirror.1_stains_frames')
                  </div>
                  <!--*******************
                  <p>*******************</p>-->
                </div>
                <div style="clear: both;margin-bottom:5px;"></div>
                <div id="offtwl__fancycolor">
                  <div>
                    <!--<div id="colorpickerHolder"></div>-->
                    <div class="offtwl__matboard-item-wrapper clearfix" data-offtwl__mat-obj="mat1">

                      @if(!empty($mat_data))
                        @foreach($mat_data as $mat)

                            <div class="offtwl__matboard-sqr" style="background-color: #{{$mat->color}}; color: white;" data-name="{{$mat->name}}" data-code="{{$mat->code}}" data-mat-id="40" data-color-code="{{$mat->color}}" data-offtwl__mat-obj="mat1" data-slider-value="1" data-selected="false" title="{{$mat->name}}"></div>

                        @endforeach
                      @endif
                      
                   
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="offtwl__cardbox">
              <div valign="top">
                <h3 class="offtwl__cardbox-title">Product Info</h3>
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="100%" valign="top">
                      <div id="offtwl__prodzerror" class="ui-widget"
                           style="width: 65%; display:none; margin: 10px auto 0;">
                        <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all">
                          <p><span style="float: left; margin-right: .3em;"
                                   class="ui-icon ui-icon-alert"></span>
                            <strong>Alert:</strong>
                            <span class="msg"></span>
                          </p>
                        </div>
                      </div>
                      <table id="offtwl__prodzinfo" border="0" align="center" cellpadding="3"
                             cellspacing="1" bgcolor="#FFFFFF" class="table">
                        <tr>
                          <td valign="top" style="padding: 0;">
                            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="border details-table table">
                              <tr align="left" style="background-color: #ffe3d2;">
                                <td width="15%" class="offtwl__infoboster" style="padding-top: 13px;padding-bottom: 13px;"> Price</td>
                                <td width="4%" class="offtwl__infoboster" style="padding-top: 13px;padding-bottom: 13px;">:</td>
                                <td width="39%" colspan="2" style="padding-top: 13px;padding-bottom: 13px;">
                                  <div id="totprice" class="info price">
                                    AU <?php print $_SESSION['offtwl__price_val']; ?>
                                  </div>
                                </td>
                                <td width="40%" class="highlight" id="table2" style="text-align: right; padding-top: 13px;padding-bottom: 13px;">
                                  <a href="javascript: void(true);"
                                     id="add2cart" class="highlight btn btn-success add-to-cart-button">
                                    Add to cart
                                  </a>
                                </td>
                              </tr>
                              <tr id="prodz">
                                <td width="5%" align="left" valign="top" class="offtwl__infoboster">
                                  Mirror
                                </td>
                                <td width="1%" class="offtwl__infoboster">:</td>
                                <td width="50%" align="left" class="info" colspan="2">
                                  Size :: <?=$_SESSION['offtwl__imgwidth']?> x <?=$_SESSION['offtwl__imgheight']?> cm
                                </td>
                                <td width="28%" align="left" class="offtwl__infoboster pricec">
                                  AU <?php print $_SESSION['offtwl__price_val']; ?>
                                </td>
                                <td align="left" class="hide size" width="26%">
                                  <span class="width">50</span>
                                  |
                                  <span class="height">80</span>
                                </td>
                              </tr>
                              <tr class="" id="framez" style="display: none;">
                                <td align="left" class="offtwl__infoboster">Frame</td>
                                <td class="offtwl__infoboster">:</td>
                                <td align="left" class="info code" colspan="2">
                                </td>
                                <td align="left" class="info price">
                                </td>
                                <td align="left" class="hide size" width="26%"></td>
                                <td align="left" class="hide rebate" width="5%"></td>
                                <td align="left" class="hide frate" width="1%"></td>
                                <td align="left" class="hide fimg" width="1%"></td>
                                <td align="left" class="hide fmin" width="1%"></td>
                                <td align="left" class="hide fmax" width="1%"></td>
                              </tr>
                              <tr class="hide" id="slipz">
                                <td align="left" class="offtwl__infoboster">Slip</td>
                                <td class="offtwl__infoboster">:</td>
                                <td align="left" class="info code" colspan="2"></td>
                                <td align="left" class="info price"></td>
                                <td align="left" class="hide size" width="26%"></td>
                                <td align="left" class="hide frate" width="5%"></td>
                                <td align="left" class="hide fimg" width="1%"></td>
                              </tr>
                              <tr class="hide" id="glassez">
                                <td align="left" class="offtwl__infoboster">Glass</td>
                                <td class="offtwl__infoboster">:</td>
                                <td align="left" class="info" width="19%">
                                  <select name="glass_type" id="glass_type" class="info">
                                    <option value="NG">No Glass</option>
                                    <option value="CG">Clear Glass 2mm</option>
                                    <option value="NRG">Non Reflective Glass 2mm
                                    </option>
                                    <option value="PPG">Clear Perspex 2mm</option>
                                    <option value="UVG">UV Clear Glass 2.5mm</option>
                                    <option value="UVRC">UV Non Reflective 2.5mm
                                    </option>
                                  </select>&nbsp;&nbsp;
                                </td>
                                <td align="center" id="offtwl__prodinfo" class="info">
                                <td align="left" class="info price">0.00</td>
                              </tr>
                              <!--                                                                        --><?php //if ($_GET['icat_id'] != 1510) { ?>
                              <tr class="" id="backingz" style="display: none;">
                                <td align="left" class="offtwl__infoboster">Backing</td>
                                <td class="offtwl__infoboster">:</td>
                                <td align="left" class="info" colspan="2">
                                  <select id="backing_type" name="backing_type" class="info">
                                    <option data-price="0" value="na">3mm MDF (Included)</option>
                                    <option data-price="50" value="sa3">3mm Self-Adhesive Foamcore
                                    </option>
                                    <option data-price="70" value="nsa3">3mm Non-Adhesive Foamcore
                                    </option>
                                    <option data-price="42" value="sa5">5mm Self-Adhesive Foamcore
                                    </option>
                                    <option data-price="30" value="nsa5">5mm Non-Adhesive Foamcore
                                    </option>
                                  </select>
                                </td>
                                <td align="left" class="info price">0.00</td>
                              </tr>
                              <!--                                                                        --><?php //} ?>
                              <tr class="hide" id="matz1">
                                <td align="left" class="offtwl__infoboster">Top Mat</td>
                                <td class="offtwl__infoboster">:</td>
                                <td align="left" class="info code" colspan="2">M44-Black*
                                </td>
                                <td align="left" class="info price"></td>
                                <td align="left" class="hide size" width="26%">5</td>
                                <td align="left" class="hide color" width="5%">222222</td>
                              </tr>
                              <tr class="hide" id="matz2">
                                <td align="left" class="offtwl__infoboster">Middle Mat</td>
                                <td class="offtwl__infoboster">:</td>
                                <td align="left" class="info code" colspan="2">M44-Black*
                                </td>
                                <td align="left" class="info price"></td>
                                <td align="left" class="hide size" width="26%">1</td>
                                <td align="left" class="hide color" width="5%">222222</td>
                              </tr>
                              <tr class="hide" id="matz3">
                                <td align="left" class="offtwl__infoboster">Bottom Mat</td>
                                <td class="offtwl__infoboster">:</td>
                                <td align="left" class="info code" colspan="2">M44-Black*
                                </td>
                                <td align="left" class="info price"></td>
                                <td align="left" class="hide size" width="26%">1</td>
                                <td align="left" class="hide color" width="5%">222222</td>
                              </tr>
                              <tr class="hide" id="filletz">
                                <td align="left" class="offtwl__infoboster">Fillet</td>
                                <td class="offtwl__infoboster">:</td>
                                <td align="left" class="info code" colspan="2"></td>
                                <td align="left" class="price"></td>
                                <td align="left" class="hide size" width="26%"></td>
                                <td align="left" class="hide frate" width="5%"></td>
                                <td align="left" class="hide fimg" width="1%"></td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
           
          </div>
        </div>
      </div>

</div>



<div style="background-color: #2b2b2b;margin-top: 0px;" class="col-md-12">
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
        <script src="{{ URL::asset('plain_mirror/static/js/libraries.framesit.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('plain_mirror/static/js/script.frameit.min.js') }}"></script>
  

        <style type="text/css">
          #frame-it-wall{
            background: none;
          }
        </style>

  </body>
</html>
