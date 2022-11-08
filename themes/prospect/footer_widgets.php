<?php
if ( is_page() ){
	$footer_sb = prospect_get_page_meta_var ( array( 'footer', 'footer_sb_top' ) );
}
else{
	$footer_sb = prospect_get_option( 'footer_sb' );
}
if ( is_active_sidebar( $footer_sb ) ){
	echo "<section id='footer_widgets'>";
		echo "<div class='prospect_layout_container'>";
			echo "<ul id='footer_widgets_container'>";
				dynamic_sidebar( $footer_sb );
			echo "</ul>";
		echo "</div>";
	echo "</section>";
}
?>