<?php

if ( post_password_required() ) {
	return;
}
$p_id = get_queried_object_id ();
ob_start();

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( !comments_open( $p_id ) && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		echo apply_filters( 'the_content', "[cws_sc_msg_box type='info']" . esc_html__( 'Comments are closed.', 'prospect' ) . "[/cws_sc_msg_box]" );
	}
	else{
	ob_start();

		if ( have_comments() ) {
				$comments_number = number_format_i18n( get_comments_number() );
				echo "<h2 class='comments_title'> " . esc_html__( "Comments", 'prospect' ) . " <span class='comments_number'>{$comments_number}</span>" . "</h2>";

				wp_list_comments( array(
					'walker' => new Prospect_Walker_Comment(),
					'avatar_size' => 80,
				) );

				prospect_comment_nav();

		} // have_comments()
		$list_comments = trim( ob_get_clean() );

		$comment_form_args = array(
			'label_submit' => esc_html__( 'Submit', 'prospect' ),
			'title_reply_before' => "<h2 id='reply_title' class='comment_reply_title'>",
			'title_reply_after'	=> "</h2>"
		);
		ob_start();
		comment_form( $comment_form_args );
		$comment_form = trim( ob_get_clean() );

		if ( !empty( $list_comments ) && !empty( $comment_form ) ){
			echo sprintf("%s", $list_comments . "<hr />" . $comment_form);
		}
		else{
			echo sprintf("%s", $list_comments);
			echo sprintf("%s", $comment_form);
		}

	}

$comments_section_content = ob_get_clean();
echo !empty( $comments_section_content ) ? "<section id='comments' class='comments-area'>$comments_section_content</section>" : "";
?>
