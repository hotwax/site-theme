<?php

function prospect_cws_staff_posts_grid_posts ( $q = null ){
	if ( !isset( $q ) ) return;
	$def_grid_atts = array(
					'layout'						=> '1',
					'cws_staff_data_to_hide'		=> array(),
					'chars_count'					=> '200',
					'total_items_count'				=> PHP_INT_MAX
				);
	$grid_atts = isset( $GLOBALS['prospect_posts_grid_atts'] ) ? $GLOBALS['prospect_posts_grid_atts'] : $def_grid_atts;
	extract( $grid_atts );
	$paged = $q->query_vars['paged'];
	if ( $paged == 0 && $total_items_count < $q->post_count ){
		$post_count = $total_items_count;
	}
	else{
		$ppp = $q->query_vars['posts_per_page'];
		$posts_left = $total_items_count - ( $paged - 1 ) * $ppp;
		$post_count = $posts_left < $ppp ? $posts_left : $q->post_count;
	}
	if ( $q->have_posts() ):
		ob_start();
		while( $q->have_posts() && $q->current_post < $post_count - 1 ):
			$q->the_post();
			prospect_cws_staff_posts_grid_post ();
		endwhile;
		wp_reset_postdata();
		ob_end_flush();
	endif;		
}

function prospect_get_cws_staff_thumbnail_dims ( $real_dims = array() ) {
	$def_grid_atts = array(
					'layout'				=> '1',
					'sb_layout'				=> '',
					'chars_count'			=> '200',
				);
	$def_single_atts = array(
					'sb_layout'				=> '',
				);
	$grid_atts = isset( $GLOBALS['prospect_posts_grid_atts'] ) ? $GLOBALS['prospect_posts_grid_atts'] : $def_grid_atts;
	$single_atts = isset( $GLOBALS['prospect_single_post_atts'] ) ? $GLOBALS['prospect_single_post_atts'] : $def_single_atts;
	$single = is_single();
	if ( $single ){
		extract( $single_atts );
	}
	else{
		extract( $grid_atts );
	}
	$dims = array( 'width' => 0, 'height' => 0 , 'crop' => true);
	if ($single){
		if ( ( empty( $real_dims ) || ( isset( $real_dims['width'] ) && $real_dims['width'] > 1170 ) ) ) {
			$dims['width']	= 1170;
		}
	}
	else{
		$dims['width']		= 200;
		$dims['height']		= 225;
	}
	return $dims;
}

