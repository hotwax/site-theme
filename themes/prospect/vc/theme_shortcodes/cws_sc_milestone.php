<?php
	// Map Shortcode in Visual Composer

	$icon_params = prospect_icon_vc_sc_config_params ();

	$params = cws_merge_arrs( array(
		$icon_params,
		array(
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Number', 'prospect' ),
				"description"	=> esc_html__( 'Integer', 'prospect' ),
				"param_name"	=> "number",
				"value"			=> "356",
				"save_always"	=> true
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "use_custom_number_color",
				"value"			=> array( esc_html__( 'Custom Number Color', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Color', 'prospect' ),
				"param_name"	=> "custom_number_color",
				"dependency"	=> array(
					"element"	=> "use_custom_number_color",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Title', 'prospect' ),
				"param_name"	=> "title",
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "use_custom_title",
				"value"			=> array( esc_html__( 'Custom Title', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Color', 'prospect' ),
				"param_name"	=> "custom_title_color",
				"dependency"	=> array(
					"element"	=> "use_custom_title",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Title Size', 'prospect' ),
				"param_name"	=> "title_size",
				"dependency"	=> array(
					"element"	=> "use_custom_title",
					"not_empty"	=> true
				),
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Speed', 'prospect' ),
				"description"	=> esc_html__( 'Integer', 'prospect' ),
				"param_name"	=> "speed",
				"value"			=> "2000",
				"save_always"	=> true
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "alt",
				"value"			=> array( esc_html__( 'Alternative', 'prospect' ) => true )
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "use_custom_color",
				"value"			=> array( esc_html__( 'Use Custom Color', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Color', 'prospect' ),
				"param_name"	=> "custom_color",
				"dependency"	=> array(
					"element"	=> "use_custom_color",
					"not_empty"	=> true
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
	vc_map( array(
		"name"				=> esc_html__( 'CWS Milestone', 'prospect' ),
		"base"				=> "cws_sc_milestone",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_CWS_Sc_Milestone extends WPBakeryShortCode {
	    }
	}
?>