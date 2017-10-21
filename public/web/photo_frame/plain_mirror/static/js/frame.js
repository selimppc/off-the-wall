var ajaxManager = $.manageAjax.create('cacheQueue', {queue: true, cacheResponse: true});
var totalimgz = 0;
$(function () {
    $('#tabs').tabs();
    //&is_add_cart=<?php echo $_GET['is_add_cart']; ?>";
    url = "/?file=getframednew&iproduct_id=" + $("#prodzid").val() + "&icat_id=" + $("#catzid").val() + "&is_add_cart=" + $("#is_zadd_cart").val();
    $.get(url, function (d) {
        // $("#body").html(d);
        $("a.zoom").fancybox({
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': '600',
            'speedOut': '200',
            'overlayShow': 'true'
        });
        $("a.lrgimg").fancybox({
            'type': 'ajax',
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': '600',
            'speedOut': '200',
            'overlayShow': 'true'
        });
        //$("a.lrgimg").fancybox({'type':'iframe', 'width':'900', 'height':'800', 'autoDimensions':false});
        // $("a.lrgimg").fancybox({
        // 	'type':'ajax',

        //  'fitToView':true,
        //  'autoDimensions':false,
        //  'type':'iframe',
        //  'autoSize':false,
        // 	'width':900,
        // 	'height':900
        //  });
        $("#add2cart").hide();
    });


    if ($("#glass_available").val() != 0) {
        $("#glass_type").live("change", function () {
            update_price($(this).val(), "glassez");
        });
    }
    $("#backing_type").live("change", function () {
        console.log(this.children[this.selectedIndex]);
        console.log(this.children[this.selectedIndex].getAttribute("data-price"));
        var dataPrice = this.children[this.selectedIndex].getAttribute("data-price");
        update_price(this.value, "backingz", dataPrice);
    });

    $("#add2cart").live("click", function () {

        // iframe_id

        if ($("#is_add_cart").val() == '1' && $("#iframe_id").val() == "") {
            alert("Please select frame first.");
            return false;
        }


        add2cart();
    });

    $('#colorpickerHolder').ColorPicker({
        flat: true, color: '#ffffff',
        onChange: function (hsb, hex, rgb) {
            $("#frame-it-wall").css("background-color", "#" + hex);
        }
    });

    if ($("#glass_available").val() == 0) {
        $("#glass_type").val('NG');
    }

    $("#iframe_cat_id").val(50);
    $("#frame-it-mat-1-size-selector").val(5);
    $("#frame-it-mat-2-size-selector, #frame-it-mat-3-size-selector").val(1);

    var resizeTimer = null;
    $(window).bind('resize', function () {
        if (resizeTimer) {
            clearTimeout(resizeTimer);
        }
        resizeTimer = setTimeout(resizeUi, 100);
    });
    resizeUi();

});

function showlarger() {
    var lrgimg = "plain-mirror-add-to-cart?sess=" + $("#sess").val() + "&show=1&a=p" + dourl() + "&prod_id=" + $("#iproduct_id").val();
    lrgimg += '&out=/' + $("#sess").val() + '/prod_images/lrg_print_tmp_' + $("#iproduct_id").val() + '.jpg';

    // $("#largerimg").find(".lrgimg").attr("href", lrgimg);
    $("#largerimg").find(".lrgimg").attr("href", canvasFrame.elem.toDataURL());
    return;
}

function resizeUi() {
    var h = $(window).height();
    var w = $(window).width();
    $("#tabs").animate({'height': h - 95});
    $(".ui-tabs-panel").css('height', h - 140);
    $(".ui-tabs-inner-content-frame").css('height', h - 275);
    $(".ui-tabs-inner-content-mats").css('height', h - 310);
    $(".ui-tabs-inner-content-fillets").css('height', h - 225);
};


function selectframelist(e, no) {
    var c = $("#iframe_cat_id").val();
    var code;
    if (no == "2") {
        code = $("#fcodeSel").val();
    }
    else {
        code = "";
    }
    $("#displayframes").html("Loading...");
    var url = $(e.target).find('option:selected').data('url');
    $.get(url + '?c=' + c + '&code=' + code, function (d) {
        $("#displayframes").html(d);
        $("a.zoom").fancybox({
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': '600',
            'speedOut': '200',
            'overlayShow': 'true'
        });
    });

    var $filters = $('.filtr_4');
    setTimeout(function () {
        var k = $filters.filtr($('#displayframes .frame'), {
            trigger: 'keyup change',
            wait: 0,
            checkItem: function (value, item) {
                var valid = true;
                $filters.each(function (a, b) {
                    var $this = $(this);
                    /*  if (this.type === 'text') {
                     if (item.data.indexOf(this.value) === -1) {
                     valid = false;
                     }
                     }*/
                    if (this.tagName.toLowerCase()) {
                        if ((item.data.indexOf(this.value) === -1) && (this.value != 'all')) {
                            valid = false;
                        }
                    }

                });

                return valid;
            }
        });
    }, 100);

    // console.log('from selectframelist');
    return;
}

function selectframelist2() {
    var print_width = parseFloat($("#inner_width").val());
    var print_height = parseFloat($("#inner_height").val());
    var fr = 0, r = 0, s = 0, m1 = 0, m2 = 0, m3 = 0, fi = 0;
    if ($("#framez").css("display") != "none") {
        fr = parseFloat($("#framez > .size").html());
        r = parseFloat($("#framez > .rebate").html());
    }
    if ($("#slipz").css("display") != "none") {
        s = parseFloat($("#slipz > .size").html());
    }
    if ($("#matz1").css("display") != "none") {
        m1 = parseFloat($("#matz1 > .size").html());
    }
    if ($("#matz2").css("display") != "none") {
        m2 = parseFloat($("#matz2 > .size").html());
    }
    if ($("#matz3").css("display") != "none") {
        m3 = parseFloat($("#matz3 > .size").html());
    }
    if ($("#filletz").css("display") != "none") {
        fi += parseFloat($("#filletz > .size").html());
    }

    var iw = print_width + (m1 + m2 + m3 + fi) * 2;
    var ih = print_height + (m1 + m2 + m3 + fi) * 2;

    var r = $("#frate").val();
    // $("#displayframes").html("Loading...");
    if (r != "all") {
        /*$.get('http://localhost/photo-frame-application/load-frame.html?c=x&frate=' + r + '&fmax=' + iw + '&fmin=' + ih, function (d) {
         $("#displayframes").html(d);
         $("a.zoom").fancybox({
         'transitionIn': 'elastic',
         'transitionOut': 'elastic',
         'speedIn': '600',
         'speedOut': '200',
         'overlayShow': 'true'
         });
         });*/
    }
    else {
        // selectframelist();


        // $(function () {
        var $filters = $('.filtr_4');
        var k = $filters.filtr($('#displayframes .frame'), {
            trigger: 'keyup change',
            wait: 0,
            checkItem: function (value, item) {
                var valid = true;
                $filters.each(function (a, b) {
                    var $this = $(this);
                    /*  if (this.type === 'text') {
                     if (item.data.indexOf(this.value) === -1) {
                     valid = false;
                     }
                     }*/
                    if (this.tagName.toLowerCase()) {
                        if ((item.data.indexOf(this.value) === -1) && (this.value != 'all')) {
                            valid = false;
                        }
                    }

                });

                return valid;
            }
        });

        // });
    }
    return;
}

$(function () {
    var $filters = $('.filtr_4');
    var k = $filters.filtr($('#displayframes .frame'), {
        trigger: 'keyup change',
        wait: 0,
        checkItem: function (value, item) {
            var valid = true;
            $filters.each(function (a, b) {
                var $this = $(this);
                /*  if (this.type === 'text') {
                 if (item.data.indexOf(this.value) === -1) {
                 valid = false;
                 }
                 }*/
                if (this.tagName.toLowerCase()) {
                    if ((item.data.indexOf(this.value) === -1) && (this.value != 'all')) {
                        valid = false;
                    }
                }

            });

            return valid;
        }
    });

});


function domat(bg, name) {
    $("#bigmat .color").css("background-color", '#' + bg);
    $("#bigmat .name").html(name);
    return;
}

