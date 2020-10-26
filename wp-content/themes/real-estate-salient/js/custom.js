jQuery(document).ready(function () {
jQuery(window).load(function() {
 jQuery('.flexslider').flexslider({
    animation: "slide",
    controlsContainer: jQuery(".custom-controls-container"),
    customDirectionNav: jQuery(".custom-navigation a")
  });
});

jQuery('#menu').slicknav({
	label: '',
	duration: 300,	
	prependTo:'.logo-area'
});
});