<?php
$atts['thumbnail'] = isset( $atts['thumbnail'] ) && !empty( $atts['thumbnail'] ) ? wp_get_attachment_url( $atts['thumbnail'] ) : "";
echo prospect_testimonial_renderer( $atts, $content );
?>