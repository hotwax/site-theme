<?php
	// Map Shortcode in Visual Composer
	vc_map( array(
		"name"				=> esc_html__( 'CWS Pricing Plan', 'prospect' ),
		"base"				=> "cws_sc_pricing_plan",
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
				"heading"		=> esc_html__( 'Currency', 'prospect' ),
				"param_name"	=> "currency",
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Price', 'prospect' ),
				"description"	=> esc_html__( 'Split integer and decimal part by dot symbol', 'prospect' ),
				"param_name"	=> "price",
				"value"			=> "29.00",
				"save_always"	=> true
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Price description', 'prospect' ),
				"param_name"	=> "price_desc",
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "highlighted",
				"value"			=> array( esc_html__( 'Highlighted', 'prospect' ) => true )			
			),			
			array(
				"type"			=> "checkbox",
				"param_name"	=> "use_custom_color",
				"value"			=> array( esc_html__( 'Use Custom Color', 'prospect' ) => true )			
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Custom Color', 'prospect' ),
				"param_name"	=> "custom_color",
				"dependency"	=> array(
					"element"	=> "use_custom_color",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR,
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "add_button",
				"value"			=> array( esc_html__( 'Add Button', 'prospect' ) => true )
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Button Text', 'prospect' ),
				"param_name"	=> "button_text",
				"dependency"	=> array(
					"element"	=> "add_button",
					"not_empty"	=> true
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
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
				"param_name"	=> "button_alt",
				"dependency"	=> array(
					"element"	=> "add_button",
					"not_empty"	=> true
				),
				"value"			=> array( esc_html__( 'Alternative Button', 'prospect' ) => true )
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
				"type"			=> "textarea_html",
				"heading"		=> esc_html__( 'Content', 'prospect' ),
				"param_name"	=> "content",
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
	    class WPBakeryShortCode_CWS_Sc_Pricing_Plan extends WPBakeryShortCode {
	    }
	}
?>