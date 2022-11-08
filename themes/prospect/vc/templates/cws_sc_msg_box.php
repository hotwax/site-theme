<?php
extract( shortcode_atts( array(
	'type'					=> 'success',
	'title'					=> '',
	'text'					=> '',
	'is_closable'			=> '',
	'customize'				=> '',
	'with_icon'				=> '',
	'custom_icon'			=> '',
	'custom_fill_color'		=> PROSPECT_THEME_COLOR,
	'custom_font_color'		=> '#fff',
	'el_class'				=> ''
), $atts));
$type = esc_html( $type );
$is_closable = (bool)$is_closable;
$customize = (bool)$customize;
$with_icon = (bool)$with_icon;
$custom_icon = esc_html( $custom_icon );
$el_class = esc_attr( $el_class );
$content = !empty( $text ) ? $text : $content;
$section_id = uniqid( "prospect_msg_box_" );
ob_start();
if ( $customize ){
	echo !empty( $custom_fill_color ) ? "background-color: $custom_fill_color;" : "";
	echo !empty( $custom_font_color ) ? "color: $custom_font_color;" : "";
}
$section_styles = ob_get_clean();
ob_start();
if ( $customize ){
	echo !empty( $custom_font_color ) ? "background-color: $custom_font_color;" : "";
}
$icon_part_styles = ob_get_clean();	
ob_start();
if ( $customize ){
	echo !empty( $custom_fill_color ) ? "color: $custom_fill_color;" : "";
}
$icon_styles = ob_get_clean();
$icon_class = "msg_icon";
$icon_class .= $customize && !empty( $custom_icon ) ? " fa fa-{$custom_icon}" : "";
if ( !empty( $title ) || !empty( $content ) ){
	echo "<div id='$section_id' class='prospect_msg_box prospect_module $type" . ( $is_closable ? " closable" : "" ) . ( $with_icon ? " with-icon" : "" ) . ( !empty( $el_class ) ? " $el_class" : "" ) . "'" . ( !empty( $section_styles ) ? " style='$section_styles'" : "" ) . ">";
		if ( $with_icon ) {
			echo "<div class='icon_part'" . ( !empty( $icon_part_styles ) ? " style='$icon_part_styles'" : "" ) . ">";
				echo "<i class='$icon_class'" . ( !empty( $icon_styles ) ? " style='$icon_styles'" : "" ) . "></i>";
			echo "</div>";
		}
		echo "<div class='content_part'>";
			echo !empty( $title ) ? "<div class='title'>$title</div>" : "";
			echo !empty( $content ) ? "<p>$content</p>" : "";
		echo "</div>";
		if($is_closable){
			echo "<a class='close_button'></a>";
		}
	echo "</div>";
}
?>