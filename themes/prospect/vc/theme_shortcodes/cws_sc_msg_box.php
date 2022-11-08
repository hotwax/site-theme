<?php
	// Map Shortcode in Visual Composer
	vc_map( array(
		"name"				=> esc_html__( 'CWS Message Box', 'prospect' ),
		"base"				=> "cws_sc_msg_box",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> array(
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Type', 'prospect' ),
				"param_name"	=> "type",
				"value"			=> array(
					esc_html__( 'Success', 'prospect' )				=> 'success',
					esc_html__( 'Warning', 'prospect' )				=> 'warn',
					esc_html__( 'Error', 'prospect' )				=> 'error',
					esc_html__( 'Informational', 'prospect' )		=> 'info',
					esc_html__( 'Notice', 'prospect' )				=> 'notic',
					esc_html__( 'Usefull', 'prospect' )				=> 'usefull',
				) 
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Title', 'prospect' ),
				"param_name"	=> "title",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Text', 'prospect' ),
				"param_name"	=> "text",
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "is_closable",
				"value"			=> array(
					esc_html__( 'Closable', 'prospect' ) => true
				)
			),			
			array(
				"type"			=> "checkbox",
				"param_name"	=> "customize",
				"value"			=> array( esc_html__( 'Customize', 'prospect' ) => true )
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "with_icon",
				"value"			=> array( esc_html__( 'With Icon', 'prospect' ) => true ),
				"dependency"	=> array(
					"element"	=> "customize",
					"not_empty"	=> true
				), 
			),
			array(
				"type"			=> "iconpicker",
				"heading"		=> esc_html__( 'Icon', 'prospect' ),
				"param_name"	=> "custom_icon",
				"dependency"	=> array(
					"element"	=> "with_icon",
					"not_empty"	=> true
				),
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Fill Color', 'prospect' ),
				"param_name"	=> "custom_fill_color",
				"dependency"	=> array(
					"element"	=> "customize",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Font Color', 'prospect' ),
				"param_name"	=> "custom_font_color",
				"dependency"	=> array(
					"element"	=> "customize",
					"not_empty"	=> true
				),
				"value"			=> "#fff"
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
	    class WPBakeryShortCode_CWS_Sc_Msg_Box extends WPBakeryShortCode {
	    }
	}
?>