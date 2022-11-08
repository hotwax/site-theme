(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
	$(document).ready(function() {
		console.log('running')
	    checkSize();
	    $(window).resize(checkSize);
	    $('.menu-item-has-children.mobile').on('click', function(e){
			$(this).toggleClass('open');
		});
	    $(window).scroll(function() {
	        if($(window).scrollTop() === 0) {
	            $('body').removeClass('scrolling');
	        } else {
	            $('body').addClass('scrolling');
	        }
	    });
	    if (window.location.href.indexOf("#service") > -1) {
	        $('.form-tab').removeClass('w--current');
	        $('.form-tab:last-child').addClass('w--current');
	    }

	});

	function checkSize(){
	    if ($(".w-nav-button").css("display") == "block" ){
	    	$('.menu-item-has-children').addClass('mobile');
	    } else {
	    	$('.menu-item-has-children').removeClass('mobile');
	    }
	}
		
	});
	
})(jQuery, this);

$(document).ready(function(){
    $("<h6><span>Read more <i class='fas fa-arrow-right'></i></span></h6>").insertAfter(".rss_content");
	$("<span>BLOGS | Published </span>").insertBefore(".blog-contaner .rss_content small");
	$("<span>PODCAST EPISODES | Published </span>").insertBefore(".podcast-contaner .rss_content small");
});


$(".feedzy-rss ul li").click(function() {
  window.location = $(this).find("a").attr("href"); 
  return false;
});

