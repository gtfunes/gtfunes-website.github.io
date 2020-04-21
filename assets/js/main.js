(function($) {
	"use strict";

	$(function() {
		var	$window = $(window), $body = $('body');

		// Disable animations/transitions until the page has loaded.
		$body.addClass('is-loading');

		$window.on('load', function() {
			$body.removeClass('is-loading');

			if ($('.console').is(":visible")) {
				// Typed text
				$('#console-text').typed({
		        	strings: ['sudo rm -rf /*', 'find /var/log -readable -ls', 'sleep 365d', 'nmap --open -p T:22 192.168.1.0/24', 'grep -L \'<?php\' *.php', 'while true; do echo "Hey look shells." ; sleep 1 ; done', 'while true;do iwlist wlan0 scan |awk -F\" \'/ESSID/{print $2}\' |espeak;done'],
		            typeSpeed: 50,
		            startDelay: 1500,
		            backDelay: 2000,
		            backSpeed: 100,
		            loop: true,
		            loopCount: false,
		            showCursor: true,
		            cursorChar: '|',
		            attr: null,
		            contentType: 'text',
		            shuffle: true,
		            callback: function() { }
		        });
	        }
		});
	});
})(jQuery);