function checkNoofMats(num) {
    $("#frame-it-mat-size-selector").show();
    $("#totalmat").val(num);
    switch (num) {
        case 0:
            $("#frame-it-mat-size-selector").hide();
            $("#matz1, #matz2, #matz3, #filletz").hide();
            $("#frame-it-mat-style-selector, #topmat").css('width', '100%');
            $("#frame-it-mat-style-selector-2, #frame-it-mat-style-selector-3").hide();
            adjustdim();
            break;
        case 1:
            $("#matz1, #topmat").show();
            $("#middlemat, #bottommat, #matz2, #matz3").hide();
            $("#frame-it-mat-style-selector, #topmat").css('width', '100%');
            $("#frame-it-mat-style-selector-2, #frame-it-mat-style-selector-3").hide();
            if ($("#topmat_id").val() == "" || $("#topmat_id").val() == 0) {
                $("#topmat_id").val(40);
            }
            if ($("#topmatsize").val() == "" || $("#topmatsize").val() == 0) {
                $("#topmatsize").val(5);
            }
            adjustmat(1, 1);
            break;
        case 2:
            $("#matz1, #matz2").show();
            $("#bottommat, #matz3").hide();
            $("#frame-it-mat-style-selector, #frame-it-mat-style-selector-2, #topmat, #middlemat").css('width', '50%').show();
            $("#frame-it-mat-style-selector-3").hide();
            if ($("#topmat_id").val() == "" || $("#topmat_id").val() == 0) {
                $("#topmat_id").val(40);
            }
            if ($("#topmatsize").val() == "" || $("#topmatsize").val() == 0) {
                $("#topmatsize").val(5);
            }
            if ($("#middlemat_id").val() == "" || $("#middlemat_id").val() == 0) {
                $("#middlemat_id").val(40);
            }
            if ($("#middlematsize").val() == "" || $("#middlematsize").val() == 0) {
                $("#middlematsize").val(1);
            }
            adjustmat(2, 1);
            break;
        case 3:
            $("#matz1, #matz2, #matz3").show();
            $("#topmat, #middlemat, #bottommat, #frame-it-mat-style-selector, #frame-it-mat-style-selector-2, #frame-it-mat-style-selector-3").css('width', '33%').show();
            if ($("#topmat_id").val() == "" || $("#topmat_id").val() == 0) {
                $("#topmat_id").val(40);
            }
            if ($("#topmatsize").val() == "" || $("#topmatsize").val() == 0) {
                $("#topmatsize").val(5);
            }
            if ($("#middlemat_id").val() == "" || $("#middlemat_id").val() == 0) {
                $("#middlemat_id").val(40);
            }
            if ($("#middlematsize").val() == "" || $("#middlematsize").val() == 0) {
                $("#middlematsize").val(1);
            }
            if ($("#bottommat_id").val() == "" || $("#bottommat_id").val() == 0) {
                $("#bottommat_id").val(40);
            }
            if ($("#bottommatsize").val() == "" || $("#bottommatsize").val() == 0) {
                $("#bottommatsize").val(1);
            }
            adjustmat(3, 1);
            break;
        default:
            $("#frame-it-mat-size-selector").hide();
            $("#matz1, #matz2, #matz3").hide();
            $("#frame-it-mat-style-selector").css('width', '100%');
            $("#frame-it-mat-style-selector-2, #frame-it-mat-style-selector-3").hide();
            adjustdim();
            break;
    }

    return;
}

function adjustmat(n, r) {
    for (var i = 0; i <= n; i++) {
        $("#matz" + i + " > .size").html($("#frame-it-mat-" + i + "-size-selector").val());
        switch (n) {
            case 1:
                $("#topmatsize").val($("#frame-it-mat-" + i + "-size-selector").val());
                break;
            case 2:
                $("#middlematsize").val($("#frame-it-mat-" + i + "-size-selector").val());
                break;
            case 3:
                $("#bottommatsize").val($("#frame-it-mat-" + i + "-size-selector").val());
                break;
        }
        if ($("#matz" + i + " > .color").html() == "") {
            $("#matz" + i + " > .color").html("222222");
        }
    }
    if (r != "") {
        adjustdim();
    }
    return;
}

function chnimg(c, i, n, witch) {
    $("input[name=matpos]").filter("[value=" + witch + "]").attr('checked', true);

    if ($("input[name=totalmat]:checked").val() == 0) {
        $("#mat1chk").click();
    }

    var id = $("input[name=matpos]:checked").val();
    $("#" + id + " > img").css("background-color", "#" + c);
    $("#" + id + " > .name").html(n);
    adjustmats(n, c, i);
    return;
}

function adjustmats(n, c, i) {
    var id = $("input[name=matpos]:checked").val();

    switch (id) {
        case 'topmat':
            $("#matz1 > .code").html(n);
            $("#matz1 > .size").html($("#frame-it-mat-1-size-selector").val());
            $("#matz1 > .color").html(c);
            $("#topmat_id").val(i);
            $("#topmatsize").val($("#frame-it-mat-1-size-selector").val());
            $("#mat1").css("background-color", "#" + c);
            $("#matz1").show();
            break;
        case 'middlemat':
            $("#matz2 > .code").html(n);
            $("#matz2 > .size").html($("#frame-it-mat-2-size-selector").val());
            $("#matz2 > .color").html(c);
            $("#middlemat_id").val(i);
            $("#middlematsize").val($("#frame-it-mat-2-size-selector").val());
            $("#mat2").css("background-color", "#" + c);
            $("#matz2").show();
            break;
        case 'bottommat':
            $("#matz3 > .code").html(n);
            $("#matz3 > .size").html($("#frame-it-mat-3-size-selector").val());
            $("#matz3 > .color").html(c);
            $("#bottommat_id").val(i);
            $("#bottommatsize").val($("#frame-it-mat-3-size-selector").val())
            $("#mat3").css("background-color", "#" + c);
            $("#matz3").show();
            break;
    }
    return;
}

function GowithMatDetails() {
    return;
}

function removeframe() {
    $("#framez > .code, #framez > .size, #framez > .frate, #framez > .rebate, #framez > .fimg, #framez > .price").html("");
    $("#selectedframeremove").html('');
    $('#fcodeSel').val('none');
    $("#iframe_id").val('');
    $("#glass_type").val('NG');
    $("#backing_type").val('na');
    $("#framez, #glassez, #backingz").hide();
    adjustdim();
}

function removeslip() {
    $("#slipz > .code, #slipz > .size, #slipz > .frate, #slipz > .fimg, #slipz > .price").html("");
    $("#selectedslip").html("<strong>Selected Slip: </strong>none");
    $("#islip_id").val('');
    $("#slipz").hide();
    adjustdim();
}

function removefillet() {
    $("#filletz > .code, #filletz > .size, #filletz > .frate, #filletz > .fimg, #filletz > .price").html("");
    $("#selectedfillet").html("<strong>Selected Fillet: </strong>none");
    $("#ifillet_id").val('');
    $("#filletz").hide();
    adjustdim();
}

function SelectFrameCode(Obj) {
    obj_value = Obj.value;
    /*	var code = $("#code_" + obj_value).val();
     var width = $("#width_" + obj_value).val();
     var frate = $("#frate_" + obj_value).val();
     var rebate = $("#rebate_" + obj_value).val();
     var fimg = $("#fimg_" + obj_value).val();
     var fmin = $("#fmin_" + obj_value).val();
     var fmax = $("#fmax_" + obj_value).val();




     $("#framez > .code").html(code);
     $("#iframe_id").val(obj_value);
     $("#framez > .size").html(width);
     $("#framez > .frate").html(frate);
     $("#framez > .rebate").html(rebate);
     $("#framez > .fimg").html(fimg);
     $("#framez > .fmin").html(fmin);
     $("#framez > .fmax").html(fmax);
     $("#selectedframe").html("<strong>Selected Frame: </strong>"+ code +" <a href='javascript: void(true);' onclick='removeframe();'>(remove)</a>");
     $("#framez, #glassez, #backingz").show();
     $("#glass_type").val('CG');
     if($("#glass_available").val() == 0) { $("#glass_type").val('NG'); $("#glassez").hide(); }
     adjustdim();
     //selectedframe
     */

}


