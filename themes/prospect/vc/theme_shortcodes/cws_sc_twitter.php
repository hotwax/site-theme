<?php
	// Map Shortcode in Visual Composer
	$font_options = prospect_get_option( 'body_font' );
	$font_color = $font_options['color'];
	vc_map( array(
		"name"				=> esc_html__( 'CWS Twitter', 'prospect' ),
		"base"				=> "cws_sc_twitter",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> array(
			array(
				"type"			=> "iconpicker",
				"heading"		=> esc_html__( 'Icon', 'prospect' ),
				"param_name"	=> "icon",
				"value"			=> ""
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "customize_colors",
				"value"			=> array( esc_html__( 'Use Custom Icon Color', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Icon Color', 'prospect' ),
				"param_name"	=> "custom_font_color",
				"dependency"	=> array(
					"element"		=> "customize_colors",
					"not_empty"		=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
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
				"type"				=> "textfield",
				"heading"			=> esc_html__( 'Extra class name', 'prospect' ),
				"description"		=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'prospect' ),
				"param_name"		=> "el_class",
				"value"				=> ""
			)
		)
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_CWS_Sc_Twitter extends WPBakeryShortCode {
	    }
	}
?>