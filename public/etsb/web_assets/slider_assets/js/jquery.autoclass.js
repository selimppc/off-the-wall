/*
== plugin name : jQuery.autoClass
== version : 1.0
== author name : ariful islam
== author skype : arifulislam470
== author mail : dhimanworld470@gmail.com

*/


jQuery.fn.autoClass = function( classIn, classOut ){
	if ( this.offset() == undefined ) {
		return false;
	};
	var $ = jQuery,
		ele = this,
		offsetTop = ele.offset().top,
		winHeight = $(window).height(),
		counter = 0;
	if ( offsetTop > winHeight ) {
		ele.addClass(classOut);
	} else {
		ele.addClass(classIn);
	};
	$(window).scroll(function(){
		var eleHeight = ele.outerHeight(),
			offsetTop = ele.offset().top,
			scrollTop = $(this).scrollTop(),
			topArea = ( ( offsetTop + eleHeight ) - scrollTop ),
			bottomArea = ( offsetTop - ( scrollTop + winHeight ) );

		if ( ( topArea < counter ) || ( bottomArea > counter ) ) {
			animateHide();
		} else if ( ( topArea > counter ) || ( bottomArea < counter ) ) {
			animateShow();
		};

		function animateHide() {
			ele.removeClass( classIn ).addClass( classOut );
		};
		function animateShow() {
			ele.removeClass( classOut ).addClass( classIn );
		};
	});
};