function CanvasFrameImage(elem) {

    /* var DEFAULT_WIDTH = 4 * 2.54;
     var DEFAULT_HEIGHT = 6 * 2.54;*/

    var DEFAULT_WIDTH = 400;
    var DEFAULT_HEIGHT = 600;
    var SCALE = 10;                 // pixel scale: 1cm = SCALE pixels wide.
    var PIRAD = Math.PI / 180;

    var $elem = $(elem),
        ctx;
    var $constructor_this = this;
    this.elem = elem = $elem[0];
    this.ctx = ctx = elem.getContext('2d');
    this.width = $elem.parent().find('.framed-image-placeholder').first().outerWidth();
    this.height = $elem.parent().find('.framed-image-placeholder').first().outerHeight();
    elem.width = this.width;
    elem.height = this.height;
    // this.defaultFrame = 'images/frame_images/thumb/th_cross_frame_1227.jpg';
    this.defaultFrame = 'images/frame_images/top_frame/top_frame_1227.jpg';
    this.setSize = function (width, height) {
        this.width = width || $elem.parent().find('.framed-image-placeholder').first().outerWidth();
        this.height = height || $elem.parent().find('.framed-image-placeholder').first().outerHeight();
        elem.width = this.width;
        elem.height = this.height;
    };
    this.clearCanvas = function () {
        this.ctx.clearRect(0, 0, this.width, this.height);
    };
    this.drawFrame = function (leftFrame, topFrame) {
        // ctx.drawImage(leftFrame, 0, 0)
        var image = new Image();
        image.src = leftFrame;
        image.onload = function () {
            ctx.createPattern(image, 'repeat-y');
        };
    };
    /*   this.drawImage = function (img, position) {
     var image = new Image();
     image.src = img || $constructor_this.defaultFrame;
     image.onload = function () {
     // ctx.clearRect(0, 0, this.width, $constructor_this.height);
     // ctx.drawImage(image, 0, 0, image.width, image.height );
     // ctx.drawImage(image, 0, ($constructor_this.height - image.height + 20), image.width, image.height);

     // draw cropped image
     var sourceX = 0;
     var sourceY = 0;
     var sourceWidth = image.width;
     var sourceHeight = image.height - 20;
     var destWidth = sourceWidth;
     var destHeight = sourceHeight;
     var destX = 0;
     var destY = 0;
     var tempImg = ctx.drawImage(image, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
     /!*var tempCanvas = document.createElement('canvas'),
     tempCanvasCtx = tempCanvas.getContext('2d');
     tempCanvas.width = image.width;
     tempCanvas.height = sourceHeight;
     tempCanvasCtx.drawImage($constructor_this.elem, 100, 0);


     ctx.clearRect(0, 0, $constructor_this.width, $constructor_this.height);
     ctx.drawImage(tempCanvas, 0, 0, 30, 140, 40, 150);
     var pat = ctx.createPattern(image, 'repeat-y');
     ctx.rect(0, 0, image.width, $constructor_this.height);
     ctx.fillStyle = pat;
     ctx.fill();
     document.body.appendChild(image);*!/
     };
     };*/
    this.drawSlipImage = function (frame) {
        console.log('drawSlipImage');
        var fLeft = parseFloat(frame.left) * SCALE,
            fRight = parseFloat(frame.right) * SCALE,
            fTop = parseFloat(frame.top) * SCALE,
            fBottom = parseFloat(frame.bottom) * SCALE;

        console.log('fLeft', fLeft);
        console.log('fRight', fRight);
        console.log('fTop', fTop);
        console.log('fBottom', fBottom);
        var newWidth = parseFloat(DEFAULT_WIDTH) + fLeft + fRight;
        var newHeight = parseFloat(DEFAULT_HEIGHT) + fTop + fBottom;

        console.log('newWidth', newWidth);
        console.log('newHeight', newHeight);

        var canvas = document.createElement('canvas');
        /*canvas.width = newWidth;
         canvas.height = newHeight;*/
        canvas.width = elem.width;
        canvas.height = elem.height;
        console.log('canvas.width', canvas.width);
        console.log('canvas.height', canvas.height);
        var ctx = canvas.getContext('2d');


        var FRAME_IMAGE = new Image();
        // FRAME_IMAGE.src = frame.src || $constructor_this.defaultFrame;
        FRAME_IMAGE.src = frame.src;
        FRAME_IMAGE.onload = function () {
            console.log('Frame onload');
            var tileHeight = FRAME_IMAGE.height;
            console.log('tileHeight', tileHeight);
            // TODO: FIX THE ISSUE FOR IOS/SAFARI WHEN SCALING
            var ctxScale = parseFloat(((SCALE * frame.width) / tileHeight).toFixed(2));
            console.log('ctx scale', ctxScale);
            console.log('canvas-width', canvas.width);
            console.log('canvas-height', canvas.height);
            var ctxScaleWidth = parseInt(canvas.width / ctxScale);
            var ctxScaleHeight = parseInt(canvas.height / ctxScale);
            console.log('ctxScaleWidth', ctxScaleWidth);
            console.log('ctxScaleHeight', ctxScaleHeight);
            ctx.fillStyle = ctx.createPattern(FRAME_IMAGE, 'repeat-x');

            ctx.translate(fLeft, fTop);
            // ctx.scale(0.95, 0.95);
            ////// TOP //////
            ctx.save();
            ctx.scale(ctxScale, ctxScale);
            ctx.fillRect(0, 0, ctxScaleWidth - FRAME_IMAGE.height * 2, FRAME_IMAGE.height);
            ctx.restore();

            ////// BOTTOM //////
            ctx.save();
            ctx.scale(ctxScale, ctxScale);
            ctx.beginPath();
            ctx.translate(ctxScaleWidth, ctxScaleHeight - FRAME_IMAGE.height * 2);
            ctx.rotate(180 * PIRAD);
            ctx.moveTo(0, 0);
            ctx.fillRect(FRAME_IMAGE.height * 2, 0, ctxScaleWidth - FRAME_IMAGE.height * 2, FRAME_IMAGE.height);
            ctx.rotate(180 * PIRAD);
            ctx.restore();

            ////// LEFT //////
            ctx.save();
            ctx.scale(ctxScale, ctxScale);
            ctx.translate(0, ctxScaleHeight - FRAME_IMAGE.height * 2);
            ctx.rotate(-90 * PIRAD);
            console.log('FRAME_IMAGE.height ', FRAME_IMAGE.height);
            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.lineTo(FRAME_IMAGE.height, FRAME_IMAGE.height);
            ctx.lineTo(ctxScaleHeight - FRAME_IMAGE.height * 2, FRAME_IMAGE.height);
            ctx.lineTo(ctxScaleHeight - FRAME_IMAGE.height, 0);
            ctx.lineTo(0, 0);

            ctx.closePath();
            ctx.clip();
            ctx.fill();
            ctx.rotate(90 * PIRAD);
            ctx.translate(0, -ctxScaleHeight);
            ctx.restore();


            ////// RIGHT //////
            ctx.save();
            ctx.scale(ctxScale, ctxScale);
            ctx.translate(ctxScaleWidth - FRAME_IMAGE.height * 2, -FRAME_IMAGE.height);
            ctx.rotate(90 * PIRAD);
            ctx.beginPath();
            ctx.moveTo(0, 0);

            ctx.lineTo(FRAME_IMAGE.height, FRAME_IMAGE.height);
            ctx.lineTo(ctxScaleHeight - (FRAME_IMAGE.height * 2), FRAME_IMAGE.height);
            ctx.lineTo(ctxScaleHeight - FRAME_IMAGE.height, 0);
            ctx.lineTo(0, 0);

            ctx.closePath();
            ctx.clip();
            ctx.fill();
            ctx.rotate(-90 * PIRAD);
            ctx.translate(-ctxScaleWidth, 0);
            ctx.restore();
            // document.body.appendChild(canvas);
            $constructor_this.ctx.save();
            // $constructor_this.ctx.drawImage($('#framedimg')[0], FRAME_IMAGE.width, FRAME_IMAGE.width, framedimg.width - (FRAME_IMAGE.width * 2), framedimg.height - (FRAME_IMAGE.width * 2));
            // $constructor_this.ctx.clearRect(0, 0, framedimg.width, framedimg.height);
            $constructor_this.ctx.drawImage(canvas, 0, 0, canvas.width, canvas.height);
            // $constructor_this.ctx.drawImage($('#framedimg')[0], FRAME_IMAGE.width, FRAME_IMAGE.width, framedimg.width - (FRAME_IMAGE.width * 2), framedimg.height - (FRAME_IMAGE.width * 2));
            $constructor_this.ctx.restore();
            window.kk = ctx;
        };
    };

    this.drawImage = function (frame) {
        console.log('drawImage');
        $constructor_this.setSize();


        var fLeft = parseFloat(frame.left) * SCALE,
            fRight = parseFloat(frame.right) * SCALE,
            fTop = parseFloat(frame.top) * SCALE,
            fBottom = parseFloat(frame.bottom) * SCALE;


        var newWidth = parseFloat(DEFAULT_WIDTH) + fLeft + fRight;
        var newHeight = parseFloat(DEFAULT_HEIGHT) + fTop + fBottom;

        var canvas = document.createElement('canvas');
        /*canvas.width = newWidth;
         canvas.height = newHeight;*/
        canvas.width = elem.width;
        canvas.height = elem.height;

        var ctx = canvas.getContext('2d');


        var FRAME_IMAGE = new Image();
        // FRAME_IMAGE.src = frame.src || $constructor_this.defaultFrame;
        FRAME_IMAGE.src = frame.src;
        FRAME_IMAGE.onload = function () {
            var tileHeight = FRAME_IMAGE.height;
            // console.log(tileHeight);
            // TODO: FIX THE ISSUE FOR IOS/SAFARI WHEN SCALING
            var ctxScale = parseFloat(((SCALE * frame.width) / tileHeight).toFixed(2));

            var ctxScaleWidth = parseInt(canvas.width / ctxScale);
            var ctxScaleHeight = parseInt(canvas.height / ctxScale);

            ctx.fillStyle = ctx.createPattern(FRAME_IMAGE, 'repeat-x');

            // console.log(ctxScale);
            // console.log(ctxScaleWidth);
            // console.log(ctxScaleHeight);

            ////// TOP //////
            ctx.save();
            ctx.scale(ctxScale, ctxScale);
            ctx.fillRect(0, 0, ctxScaleWidth, FRAME_IMAGE.height);
            ctx.restore();

            ////// BOTTOM //////
            ctx.save();
            ctx.scale(ctxScale, ctxScale);
            ctx.beginPath();
            ctx.translate(ctxScaleWidth, ctxScaleHeight);
            ctx.rotate(180 * PIRAD);
            ctx.moveTo(0, 0);
            ctx.fillRect(0, 0, ctxScaleWidth, FRAME_IMAGE.height);
            ctx.rotate(180 * PIRAD);
            ctx.restore();

            ////// LEFT //////
            ctx.save();
            ctx.scale(ctxScale, ctxScale);
            ctx.translate(0, ctxScaleHeight);
            ctx.rotate(-90 * PIRAD);
            ctx.beginPath();
            ctx.moveTo(0, 0);

            ctx.lineTo(FRAME_IMAGE.height, FRAME_IMAGE.height);
            ctx.lineTo(ctxScaleHeight - FRAME_IMAGE.height, FRAME_IMAGE.height);
            ctx.lineTo(ctxScaleHeight, 0);
            ctx.lineTo(0, 0);

            ctx.closePath();
            ctx.clip();
            ctx.fill();
            ctx.rotate(90 * PIRAD);
            ctx.translate(0, -ctxScaleHeight);
            ctx.restore();


            ////// RIGHT //////
            ctx.save();
            ctx.scale(ctxScale, ctxScale);
            ctx.translate(ctxScaleWidth, 0);
            ctx.rotate(90 * PIRAD);
            ctx.beginPath();
            ctx.moveTo(0, 0);

            ctx.lineTo(FRAME_IMAGE.height, FRAME_IMAGE.height);
            ctx.lineTo(ctxScaleHeight - (FRAME_IMAGE.height), FRAME_IMAGE.height);
            ctx.lineTo(ctxScaleHeight, 0);
            ctx.lineTo(0, 0);

            ctx.closePath();
            ctx.clip();
            ctx.fill();
            ctx.rotate(-90 * PIRAD);
            ctx.translate(-ctxScaleWidth, 0);
            ctx.restore();
            // document.body.appendChild(canvas);
            $constructor_this.ctx.save();
            // $constructor_this.ctx.drawImage($('#framedimg')[0], FRAME_IMAGE.width, FRAME_IMAGE.width, framedimg.width - (FRAME_IMAGE.width * 2), framedimg.height - (FRAME_IMAGE.width * 2));
            // $constructor_this.ctx.clearRect(0, 0, framedimg.width, framedimg.height);
            $constructor_this.ctx.drawImage($('#framedimg')[0], 0, 0);

            $constructor_this.ctx.drawImage(canvas, 0, 0, framedimg.width, framedimg.height);
            $constructor_this.ctx.restore();
        };
    };

}

