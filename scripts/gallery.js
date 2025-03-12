function tutorial_create_slideshow() {
 
	// Remove the HTML tags generated in the gallery.
	jQuery('.single-format-gallery style').remove();
	jQuery('.gallery br').remove();
 
	// Wrap the gallery.
	jQuery('.gallery').wrap('<div class="gallery-wrap">');
 
	// Add the slideshow controller.
	jQuery('.gallery-wrap').append('<div id="slideshow-controller"><span id="jqc-pages"></span></div>');
 
	// Add the controls.
	jQuery('#slideshow-controller').prepend('<button class="dir-button dir-button-l" id="jqc-prev" href="#">&laquo;</button>');
	jQuery('#slideshow-controller').append('<button class="dir-button dir-button-r" id="jqc-next" href="#">&raquo;</button>');
 
	jQuery('.gallery').cycle({
		fx                : 'fade',
		speed             : 1000,
		timeout           : 3000,
		cleartypeNoBg     : true,
		activePagerClass  : 'jqc-active',
		pager             : '#jqc-pages',
		prev              : '#jqc-prev',
		next              : '#jqc-next',
		pause             : true,
		pagerAnchorBuilder: function (index,elem) {
			return '<button class="jqc-button jqc-button-pages" id="jqc-button-' + index + '" value="' + index + '"><span>' + (index+1) + '</span></button>';
		}
 	});
}
 
jQuery(document).ready(function() {
	jQuery.noConflict();
	tutorial_create_slideshow();
});