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
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Icon Position', 'prospect' ),
				"param_name"	=> "icon_pos",
				"value"			=> array(
					esc_html__( 'Center', 'prospect' )		=> 'icon_center',
					esc_html__( 'Left', 'prospect' )		=> 'icon_left',
					esc_html__( 'Right', 'prospect' )		=> 'icon_right'
				) 
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Icon Size', 'prospect' ),
				"param_name"	=> "icon_size",
				"value"			=> array(
					esc_html__( 'Small', 'prospect' )		=> 'small',
					esc_html__( 'Medium', 'prospect' )		=> 'medium',
					esc_html__( 'Large', 'prospect' )		=> 'large'
				) 
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "customize_colors",
				"value"			=> array( esc_html__( 'Customize Colors', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Font Color', 'prospect' ),
				"param_name"	=> "font_color",
				"dependency"	=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Background Color', 'prospect' ),
				"param_name"	=> "background_color",
				"dependency"	=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"			=> "transparent"
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Stroke Color', 'prospect' ),
				"param_name"	=> "stroke_color",
				"dependency"	=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "add_button",
				"value"			=> array( esc_html__( 'Add Button', 'prospect' ) => true )
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "add_hover",
				"value"			=> array( esc_html__( 'Add Hover', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Font Color Hover', 'prospect' ),
				"param_name"	=> "font_color_hover",
				"dependency"	=> array(
					"element"	=> "add_hover",
					"not_empty"	=> true
				),
				"value"			=> "#ffffff"
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Background Color Hover', 'prospect' ),
				"param_name"	=> "background_color_hover",
				"dependency"	=> array(
					"element"	=> "add_hover",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Stroke Color Hover', 'prospect' ),
				"param_name"	=> "stroke_color_hover",
				"dependency"	=> array(
					"element"	=> "add_hover",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Button Text', 'prospect' ),
				"param_name"	=> "button_text",
				"dependency"	=> array(
					"element"	=> "add_button",
					"not_empty"	=> true
				),
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Url', 'prospect' ),
				"param_name"	=> "button_url",
				"dependency"	=> array(
					"element"	=> "add_button",
					"not_empty"	=> true
				)
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "button_new_tab",
				"dependency"	=> array(
					"element"	=> "add_button",
					"not_empty"	=> true
				),
				"value"			=> array( esc_html__( 'Open Link in New Tab', 'prospect' ) => true )
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Button Size', 'prospect' ),
				"param_name"	=> "button_size",
				"dependency"	=> array(
					"element"	=> "add_button",
					"not_empty"	=> true
				),
				"value"			=> array(
					esc_html__( 'Regular', 'prospect' )		=> 'regular',
					esc_html__( 'Mini', 'prospect' )		=> 'mini',
					esc_html__( 'Small', 'prospect' )		=> 'small',
					esc_html__( 'Large', 'prospect' )		=> 'large'
				) 
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "button_fw",
				"dependency"	=> array(
					"element"	=> "add_button",
					"not_empty"	=> true
				),
				"value"			=> array( esc_html__( 'Make Button Full Width', 'prospect' ) => true )			
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html__( 'Extra class name', 'prospect' ),
				"description"		=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'prospect' ),
				"param_name"		=> "el_class",
				"value"				=> ""
			),			
			array(
				"type"			=> "textarea_html",
				"heading"		=> esc_html__( 'Description', 'prospect' ),
				"param_name"	=> "content",
			)
		)
	));
	vc_map( array(
		"name"				=> esc_html__( 'CWS Services Column', 'prospect' ),
		"base"				=> "cws_sc_services",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_CWS_Sc_Services extends WPBakeryShortCode {
	    }
	}
?>