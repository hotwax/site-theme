<?php
extract( shortcode_atts( array(
	'title'				=> '',
	'progress'			=> '',
	'use_custom_color'	=> '',
	'custom_fill_color'	=> '',
	'el_class'			=> ''
), $atts));
$title 				= esc_html( $title );
$progress 			= esc_html( $progress );
$use_custom_color 	= (bool)$use_custom_color;
$custom_fill_color 	= esc_attr( $custom_fill_color );
$el_class			= esc_attr( $el_class );
if ( empty( $progress ) || !is_numeric( $progress ) ) return;
echo "<div class='prospect_pb prospect_module" . ( !empty( $el_class ) ? " $el_class" : "" ) . "'>";
	echo !empty( $title ) ? "<h6 class='prospect_pb_title'>$title</h6>" : "";
	echo "<div class='prospect_pb_bar'>";
		echo "<div class='prospect_pb_progress' data-value='$progress' style='width:0%;" . ( $use_custom_color && !empty( $custom_fill_color ) ? "background-color: $custom_fill_color;" : "" ) . "'>";
		echo "</div>";
	echo "</div>";
echo "</div>";
?>