var canvasFrame = new CanvasFrameImage('#draw_frame');
/*canvasFrame.drawImage({
 src: 'images/frame_images/top_frame/top_frame_1227.jpg',
 width: 1.4,
 top: 1.4,
 bottom: 1.4,
 left: 1.4,
 right: 1.4
 });*/
/*canvasFrame.drawSlipImage({
 src: 'images/frame_images/top_frame/top_frame_1227.jpg',
 width: 1.4,
 top: 1.4,
 bottom: 1.4,
 left: 1.4,
 right: 1.4
 });*/
console.log('hi');
var prodsize = $('#prodsize'),
    frame = $('.frame');
$.get('web/photo_frame/plain_mirror/static/json/price-list.json', function (data) {
    var total_prodsize = parseFloat(prodsize.attr('data-total-size')),
        priceRanges = [];
    console.log(total_prodsize);
    $.each(data, function (index, item) {
        priceRanges.push({
            index: parseFloat(index),
            item: item
        });
        // console.log(index);
    });
    console.log(priceRanges);
    frame.each(function () {
        var $this = $(this),
            fprice = $this.find('.fprice').first(),
            frate = $this.find('.frate').first(),
            frateVal = parseFloat(frate.text());
        for (var i = 0; i < priceRanges.length; i++) {
            if (total_prodsize <= priceRanges[i].index && total_prodsize < priceRanges[i + 1].index) {
                console.log(priceRanges[i].item.index);
                console.log(priceRanges[i].item.rate[frateVal]);
                console.log('--------------------');
                fprice.text(priceRanges[i].item.rate[frateVal]);
                break;
            }
        }
    });
});
$(".selectframe").live('click', function () {
    var $this = $(this),
        wrapperParent = $this.parents('.ui-tabs-inner-content-frame').first(),
        parentItem = $this.parents('.frame'),
        frame = parentItem.find('img'),
        frameSrc = frame.attr('src'),
        topFrameSrc = frame.attr('data-src-top'),
        width = parseFloat(parentItem.find('.width').text().trim());
    $('#framedimg').addClass('activated');
    wrapperParent.find('.frame.active').removeClass('active');
    parentItem.addClass('active');

    var c = $("#iframe_cat_id").val();

    var codeValue = $(this).parent().parent().parent().find(".code").html();


    $("#framez > .code").html($(this).parent().parent().parent().find(".code").html());
    $("#iframe_id").val($(this).parent().parent().parent().find(".id").html());
    $("#framez > .size").html($(this).parent().parent().parent().find(".width").html());
    $("#framez > .frate").html($(this).parent().parent().parent().find(".frate").html());
    $("#framez > .rebate").html($(this).parent().parent().parent().find(".rebate").html());
    $("#framez > .fimg").html($(this).parent().parent().parent().find(".fimg").html());
    $("#framez > .fmin").html($(this).parent().parent().parent().find(".fmin").html());
    $("#framez > .fmax").html($(this).parent().parent().parent().find(".fmax").html());

    $('#fcodeSel').val($(this).parent().parent().parent().find(".code").html());
    $("#selectedframeremove").html("<a href='javascript: void(true);' onclick='removeframe();'>(remove)</a>");

    if (codeValue.substring(0, 3) == '108') {
        $("#framez").show();
        $("#glass_type").val('NG');
        $("#glassez, #backingz").hide();
    }
    else {
        $("#framez").show();
        if (!($("#catzid").val() == '1510')) {
            $("#glassez, #backingz").show();
            $("#glass_type").val('CG');
        } else {
            $("#glassez, #backingz").hide();
            $("#glass_type").val('NG');

        }
    }


    if ($("#glass_available").val() == 0) {
        $("#glass_type").val('NG');
        $("#glassez").hide();
    }


    var glassAvailable = document.getElementById('glass_available');
    var selection = document.getElementById('iframe_cat_id');
    if ($(selection).length && selection.value == 74) {
        $("#glass_type").val('NG').change();
        glassAvailable.value = 0;
    }

    //var a = 2;


    adjustdim();
    // console.log('after dim');

    canvasFrame.drawImage({
        src: topFrameSrc || frameSrc,
        width: 1.4,
        top: 1.4,
        bottom: 1.4,
        left: 1.4,
        right: 1.4
    });
});


