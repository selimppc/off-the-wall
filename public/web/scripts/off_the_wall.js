// All products menu show-hide
$(document).ready(function() {
      $(".header .fa-bars").click(function() {
	  	$("#home_product_list").slideToggle("slow", function() {
	  		$(this).toggleClass("nav-expanded").css('display', '');
	  	});
	});
});
