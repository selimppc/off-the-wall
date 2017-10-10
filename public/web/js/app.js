$( window ).load(function(){
	// console.log("hiron Das");
	var flag = 0;
	var marginArray = [];

	setTimeout(function(){
		marginArray[flag]=centerElement(".canvas-container");
	}, 1000);
	// console.log(flag);
	sizeInfo(pixelToCM, ['#formGroupInputWidth', '#formGroupInputHeight']);

	$(".darkroom-button").click(function(){
		childId = $(this).children().children().attr("xlink:href");

		if(childId == "#rotate-left" || childId == "#rotate-right"){

			marginArray[++flag]=centerElementRotate(".canvas-container");
			sizeInfo(pixelToCM, ['#formGroupInputWidth', '#formGroupInputHeight'], true);

		} else if (childId == "#done"){
			var self = this;
			flag++;
			var myVar = setTimeout(function(){ 
				self.nextElementSibling.click(); 
			}, 100);	
			
		}else if (childId == "#redo"){
			++flag;
			$('.canvas-container').css({"margin-top": marginArray[flag]});
			console.log(marginArray);
			console.log(flag);
		}
		else if (childId == "#undo"){
			--flag;
			$('.canvas-container').css({"margin-top": marginArray[flag]});
			console.log(marginArray);
			console.log(flag);
		}
		else if (childId == "#crop"){

		}
		else if (childId == "#save"){
			console.log("hi");
			// $('#dvApp').append
			setTimeout(function(){
				var canvas = document.getElementById('imgCanvas');
				var ctx=canvas.getContext("2d");
				var img=document.querySelector("#appFrame img");
				canvas.width  = img.width;
				canvas.height = img.height;
				ctx.drawImage(img,0,0);

				var photo = canvas.toDataURL('image/jpeg', 1.0);// $('#appFrame img')[0].currentSrc;                
				$.ajax({
				  method: 'POST',
				  url: 'photo_upload.php',
				  data: {
				    photo: photo
				  },
				  success:function(data){
				  		// console.log(data);
						window.location.href = "frame_photo.php";
					}
				});
			}, 100);
		}
		else{

			marginArray[flag]=centerElement(".canvas-container");
			sizeInfo(pixelToCM, ['#formGroupInputWidth', '#formGroupInputHeight']);
		}

	});
});

function centerElement(selector){

	var parentHeight = $(selector).parent().height();
	var childHeight = $(selector).height();

	var topMargin = (parentHeight - childHeight)/2;

	if(topMargin>0){
		$(selector).css({"margin-top": topMargin});
		return topMargin;
	}else{
		$(selector).css({"margin-top": "auto"});
		return 0;
	}	
}

function centerElementRotate(selector){

	var parentHeight = $(selector).parent().height();
	var childHeight = $(selector).width();

	var topMargin = (parentHeight - childHeight)/2;

	console.log(parentHeight+ ':'+ childHeight +':'+topMargin);

	if(topMargin>0){
		$(selector).css({"margin-top": topMargin});
		return topMargin;
	} else{
		$(selector).css({"margin-top": "auto"});
		return 0;
	}	
}

function pixelToCM(pixel){
	return (pixel/28.35).toFixed(2);
}

function cmToPixel(cm){
	return (cm*28.35).toFixed(2);
}


function sizeInfo(callback, selectors, rotate){
	$(selectors[0]).val(callback($('.canvas-container').width()) + " cm");
	$(selectors[1]).val(callback($('.canvas-container').height())+ " cm");

	if(rotate){
		$(selectors[1]).val(callback($('.canvas-container').width())+ " cm");
		$(selectors[0]).val(callback($('.canvas-container').height())+ " cm");
	}
}

/*---function for frame_photo.php----*/
var GLOBAL_INFO = {};

