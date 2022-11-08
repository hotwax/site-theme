<?php

extract( shortcode_atts( array(
	'title'						=> '',
	'icon_lib'					=> '',
	'add_button'				=> '',
	'add_hover'					=> '',
	'button_text'				=> '',
	'button_url'				=> '',
	'button_new_tab'			=> '',
	'button_size'				=> 'regular',
	'icon_pos'					=> 'icon_center',
	'icon_size'					=> 'small',
	'button_fw'					=> '',
	'customize_colors'			=> '',
	'font_color'				=> PROSPECT_THEME_COLOR,
	'background_color'			=> 'transparent',
	'stroke_color'				=> PROSPECT_THEME_COLOR,
	'font_color_hover'			=> '#ffffff',
	'background_color_hover'	=> PROSPECT_THEME_COLOR,
	'stroke_color_hover'		=> PROSPECT_THEME_COLOR,
	'el_class'					=> ''
), $atts));
$title 						= esc_html( $title );
$icon_lib 					= esc_attr( $icon_lib );
$icon 						= prospect_vc_sc_get_icon( $atts );
$icon 						= esc_attr( $icon );
$desc 						= apply_filters( 'the_content', $content );
$icon_pos 					= esc_html( $icon_pos );
$icon_size 					= esc_html( $icon_size );
$add_button 				= (bool)$add_button;
$add_hover 					= (bool)$add_hover;
$customize_colors 			= (bool)$customize_colors;
$font_color 				= esc_attr( $font_color );
$background_color 			= esc_attr( $background_color );
$stroke_color 				= esc_attr( $stroke_color );
$font_color_hover 			= esc_attr( $font_color_hover );
$background_color_hover 	= esc_attr( $background_color_hover );
$stroke_color_hover 		= esc_attr( $stroke_color_hover );
$el_class					= esc_attr( $el_class );
$out = "";
if ( function_exists( 'vc_icon_element_fonts_enqueue' ) ){
	vc_icon_element_fonts_enqueue( $icon_lib );		
}
$button_atts = array(
	'title'		=> $button_text,
	'url'		=> $button_url,
	'new_tab'	=> $button_new_tab,
	'size'		=> $button_size,
	'fw'		=> $button_fw,
);
if ( $customize_colors ){
	$button_atts['customize_colors'] 	= true;
	$button_atts['custom_color'] 		= $font_color;
}
$section_id = uniqid( 'prospect_services_column_' );
$button = $add_button ? prospect_sc_button( $button_atts ) : "";
$title_part = $desc_part = "";
$title_part .= !empty( $title ) ? "<h3 class='prospect_services_title'>$title</h3>" : "";
$title_part .= !empty( $icon ) ? "<div class='prospect_services_icon'><div class='icon $icon'>" . prospect_figure_style( ) . "</div></div>" : "";
$desc_part .= !empty( $desc ) ? "<div class='prospect_services_desc clearfix'>$desc</div>" : "";
/* styles */
ob_start();
if ( $customize_colors && !empty( $font_color ) && !empty( $stroke_color ) ){
echo "#$section_id .prospect_services_title,
		#$section_id .prospect_services_icon .icon{
			color: $font_color;
		}
		#$section_id .prospect_services_icon svg{
			fill: $background_color;
			stroke: $stroke_color;
		}
		#$section_id.hovered:hover .prospect_services_icon .icon{
			color: $font_color_hover;
		}
		#$section_id.hovered:hover .prospect_services_icon svg{
			fill: $background_color_hover;
			stroke: $stroke_color_hover;
		}
		#$section_id.icon_center .prospect_services_desc .widgettitle:before{
			background: $font_color;
		}";
}
/* \styles */
$classes = $add_hover ? " hovered " : "";
$classes .= $icon_size . " " . $icon_pos;
$styles = ob_get_clean();
$styles = json_encode($styles);

$out .= "<div id='$section_id' data-style='".esc_attr($styles)."' class='prospect_services_column prospect_module render_styles " . $classes . ( !empty( $button ) ? " prospect_flex_column_sb" : "" ) . ( !empty( $el_class ) ? " $el_class" : "" ) . "'>";
	if ( !empty( $title_part ) && !empty( $desc_part ) ){
		$out .= "<div class='prospect_services_data'>";
			$out .= $title_part;
			$out .= $desc_part;
		$out .= "</div>";
		$out .= !empty( $button ) ? "<div class='prospect_services_button'>$button</div>" : "";
	}
	else{
		$out .= "<div class='prospect_services_data'>";
			$out .= $title_part;
			$out .= $desc_part;
		$out .= "</div>";
		$out .= !empty( $button ) ? "<div class='prospect_services_button'>$button</div>" : "";
	}
$out .= "</div>";
return $out;
?>