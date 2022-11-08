<!DOCTYPE html>
<html <?php language_attributes(); ?> data-wf-page="5df465766a31d51a2f3535c2" data-wf-site="5de96a7a31edea14b9b2c876">
<head>
	<?php do_action( 'prospect_header_meta' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php
		$boxed_layout = prospect_get_option( "boxed_layout" );
		?>
		<div id="document"<?php if($boxed_layout) echo " class='boxed'"; ?>>
		<?php
			prospect_header();
	?>