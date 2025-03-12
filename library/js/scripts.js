// JM_Villas

// @codekit-prepend "jquery.js"
// @codekit-prepend "jquery-ui.js"
// @codekit-prepend "jquery.easing.1.3.min.js"
// @codekit-prepend "jquery.bxslider.min.js"
// @codekit-prepend "picturefill.js"
// @codekit-prepend "strip.pkgd.min.js"
// @codekit-prepend "masonry.pkgd.min.js"
// @codekit-prepend "hover.js"


/*
Bones Scripts File
Author: Eddie Machado
Modified: Gerardo Vidal

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

var size;
var prevSize;
var $villaContent;

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
	//window.getComputedStyle = function(el, pseudo) {
	window.getComputedStyle = function(el, pseudo) {
		this.el = el;
		this.getPropertyValue = function(prop) {
			var re = /(\-([a-z]){1})/g;
			if (prop === 'float')
			{
				prop = 'styleFloat';
			}
			if (re.test(prop)) {
				prop = prop.replace(re, function () {
					return arguments[2].toUpperCase();
				});
			}
			return el.currentStyle[prop] ? el.currentStyle[prop] : null;
		};
		return this;
	};
}
// function fb_share(url){  
// 	var sharer = "https://www.facebook.com/sharer/sharer.php?u=";
// 	window.open(sharer + url, 'sharer', 'width=626,height=436');
// }
// as the page loads, call these scripts

jQuery(document).ready(function($) {


	/*
	Responsive jQuery is a tricky thing.
	There's a bunch of different ways to handle
	it, so be sure to research and find the one
	that works for you best.
	*/
	
	/* if is below 481px */
	if (size < 481) {
	
	} /* end smallest screen */
	
	/* if is larger than 481px */
	if (size > 481) {
		
	} /* end larger than 481px */
	
	/* if is above or equal to 768px */
	if (size >= 768) {
	
		/* load gravatars */
		$('.comment img[data-gravatar]').each(function(){
			$(this).attr('src',$(this).attr('data-gravatar'));
		});
		
	}
	
	/* off the bat large screen actions */
	if (size > 1030) {
		
	}

	

	
}); /* end of as page load scripts */

/*
function debouncer( func , timeout ) {
   var timeoutID , timeout = timeout || 50;
   return function () {
	  var scope = this , args = arguments;
	  clearTimeout( timeoutID );
	  timeoutID = setTimeout( function () {
		  func.apply( scope , Array.prototype.slice.call( args ) );
	  } , timeout );
   };
}
*/

function super_hover () {
	$('.main_menu> .menu-item').hoverIntent(
	{
		over:function()
		{
			$('> .sub-menu', this).slideToggle();
			$(this).addClass('menu_active');
		}, out:function()
		{
			$('> .sub-menu', this).slideToggle();
			$(this).removeClass('menu_active');
		}, timeout:100
	});
}

/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
	var doc = w.document;
	if( !doc.querySelector ){ return; }
	var meta = doc.querySelector( "meta[name=viewport]" ),
		initialContent = meta && meta.getAttribute( "content" ),
		disabledZoom = initialContent + ",maximum-scale=1",
		enabledZoom = initialContent + ",maximum-scale=10",
		enabled = true,
		x, y, z, aig;
	if( !meta ){ return; }
	function restoreZoom(){
		meta.setAttribute( "content", enabledZoom );
		enabled = true; }
	function disableZoom(){
		meta.setAttribute( "content", disabledZoom );
		enabled = false; }
	function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
		if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );


// 
// Functions JM Villas
// Author: Gerardo Vidal
// 


document.createElement( "picture" );
var slider__home;
var slider__villa;
var villa__related;
var args_slider__home;
var args_slider__villa;
var args_villa__related;

// var slider_pager = document.querySelector(".js-slider-pager");
// var slider_header = document.querySelector(".js-slider--header");

// Funcions generales