$(document).ready(function(){

	/*var host= "ws://localhost:8080";

	var ws = new WebSocket(host);

	  ws.onopen = function() {
	    // ws.send("Hello");  // Sends a message.
	  };
	  ws.onmessage = function(e) {
	    // Receives a message.
	    alert(e.data);
	  };
	  ws.onclose = function() {
	    // alert("closed");
	  };*/



	  var frameData = ['brown-stretch-A213_01@4cm.png','gold-round-A577_01@4cm.png','brown-stretch-A214_02@4cm.png','brown-stretch-A564_02@4cm.png',
					   'brown-stretch-A821_02@4cm.png','brown-stretch-CHAPM422ECASHEW@4cm.png','brown-stretch-MLXH1042TK@4cm.png','brown-stretch-MLXH1043GREY@4cm.png',
					   'gold-stretch-A713_01@4cm.png','gold-round-A728_01@4cm.png','gold-stretchA835_01@4cm.png','gold-stretch-AI92009@4cm.png','gold-stretch-AI96009@4cm.png',
					   'gold-stretch-ML1341YL@4cm.png','silver-round-A577_02@4cm.png','silver-round-A589_02@4cm.png','silver-round-A658_02@4cm.png','silver-round-A659_02@4cm.png',
					   'silver-stretch-A712_02@4cm.png','silver-round-A727_02@4cm.png','silver-round-A728_02@4cm.png','silver-round-MLX9082S@4cm.png','black-stretch-A213_03@4cm.png',
					   'black-stretch-A213_04@4cm.png','black-round-A577_03@4cm.png','black-round-A659_03@4cm.png','black-stretch-ML120BLK@4cm.png','black-stretch-ML120BS@4cm.png',
					   'black-round-MLX9082BL@4cm.png','black-stretch-MLXH4311BLK@4cm.png','whitewashed-stretch-A90_01@4cm.png','whitewashed-round-A845_04@4cm.png',
					   'whitewashed-stretch-A879_02@4cm.png','whitewashed-stretch-A880_02@4cm.png','whitewashed-round-AI908_01@4cm.png','whitewashed-round-AI908_03@4cm.png',
					   'whitewashed-round-CHAPM108WWH@4cm.png','whitewashed-round-MLXH1043WH@4cm.png'];
	  				
	  var wallData=[
	  'wall(3).jpg','wall(4).jpg','wall(5).jpg','wall(12).jpg','wall(6).jpg'
	  ,'wall(7).jpg','wall(8).jpg','wall(9).jpg','wall(10).jpg','wall(11).jpg'
	  ,'wall(13).jpg','wall(14).jpg','wall(15).jpg','wall(16).jpg','wall(17).jpg'
	  ,'wall(18).jpg','wall(19).jpg','wall(20).jpg'
	  ];

	  addIndex('#index-frames .col-lg-9', frameData);
	  addFrameOptionsBar('#index-frames .col-lg-3', frameData);
	  $('#frame-window').css({'visibility': 'hidden'});
	  setTimeout(function(){
	  	initImgPosition();
	  	$('#frame-window').css({'visibility': 'visible'});
	  }, 1000);


	  $(function () {
		    $('#index-tab a:first').tab('show');
	  });

	  $('.fram-thumbnail').click(function() {
		      $(".fram-thumbnail.active").removeClass("active");
		      $(this).addClass('active');
		      GLOBAL_INFO.url = $(this).css('border-image-source');
		      frameWidth( GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.url, '#image-window');
	  		  matsWidth(GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.matsWidth, '#image-window');
			setImage(GLOBAL_INFO.photoHeight,'#image-window', true);
			info(GLOBAL_INFO.originalWidth, GLOBAL_INFO.originalHeight, GLOBAL_INFO.url, GLOBAL_INFO.matsWidth);
		});

	  $('.frame-option').click(function(){
	  	
	  		$('.frame-option').each(function(i, d){
	  			 $(d.firstChild.dataset.href).css({display :'none'});
	  		})
	  	 document.getElementById(this.firstChild.dataset.href.split('#')[1]).style.display = 'block';
	  })

	  $('#mats-width-top').click(function(){
	  	var mats = +$('#mats-width-top').val();
	  	GLOBAL_INFO.matsWidth.top = mats;
	  	// GLOBAL_INFO.matsWidth.bottom = mats;
	  	
	  	matsWidth(GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.matsWidth, '#image-window');
		frameWidth( GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.url, '#image-window');

		setImage(GLOBAL_INFO.photoHeight,'#image-window', true);
		info(GLOBAL_INFO.originalWidth, GLOBAL_INFO.originalHeight, GLOBAL_INFO.url, GLOBAL_INFO.matsWidth);
	  });

	  $('#mats-width-bottom').click(function(){
	  	var mats = +$('#mats-width-bottom').val();
	  	// GLOBAL_INFO.matsWidth.top = mats;
	  	GLOBAL_INFO.matsWidth.bottom = mats;
	  	
	  	matsWidth(GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.matsWidth, '#image-window');
		    frameWidth( GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.url, '#image-window');

		setImage(GLOBAL_INFO.photoHeight,'#image-window', true);
		info(GLOBAL_INFO.originalWidth, GLOBAL_INFO.originalHeight, GLOBAL_INFO.url, GLOBAL_INFO.matsWidth);
	  });

	  $('#zoom-in').click(function(){
	  		GLOBAL_INFO.photoHeight +=15;
			setImage(GLOBAL_INFO.photoHeight,'#image-window', true);
	  		matsWidth(GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.matsWidth, '#image-window');
		    frameWidth( GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.url, '#image-window');
	  });
	  $('#zoom-out').click(function(){
	  		GLOBAL_INFO.photoHeight = GLOBAL_INFO.photoHeight-15 >50 ? GLOBAL_INFO.photoHeight-15 : GLOBAL_INFO.photoHeight;
			setImage(GLOBAL_INFO.photoHeight, '#image-window', true);
	  		matsWidth(GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.matsWidth, '#image-window');
		    frameWidth( GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.url, '#image-window');
		    console.log(GLOBAL_INFO.matsWidth);
	  });

	  $("#matColor").spectrum({
      flat: true,
      showInput: true,
      className:"mat-colors",
      preferredFormat: "rgb",
      showPalette: true,
      showPaletteOnly: true,
      change: function(color){
      	if(document.getElementById('topMat').checked) {
      		$("#image-window img#originalImage").css({"background-color":color.toHexString()});
      		$('#top_mat_color [type=color]').val(color.toHexString());
			$('#mats_color [type=color]')[1].value = color.toHexString();

		}else if(document.getElementById('bottomMat').checked) {
      		$("#image-window #framed-image").css({"background-color":color.toHexString()});
      		$('#bottom_mat_color [type=color]').val(color.toHexString());
			$('#mats_color [type=color]')[0].value = color.toHexString();

		}
      },
      palette: [   
       ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
       ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
       ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
       ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
       ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
       ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
       ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
       ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
    ]
    });

	  $("#wallColor").spectrum({
      flat: true,
      showInput: true,
      showAlpha: true,
      className: "wall-colors",
      preferredFormat: "rgb",
      showPalette: true,
      showPaletteOnly: true,
      change: function(color){
      	$("#app-window").css({"background-color":color.toHexString()});
      },
      palette: [   
       ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
       ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
       ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
       ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
       ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
       ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
       ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
       ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
    ]
    });

	$('#roomViewButton').click(function(){
		$('#wallHolder').css({'visibility': 'hidden'});

		setTimeout(function(){
			GLOBAL_INFO.modalWidth = $('#wall').width();
			addModalIndex( "#wall-index",wallData);
			var img = $('.wall-thumbnail.active>div>img').clone();
			var photo = $('#image-window #framed-image').clone();

			$("#frameCanvas").css({'visibility': 'hidden'});

			initRoomView(img, photo);

			//--- the fame canvas code ---//
			/*html2canvas($('#appFrame'), {
				onrendered: function(canvas) {
	                // theCanvas = canvas;
	                $('#frameCanvas').append(canvas);

	                var screenshot = canvas.toDataURL("image/png");
      				// document.getElementById("frameCanvas").setAttribute("src", screenshot);
            	}
			});
			var canvas = new fabric.Canvas('roomViewCanvas');
			canvasWindow.call(document.querySelector('.wall-thumbnail.active div img'), canvas);*/
			$("#photoZoom .rangeZoom").on("input change", function() {
					var photo_roomview_height = $(this).val();
					console.log(photo_roomview_height);
			    	setImage(photo_roomview_height, '#frameCanvas', false);
					matsWidth(GLOBAL_INFO.originalHeight, photo_roomview_height, GLOBAL_INFO.matsWidth, '#frameCanvas', true);
			    	frameWidth( GLOBAL_INFO.originalHeight, photo_roomview_height, GLOBAL_INFO.url, '#frameCanvas');
					// frameMove('#frameCanvas .roomWall','#frameCanvas #originalImage');
			});


			$('.wall-thumbnail>div>img').click(function() {
				// addModalIndex( "#wall-index",wallData);
				$("#frameCanvas").css({'visibility': 'hidden'});

				var img = $(this).clone();
				var photo = $('#image-window #framed-image').clone();
			    $(".wall-thumbnail.active").removeClass("active");
			    $("#photoZoom .rangeZoom").val(70);
			  
			    $(this).parent().parent().addClass('active');
				initRoomView(img, photo);
			  });
		}, 1000);

	});

});



