<?php
extract( shortcode_atts( array(
	'title'				=> '',
	'currency'			=> '',
	'price'				=> '29.00',
	'price_desc'		=> '',
	'add_button'		=> '',
	'button_text'		=> '',
	'button_url'		=> '',
	'button_new_tab'	=> '',
	'button_size'		=> 'regular',
	'button_alt'		=> '',
	'button_fw'			=> '',
	'highlighted'		=> '',
	'use_custom_color'	=> '',
	'custom_color'		=> PROSPECT_THEME_COLOR,
	'el_class'			=> ''
	), $atts));
	$title 				= esc_html( $title );
	$currency 			= esc_html( $currency );
	$price 				= esc_html( $price );
	$price_desc 		= esc_html( $price_desc );
	$add_button 		= (bool)$add_button;
	$highlighted		= (bool)$highlighted;
	$use_custom_color 	= (bool)$use_custom_color;
	$button_alt 		= (bool)$button_alt;
	$custom_color 		= esc_attr( $custom_color );
	$el_class			= esc_attr( $el_class );
$section_id = uniqid( 'prospect_pricing_plan_' );
	ob_start();
	echo !empty( $title ) ? "<h3 class='pricing_plan_title'>$title</h3>" : "";
	if ( !empty( $price ) ){
	preg_match( "/(\.|,)(\d+)$/", $price, $matches );
	$fract_price_part = isset( $matches[2] ) ? $matches[2] : '';
	$main_price_part = !empty( $fract_price_part ) ? esc_html( substr( $price, 0, strpos( $price, $fract_price_part ) ) ) : esc_html( $price ); 		
		echo "<div class='pricing_plan_price'>";
			echo !empty( $currency ) ? "<span class='currency'>$currency</span>" : "";
			echo "<span class='main_price_part'>$main_price_part</span>";
			echo !empty( $fract_price_part ) ? "<span class='fract_price_part'>$fract_price_part</span>" : "";
			echo !empty( $price_desc ) ? "<span class='price_desc'>$price_desc</span>" : "";
		echo "</div>";
	}
$content = apply_filters( 'the_content', $content );
echo !empty( $content ) ? "<div class='pricing_plan_content'>$content</div>" : "";
	$plan = ob_get_clean();
$button_atts = array(
	'title'		=> $button_text,
	'url'		=> $button_url,
	'new_tab'	=> $button_new_tab,
	'size'		=> $button_size,
	'alt'		=> $button_alt,
	'fw'		=> $button_fw
);
if ( $use_custom_color ){
	$button_atts['customize_colors'] = true;
	$button_atts['custom_color'] = $custom_color;
}
$button = $add_button ? prospect_sc_button( $button_atts ) : "";
/* styles */
$styles = "#$section_id .pricing_plan_title{
	background-color: $custom_color;
}
#$section_id .pricing_plan_content ul li:before{
	color: $custom_color;
}";
/* \styles */
$section_class = "prospect_pricing_plan prospect_module";
$section_class .= !empty( $plan ) && !empty( $button ) ? " prospect_flex_column_sb" : "";
$section_class .= $highlighted ? " highlighted" : "";
$section_class .= !empty( $el_class ) ? " $el_class" : "";

if($use_custom_color && !empty( $custom_color )){
	echo "<style type='text/css'>$styles</style>";
}

echo "<div id='$section_id' class='$section_class'>";
	echo !empty( $plan ) ? "<div class='pricing_plan'>$plan</div>" : "";
	echo !empty( $button ) ? "<div class='pricing_plan_button'>$button</div>" : "";
echo "</div>";
?>