function hasClass(el, cls)
{
	return el.className && new RegExp("(\\s|^)" + cls + "(\\s|$)").test(el.className);
}

function insertAfter(newNode, referenceNode)
{
	referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function getOffsetTop( obj )
{
	var curtop = 0;
	if (obj.offsetParent) {
		do {
			curtop += obj.offsetTop;
		} while (obj = obj.offsetParent);
		return curtop;
	}
}

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

// Funcions específicas

function archive ()
{
	var content_archive = document.querySelector(".archive__destinations");
	var ad__sidebar = document.querySelector(".js-archive__destinations--sidebar");

	if ( content_archive && size > 800 )
	{

		// var columna = hijos_num / 3;
		// columna = columna.toFixed();
		// columna = parseInt(columna);

		var hijos = content_archive.querySelectorAll(".destinationsArchive");

		var hijos_num = hijos.length;

		var altos = [];
		var altos_excerpt = [];

		for (var h=0, j=hijos_num; h<j; h++ ) {
			var alto = Math.max( hijos[h].clientHeight, hijos[h].scrollHeight, hijos[h].offsetHeight );
			altos.push(alto);
			var excerpt = hijos[h].querySelector(".destinationsArchive--resumen");
			var alto_excerpt = Math.max( excerpt.clientHeight, excerpt.scrollHeight, excerpt.offsetHeight );
			altos_excerpt.push(alto_excerpt);
		}

		var alto_max = Math.max.apply( Math, altos );
		var alto_excerpt_max = Math.max.apply( Math, altos_excerpt );

		for (var k=0, l=hijos_num; k<l; k++ ) {
			var excerpt_mod = hijos[k].querySelector(".destinationsArchive--resumen");
			excerpt_mod.style.height = alto_excerpt_max + "px";
		}

		// content_archive.style.height = (columna*alto_max)+"px";

		ad__sidebar.style.height = ( ( alto_max * 2 ) ) + "px";

	}
}

function center_map( map )
{
	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length === 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}
}

function add_marker( $marker, map )
{

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}
}

function forms()
{

	$('.input-range').each(function( ) {
		var value = $(this).next();

		value.html($(this).attr('value'));

		$(this).on('input', function(){
			value.html(this.value);
		}); 
	});
}

function menu_archive ()
{
	var div_main_menu = document.querySelector("div.main_menu");

	if (div_main_menu)
	{
		var ul = div_main_menu.querySelector("ul");
		ul.setAttribute("id", "menu-jm-villas-menu");
		ul.classList.add("main_menu");

		var has_children = ul.querySelectorAll(".page_item");

		Array.prototype.forEach.call(has_children, function(li)
		{
			
			li.classList.add("menu-item");
			if ( hasClass(li, 'page_item_has_children') )
			{
				li.classList.add("menu-item-has-children");
				var submenu = li.querySelector(".children");
				submenu.classList.add("sub-menu");
				submenu.classList.remove("children");
			}
		});

		div_main_menu.classList.remove("main_menu");
	}
	
	super_hover();
}

function refineSearch ()
{
	var sidebar_search = document.querySelector(".js-sidebar--search");
	if (sidebar_search)
	{
		var rs__destination = document.querySelector(".js-rs__destination");
		var rs__number = document.querySelector(".js-rs__number");
		var rs__btn = document.querySelector(".js-refineSearch");
		var rs__home = document.querySelector(".js-rs__home");
		var rs__url__home = rs__home.value;
		var rs__dest = "";
		var rs__url__dest = "";
		var rs__num = "";
		var rs__url__num = "";
		var rs__url = "";

		rs__destination.addEventListener('change', function(){
			rs__dest = this.value;
			url__refineSearch();
		});
		rs__number.addEventListener('change', function(){
			rs__num = this.value;
			url__refineSearch();
		});


	}

	function url__refineSearch () {

		rs__url__dest = ( rs__dest === "") ? "" : "Destinations/" + rs__dest;

		if (rs__dest === "")
		{
			rs__url__num = ( rs__num === "") ? "" : "villa/?bedrooms=" + rs__num;
		}
		else
		{
			rs__url__num = ( rs__num === "") ? "" : "?bedrooms=" + rs__num;
		}

		if (rs__num === "")
		{
			rs__url__dest = ( rs__dest === "") ? "" : "destinations/" + rs__dest;
		}
		else
		{
			rs__url__dest = ( rs__dest === "") ? "" : "Destinations/" + rs__dest;
		}

		rs__url = rs__url__home + "/" + rs__url__dest + rs__url__num;
		rs__btn.setAttribute("href", rs__url);
	}
}

