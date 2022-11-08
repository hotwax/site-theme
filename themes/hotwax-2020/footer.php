			<!-- footer -->
		  <div class="footer">
		    <div class="w-container">
		      <div class="footer-columns w-row">
		        <div class="w-col w-col-4">
		          <div class="footer-column-block"><img src="/wp-content/themes/hotwax-2020/images/logo-hotwax-dark.svg" alt="" class="footer-logo">
					<h5 class="footer-header">Stay With Us<br></h5>
					  <div class="footer-social-icon-wrapper">
						 <a href="https://www.linkedin.com/company/hotwaxcommerce-unifiedcommerce/?viewAsMember=true" target="_blank"><img src="/wp-content/uploads/2021/10/linkedin-hotwax.svg" alt="" class="footer-social-icon-one"> </a>
						 <a href="https://twitter.com/HotWaxCommerce" target="_blank"><img src="/wp-content/uploads/2021/10/twitter-hotwax.svg" alt="" class="footer-social-icon-two"> </a>
					  </div>
		            <h5 class="footer-header">Get in Touch<br></h5>
		            <div class="footer-form w-form">
		              	<!--[if lte IE 8]>
						<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
						<![endif]-->
						<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
						<script>
						  hbspt.forms.create({
							portalId: "6357099",
							formId: "2fc84bfd-f195-4ce2-82e0-f54062e3c6ce"
						});
						</script>
		            </div>
		          </div>
		        </div>
		        <div class="w-col w-col-4">
		          <div class="footer-column-block">
		            <div class="footer-block">
		              <h5 class="footer-header">HotWax Commerce Headquarters<br></h5>
		              <p><!--136 Main St A200<br>Salt Lake City, UT 84101-->
						175 S Main St Suite 1310,<br> Salt Lake City, UT 84111 </p>
		            </div>
		            <div class="footer-block">
		              <h5 class="footer-header">contact sales<br></h5>
		              <p>+1-732-724-0104 (US)<br><!--+91-731-405-5707 (INDIA)--></p>
		            </div>
		            <div class="footer-block">
		              <h5 class="footer-header">more on hotwax commerce<br></h5>
		              <?php wp_nav_menu( array(  'theme_location'  => 'footer-about') ); ?>
		          </div>
		          </div>
		        </div>
		        <div class="w-col w-col-4">
		          <div class="footer-column-block">
		            <div class="footer-block">
		              <h5 class="footer-header">solutions<br></h5>
		              <?php wp_nav_menu( array(  'theme_location'  => 'footer-solutions') ); ?>
		          	</div>
		            <div class="footer-block">
		              <h5 class="footer-header">products<br></h5>
		              <?php wp_nav_menu( array(  'theme_location'  => 'footer-products') ); ?>
		          	</div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		<!-- /footer -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r77/three.min.js"></script>
		<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="<?php echo get_stylesheet_directory_uri(). '/js/webflow.js' ?>" type="text/javascript"></script>
		<script src="<?php echo get_stylesheet_directory_uri(). '/js/scripts.js' ?>" type="text/javascript"></script>
		<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
		<script type="text/javascript">
			$(window).scroll(function() {    
			    var scroll = $(window).scrollTop();
			     //>=, not <=
			    if (scroll >= 80) {
			        //clearHeader, not clearheader - caps H
			        $(".navbar").addClass("scrolling");
			    } else {
			   			$(".navbar").removeClass("scrolling");
			    }
			}); //missing );
		</script>
		<script type="text/javascript">
			$(window).scroll(function() {    
			    var scroll = $(window).scrollTop();
			     //>=, not <=
			    if (scroll >= 80) {
			        //clearHeader, not clearheader - caps H
			        $(".navbar").addClass("scrolling");
			    } else {
			   			$(".navbar").removeClass("scrolling");
			    }
			}); //missing );
	    	$('.nav-wrapper').click( function(e) {
	    		if($(this).find('.dropdown-list').length !== 0) {
	    			e.preventDefault();
	    			$('.nav-wrapper').not(this).removeClass('w--open');
	    			$(this).toggleClass('w--open');
	    		}
	    	});
	    	$('window').not('.w-nav-menu').click(function(e) {
	    		$('.nav-wrapper').removeClass('w--open');
	    	});
		</script>
		<script async="" type="text/javascript">
			(function ($){
			    $.fn.bekeyProgressbar = function(options){
			        options = $.extend({
			        	animate     : true,
			          animateText : true
			        }, options);
			        var $this = $(this);
			        var $progressBar = $this;
			        var $progressCount = $progressBar.find('.ProgressBar-percentage--count');
			        var $circle = $progressBar.find('.ProgressBar-circle');
			        var percentageProgress = $progressBar.attr('data-progress');
			        var percentageRemaining = (100 - percentageProgress);
			        var percentageText = $progressCount.parent().attr('data-progress');
			        //Calcule la circonférence du cercle
			        var radius = $circle.attr('r');
			        var diameter = radius * 2;
			        var circumference = Math.round(Math.PI * diameter);
			        //Calcule le pourcentage d'avancement
			        var percentage =  circumference * percentageRemaining / 100;
			        $circle.css({
			          'stroke-dasharray' : circumference,
			          'stroke-dashoffset' : percentage
			        })
			        //Animation de la barre de progression
			        if(options.animate === true){
			          $circle.css({
			            'stroke-dashoffset' : circumference
			          }).animate({
			            'stroke-dashoffset' : percentage
			          }, 3000 )
			        }
			        //Animation du texte (pourcentage)
			        if(options.animateText == true){
			          $({ Counter: 0 }).animate(
			            { Counter: percentageText },
			            { duration: 3000,
			             step: function () {
			               $progressCount.text( Math.ceil(this.Counter) + '%');
			             }
			            });
			        }else{
			          $progressCount.text( percentageText + '%');
			        }
			    };
			})(jQuery);
		</script>
		<script async="" type="text/javascript">
			$(document).ready(function(){
			  $('.ProgressBar--animateNone').bekeyProgressbar({
			    animate : false,
			    animateText : false
			  });
			  $('.ProgressBar--animateCircle').bekeyProgressbar({
			    animate : true,
			    animateText : false
			  });
			  $('.ProgressBar--animateText').bekeyProgressbar({
			    animate : false,
			    animateText : true
			  });
			  $('.ProgressBar--animateAll').each(function( index ) {
			  	$( this ).bekeyProgressbar();
			  });
			})
		</script>

		<script async="" type="text/javascript">
			$('.interactive-link').hover( function(e){
				var parent = $(this).closest('.phone-column');
				var cls = $(this).attr('id');
    			var number = cls.substr(cls.lastIndexOf("-") + 1);
    			$('.phone-shot').removeClass('visible');
    			$('#phone-shot-' + number).addClass('visible');
			});
		</script>

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
