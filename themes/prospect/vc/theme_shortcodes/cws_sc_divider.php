<?php
	// Map Shortcode in Visual Composer
	vc_map( array(
		"name"				=> esc_html__( 'CWS Divider', 'prospect' ),
		"base"				=> "cws_sc_divider",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> array(
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Type', 'prospect' ),
				"param_name"	=> "type",
				"value"			=> array(
					esc_html__( 'Default', 'prospect' )				=> '',
					esc_html__( 'Short', 'prospect' )				=> 'short',
				) 
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Margin Top', 'prospect' ),
				"description"	=> esc_html__( 'in pixels', 'prospect' ),
				"param_name"	=> "mtop",
				"value"			=> ""
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Margin Bottom', 'prospect' ),
				"description"	=> esc_html__( 'in pixels', 'prospect' ),
				"param_name"	=> "mbottom",
				"value"			=> ""
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "customize_colors",
				"value"			=> array( esc_html__( 'Customize Color', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Color', 'prospect' ),
				"param_name"	=> "first_color",
				"dependency"	=> array(
					"element"		=> "customize_colors",
					"not_empty"		=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
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
	    class WPBakeryShortCode_CWS_Sc_Divider extends WPBakeryShortCode {
	    }
	}
?>