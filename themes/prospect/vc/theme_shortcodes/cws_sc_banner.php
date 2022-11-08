<?php
	// Map Shortcode in Visual Composer
	vc_map( array(
		"name"				=> esc_html__( 'CWS Banner', 'prospect' ),
		"base"				=> "cws_sc_banner",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> array(
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Url', 'prospect' ),
				"param_name"	=> "url",
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> true,
				"heading"		=> esc_html__( 'Title', 'prospect' ),
				"param_name"	=> "title",
			),
			array(
				"type"			=> "textfield",
				"heading"		=> esc_html__( 'Offer', 'prospect' ),
				"param_name"	=> "offer",
			),
			array(
				"type"			=> "iconpicker",
				"heading"		=> esc_html__( 'Icon', 'prospect' ),
				"param_name"	=> "icon",
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
				"param_name"	=> "customize_colors",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array( esc_html__( 'Customize Colors', 'prospect' ) => true )
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Background Color', 'prospect' ),
				"param_name"	=> "bg_color",
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
				"value"			=> "#fff"
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> esc_html__( 'Icon Color', 'prospect' ),
				"param_name"	=> "icon_color",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"dependency"	=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"			=> PROSPECT_THEME_COLOR
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "use_bg_img",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"value"			=> array( esc_html__( 'Use Background Image', 'prospect' ) => true )
			),
			array(
				"type"			=> "attach_image",
				"heading"		=> esc_html__( 'Background Image', 'prospect' ),
				"param_name"	=> "bg_img",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"dependency"	=> array(
					"element"	=> "use_bg_img",
					"not_empty"	=> true
				),
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Background Image Size', 'prospect' ),
				"param_name"	=> "bg_size",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"dependency"	=> array(
					"element"	=> "use_bg_img",
					"not_empty"	=> true
				),
				"value"		=> array(
					esc_html__( 'Auto', 'prospect' ) => 'auto',
					esc_html__( 'Cover', 'prospect' ) => 'cover',
					esc_html__( 'Contain', 'prospect' ) => 'contain',					
				)
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Background Image Repeat', 'prospect' ),
				"param_name"	=> "bg_repeat",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"dependency"	=> array(
					"element"	=> "use_bg_img",
					"not_empty"	=> true
				),
				"value"		=> array(
					esc_html__( 'No Repeat', 'prospect' ) 	=> 'repeat',
					esc_html__( 'Repeat', 'prospect' ) 		=> 'no-repeat'				
				)
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html__( 'Background Image Position', 'prospect' ),
				"param_name"	=> "bg_pos",
				"group"			=> esc_html__( "Styling", "prospect" ),
				"dependency"	=> array(
					"element"	=> "use_bg_img",
					"not_empty"	=> true
				),
				"value"		=> array(
					esc_html__( 'Left Top', 'prospect' ) 		=> 'left top',
					esc_html__( 'Top Center', 'prospect' ) 		=> 'top center',
					esc_html__( 'Top Right', 'prospect' ) 		=> 'top right',
					esc_html__( 'Left Center', 'prospect' ) 	=> 'left center',			
					esc_html__( 'Center Center', 'prospect' ) 	=> 'center center',
					esc_html__( 'Right Center', 'prospect' ) 	=> 'right center',
					esc_html__( 'Left Bottom', 'prospect' ) 	=> 'left bottom',
					esc_html__( 'Bottom Center', 'prospect' ) 	=> 'bottom center',	
					esc_html__( 'Right Bottom', 'prospect' ) 	=> 'right bottom'				
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
	    class WPBakeryShortCode_CWS_Sc_Banner extends WPBakeryShortCode {
	    }
	}
?>