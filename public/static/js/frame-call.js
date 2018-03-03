var CustomFramer = function () {
    var initialised = false;
    var canvas;
    var ctx;
    var SCALE = 30; // pixel scale: 1cm = SCALE pixels wide.
    var PIRAD = Math.PI / 180;
    var DEFAULT_WIDTH = 4 * 2.54;
    var DEFAULT_HEIGHT = 6 * 2.54;
    var MAX_CANVAS_WIDTH = 1200;
    var MAX_CANVAS_HEIGHT = 1200;
    var loader = new PxLoader();

    var placeholderText = "Off The Wall";

    var frames = [];

    var preloaded = [];

    var imageManager = {
        image: "http://www.offthewallframing.com.au/web/images/logo.png",
        imageType: "placeholder",
        width: DEFAULT_WIDTH * SCALE,
        height: DEFAULT_HEIGHT * SCALE,

        setImage: function (image) {
            this.image = image;
            this.width = image.width;
            this.height = image.height;
        },

        setWidth: function (width) {
            this.width = width;
        },

        setHeight: function (height) {
            this.height = height;
        }
    };

    var rotateImage = function (degrees) {
        if (typeof degrees === "undefined") {
            degrees = 0;
        }
        var image = imageManager.image;
        var width = image.width;
        var height = image.height;

        var can2 = document.createElement("canvas");
        can2.width = height;
        can2.height = width;
        var ctx2 = can2.getContext("2d");

        ctx2.save();

        ctx2.translate(can2.width / 2, can2.height / 2);
        ctx2.rotate(degrees * PIRAD);
        ctx2.translate(-can2.height / 2, -can2.width / 2);

        ctx2.drawImage(image, 0, 0);

        ctx2.restore();

        imageManager.setImage(can2);
    };

    var setImage = function (image, imageType, callback) {
        if (typeof image === "undefined") {
            imageManager.image = undefined;
            imageManager.imageType = "placeholder";
            return;
        }
        var pxldr = new PxLoader();

        pxldr.addImage(image.src);

        pxldr.addCompletionListener(function () {
            var tmpCanvas = document.createElement("canvas");
            var tmpCtx = tmpCanvas.getContext("2d");
            tmpCanvas.width = image.width;
            tmpCanvas.height = image.height;
            tmpCtx.drawImage(image, 0, 0);
            imageManager.setImage(tmpCanvas);

            imageManager.setWidth(image.width);
            imageManager.setHeight(image.height);

            if (typeof imageType !== "undefined") {
                imageManager.imageType = imageType;
            }

            if (typeof callback === "function") {
                callback();
            }
        });

        pxldr.start();
    };

    var init = function (canvasID, defaultFrame) {
        try {
            canvas = document.getElementById(canvasID);
            ctx = canvas.getContext("2d");
            ctx.fillStyle = "#666";
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            initialised = true;
            if (typeof defaultFrame !== "undefined") {
                addFrame(defaultFrame);
                draw();
            }
            return initialised;
        } catch (e) {
            initialised = false;
            throw new Error("ERROR: CANVAS NOT SET");
        }
    };

    var createFrame = function (width, tileImage) {
        if (width === 0) {
            return frames.length;
        }
        var fr = {};
        fr.width = fr.top = fr.bottom = fr.left = fr.right = width;
        fr.src = tileImage;
        fr.type = "frame";
        frames.push(fr);

        return frames.length;
    };

    var createMat = function (top, right, bottom, left, color) {
        var mat = {};
        mat.top = top;
        mat.right = right;
        mat.bottom = bottom;
        mat.left = left;
        mat.color = color;

        mat.type = "matboard";
        frames.push(mat);

        return frames.length;
    };

    var addFrame = function (frame) {
        // Framing Order:
        // First --> Last  =  Inner --> Outer
        // frame objects need : top bottom left right width and src
        if (typeof frame === "undefined") {
            return frames.length;
        }

        var fr = {};

        fr.width = parseFloat(frame.width) || 0;

        if (fr.width == 0) {
            return frames.length;
        }

        fr.top = parseFloat(frame.left) || frame.width;
        fr.bottom = parseFloat(frame.bottom) || frame.width;
        fr.left = parseFloat(frame.left) || frame.width;
        fr.right = parseFloat(frame.right) || frame.width;

        fr.src = frame.src;
        fr.type = "frame";

        frames.push(fr);

        return frames.length;
    };

    var addItem = function (item) {
        frames.push(item);
    };

    var removeFrame = function () {
        frames.pop();
    };

    var clearFrames = function () {
        frames = [];
        return frames.length;
    };

    var placeholderImage = function () {
        var tmpImage = document.createElement("CANVAS");
        var tmpCtx = tmpImage.getContext("2d");
        tmpImage.width = imageManager.width;
        tmpImage.height = imageManager.height;

        /// FILL ///
        var fillstyle = "#EEE";
        tmpCtx.fillStyle = fillstyle;
        tmpCtx.fillRect(0, 0, tmpImage.width, tmpImage.height);


        /// TEXT ///
        var textSize = 45;
        tmpCtx.save();
        tmpCtx.fillStyle = "#2b2b2b";
        tmpCtx.font = textSize + "px Arial";
        tmpCtx.baseline = "top";
        tmpCtx.textAlign = "center";

        var textArray = placeholderText.split("\n");
        var padding = 15;
        for (var i = 0; i < textArray.length; i++) {
            tmpCtx.fillText(
                textArray[i],
                tmpImage.width / 2,
                tmpImage.height * 0.25 + 175 + i * (padding + textSize)
            );
        }

        tmpCtx.restore();

        /// SHADOW ///
        tmpImage = addInnerShadow(tmpImage);

        return tmpImage;
    };

    var setPlaceholderText = function (text) {
        placeholderText = text;
    };

    var addInnerShadow = function (rect, weight) {
        if (typeof weight == "undefined") {
            weight = 0.5;
        }
        var tmpCtx = rect.getContext("2d");
        tmpCtx.save();
        tmpCtx.shadowBlur = 20;
        tmpCtx.shadowOffsetX = 0;
        tmpCtx.shadowOffsetY = 0;
        tmpCtx.shadowColor = "rgba(1,1,1," + weight + ")";
        tmpCtx.lineWidth = 20;
        var offset = tmpCtx.lineWidth / 2;
        tmpCtx.strokeRect(
            0 - offset,
            0 - offset,
            rect.width + offset * 2,
            rect.height + offset * 2
        );
        tmpCtx.restore();

        return rect;
    };

    var addWhiteStroke = function (rect) {
        var tmpCtx = rect.getContext("2d");
        tmpCtx.save();
        tmpCtx.strokeStyle = "white";
        tmpCtx.lineWidth = 6;
        var offset = tmpCtx.lineWidth / 2;
        //tmpCtx.strokeRect(0 - offset,0 - offset,rect.width + (offset * 2), rect.height + (offset * 2));
        tmpCtx.strokeRect(0, 0, rect.width, rect.height);
        tmpCtx.restore();
        return rect;
    };

    var draw = function (options) {
        if (!initialised) {
            throw new Error("Not Initialised");
        }

        if (typeof options !== "undefined") {
            if (options.inches) {
                options.width *= 2.54;
                options.height *= 2.54;
            }

            SCALE = Math.min(
                MAX_CANVAS_WIDTH / options.width,
                MAX_CANVAS_HEIGHT / options.height
            );

            imageManager.setWidth(parseFloat(options.width) * SCALE);
            imageManager.setHeight(parseFloat(options.height) * SCALE);
        }

        loader = new PxLoader();

        if (imageManager.imageType === "picture") {
            //maybe put the loader in setImage?
            //loader.addImage(imageManager.image);
        } else {
            // Create a blank image
            imageManager.setImage(new placeholderImage(), "placeholder");
        }

        function draw() {
            var tmpCan = document.createElement("canvas");
            var tmpCt = tmpCan.getContext("2d");
            tmpCan.width = imageManager.width;
            tmpCan.height = imageManager.height;
            tmpCt.drawImage(imageManager.image, 0, 0, tmpCan.width, tmpCan.height);
            var RE = recursivelyFrame(tmpCan, frames);
            canvas.width = RE.width;
            canvas.height = RE.height;
            ctx.drawImage(RE, 0, 0);
        }

        if (frames.length > 0) {
            for (var index in frames) {
                if (frames[index].src) {
                    if (preloaded.indexOf(frames[index].src == -1)) {
                        loader.addImage(frames[index].src);
                        preloaded.push(frames[index].src);
                    }
                }
            }
            // load frames into queue and render once complete
            loader.addCompletionListener(function (e) {
                draw();
            });

            loader.start();
        } else {
            // draw image on it's own
            draw();
        }
        // FOR UNIT TEST
        canvas.style.zoom = canvas.style.zoom == "100%" ? "100.0001%" : "100%";
        return 1;
    };

    var frameItem = function (item, frame) {
        var fLeft = parseFloat(frame.left) * SCALE,
            fRight = parseFloat(frame.right) * SCALE,
            fTop = parseFloat(frame.top) * SCALE,
            fBottom = parseFloat(frame.bottom) * SCALE;

        var newWidth = parseFloat(item.width) + fLeft + fRight;
        var newHeight = parseFloat(item.height) + fTop + fBottom;

        var canvas = document.createElement("canvas");
        canvas.width = newWidth;
        canvas.height = newHeight;

        var ctx = canvas.getContext("2d");

        if (typeof frame["type"] === "undefined" || frame["type"] === "matboard") {
            ctx.fillStyle = frame.color;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        } else {
            var FRAME_IMAGE = new Image();
            FRAME_IMAGE.src = frame.src;

            var tileHeight = FRAME_IMAGE.height;

            // TODO: FIX THE ISSUE FOR IOS/SAFARI WHEN SCALING
            var ctxScale = parseFloat((SCALE * frame.width / tileHeight).toFixed(2));

            var ctxScaleWidth = parseInt(canvas.width / ctxScale);
            var ctxScaleHeight = parseInt(canvas.height / ctxScale);

            ctx.fillStyle = ctx.createPattern(FRAME_IMAGE, "repeat-x");

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
            ctx.lineTo(ctxScaleHeight - FRAME_IMAGE.height, FRAME_IMAGE.height);
            ctx.lineTo(ctxScaleHeight, 0);
            ctx.lineTo(0, 0);

            ctx.closePath();
            ctx.clip();
            ctx.fill();
            ctx.rotate(-90 * PIRAD);
            ctx.translate(-ctxScaleWidth, 0);
            ctx.restore();
        }

        // Draw the item on top
        ctx.drawImage(item, fLeft, fTop);
        return canvas;
    };

    var recursivelyFrame = function (item, frames) {
        // Frames is an array
        if (frames.length == 0) {
            return item;
        }

        if (
            typeof frames[frames.length - 1]["type"] !== "undefined" &&
            frames[frames.length - 1]["type"] == "matboard"
        ) {
            item = addWhiteStroke(item);
        }

        if (frames.length == 1) {
            item = addInnerShadow(item, 0.4);
            return frameItem(item, frames[0]);
        } else {
            item = addInnerShadow(item, 0.25);
            var f = frameItem(item, frames[frames.length - 1]);
            return recursivelyFrame(f, frames.slice(0, frames.length - 1));
        }
    };

    ////// UTILITY ///////

    var measurements = function (inchWidth,
                                 inchHeight,
                                 cmWidth,
                                 cmHeight,
                                 ctx,
                                 canvas) {
        // 'Photo Frame'
        ctx.textBaseline = "bottom";
        ctx.font = 0.1 * canvas.width + "px " + "Arial";
        ctx.fillText("Photo Frame", canvas.width * 0.5, canvas.height * 0.6);

        // Inch
        ctx.textBaseline = "top";
        ctx.font = 0.175 * canvas.width + "px " + "Arial";
        ctx.fillText(
            inchWidth + inchSymbol + separator + inchHeight + inchSymbol,
            canvas.width * 0.5,
            canvas.height * 0.61
        );

        // Cm
        ctx.font = 0.075 * canvas.width + "px " + "Arial";
        ctx.fillText(
            cmWidth + cmSymbol + separator + cmHeight + cmSymbol,
            canvas.width * 0.5,
            canvas.height * 0.8
        );
    };

    var generateThumbnail = function (options) {
        var width = 250;
        var height = 250;
        if (typeof options !== "undefined") {
            width = options.width;
            height = options.height;
        }

        var scale = Math.min(width / canvas.width, height / canvas.height);

        var thumbCanvas = document.createElement("canvas");
        thumbCanvas.width = Math.floor(canvas.width * scale);
        thumbCanvas.height = Math.floor(canvas.height * scale);

        var thumbCtx = thumbCanvas.getContext("2d");
        thumbCtx.fillStyle = "#FFFFFF";
        thumbCtx.fillRect(0, 0, thumbCanvas.width, thumbCanvas.height);
        thumbCtx.scale(scale, scale);
        thumbCtx.drawImage(canvas, 0, 0);

        return thumbCanvas;
    };

    var drawMeasurementRuler = function (position, alignment, measurement) {
        //var PIRAD = Math.PI / 180;
        var styleColor = "#2b2b2b";
        var angle = 0;

        if (alignment[0] === "v") {
            angle = 90;
        } else {
            angle = 0;
        }

        var context = ctx;

        context.fillStyle = styleColor;
        context.strokeStyle = styleColor;

        context.save();

        context.scale(3, 3);
        context.translate(position.x, position.y);
        context.rotate(angle * PIRAD);

        context.font = "8px Arial";
        context.textBaseline = "middle";
        var textwidth = context.measureText(measurement).width + 5;

        // text
        context.save();
        context.beginPath();
        if (angle === 90) {
            context.scale(-1, -1);
            context.fillText(measurement, 5 - textwidth, 0);
        } else {
            context.fillText(measurement, 3, 0);
        }

        context.closePath();
        context.fill();
        context.restore();

        // Triangle
        context.save();
        context.beginPath();
        context.moveTo(textwidth + 50, -5);
        context.lineTo(textwidth + 60, 0);
        context.lineTo(textwidth + 50, 5);
        context.lineTo(textwidth + 50, -5);
        context.fill();
        context.closePath();
        context.restore();

        // line
        context.save();
        context.beginPath();
        context.lineWidth = 2;
        context.moveTo(textwidth + 50, 0);
        context.lineTo(textwidth, 0);
        context.stroke();
        context.closePath();
        context.restore();

        context.restore();
    };

    var frameCount = function () {
        return frames.length;
    };

    ///////////// RETURN ///////////
    return {
        clearFrames: clearFrames,
        addFrame: addFrame,
        removeFrame: removeFrame,
        createFrame: createFrame,
        createMat: createMat,
        setPlaceholderText: setPlaceholderText,
        draw: draw,
        init: init,
        setImage: setImage,
        rotateImage: rotateImage,
        addItem: addItem,
        thumb: generateThumbnail,
        frameCount: frameCount
    };
};

