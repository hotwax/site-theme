<?php
	$post_types = array( 'cws_portfolio', 'cws_staff' );
	$avail_post_types = array();
	foreach ( $post_types as $post_type ){
		if ( post_type_exists( $post_type ) ){
			$post_type_obj = get_post_type_object( $post_type );
			$post_type_name = isset( $post_type_obj->labels->name ) && !empty( $post_type_obj->labels->name ) ? $post_type_obj->labels->name : $post_type;
			$avail_post_types[$post_type_name] = $post_type;
		}
	}
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
			"heading"		=> esc_html__( 'Post Type', 'prospect' ),
			"param_name"	=> "post_type",
			"save_always" 	=> true,
			"value"			=> $avail_post_types								
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> esc_html__( 'Portfolio Style', 'prospect' ),
			"param_name"	=> "portfolio_style",
			"value"			=> array(
								esc_html__( 'Default', 'prospect' ) => 'def_style',
								esc_html__( 'Hexagon Style with Icons', 'prospect' ) => 'hex_style',
								esc_html__( 'Hexagon Style with Titles', 'prospect' ) => 'hex_style_titles',
							),
			"dependency" 	=> array(
								"element"	=> "post_type",
								"value"		=> "cws_portfolio"
							),
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> esc_html__( 'Display Style', 'prospect' ),
			"param_name"	=> 'display_style',
			"value"			=> array(
								esc_html__( 'Grid', 'prospect' ) => 'grid',
								esc_html__( 'Grid with Filter', 'prospect' ) => 'filter',
								esc_html__( 'Carousel', 'prospect' ) => 'carousel'
							),
		)
	);
	$params = array_merge( $params, array(
		array(
			"type"			=> "checkbox",
			"param_name"	=> "select_filter",
			"dependency" 	=> array(
								"element"	=> 'display_style',
								"value"		=> array( "filter" )
							),
			'value'			=> array(
				esc_html__( 'Select filter', 'prospect' ) => true
			)
		),
		array(
			"type"			=> "textfield",
			"heading"		=> esc_html__( 'Items per Page', 'prospect' ),
			"param_name"	=> "items_pp",
			"dependency" 	=> array(
								"element"	=> 'display_style',
								"value"		=> array( "grid", "filter" )
							),
			"value"			=> esc_html( get_option( 'posts_per_page' ) )
		),
		array(
			"type"			=> "checkbox",
			"param_name"	=> "carousel_pagination",
			"dependency" 	=> array(
								"element"	=> 'display_style',
								"value"		=> array( "carousel" )
							),
			'value'			=> array(
				esc_html__( 'Pagination', 'prospect' ) => true
			)
		),
		array(
			"type"			=> "textfield",
			"heading"		=> esc_html__( 'Items to display', 'prospect' ),
			"param_name"	=> "total_items_count",
		),
	));
	foreach ( $avail_post_types as $post_type_name => $post_type ) {
		$layout_vals = array();
		switch ( $post_type ){
			case "cws_portfolio":
				$layout_vals = array(
					esc_html__( 'Default', 'prospect' ) => 'def',
					esc_html__( 'One Column', 'prospect' ) => '1',
					esc_html__( 'Two Columns', 'prospect' ) => '2',
					esc_html__( 'Three Columns', 'prospect' ) => '3',
					esc_html__( 'Four Columns', 'prospect' ) => '4'
				);
				break;
			case "cws_staff":
				$layout_vals = array(
					esc_html__( 'Default', 'prospect' ) => 'def',
					esc_html__( 'One Column', 'prospect' ) => '1',
					esc_html__( 'Two Columns', 'prospect' ) => '2',
					esc_html__( 'Three Columns', 'prospect' ) => '3',
					esc_html__( 'Four Columns', 'prospect' ) => '4'
				);
				break;
		}		
		if ( !empty( $layout_vals ) ){
			array_push( $params, array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__( 'Layout', 'prospect' ),
				'param_name'	=> $post_type . '_layout',
				'group'			=> $post_type_name . esc_html__( " Options", 'prospect' ),
				'dependency'	=> array(
									'element'	=> 'post_type',
									'value'		=> $post_type
								),
				'save_always'	=> true,
				'value'			=> $layout_vals
			));
		}
		if ( $post_type == 'cws_portfolio' ){
			$params = array_merge( $params, array(
				array(
					'type'			=> 'checkbox',
					'param_name'	=> $post_type . '_show_data_override',
					'group'			=> $post_type_name . esc_html__( " Options", 'prospect' ),
					'dependency'	=> array(
							'element'	=> 'post_type',
							'value'		=> $post_type
						),
					'value'			=> array(
						esc_html__( 'Customize Output', 'prospect' ) => true
					)
				),
				array(
					'type'				=> 'cws_dropdown',
					'multiple'			=> "true",
					'heading'			=> esc_html__( 'Show', 'prospect' ),
					'param_name'		=> $post_type . '_data_to_show',
					'group'				=> $post_type_name . esc_html__( " Options", 'prospect' ),					
					'dependency'		=> array(
						'element'			=> $post_type . '_show_data_override',
						'not_empty'			=> true
					),
					'value'				=> array(
						esc_html__( 'None', 'prospect' )		=> '',
						esc_html__( 'Title', 'prospect' )		=> 'title',
						esc_html__( 'Excerpt', 'prospect' )		=> 'excerpt',
						esc_html__( 'Categories', 'prospect' )	=> 'cats'
					)
				)
			));
		}
		if ( $post_type == 'cws_staff' ){
			$params = array_merge( $params, array(
				array(
					'type'			=> 'checkbox',
					'param_name'	=> $post_type . '_hide_meta_override',
					'group'			=> $post_type_name . esc_html__( " Options", 'prospect' ),
					'dependency'	=> array(
							'element'	=> 'post_type',
							'value'		=> $post_type
						),
					'value'			=> array(
						esc_html__( 'Customize Output', 'prospect' ) => true
					)
				),
				array(
					'type'				=> 'cws_dropdown',
					'multiple'			=> "true",
					'heading'			=> esc_html__( 'Hide', 'prospect' ),
					'param_name'		=> $post_type . '_data_to_hide',
					'group'				=> $post_type_name . esc_html__( " Options", 'prospect' ),
					'dependency'		=> array(
						'element'			=> $post_type . '_hide_meta_override',
						'not_empty'			=> true
					),
					'value'				=> array(
						esc_html__( 'None', 'prospect' )			=> '',
						esc_html__( 'Departments', 'prospect' )		=> 'department',
						esc_html__( 'Positions', 'prospect' )		=> 'position',
						esc_html__( 'Content', 'prospect' )			=> 'content',
					)
				),
				array(
					"type"			=> "textfield",
					'group'			=> $post_type_name . esc_html__( " Options", 'prospect' ),
					'dependency'	=> array(
							'element'	=> 'post_type',
							'value'		=> 'cws_staff'
						),
					"heading"		=> esc_html__( 'Chars Count', 'prospect' ),
					"param_name"	=> "chars_count",
				),
			));
		}		
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
			"group"				=> $post_type_name . esc_html__( " Options", 'prospect' ),
			"dependency"		=> array(
					'element'	=> 'post_type',
					'value'		=> $post_type
				),
			"value"				=> $avail_taxes
		));
		foreach ( $avail_taxes as $tax_name => $tax ) {
			$terms = get_terms( $tax );
			$avail_terms =  array(
				''    => ''
				);
			$hierarchy = _get_term_hierarchy($tax);
			if ( !is_a( $terms, 'WP_Error' ) ){
				foreach($terms as $term) {
					if(isset($term)){
						if($term->parent) {
							continue;
						}    
						$avail_terms[] = $term->name;  
						if(isset($hierarchy[$term->term_id])) { 
							$children = _get_term_children($term->term_id, $terms, $tax);          
							foreach($children as $child) {
								$child = get_term($child, $tax);
								$ancestors = get_ancestors( $child->term_id, $child->taxonomy );
								$depth = $ancestors = count($ancestors);
								if($child->count > 0){
									if($depth <= $ancestors){       
										$avail_terms[] =  str_repeat("-", $depth) . ' ('.$term->name.') '.$child->slug;
									}
								}
							}
						}     
					}    
				}

			}
			
			array_push( $params, array(
				"type"			=> "cws_dropdown",
				"multiple"		=> "true",
				"heading"		=> $tax_name,
				"param_name"	=> "{$post_type}_{$tax}_terms",
				"group"				=> $post_type_name . esc_html__( " Options", 'prospect' ),
				"dependency"	=> array(
									"element"	=> $post_type . "_tax",
									"value"		=> $tax
								),
				"value"			=> $avail_terms
			));				
		}
	}
	array_push( $params, array(
		"type"				=> "textfield",
		"heading"			=> esc_html__( 'Extra class name', 'prospect' ),
		"description"		=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'prospect' ),
		"param_name"		=> "el_class",
		"value"				=> ""
	));
	vc_map( array(
		"name"				=> esc_html__( 'CWS Posts Grid', 'prospect' ),
		"base"				=> "cws_sc_vc_posts_grid",
		'category'			=> "Prospect Theme Shortcodes",
		"weight"			=> 80,
		"params"			=> $params
	));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_CWS_Sc_Vc_Posts_Grid extends WPBakeryShortCode {
    }
}
?>