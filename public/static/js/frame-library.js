
var CustomFramer = function () {
    var initialised = false;
    var canvas;
    var ctx;
    var SCALE = 30;                 // pixel scale: 1cm = SCALE pixels wide.
    var PIRAD = Math.PI / 180;
    var DEFAULT_WIDTH = 4 * 2.54;
    var DEFAULT_HEIGHT = 6 * 2.54;
    var MAX_CANVAS_WIDTH = 1200;
    var MAX_CANVAS_HEIGHT = 1200;
    var loader = new PxLoader();

    var placeholderText = 'Off The Wall';

    var frames = [];

    var preloaded = [];

    var imageManager = {
        image: 'http://www.offthewallframing.com.au/web/images/logo.png',
        imageType: 'placeholder',
        width: DEFAULT_WIDTH * SCALE,
        height:  DEFAULT_HEIGHT * SCALE,

        setImage: function(image){
            this.image = image;
            this.width = image.width;
            this.height = image.height;
        },

        setWidth: function(width){
            this.width = width;
        },

        setHeight: function(height){
            this.height = height;
        }
    };


    var rotateImage = function(degrees){
        if(typeof degrees === 'undefined'){
            degrees = 0;
        }
        var image = imageManager.image;
        var width = image.width;
        var height = image.height;

        var can2 = document.createElement('canvas');
        can2.width = height;
        can2.height = width;
        var ctx2 = can2.getContext('2d');

        ctx2.save();


        ctx2.translate(can2.width/2, can2.height/2);
        ctx2.rotate(degrees * PIRAD);
        ctx2.translate(-can2.height/2, -can2.width/2);

        ctx2.drawImage(image, 0, 0);

        ctx2.restore();

        imageManager.setImage(can2);
    };

    var setImage = function (image, imageType, callback) {
        if (typeof image === 'undefined') {
            imageManager.image     = undefined;
            imageManager.imageType = 'placeholder';
            return;
        }
        var pxldr = new PxLoader();


        pxldr.addImage(image.src);

        pxldr.addCompletionListener(function () {
            var tmpCanvas    = document.createElement('canvas');
            var tmpCtx       = tmpCanvas.getContext('2d');
            tmpCanvas.width  = image.width;
            tmpCanvas.height = image.height;
            tmpCtx.drawImage(image, 0, 0);
            imageManager.setImage(tmpCanvas);

            imageManager.setWidth(image.width);
            imageManager.setHeight(image.height);

            if (typeof imageType !== 'undefined') {
                imageManager.imageType = imageType;
            }

            if(typeof  callback === 'function'){
                callback();
            }

        });

        pxldr.start();
    };

    var init = function (canvasID, defaultFrame) {
        try {
            canvas = document.getElementById(canvasID);
            ctx = canvas.getContext('2d');
            ctx.fillStyle = '#666';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            initialised = true;
            if(typeof defaultFrame !== 'undefined'){
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
        fr.type = 'frame';
        frames.push(fr);

        return frames.length;
    };

    var createMat = function(top, right, bottom, left, color){
        var mat = {};
        mat.top = top;
        mat.right = right;
        mat.bottom = bottom;
        mat.left = left;
        mat.color = color;

        mat.type = 'matboard';
        frames.push(mat);

        return frames.length;
    };

    var addFrame = function (frame) {
        // Framing Order:
        // First --> Last  =  Inner --> Outer
        // frame objects need : top bottom left right width and src
        if(typeof frame === 'undefined'){
            return frames.length;
        }

        var fr = {};



        fr.width = parseFloat(frame.width) || 0;

        if(fr.width == 0){
            return frames.length;
        }

        fr.top = parseFloat(frame.left)  || frame.width;
        fr.bottom = parseFloat(frame.bottom)  || frame.width;
        fr.left = parseFloat(frame.left)  || frame.width;
        fr.right = parseFloat(frame.right)  || frame.width;


        fr.src = frame.src;
        fr.type = 'frame';



        frames.push(fr);

        return frames.length;
    };

    var addItem = function(item){
        frames.push(item);
    };

    var removeFrame = function(){
        frames.pop();
    };

    var clearFrames = function(){
        frames = [];
        return frames.length;
    };


    var placeholderImage = function () {
        var tmpImage = document.createElement('CANVAS');
        var tmpCtx = tmpImage.getContext('2d');
        tmpImage.width = imageManager.width;
        tmpImage.height = imageManager.height;

        /// FILL ///
        var fillstyle = '#EEE';
        tmpCtx.fillStyle = fillstyle;
        tmpCtx.fillRect(0, 0, tmpImage.width, tmpImage.height);


        /// LOGO ///

        tmpCtx.save();
        tmpCtx.translate((tmpImage.width/2) - 75,tmpImage.height * 0.25 - 25);
        tmpCtx.fillStyle = '#2b2b2b';

        tmpCtx.fillRect(0,0,100,100);
        tmpCtx.shadowColor = 'rgba(1,1,1,0)';

        tmpCtx.strokeStyle = fillstyle;
        tmpCtx.lineWidth = 5;
        tmpCtx.strokeRect(0,0,100,100);
        tmpCtx.fillStyle = '#2b2b2b';

        tmpCtx.shadowColor = 'rgba(1,1,1,0.25)';
        tmpCtx.fillRect(50,50,75,75);

        tmpCtx.shadowColor = 'rgba(1,1,1,0)';
        tmpCtx.strokeRect(50,50,75,75);
        tmpCtx.fillStyle = '#2b2b2b';

        tmpCtx.shadowColor = 'rgba(1,1,1,0.25)';
        tmpCtx.fillRect(100,100,50,50);

        tmpCtx.shadowColor = 'rgba(1,1,1,0)';
        tmpCtx.strokeRect(100,100,50,50);
        tmpCtx.restore();


        /// TEXT ///
        var textSize = 45;
        tmpCtx.save();
        tmpCtx.fillStyle = '#2b2b2b';
        tmpCtx.font = textSize + 'px Arial';
        tmpCtx.baseline = 'top';
        tmpCtx.textAlign = 'center';

        var textArray  = placeholderText.split('\n');
        var padding = 15;
        for (var i = 0; i < textArray.length; i++) {
            tmpCtx.fillText(textArray[i], tmpImage.width / 2, (tmpImage.height * 0.25 + 175 + (i * (padding + textSize) )));
        }

        tmpCtx.restore();


        /// SHADOW ///
        tmpImage = addInnerShadow(tmpImage);

        return tmpImage;
    };

    var setPlaceholderText = function(text){
        placeholderText = text;
    };

    var addInnerShadow = function(rect, weight){
        if(typeof weight == 'undefined'){
            weight = 0.5;
        }
        var tmpCtx = rect.getContext('2d');
        tmpCtx.save();
        tmpCtx.shadowBlur = 20;
        tmpCtx.shadowOffsetX = 0;
        tmpCtx.shadowOffsetY = 0;
        tmpCtx.shadowColor = 'rgba(1,1,1,'+ weight +')';
        tmpCtx.lineWidth = 20;
        var offset = tmpCtx.lineWidth / 2;
        tmpCtx.strokeRect(0 - offset,0 - offset,rect.width + (offset * 2), rect.height + (offset * 2));
        tmpCtx.restore();

        return rect;
    };

    var addWhiteStroke = function(rect){
        var tmpCtx = rect.getContext('2d');
        tmpCtx.save();
        tmpCtx.strokeStyle = "white";
        tmpCtx.lineWidth = 6;
        var offset = tmpCtx.lineWidth / 2;
        //tmpCtx.strokeRect(0 - offset,0 - offset,rect.width + (offset * 2), rect.height + (offset * 2));
        tmpCtx.strokeRect(0,0,rect.width, rect.height);
        tmpCtx.restore();
        return rect;
    };

    var draw = function (options) {
        if (!initialised) {
            throw new Error("Not Initialised");
        }


        if (typeof options !== 'undefined') {
            if(options.inches){
                options.width *= 2.54;
                options.height *= 2.54;
            }

            SCALE = Math.min(MAX_CANVAS_WIDTH/options.width , MAX_CANVAS_HEIGHT/options.height);

            imageManager.setWidth(parseFloat(options.width) * SCALE);
            imageManager.setHeight(parseFloat(options.height) * SCALE);
        }

        loader = new PxLoader();

        if (imageManager.imageType === 'picture') {

            //maybe put the loader in setImage?
            //loader.addImage(imageManager.image);
        } else {
            // Create a blank image
            imageManager.setImage(new placeholderImage(), 'placeholder');
        }

        function draw() {
            var tmpCan = document.createElement('canvas');
            var tmpCt = tmpCan.getContext('2d');
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
                if(frames[index].src){
                    if(preloaded.indexOf(frames[index].src == -1)){
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

        var fLeft   = parseFloat(frame.left) * SCALE,
            fRight  = parseFloat(frame.right) * SCALE,
            fTop    = parseFloat(frame.top ) * SCALE,
            fBottom = parseFloat(frame.bottom) * SCALE;


        var newWidth = parseFloat(item.width) + fLeft + fRight;
        var newHeight = parseFloat(item.height) + fTop + fBottom;

        var canvas = document.createElement('canvas');
        canvas.width = newWidth;
        canvas.height = newHeight;

        var ctx = canvas.getContext('2d');

        if (typeof frame['type'] === 'undefined' || frame['type'] === 'matboard') {
            ctx.fillStyle = frame.color;
            ctx.fillRect(0, 0, canvas.width, canvas.height);

        } else {
            var FRAME_IMAGE = new Image();
            FRAME_IMAGE.src = frame.src;


            var tileHeight = FRAME_IMAGE.height;

            // TODO: FIX THE ISSUE FOR IOS/SAFARI WHEN SCALING
            var ctxScale = parseFloat(((SCALE * frame.width) / tileHeight).toFixed(2));

            var ctxScaleWidth = parseInt(canvas.width / ctxScale);
            var ctxScaleHeight = parseInt(canvas.height / ctxScale);

            ctx.fillStyle = ctx.createPattern(FRAME_IMAGE, 'repeat-x');


            ////// TOP //////
            ctx.save();
            ctx.scale(ctxScale, ctxScale);
            ctx.fillRect(0, 0, ctxScaleWidth  , FRAME_IMAGE.height);
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
        }

        // Draw the item on top
        ctx.drawImage(item, fLeft, fTop);
        return canvas;
    };

    var recursivelyFrame = function(item, frames){
        // Frames is an array
        if (frames.length == 0){
            return item;
        }

        if(typeof frames[frames.length-1]['type'] !== 'undefined' && frames[frames.length-1]['type'] == 'matboard'){
            item = addWhiteStroke(item);
        }

        if (frames.length == 1){
            item = addInnerShadow(item, 0.4);
            return frameItem(item,frames[0]);

        }else {
            item = addInnerShadow(item,0.25);
            var f = frameItem(item, frames[frames.length-1]);
            return recursivelyFrame(f, frames.slice(0,frames.length-1));
        }
    };


    ////// UTILITY ///////

    var measurements = function(inchWidth, inchHeight, cmWidth, cmHeight, ctx, canvas){
        // 'Photo Frame'
        ctx.textBaseline = 'bottom';
        ctx.font =  (0.1 * canvas.width) + 'px ' + 'Arial';
        ctx.fillText('Photo Frame', canvas.width * 0.5, canvas.height * 0.6);

        // Inch
        ctx.textBaseline = 'top';
        ctx.font =  (0.175 * canvas.width) + 'px ' + 'Arial';
        ctx.fillText((inchWidth + inchSymbol + separator + inchHeight + inchSymbol), canvas.width * 0.5, canvas.height * 0.61);

        // Cm
        ctx.font =  (0.075 * canvas.width) + 'px ' + 'Arial';
        ctx.fillText((cmWidth + cmSymbol + separator + cmHeight + cmSymbol), canvas.width * 0.5, canvas.height * 0.8);
    };

    var generateThumbnail = function(options){
        var width = 250;
        var height = 250;
        if(typeof options !== 'undefined'){
            width = options.width;
            height = options.height;
        }


        var scale  = Math.min(width/canvas.width , height/canvas.height);

        var thumbCanvas = document.createElement('canvas');
        thumbCanvas.width = Math.floor(canvas.width * scale);
        thumbCanvas.height = Math.floor(canvas.height * scale);

        var thumbCtx = thumbCanvas.getContext('2d');
        thumbCtx.fillStyle = '#FFFFFF';
        thumbCtx.fillRect(0,0,thumbCanvas.width,thumbCanvas.height);
        thumbCtx.scale(scale, scale);
        thumbCtx.drawImage(canvas,0,0);

        return thumbCanvas;
    };


    var drawMeasurementRuler = function(position, alignment, measurement) {
        //var PIRAD = Math.PI / 180;
        var styleColor = '#2b2b2b';
        var angle = 0;

        if(alignment[0] === 'v'){
            angle = 90;
        }else{
            angle = 0;
        }

        var context = ctx;

        context.fillStyle = styleColor;
        context.strokeStyle = styleColor;



        context.save();

        context.scale(3, 3);
        context.translate(position.x, position.y);
        context.rotate(angle * PIRAD);

        context.font = '8px Arial';
        context.textBaseline = 'middle';
        var textwidth = context.measureText(measurement).width + 5;


        // text
        context.save();
        context.beginPath();
        if(angle === 90){
            context.scale(-1,-1);
            context.fillText(measurement, 5-textwidth, 0);
        }else{
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

    var frameCount = function(){
        return frames.length;
    };



    ///////////// RETURN ///////////
    return {
        clearFrames: clearFrames,
        addFrame: addFrame,
        removeFrame: removeFrame,
        createFrame: createFrame,
        createMat: createMat,
        setPlaceholderText:setPlaceholderText,
        draw: draw,
        init:init,
        setImage: setImage,
        rotateImage: rotateImage,
        addItem: addItem,
        thumb: generateThumbnail,
        frameCount: frameCount
    };
};