$(".selectslip").live('click', function () {
    if ($("#framez").css("display") != "none") {

        var $this = $(this),
            parentItem = $this.parents('.frame'),
            frame = parentItem.find('img'),
            frameSrc = frame.attr('src'),
            topFrameSrc = frame.attr('data-src-top'),
            width = parseFloat(parentItem.find('.width').text().trim());


        $("#slipz > .code").html($(this).parent().parent().parent().find(".code").html());
        $("#islip_id").val($(this).parent().parent().parent().find(".id").html());
        $("#slipz > .size").html($(this).parent().parent().parent().find(".width").html());
        $("#slipz > .frate").html($(this).parent().parent().parent().find(".frate").html());
        $("#slipz > .fimg").html($(this).parent().parent().parent().find(".fimg").html());
        $("#selectedslip").html("<strong>Selected Slip: </strong>" + $(this).parent().parent().parent().find(".code").html() + " <a href='javascript: void(true);' onclick='removeslip();'>(remove)</a>");
        $("#slipz").show();
        adjustdim();
        console.log(canvasFrame.elem.width);
        console.log(canvasFrame.elem.height);
        canvasFrame.drawSlipImage({
            src: topFrameSrc,
            width: 1.4,
            top: 1.4,
            bottom: 1.4,
            left: 1.4,
            right: 1.4
        });
    }
    else {
        alert("Please select frame first.");
    }
});

$(".selectfillet").live('click', function () {
    if ($("#matz1").css("display") != "none") {
        $("#filletz > .code").html($(this).parent().parent().parent().find(".code").html());
        $("#ifillet_id").val($(this).parent().parent().parent().find(".id").html());
        $("#filletz > .size").html($(this).parent().parent().parent().find(".width").html());
        $("#filletz > .frate").html($(this).parent().parent().parent().find(".frate").html());
        $("#filletz > .fimg").html($(this).parent().parent().parent().find(".fimg").html());
        $("#selectedfillet").html("<strong>Selected Fillet: </strong>" + $(this).parent().parent().parent().find(".code").html() + " <a href='javascript: void(true);' onclick='removefillet();'>(remove)</a>");
        $("#filletz").show();
        adjustdim();
    }
    else {
        alert("Please select at least One mat first.");
    }
});

function loading(msg) {
    if ($("#framez").css("display") != "none" || $("#slipz").css("display") != "none" || $("#filletz").css("display") != "none") {
        $("#frame").block({
            message: '<img src="./static/images/loading.gif"><br /><br />' + msg,
            css: {
                "font": "13px Arial, Helvetica, sans-serif",
                "background": "#333",
                "color": "#fff",
                "height": "60px",
                "padding": "5px",
                "text-align": "center",
                "width": "130px"
            }
        });
    }
    return;
}

function draw_frame(url, type) {
    loading("Loading Frame(s)...");
    var i = 0;
    if ($("#framez").css("display") != "none") {
        i++;
    }
    if ($("#slipz").css("display") != "none") {
        i++;
    }
    if ($("#filletz").css("display") != "none") {
        i++;
    }
    totalimgz++;
    if (totalimgz == i) {
        $("#frame").unblock();
    }
    /*  ajaxManager.add({
     url: url, success: function (d) {
     $("#" + type).css("background-image", "url('" + d + "')");
     var frameObj = new Image();
     frameObj.src = d;
     $(frameObj).load(function () {
     totalimgz++;
     if (totalimgz == i) {
     $("#frame").unblock();
     }

     });
     }
     });*/
    return;
}