function render_map( $el )
{

	// var
	var $markers = $el.find('.marker');

	// vars
	var args = {
		zoom		: 12,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};

	// create map	        	
	var map = new google.maps.Map( $el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(){

    	add_marker( $(this), map );

	});

	// center map
	center_map( map );
}

function singles ()
{
	var hrefs = [];
	$( '.js-strip' ).each(function()
	{
		var href = $(this).attr('href');
		hrefs.push(href);

		$(this).on('click', function(event) {
			event.preventDefault();
			var ind = $( '.js-strip' ).index( $(this) );
			ind++;
			Strip.show(hrefs, {
				side: 'left',
				onShow: function() {
					slider__villa.stopAuto();
				},
				afterHide: function() {
					slider__villa.startAuto();
				},
				afterPosition: function(position) {
					slider__villa.goToSlide(position - 1);
				}
			}, ind);
		});
	});


	$villaContent = $('.js-villa--content').masonry({
		itemSelector: '.villa--block',
		gutter: '.gutter-sizer',
		columnWidth: '.grid-sizer',
		percentPosition: true
		// percentPosition: true
	});

	var btn_descripcion = document.querySelector(".js-villa--descripcion__full--btn");
	if ( btn_descripcion )
	{
		
		var descripcion = document.querySelector(".js-villa--descripcion__full");

		btn_descripcion.addEventListener('click', function()
		{

			var readmore = document.querySelector(".js-descripcion__full--readMore");
			var className = "hide";
			var signo = readmore.previousElementSibling;

			if (descripcion.classList)
			{
				descripcion.classList.toggle(className);

				if ( hasClass(descripcion, className) )
				{
					readmore.textContent = '[ read more ]';
					signo.style.display = "inline-block";
				}
				else
				{
					readmore.textContent = '[ hide ]';
					signo.style.display = "none";
				}
			}
			setTimeout(function(){

				$villaContent.masonry('layout');
				console.log("Re-masonry");

			}, 250);

			setTimeout(function(){

				var altura = getOffsetTop( descripcion );

				$('html, body').stop().animate({
					scrollTop: altura
				}, 300, 'easeInOutExpo');

			}, 300);
		});
	}
}

function sliders_teclas () {

	$(document).keydown(function(e){

		if (e.keyCode === 39)
		{
			if ( slider__home.length > 0 )
			{
				slider__home.goToNextSlide();
			}
			if ( slider__villa.length > 0 )
			{
				slider__villa.goToNextSlide();
			}
			return false;
		}
		else if (e.keyCode === 37)
		{
			if ( slider__home.length > 0 )
			{
				slider__home.goToPrevSlide();
			}
			if ( slider__villa.length > 0 )
			{
				slider__villa.goToPrevSlide();
			}

			return false;
		}

	});
}

