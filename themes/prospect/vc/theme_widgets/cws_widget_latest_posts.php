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
			'value'			=> array(
				esc_html__( 'None', 'prospect' )					=> '',
				esc_html__( 'Categories', 'prospect' )		=> 'cats',
				esc_html__( 'Tags', 'prospect' )				=> 'tags',
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
		"name"				=> esc_html__( 'CWS Widget Latest Posts', 'prospect' ),
		"base"				=> "cws_sc_widget_latest_posts",
		'category'			=> "Prospect Theme Widgets",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_CWS_Sc_Widget_Latest_Posts extends WPBakeryShortCode {
	    }
	}
?>