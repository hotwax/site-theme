<?php /* Template Name: Privacy Policy  */ ?>
<?php get_header(); ?> 
<div class="privacy-policy-body">
<!--******************************* Banner ************************************-->

<div class="privacy-policy-banner-outer">
	<div class="page-center">
		<div class="privacy-policy-banner-inner">
			<h1><?php the_field('heading'); ?></h1>
			<p><?php the_field('sub_heading'); ?></p>
		</div>
	</div>
</div>


<!--******************************* Introduction ************************************-->

<div class="privacy-policy-intro-outer">
	<div class="page-center">
		<div class="privacy-policy-intro-inner">
			<?php the_field('introduction'); ?>
		</div>
	</div>
</div>


<!--******************************* Content ************************************-->

<div class="privacy-policy-content-outer">
	<div class="page-center">
		<div class="privacy-policy-content-inner">
			<?php the_field('content'); ?>
		</div>
	</div>
</div>
</div>

<?php get_footer(); ?>