/*--room view function---*/
function initRoomView(img, photo){
	$("#frameCanvas").empty();
			    
			    $("#frameCanvas").append(img).css({
			    	'text-align' :'center'
			    });

			    $('#frameCanvas img').css({
			    	'height': $('#wall').height() - 20,
			    	'padding-top': '15px'
			    }).addClass('roomWall');

			    $("#frameCanvas").append(photo);
			    $('#frameCanvas #originalImage').css({
			    	'position': "relative"
			    })
			    $('#frameCanvas #framed-image').css({
			    	'position': "absolute"
			    })
			    var photo_roomview_height = 70; 

			    setTimeout(function(){
			    	setImage(photo_roomview_height, '#frameCanvas', false);
					matsWidth(GLOBAL_INFO.originalHeight, photo_roomview_height, GLOBAL_INFO.matsWidth, '#frameCanvas', true);
			    	frameWidth( GLOBAL_INFO.originalHeight, photo_roomview_height, GLOBAL_INFO.url, '#frameCanvas');

					// frmeMove('#frameCanvas .roomWall');

					// var container = document.querySelector("#frameCanvas .roomWall");

					// container.addEventListener("click", getClickPosition, false);
					frameMove('#frameCanvas .roomWall','#frameCanvas #framed-image');
					$('#wallHolder').css({'visibility': 'visible'});
					$("#frameCanvas").css({'visibility': 'visible'});

			    }, 1000);
}