function sliders( rsz )
{
	// 
	// Variables de los sliders
	// 
	var args_slider__home = {
		auto:true,
		autoHover:true,
		infiniteLoop: true,
		pager:true,
		responsive:true,
		startSlide:0,
		useCSS:false,
		onSliderLoad: function() {
			$(".js-slider__home").css(
				"-webkit-transform",
				"translate3d(-" + size + "px, 0, 0) !important"
			);
		}
	};
	var args_villa__related = {
		slideWidth: 326,
		moveSlides: 1,
		maxSlides: 3,
		slideMargin: 22,
		pager:false,
		infiniteLoop:true,
		responsive:true,
		startSlide:0,
		useCSS:false,
		onSliderLoad: function() {
			$(".js-slider__home").css(
				"-webkit-transform",
				"translate3d(-" + size + "px, 0, 0) !important"
			);
		}
	};
	var args_slider__villa = {
		auto:true,
		autoHover:true,
		infiniteLoop:true,
		pager:true,
		responsive:true,
		startSlide:0,
		useCSS:false,
		onSliderLoad: function() {
			$(".js-slider__home").css(
				"-webkit-transform",
				"translate3d(-" + size + "px, 0, 0) !important"
			);
		}
	};

	// 
	// Generar sliders.
	// 

	slider__home = $(".js-slider__home").bxSlider(args_slider__home);
	slider__villa = $(".js-slider__villa").bxSlider(args_slider__villa);
	villa__related = $(".js-villa--related").bxSlider(args_villa__related);

	// 
	// Teclas para los sliders
	// 
	sliders_teclas();
}

function social()
{
	var twitter_popup = document.querySelector(".js-twitter_popup");
	var gplus_popup = document.querySelector(".js-gplus_popup");
	var fb_popup = document.querySelector(".js-fb_popup");
	var pinterest_popup = document.querySelector(".js-pinterest_popup");
	var win_Width = window.innerWidth;
	var win_Height = window.innerHeight;
	if (twitter_popup)
	{
		twitter_popup.onclick = function ()
		{
			var width  = 575,
			height = 400,
			left   = (win_Width - width)  / 2,
			top    = (win_Height - height) / 2,
			url    = this.href,
			opts   = 'status=1' +
				',width='  + width  +
				',height=' + height +
				',top='    + top    +
				',left='   + left;
			window.open(url, 'twitter', opts);

			return false;
		};
	}
	if (gplus_popup)
	{
		gplus_popup.onclick = function ()
		{
			var width  = 575,
			height = 400,
			left   = (win_Width - width)  / 2,
			top    = (win_Height - height) / 2,
			url    = this.href,
			opts   = 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,' +
				',width='  + width  +
				',height=' + height +
				',top='    + top    +
				',left='   + left;
			window.open(url,'', opts);
			return false;
		};
	}
	if (fb_popup)
	{
		fb_popup.onclick = function ()
		{
			var width  = 575,
			height = 400,
			left   = (win_Width - width)  / 2,
			top    = (win_Height - height) / 2,
			url    = this.href,
			opts   = 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,' +
				',width='  + width  +
				',height=' + height +
				',top='    + top    +
				',left='   + left;
			window.open(url,'', opts);
			return false;
		};
	}
	if (pinterest_popup)
	{
		pinterest_popup.onclick = function ()
		{
			var width  = 575,
			height = 400,
			left   = (win_Width - width)  / 2,
			top    = (win_Height - height) / 2,
			url    = this.href,
			opts   = 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,' +
				',width='  + width  +
				',height=' + height +
				',top='    + top    +
				',left='   + left;
			window.open(url,'', opts);
			return false;
		};
	}
}

var resize_fnc = debounce(function() {

	if ( size != jQuery(window).width() )
	{
		size = jQuery(window).width();
		archive();
		$villaContent.masonry('layout');

	}

}, 250);

window.addEventListener('resize', resize_fnc);

document.addEventListener('DOMContentLoaded', function(){
	prevSize = size = jQuery(window).width();

	refineSearch();
	archive();
	sliders();
	menu_archive();
	forms();
	social();
	singles();

	$('.js-villa--map').each(function(){
		render_map( $(this) );
	});

	$(function() {
		$( "#trip-date-checkIn" ).datepicker({ minDate: 0, maxDate: "+3Y" });
		$( "#trip-date-checkOut" ).datepicker({ minDate: 0, maxDate: "+3Y" });
	});
});