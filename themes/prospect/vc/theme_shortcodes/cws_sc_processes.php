<?php 

// Map Shortcode in Visual Composer
	vc_map( array(
		"name"				=> esc_html__( 'CWS Processes', 'prospect' ),
		"base"				=> "cws_sc_processes",
		'content_element' 	=> true,
		'as_parent'			=> array('only' => 'cws_sc_process'),
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		'js_view' 			=> 'VcColumnView',
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Title', 'prospect' ),
				"param_name"	=> "title",
			)
		)
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_CWS_Sc_Processes extends WPBakeryShortCodesContainer {
	    }
	}
?>