function movingButton(selectorPanel, selectorBox, height, width){
	var strVar="";
	strVar += "<div id=\"navigation\" class=\"col-ls-1 col-md-2 col-sm-2\">";
	strVar += "									        			<div class=\"row\">";
	strVar += "									        				<div class=\"col-ls-1 col-md-1 col-sm-1\"><\/div>";
	strVar += "									        				<div class=\"col-ls-1 col-md-1 col-sm-1 movable-div\" id = \"moveup\" title=\"Press up-arrow\">";
	strVar += "									        					<i class=\"fa fa-angle-up fa-lg\" aria-hidden=\"true\"><\/i>";
	strVar += "															<\/div>";
	strVar += "									        				<div class=\"col-ls-1 col-md-1 col-sm-1\"><\/div>";
	strVar += "									        			<\/div>";
	strVar += "									        			<div class=\"row\">";
	strVar += "									        				<div class=\"col-ls-1 col-md-1 col-sm-1 movable-div\" id = \"moveleft\" title=\"Press left-arrow\">";
	strVar += "									        					<i class=\"fa fa-angle-left fa-lg\" aria-hidden=\"true\"><\/i>";
	strVar += "															<\/div>";
	strVar += "									        				<div class=\"col-ls-1 col-md-1 col-sm-1\"><\/div>";
	strVar += "									        				<div class=\"col-ls-1 col-md-1 col-sm-1 movable-div\" id = \"moveright\" title=\"Press right-arrow\">";
	strVar += "									        					<i class=\"fa fa-angle-right fa-lg\" aria-hidden=\"true\"><\/i>";
	strVar += "															<\/div>";
	strVar += "									        			<\/div>";
	strVar += "									        			<div class=\"row\">";
	strVar += "									        				<div class=\"col-ls-1 col-md-1 col-sm-1\"><\/div>";
	strVar += "									        				<div class=\"col-ls-1 col-md-1 col-sm-1 movable-div\" id = \"movedown\" title=\"Press down-arrow\">";
	strVar += "									        					<i class=\"fa fa-angle-down fa-lg\" aria-hidden=\"true\"><\/i>";
	strVar += "									        				<\/div>";
	strVar += "									        				<div class=\"col-ls-1 col-md-1 col-sm-1\"><\/div>";
	strVar += "									        			<\/div>";
	strVar += "									        			";
	strVar += "									        		<\/div>";

	selectorPanel.parent().append(strVar);

	$('#moveleft').click(function() {
        selectorBox.animate({
        'margin-left' : "-=30px" //moves left
        });
    });
    $('#moveright').click(function() {
        selectorBox.animate({
        'margin-left' : "+=30px" //moves right
        });
    });
    $('#movedown').click(function() {
        selectorBox.animate({
        'margin-top' : "+=30px" //moves down
        });
    });
    $('#moveup').click(function() {
        selectorBox.animate({
        'margin-top' : "-=30px" //moves up
        });
    });

}

