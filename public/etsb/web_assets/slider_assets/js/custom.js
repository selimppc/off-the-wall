
$.noConflict();

jQuery(document).ready(function($){
	
	$('.file_a').hide();
	$('.file_b').hide();
	
	$('.file_a').addClass('.fuckyou');
	$('.file_b').addClass('.fuckyou');
	
	$('input[type=file]').bootstrapFileInput();

	$('#submit-order').click(function() {
		$('.submit-order').click();
		return false;
	});
	
	$('#addmorefile').click(function() {
		$('.file_a').show();
		
		if ($('.file_a').hasClass('.fuckyou')){
			$('.file_a').removeClass('.fuckyou');
			$('.file_a').show();
			
		} 
		else {
			$(".file_b").removeClass(".fuckyou");
			$('.file_b').show();
		  }
		return false;
	});

	
	$('#submit_coupon_code').click(function() {
		var c_code = $(this).parent().find('input').val();
		$('input.coupon_code_input').val(c_code);
		$('#submit_coupon').click();
		return false;
	});


	// layer slider
	$('#slider').layerSlider({
	 
	    autoStart               : true,
	    firstLayer              : 1,
	    twoWaySlideshow         : false,
	    keybNav                 : true,
	    touchNav                : true,
	    imgPreload              : true,
	    navPrevNext             : true,
	    navStartStop            : true,
	    navButtons              : true,
	    skin                    : 'default',
	    skinsPath               : '/layerslider/skins/',
	    pauseOnHover            : true,
	    globalBGColor           : 'transparent',
	    globalBGImage           : false,
	    animateFirstLayer       : false,
	    yourLogo                : false,
	    yourLogoStyle           : 'position: absolute; z-index: 101; left: 10px; top: 10px;',
	    yourLogoLink            : false,
	    yourLogoTarget          : '_blank',
	    loops                   : 0,
	    forceLoopNum            : true,
	    autoPlayVideos          : true,
	    autoPauseSlideshow      : 'auto',
	    youtubePreview          : 'maxresdefault.jpg',
	 
	    // you can change this settings separately by layers or sublayers with using html style attribute
	 
	    slideDirection          : 'right',
	    slideDelay              : 4000,
	    parallaxIn              : .45,
	    parallaxOut             : .45,
	    durationIn              : 1000,
	    durationOut             : 1000,
	    easingIn                : 'easeInOutQuint',
	    easingOut               : 'easeInOutQuint',
	    delayIn                 : 0,
	    delayOut                : 0
	});
	
	// end layer slider
    $('ol.subject li.sub-list-item a').click(function() {
    	$(this).parent().find(".question").slideToggle("500");
    	return false;
    });

    $('ul.question li a').click(function() {
    	$(this).parent().find(".answer").slideToggle("500");
    	var text = $(this).find("span").text();
    	$(this).find("span").text( text == "-" ? "+" : "-");
    	return false;
    });

	// top area slide toggle
	$(".mini").click(function(){
		$(".top-area").slideToggle();
		$(".search-box").hide();
		return false;
	});

	// search box fadding
	$(".search-box").hide();
	$(".search-area").find('a').click(function(){
		$(".search-box").fadeToggle(200);
		$(this).find('i').toggleClass(function() {
			if ($(this).is('.icon-search')) {
				return 'icon-remove';
			} else {
				return 'icon-search';
			}
		});
		return false;
	});

	// $(".sliding").preloader();
	// $(".slider_item_list_sliding").preloader();

	// menu sliding
	if ( $(window).width() > 500 ) {
		$(".main-menu").find("li:has(>ul)").hoverIntent(function(){
			$(this).children("ul").slideDown(400);
		},function(){
			$(this).children("ul").slideUp(400);
		});
	};


	// right to left sliding

	(function rightToLeftSliding(){
		var current = 0,
			slider = {
				slider_area : $(".transition-area"),
				slider_dir : $(".transition-dir"),
				slider_item_area : $(".transition-here"),
				speed : 800,
				effect : ""
			};

		slider.slider_area.each(function(){
			var $this = $(this);

			$this.find(slider.slider_item_area).children("li").eq(0).addClass("js").siblings().css("left", "100%");
			$this.find(slider.slider_item_area).css("height",($this.find(slider.slider_item_area).children("li.js").height()));

			$(window).resize(function(){
				$this.find(slider.slider_item_area).css("height",($this.find(slider.slider_item_area).children("li.js").height()));
			});
		})

		slider.slider_dir.find("a").click(function(e){

			if ($(this).attr("disibled")=="disibled") {
				return false;
			};
			e.preventDefault();
			slide($(this));				// slider run
		});

		function slide($this){						// slider run here
			var imgs = $this.closest(slider.slider_area).find(slider.slider_item_area).children("li"),
				imgLength = imgs.length;
			if ( (imgs.length) < 1 ) {
				return false;
			};
			
			imgs.each(function(){
				if ($(this).hasClass("js")) {
					current = $(this).index();
				};
			});

			current = (current > (imgLength - 1)) ? 0 : ( (current < 0) ? (imgLength - 1) : current );		//for current
			current = imgTransition(imgs, $this, current, ($this.data("dir") === "next") ? ++current : --current);	//for update
		};

		function imgTransition(list, $this, current, update) {

			if ($this.data("dir")==="next") {
				$(list[current]).css("left","0").siblings().css("left","100%");
			} else {
				$(list[current]).css("left","0").siblings().css("left","-100%");
			};

			var hideItem = $(list[current]);
			update = (update > (list.length-1)) ? 0 : ( (update < 0) ? (list.length-1) : update );
			var showItem = $(list[update]);

			hideSlide($this, hideItem, showItem);
			return update;
		};

		function hideSlide($this, H, S){
			$this.attr("disibled","disibled");
			if (H.hasClass("js")) {
				H.removeClass("js")
			};
			S.addClass("js");
			if ($this.data("dir")==="next") {

				S.parent(slider.slider_item_area).animate({
					"height" : (S.height())
				});

				H.animate({
					"left":"-100%"
				}, slider.speed, slider.effect);
				S.animate({
					"left":"0"
				}, slider.speed, slider.effect, function(){
					$this.removeAttr("disibled");
				})
			} else{

				S.parent(slider.slider_item_area).animate({
					"height" : (S.height())
				});

				H.animate({
					"left":"100%"
				}, slider.speed, slider.effect);
				S.animate({
					"left":"0"
				}, slider.speed, slider.effect, function(){
					$this.removeAttr("disibled");
				})
			};
		};
	})();

	// main slider
	(function main_slider(){

		var current = 0,
			slider = {
			sliding_area : $(".sliding"),
			cursor_sliding_area : $(window),
			sliding_item : $(".sliding li"),
			moving_area : $(".moving"),
			another_moving_area : $('.another_area')
		};
		slider.cursor_sliding_area.mousemove(function(e){
			var page_width = e.pageX;
			slider.moving_area.css("width", page_width );
			slider.another_moving_area.css("width", page_width );
		});
	})();

	$(window).resize(function(){
		sliderImageFix();
	});
	function sliderImageFix() {
		var area =  $('.sliding li');
		var areaWidth = area.width() + 'px';
		var areaHeight = area.height() + 'px';
		var bg = areaWidth+' '+areaHeight;
		area.find('.default').css('backgroundSize' , bg);
		area.find('.moving').css('backgroundSize' , bg);
	};
	sliderImageFix();

	(function custom_isotope(){
		var $container = $('#container'),
			$optionSets = $('.option-set'),
			$optionLinks = $optionSets.find('a');

		$container.isotope({
			itemSelector : '.element'
		});

		$optionLinks.click(function(){

			var $this = $(this);
			// don't proceed if already selected
			if ( $this.hasClass('selected') ) {
			return false;
			};

			var $optionSet = $this.parents('.option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected');

			// make option object dynamically, i.e. { filter: '.my-filter-class' }
			var options = {},
				key = $optionSet.attr('data-option-key'),
				value = $this.attr('data-option-value');

			// parse 'false' as false boolean
			value = value === 'false' ? false : value;
			options[ key ] = value;
			
			if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
				// changes in layout modes need extra logic
				changeLayoutMode( $this, options )
			} else {
				// otherwise, apply new options
				$container.isotope( options );
			};
			return false;
		});
    })();
    (function acco(){
    	$('.sub-cate').hide();
    	$('.blog-cate').find('li:has(.sub-cate)').children('a').addClass('deactive');
    	$('.blog-cate').find('li:has(.sub-cate)').children('a').click(function(){
    		if ( $('.blog-cate').find(':animated').is(':animated') ) {
    			return false;
    		};
    		$(this).toggleClass('active','deactive');
    		$(this).parent().children('.sub-cate').slideToggle(700);
    		if ( !$(this).hasClass('active') ) {
    			$(this).parent().find('.sub-cate').slideUp(700);
    			$(this).parent().find('a.active').removeClass('active').addClass('deactive');
    		};
    		$(this).parent().siblings('li:has(.sub-cate)').find('a.active').removeClass('active').addClass('deactive');
    		$(this).parent().siblings().find('.sub-cate').slideUp(700);
    		return false;
    	});
    })();

    (function tab(){
    	$('.faq-area ul li a').click(function(){
    		$(this).parent().addClass('active').siblings().removeClass('active');
    		var location = '#'+($(this).attr('href'));
    		$(location).show().siblings().hide();
    		return false;
    	});
    })();
    
    if ( $(window).width() > 500 ) {
    	$(function() { $(".lavaLamp").lavaLamp({ fx: "backout", speed: 700 })});
    };

    $.fn.backToTop = function(speedhide){
		var backToTopArea = this;
		var winHeight = $(window).height();
		$(window).scroll(function(){
			if ( !backToTopArea.hasClass('visible')) {
				if ( $(window).scrollTop() > winHeight ) {
					backToTopArea.animate({
						'right' : '10px'
					}, speedhide || 0).addClass('visible');
				};
			} else {
				if ( $(window).scrollTop() < winHeight ) {
					backToTopArea.animate({
						'right' : '-60px'
					}, speedhide || 0).removeClass('visible');
				};
			};
		});
		backToTopArea.click(function(){
			if ( $('body,html').is(':animated') ) {
				return false;
			};
			if ( $(window).scrollTop() == 0 ) {
				return false;
			};
			$('body,html').animate({
				scrollTop : '0px',
			},1500);
			return false;
		});
	};
	$('#back-to-top').backToTop();

	(function fixedmenu() {
		var firstArea = $('.top-area');
		var secondArea = $('.head-area');
		var thirdArea = $('.fixed-area');

		var headerArea = $('header#header');
		var handelar = $('.top-area-controller');

		var firstAreaHeight = firstArea.height();
		var secondAreaHeight = secondArea.height();

		var thirdAreaHeight = thirdArea.height();
		var secondAreaHeight_02 = ( secondAreaHeight - 12 );

		headerArea.css('height','auto').append('<div class="first"></div><div class="second"></div>');
		$('.first').css('height',thirdAreaHeight);
		$('.second').css('height',secondAreaHeight);

		$(window).scroll(function(){
			var scrollAmount = $(this).scrollTop();
			(scrollAmount > firstAreaHeight) ? hideArea() : showArea();
			callSearchBox();
		});
		handelar.click(function(){
			( firstArea.css('display') == 'block' ) ? hideArea() : showArea();
			callSearchBox();
		});
		function callSearchBox() {
			if ( $(".search-box").css('display') == 'block' ) {
				$(".search-box").hide();
				$(".search-box").parent().find('i').removeClass('icon-remove');
			};
		};

		function hideArea() {
			firstArea.slideUp(300);
			$('.logo a').css({
				'width' : '260px',
				'height' : '48px'
			});
			$('.main-menu').css({
				'margin-top' : '0px'
			});
			handelar.find('p').text('+');
			$('.first').slideUp(300);
			$('.second').css('height',secondAreaHeight_02);
		};
		function showArea() {
			firstArea.slideDown(300);
			$('.logo a').css({
				'width' : '300px',
				'height' : '50px'
			});
			$('.main-menu').css({
				'margin-top' : '12px'
			});
			handelar.find('p').text('-');
			$('.first').slideDown(300);
			$('.second').css('height',secondAreaHeight);
		};
	})();

	$.fn.menu = function(){
		var mainMenu = this;
		mainMenu.parent().prepend('<div class="menu-controll"><p>+</p></div>');
		var controler = mainMenu.parent().find('.menu-controll p');
		controler.click(function(){
			if ( mainMenu.parent().find(':animated').is(':animated') ) {
				return false;
			};
			mainMenu.slideToggle(767);
			var text = $(this).text();
    		$(this).text( text == "-" ? "+" : "-");
		});
		var a =1;
		var b =1;
		$(window).resize(function(){
			if ( ( $(window).width() > 767 ) && ( a ==1 ) ) {
				mainMenu.slideDown(0);
				a++;
				b=1;
			};
			if ( ( $(window).width() <= 767 ) && ( b ==1 ) ) {
				mainMenu.slideUp(0);
				b++;
				a=1;
			};
		});
	};
	$('.main-menu').menu();
	$('.top-menu').menu();
	$('.main-menu').find('li:has(ul)').children('a').click(function(){
		$(this).parent().children('ul').slideToggle(200);
		return false;
	});

	$('#logo-values li').each(function(){
		$(this).find('.ui-slider').slider();
	});

	// jQuery('.fetch-ftp').click(function(){
	// 	jQuery('#fetch-ftp').slideToggle(400);
	// });


	function chk_required(selector) {
		var item_val = jQuery(selector).val() == ''?false:true;
		if (item_val==false) {
			jQuery(selector).addClass('input-error');
			return false;
		};
		jQuery(selector).removeClass('input-error');
		return true;
	}

	jQuery('.check_status').click(function() {
		var not_blank = false;
		not_blank = chk_required('input[name="ftp_server"]');
		not_blank = chk_required('input[name="ftp_user"]');
		not_blank = chk_required('input[name="ftp_pass"]');
		not_blank = chk_required('input[name="ftp_directory"]');

		if (not_blank == false) {
			$("#fetch_msg_box").hide();
			$("#fetch_msg_box").html('<div class="alert alert-error required_msg">Please enter your FTP information first!</div>');
			$("#fetch_msg_box").slideDown(500);
			return false;
		};

        jQuery.ajax({
            type: "POST",
            data: jQuery('#fetch-ftp-model').find('form').serialize(),
            url: jQuery('#fetch-ftp-model').find('form').attr('action')+'/check_status',
            beforeSend: function() {
                jQuery("#fetch_msg_box").html("<div class='alert alert-info'>Please wait while checking your ftp connection!</div>");
            },
            success: function( data ) {
            	console.log(data);
                jQuery("#fetch_msg_box").html( data );
            }
        });
        return false;
	});

	jQuery('#fetch-ftp-submit').click(function() {
		var not_blank = false;
		not_blank = chk_required('input[name="ftp_server"]');
		not_blank = chk_required('input[name="ftp_user"]');
		not_blank = chk_required('input[name="ftp_pass"]');
		not_blank = chk_required('input[name="ftp_directory"]');

		if (not_blank == false) {
			$("#fetch_msg_box").hide();
			$("#fetch_msg_box").html('<div class="alert alert-error required_msg">Please enter your FTP information first!</div>');
			$("#fetch_msg_box").slideDown(500);
			return false;
		};

        jQuery.ajax({
            type: "POST",
            data: jQuery('#fetch-ftp-model').find('form').serialize(),
            url: jQuery('#fetch-ftp-model').find('form').attr('action')+'/',
            beforeSend: function() {
                jQuery("#fetch_msg_box").html("<div class='alert alert-info'>Please wait while tranfering your ftp connection!</div>");
            },
            success: function( data ) {
            	console.log(data);
                jQuery("#fetch_msg_box").html( data );
            }
        });
        return false;
	});

	jQuery('#add_default_instruction').click(function() {
		
        jQuery.ajax({
            type: "POST",
            url: base_url+'order/add_default_instruction/',
            beforeSend: function() {
                // jQuery("#fetch_msg_box").html("<div class='alert alert-info'>Please wait while tranfering your ftp connection!</div>");
            },
            success: function( data ) {
            	console.log(data);
                jQuery("#todo_note").text( data );
            }
        });
        return false;
	});

	jQuery('.image_preview_box').click(function() {
		console.log($(this).attr('class'));
		
        jQuery.ajax({
            type: "POST",
            url: base_url+'order/make_image_preview/',
            beforeSend: function() {
                // jQuery("#fetch_msg_box").html("<div class='alert alert-info'>Please wait while tranfering your ftp connection!</div>");
            },
            success: function( data ) {
            	console.log(data);
                jQuery(".image_preview_box").html( data );
            }
        });
        return false;
	});

	//jQuery(".edit_img").popover({html:true, placement:'top'});

	$(".edit_img").click(function(event) {
		return false;
	});



	$('.paid-status-col').click(function(e){
		e.preventDefault();
		var text = $(this).text();
		$(this).text( text == "+" ? "-" : "+");

		$(this).closest('.paid-status-img-bar-area').find('.paid-status-img').slideToggle();
	});

	$('.have-coupon-label').find('input').on('change', function(){
		$('.have-coupon-input').toggleClass('active');
	});

	
	

	$('.js-ok').click(function(e){
		e.preventDefault();
		$(this).closest('.img-item').addClass('st-ok').removeClass('st-cancel');
	});

	$('.js-cancel').click(function(e){
		e.preventDefault();
		$(this).closest('.img-item').addClass('st-cancel').removeClass('st-ok');
	});
});