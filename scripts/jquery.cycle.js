/*!
 * jQuery Cycle Plugin (with Transition Definitions)
 * Examples and documentation at: http://jquery.malsup.com/cycle/
 * Copyright (c) 2007-2012 M. Alsup
 * Version: 2.9999.81 (15-JAN-2013)
 * Dual licensed under the MIT and GPL licenses.
 * http://jquery.malsup.com/license.html
 * Requires: jQuery v1.7.1 or later
 */
;(function($, undefined) {
"use strict";

var ver = '2.9999.81';

function debug(s) {
    if ($.fn.cycle.debug)
        log(s);
}        
function log() {
    if (window.console && console.log)
        console.log('[cycle] ' + Array.prototype.join.call(arguments,' '));
}
$.expr[':'].paused = function(el) {
    return el.cyclePause;
};


// the options arg can be...
//   a number  - indicates an immediate transition should occur to the given slide index
//   a string  - 'pause', 'resume', 'toggle', 'next', 'prev', 'stop', 'destroy' or the name of a transition effect (ie, 'fade', 'zoom', etc)
//   an object - properties to control the slideshow
//
// the arg2 arg can be...
//   the name of an fx (only used in conjunction with a numeric value for 'options')
//   the value true (only used in first arg == 'resume') and indicates
//    that the resume should occur immediately (not wait for next timeout)

$.fn.cycle = function(options, arg2) {
    var o = { s: this.selector, c: this.context };

    // in 1.3+ we can fix mistakes with the ready state
    if (this.length === 0 && options != 'stop') {
        if (!$.isReady && o.s) {
            log('DOM not ready, queuing slideshow');
            $(function() {
                $(o.s,o.c).cycle(options,arg2);
            });
            return this;
        }
        // is your DOM ready?  http://docs.jquery.com/Tutorials:Introducing_$(document).ready()
        log('terminating; zero elements found by selector' + ($.isReady ? '' : ' (DOM not ready)'));
        return this;
    }

    // iterate the matched nodeset
    return this.each(function() {
        var opts = handleArguments(this, options, arg2);
        if (opts === false)
            return;

        opts.updateActivePagerLink = opts.updateActivePagerLink || $.fn.cycle.updateActivePagerLink;
        
        // stop existing slideshow for this container (if there is one)
        if (this.cycleTimeout)
            clearTimeout(this.cycleTimeout);
        this.cycleTimeout = this.cyclePause = 0;
        this.cycleStop = 0; // issue #108

        var $cont = $(this);
        var $slides = opts.slideExpr ? $(opts.slideExpr, this) : $cont.children();
        var els = $slides.get();

        if (els.length < 2) {
            log('terminating; too few slides: ' + els.length);
            return;
        }

        var opts2 = buildOptions($cont, $slides, els, opts, o);
        if (opts2 === false)
            return;

        var startTime = opts2.continuous ? 10 : getTimeout(els[opts2.currSlide], els[opts2.nextSlide], opts2, !opts2.backwards);

        // if it's an auto slideshow, kick it off
        if (startTime) {
            this.cycleTimeout = setTimeout(function() { go(els, opts2, 0, !opts2.backwards) }, startTime);
        }
    });
};