function frameMove(pane, box){
	var pane = $(pane),
    box = $(box),
    maxValueHeight = pane.height() - box.outerHeight(),
    maxValueWidth = pane.width() - box.outerWidth(),
    boxMargin = (pane.parent().width() - pane.width())/2;
    box.css({
    	'margin-left': boxMargin + 5,
    	'margin-top': '20px'
				});
    keysPressed = {},
    distancePerIteration = 323;

	movingButton(pane, box, maxValueHeight, maxValueWidth);

	function calculateNewValue(oldValue, keyCode1, keyCode2, maxValue) {

	    var newValue = parseInt(oldValue, 10)
	                   + (keysPressed[keyCode2] ? distancePerIteration : 0)
	                   - (keysPressed[keyCode1] ? distancePerIteration : 0);
	    return newValue < 0 ? 0 : newValue > maxValue ? maxValue : newValue;
	}

	$(window).keydown(function(event) { keysPressed[event.which] = true; });
	$(window).keyup(function(event) { keysPressed[event.which] = false; });

	setInterval(function() {
	    box.css({
	        left: function(index ,oldValue) {
	            return calculateNewValue(oldValue, 37, 39, maxValueWidth - 10);
	        },
	        top: function(index, oldValue) {
	            return calculateNewValue(oldValue, 38, 40, maxValueHeight - 10);
	        }
	    });
	}, 20);

}


