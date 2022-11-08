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
	$social_group = isset( $post_meta['social_group'] ) ? $post_meta['social_group'] : array();

	echo "<div id='page'" . ( !empty( $page_classes ) ? " class='$page_classes'" : "" ) . ">";
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
					echo "<article id='cws_portfolio_post_{$p_id}' class='cws_portfolio_post post_single clearfix'>";
						ob_start();
						prospect_cws_staff_single_post_media ();
						$media = ob_get_clean();
						$floated_media = isset( $GLOBALS['prospect_cws_portfolio_single_post_floated_media'] ) ? $GLOBALS['prospect_cws_portfolio_single_post_floated_media'] : false;
						unset( $GLOBALS['prospect_cws_portfolio_single_post_floated_media'] );
						if($floated_media){
							echo "<div class='clearfix'>";
						}
							if ( $floated_media ){
								echo "<div class='floated_media cws_staff_floated_media single_post_floated_media'>";
									echo "<div class='floated_media_wrapper cws_staff_floated_media_wrapper single_post_floated_media_wrapper'>" . $media;
									echo "</div>";
								echo "</div>";						
							}
							else{
								echo sprintf("%s", $media);
							}
							// ob_start();
							prospect_cws_staff_posts_grid_post_title ();
							$deps = prospect_get_post_term_links_str( 'cws_staff_member_department' );
							if ( !empty( $deps ) ){
								echo "<div class='post_terms cws_staff_post_terms posts_grid_post_terms'>" . $deps;
								echo "</div>";	
							}
							$deps = prospect_get_post_term_links_str( 'cws_staff_member_department' );
							$poss = prospect_get_post_term_links_str( 'cws_staff_member_position' );
							$terms = "";
							if ( !empty( $deps ) || !empty( $poss ) ){
								if ( !empty( $poss ) ){
									$terms .= !empty( $terms ) ? PROSPECT_V_SEP : "";
								}
								if ( !empty( $terms ) ){
									echo "<div class='post_terms cws_staff_post_terms single_post_terms'>" . $terms;
									echo "</div>";
								}
							}
							prospect_cws_staff_single_social_links ();
							prospect_cws_staff_single_post_content ();
						if($floated_media){
							echo "</div>";
						}
						prospect_page_links ();
					echo "</article>";
				endwhile;
				wp_reset_postdata();
				unset( $GLOBALS['prospect_single_post_atts'] );
			echo "</main>";
		echo "</div>";
	echo "</div>";

	get_footer();
?>