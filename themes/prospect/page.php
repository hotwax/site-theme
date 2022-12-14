<?php

get_header ();

$sb = prospect_get_sidebars();
extract( $sb );
$page_classes = "";
$page_classes .= !empty( $sb_layout_class ) ? " {$sb_layout_class}_sidebar" : "";
$page_classes = trim( $page_classes );

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
			while ( have_posts() ) : the_post();
				the_content();
				prospect_page_links();
			endwhile;
			wp_reset_postdata();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				echo "<hr />";
				comments_template();
			}
		echo "</main>";
	echo "</div>";
echo "</div>";

get_footer();

?>