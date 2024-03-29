/* Copyright (c) 2008 Kean Loong Tan http://www.gimiti.com/kltan
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * jFlow
 * Version: 1.1 (May 22, 2008)
 * Requires: jQuery 1.2+
 */

//modified by LandRover 30th May 08

(function($) {

	$.fn.jFlow = function(options) {
		var opts = $.extend({}, $.fn.jFlow.defaults, options);
		var cur = 0;
		var timer;
		var selected_class = "jFlowSelected";
		var maxi = $(".jFlowControl").length;
		$(this).find(".jFlowControl").each(function(i){
			$(this).click(function(){
				dotimer();
				
				$(".jFlowControl").removeClass(selected_class);
				$(this).addClass(selected_class);
				//alert(cur);
				//alert(i);
				var dur = Math.abs(cur-i);
				$(opts.slides).animate({
					marginLeft: "-" + (i * $(opts.slides).find(":first-child").width() + "px")
				}, opts.duration*(dur));
				cur = i;
			});
		});	

		$(opts.slides).before('<div id="jFlowSlide"></div>').appendTo("#jFlowSlide");

		$(opts.slides).find("div").each(function(){
			$(this).before('<div class="jFlowSlideContainer"></div>').appendTo($(this).prev());
		});

		//initialize the controller
		$(".jFlowControl").eq(cur).addClass(selected_class);

		var resize = function (x){
			$("#jFlowSlide").css({
				width: opts.width,
				height: opts.height,
				overflow: "hidden"
			});

			$(opts.slides).css({
				width: $("#jFlowSlide").width()*$(".jFlowControl").length+"px",
				height: $("#jFlowSlide").height()+"px",
				overflow: "hidden"
			});

			$(opts.slides).children().css({
				width: $("#jFlowSlide").width()+"px",
				height: $("#jFlowSlide").height()+"px",
				"float":"left"
			});

			$(opts.slides).css({
				marginLeft: "-" + (cur * $(opts.slides).find(":first-child").width() + "px")
			});
		}

		resize();

		$(window).resize(function(){
			resize();
		});

		$(".jFlowPrev").click(function(){
			dotimer();
			doprev();
		});
		
		var doprev = function (x){
			if (cur > 0)
				cur--;
			else
				cur = maxi -1;

			$(".jFlowControl").removeClass(selected_class);
			$(opts.slides).animate({
				marginLeft: "-" + (cur * $(opts.slides).find(":first-child").width() + "px")
			}, opts.duration);
			$(".jFlowControl").eq(cur).addClass(selected_class);
		}

		$(".jFlowNext").click(function(){
			donext();
			dotimer();
		});

		var donext = function (x){
			if (cur < maxi - 1)
				cur++;
			else
				cur = 0;

			$(".jFlowControl").removeClass(selected_class);
			$(opts.slides).animate({
				marginLeft: "-" + (cur * $(opts.slides).find(":first-child").width() + "px")
			}, opts.duration);
			$(".jFlowControl").eq(cur).addClass(selected_class);
		}

		var dotimer = function (x){
			if(timer != null) 
			    clearInterval(timer);
			    
        		timer = setInterval(function() {
	                	donext();
    	        	}, opts.timer);
    	        	
    	        }

		dotimer();
	};

	$.fn.jFlow.defaults = {
		easing: "swing",
		duration: 400,
		width: "100%"
	};

})(jQuery);

