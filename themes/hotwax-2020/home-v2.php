<?php /* Template Name: Home V2 */ ?>
<?php get_header(); ?>
<style>
	.banner-wrapper{
	position: relative;
    padding-top: 150px;
    padding-bottom: 30px;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), color-stop(36%, hsla(0, 0%, 100%, 0))), -webkit-gradient(linear,       left top, left bottom, from(hsla(0, 0%, 100%, 0.95)), to(hsla(0, 0%, 100%, 0.95))), url(images/fashionbg.svg);
    background-image: linear-gradient(180deg, #fff, hsla(0, 0%, 100%, 0) 36%), linear-gradient(180deg, hsla(0, 0%, 100%, 0.95), hsla(0, 0%, 100%,         0.95)), url(https://www.hotwax.co/wp-content/themes/hotwax-2020/images/fashionbg.svg);
    background-position: 0px 0px, 0px 0px, 50% 50%;
    background-size: auto, auto, 1150px;
    text-align: center;
	}
	.banner-heading h1{
    padding-top: 10px;
    padding-bottom: 10px;
    font-family: Montserrat, sans-serif;
    color: #000;
    font-size: 56px;
    line-height: 61px;
    font-weight: 800;
    text-transform: uppercase;
	}
	.banner-description {
    padding: 20px 0px;
    color: #666;
    font-size: 16px;
    line-height: 24px;
    font-weight: 400;
    text-align: center;
}
	.banner-content {
    margin-bottom: 50px;
    max-width: 1018px;
    margin: 0 auto;
}
	.customer-brands-heading{
	margin-top: 8px;
    margin-bottom: 9px;
    font-family: Montserrat, sans-serif;
    color: #ec2227;
    font-size: 17px;
    line-height: 20px;
    text-transform: uppercase;
	}
</style>
<div class="home-v2-wrapper">
  <div class="banner-wrapper">
    <div class="container-5 w-container">
      <?php $banner = get_field('banner'); if( $banner ): ?>
      <div class="banner-content">
		<div class="banner-heading">
			<h1><?php echo $banner['banner_heading'] ?></h1>
		</div>
		<div class="banner-sub-heading">
			<h2><?php echo $banner['banner_sub_heading'] ?></h2>
		</div>
		<div class="banner-description">
			<?php echo $banner['banner_description'] ?>
		</div>
	  </div>
		<div class="banner-button">
          <a href="<?php echo $banner['banner_cta_button_redirect'] ?>" class="button w-button"><?php echo $banner['banner_cta_button_text'] ?></a>
		</div>
      <?php endif; ?>
    </div>
  </div>
  <div class="customers-brands">
	  <?php $customer_brands = get_field('customer_brands'); if( $customer_brands ): ?>
  <div class="customers">
    <div class="w-container">
      <h2 class="customer-brands-heading"><?php echo $customer_brands['heading']; ?></h2>
		<div class="header-accent"></div>
      <div class="customer-logos-container">
        <div class="customer-logo-container"><img src="../wp-content/themes/hotwax-2020/images/logo-essilor.svg" alt="" class="customer-logo essilor"></div>
        <div class="hex-divider"></div>
        <div class="customer-logo-container"><img src="../wp-content/themes/hotwax-2020/images/logo-ware2go.svg" alt="" class="customer-logo w2g"></div>
        <div class="hex-divider"></div>
        <div class="customer-logo-container"><img src="../wp-content/themes/hotwax-2020/images/logo-standard-restaurant-supply.png" srcset="../wp-content/themes/hotwax-2020/images/logo-standard-restaurant-supply-p-500.png 500w, ../wp-content/themes/hotwax-2020/images/logo-standard-restaurant-supply-p-800.png 800w, ../wp-content/themes/hotwax-2020/images/logo-standard-restaurant-supply-p-1080.png 1080w, ../wp-content/themes/hotwax-2020/images/logo-standard-restaurant-supply-p-1600.png 1600w, ../wp-content/themes/hotwax-2020/images/logo-standard-restaurant-supply-p-2000.png 2000w, ../wp-content/themes/hotwax-2020/images/logo-standard-restaurant-supply-p-2600.png 2600w, ../wp-content/themes/hotwax-2020/images/logo-standard-restaurant-supply-p-3200.png 3200w, ../wp-content/themes/hotwax-2020/images/logo-standard-restaurant-supply.png 4524w" sizes="(max-width: 479px) 151px, (max-width: 767px) 31vw, 159px" alt="" class="customer-logo standard-restaurant-supply"></div>
        <div class="hex-divider"></div>
        <div class="customer-logo-container"><img src="../wp-content/themes/hotwax-2020/images/logo-winning-appliances.svg" alt="" class="customer-logo essilor"></div>
        <div class="hex-divider"></div>
        <div class="customer-logo-container"><img src="../wp-content/themes/hotwax-2020/images/logo-cabi.svg" alt="" class="customer-logo cabi"></div>
        <div class="hex-divider"></div>
        <div class="customer-logo-container"><img src="../wp-content/themes/hotwax-2020/images/logo-marco.svg" alt="" class="customer-logo marco"></div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  </div>
  <div class="unify-wrapper">
	  <div class="container-5 w-container">
      <?php $unify = get_field('unify'); if( $unify ): ?>
      <div class="unify-inner-wrapper">
		<div class="unify-heading">
			<h1><?php echo $unify['heading'] ?></h1>
		</div>
		<div class="stats-group">
			<?php if ( have_rows( 'stats_group' ) ) :  ?>
          <?php while ( have_rows( 'stats_group' ) ) : the_row(); ?>
                <h2><?php the_sub_field('stat_number'); ?> </h2>
                <h3><?php the_sub_field('stat_name'); ?></h3>
			    <p><?php the_sub_field('stat_description'); ?></p>
          <?php endwhile; ?>
        <?php endif; ?>
		</div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>