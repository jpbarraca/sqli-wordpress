jQuery(document).ready(function(){ 'use strict'; jQuery("#main-menu-con ul ul").css({display: "none"}); jQuery('#main-menu-con ul li').hover( function() { jQuery(this).find('ul:first').slideDown(300).css('visibility', 'visible');  }, function() { jQuery(this).find('ul:first').slideUp(100); }); 

jQuery('#mobile-menu').click(function(){ jQuery('#main-menu-con').toggle(); jQuery(this).toggleClass('yesclick'); });
});

jQuery.noConflict();
jQuery(document).ready(function(){ 'use strict'; 
	var sldwid = jQuery("#slidecon").width();
	var sldhgt = sldwid*0.3;
	jQuery(".box_skitter, .box_skitter img, .box_skitter_large").css({"width": sldwid+"px", "height": sldhgt+"px"});							  
	jQuery(".box_skitter_large").skitter({ dots:true,numbers:false,preview:false,focus:false,navigation:false,controls:false,interval:5000,controls_position:"rightTop",progressbar:false});
});