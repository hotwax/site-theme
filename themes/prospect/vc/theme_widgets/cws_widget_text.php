<?php
	// Map Shortcode in Visual Composer
	vc_map( array(
		"name"				=> esc_html__( 'CWS Widget Text', 'prospect' ),
		"base"				=> "cws_sc_widget_text",
		'category'			=> "Prospect Theme Widgets",
		"weight"			=> 80,
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Title', 'prospect' ),
				"param_name"	=> "title",
			),
			array(
				"type"			=> "textarea",
				"heading"		=> esc_html__( 'Widget Content', 'prospect' ),
				"param_name"	=> "text"
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Text Align', 'prospect' ),
				"param_name"	=> "text_align",
				"value"			=> array(
					esc_html__( 'Left', 'prospect' )			=> 'left',
					esc_html__( 'Right', 'prospect' )			=> 'right',
					esc_html__( 'Center', 'prospect' )			=> 'center',
				) 
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "add_button",
				"value"			=> array( esc_html__( 'Add Button', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Custom Color', 'prospect' ),
				"param_name"	=> "color",
				"dependency"	=> array(
					"element"		=> "add_button",
					"not_empty"		=> true
				)
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Url', 'prospect' ),
				"param_name"	=> "button_url",
				"dependency"	=> array(
					"element"		=> "add_button",
					"not_empty"		=> true
				)
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Title', 'prospect' ),
				"param_name"	=> "button_text",
				"dependency"	=> array(
					"element"		=> "add_button",
					"not_empty"		=> true
				)
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
	    class WPBakeryShortCode_CWS_Sc_Widget_Text extends WPBakeryShortCode {
	    }
	}
?>