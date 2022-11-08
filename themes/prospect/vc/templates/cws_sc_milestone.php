<?php
extract( shortcode_atts( array(
	'icon'				=> '',
	'number'			=> '',
	'title'				=> '',
	'speed'				=> '',
	'alt'				=> '',
	'use_custom_color'	=> '',
	'custom_color'		=> '',
	'el_class'			=> ''
), $atts));
$icon 				= esc_attr( $icon );
$number				= esc_html( $number );
$title 				= esc_html( $title );
$speed				= esc_html( $speed );
$alt 				= (bool)$alt;
$use_custom_color 	= (bool)$use_custom_color;
$custom_color 		= esc_attr( $custom_color );
$el_class			= esc_attr( $el_class );
if ( empty( $number ) || !is_numeric( $number ) ) return;
wp_enqueue_script( 'odometer' );
echo "<div class='prospect_milestone prospect_module" . ( !empty( $el_class ) ? " $el_class" : "" ) . ( $alt ? " milestone-alt" : "" ) . "'" . ">";
	echo "<div class='prospect_milestone_background'" . ( $use_custom_color && !empty( $custom_color ) && $alt ? " style='fill: $custom_color;'" : "" ) . ">" . prospect_figure_style( $alt ) . "</div>";
	echo "<div class='prospect_milestone_content'>";
		echo !empty( $icon ) ? "<div class='prospect_milestone_icon'" . ( $use_custom_color && !empty( $custom_color ) && !$alt ? " style='background: transparent; color: $custom_color;'" : "" ) . "><i class='fa fa-$icon'></i></div>" : "";
		echo "<div class='prospect_milestone_number'" . ( !empty( $speed ) && is_numeric( $speed ) ? " data-speed='$speed'" : "" ) . ">$number</div>";
		echo !empty( $title ) ? "<h6 class='prospect_milestone_title'>$title</h6>" : "";
	echo "</div>";	
echo "</div>";
?>