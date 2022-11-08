<?php
	$post_type = defined( "LP_COURSE_CPT" ) ? LP_COURSE_CPT : "lp_course";
	$params = array(
		array(
			"type"			=> "textfield",
			"admin_label"	=> true,
			"heading"		=> esc_html__( 'Title', 'prospect' ),
			"param_name"	=> "title",
			"value"			=> ""
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> esc_html__( 'Title Alignment', 'prospect' ),
			"param_name"	=> "title_align",
			"value"			=> array(
				esc_html__( "Left", 'prospect' ) 	=> 'left',
				esc_html__( "Right", 'prospect' )	=> 'right',
				esc_html__( "Center", 'prospect' )	=> 'center'
			)		
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> esc_html__( 'Display Style', 'prospect' ),
			"param_name"	=> "display_style",
			"value"			=> array(
				esc_html__( 'Grid', 'prospect' ) => 'grid',
				esc_html__( 'Grid with Filter', 'prospect' ) => 'filter',
				esc_html__( 'Carousel', 'prospect' ) => 'carousel'
			)
		),
		array(
			"type"			=> "textfield",
			"heading"		=> esc_html__( 'Items to display', 'prospect' ),
			"param_name"	=> "total_items_count",
			"value"			=> esc_html( get_option( 'posts_per_page' ) )
		),
		array(
			"type"			=> "textfield",
			"heading"		=> esc_html__( 'Items per Page', 'prospect' ),
			"param_name"	=> "items_pp",
			"dependency" 	=> array(
								"element"	=> "display_style",
								"value"		=> array( "grid", "filter" )
							),
			"value"			=> esc_html( get_option( 'posts_per_page' ) )
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Layout', 'prospect' ),
			'param_name'	=> 'layout',
			'save_always'	=> true,
			'value'			=> array(
				esc_html__( 'One Column', 'prospect' ) => '1',
				esc_html__( 'Two Columns', 'prospect' ) => '2',
				esc_html__( 'Three Columns', 'prospect' ) => '3',
				esc_html__( 'Four Columns', 'prospect' ) => '4'
							)
		)
	);
	$taxes = get_object_taxonomies ( $post_type, 'object' );
	$avail_taxes = array(
		esc_html__( 'None', 'prospect' )	=> ''
	);
	foreach ( $taxes as $tax => $tax_obj ){
		$tax_name = isset( $tax_obj->labels->name ) && !empty( $tax_obj->labels->name ) ? $tax_obj->labels->name : $tax;
		$avail_taxes[$tax_name] = $tax;
	}
	array_push( $params, array(
		"type"				=> "dropdown",
		"heading"			=> esc_html__( 'Filter by', 'prospect' ),
		"param_name"		=> $post_type . "_tax",
		"value"				=> $avail_taxes
	));
	foreach ( $avail_taxes as $tax_name => $tax ) {
		$terms = get_terms( $tax );
		$avail_terms = array(
			''				=> ''
		);
		if ( !is_a( $terms, 'WP_Error' ) ){
			foreach ( $terms as $term ) {
				$avail_terms[$term->name] = $term->slug;
			}
		}
		array_push( $params, array(
			"type"			=> "cws_dropdown",
			"multiple"		=> "true",
			"heading"		=> $tax_name,
			"param_name"	=> "{$post_type}_{$tax}_terms",
			"dependency"	=> array(
								"element"	=> $post_type . "_tax",
								"value"		=> $tax
							),
			"value"			=> $avail_terms
		));				
	}
	array_push( $params, array(
		"type"				=> "textfield",
		"heading"			=> esc_html__( 'Extra class name', 'prospect' ),
		"description"		=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'prospect' ),
		"param_name"		=> "el_class",
		"value"				=> ""
	));

	vc_map( array(
		"name"				=> esc_html__( 'CWS Courses Grid', 'prospect' ),
		"base"				=> "cws_sc_vc_lp_course_posts_grid",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> $params
	));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_CWS_Sc_Vc_LP_Course_Posts_Grid extends WPBakeryShortCode {
    }
}

?>