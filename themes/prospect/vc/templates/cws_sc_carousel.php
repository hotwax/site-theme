<?php
extract( shortcode_atts( array(
	'title' => '',
	'columns' => '',
	'bullets_nav' => ''
), $atts));
$has_title = !empty( $title );
$bullets_nav 	= (bool)$bullets_nav;
$section_class = "prospect_sc_carousel prospect_module";
$section_class .= $bullets_nav ? " bullets_nav" : "";
$columns				 	= esc_html( $columns );
$section_atts = " data-columns='$columns'";
if ( !empty( $content ) ){
	echo "<div class='$section_class'" . ( !empty( $section_atts ) ? $section_atts : "" ) . ">";
		if ( $has_title ){
			echo "<div class='prospect_sc_carousel_header clearfix'>";
				echo "<h2>$title</h2>";				
			echo "</div>";
		}
		if ( !$bullets_nav ) {
			echo "<div class='carousel_nav'>";
				echo "<span class='prev'></span>";
				echo "<span class='next'></span>";
			echo "</div>";
		}
		echo "<div class='prospect_wrapper'>";
			echo do_shortcode( $content );
		echo "</div>";
	echo "</div>";
}
wp_enqueue_script( 'owl_carousel' );

?>