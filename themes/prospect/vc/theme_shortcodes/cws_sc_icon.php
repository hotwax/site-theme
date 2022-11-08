<?php
	// Map Shortcode in Visual Composer

	$icon_params = prospect_icon_vc_sc_config_params ();
	$params = cws_merge_arrs( array(
		$icon_params,
		array(
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Link', 'prospect' ),
				"param_name"	=> "url",
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "new_tab",
				"value"			=> array( esc_html__( 'Open in New Tab', 'prospect' ) => true )
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Title', 'prospect' ),
				"param_name"	=> "title",
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Type', 'prospect' ),
				"param_name"	=> "type",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array(
					esc_html__( 'Figure', 'prospect' )		=> 'figure',
					esc_html__( 'Simple', 'prospect' )			=> 'simple'
				) 
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "icon_alt",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array( esc_html__( 'Alternative', 'prospect' ) => true )				
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Size', 'prospect' ),
				"param_name"	=> "size",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array(
					esc_html__( 'Mini', 'prospect' )		=> 'lg',
					esc_html__( 'Small', 'prospect' )		=> '2x',
					esc_html__( 'Medium', 'prospect' )		=> '3x',
					esc_html__( 'Large', 'prospect' )		=> '4x',
					esc_html__( 'Extra Large', 'prospect' )	=> '5x',
					esc_html__( 'Full Width', 'prospect' )	=> 'fw_icon'
				) 
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Aligning', 'prospect' ),
				"param_name"	=> "aligning",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array(
					esc_html__( 'None', 'prospect' )		=> '',
					esc_html__( 'Left', 'prospect' )		=> 'left',
					esc_html__( 'Right', 'prospect' )		=> 'right',
					esc_html__( 'Center', 'prospect' )		=> 'center'
				) 
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "add_hover",
				"value"			=> array( esc_html__( 'Add Hover', 'prospect' ) => true )				
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "customize_colors",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array( esc_html__( 'Customize Colors', 'prospect' ) => true )				
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Fill Color', 'prospect' ),
				"param_name"	=> "fill_color",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"dependency"	=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"			=> "#fff"
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Font Color', 'prospect' ),
				"param_name"	=> "font_color",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"dependency"	=> array(
					"element"	=> "customize_colors",
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
		"name"				=> esc_html__( 'CWS Icon', 'prospect' ),
		"base"				=> "cws_sc_icon",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_CWS_Sc_Icon extends WPBakeryShortCode {
	    }
	}
?>