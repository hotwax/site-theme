<?php
	get_header();

	$sb = prospect_get_sidebars();
	extract( $sb );
	$page_classes = "";
	$page_classes .= !empty( $sb_layout_class ) ? " {$sb_layout_class}_sidebar" : "";
	$page_classes = trim( $page_classes );

	$p_id = get_queried_object_id ();
	$post_meta = get_post_meta( get_the_ID(), 'cws_mb_post' );
	$post_meta = isset( $post_meta[0] ) ? $post_meta[0] : array();
	extract( wp_parse_args( $post_meta, array(
		'show_related' 		=> false,
		'rpo_title'			=> '',
		'rpo_cols'			=> '4',
		'img_size'			=> '1',
		'rpo_items_count'	=> get_option( 'posts_per_page' )
	)));
	$show_related = isset( $post_meta['show_related'] ) ? $post_meta['show_related'] : false;
	$rpo_title = isset( $post_meta['rpo_title'] ) ? esc_html( $post_meta['rpo_title'] ) : "";
	$rpo_items_count = isset( $post_meta['rpo_items_count'] ) ? esc_textarea( $post_meta['rpo_items_count'] ) : esc_textarea( get_option( "posts_per_page" ) );
	$rpo_cols = isset( $post_meta['rpo_cols'] ) ? esc_textarea( $post_meta['rpo_cols'] ) : 4;
	$title = get_the_title();
	
	echo "<div id='page'" . ( !empty( $page_classes ) ? " class='$page_classes'" : "" ) . ">";
		ob_start();
		prospect_cws_portfolio_single_post_post_media ();
		$media = ob_get_clean();
		$floated_media = isset( $GLOBALS['prospect_cws_portfolio_single_post_floated_media'] ) ? $GLOBALS['prospect_cws_portfolio_single_post_floated_media'] : false;
		unset( $GLOBALS['prospect_cws_portfolio_single_post_floated_media'] );
		if ( $img_size == 2 ) {
			echo sprintf("%s", $media);
		}
		echo "<div class='prospect_layout_container'>";
			if ( in_array( $sb_layout, array( "left", "both" ) ) ){
				echo "<ul id='left_sidebar' class='sidebar'>";
					dynamic_sidebar( $sidebar1 );
				echo "</ul>";
			}
			if ( $sb_layout === "right" ){
				echo "<ul id='right_sidebar' class='sidebar'>";
					dynamic_sidebar( $sidebar1 );
				echo "</ul>";
			}
			else if ( $sb_layout === "both" ){
				echo "<ul id='right_sidebar' class='sidebar'>";
					dynamic_sidebar( $sidebar2 );
				echo "</ul>";	
			}
			echo "<main id='page_content'>";
				$GLOBALS['prospect_single_post_atts'] = array(
					'sb_layout'						=> $sb_layout_class,
				);
				while ( have_posts() ) : the_post();
					$pid = get_the_id();
					echo "<article id='cws_portfolio_post_{$pid}' class='cws_portfolio_post post_single clearfix'>";
						ob_start();
						prospect_cws_portfolio_single_post_post_media ();
						$media = ob_get_clean();
						$floated_media = isset( $GLOBALS['prospect_cws_portfolio_single_post_floated_media'] ) ? $GLOBALS['prospect_cws_portfolio_single_post_floated_media'] : false;
						unset( $GLOBALS['prospect_cws_portfolio_single_post_floated_media'] );
						if ( $img_size == 1 ) {
							if ( $floated_media ){
								echo "<div class='floated_media cws_portfolio_floated_media single_post_floated_media'>";
									echo "<div class='floated_media_wrapper cws_portfolio_floated_media_wrapper single_post_floated_media_wrapper'>". $media;
									echo "</div>";
								echo "</div>";						
							}
							else{
								echo sprintf("%s", $media);
							}
						}
						ob_start();
						prospect_cws_portfolio_single_post_terms ();
						prospect_cws_portfolio_single_post_content ();
						$content_terms = ob_get_clean();
						if ( !empty( $content_terms ) ){
							if ( $floated_media && $img_size == 1 ){
								echo "<div class='clearfix floated_media_content cws_portfolio_single_content'>" . $content_terms;
								echo "</div>";
							}
							else{
								echo "<div class='cws_portfolio_single_content'>" . $content_terms;
								echo "</div>";
							}
						}
						prospect_page_links ();
					echo "</article>";
				endwhile;
				wp_reset_postdata();
				unset( $GLOBALS['prospect_single_post_atts'] );

				if ( $show_related ){
					$terms = wp_get_post_terms( $p_id, 'cws_portfolio_cat' );
					$term_slugs = array();
					for ( $i=0; $i < count( $terms ); $i++ ){
						$term = $terms[$i];
						$term_slug = $term->slug;
						array_push( $term_slugs, $term_slug );
					}
					$term_slugs = implode( ",", $term_slugs );
					if ( !empty( $term_slugs ) ){
						$rp_args = array(
							'title'							=> $rpo_title,
							'post_type'						=> 'cws_portfolio',
							'total_items_count'				=> $rpo_items_count,
							'display_style'					=> 'carousel',
							'cws_portfolio_layout_override'	=> true,
							'cws_portfolio_layout'			=> $rpo_cols,
							'tax'							=> 'cws_portfolio_cat',
							'terms'							=> $term_slugs,
							'addl_query_args'				=> array(
								'post__not_in'					=> array( $p_id )
							)
						);
						$related_projects = prospect_posts_grid( $rp_args );
						if ( !empty( $related_projects ) ){
							echo "<hr />" . $related_projects;
						}
					}
				}
			echo "</main>";
		echo "</div>";
	echo "</div>";

	get_footer();
?>