function prospect_cws_staff_posts_grid_post (){
	$def_grid_atts = array(
					'layout'					=> '1',
					'cws_staff_data_to_hide'	=> array(),
					'chars_count'			=> '200',
				);
	$grid_atts = isset( $GLOBALS['prospect_posts_grid_atts'] ) ? $GLOBALS['prospect_posts_grid_atts'] : $def_grid_atts;
	extract( $grid_atts );
	$pid = get_the_id();
	$item_id = uniqid( "cws_staff_post_" );
	$post_meta = get_post_meta( $pid, 'cws_mb_post' );
	$post_meta = isset( $post_meta[0] ) ? $post_meta[0] : array();
	$color = isset( $post_meta['color'] ) ? $post_meta['color']: PROSPECT_THEME_COLOR;
	$style = "";
		$style .= "#{$item_id}:hover .cws_staff_posts_grid_post_data_divider{
			background-color: $color;
		}
		@media screen and ( min-width: 981px ){
			#page.single_sidebar .cws_staff_posts_grid.posts_grid_2 #{$item_id} .cws_staff_posts_grid_post_data_divider,
			#page.double_sidebar .cws_staff_posts_grid.posts_grid_2 #{$item_id} .cws_staff_posts_grid_post_data_divider{
				background-color: $color;
			}
			#page.single_sidebar .cws_staff_posts_grid.posts_grid_2 #{$item_id} .post_social_links,
			#page.double_sidebar .cws_staff_posts_grid.posts_grid_2 #{$item_id} .post_social_links{
				color: $color;
			}
		}
		@media screen and ( max-width: 479px ){
			#{$item_id} .cws_staff_posts_grid_post_data_divider{
				background-color: $color;
			}
			#{$item_id} .post_social_links{
				color: $color;
			}
		}";
	$style = json_encode($style);
	echo "<article id='$item_id' data-style='".esc_attr($style)."' data-pid='$pid' class='item cws_staff_post posts_grid_post render_styles' data-color='" . esc_html( $color ) . "'>";
		echo "<div class='prospect_wrapper clearfix'>";
			ob_start();
			prospect_cws_staff_posts_grid_post_media ();
			$media = ob_get_clean();
			if ( !empty($media ) ){
				echo "<div class='floated_media posts_grid_post_floated_media cws_staff_posts_grid_post_floated_media'>";
					echo "<div class='floated_media_wrapper posts_grid_post_floated_media_wrapper cws_staff_posts_grid_post_floated_media_wrapper'>" . $media;
					echo "</div>";
				echo "</div>";
			}
			echo "<div class='prospect_cws_staff_posts_grid_post_data'>";
				ob_start();
				prospect_cws_staff_posts_grid_post_title ();
				if ( !in_array( 'department', $cws_staff_data_to_hide ) ) {
					$deps = prospect_get_post_term_links_str( 'cws_staff_member_department' );
					if ( !empty( $deps ) ){
						echo "<div class='post_terms cws_staff_post_terms posts_grid_post_terms'>" . $deps;
						echo "</div>";	
					}
				}
				if ( !in_array( 'position', $cws_staff_data_to_hide ) ) {
					$poss = prospect_get_post_term_links_str( 'cws_staff_member_position' );
					if ( !empty( $poss ) ){
						echo "<div class='post_terms cws_staff_post_terms posts_grid_post_terms'>" . $poss;
						echo "</div>";	
					}
				}	
				$title_terms = ob_get_clean();	
				ob_start();
				if ( !in_array( 'content', $cws_staff_data_to_hide ) ) {
					prospect_cws_staff_posts_grid_post_content ();
				}
				prospect_cws_staff_posts_grid_social_links ();
				$content_links = ob_get_clean();
				if ( empty( $title_terms ) || empty( $content_links ) ){
					echo sprintf("%s", $title_terms);
					echo sprintf("%s", $content_links);
				}
				else{
					echo sprintf("%s", $title_terms);
					echo sprintf("%s", $content_links);
				}
			echo "</div>";
		echo "</div>";
		echo "<hr class='posts_grid_spacing' />";
	echo "</article>";
}
function prospect_cws_staff_posts_grid_post_media (){
	$pid = get_the_id();
	$figure_form_style = 'hexagon';
	$figure_style =  prospect_figure_style() ;
	$permalink = get_the_permalink( $pid );
	$def_grid_atts = array(
					'layout'						=> '1',
					'cws_staff_data_to_hide'		=> array(),
					'chars_count'			=> '200',
				);
	$grid_atts = isset( $GLOBALS['prospect_posts_grid_atts'] ) ? $GLOBALS['prospect_posts_grid_atts'] : $def_grid_atts;	
	extract( $grid_atts );
	$post_url = esc_url(get_the_permalink());
	$post_meta = get_post_meta( $pid, 'cws_mb_post' );
	$post_meta = isset( $post_meta[0] ) ? $post_meta[0] : array();
	$thumbnail_props = has_post_thumbnail() ? wp_get_attachment_image_src(get_post_thumbnail_id( ),'full') : array();
	$thumbnail = !empty( $thumbnail_props ) ? $thumbnail_props[0] : '';
	$thumbnail_dims = prospect_get_cws_staff_thumbnail_dims();
	$thumb_obj = cws_thumb( $thumbnail, $thumbnail_dims, false );
	$thumb_url = isset( $thumb_obj[0] ) ? esc_url($thumb_obj[0]) : "";
	$retina_thumb_exists = false;
	$retina_thumb_url = "";	
	if ( isset( $thumb_obj[3] ) ){
		extract( $thumb_obj[3] );
	}			
	$retina_thumb_url = esc_attr($retina_thumb_url);
	$clickable = isset( $post_meta['is_clickable'] ) ? $post_meta['is_clickable']: false;
	if ( $figure_form_style == 'hexagon' ) { 
		$canvas_height = "225";
	} else if ( $figure_form_style == 'pentagon' ) {
		$canvas_height = "190";
	} else if ( $figure_form_style == 'triangle' ) {
		$canvas_height = "225";
	}
	if ( !empty( $thumb_url ) ){
	?>
		<div class="post_media cws_staff_post_media cws_staff_posts_grid_post_media">
			<?php
				echo "<div class='cws_staff_photo'>";
					echo "<div class='figure_container medium " . $figure_form_style . "' style=''>" . prospect_figure_style();
						if($clickable){
							echo "<a class='link fa fa-share' href='$permalink'>" . prospect_figure_style() . "</a>";
						}
						echo "<img src='$thumb_url' data-at2x='$retina_thumb_url' alt />";
					echo "<canvas height='" . $canvas_height . "' width='200'></canvas></div>";
				echo "</div>";
			?>
		</div>
	<?php
	}	
}
function prospect_cws_staff_posts_grid_post_title (){
	$title = get_the_title();
	echo !empty( $title ) ?	"<h3 class='post_title cws_staff_post_title posts_grid_post_title'>$title</h3>" : "";	
}
function prospect_cws_staff_posts_grid_post_content (){
	$def_grid_atts = array(
					'chars_count'			=> '200',
				);
	$grid_atts = isset( $GLOBALS['prospect_posts_grid_atts'] ) ? $GLOBALS['prospect_posts_grid_atts'] : $def_grid_atts;	
	extract( $grid_atts );
	$pid = get_the_id();
	$post = get_post( $pid );
	$post_content = !empty( $post->post_excerpt ) ? $post->post_excerpt : $post->post_content;
	$post_content = esc_html( $post_content );
	if ( empty( $post->post_excerpt ) && !empty( $post->post_content ) ){
		$post_content = trim( preg_replace( '/[\s]{2,}/u', ' ', strip_shortcodes( strip_tags( $post_content ) ) ) );
   		$post_content = wptexturize( $post_content );
		$chars_count = (int)$chars_count;
		$post_content = mb_substr( $post_content, 0, $chars_count );
	}
	if ( !empty( $post_content ) ){
		echo "<div class='post_content posts_grid_post_content cws_staff_post_content'>" . $post_content;
		echo "</div>";
	}
}
function prospect_cws_staff_posts_grid_social_links (){
	$pid = get_the_id();
	$post_meta = get_post_meta( $pid, 'cws_mb_post' );
	$post_meta = isset( $post_meta[0] ) ? $post_meta[0] : array();
	$social_group = isset( $post_meta['social_group'] ) ? $post_meta['social_group']: array();
	$icons = "";
	foreach ( $social_group as $social ) {
		$title = isset( $social['title'] ) ? $social['title'] : "";
		$icon = isset( $social['icon'] ) ? $social['icon'] : "";
		$url = isset( $social['url'] ) ? $social['url'] : "";
		if ( !empty( $icon ) && !empty( $url ) ){
			$icons .= "<a href='$url' target='_blank' class='fa fa-{$icon}'" . ( !empty( $title ) ? " title='$title'" : "" ) . ">" . prospect_figure_style() . "</a>";
		}
	}
	if ( !empty( $icons ) ){
		echo "<div class='post_social_links cws_staff_social_links posts_grid_social_links'>" . $icons;
		echo "</div>";
	}
}
function prospect_cws_staff_single_social_links (){
	$pid = get_the_id();
	$post_meta = get_post_meta( $pid, 'cws_mb_post' );
	$post_meta = isset( $post_meta[0] ) ? $post_meta[0] : array();
	$social_group = isset( $post_meta['social_group'] ) ? $post_meta['social_group']: array();
	$icons = "";
	foreach ( $social_group as $social ) {
		$title = isset( $social['title'] ) ? $social['title'] : "";
		$icon = isset( $social['icon'] ) ? $social['icon'] : "";
		$url = isset( $social['url'] ) ? $social['url'] : "";
		if ( !empty( $icon ) && !empty( $url ) ){
			$icons .= "<a href='$url' target='_blank' class='fa fa-{$icon} fa-lg'" . ( !empty( $title ) ? " title='$title'" : "" ) . ">" . prospect_figure_style() . "</a>";
		}
	}
	if ( !empty( $icons ) ){
		echo "<div class='post_social_links cws_staff_social_links single_social_links'>" . $icons;
		echo "</div>";
	}	
}