function frameMoveByButton(){
	 $('#moveleft').click(function() {
        $('#textbox').animate({
        'left' : "-=30px" //moves left
        });
    });
    $('#moveright').click(function() {
        $('#textbox').animate({
        'left' : "+=30px" //moves right
        });
    });
    $('#movedown').click(function() {
        $('#textbox').animate({
        'top' : "+=30px" //moves down
        });
    });
    $('#moveup').click(function() {
        $('#textbox').animate({
        'top' : "-=30px" //moves up
        });
    });
}
/*function canvasWindow(canvas){

	canvas.clear().renderAll();
	canvas.setBackgroundImage(this.src,canvas.renderAll.bind(canvas), {
    backgroundImageOpacity: 1,
    backgroundImageStretch: true
	});
	var ratio = this.naturalWidth/this.naturalHeight;
	var height = this.naturalHeight;

	canvas.remove(imgInstance);


	var imgInstance = new fabric.Image(this, {
	   left: 10,
	   top: 10,
	  // angle: 30,
	  height:$('#wall').height() - 20,
	  width: $('#wall').height()*ratio - 20, 
	  opacity: 0.85
	});


	canvas.setWidth($('#wall').height()*ratio);
	canvas.setHeight($('#wall').height());

	// console.log('canvas width :'+Math.round(canvas.getWidth()));

	var leftPadding = (GLOBAL_INFO.modalWidth - Math.round(canvas.getWidth()))/2;

	// console.log('PADDING width :'+$('#wall').width());


	$('#wall').css({'padding-left': leftPadding });

	canvas.add(imgInstance);

	canvas.item(0).hasBorder = canvas.item(0).hasCorner = canvas.item(0).hasControle = canvas.item(0).selectable = canvas.item(0).lockRotation = false;
}*/

/*function frmeMove(id){
	$(id).mousemove(function( event ) {
		var roomWidth  = $(id).outerWidth();
		var roomHeight = $(id).outerHeight();

		var x = event.pageX - $(event.currentTarget).offset().top - roomWidth/2 - 30;
		var y = event.pageY - $(event.currentTarget).offset().left - roomHeight/2 - 15;

		$("#frameCanvas #originalImage").css({
			"transform":"translate("+x+"px,"+y+"px)"
		});

	  /*var msg = "Handler for .mousemove() called at ";
	  msg += (event.pageX - $(event.currentTarget).offset().top) + ", " + (event.pageY - $(event.currentTarget).offset().left);
	  console.log(msg);
  
	});
}*/

function addIndex (selector, frameData) {

	var options = frameData.map(function(d, i){
		return d.split('-')[0].trim().toLowerCase();
	})
	.sort()
  	.reduce(function(a,b, i){
	    if(a.key !== b){
	      	a.key = b;
			var element = document.createElement("div");
			element.id = b+"_div";
			element.className = "frame-collection col-lg-12";
			element.style.display = 'none';
	     	a.value.push(element);
	    }
	    
		return a;
	 },{key:'', value:[]})
  	.value;

	frameData.forEach(function(d, i){
		// console.log(options[1].className.split('_')[0]);
		options.forEach(function(div, j){
			// console.log(div.className.split('_')[0]);
			if (d.split('-')[0].trim().toLowerCase() == div.id.split('_')[0]){
				/*console.log(options[j]);
				var photoFrame = document.createElement('div');
				photoFrame.className = 'fram-thumbnail col-md-2 col-sm-2';*/
				$(div).append("<div class=\"fram-thumbnail col-md-3 col-sm-3\" style=\"border-image-source: url(http://offthewallframing.com.au/web/photo_frames/"+d+")\"></div>");
			}
		})
			
		// divStr += "<div class=\"fram-thumbnail col-md-2 col-sm-2\" style=\"border-image-source: url(./images/photo_frames/"+d+")\"></div>";
	});

	$(selector).append(options);

	$('.fram-thumbnail:first').addClass("active");
	$('.frame-collection:first').css({display: 'block'});

}

function addFrameOptionsBar(selector, frameData){
	
	var options = frameData.map(function(d, i){
		return d.split('-')[0].trim().toLowerCase();
	})
	.sort()
  	.reduce(function(a,b, i){
	    if(a.key !== b){
	      a.key = b;
			 
	     a.value.push({name: b, count: 1});
	    }
	    else{
	    	a.value[a.value.length-1].count++;
	    }
		return a;
	 },{key:'', value:[]})
  	.value
  	.map(function(d,i){
  		return "<div class='frame-option' style=\"padding: 5px 15px\"><a data-href=\"#"+d.name+"_div\">"+d.name.toCamel()+" Frames("+d.count+")</a></div>";
  	});

  	$(selector).append(options);
	// console.log(options);
}

