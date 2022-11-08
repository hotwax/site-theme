<?php
get_header();
$p_id = get_the_id();
$meta = get_post_meta( $p_id, 'cws_mb_post' );
$meta = isset( $meta[0] ) ? $meta[0] : array();

extract( shortcode_atts( array(
			'single_img' => '0',
		), $meta) );
$single_img	= (bool)$single_img;
$sb = prospect_get_sidebars();
extract( $sb );
$page_classes = "";
$page_classes .= !empty( $sb_layout_class ) ? " {$sb_layout_class}_sidebar" : "";
$page_classes = trim( $page_classes );
$title = get_the_title();

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
				$pid = get_the_id();
				echo "<article id='post_post_{$pid}' ";
				post_class( array( 'post_post', 'post_single' ) );
				echo ">";
					ob_start();
					if ( $single_img ) {
						prospect_post_single_post_media ();
						$header_media = ob_get_clean();
					}
					$floated_media = isset( $GLOBALS['prospect_single_post_floated_media'] ) ? $GLOBALS['prospect_single_post_floated_media'] : false;
					unset( $GLOBALS['prospect_single_post_floated_media'] );
						if($floated_media){
							echo "<div class='clearfix post_post_wrapper'>";
						}
						if ( !empty( $header_media ) ){
							if ( $floated_media ){
								echo "<div class='floated_media post_floated_media single_post_floated_media'>";
									echo "<div class='floated_media_wrapper post_floated_media_wrapper single_post_floated_media_wrapper'>" . $header_media . "</div>";
								echo "</div>";
							}
							else{
								echo sprintf("%s", $header_media);
							}
						}
						echo "<div class='post_post_content_wrapper'>";
							$content = apply_filters( 'the_content', get_the_content () );
							echo !empty( $content ) ? "<div class='post_content post_post_content post_single_post_content" . ( !$floated_media ? " clearfix" : "" ) . "'>$content</div>" : "";
							prospect_post_post_header ();
							prospect_post_post_terms ();
							prospect_page_links ();
						echo "</div>";
					if($floated_media){
						echo "</div>";
					}
				echo "</article>";
			endwhile;
			wp_reset_postdata();
			unset( $GLOBALS['prospect_single_post_atts'] );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		echo "</main>";
	echo "</div>";
echo "</div>";

get_footer();
?>