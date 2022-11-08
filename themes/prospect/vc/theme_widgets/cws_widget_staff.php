<?php
	// Map Shortcode in Visual Composer
	$params = array(
		array(
			"type"			=> "textfield",
			"admin_label"	=> true,
			"heading"		=> esc_html__( 'Title', 'prospect' ),
			"param_name"	=> "title",
		),
		array(
			"type"			=> "iconpicker",
			"heading"		=> esc_html__( 'Widget Icon', 'prospect' ),
			"param_name"	=> "icon",
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> esc_html__( 'Filter By', 'prospect' ),
			"param_name"	=> "filter_by",
			"value"			=> array(
				esc_html__( 'None', 'prospect' )						=> 'none',
				esc_html__( 'Departments', 'prospect' )					=> 'department',
				esc_html__( 'Positions', 'prospect' )					=> 'position',
				esc_html__( 'Departments and Positions', 'prospect' )	=> 'department_position'
			)
		)
	);
	$dep_terms = get_terms( "cws_staff_member_department" );
	$deps = array();
	if ( !is_a( $dep_terms, 'WP_Error' ) ){
		foreach ( $dep_terms as $dep_term ){
			$deps[$dep_term->name] = $dep_term->slug;
		}
	}
	if ( !empty( $deps ) ){
		array_push( $params, array(
			'type'				=> 'cws_dropdown',
			'multiple'			=> "true",
			"heading"			=> esc_html__( "Departments", "prospect" ),
			"param_name"		=> "departments",
			"dependency"		=> array(
				"element"			=> "filter_by",
				"value"				=> array( "department", "department_position" )
			),
			"value"				=> $deps
		));
	}
	$pos_terms = get_terms( "cws_staff_member_position" );
	$poss = array();
	if ( !is_a( $dep_terms, 'WP_Error' ) ){
		foreach ( $pos_terms as $pos_term ){
			$poss[$pos_term->name] = $pos_term->slug;
		}
	}
	if ( !empty( $poss ) ){
		array_push( $params, array(
			'type'				=> 'cws_dropdown',
			'multiple'			=> "true",
			"heading"			=> esc_html__( "Positions", "prospect" ),
			"param_name"		=> "positions",
			"dependency"		=> array(
				"element"			=> "filter_by",
				"value"				=> array( "position", "department_position" )
			),
			"value"				=> $poss
		));
	}
	$params = array_merge( $params, array(
		array(
			"type"			=> "textfield",
			"heading"		=> esc_html__( 'Posts to Show', 'prospect' ),
			"param_name"	=> "count",
			"value"			=> "4"
		),
		array(
			"type"			=> "textfield",
			"heading"		=> esc_html__( 'Posts per slide', 'prospect' ),
			"param_name"	=> "visible_count",
			"value"			=> "2"
		),
		array(
			'type'				=> 'cws_dropdown',
			'multiple'			=> "true",
			'heading'			=> esc_html__( 'Hide', 'prospect' ),
			'param_name'		=> 'hide',
			'value'				=> array(
				esc_html__( 'None', 'prospect' )			=> '',
				esc_html__( 'Departments', 'prospect' )		=> 'departments',
				esc_html__( 'Positions', 'prospect' )		=> 'positions',
				esc_html__( 'Description', 'prospect' )		=> 'desc'
			)
		),
		array(
			"type"			=> "textfield",
			"heading"		=> esc_html__( 'Chars Count', 'prospect' ),
			"desc"			=> esc_html__( 'Count of chars from post content', 'prospect' ),
			"param_name"	=> "chars_count",
			"value"			=> "70"
		),
		array(
			"type"			=> "checkbox",
			"param_name"	=> "add_custom_color",
			"value"			=> array( esc_html__( 'Add Custom Color', 'prospect' ) => true )
		),
		array(
			"type"			=> "colorpicker",
			"heading"		=> esc_html__( 'Custom Color', 'prospect' ),
			"param_name"	=> "color",
			"dependency"	=> array(
				"element"		=> "add_custom_color",
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
	));
	vc_map( array(
		"name"				=> esc_html__( 'CWS Widget CWS Staff', 'prospect' ),
		"base"				=> "cws_sc_widget_cws_staff",
		'category'			=> "Prospect Theme Widgets",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_CWS_Sc_Widget_CWS_Staff extends WPBakeryShortCode {
	    }
	}
?>