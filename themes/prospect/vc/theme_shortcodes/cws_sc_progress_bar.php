<?php
	// Map Shortcode in Visual Composer
	vc_map( array(
		"name"				=> esc_html__( 'CWS Progress Bar', 'prospect' ),
		"base"				=> "cws_sc_progress_bar",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Title', 'prospect' ),
				"param_name"	=> "title",
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Progress', 'prospect' ),
				"description"	=> esc_html__( 'In Percents', 'prospect' ),
				"param_name"	=> "progress",
				"value"			=> "50",
				"save_always"	=> true
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "use_custom_color",
				"value"			=> array( esc_html__( 'Use Custom Color', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Fill Color', 'prospect' ),
				"param_name"	=> "custom_fill_color",
				"dependency"	=> array(
					"element"	=> "use_custom_color",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Title Color', 'prospect' ),
				"param_name"	=> "custom_title_color",
				"dependency"	=> array(
					"element"	=> "use_custom_color",
					"not_empty"	=> true
				),
				"value"			=> '#808c95'
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
	    class WPBakeryShortCode_CWS_Sc_Progress_Bar extends WPBakeryShortCode {
	    }
	}
?>