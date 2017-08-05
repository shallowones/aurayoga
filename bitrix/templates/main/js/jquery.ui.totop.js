/*
|--------------------------------------------------------------------------
| UItoTop jQuery Plugin 1.2 by Matt Varone
| http://www.mattvarone.com/web-design/uitotop-jquery-plugin/
|--------------------------------------------------------------------------
*/
(function($){
	$.fn.UItoTop = function(options) {

 		var defaults = {
    			text: 'To Top',
    			min: 200,
    			inDelay:300,
    			outDelay:200,
      			containerID: 'toTop',
    			containerHoverID: 'toTopHover',
    			scrollSpeed: 1200,
    			easingType: 'linear'
 		    },
            settings = $.extend(defaults, options),
            containerIDhash = '#' + settings.containerID,
            containerHoverIDHash = '#'+settings.containerHoverID;
		
		$('body').append('<div id="'+settings.containerID+'"><div id="'+settings.containerID+'__width"><a href="#" id="'+settings.containerID+'__link">'+settings.text+'</a></div></div>');
		$(containerIDhash).hide().on('click.UItoTop',function(){
			$('html, body').animate({scrollTop:0}, settings.scrollSpeed, settings.easingType);
			$('#'+settings.containerHoverID, this).stop().animate({'opacity': 0 }, settings.inDelay, settings.easingType);
			return false;
		})
		.prepend('<span id="'+settings.containerHoverID+'"></span>')
		.hover(function() {
				$(containerHoverIDHash, this).stop().animate({
					'opacity': .8
				}, 500, 'linear');
			}, function() { 
				$(containerHoverIDHash, this).stop().animate({
					'opacity': 0
				}, 500, 'linear');
			});
					
		$(window).scroll(function() {
			var sd = $(window).scrollTop();
			if(typeof document.body.style.maxHeight === "undefined") {
				$(containerIDhash).css({
					'position': 'absolute',
					'top': sd + $(window).height() - 80
				});
			}
			var tobtm = $('#toBottom #toBottom__link');
			if ( sd > settings.min ) {
				$(containerIDhash).show(); //fadeIn(settings.inDelay);
				if (tobtm.is(':visible')) {
					tobtm.addClass('double');
					$('#toTop #toTop__link').addClass('double');
				}
			}
			else {
				$(containerIDhash).hide(); //fadeOut(settings.Outdelay);
				tobtm.removeClass('double');
			}
		});
};
	$.fn.UItoBottom = function(options) {

 		var defaults = {
    			text: 'To Bottom',
    			min: 200,
    			inDelay:300,
    			outDelay:200,
      			containerID: 'toBottom',
    			containerHoverID: 'toBottomHover',
    			scrollSpeed: 1200,
    			easingType: 'linear'
 		    },
            settings = $.extend(defaults, options),
            containerIDhash = '#' + settings.containerID,
            containerHoverIDHash = '#'+settings.containerHoverID;
		
		$('body').append('<div id="'+settings.containerID+'"><div id="'+settings.containerID+'__width"><a href="#" id="'+settings.containerID+'__link">'+settings.text+'</a></div></div>');
		$(containerIDhash).hide().on('click.UItoBottom',function(){
			var vk = $('#vk_comments_news');
			var btm = (vk.length > 0) ? vk.offset().top - 51 : $(document).height()-$(window).height();
			$('html, body').animate({scrollTop:btm}, settings.scrollSpeed, settings.easingType);
			$('#'+settings.containerHoverID, this).stop().animate({'opacity': 0 }, settings.inDelay, settings.easingType);
			return false;
		})
		.prepend('<span id="'+settings.containerHoverID+'"></span>')
		.hover(function() {
				$(containerHoverIDHash, this).stop().animate({
					'opacity': .8
				}, 500, 'linear');
			}, function() { 
				$(containerHoverIDHash, this).stop().animate({
					'opacity': 0
				}, 500, 'linear');
			});
					
		$(window).scroll(function() {
			var sd = $(window).scrollTop();
			if(typeof document.body.style.maxHeight === "undefined") {
				$(containerIDhash).css({
					'position': 'absolute',
					'top': sd + $(window).height() - 40
				});
			}
			var totop = $('#toTop #toTop__link');
			var vk = $('#vk_comments_news');
			var btm = (vk.length > 0) ? vk.offset().top-$(window).height()-51 : $(document).height()-$(window).height()-settings.min;
			if ( sd < btm ) {
				$(containerIDhash).show(); //fadeIn(settings.inDelay);
				if (totop.css('bottom', 50).is(':visible')) {
					totop.addClass('double');
					$('#toBottom #toBottom__link').addClass('double');
				}
			}
			else {
				$(containerIDhash).hide(); //fadeOut(settings.Outdelay);
				totop.css('bottom', 10).removeClass('double');
			}
		});
};
})(jQuery);