function fixdim() {
    console.log('fixdim func');
    var print_width = parseFloat($("#inner_width").val());
    var print_height = parseFloat($("#inner_height").val());
    var fr = 0, s = 0, m1 = 0, m2 = 0, m3 = 0, fi = 0;
    totalimgz = 0;
    console.log('print_width', print_width);
    console.log('print_height', print_height);
    console.log('fr', fr);
    console.log('s', s);
    console.log('m1', m1);
    console.log('m2', m2);
    console.log('m3', m3);
    console.log('fi', fi);
    console.log('totalimgz', totalimgz);
    if ($("#framez").css("display") != "none") {
        fr = parseFloat($("#framez > .size").html());
    }
    if ($("#slipz").css("display") != "none") {
        s = parseFloat($("#slipz > .size").html());
    }
    if ($("#matz1").css("display") != "none") {
        m1 = parseFloat($("#matz1 > .size").html());
    }
    if ($("#matz2").css("display") != "none") {
        m2 = parseFloat($("#matz2 > .size").html());
    }
    if ($("#matz3").css("display") != "none") {
        m3 = parseFloat($("#matz3 > .size").html());
    }
    if ($("#filletz").css("display") != "none") {
        fi = parseFloat($("#filletz > .size").html());
    }
    var i = getImageArrayValues(print_width, print_height, fr, m1, m2, m3, s, fi, 600);
    console.log('i ', i);
    var pw = parseInt(i[0]), ph = parseInt(i[1]), f = parseInt(i[2]), sl = parseInt(i[3]), mat1 = parseInt(i[4]),
        mat2 = parseInt(i[5]), mat3 = parseInt(i[6]), fl = parseInt(i[7]), top = f, tfb = 0;
    console.log('pw', pw);
    console.log('ph', ph);
    console.log('f', f);
    console.log('sl', sl);
    console.log('mat1', mat1);
    console.log('mat2', mat2);
    console.log('mat3', mat3);
    console.log('fl', fl);
    console.log('top', top);
    console.log('tfb', tfb);
    $("#frame").css("background", "");
    $("#framedimg, #mat1, #mat2, #mat3, #slip, #fillet").removeAttr("style");


    $(".price").html("<img src='./static/images/loading.gif' width='16' height='16' />");

    if (f != 0) {
        var frameurl = "/frame-me.html?sess=" + $("#sess").val() + "&id=frame&print_width=" + (pw + (sl + mat1 + mat2 + mat3 + fl) * 2) + "&print_height=" + (ph + (sl + mat1 + mat2 + mat3 + fl) * 2) + "&frame_width=" + f + "&frame_code=" + $("#framez > .fimg").html() + "&nc=" + Math.random() * 100001;
        /*$("#frame").css({
            "width": (pw + (sl + mat1 + mat2 + mat3 + fl) * 2) + "px",
            "height": (ph + ( sl + mat1 + mat2 + mat3 + fl) * 2) + "px",
            "margin-top": "0"
        });*/

        draw_frame(frameurl, "frame");
        $("#largerimg").show();
    }

    if (s != 0) {
        var slipurl = "/frame-me.html?sess=" + $("#sess").val() + "&id=slip&print_width=" + (pw + (mat1 + mat2 + mat3 + fl) * 2) + "&print_height=" + (ph + (mat1 + mat2 + mat3 + fl) * 2) + "&frame_width=" + sl + "&frame_code=" + $("#slipz > .fimg").html() + "&nc=" + Math.random() * 100001;
        /*$("#slip").css({
            "width": (pw + (sl + mat1 + mat2 + mat3 + fl) * 2) + "px",
            "height": parseInt(ph + (sl + mat1 + mat2 + mat3 + fl) * 2) + "px",
            // "margin": f + "px 0 0 " + f + "px",
            "position": "absolute"
        });*/
        draw_frame(slipurl, "slip");
        top = sl;
    }

    if (m1 != 0) {
        pw = pw + 2;
        ph = ph + 2;
        /*$("#mat1").css({
            "width": ((pw) + (mat1 + mat2 + mat3 + fl) * 2) + "px",
            "height": ((ph) + (mat1 + mat2 + mat3 + fl) * 2) + "px",
            "position": "absolute",
            "background-color": "#" + $("#matz1 > .color").html()
        });*/
        if (s == 0) {
            $("#mat1").css("margin", f + "px 0 0 " + f + "px");
        } else {
            $("#mat1").css("margin", (sl - 1) + "px 0 0 " + (sl - 1) + "px");
        }
        if (f == 0) {
            $("#mat1").css("position", "");
        }

        $("#framedimg").css("border", "1px solid white");
        top = mat1 - 1;
    }

    if (m2 != 0) {
        /* $("#mat2").css({
             "border": "1px solid white",
             "width": ((pw) + (mat2 + mat3 + fl) * 2) + "px",
             "height": ((ph) + (mat2 + mat3 + fl) * 2) + "px",
             "margin": (mat1 - 1) + "px 0 0 " + (mat1 - 1) + "px",
             "position": "absolute",
             "background-color": "#" + $("#matz2 > .color").html()
         });*/
        $("#framedimg").css("border", "1px solid white");
        top = mat2 - 1;
    }

    if (m3 != 0) {
        /*$("#mat3").css({
            "border": "1px solid white",
            "width": ((pw) + (mat3 + fl) * 2) + "px",
            "height": ((ph) + (mat3 + fl) * 2) + "px",
            "margin": (mat2 - 1) + "px 0 0 " + (mat2 - 1) + "px",
            "position": "absolute",
            "background-color": "#" + $("#matz3 > .color").html()
        });*/
        $("#framedimg").css("border", "1px solid white");
        top = mat3 - 1;
    }

    if (fi != 0) {
        var filleturl = "/frame-me.html?sess=" + $("#sess").val() + "&id=fillet&print_width=" + (pw) + "&print_height=" + (ph) + "&frame_width=" + fl + "&frame_code=" + $("#filletz > .fimg").html() + "&nc=" + Math.random() * 100001;
        /*$("#fillet").css({
            "width": (pw + (fl * 2)) + "px",
            "height": parseInt(ph + (fl * 2)) + "px",
            "position": "absolute"
        });*/
        if (m3 != 0) {
            $("#fillet").css("margin", (mat3) + "px 0 0 " + (mat3) + "px");
        } else if (m2 != 0) {
            $("#fillet").css("margin", (mat2) + "px 0 0 " + (mat2) + "px");
        } else {
            $("#fillet").css("margin", (mat1) + "px 0 0 " + (mat1) + "px");
        }
        $("#framedimg").css({"border": "0"});
        if (f == 0) {
            $("#frame-it-frame-loader").fadeTo("slow", 0);
        }
        draw_frame(filleturl, "fillet");
        top = fl;
    }
    console.log('new value');

    console.log('print_width', print_width);
    console.log('print_height', print_height);
    console.log('fr', fr);
    console.log('s', s);
    console.log('m1', m1);
    console.log('m2', m2);
    console.log('m3', m3);
    console.log('fi', fi);
    console.log('totalimgz', totalimgz)

    // $("#framing-image").animate({"height": $("#frame").height()}, 'slow');
    // $("#framedimg").css({"width": (pw) + "px", "height": (ph) + "px", "margin-top": top + "px"});
    // $("#framedimg").css({"width": (pw) + "px", "height": (ph) + "px"});
    console.log('framedimg height applying');
    doprice();
    return;
}

function update_price(val, id, dataPrice) {
    total = $("#totprice").html();
    total = parseFloat(total.replace("AU ", ""));
    pricenow = $("#" + id + " > .price").html();
    pricenow = parseFloat(pricenow.replace("AU ", ""));

    val = val.toLowerCase();
    // var newprice = parseFloat($("#" + val).val());
    var newprice;
    if (dataPrice) {
        newprice = parseFloat(dataPrice);
        // $("#" + val).val(newprice);
    } else {
        newprice = parseFloat($("#" + val).val());
    }
    console.log('dataPrice', dataPrice);
    console.log('newprice', newprice);
    var newtotal = parseFloat(total) - parseFloat(pricenow) + parseFloat(newprice);
    $("#total_price_amount").val((newtotal).formatMoney(2, '.', ','));
    $("#totprice").html("AU " + (newtotal).formatMoney(2, '.', ','));
    $("#" + id + " > .price").html("AU " + (newprice).formatMoney(2, '.', ','));
}

function doprice() {
    console.log('do price ');
    var displayFrames = $('#displayframes'),
        activeFrame = displayFrames.find('.active'),
        framePrice = Number(parseFloat(activeFrame.find('.fprice').first().html()));
    console.log(activeFrame);
    console.log(framePrice);
    var url = "static/json/gcp.js?a=p" + dourl();
    ajaxManager.add({
        url: url,
        success: function (d) {
            console.log(d);
            p = d.split("|");
            var fprice = 0.00, sprice = 0.00, gprice = 0.00, m1price = 0.00, m2price = 0.00, m3price = 0.00,
                bprice = 0.00, fiprice = 0.00;

            if ($("#framez").css("display") != "none") {
                // fprice = parseFloat(p[0]);
                fprice = parseFloat(framePrice);
            }
            /*frame_price = p[0];*/

            if ($("#slipz").css("display") != "none") {
                sprice = parseFloat(p[1]);
            }

            if ($("#catzid").val() == '1510') {
                fprice = fprice * parseFloat($("#csrate").val());
                sprice = sprice * parseFloat($('#csrate').val());
            }


            var gp = 0.00;
            switch ($("#glass_type").val()) {
                case "NG":
                    gp = 0.00;
                    break;
                case "CG":
                    gp = p[2];
                    /*fclear_glass = p[2];*/
                    break;
                case "NRG":
                    gp = p[3];
                    /*fnon_ref_glass = p[3];*/
                    break;
                case "UVG":
                    gp = p[4];
                    /*fuv_glass = p[4];*/
                    break;
                case "PPG":
                    gp = p[5];
                    /*fperspex_glass = p[5];*/
                    break;
                case "UVRC":
                    gp = p[12];
                    /*fperspex_glass = p[5];*/
                    break;
            }

            var bp = 0.00;
            switch ($("#backing_type").val()) {
                case "na":
                    bp = "0.00";
                    break;
                case "sa3":
                    bp = p[8];
                    console.log(this);
                    break;
                case "nsa3":
                    bp = p[9];
                    break;
                case "sa5":
                    bp = p[10];
                    break;
                case "nsa5":
                    bp = p[11];
                    break;
            }

            $("#ng").val(0.00);
            $("#cg").val(p[2]);
            $("#nrg").val(p[3]);
            $("#uvg").val(p[4]);
            $("#ppg").val(p[5]);
            $("#uvrc").val(p[12]);
            $("#na").val("0.00");
            $("#sa3").val(p[8]);
            $("#nsa3").val(p[9]);
            $("#sa5").val(p[10]);
            $("#nsa5").val(p[11]);

            if ($("#glassez").css("display") != "none") {
                gprice = gp;
            }
            if ($("#backingz").css("display") != "none") {
                bprice = bp;
            }

            if ($("#matz1").css("display") != "none") {
                m1price = p[6];
            }
            /*ftop_mat = p[6];*/
            if ($("#matz2").css("display") != "none") {
                m2price = p[6];
            }
            if ($("#matz3").css("display") != "none") {
                m3price = p[6];
            }
            if ($("#filletz").css("display") != "none") {
                fiprice = p[7];
            }
            /*fillet_price = p[7]; | original_price */

            if ($("#catzid").val() == '1510') {
                gprice = 0;
                bprice = 0;
            }

            $("#framez > .price").html("AU " + rounder(parseFloat(fprice)).toFixed(2));
            $("#glassez > .price").html("AU " + rounder(parseFloat(gprice)).toFixed(2));
            $("#backingz > .price").html("AU " + rounder(parseFloat(bprice)).toFixed(2));
            $("#slipz > .price").html("AU " + rounder(parseFloat(sprice)).toFixed(2));
            $("#matz1 > .price").html("AU " + rounder(parseFloat(m1price)).toFixed(2));
            $("#matz2 > .price").html("AU " + rounder(parseFloat(m2price)).toFixed(2));
            $("#matz3 > .price").html("AU " + rounder(parseFloat(m3price)).toFixed(2));
            $("#filletz > .price").html("AU " + rounder(parseFloat(fiprice)).toFixed(2));

            var total = parseFloat($("#original_price").val())
                + rounder(parseFloat(fprice))
                + rounder(parseFloat(sprice))
                + rounder(parseFloat(gprice))
                + rounder(parseFloat(bprice))
                + rounder(parseFloat(m1price))
                + rounder(parseFloat(m2price))
                + rounder(parseFloat(m3price))
                + rounder(parseFloat(fiprice));

            if ($("#catzid").val() == '1510') {
                total = rounder(fprice + sprice);
            }
            $("#total_price_amount").val((total).formatMoney(2, '.', ','));
            $("#totprice").html("AU " + (total).formatMoney(2, '.', ','));
        }
    });
}

