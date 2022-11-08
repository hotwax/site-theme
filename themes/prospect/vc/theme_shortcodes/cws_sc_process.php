<?php 

	// Map Shortcode in Visual Composer
	$icon_params = prospect_icon_vc_sc_config_params ();
	$params = cws_merge_arrs( array(
		$icon_params,
		array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Title', 'prospect' ),
				"param_name"	=> "title",
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "use_custom_title_color",
				"value"			=> array( esc_html__( 'Custom Title Color', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Title Color', 'prospect' ),
				"param_name"	=> "custom_title_color",
				"dependency"	=> array(
					"element"	=> "use_custom_title_color",
					"not_empty"	=> true
				),
				"value"			=> '#ffffff'
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "use_custom_bg_color",
				"value"			=> array( esc_html__( 'Custom Background Color', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Background Color', 'prospect' ),
				"param_name"	=> "custom_bg_color",
				"dependency"	=> array(
					"element"	=> "use_custom_bg_color",
					"not_empty"	=> true
				),
				"value"			=> '#ffffff'
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "use_custom_icon_color",
				"value"			=> array( esc_html__( 'Custom Icon Color', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Icon Color', 'prospect' ),
				"param_name"	=> "custom_icon_color",
				"dependency"	=> array(
					"element"	=> "use_custom_icon_color",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Number', 'prospect' ),
				"description"	=> esc_html__( 'Integer', 'prospect' ),
				"param_name"	=> "number",
				"value"			=> "1",
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
				"type"			=> "textarea_html",
				"heading"		=> esc_html__( 'Description', 'prospect' ),
				"param_name"	=> "content",
			)
		)
	));
	vc_map( array(
		"name"				=> esc_html__( 'CWS Process', 'prospect' ),
		"base"				=> "cws_sc_process",
		'as_child'			=> array('only' => 'cws_sc_processes'),
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_CWS_Sc_Process extends WPBakeryShortCode {
	    }
	}
?>