// Polyfills for people running bad browsers in 2015
if (!String.prototype.startsWith) {
    String.prototype.startsWith = function (searchString, position) {
        position = position || 0;
        return this.indexOf(searchString, position) === position;
    };
}
if (!String.prototype.endsWith) {
    String.prototype.endsWith = function (searchString, position) {
        var subjectString = this.toString();
        if (
            typeof position !== "number" ||
            !isFinite(position) ||
            Math.floor(position) !== position ||
            position > subjectString.length
        ) {
            position = subjectString.length;
        }
        position -= searchString.length;
        var lastIndex = subjectString.indexOf(searchString, position);
        return lastIndex !== -1 && lastIndex === position;
    };
}
var uploadedImg = "";
$(document).ready(function () {
    $('[name="printing-type"]').on({
        change: function () {
            $(".printing-info").hide();
            $('.printing-info[data-info-id="' + $(this).val() + '"]').show();
        }
    });
    $('[name="matt-canvas-printing-type"]').on({
        change: function () {
            $(".offtwl__matt-canvas-printing-info").hide();
            $(
                '.offtwl__matt-canvas-printing-info[data-info-id="' +
                $(this).val() +
                '"]'
            ).show();
        }
    });
    $('[name="glass-type"]').on({
        change: function () {
            $(".offtwl__glass-notes").hide();
            $('.offtwl__glass-notes[data-info-id="' + $(this).val() + '"]').show();
        }
    });
    $('[name="backing-type"]').on({
        change: function () {
            $(".backing-info").hide();
            $('.backing-info[data-info-id="' + $(this).val() + '"]').show();
        }
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover({
        trigger: "focus"
    });
});

/*Added from internal script End*/
function getContrastYIQ(e) {
    return (299 * parseInt(e.substr(0, 2), 16) +
        587 * parseInt(e.substr(2, 2), 16) +
        114 * parseInt(e.substr(4, 2), 16)) /
    1e3 >=
    128
        ? "black"
        : "white";
}

function validateDimensions() {
    var e = document.querySelector("#offtwl__dmnsn-width"),
        t = document.querySelector("#offtwl__dmnsn-height"),
        a = document.querySelector(
            "#offtwl__dimension-type-wrapper input[name=unit-type]:checked"
        ).value;
    e.value < 0 && (e.value = 1),
    t.value < 0 && (t.value = 1),
        "cm" == a
            ? (e.value, t.value)
            : (e.value > 60 && (e.value = 60), t.value > 60 && (t.value = 60));
}

function maintainRatio() {
    if ("true" == $("#offtwl__dimention-image-ratio").attr("data-locked")) {
        var e = product.printing.image.aspectRatio;
        "width" == $(this).attr("data-for")
            ? $("#offtwl__dmnsn-height").val(($(this).val() / e).toFixed(1))
            : $("#offtwl__dmnsn-width").val(($(this).val() * e).toFixed(1));
    }
}

function handleFloatFrame(e) {
    e.startsWith("108")
        ? ($('[name=offtwl__how-many-mats][value="0"]').click(),
            $("[name=glass-type][value=no-glass]").click(),
            $("[name=backing-type][value=none]").click(),
            $("[name=slip][value=none]").click(),
            $(".remove-image").click(),
            $("[name=printing-type][value=none]").click(),
            $("[name=matt-canvas-printing-type][value=matt-canvas-none]").click(),
            $(
                '#upload, [aria-controls="offtwl__mats-tab"], [aria-controls="offtwl__glass-and-backing-tab"], [aria-controls="tab-slips"], [aria-controls="offtwl__fillets-tab"], [aria-controls="offtwl__print-info-tab"]'
            ).fadeOut(150))
        : ($("[name=glass-type][value=clear-glass]").click(),
        "none" === $("[name=backing-type]:checked").val() &&
        $(
            '[name=backing-type][value="offtwl__backing-type-adhesive-foamcore"]'
        ).click(),
            $(
                '#upload, #show-more-tabs, [aria-controls="offtwl__mats-tab"], [aria-controls="offtwl__glass-and-backing-tab"], [aria-controls="offtwl__print-info-tab"]'
            ).fadeIn(150),
            $("#show-more-tabs")
                .parent()
                .fadeIn(150));
}

function setFrameData(e) {
    $("#frame-detail-code").html(e.frameCode),
        $("#frame-detail-depth").html(e.frameDepth.toFixed(1) + " cm"),
        $("#frame-detail-width").html(e.frameWidth.toFixed(1) + " cm"),
        $("#frame-detail-rebate").html(e.frameRebate.toFixed(1) + " cm"),
        $("#frame-detail-colour").html(e.frameDesc),
        $("#frame-detail-material").html(e.frameMaterial);
    var t = $("#frame-detail-description");
    e.frameDescription
        ? (t.html(e.frameDescription), t.parent().show())
        : t.parent().hide();
}

function assessQuality() {
    var e = image_width / 300;
    if ("cm" == $("span.offtwl__dmnsn-inch-cm").html()) {
        var t = Math.min(e / ($("#offtwl__dmnsn-width").val() / 2.54) * 100, 100);
    } else {
        var t = Math.min(e / $("#offtwl__dmnsn-width").val() * 100, 100);
    }
    t <= 0
        ? ($("#offtwl__upload-quality-progress").css("width", "100%"),
            $("#offtwl__upload-quality-progress").removeClass(
                "progress-bar-danger progress-bar-good progress-bar-excellent progress-bar-warning"
            ),
            $("#offtwl__upload-quality-progress").addClass("progress-bar-info"),
            $("#offtwl__upload-quality-text").html("No Image Detected"))
        : t > 0 && t <= 25
        ? ($("#offtwl__upload-quality-progress").css("width", t + "%"),
            $("#offtwl__upload-quality-progress").removeClass(
                "progress-bar-good progress-bar-excellent progress-bar-warning progress-bar-info"
            ),
            $("#offtwl__upload-quality-progress").addClass("progress-bar-danger"),
            $("#offtwl__upload-quality-text").html("Poor"))
        : t > 25 && t <= 40
            ? ($("#offtwl__upload-quality-progress").css("width", t + "%"),
                $("#offtwl__upload-quality-progress").removeClass(
                    "progress-bar-good progress-bar-excellent progress-bar-danger progress-bar-info"
                ),
                $("#offtwl__upload-quality-progress").addClass(
                    "progress-bar-warning"
                ),
                $("#offtwl__upload-quality-text").html("Not Bad"))
            : t > 40 && t < 70
                ? ($("#offtwl__upload-quality-progress").css("width", t + "%"),
                    $("#offtwl__upload-quality-progress").removeClass(
                        "progress-bar-warning progress-bar-danger progress-bar-excellent progress-bar-info"
                    ),
                    $("#offtwl__upload-quality-progress").addClass("progress-bar-good"),
                    $("#offtwl__upload-quality-text").html("Good"))
                : t > 70 && t < 90
                    ? ($("#offtwl__upload-quality-progress").css("width", t + "%"),
                        $("#offtwl__upload-quality-progress").removeClass(
                            "progress-bar-warning progress-bar-danger progress-bar-excellent progress-bar-info"
                        ),
                        $("#offtwl__upload-quality-progress").addClass(
                            "progress-bar-good"
                        ),
                        $("#offtwl__upload-quality-text").html("Great"))
                    : ($("#offtwl__upload-quality-progress").css("width", t + "%"),
                        $("#offtwl__upload-quality-progress").removeClass(
                            "progress-bar-danger progress-bar-warning progress-bar-good progress-bar-info"
                        ),
                        $("#offtwl__upload-quality-progress").addClass(
                            "progress-bar-excellent"
                        ),
                        $("#offtwl__upload-quality-text").html("Excellent"));
}

function disableMDF(e) {
    var t = $("#no-mdf-info");
    e === !0
        ? ($(
        "[name=backing-type][value=offtwl__backing-type-adhesive-foamcore]"
        ).click(),
            $("[name=backing-type][value=offtwl__backing-type-mdf]")
                .prop("disabled", !0)
                .addClass("disabled")
                .parent()
                .addClass("disabled")
                .find(".offtwl__outer-el")
                .addClass("disabled"),
            t.show())
        : ($("[name=backing-type][value=offtwl__backing-type-mdf]")
            .prop("disabled", !1)
            .removeClass("disabled")
            .parent()
            .removeClass("disabled")
            .find(".offtwl__outer-el")
            .removeClass("disabled"),
            t.hide());
}

function togglePrinting(e) {
    1 == e
        ? ($("[name=printing-type]")
            .prop("disabled", !1)
            .addClass("disabled")
            .parent()
            .removeClass("disabled")
            .find(".offtwl__outer-el")
            .removeClass("disabled"),
            disableMDF(!0))
        : ($("[data-paper-type=none]").click(),
            $("[name=printing-type]")
                .prop("disabled", !0)
                .addClass("disabled")
                .parent()
                .addClass("disabled")
                .find(".offtwl__outer-el")
                .addClass("disabled"),
            disableMDF(),
            $(".offtwl__image-description").fadeOut(150),
            $(".offtwl__upload-img-quality-holder").fadeOut(150),
            $("#upload-info-alert").fadeIn(150),
            (product.printing = {
                paper: "none",
                image: {
                    url: "",
                    originalWidth: 0,
                    originalHeight: 0,
                    aspectRatio: 0,
                    name: ""
                },
                price: 0
            }),
            fc.setImage(),
            $("#offtwl__dimention-image-ratio").attr("data-locked", !1),
            fc.draw());
}

function changePanelIcon() {
    var e = $(this).find(".toggle-icon");
    e.hasClass("fa-plus")
        ? e.removeClass("fa-plus").addClass("fa-minus")
        : e.removeClass("fa-minus").addClass("fa-plus");
}

function keepWithinBounds() {
    var e = document.querySelector("[name=offtwl__typeof-matboard-wdt]:checked")
            .value,
        t = parseFloat(this.min),
        a = parseFloat(this.max),
        i = parseFloat(this.value),
        r = i;
    if (
        (i < t ? (r = t) : i > a && (r = a),
        r != i && ((this.value = r), "offtwl__unifrm" === e))
    ) {
        for (
            var o = document
                    .getElementById("offtwl__fldst-var")
                    .querySelectorAll("input[type=number]"),
                n = 0;
            n < o.length;
            n++
        ) {
            o[n].value = r;
        }
    }
    prodMan.calc();
}

var image_width = 0,
    image_height = 0;
$("#show-more-tabs").on("click tap", function (e) {
    e.preventDefault(),
        $("#show-more-tabs")
            .parent()
            .fadeOut(50),
        $(".hidden-tabs").fadeIn(150),
        $("#ui-id-6").click(),
        $(".offtwl__cardbox-tab-list a").css({
            padding: "5px 5px",
            "font-size": "1.3rem"
        });
}),
    $("[id^=frame-tab]").each(function () {
        var e = "#" + $(this).attr("id") + " img.lazy";
        $(e).lazyload({
            effect: "fadeIn",
            threshold: 20,
            container: $("#" + $(this).attr("id"))
        });
    });
var product = {
    imageWidth: 10.16,
    imageHeight: 15.24,
    printing: {
        paper: "none",
        image: {
            file: "",
            originalWidth: 0,
            originalHeight: 0,
            aspectRatio: 0,
            name: ""
        },
        price: 0
    },
    innerWidth: 0,
    innerHeight: 0,
    outerWidth: 0,
    outerHeight: 0,
    frame: {
        frameCode: "224F111",
        frameDepth: 2,
        frameDesc: "Black",
        frameId: 238,
        frameMaterial: "Wood",
        frameMax: 120,
        frameMin: 10,
        frameRate: 2,
        frameRebate: 0.5,
        frameTile: "top_frame_238.jpg",
        frameWidth: 2
    },
    slip: {
        frame: {
            frameId: ""
        },
        price: 0
    },
    fillet: {
        frame: {
            frameId: ""
        },
        price: 0
    },
    glass: void 0,
    backing: void 0,
    matboards: {
        mat1: {
            id: "",
            colorCode: "",
            top: "",
            left: "",
            right: "",
            bottom: "",
            matCode: "",
            matName: "",
            price: 0
        },
        mat2: {
            id: "",
            colorCode: "",
            top: "",
            left: "",
            right: "",
            bottom: "",
            matCode: "",
            matName: "",
            price: 0
        }
    },
    price: 0,
    discountedPrice: 0,
    newDiscountedPrice: 0,
    framePrice: 0,
    glassPrice: 0,
    backingPrice: 0,
    quantity: 0,
    productType: "custom-frame"
};
setFrameData(product.frame),
    $("#order-step-tabs").tabs();
var selectFrameContainer = $('.offtwl__select-frame-container');
selectFrameContainer.mCustomScrollbar({
    axis: "x",
    theme: "dark-3",
    advanced: {
        autoExpandHorizontalScroll: true
    },
    mouseWheel: {
        scrollAmount: 150
    }
});

function tabdropdownSelect() {
    $("#select-frame-dropdown").on("change", function (e) {
        $("#offtwl__frame-ctgry-tab-list li a[href='#" + this.value + "']").tab("show");
    });
}

tabdropdownSelect();

var ProductManager = function () {
        var discountedValRow = $("#offtwl__glance-discount-row-value"),
            disPercent = $("#offtwl__glance-discount-row-percent"),
            disPercentVal = parseInt(disPercent.data("discount-percentage")),
            disPercentDecimalVal = disPercentVal / 100;

        function discountCalculator(total_price, discount_percent) {
            var tprice = total_price,
                discountprice = (tprice * disPercentDecimalVal).toFixed(4),
                newDiscountedPrice = tprice - discountprice;
            if (typeof newDiscountedPrice === "number") {
                disPercent.html(disPercentVal + "%");
                discountedValRow.html(discountprice);
            }
            product.newDiscountedPrice = newDiscountedPrice;
            product.discountedPrice = discountprice;
            return newDiscountedPrice;
        }

        var e,
            t = !1,
            a = [],
            r = $("#offtwl__dmnsn-width"),
            o = $("#offtwl__dmnsn-height"),
            n = !1,
            s = !1,
            d = !0,
            l = !1,
            c = !1,
            m = !1,
            u = !1,
            p = !1,
            f = function () {
                if (t) {
                    return !0;
                }
                $.ajax({
                    type: "GET",
                    url: "static/json/price-list.json",
                    success: function (a) {
                        (e = a), (t = !0), H();
                    },
                    error: function (e, t, a) {
                        console.log("ajax error response type " + t);
                    }
                });
            },
            h = function (e, t) {
                fc.setImage(e, "picture", function () {
                    $("#preset-type-list")
                        .addClass("disabled")
                        .prop("disabled", !0),
                        $("#offtwl__dmnsn-width").val((0.015 * e.width).toFixed(2)),
                        $("#offtwl__dmnsn-height").val((0.015 * e.height).toFixed(2)),
                    t && "function" == typeof t && t(),
                        H();
                });
            },
            g = function () {
                if (
                    ((product.printing.paper = $("[name=printing-type]:checked").val()),
                        (product.glass = $("[name=glass-type]:checked").val()),
                        (product.backing = $("[name=backing-type]:checked").val()),
                        (l = $('[name="slip"][value="add"]').prop("checked")))
                ) {
                    var e = product.slip.frame.frameCode;
                    "" == product.slip.frame.frameId &&
                    "" != e &&
                    (product.slip.frame.frameId = $("[data-frame-code=" + e + "]").data(
                        "frameId"
                    ));
                } else {
                    product.slip.frame.frameId = "";
                }
                if ((c = $('[name="fillet"][value="add"]').prop("checked"))) {
                    var t = product.fillet.frame.frameCode;
                    "" == product.fillet.frame.frameId &&
                    "" != t &&
                    (product.fillet.frame.frameId = $(
                        "[data-frame-code=" + t + "]"
                    ).data("frameId"));
                } else {
                    product.fillet.frame.frameId = "";
                }
                p = "none" != product.printing.paper;
            },
            b = function () {
                var e = product,
                    t = "inch" == currentUnits;
                (e.imageWidth = parseFloat(r.val())),
                    (e.imageHeight = parseFloat(o.val())),
                t && ((e.imageWidth *= 2.54), (e.imageHeight *= 2.54)),
                    (e.imageWidth = parseFloat(e.imageWidth).toFixed(2)),
                    (e.imageHeight = parseFloat(e.imageHeight).toFixed(2)),
                    (e.innerWidth = parseFloat(e.imageWidth)),
                    (e.innerHeight = parseFloat(e.imageHeight));
                for (var a in e.matboards) {
                    (e.innerWidth += parseFloat(e.matboards[a].left) || 0),
                        (e.innerWidth += parseFloat(e.matboards[a].right) || 0),
                        (e.innerHeight += parseFloat(e.matboards[a].top) || 0),
                        (e.innerHeight += parseFloat(e.matboards[a].bottom) || 0);
                }
                c &&
                ((e.innerWidth += 2 * e.fillet.frame.frameWidth),
                    (e.innerHeight += 2 * e.fillet.frame.frameWidth)),
                    (e.innerWidth = parseFloat(e.innerWidth).toFixed(2)),
                    (e.innerHeight = parseFloat(e.innerHeight).toFixed(2)),
                    (e.outerWidth = (
                        parseFloat(e.innerWidth) +
                        2 * parseFloat(e.frame.frameWidth) -
                        2 * parseFloat(e.frame.frameRebate)
                    ).toFixed(2)),
                    (e.outerHeight = (
                        parseFloat(e.innerHeight) +
                        2 * parseFloat(e.frame.frameWidth) -
                        2 * parseFloat(e.frame.frameRebate)
                    ).toFixed(2));
                var i = e.innerWidth >= 10 && e.innerHeight >= 10,
                    l = e.innerWidth <= 152.5 && e.innerHeight <= 152.5,
                    m =
                        (e.innerWidth <= 152.5 && e.innerHeight <= 101.6) ||
                        (e.innerWidth <= 101.6 && e.innerHeight <= 152.5);
                (d = Math.max(e.innerWidth, e.innerHeight) <= e.frame.frameMax),
                    $("#max-frame-length-error").html(e.frame.frameMax),
                    (n =
                        i &&
                        e.imageWidth <= 152.5 &&
                        e.imageHeight <= 152.5 &&
                        ((e.imageWidth <= 152.5 && e.imageHeight <= 101.6) ||
                            (e.imageWidth <= 101.6 && e.imageHeight <= 152.5))),
                    (s = i && m && l),
                    _.debounce(function () {
                        n && !s
                            ? $(
                            "#offtwl__mat1-dimnsn-not-valid, #mat2-dimensions-invalid"
                            ).show(250)
                            : n &&
                            $(
                                "#offtwl__mat1-dimnsn-not-valid, #mat2-dimensions-invalid"
                            ).hide(250),
                            s
                                ? $("#offtwl__dmnsn-warning").fadeOut(150)
                                : $("#offtwl__dmnsn-warning").fadeIn(150),
                            !d && s
                                ? $("#larger-than-max-error").show(250)
                                : $("#larger-than-max-error").hide(250);
                    }, 500)();
            },
            v = function () {
                if (!t) {
                    return !1;
                }
                var a = void 0,
                    r = void 0,
                    o = void 0,
                    n = !1,
                    f = !1,
                    h = parseFloat(product.imageWidth) + parseFloat(product.imageHeight),
                    g = parseFloat(product.innerWidth) + parseFloat(product.innerHeight),
                    b = g + 4 * (l ? parseFloat(product.slip.frame.frameWidth) : 0);
                product.quantity = parseFloat(
                    $("#offtwl__product-quantity").val() || 1
                );
                for (var v in e) {
                    if (
                        (!n && v >= h && ((o = e[v]), (n = !0)),
                        !f && v >= g && ((r = e[v]), (f = !0)),
                        v >= b)
                    ) {
                        a = e[v];
                        break;
                    }
                }
                if (a) {
                    if (s && d) {
                        $("#offtwl__addToCartButton").prop("disabled", !1);
                        console.log(a.rate[product.frame.frameRate]);
                        console.log(product.frame.frameRate);
                        console.log(a.rate);
                        console.log(a);
                        console.log(a.UCM);
                        var y = (product.framePrice = parseFloat(
                            a.rate[product.frame.frameRate]
                            )),
                            k = (product.matboards.mat1.price = "" != m ? r.top_mat : 0),
                            w = (product.matboards.mat2.price = "" != u ? r.middle_mat : 0),
                            C = (product.fillet.price = c
                                ? o.rate[product.fillet.frame.frameRate]
                                : 0),
                            x = (product.slip.price = l
                                ? r.rate[product.slip.frame.frameRate]
                                : 0),
                            F = (product.glassPrice = parseFloat(r[product.glass]) || 0),
                            I = (product.backingPrice = parseFloat(r[product.backing]) || 0),
                            W = (product.printing.price = p
                                ? parseFloat(o[product.printing.paper])
                                : 0),
                            q = y + k + w + C + x + F + I + W,
                            H = (q * product.quantity).toFixed(2);
                        (product.price = H),
                            $("[data-price-subscriber]").each(function () {
                                var discount_price = discountCalculator(H);
                                // product.newDiscountedPrice = discount_price;
                                console.log(product);
                                console.log('dprice');
                                console.log(discount_price);
                                $(this).html("$" + discount_price);
                            });
                    } else {
                        $("[data-price-subscriber]").each(function () {
                            $(this).html("N/A");
                        }),
                            $("#offtwl__addToCartButton").prop("disabled", !0);
                    }
                }
            },
            y = function () {
                var e = {
                    width: product.frame.frameWidth,
                    src: "./images/frame_images/large/" + product.frame.frameTile
                };
                (self.isFloat = product.frame.frameCode.startsWith("108")),
                    fc.addFrame(e);
            },
            k = function () {
                var e = {
                    width: product.slip.frame.frameWidth,
                    src: "./images/frame_images/large/" + product.slip.frame.frameTile
                };
                fc.addFrame(e);
            },
            w = function () {
                var e = {
                    width: product.fillet.frame.frameWidth,
                    src: "./images/frame_images/large/" + product.fillet.frame.frameTile
                };
                fc.addFrame(e);
            },
            C = function () {
                var e,
                    t,
                    a,
                    i,
                    r = product.matboards,
                    o = parseInt(
                        document.querySelector("[name=offtwl__how-many-mats]:checked").value
                    ),
                    n = document.querySelector(
                        "[name=offtwl__typeof-matboard-wdt]:checked"
                    ).value;
                if (((m = !1), (u = !1), o > 0)) {
                    if (((m = !0), "offtwl__unifrm" == n)) {
                        e = t = a = i = document.getElementById("offtwl__unifrm-width")
                            .value;
                    } else {
                        "variable" == n &&
                        ((e = document.getElementById("offtwl__dimnsn-top").value),
                            (a = document.getElementById("offtwl__dimnsn-bottom").value),
                            (t = document.getElementById("offtwl__dimnsn-left").value),
                            (i = document.getElementById("offtwl__dimnsn-right").value));
                    }
                    "inch" == currentUnits &&
                    ((e *= 2.54), (a *= 2.54), (t *= 2.54), (i *= 2.54)),
                        (r.mat1.top = e),
                        (r.mat1.bottom = a),
                        (r.mat1.left = t),
                        (r.mat1.right = i),
                        fc.createMat(e, i, a, t, "#" + r.mat1.colorCode),
                    o > 1 &&
                    ((u = !0),
                        (e = t = a = i = document.getElementById("offtwl__matboard-2-wdt")
                            .value),
                    "inch" == currentUnits &&
                    ((e *= 2.54), (a *= 2.54), (t *= 2.54), (i *= 2.54)),
                        (r.mat2.top = e),
                        (r.mat2.bottom = a),
                        (r.mat2.left = t),
                        (r.mat2.right = i),
                        fc.createMat(e, i, a, t, "#" + r.mat2.colorCode));
                }
                for (var s = Object.keys(r), d = o; d < s.length; d++) {
                    r[s[d]] = {
                        id: "",
                        colorCode: r[s[d]].colorCode,
                        top: "",
                        left: "",
                        right: "",
                        bottom: "",
                        matCode: "",
                        matName: "",
                        price: 0
                    };
                }
            },
            x = function () {
                validateDimensions(),
                    fc.draw({
                        width: product.imageWidth,
                        height: product.imageHeight
                    });
            },
            F = function () {
                var e = parseFloat(
                    parseFloat($("#offtwl__dmnsn-width").val()).toFixed(2)
                    ),
                    t = parseFloat(
                        parseFloat($("#offtwl__dmnsn-height").val()).toFixed(2)
                    ),
                    a = 0.12,
                    i = 0.6;
                (e >= 40 || t >= 40) && ((i = 1), (a = 0.39));
                var r = "cm" === currentUnits ? i : a,
                    o = parseFloat(parseFloat(e - r).toFixed(2)),
                    n = parseFloat(parseFloat(t - r).toFixed(2)),
                    s = [
                        "Image Size:",
                        e,
                        "x",
                        t,
                        currentUnits,
                        "\n",
                        "Visible (approx):",
                        o,
                        "x",
                        n,
                        currentUnits,
                        "\n",
                        "Outer Size (approx):",
                        product.outerWidth,
                        "x",
                        product.outerHeight,
                        "cm"
                    ].join(" ");
                fc.setPlaceholderText(s);
            },
            I = function () {
                l
                    ? $("#offtwl__glance-slip-row").fadeIn(100)
                    : $("#offtwl__glance-slip-row").fadeOut(100),
                    c
                        ? $("#offtwl__glance-fillet-row").fadeIn(100)
                        : $("#offtwl__glance-fillet-row").fadeOut(100),
                    m
                        ? $("#offtwl__glance-mat-top-row").fadeIn(100)
                        : $("#offtwl__glance-mat-top-row").fadeOut(100),
                    u
                        ? $("#offtwl__glance-mat-bottom-row").fadeIn(100)
                        : $("#offtwl__glance-mat-bottom-row").fadeOut(100),
                    p
                        ? $("#offtwl__glance-printing-row").fadeIn(100)
                        : $("#offtwl__glance-printing-row").fadeOut(100);
                var e = new RegExp("-", "g");
                $("#offtwl__glance-frame").html(product.frame.frameCode),
                    $("#offtwl__glance-slip").html(product.slip.frame.frameCode),
                    $("#offtwl__glance-fillet").html(product.fillet.frame.frameCode),
                    $("#offtwl__glance-mat-top").html(product.matboards.mat1.matName),
                    $("#offtwl__glance-mat-bottom").html(product.matboards.mat2.matName),
                    $("#offtwl__glance-glass").html(
                        product.glass.replace(e, " ").replace("glass", "")
                    ),
                    $("#offtwl__glance-backing").html(
                        product.backing.replace(e, " ").replace("glass", "")
                    ),
                    $("#offtwl__glance-image-size").html(
                        product.imageWidth + " x " + product.imageHeight + " cm"
                    ),
                    $("#offtwl__glance-glass-size").html(
                        product.innerWidth + " x " + product.innerHeight + " cm"
                    ),
                    $("#offtwl__glance-outer-size").html(
                        product.outerWidth + " x " + product.outerHeight + " cm"
                    ),
                    $("#summary-printing").html(product.printing.paper),
                    $("#offtwl__glance-frame-price").html(
                        "$ " + product.framePrice.toFixed(2)
                    ),
                    $("#offtwl__glance-slip-price").html(
                        "$ " + product.slip.price.toFixed(2)
                    ),
                    $("#offtwl__glance-fillet-price").html(
                        "$ " + product.fillet.price.toFixed(2)
                    ),
                    $("#offtwl__glance-mat-top-price").html(
                        "$ " + product.matboards.mat1.price.toFixed(2)
                    ),
                    $("#offtwl__glance-mat-bottom-price").html(
                        "$ " + product.matboards.mat2.price.toFixed(2)
                    ),
                    $("#offtwl__glance-glass-price").html(
                        "$ " + product.glassPrice.toFixed(2)
                    ),
                    $("#offtwl__glance-backing-price").html(
                        "$ " + product.backingPrice.toFixed(2)
                    ),
                    $("#summary-printing-price").html(
                        "$ " + product.printing.price.toFixed(2)
                    ),
                    $("#error-current-selection-size").html(
                        $("#offtwl__glance-glass-size").html()
                    );
            },
            W = function (e, t) {
                var a = [];
                $('[id^="frame-tab"] [data-frame-code]').each(function () {
                    a.push(this);
                });
                var i = _.filter(a, e, t);
                return _.sortBy(i, function (e) {
                    return e.dataset.frameWidth;
                });
            },
            q = function (e, t) {
                var a = function (t) {
                        return t.dataset.frameMax < e;
                    },
                    i = W(a);
                $(".unstable-frame").removeClass("unstable-frame"),
                    $(".unstable-frame-hidden").removeClass("unstable-frame-hidden"),
                    t === !0
                        ? $(i)
                            .addClass("unstable-frame")
                            .addClass("unstable-frame-hidden")
                        : $(i).addClass("unstable-frame");
            },
            H = function () {
                fc.clearFrames(),
                    g(),
                    y(),
                l && k(),
                    C(),
                c && w(),
                    b(),
                    q(
                        Math.max(product.imageWidth, product.imageHeight),
                        $("#hide-unstable-frames").prop("checked")
                    ),
                    F(),
                    x(),
                    v(),
                    I();
            },
            M = _.debounce(H, 100, {
                leading: !0
            }),
            S = function (e) {
                $(e).on("change input click", M), a.push($(e));
            },
            T = function () {
                return e;
            };
        return (
            $(document).ready(function () {
                togglePrinting(1),
                    $(".remove-image").on("click", function () {
                        togglePrinting(1),
                            $("#preset-type-list")
                                .removeClass("disabled")
                                .prop("disabled", !1),
                            $("#offtwl__upload-quality-progress").css("width", "100%"),
                            $("#offtwl__upload-quality-progress").removeClass(
                                "progress-bar-excellent progress-bar-good progress-bar-warning progress-bar-danger"
                            ),
                            $("#offtwl__upload-quality-progress").addClass(
                                "progress-bar-info"
                            ),
                            $("#offtwl__upload-quality-text").html("No Image Detected"),
                            (image_width = 0),
                            (image_height = 0);
                    }),
                    $("[data-offtwl__calculation-item]").each(function (e, t) {
                        a.push(t),
                            $(t)
                                .on("change", M)
                                .on("input", M)
                                .on("click", function () {
                                    "SPAN" === $(this).prop("tagName") && M();
                                });
                    });
            }),
                {
                    init: f,
                    addBroadcaster: S,
                    setImage: h,
                    prices: T,
                    filter: W,
                    calc: M
                }
        );
    },
    prodMan = new ProductManager();
prodMan.init(),
    $("[name=fillet][value=add]")
        .parent()
        .on("click", function () {
            1 ==
            $(this)
                .children(":first")
                .prop("disabled") && $("#fillet-no-mat-warning").fadeIn();
        }),
    $("[name=fillet]").on("change", function (e) {
        "add" == $("[name=fillet]:checked").val() &&
        (0 == parseInt($("[name=offtwl__how-many-mats]:checked").val())
            ? ($("#fillet-no-mat-warning").fadeIn(),
                $('[name=fillet][value="none"]').click())
            : $("#fillet-no-mat-warning").fadeOut(),
        "" === product.fillet.frame.frameId &&
        $(".offtwl__thumb-frame-container.fillet-frame")
            .first()
            .click());
    });
var matColor = "",
    matboards = product.matboards;
document
    .getElementById("offtwl__unifrm-width")
    .addEventListener("input", function () {
        for (
            var e = document.querySelectorAll("#variable-width input[type=number]"),
                t = 0;
            t < e.length;
            t++
        ) {
            e[t].value = this.value;
        }
    });
for (
    var outerWidthTypes = document.querySelectorAll(
        "[name=offtwl__typeof-matboard-wdt]"
        ),
        i = 0;
    i < outerWidthTypes.length;
    i++
) {
    outerWidthTypes[i].addEventListener("change", function () {
        switch (document.querySelector(
            "[name=offtwl__typeof-matboard-wdt]:checked"
        ).value) {
            case "offtwl__unifrm":
                (document.getElementById("offtwl__unifrm-width").disabled = !1),
                    (document.getElementById("variable-width").disabled = !0);
                break;
            case "variable":
                (document.getElementById("offtwl__unifrm-width").disabled = !0),
                    (document.getElementById("variable-width").disabled = !1);
        }
    });
}
for (
    var colorTiles = document.querySelectorAll(".offtwl__matboard-sqr"), c = 0;
    c < colorTiles.length;
    c++
) {
    (colorTiles[c].style.color = getContrastYIQ(colorTiles[c].dataset.colorCode)),
        colorTiles[c].addEventListener("click", function (e) {
            (matboards[this.dataset.offtwl__matObj].id = this.dataset.matId),
                (matboards[
                    this.dataset.offtwl__matObj
                    ].colorCode = this.dataset.colorCode),
                (matboards[this.dataset.offtwl__matObj].matCode = this.dataset.code),
                (matboards[this.dataset.offtwl__matObj].matName = this.dataset.name),
                (matColor = this.dataset.colorCode);
            var t = document.querySelector(
                '[data-slider-value="' +
                this.dataset.sliderValue +
                '"][data-selected="true"]'
            );
            t && ((t.dataset.selected = !1), (t.innerHTML = "")),
                (this.dataset.selected = !0),
                (this.innerHTML =
                    '<span class="glyphicon glyphicon-ok offtwl__selected-icon"></span>');
            var a = document.querySelector("[name=offtwl__how-many-mats]:checked");
            parseInt(a.value) < 1 &&
            document
                .querySelector('[name="offtwl__how-many-mats"][value="1"]')
                .click();
        }),
        prodMan.addBroadcaster(colorTiles[c]);
}
$("[name=offtwl__how-many-mats]").on("change", function (e) {
    switch (parseInt($("[name=offtwl__how-many-mats]:checked").val())) {
        case 0:
            $("#offtwl__field-matboard-1").prop("disabled", !0),
                $("#fieldset-matboard-2").fadeOut(),
                $('[name=fillet][value="none"]').click(),
                $('[name=fillet][value="add"]').prop("disabled", !0),
                $("#fillet-no-mat-warning").fadeIn(),
                $(".offtwl__matboard-sqr[data-selected=true]")
                    .html("")
                    .attr("data-selected", !1);
            break;
        case 1:
            $("#offtwl__field-matboard-1").prop("disabled", !1),
                $("#fieldset-matboard-2").fadeOut(),
                $("#fillet-no-mat-warning").fadeOut(),
                $('[name=fillet][value="add"]').prop("disabled", !1),
            "" == matboards.mat1.id &&
            ("" != matboards.mat1.colorCode
                ? $(
                    ".offtwl__matboard-sqr[data-offtwl__mat-obj=mat1][data-color-code=" +
                    matboards.mat1.colorCode +
                    "]"
                ).click()
                : $(".offtwl__matboard-sqr[data-offtwl__mat-obj=mat1]")
                    .first()
                    .click());
            break;
        case 2:
            $("#offtwl__field-matboard-1").prop("disabled", !1),
                $("#fieldset-matboard-2").fadeIn(),
                $("#fillet-no-mat-warning").fadeOut(),
                $('[name=fillet][value="add"]').prop("disabled", !1),
            "" == matboards.mat1.id &&
            ("" != matboards.mat1.colorCode
                ? $(
                    ".offtwl__matboard-sqr[data-offtwl__mat-obj=mat1][data-color-code=" +
                    matboards.mat1.colorCode +
                    "]"
                ).click()
                : $(".offtwl__matboard-sqr[data-offtwl__mat-obj=mat1]")
                    .first()
                    .click()),
            "" == matboards.mat2.id &&
            ("" != matboards.mat2.colorCode
                ? $(
                    ".offtwl__matboard-sqr[data-offtwl__mat-obj=mat2][data-color-code=" +
                    matboards.mat2.colorCode +
                    "]"
                ).click()
                : $(".offtwl__matboard-sqr[data-offtwl__mat-obj=mat2]")
                    .first()
                    .click());
    }
});
var fc = new CustomFramer(),
    width = 10.1,
    height = 15.2;
$("#offtwl__dimension-type-wrapper input[name=unit-type]:first ~ span").click();
for (
    var currentUnits = document.querySelector(
        "#offtwl__dimension-type-wrapper input[name=unit-type]:checked"
        ).value,
        UnitConverter = function () {
            var e = [];
            return {
                subscribe: function (t) {
                    e.push(t);
                },
                unsubscribe: function (t) {
                    for (; e.indexOf(val) != -1;) {
                        e.splice(i, 1);
                    }
                },
                convertUnits: function () {
                    for (
                        var t = "cm" == currentUnits ? "inch" : "cm", a = 0;
                        a < e.length;
                        a++
                    ) {
                        switch (currentUnits) {
                            case "inch":
                                if ("offtwl__dmnsn-unit-label" == e[a].dataset.type) {
                                    e[a].innerHTML = "cm";
                                    break;
                                }
                                if ("offtwl__dmnsn-unit-value" == e[a].dataset.type) {
                                    e[a].innerHTML = e[a].dataset.cmValue;
                                    break;
                                }
                                if ("standard-conversion" == e[a].dataset.type) {
                                    e[a].innerHTML = (2.54 * parseFloat(e[a].innerHTML)).toFixed(
                                        1
                                    );
                                    break;
                                }
                                (width = (2.54 * parseFloat(width)).toFixed(1)),
                                    (height = (2.54 * parseFloat(height)).toFixed(1)),
                                    (e[a].value = (2.54 * e[a].value).toFixed(1)),
                                    e[a].setAttribute("min", e[a].dataset.cmMin),
                                    e[a].setAttribute("max", e[a].dataset.cmMax),
                                    e[a].setAttribute("step", e[a].dataset.cmStep);
                                break;
                            case "cm":
                                if ("offtwl__dmnsn-unit-label" == e[a].dataset.type) {
                                    e[a].innerHTML = "inch";
                                    break;
                                }
                                if ("offtwl__dmnsn-unit-value" == e[a].dataset.type) {
                                    e[a].innerHTML = e[a].dataset.inchValue;
                                } else if ("standard-conversion" == e[a].dataset.type) {
                                    e[a].innerHTML = (parseFloat(e[a].innerHTML) / 2.54).toFixed(
                                        1
                                    );
                                    break;
                                }
                                (width = (parseFloat(width) / 2.54).toFixed(1)),
                                    (height = (parseFloat(height) / 2.54).toFixed(1)),
                                    (e[a].value = (e[a].value / 2.54).toFixed(1)),
                                    e[a].setAttribute("min", e[a].dataset.inchMin),
                                    e[a].setAttribute("max", e[a].dataset.inchMax),
                                    e[a].setAttribute("step", e[a].dataset.inchStep);
                        }
                    }
                    currentUnits = t;
                }
            };
        },
        unitConverter = new UnitConverter(),
        unitElements = document.querySelectorAll(".offtwl__dmnsn-inch-cm"),
        i = 0;
    i < unitElements.length;
    i++
) {
    unitConverter.subscribe(unitElements[i]);
}
for (
    var unitRadioButtons = document.querySelectorAll(
        "#offtwl__dimension-type-wrapper input[type=radio]"
        ),
        i = 0;
    i < unitRadioButtons.length;
    i++
) {
    unitRadioButtons[i].addEventListener("change", function () {
        unitConverter.convertUnits();
    });
}
$("#offtwl__dmnsn-width, #offtwl__dmnsn-height").on(
    "input change",
    maintainRatio
),
    fc.init("canvas"),
    $(".offtwl__select-frame-container").mousewheel(function (e, t) {
        (this.scrollLeft -= 45 * t), e.preventDefault();
    }),
    $(".offtwl__thumb-frame-container").each(function () {
        $(this).hasClass("slip-frame")
            ? $(this).on("click", function () {
                $(".slip-thumb-selected").removeClass("slip-thumb-selected"),
                    $(this).addClass("slip-thumb-selected"),
                    (product.slip.frame = $.extend(!0, {}, $(this).data())),
                $('[name="slip"]').prop("checked") ||
                $('[name="slip"][value="add"]').click();
            })
            : $(this).hasClass("fillet-frame")
            ? $(this).on("click", function () {
                $(".fillet-thumb-selected").removeClass("fillet-thumb-selected"),
                    $(this).addClass("fillet-thumb-selected"),
                    (product.fillet.frame = $.extend(!0, {}, $(this).data())),
                $('[name="fillet"]').prop("checked") ||
                $('[name="fillet"][value="add"]').click();
            })
            : $(this).on("click", function () {
                $(".frame-thumb-selected").removeClass("frame-thumb-selected"),
                    $(this).addClass("frame-thumb-selected"),
                    (product.frame = $.extend(!0, {}, $(this).data())),
                    handleFloatFrame(product.frame.frameCode),
                    setFrameData($(this).data()),
                    $("#thumb-selected").removeAttr("id"),
                    $(this).attr("id", "thumb-selected");
            }),
            prodMan.addBroadcaster($(this));
    });
for (
    var buttons = document.querySelectorAll("[name=unit-type]"), i = 0;
    i < buttons.length;
    i++
) {
    buttons[i].addEventListener("click", function (e) {
        var t = document.querySelectorAll(".offtwl__data-inch"),
            a = document.querySelectorAll(".offtwl__data-cm");
        if ("cm" == this.value) {
            for (var i = 0; i < t.length; i++) {
                a[i].classList.remove("hidden-xs"),
                    a[i].classList.remove("hidden-sm"),
                    t[i].classList.add("hidden-xs"),
                    t[i].classList.add("hidden-sm");
            }
        } else {
            for (var i = 0; i < t.length; i++) {
                a[i].classList.add("hidden-xs"),
                    a[i].classList.add("hidden-sm"),
                    t[i].classList.remove("hidden-xs"),
                    t[i].classList.remove("hidden-sm");
            }
        }
    });
}
/*Mycart*/
var CartAnnouncements = function () {
    var t = 0,
        i = 0,
        n = [],
        c = [],
        e = function () {
            var t = document.createElement("DIV");
            return t.id = "cart-notification", t.style.opacity = 1, t.style.position = "fixed", t.style.right = "30px", t.style.top = "90px", t.style.zIndex = 1e3, t.innerHTML = '<div id="offtwl__popup-notification" class="row">                          <div class="offtwl__popup-notification-element offtwl__icon col-xs-5">                          <img src="/static/images/shopping-cart-white.png">                            </div>                            <div class="offtwl__popup-notification-element offtwl__message col-xs-7">                                    Item successfully added to cart!                            </div>                            </div>', $(t).on("click", function () {
            }), t
        },
        o = function () {
            var t = new e;
            $("body").append($(t)), $(t).fadeIn(150).delay(1e3).fadeOut(250)
        },
        a = function (i) {
            i && (t = i), $(c).each(function () {
                $(this).html(t)
            })
        },
        s = function (t) {
            t && (i = t), $(n).each(function () {
                $(this).html(i)
            })
        },
        f = function () {
            $("[data-cart-product-units]").each(function (t) {
                n.push($(this))
            }), $("[data-cart-total-price]").each(function (t) {
                c.push($(this))
            })
        };
    return {
        init: f,
        notifyQuantity: s,
        notifyTotalPrice: a,
        toast: o
    }
};
"undefined" == typeof headerCart &&
((headerCart = new CartAnnouncements()), headerCart.init()),
    $("#offtwl__addToCartButton").on("click", function () {
        if ("true" !== $(this).attr("data-disabled")) {
            var e = {
                    product: product,
                    thumb: fc.thumb().toDataURL(),
                    uploadedImg: uploadedImg
                },
                t = $(this);
            console.log(e);
            "true" !== t.attr("data-disabled") &&
            (t.attr("data-disabled", "true"),
                $.ajax({
                    type: "POST",
                    url: "/custom-picture-frames/add-to-cart",
                    data: e,
                    success: function (e) {
                        headerCart.notifyQuantity(e.totalProducts),
                            headerCart.notifyTotalPrice((e.totalPrice || 0).toFixed(2)),
                            headerCart.toast(),
                            t.attr("data-disabled", "false");
                    },
                    error: function (e, a, i) {
                        console.log("ajax error response type " + a),
                            console.log(i),
                            t.attr("data-disabled", "false");
                    }
                }));
        }
    }),
    $('[id^="frame-tab"]')
        .parent()
        .on("click", function (e) {
            var t = e.target;
            t.href &&
            t.href.indexOf("frame-tab-") != -1 &&
            (t.href.endsWith("#offtwl__frm-tab-float-canvas")
                ? $("#offtwl__frame-warning").slideDown(250)
                : $("#offtwl__frame-warning").slideUp(150));
        }),
    $("#frame-code-filter").on("input", function () {
        if (!($(this).val().length < 1)) {
            if (void 0 == this.frameData) {
                var e = [];
                $(
                    '[id^="frame-tab"]:not(#offtwl__frm-tab-filtered-result) [data-frame-code]'
                ).each(function () {
                    e.push(this);
                }),
                    (this.frameData = e);
            }
            $('a[href="#offtwl__frm-tab-filtered-result"].ui-tabs-anchor')
                .parent()
                .hasClass("ui-state-active") ||
            $('a[href="#offtwl__frm-tab-filtered-result"].ui-tabs-anchor').click();
            var t = $(this)
                    .val()
                    .toUpperCase(),
                a = _.filter(this.frameData, function (e) {
                    return _.startsWith(e.dataset.frameCode.toUpperCase(), t);
                }),
                i = $("#offtwl__frm-tab-filtered-result");
            i.unbind(),
                i.empty(),
                i.mousewheel(function (e, t) {
                    (this.scrollLeft -= 45 * t), e.preventDefault();
                }),
                $(a).each(function () {
                    $(this)
                        .clone(!0)
                        .appendTo($("#offtwl__frm-tab-filtered-result"));
                }),
                $("#offtwl__frm-tab-filtered-result .lazy").lazyload({
                    effect: "fadeIn",
                    threshold: 0,
                    container: i
                });
        }
    }),
    $("[data-frame-filter]").on("click", function (e) {
        e.preventDefault();
        var t = $(this).data("filterTarget");
        $("[data-filter-input]").hide(),
            $(t).show(),
            $(this)
                .closest(".btn-group")
                .find("#current-filter-type")
                .html($(this).data("filterType"));
    });
var gallery = {
    getUrlFromIframe: !0,
    setImageData: function (e, t) {
        (this.imageUrl = e.url), (this.imageId = e.id);
        // $("#uploadingPhotoModal").modal("hide");
        var a = new Image();
        (a.onload = function () {
            prodMan.setImage(this, function () {
                togglePrinting(1),
                    $("#offtwl__dimention-image-ratio").attr("data-locked", "true");
                var i = (a.src.replace(/.*?:\/\//g, "/"), 0),
                    r = 0;
                e.pixelWidth && e.pixelHeight
                    ? ((i = e.pixelWidth),
                        (r = e.pixelHeight),
                        (image_width = e.pixelWidth),
                        (image_height = e.pixelWidth))
                    : ((i = a.width),
                        (r = a.height),
                        (image_width = e.pixelWidth),
                        (image_height = e.pixelWidth)),
                    (product.printing.image.url = e.file),
                    (product.printing.image.id = parseInt(e.id)),
                    (product.printing.image.name = e.name),
                    (product.printing.image.originalWidth = i),
                    (product.printing.image.originalHeight = r),
                    (product.printing.image.aspectRatio = parseFloat(a.width) / a.height),
                    $("#offtwl__image-glance-name").html(e.name),
                    $(".offtwl__image-description").fadeIn(150),
                    $(".offtwl__upload-img-quality-holder").fadeIn(150),
                    $("#upload-info-alert").fadeOut(150),
                    $("[name=printing-type][value=luster-paper]").click(),
                    $("a[href=#offtwl__print-info-tab]").click(),
                    $("#preset-type-list").val("-"),
                    "cm" == $("span.offtwl__dmnsn-inch-cm").html()
                        ? ($("#offtwl__dmnsn-width").val(i / 60),
                            $("#offtwl__dmnsn-height")
                                .val((r / 60).toFixed(1))
                                .change())
                        : ($("#offtwl__dmnsn-width").val(i / 60 / 2.54),
                            $("#offtwl__dmnsn-height")
                                .val((r / 60 / 2.54).toFixed(1))
                                .change()),
                "function" == typeof t && t();
            });
        }),
            (a.src = e.url);
    },
    imageUrl: "",
    imageId: -1
};
$("#offtwl__dmnsn-width, #offtwl__dmnsn-height").on(
    "input change",
    assessQuality
),
    $("[name=printing-type]").on("change", function () {
        "none" != $(this).val() ? disableMDF(!0) : disableMDF();
    });

$("#fillet-no-mat-warning a").on("click", function (e) {
    e.preventDefault(), $("[href=#offtwl__mats-tab]").click();
}),
    $(".close").click(function () {
        $(this)
            .closest(".alert")
            .fadeOut(250);
    }),
    $("#hide-unstable-frames").on("click", function () {
        if ($(this).prop("checked")) {
            $(".unstable-frame").addClass("unstable-frame-hidden");
            var e =
                "#" +
                $(".ui-tabs-active")
                    .last()
                    .attr("aria-controls");
            $(e).scroll();
        } else {
            $(".unstable-frame-hidden").removeClass("unstable-frame-hidden");
        }
    });

var canvas__frame = $("#canvas");
if (canvas__frame.length) {
    var canvas__frameDom = canvas__frame[0],
        clonedCanvasHolder = $("#cloned-canvas-holder");
    $("#canvas-frame-modal").on({
        "show.bs.modal": function () {
            var tempCanvas = document.createElement("canvas");
            tempCanvas.id = "cloned-canvas";
            tempCanvas.height = canvas__frameDom.height;
            tempCanvas.width = canvas__frameDom.width;
            var ctx = tempCanvas.getContext("2d");
            ctx.drawImage(
                canvas__frameDom,
                0,
                0,
                tempCanvas.width,
                tempCanvas.height
            );
            clonedCanvasHolder.append(tempCanvas);
        },
        "hidden.bs.modal": function () {
            $("#cloned-canvas").remove();
        }
    });
}

$("#preset-type-list").on({
    change: function () {
        if ($(this).val() != "-") {
            var e = $("#offtwl__dmnsn-width"),
                t = $("#offtwl__dmnsn-height"),
                a = $("[data-value=" + $(this).val() + "]"),
                i = "inch" === currentUnits ? "inch" : "cm";
            e.val(a.data("width-" + i)), t.val(a.data("height-" + i)).change();
        }
    }
}),
    $(window).on("unload", function () {
        (product = {
            imageWidth: 10.16,
            imageHeight: 15.24,
            printing: {
                paper: "none",
                image: {
                    file: "",
                    originalWidth: 0,
                    originalHeight: 0,
                    aspectRatio: 0,
                    name: ""
                },
                price: 0
            },
            innerWidth: 0,
            innerHeight: 0,
            outerWidth: 0,
            outerHeight: 0,
            frame: {
                frameCode: "224F222",
                frameDepth: 2,
                frameDesc: "Black",
                frameId: 238,
                frameMaterial: "Wood",
                frameMax: 120,
                frameMin: 10,
                frameRate: 2,
                frameRebate: 0.5,
                frameTile: "top_frame_238.jpg",
                frameWidth: 2
            },
            slip: {
                frame: {
                    frameId: ""
                },
                price: 0
            },
            fillet: {
                frame: {
                    frameId: ""
                },
                price: 0
            },
            glass: void 0,
            backing: void 0,
            matboards: {
                mat1: {
                    id: "",
                    colorCode: "",
                    top: "",
                    left: "",
                    right: "",
                    bottom: "",
                    matCode: "",
                    matName: "",
                    price: 0
                },
                mat2: {
                    id: "",
                    colorCode: "",
                    top: "",
                    left: "",
                    right: "",
                    bottom: "",
                    matCode: "",
                    matName: "",
                    price: 0
                }
            },
            price: 0,
            framePrice: 0,
            glassPrice: 0,
            backingPrice: 0,
            quantity: 0,
            productType: "custom-frame"
        }),
            setFrameData(product.frame);
    }),
    $(".next-button").on("click", function (e) {
        e.preventDefault(),
            $("#list-of-tabs > .ui-tabs-active")
                .next()
                .find("a")
                .click();
    }),
    $(".prev-button").on("click", function (e) {
        e.preventDefault(),
            $("#list-of-tabs > .ui-tabs-active")
                .prev()
                .find("a")
                .click();
    }),
    $(".toggle-collapse").on("click", function () {
        changePanelIcon.call(this);
    });
var scrollTarget = $("#order-step-tabs");
$(".offtwl__product-glance-link").on("click tap", function (e) {
    var t = scrollTarget.offset();
    e.preventDefault();
    var a = $(this).attr("data-href");
    $("html, body").animate({
        scrollTop: t.top
    }),
        $("[href=#" + a + "]").click();
});
var elements = document
    .querySelector("#offtwl__form-matboard")
    .querySelectorAll("input[type=number]");
!(function () {
    for (var e = 0; e < elements.length; e++) {
        elements[e].onblur = keepWithinBounds;
    }
})();

function onImageUploadeSelect() {
    var inp = $(".upload-input-inside-btn");
    inp.on({
        change: function (e) {
            var $this = $(this),
                elm = e.target,
                ext = $this
                    .val()
                    .split(".")
                    .pop()
                    .toLowerCase();
            if ($.inArray(ext, ["gif", "png", "jpg", "jpeg"]) == -1) {
                alert("only 'gif','png','jpg','jpeg' are allowd!");
            } else {
                if (elm.files && elm.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        //		  $('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');
                        var imageURL = URL.createObjectURL(elm.files[0]);
                        //		  var imageURL = e.target.result,
                        uploaded_img = new Image();
                        uploaded_img.src = imageURL;
                        uploaded_img.onload = function () {
                            if (typeof gallery !== "undefined") {
                                //			 if(gallery.getUrlFromIframe == true){

                                var canvas = document.createElement("canvas");
                                canvas.width = this.naturalWidth; // or 'width' if you want a special/scaled size
                                canvas.height = this.naturalHeight;
                                canvas.getContext("2d").drawImage(this, 0, 0);
                                uploadedImg = reader.result;

                                var pixelWidth = uploaded_img.width;
                                var pixelHeight = uploaded_img.height;
                                imageURL = imageURL.replace(
                                    /^[a-z]{4}\:\/{2}[a-z]{1,}\:[0-9]{1,4}.(.*)/,
                                    "/$1"
                                );
                                console.log("regex url");
                                console.log(imageURL);
                                var filename = imageURL.substring(
                                    imageURL.lastIndexOf("/") + 1
                                );
                                gallery.setImageData({
                                    url: imageURL,
                                    id: 100,
                                    name: filename,
                                    file: filename,
                                    pixelWidth: pixelWidth,
                                    pixelHeight: pixelHeight
                                });
                                return;
                                //			 }
                            }
                        };
                    };
                    reader.readAsDataURL(elm.files[0]);
                }
            }
        }
    });
}

onImageUploadeSelect();