function rounder(val) {
    return Math.ceil(val * 20) / 20;
}

function adjustdim() {
    var print_width = parseFloat($("#inner_width").val());
    var print_height = parseFloat($("#inner_height").val());
    var fr = 0, r = 0, s = 0, m1 = 0, m2 = 0, m3 = 0, fi = 0;

    $("#add2cart").show();

    if ($("#framez").css("display") != "none") {
        fr = parseFloat($("#framez > .size").html());
        r = parseFloat($("#framez > .rebate").html());
    }
    if ($("#slipz").css("display") != "none") {
        s = parseFloat($("#slipz > .size").html());
    }
    if ($("#matz1").css("display") != "none") {
        m1 = parseFloat($("#matz1 > .size").html());
    }
    if ($("#matz2").css("display") != "none") {
        m2 = parseFloat($("#matz2 > .size").html());
    }
    if ($("#matz3").css("display") != "none") {
        m3 = parseFloat($("#matz3 > .size").html());
    }
    if ($("#filletz").css("display") != "none") {
        fi += parseFloat($("#filletz > .size").html());
    }

    var fw = print_width + (fr - r + s + m1 + m2 + m3 + fi) * 2;
    var fh = print_height + (fr - r + s + m1 + m2 + m3 + fi) * 2;
    var iw = print_width + (m1 + m2 + m3 + fi) * 2;
    var ih = print_height + (m1 + m2 + m3 + fi) * 2;


    $("#final_width").val(fw);
    $("#final_height").val(fh);

    $("#prodinfo").html("Finished Product Approx. Size:  " + roundNumber(fw) + " x " + roundNumber(fh) + " cm - Internal Size (" + roundNumber(iw) + " x " + roundNumber(ih) + " cm)");

    $("#prodzinfo").show();
    $("#prodzerror").hide();

    if (m1 != 0) {
        var merr = check_mat(iw, ih);
        if (merr != "") {
            $("#frame-it-frame-loader").hide();
            $("#prodzinfo").hide();
            $("#prodzerror").find('.msg').html(merr);
            $("#prodzerror").show();
            return;
        }
    }

    if (fr != 0 && s == 0) {
        var fmin = parseFloat($("#framez > .fmin").html());
        var fmax = parseFloat($("#framez > .fmax").html());

        var err = check_frame(fmin, fmax, iw, ih);
        if (err != "") {
            $("#frame-it-frame-loader").hide();
            $("#prodzinfo").hide();
            $("#prodzerror").find('.msg').html(err);
            $("#prodzerror").show();
            return;
        }
    }

    fixdim();
    return;
}


function check_mat(w, h) {
    var msg = '';
    if (w > 152 || h > 152 || (w > 101.5 && h > 101.5)) {
        msg = 'Print too large to be matted.';
    }
    return msg;
}

function check_frame(fmin, fmax, fowidth, foheight) {
    var msg = '';
    if (fowidth > fmax) {
        // msg = 'This frame is NOT strong enough for sizes over (' + fmax + ' cm)<br />Please adjust size or <a href="javascript: void(true);" onclick="reload_frames(' + fowidth + ', ' + foheight + ');">Click here to reload suitable frames</a>.';
        msg = 'This frame is NOT strong enough for sizes over (' + fmax + ' cm)<br />Please adjust size.';
    }

    if (foheight > fmax) {
        // msg = 'This frame is NOT strong enough for  sizes over (' + fmax + ' cm)<br />Please adjust size or <a href="javascript: void(true);" onclick="reload_frames(' + fowidth + ', ' + foheight + ');">Click here to reload suitable frames</a>.';
        msg = 'This frame is NOT strong enough for  sizes over (' + fmax + ' cm)<br />Please adjust size.';
    }

    if (fowidth < fmin) {
        msg = 'We can not cut frames under (' + fmin + ' cm) .<br />Please either add a mat or adjust the size to minimum of 10cm.';
    }

    if (foheight < fmin) {
        msg = 'We can not cut frames under (' + fmin + ' cm) .<br />Please either add a mat or adjust the size to minimum of 10cm.';
    }

    return msg;
}

function reload_frames(w, h) {
    $('#tabs').tabs().tabs('select', 0);
    var c = $("#iframe_cat_id").val();
    $("#displayframes").html("Loading...");
    $("#displayframes").load('http://localhost/photo-frame-application/load-frame.html?c=' + c + '&fmax=' + w + '&fmin=' + h);

    return;
}

