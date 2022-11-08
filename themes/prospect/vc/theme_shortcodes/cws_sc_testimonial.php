<?php
	// Map Shortcode in Visual Composer
	vc_map( array(
		"name"				=> esc_html__( 'CWS Testimonial', 'prospect' ),
		"base"				=> "cws_sc_vc_testimonial",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> array(
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Quote', 'prospect' ),
				"param_name"	=> "quote",
			),
			array(
				"type"			=> "attach_image",
				"heading"		=> esc_html__( 'Thumbnail', 'prospect' ),
				"param_name"	=> "thumbnail",
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Image Type', 'prospect' ),
				"param_name"	=> "type_tes",
				"value"			=> array(
					esc_html__( 'Default', 'prospect' )		=> 'default',
					esc_html__( 'Hexagon', 'prospect' )		=> 'hexagon',
				) 
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Author Name', 'prospect' ),
				"param_name"	=> "author_name",
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Author Status', 'prospect' ),
				"param_name"	=> "author_status",
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
	    class WPBakeryShortCode_CWS_Sc_Testimonial extends WPBakeryShortCode {
	    }
	}
?>