		<?php
			get_template_part( "footer_widgets" );
			get_template_part( "footer_copyrights" );
			echo prospect_scroll_to_top();
		?>		
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r77/three.min.js"></script>
		<script src="../wp-content/themes/prospect-child/js/webflow.js" type="text/javascript"></script>
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
		</script>
		<?php wp_footer(); ?>
	</body>
</html>