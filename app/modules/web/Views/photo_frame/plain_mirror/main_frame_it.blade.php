<?php
session_start();
?>
<!DOCTYPE html>
<pre style="display: none;">

<?php
$_SESSION['file'] = $_POST['file'];
$_SESSION['url_action'] = $_POST['url_action'];
$_SESSION['action'] = $_POST['action'];
$_SESSION['imgwidth'] = $_POST['imgwidth'];
$_SESSION['imgheight'] = $_POST['imgheight'];
//$_SESSION['frameitImg'] = $_POST['frameitImg'];
$_SESSION['frameitImg'] = $_POST['frameitCanvasImg'];
//$_SESSION['frameitCanvasImg'] = $_POST['frameitCanvasImg'];
$_SESSION['price_val'] = $_POST['price_val'];
$_SESSION['initial_default_img'] = $_POST['initial_default_img'];
print_r($_SESSION);
?>
</pre>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="-1"/>
    <!--    <script src="/cdn-cgi/apps/head/tIqjGRDOiDod8EFNSO1xNIXLk3c.js"></script>-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('web/photo_frame/plain_mirror/static/css/multiple-file.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('web/photo_frame/plain_mirror/static/css/new-custom.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/photo_frame/static/css/custom.css') }}">
    <!--    <script type="text/javascript" src="static/js/jquery.1.5.1.min.js"></script>-->
    <script type="text/javascript" src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/jquery-2.1.3.min.js') }}"></script>
    <title>Frame It</title>
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

    <div class="col-sm-11 col-sm-offset-1">
        <div class="row">
            <ul class="main-menu">
                <li>
                    <a href="#">Custom Picture Framing</a>
                </li>
                 <li>
                    <a class="active" href="#">Plain Mirror</a>
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

    <input type="hidden" id="prodzid" value="1148808"/>
    <input type="hidden" id="catzid" value="1420"/>
    <input type="hidden" id="csrate" value="0.75"/>
    <input type="hidden" id="is_zadd_cart" value="1"/>
    <input type="hidden" id="glass_available" value="0"/>
    <input type='hidden' id='product_type' name='product_type' value='MIRROR'/>
    <input type='hidden' id='csrf_token' name='csrf_token' value='{{ csrf_token() }}'/>

    <div class="container" id="frameit">
        <div class="span-24">
            
            <div class="span-18 column last">
                <div id="body">
                    <form name="getframed" id="getframed" method="post" action="">
                        <input type="hidden" name="sess" id="sess" value="<?php print $_SESSION['initial_default_img']; ?>"/>
                        <input type="hidden" name="iframe_id" id="iframe_id"/>
                        <input type="hidden" name="is_add_cart" id="is_add_cart" value="1"/>
                        <input type="hidden" name="islip_id" id="islip_id"/>
                        <input type="hidden" name="ifillet_id" id="ifillet_id"/>
                        <input type="hidden" name="iproduct_id" id="iproduct_id" value="1149020"/>
                        <input type="hidden" name="icat_id" id="icat_id" value="1420"/>
                        <input type="hidden" name="original_price" id="original_price" value="<?php print $_SESSION['price_val']; ?>"/>
                        <input type="hidden" name="total_price_amount" id="total_price_amount" value="<?php print $_SESSION['price_val']; ?>"/>
                        <input type="hidden" name="totalmat" id="totalmat" value=""/>
                        <input type="hidden" name="topmat_id" id="topmat_id" value=""/>
                        <input type="hidden" name="topmatsize" id="topmatsize" value=""/>
                        <input type="hidden" name="middlemat_id" id="middlemat_id" value=""/>
                        <input type="hidden" name="middlematsize" id="middlematsize" value=""/>
                        <input type="hidden" name="bottommat_id" id="bottommat_id" value=""/>
                        <input type="hidden" name="bottommatsize" id="bottommatsize" value=""/>
                        <input type="hidden" name="final_width" id="final_width" value="<?php print $_SESSION['imgwidth']; ?>"/>
                        <input type="hidden" name="final_height" id="final_height" value="<?php print $_SESSION['imgheight']; ?>"/>
                        <input type="hidden" id="original_image" value="/user_images/user_images_temp/82ce1c0ca17d45ea2d70e9d29ad59412/prod_images/lrg_print_1149020.jpg"/>
                        <input type="hidden" id="inner_width" value="<?php print $_SESSION['imgwidth']; ?>"/>
                        <input type="hidden" id="inner_height" value="<?php print $_SESSION['imgheight']; ?>"/>
                        <input type="hidden" id="ng" name="ng"/>
                        <input type="hidden" id="cg" name="cg"/>
                        <input type="hidden" id="nrg" name="nrg"/>
                        <input type="hidden" id="uvg" name="uvg"/>
                        <input type="hidden" id="uvrc" name="uvrc"/>
                        <input type="hidden" id="ppg" name="ppg"/>
                        <input type="hidden" id="na" name="na" />
                        <input type="hidden" id="sa3" name="sa3" />
                        <input type="hidden" id="nsa3" name="nsa3" />
                        <input type="hidden" id="sa5" name="sa5" />
                        <input type="hidden" id="nsa5" name="nsa5" />
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td valign="top">
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="center" id="frame-it-wall" style="border-bottom:1px dashed #ccc;" valign="top">
                                                <div class="row">
                                                    <div class="span-9">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" align="center">
                                                                    <div id="framing-image" style="display:block; margin-top: 0;" class="">
                                                                        <div id="frame">
                                                                            <div id="slip">
                                                                                <div id="mat1">
                                                                                    <div id="mat2">
                                                                                        <div id="mat3">
                                                                                            <div id="fillet">
                                                                                                <div id="print">
                                                                                                    <canvas id="draw_frame"></canvas>
                                                                                                    <!--                                                                                            <img id="framedimg" class="framed-image-placeholder" width="500" height="500" src="--><?php //print $_SESSION['initial_default_img']; ?><!--" border="0" alt="Final Product"/>-->
                                                                                                    <!--                                                                                            <img id="framedimg" class="framed-image-placeholder" width="" height="" src="--><?php //print $_SESSION['initial_default_img']; ?><!--" border="0" alt="Final Product"/>-->
                                                                                                    <img id="framedimg" class="framed-image-placeholder" width="" height="" src="<?php print $_SESSION['frameitImg']; ?>" border="0" alt="Final Product"/>
                                                                                                    <!--                                                                                            <img id="framedimg" class="framed-image-placeholder" width="" height="" src="--><?php //print $_SESSION['frameitCanvasImg']; ?><!--" border="0" alt="Final Product"/>-->
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
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr id="largerimg" style="display:none;">
                                                                <td height="8" colspan="3" align="center" class="hide">
                                                                    <a style="text-decoration: none;" href="javascript: void(true);" onclick="showlarger();" class="lrgimg"><span
                                                                                class="infob">View Large Image</span>
                                                                    </a>
                                                                    <br/>
                                                                    <br/>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 17px;" align="center" id="prodinfo" class="info">
                                                <div id="prodsize" data-total-size="<?php echo ($_SESSION['imgwidth'] + $_SESSION['imgheight']); ?>">
                                                    Product Size: <?php print $_SESSION['imgwidth']; ?> x <?php print $_SESSION['imgheight']; ?> cm
                                                </div>
                                                <div id="editpanel" style="display:none; text-align:center">
                                                    <table width="100%">
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
                                                                    <a href="#" onclick="submit_new();">
                                                                        <font face="Verdana"
                                                                              size="2">Update</font></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="cancelme();">
                                                                        <font face="Verdana"
                                                                              size="2">Cancel</font></a>
                                                                </div>
                                                            </td>
                                                    </table>
                                                </div>
                                                <div style="display:none;" id="editbutton">
                                                    <table width="20%" align="center">
                                                        <tr>
                                                            <td bgcolor="#3a4692" height="25" width="134" align="center">
                                                                <a href="#" onclick="Javascript:editme();" style="text-decoration: none; text-align: center; font-weight: 700">
                                                                    <font color="#FFFFFF" face="Verdana" size="2">Change Custome Size</font>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top-style: none; border-top-width: medium">
                                                <p style="margin-left:10em;"><font color="#008000"></td>
                                        </tr>
                                        <tr id="size-notice" class="hide" style="display:none">
                                            <td align="center" id="prodinfo" class="info hide">&nbsp;
                                                <a href="/images/Rebate.jpg" class="zoom">
                                                    <b>Size info</b> (Please See
                                                    relation between print size and frame size)
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                                    <tr>
                                                        <td width="100%" valign="top">
                                                            <div id="prodzerror" class="ui-widget"
                                                                 style="width: 65%; display:none; margin: 0 auto; margin-top: 10px;">
                                                                <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all">
                                                                    <p><span style="float: left; margin-right: .3em;"
                                                                             class="ui-icon ui-icon-alert"></span>
                                                                        <strong>Alert:</strong>
                                                                        <span class="msg"></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <table id="prodzinfo" width="65%" border="0" align="center" cellpadding="3"
                                                                   cellspacing="1" bgcolor="#FFFFFF">
                                                                <tr>
                                                                    <td valign="top">
                                                                        <table width="100%" border="0" cellpadding="3" cellspacing="1"
                                                                               class="border">
                                                                            <tr align="left">
                                                                                <td width="15%" class="infob"> Price</td>
                                                                                <td width="4%" class="infob">:</td>
                                                                                <td width="39%">
                                                                                    <div id="totprice" class="info price">
                                                                                        AU <?php print $_SESSION['price_val']; ?>
                                                                                    </div>
                                                                                </td>
                                                                                <td width="40%">
                                                                                    <table width="100%" border="0" cellspacing="1"
                                                                                           cellpadding="3" id="table2">
                                                                                        <tr>
                                                                                            <td width="42%" align="right">&nbsp;</td>
                                                                                            <td width="54%" class="highlight">
                                                                                                <a href="javascript: void(true);"
                                                                                                   id="add2cart" class="highlight">
                                                                                                    <img
                                                                                                            src="web/photo_frame/plain_mirror/static/images/cart-icon.gif"
                                                                                                            border="0" width="140" height="19"
                                                                                                            alt="Add to Cart"
                                                                                                            title="Add to Cart"/>
                                                                                                </a>
                                                                                                <br>
                                                                                                <!---    <span class="infob"></span>
                                                                                 <font color="#FF0000">Sorry! We dont supply Mirror without frame!, Please <u>ADD A FRAME</u>
                                                                                  &nbsp;first, then Addtocart.</font> -->
                                                                                                </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top">
                                                                        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="border">
                                                                            <tr id="prodz">
                                                                                <td width="5%" align="left" valign="top" class="infob">
                                                                                    Product
                                                                                </td>
                                                                                <td width="1%" class="infob">:</td>
                                                                                <td width="50%" align="left" class="info" colspan="2">
                                                                                    Plain Mirror
                                                                                </td>
                                                                                <td width="28%" align="left" class="infob pricec">
                                                                                    AU <?php print $_SESSION['price_val']; ?>
                                                                                </td>
                                                                                <td align="left" class="hide size" width="26%">
                                                                                    <span class="width">50</span>
                                                                                    |
                                                                                    <span class="height">80</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="hide" id="framez">
                                                                                <td align="left" class="infob">Frame</td>
                                                                                <td class="infob">:</td>
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
                                                                                <td align="left" class="infob">Slip</td>
                                                                                <td class="infob">:</td>
                                                                                <td align="left" class="info code" colspan="2"></td>
                                                                                <td align="left" class="info price"></td>
                                                                                <td align="left" class="hide size" width="26%"></td>
                                                                                <td align="left" class="hide frate" width="5%"></td>
                                                                                <td align="left" class="hide fimg" width="1%"></td>
                                                                            </tr>
                                                                            <tr class="hide" id="glassez">
                                                                                <td align="left" class="infob">Glass</td>
                                                                                <td class="infob">:</td>
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
                                                                                <td align="center" id="prodinfo" class="info">
                                                                                <td align="left" class="info price">0.00</td>
                                                                            </tr>
                                                                            <!--                                                                        --><?php //if ($_GET['icat_id'] != 1510) { ?>
                                                                            <tr class="hide" id="backingz">
                                                                                <td align="left" class="infob">Backing</td>
                                                                                <td class="infob">:</td>
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
                                                                                <td align="left" class="infob">Top Mat</td>
                                                                                <td class="infob">:</td>
                                                                                <td align="left" class="info code" colspan="2">M44-Black*
                                                                                </td>
                                                                                <td align="left" class="info price"></td>
                                                                                <td align="left" class="hide size" width="26%">5</td>
                                                                                <td align="left" class="hide color" width="5%">222222</td>
                                                                            </tr>
                                                                            <tr class="hide" id="matz2">
                                                                                <td align="left" class="infob">Middle Mat</td>
                                                                                <td class="infob">:</td>
                                                                                <td align="left" class="info code" colspan="2">M44-Black*
                                                                                </td>
                                                                                <td align="left" class="info price"></td>
                                                                                <td align="left" class="hide size" width="26%">1</td>
                                                                                <td align="left" class="hide color" width="5%">222222</td>
                                                                            </tr>
                                                                            <tr class="hide" id="matz3">
                                                                                <td align="left" class="infob">Bottom Mat</td>
                                                                                <td class="infob">:</td>
                                                                                <td align="left" class="info code" colspan="2">M44-Black*
                                                                                </td>
                                                                                <td align="left" class="info price"></td>
                                                                                <td align="left" class="hide size" width="26%">1</td>
                                                                                <td align="left" class="hide color" width="5%">222222</td>
                                                                            </tr>
                                                                            <tr class="hide" id="filletz">
                                                                                <td align="left" class="infob">Fillet</td>
                                                                                <td class="infob">:</td>
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
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="span-6 column last" style="float:right;">
                <div id="right" style="font-size: 12px;">
                    <div id="tabs">
                        <ul>
                            <li>
                                <a href="#frames">Frames</a>
                            </li>
                            <li>
                                <a href="#wallcolor">Wall</a>
                            </li>
                        </ul>
                        <div id="frames">
                            <p>

                                <strong>List frames by Color:</strong>
                                <select class="info filtr_4" name="iframe_cat_id" id="iframe_cat_id" onchange="selectframelist2()">
                                    <option value="all" >All</option>

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
                                <br />
                                <br />

                                <strong> List Frames by Price Rate:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                                <!--                            <select id="frate" name="frate" class="rate_s" onchange="selectframelist2()">-->
                                <select id="frate" name="frate" class="rate_s filtr_4" onchange="selectframelist2()">
                                    <option value="all">All</option>
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
                                <div style="margin-top: 20px; padding: 0pt 0.7em;" class="ui-state-highlight ui-corner-all">
                            <p>
                            <span style="display: none;" id="selectedframe"><strong><img src="web/photo_frame/plain_mirror/static/images/select.GIF" border="0" width="295" alt="Empty picture frames"/>
                                    </a>
                                    <br><br>Selected Frame:: </strong>
                                <input name="filtr_4" class="filtr_4" placeholder="Type to filter list">
                                <!--                                <input type="text" id="fcodeSel" name="fcodeSel" size="5" value="none" >-->
                                <!--                                <input type="button" name="search" title="Search" value="Search" onclick="selectframelist(2)"></span>&nbsp;&nbsp;-->
                            <br>
                                <!-- <span id="selectedframeremove"> --></span>
                            </p>
                        </div>
                        <div style="clear: both;margin-bottom:5px;"></div>
                        <div id="displayframes" class="ui-tabs-inner-content-frame list">
                            @include('web::photo_frame.plain_mirror.1-stains-frames')
                        </div>
                        *******************
                        <p>*******************</p>
                        </p>
                    </div>
                    <div style="clear: both;margin-bottom:5px;"></div>
                    <div id="wallcolor">
                        <div>
                            <div id="colorpickerHolder"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.4.1/jquery-migrate.min.js"></script>-->
    <script type="text/javascript" src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/jquery.migrate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/jquery.browser.min.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/PxLoader.js') }}"></script>
    <script src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/PxLoaderImage.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/jquery.filtr.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/multiple-file.min.js') }}"></script>
    <!--    <script src="./static/js/FrameCreator.min.js?v=1.0"></script>-->
    <!--    <script type="text/javascript" src="static/js/photo-frames.min.js"></script>-->
    <script type="text/javascript" src="{{ URL::asset('web/photo_frame/plain_mirror/static/js/frame.js') }}"></script>
</body>
</html>