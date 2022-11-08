<?php
extract( shortcode_atts( array(
	'title'						=> '',
	'icon_lib'					=> '',
	'use_custom_title_color'	=> '',
	'custom_title_color'		=> '#ffffff',
	'use_custom_bg_color'		=> '',
	'custom_bg_color'			=> '#ffffff',
	'use_custom_icon_color'		=> '',
	'custom_icon_color'			=> PROSPECT_THEME_COLOR,
	'number'					=> '',
	'use_custom_number_color'	=> '',
	'custom_number_color'		=> PROSPECT_THEME_COLOR,
), $atts));
$icon_lib 					= esc_attr( $icon_lib );
$icon 						= prospect_vc_sc_get_icon( $atts );
$icon 						= esc_attr( $icon );
$title 						= esc_html( $title );
$use_custom_title_color 	= (bool)$use_custom_title_color;
$custom_title_color			= esc_attr( $custom_title_color );
$use_custom_bg_color 		= (bool)$use_custom_bg_color;
$custom_bg_color			= esc_attr( $custom_bg_color );
$use_custom_icon_color 		= (bool)$use_custom_icon_color;
$custom_icon_color			= esc_attr( $custom_icon_color );
$number 					= esc_html( $number );
$use_custom_number_color 	= (bool)$use_custom_number_color;
$custom_number_color 		= esc_attr( $custom_number_color );
$desc 						= apply_filters( 'the_content', $content );
$out = "";

$section_id = uniqid( 'prospect_process_column_' );
$process_number = !empty( $number ) ? "<span class='process_number'" . ( $use_custom_number_color ? " style=' color: $custom_number_color;'" : "" ) . ">$number</span>" : "";
$process_number_top = !empty( $number ) ? "<div class='process_number_wrap'" . ( $use_custom_number_color ? " style=' background: $custom_number_color;'" : "" ) . "><span class='process_number'>$number</span></div>" : "";
$title_part = $desc_part = "";
$title_part .= !empty( $title ) ? "<h3 class='prospect_process_title'" . ( $use_custom_title_color ? " style=' color: $custom_title_color;'" : "" ) . ">$title $process_number</h3>" : "";
$desc_part .= !empty( $desc ) ? "<div class='prospect_process_desc clearfix'>$desc</div>" : "";
$custom_color = $custom_bg_color;
$figure_style = prospect_figure_style( $custom_color, true );

echo "<div id='$section_id' class='prospect_process_column prospect_module'>";
	echo "<div class='prospect_process_item'>";
		echo "<div class='prospect_process_icon_wrap'>" . $process_number_top;
			echo "<div class='prospect_process_icon'" . ( $use_custom_icon_color ? " style=' color: $custom_icon_color;'" : "" ) . "><i class='fa $icon'></i></div>" . $figure_style;
		echo  "</div>";
		echo "<div class='prospect_process_content'>" . $title_part . $desc_part;
		echo "</div>";
	echo "</div>";
	echo "<div class='prospect_process_column_line'><canvas height='150' width='70'></canvas></div>";
echo "</div>";

?>