function add2cart() {
    $("#frame-it-frame-loader").html('<img src="./static/images/loader.gif"><br />Adding to Cart...');
    loading("Adding to Cart");

    if ($("#glass_available").val() == 0) {
        glass_type = "NG";
    }

    if ($("#catzid").val() == '1510') {
        bp = 0;
        b = "nb";
        glass_type = "NG";
        gp = 0;
    }
    else {
        var b = $("#backing_type").val(), bp = $("#backingz > .price").html();
        bp = bp.replace('AU ', '');
    }
    var file = "newaddtocart", action = "addtocart", iproduct_id = $("#iproduct_id").val(), icat_id = $(
        "#icat_id").val();
    var iframe_id = $("#iframe_id").val(), glass_type = $("#glass_type").val(), totalmat = $("#totalmat").val();
    var fwidth = $("#final_width").val(), fheight = $("#final_height").val();
    var fcode = $("#framez > .code").html(), scode = $("#slipz > .code").html(), ficode = $(
        "#filletz > .code").html();

    var topmat_id = "", topmatsize = "", middlemat_id = "", middlematsize = "", bottommat_id = "", bottommatsize = "";

    if ($("#matz1").css("display") != "none") {
        topmat_id = $("#topmat_id").val();
        topmatsize = $("#topmatsize").val();
    }
    if ($("#matz2").css("display") != "none") {
        middlemat_id = $("#middlemat_id").val();
        middlematsize = $("#middlematsize").val();
    }
    if ($("#matz3").css("display") != "none") {
        bottommat_id = $("#bottommat_id").val();
        bottommatsize = $("#bottommatsize").val();
    }


    /*    var furl = "/frame-preview.html?a=p" + dourl() + "&prod_id=" + $("#iproduct_id").val();
        furl += '&out=/' + $("#sess").val() + '/prod_images/final_lrg_print_' + $("#iproduct_id").val() + '.jpg';*/


    var furl = "plain-mirror-add-to-cart?a=p" + "&product_type=" + $("#product_type").val() + "&total_price_amount=" + $("#total_price_amount").val();
    furl += "&original_price=" + $("#original_price").val() + "&frame_code=" + $("#framez").find('.code').text() + "&frame_price=" + $("#framez").find('.price').text();
    furl += "&backing_type=" + $("#backing_type").val() + "&backing_type_price=" + parseFloat($("#backing_type")[0].children[$("#backing_type")[0].selectedIndex].getAttribute('data-price'));
    // furl += "&canvas_img=" + canvasFrame.elem.toDataURL() ;


    var furlData = {
        '_token':$("#csrf_token").val(),
        a: "p",
        product_type: $("#product_type").val(),
        total_price_amount: $("#total_price_amount").val(),
        original_price: $("#backing_type").val(),
        frame_code: $("#framez").find('.code').text(),
        frame_price: $("#framez").find('.price').text(),
        backing_type: $("#backing_type").val(),
        backing_type_price: parseFloat($("#backing_type")[0].children[$("#backing_type")[0].selectedIndex].getAttribute('data-price')),
        photo: canvasFrame.elem.toDataURL('image/jpeg', 1.0),
        width: $('#inner_width').val(),
        height: $('#inner_height').val()
    };


    var prod_type = document.getElementById('product_type');

    var prodstring = '';
    if (prod_type) {
        prodstring = '&product_type=' + prod_type.value
    }


    $.ajax({
        method: 'POST',
        url: 'plain-mirror-add-to-cart',
        data: furlData,
        success: function (response) {
            console.log(response);
            var url = '/index.php?file=' + file + '&action=' + action + '&iproduct_id=' + iproduct_id + '&icat_id=' + icat_id + '&iframe_id=' + iframe_id;
            url += '&glass_type=' + glass_type + '&totalmat=' + totalmat + '&topmat_id=' + topmat_id + '&topmatsize=' + topmatsize;
            url += '&middlemat_id=' + middlemat_id + '&middlematsize=' + middlematsize + '&bottommat_id=' + bottommat_id;
            url += '&bottommatsize=' + bottommatsize + '&fwidth=' + fwidth + '&fheight=' + fheight + '&key_id=&fcode=' + fcode + '&b=' + b + '&bp=' + bp;
            url += '&swid=' + $("#slipz > .size").html() + "&islip_id=" + $("#islip_id").val() + "&scode=" + scode;
            url += '&fiwid=' + $("#filletz > .size").html() + '&ifillet_id=' + $("#ifillet_id").val() + "&ficode=" + ficode;
            url += prodstring;
            window.location = "mycart";
        }
    });


    /*ajaxManager.add({
        url: furl, success: function (d) {
            var url = '/index.php?file=' + file + '&action=' + action + '&iproduct_id=' + iproduct_id + '&icat_id=' + icat_id + '&iframe_id=' + iframe_id;
            url += '&glass_type=' + glass_type + '&totalmat=' + totalmat + '&topmat_id=' + topmat_id + '&topmatsize=' + topmatsize;
            url += '&middlemat_id=' + middlemat_id + '&middlematsize=' + middlematsize + '&bottommat_id=' + bottommat_id;
            url += '&bottommatsize=' + bottommatsize + '&fwidth=' + fwidth + '&fheight=' + fheight + '&key_id=&fcode=' + fcode + '&b=' + b + '&bp=' + bp;
            url += '&swid=' + $("#slipz > .size").html() + "&islip_id=" + $("#islip_id").val() + "&scode=" + scode;
            url += '&fiwid=' + $("#filletz > .size").html() + '&ifillet_id=' + $("#ifillet_id").val() + "&ficode=" + ficode;
            url += prodstring;
            window.location = url;
        }
    });*/
}

function dourl() {
    var print_width = parseFloat($("#inner_width").val());
    var print_height = parseFloat($("#inner_height").val());
    var fr = 0, frate = 0, r = 0, s = 0, srate = 0, m1 = 0, m2 = 0, m3 = 0, fi = 0, filrate = 0;

    if ($("#framez").css("display") != "none") {
        fr = parseFloat($("#framez > .size").html());
        frate = parseFloat($("#framez > .frate").html());
    }
    if ($("#slipz").css("display") != "none") {
        s = parseFloat($("#slipz > .size").html());
        srate = parseFloat($("#slipz > .frate").html());
    }
    if ($("#matz1").css("display") != "none") {
        m1 = parseFloat($("#matz1 > .size").html());
    }
    if ($("#matz2").css("display") != "none") {
        m2 = parseFloat($("#matz2 > .size").html());
    }
    if ($("#matz3").css("display") != "none") {
        m3 = parseFloat($("#matz3 > .size").html());
    }
    if ($("#filletz").css("display") != "none") {
        fi = parseFloat($("#filletz > .size").html());
        filrate = parseFloat($("#filletz > .frate").html());
    }

    var url = '&print_width=' + print_width + '&print_height=' + print_height;
    url += '&frame_width=' + fr + '&slw=' + s + '&fiw=' + fi;
    url += '&frame_code=' + $("#framez > .fimg").html() + '&sl=' + $("#slipz > .fimg").html() + '&fi=' + $("#filletz > .fimg").html();
    url += '&c1=' + $("#matz1 > .color").html() + '&c2=' + $("#matz2 > .color").html() + '&c3=' + $("#matz3 > .color").html();
    url += '&mat1=' + m1 + '&mat2=' + m2 + '&mat3=' + m3;
    url += '&frate=' + frate + "&srate=" + srate + '&filrate=' + filrate + '&img=' + $("#original_image").val();
    return url;
}

function getImageArrayValues(printwidth, printheight, fr_cm, mat_1_cm, mat_2_cm, mat_3_cm, slip_cm, fillet_cm, draw_area) {
    var dim_factor = printheight;
    var small_factor = printwidth;

    if (printwidth > printheight) {
        dim_factor = printwidth;
        small_factor = printheight;
    }

    ref_pt = ((draw_area / (dim_factor + ((fr_cm + fillet_cm + slip_cm + mat_1_cm + mat_2_cm + mat_3_cm) * 2))));

    fr_pix = ((fr_cm * ref_pt));
    fillet_pix = ((fillet_cm * ref_pt));
    slip_pix = ((slip_cm * ref_pt));
    mat_1_pix = ((mat_1_cm * ref_pt));
    mat_2_pix = ((mat_2_cm * ref_pt));
    mat_3_pix = ((mat_3_cm * ref_pt));
    tot_1 = (fr_pix + slip_pix + fillet_pix + mat_1_pix + mat_2_pix + mat_3_pix) * 2;
    higher_size = (draw_area - tot_1);
    lower_size = ref_pt * small_factor;

    if (printwidth == printheight) {
        wid = (higher_size);
        hei = (higher_size);
    } else {
        if (printwidth > printheight) {
            wid = (higher_size);
            hei = (lower_size);
        } else {
            wid = (lower_size);
            hei = (higher_size);
        }
    }

    return Array(parseInt(wid), parseInt(hei), parseInt(fr_pix), parseInt(slip_pix), parseInt(mat_1_pix), parseInt(mat_2_pix), parseInt(mat_3_pix), parseInt(fillet_pix));
}

Number.prototype.formatMoney = function (c, d, t) {
    var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t,
        s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

function roundNumber(num) {
    return Math.round(num * Math.pow(10, 1)) / Math.pow(10, 1);
}

function editme() {

    alert("Sumer");
    $("#editpanel").show();
    $("#editbutton").hide();
    $("#newwidth").val($("#inner_width").val());
    $("#newheight").val($("#inner_height").val());
}

function cancelme() {
    $("#editpanel").hide();
    $("#editbutton").show();
    //$("#newwidth").val($("#inner_width").val());
    //$("#newheight").val($("#inner_height").val());
}

function submit_new() {
    var w = $("#newwidth").val();
    var h = $("#newheight").val();
// var iprod_id = $("#iprod_id").val();
// var icat_id = $("#icat_id").val();


    if (w < 10 || h < 10 || w > 244 || h > 244 || (w > 122 && h > 122)) {
        alert("Minimum size: 10x10 cm  ||  Maximum size: 244x122 || Or 122x244 cm.");

        return false;


    }


    if (w != "" && h != "") {
        // update_dim(iprod_id,document.getElementById("newwidth").value,document.getElementById("newheight").value);
        $("#inner_width").val($("#newwidth").val());
        $("#inner_height").val($("#newheight").val());

        $("#final_width").val($("#newwidth").val());
        $("#final_height").val($("#newheight").val());


        $("#prodsize").html("Product Size: " + w + " x " + h + " cm");
        $("#editpanel").hide();
        $("#editbutton").show();
        adjustdim();
    }
    else {
        alert("Please provide the new dimensions.");
    }
}
