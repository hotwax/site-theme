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
			"type"			=> "dropdown",
			"heading"		=> esc_html__( 'Filter By', 'prospect' ),
			"param_name"	=> "filter_by",
			"value"			=> array(
				esc_html__( 'None', 'prospect' )				=> 'none',
				esc_html__( 'Categories', 'prospect' )			=> 'cat',
				esc_html__( 'Tags', 'prospect' )				=> 'tag',
				esc_html__( 'Categories and Tags', 'prospect' )	=> 'cat_tag'
			)
		)
	);
	$cat_terms = get_terms( "category" );
	$cats = array();
	foreach ( $cat_terms as $cat_term ){
		$cats[$cat_term->name] = $cat_term->slug;
	}
	if ( !empty( $cats ) ){
		array_push( $params, array(
			'type'			=> 'cws_dropdown',
			'multiple'		=> "true",
			"heading"		=> esc_html__( "Categories", "prospect" ),
			"param_name"	=> "cats",
			"dependency"	=> array(
				"element"		=> "filter_by",
				"value"			=> array( "cat", "cat_tag" )
			),
			"value"			=> $cats
		));
	}
	$tag_terms = get_terms( "post_tag" );
	$tags = array();
	foreach ( $tag_terms as $tag_term ){
		$tags[$tag_term->name] = $tag_term->slug;
	}
	if ( !empty( $tags ) ){
		array_push( $params, array(
			'type'			=> 'cws_dropdown',
			'multiple'		=> "true",
			"heading"		=> esc_html__( "Tags", "prospect" ),
			"param_name"	=> "tags",
			"dependency"	=> array(
				"element"		=> "filter_by",
				"value"			=> array( "tag", "cat_tag" )
			),
			"value"			=> $tags
		));
	}
	$params = array_merge( $params, array(
		array(
			"type"			=> "textfield",
			"heading"		=> esc_html__( 'Items per Page', 'prospect' ),
			"param_name"	=> "post_pp",
			"value"			=> "4"
		),
		array(
			"type"			=> "textfield",
			"heading"		=> esc_html__( 'Items to display', 'prospect' ),
			"param_name"	=> "count",
			"value"			=> "15"
		),
		array(
			"type"			=> "checkbox",
			"param_name"	=> "hide_cat",
			"value"			=> array( esc_html__( 'Hide Categories', 'prospect' ) => true )
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> esc_html__( 'Type', 'prospect' ),
			"param_name"	=> "type",
			"value"			=> array(
				esc_html__( 'Large Images', 'prospect' )				=> 'large_type',
				esc_html__( 'Small Images', 'prospect' )				=> 'small_type',
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
			"type"				=> "textfield",
			"heading"			=> esc_html__( 'Extra class name', 'prospect' ),
			"description"		=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'prospect' ),
			"param_name"		=> "el_class",
			"value"				=> ""
		)
	));
	vc_map( array(
		"name"				=> esc_html__( 'CWS Time Line', 'prospect' ),
		"base"				=> "cws_sc_time_line",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_CWS_Sc_Time_Line extends WPBakeryShortCode {
	    }
	}
?>