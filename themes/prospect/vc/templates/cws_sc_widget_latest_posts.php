<?php
if ( isset( $atts['cats'] ) ) $atts['cats'] = explode( ',', $atts['cats'] );
if ( isset( $atts['tags'] ) ) $atts['tags'] = explode( ',', $atts['tags'] );
if ( isset( $atts['hide'] ) ) $atts['hide'] = explode( ',', $atts['hide'] );
$el_class = isset( $atts['el_class'] ) ? $atts['el_class'] : "";
$el_class = esc_attr( $el_class );
$type = 'Prospect_Latest_Posts';
$widget_id = uniqid( strtolower("{$type}_") );
$widget_class = "widget" . ( !empty( $el_class ) ? " $el_class" : "" );
$args = array(
	"before_widget"	=> "<div id=\"$widget_id\" class=\"$widget_class\">",
	"after_widget"	=> "</div>",
	"before_title"	=> "<h3 class=\"widgettitle\">",
	"after_title"	=> "</h3>",
	"widget_id"		=> $widget_id
);
if ( strlen( $content ) > 0 ) {
	$atts['text'] = $content;
}
global $wp_widget_factory;
// to avoid unwanted warnings let's check before using widget
if ( is_object( $wp_widget_factory ) && isset( $wp_widget_factory->widgets, $wp_widget_factory->widgets[ $type ] ) ) {
	echo the_widget( $type, $atts, $args );
} else {
	echo sprintf("%s", $this->debugComment( 'Widget ' . esc_attr( $type ) . 'Not found in : vc_wp_text' ));
}
?>