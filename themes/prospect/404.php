<?php
	get_header();
	$home_url = get_site_url();
	?>
	<div id='page'>
		<div class='prospect_layout_container'>
			<main id='page_content'>
				<section id='banner_404_section'>
					<div class='prospect_layout_container'>
						<div id='banner_404'>
							<div id='banner_404_number'>
								<img src="<?php echo esc_url( PROSPECT_THEME_URI . '/img/404.png' ); ?>" alt />
							</div>
							<div id='banner_404_content'>
								<div id='banner_404_title'>
									<?php echo esc_html__( 'Page not found', 'prospect' ); ?>
								</div>
							</div>
							<div id='banner_404_away'>
								<?php echo "<a href='$home_url' class='prospect_button'>" . esc_html__( 'Homepage', 'prospect' ) . "</a>"; ?>
							</div>
						</div>
					</div>
				</section>
			</main>
		</div>
	</div>
	<?php
	get_footer();
?>