function addModalIndex (selector, frameData) {
	var divStr = "";
	$(selector).empty();
	frameData.forEach(function(d, i){
		divStr += "<div class=\"wall-thumbnail col-md-2 col-sm-2\">";
		divStr += "<div>";
		divStr += "<img src=\"http://offthewallframing.com.au/web/room_view/"+d+"\">";
		divStr += "</div>";
		divStr += "</div>";
	});

	$(selector).append(divStr);

	$('.wall-thumbnail:first').addClass("active");

}

function initImgPosition(){
	var originalHeight = $('#image-window img#originalImage').height();
	var originalWidth = $('#image-window img#originalImage').width();
	GLOBAL_INFO.originalHeight = originalHeight;
	GLOBAL_INFO.originalWidth = originalWidth;

	document.querySelector('#mats_color [type=color]').value = "#ffffff";

	var appWindowHeight = $('#app-window').height(); 
	// var appWindowWidth = $('#app-window').width(); 
	var photoHeight = appWindowHeight* 0.5;
	var topMargin;

	// console.log('hiro:'+photoHeight);

	if(originalHeight < photoHeight){
		photoHeight = originalHeight;
	}
	// console.log('hiron:'+photoHeight);

	GLOBAL_INFO.photoHeight = photoHeight;
	GLOBAL_INFO.url = $('.fram-thumbnail.active').css('border-image-source');
	GLOBAL_INFO.matsWidth={top: 0, bottom: 0};
	GLOBAL_INFO.rationalMatsWidth = {top: 0, bottom: 0};

	setImage(GLOBAL_INFO.photoHeight, '#image-window', true);
	frameWidth( GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.url, '#image-window');
	matsWidth(GLOBAL_INFO.originalHeight, GLOBAL_INFO.photoHeight, GLOBAL_INFO.matsWidth, '#image-window');
	info(GLOBAL_INFO.originalWidth, GLOBAL_INFO.originalHeight, GLOBAL_INFO.url, GLOBAL_INFO.matsWidth);
}

function setImage(photoHeight, id, flag){
	$(id+" img#originalImage").height(photoHeight);
	var width = $(id+" img#originalImage").outerWidth();
	
	if(flag){
		$(id+' img#imageString')
		.outerWidth(width)
		.css({
			'padding-left': '70px' 
		});
		// $("#image-frame").height(photoHeight);
	}
}


function matsWidth(oldHeight, newHeight, matsWidth, id, flag){

	var ratio = newHeight/oldHeight;
	var topMatsWidth = +cmToPixel(matsWidth.top);
	var bottomMatsWidth = +cmToPixel(matsWidth.bottom);
	// var matsWidth = matsWidth.toFixed(2);

	// console.log(newHeight+" "+ratio+" "+ matsWidth);

	topMatsWidth = ratio*topMatsWidth;
	topMatsWidth = topMatsWidth.toFixed(2);

	bottomMatsWidth = ratio*bottomMatsWidth;
	bottomMatsWidth = bottomMatsWidth.toFixed(2);

	$(id+" img#originalImage").css({
		'padding' : topMatsWidth
	});

	$(id+" #framed-image").css({
		'padding' : bottomMatsWidth
	});

	if(!flag){
		var appWindowHeight = $('#app-window').height(); 
		var appWindowWidth = $(id).width(); 

		var imgHeight = $(id+' #framed-image').outerHeight(); 
		var imgWidth = $(id+' #framed-image').outerWidth();
		var stringHeight = $('#imageString').height(); 

		var topMargin = (appWindowHeight - imgHeight)/2 - stringHeight; 
		var leftMargin = (appWindowWidth - imgWidth)/2;
	
	
		$(id).css({
			'margin-top': topMargin<0 ? 0: topMargin,
			'margin-left': leftMargin<0 ? 0: leftMargin
			});
	}

	GLOBAL_INFO.rationalMatsWidth.top = +topMatsWidth;
	GLOBAL_INFO.rationalMatsWidth.bottom = +bottomMatsWidth;
	// return newMatsWidth;
}

