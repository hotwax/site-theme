<?php
	// Map Shortcode in Visual Composer
	$font_options = function_exists( 'prospect_get_option' ) ? prospect_get_option( 'body_font' ) : array();
	$font_color = isset( $font_options['color'] ) ? $font_options['color'] : "";
	vc_map( array(
		"name"				=> esc_html__( 'CWS Button', 'prospect' ),
		"base"				=> "cws_sc_button",
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
				"heading"		=> esc_html__( 'Link', 'prospect' ),
				"param_name"	=> "url",
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "new_tab",
				"value"			=> array( esc_html__( 'Open in New Tab', 'prospect' ) => true )
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Size', 'prospect' ),
				"param_name"	=> "size",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array(
					esc_html__( 'Regular', 'prospect' )		=> 'regular',
					esc_html__( 'Mini', 'prospect' )		=> 'mini',
					esc_html__( 'Extra Small', 'prospect' )		=> 'extra-small',
					esc_html__( 'Small', 'prospect' )		=> 'small',
					esc_html__( 'Large', 'prospect' )		=> 'large',
					esc_html__( 'Extra Large', 'prospect' )		=> 'extra-large'
				) 
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Left/Right Padding', 'prospect' ),
				"param_name"	=> "ofs",
				"group"			=> esc_html__( "Styling", "prospect" ),
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
				"param_name"	=> "fw",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array( esc_html__( 'Full Width', 'prospect' ) => true )
			),
			array(
				"type"			=> "iconpicker",
				"heading"		=> esc_html__( 'Icon', 'prospect' ),
				"param_name"	=> "icon",
				"value"			=> ""
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Icon Position', 'prospect' ),
				"param_name"	=> "icon_pos",
				"value"			=> array(
					esc_html__( 'Right', 'prospect' )		=> 'right',
					esc_html__( 'Left', 'prospect' )		=> 'left'
				) 
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "alt",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array( esc_html__( 'Alternative', 'prospect' ) => true )
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "customize_colors",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array( esc_html__( 'Customize Colors', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Custom Color', 'prospect' ),
				"param_name"	=> "custom_color",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"dependency"	=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
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
				"value"			=> $font_color
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "without_fill",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array( esc_html__( 'Without Fill', 'prospect' ) => true )
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
	    class WPBakeryShortCode_CWS_Sc_Button extends WPBakeryShortCode {
	    }
	}
?>