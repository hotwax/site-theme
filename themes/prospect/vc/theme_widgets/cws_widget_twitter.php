<?php
	// Map Shortcode in Visual Composer
	vc_map( array(
		"name"				=> esc_html__( 'CWS Widget Twitter', 'prospect' ),
		"base"				=> "cws_sc_widget_twitter",
		'category'			=> "Prospect Theme Widgets",
		"weight"			=> 80,
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Title', 'prospect' ),
				"param_name"	=> "title",
			),
			array(
				"type"			=> "iconpicker",
				"heading"		=> esc_html__( 'Widget Icon', 'prospect' ),
				"param_name"	=> "icon",
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Post Count', 'prospect' ),
				"param_name"	=> "number",
				"value"			=> "4"
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Posts per slide', 'prospect' ),
				"param_name"	=> "visible_number",
				"value"			=> "2"
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "add_custom_color",
				"value"			=> array( esc_html__( 'Add Custom Color', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Custom Color', 'prospect' ),
				"param_name"	=> "color",
				"dependency"	=> array(
					"element"		=> "add_custom_color",
					"not_empty"		=> true
				)
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html__( 'Extra class name', 'prospect' ),
				"description"		=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'prospect' ),
				"param_name"		=> "el_class",
				"value"				=> ""
			)
		)
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_CWS_Sc_Widget_Twitter extends WPBakeryShortCode {
	    }
	}
?>