function prospect_cws_staff_single_post_media (){
	$pid = get_the_id();
	$figure_form_style = 'hexagon';
	$figure_style =  prospect_figure_style() ;
	$post_meta = get_post_meta( $pid, 'cws_mb_post' );
	$post_meta = isset( $post_meta[0] ) ? $post_meta[0] : array();
	$thumbnail_props = has_post_thumbnail() ? wp_get_attachment_image_src(get_post_thumbnail_id( ),'full') : array();
	$thumbnail = !empty( $thumbnail_props ) ? $thumbnail_props[0] : '';
	$real_thumbnail_dims = array();
	if ( !empty( $thumbnail_props ) && isset( $thumbnail_props[1] ) ) $real_thumbnail_dims['width'] = $thumbnail_props[1];
	if ( !empty(  $thumbnail_props ) && isset( $thumbnail_props[2] ) ) $real_thumbnail_dims['height'] = $thumbnail_props[2];
	$thumbnail_dims = array( 'width' => '280px', 'height' => '310px' , 'crop' => true );
	$crop_thumb = isset( $thumbnail_dims['width'] ) && $thumbnail_dims['width'] > 0;
	$thumb_obj = cws_thumb( $thumbnail, $thumbnail_dims, false );
	$thumb_url = isset( $thumb_obj[0] ) ? esc_url($thumb_obj[0]) : "";
	$retina_thumb_exists = false;
	$retina_thumb_url = "";	
	if ( isset( $thumb_obj[3] ) ){
		extract( $thumb_obj[3] );
	}	
	if ( $figure_form_style == 'hexagon' ) { 
		$canvas_height = "310";
	} else if ( $figure_form_style == 'pentagon' ) {
		$canvas_height = "190";
	} else if ( $figure_form_style == 'triangle' ) {
		$canvas_height = "310";
	}		
	$retina_thumb_url = esc_attr($retina_thumb_url);
	if ( !empty( $thumb_url ) ){
	?>
		<div class="post_media cws_staff_post_media single_post_media">
			<?php
				echo "<div class='cws_staff_photo'>";
					echo "<div class='figure_container big " . $figure_form_style . "' style=''>";
						if ( $retina_thumb_exists ) {
							echo "<img src='$thumb_url' data-at2x='$retina_thumb_url' alt />";
						}
						else{
							echo "<img src='$thumb_url' data-no-retina alt />";
						}
						echo "<canvas height='" . $canvas_height . "' width='280'></canvas>";
					echo "</div>";
				echo "</div>";
			?>
		</div>
	<?php
		$GLOBALS['prospect_cws_portfolio_single_post_floated_media'] = !$crop_thumb ? true : false;
	}	
}

function prospect_cws_staff_single_post_content (){
	$pid = get_the_id();
	$post = get_post( $pid );
	$post_content =  apply_filters( 'the_content', $post->post_content );
	if ( !empty( $post_content ) ){
		echo "<div class='post_content single_post_content cws_staff_post_content'>" . $post_content;
		echo "</div>";
	}
}

?>