function frameWidth(oldHeight, newHeight, url, id){
	// console.log(url);
	var frame_width = parseInt(url.split('/').pop().split('@').pop());
	var image_repeat = url.split('/').pop().split('-')[1];
	console.log(image_repeat);
	var newFrameWidth = +cmToPixel(frame_width)*(newHeight/oldHeight) ;
	newFrameWidth = newFrameWidth.toFixed(2);

	var imageHeight = +((+newHeight) + 2*(GLOBAL_INFO.rationalMatsWidth.top));
	var imageWidth = +(GLOBAL_INFO.originalWidth*(newHeight/oldHeight) + 2*(GLOBAL_INFO.rationalMatsWidth.top ));
	
	// console.log(newHeight + 2*(GLOBAL_INFO.rationalMatsWidth.top));

	$(id+' #framed-image').css({
		'border-width': newFrameWidth,
		'width': imageWidth,
		'height': imageHeight,
		'border-image-source': url,
		'border-image-repeat': image_repeat
	});
	return newFrameWidth;
}

function info(width, height, url, mats){

	$('#photo_width').text(pixelToCM(width));
	$('#photo_height').text(pixelToCM(height));

	var frame_width = parseInt(url.split('/').pop().split('@').pop());
	// console.log(+pixelToCM(width) + frame_width +mats);
	$("#frame_width").text((+pixelToCM(width) + 2*(frame_width +mats.top+mats.bottom)).toFixed(2));
	$('#frame_height').text((+pixelToCM(height) + 2*(frame_width + mats.top+mats.bottom)).toFixed(2));

	var frame_name = url.split('/').pop().split('.').shift();
	$('#frame_code').text(frame_name.substring(frame_name.lastIndexOf('-')+1, frame_name.indexOf('@')).toCamel());
	$('#mats_width').text("Top: "+mats.bottom+"cm Bottom: "+mats.top);
	// $('#mats_color').text('color');
}

function getClickPosition(e) {
	var theThing = document.querySelector("#frameCanvas #originalImage");

    var parentPosition = getPosition(e.currentTarget);
    var xPosition = e.clientX - parentPosition.x - ((theThing.clientWidth /*+ theThing.style.borderWidth.split('px')[0]*2*/) / 2);
    var yPosition = e.clientY - parentPosition.y - ((theThing.clientHeight /*+ theThing.style.borderWidth.split('px')[0]*2*/) / 2);
    console.log("Mouse Position"+(e.clientX - parentPosition.x)+"Client Width: "+theThing.clientWidth+"border Width: "+theThing.style.borderWidth.split('px')[0])
    console.log("Mouse Position"+(e.clientY - parentPosition.y)+"Client Height: "+theThing.clientHeight+"border Width: "+theThing.style.borderWidth.split('px')[0])
     
	console.log(xPosition+" "+yPosition);

    theThing.style.left = xPosition + "px";
    theThing.style.top = yPosition + "px";
}
 
// Helper function to get an element's exact position
function getPosition(el) {
  var xPos = 0;
  var yPos = 0;
 
  while (el) {
    if (el.tagName == "BODY") {
      // deal with browser quirks with body/window/document and page scroll
      var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
      var yScroll = el.scrollTop || document.documentElement.scrollTop;
 
      xPos += (el.offsetLeft - xScroll + el.clientLeft);
      yPos += (el.offsetTop - yScroll + el.clientTop);
    } else {
      // for all other non-BODY elements
      // console.log(el);
      xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
      yPos += (el.offsetTop - el.scrollTop + el.clientTop) + 50;
    }
 
    el = el.offsetParent;
  }
  return {
    x: xPos,
    y: yPos
  };
}

String.prototype.toCamel = function(){
	return this.substr(0,1).toUpperCase().concat(this.substr(1));
}