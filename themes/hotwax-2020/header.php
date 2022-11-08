<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hotwax
 */

?>

<!doctype html>
<html <?php language_attributes(); ?> data-wf-page="5df465766a31d51a2f3535c2" data-wf-site="5de96a7a31edea14b9b2c876">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link rel="apple-touch-icon" sizes="180x180" href="../wp-content/themes/hotwax-2020/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../wp-content/themes/hotwax-2020/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/../wp-content/themes/hotwax-2020/favicon-16x16.png">
		<link rel="manifest" href="../wp-content/themes/hotwax-2020/site.webmanifest">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo get_stylesheet_directory_uri(). '/css/normalize.css' ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo get_stylesheet_directory_uri(). '/css/webflow.css' ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo get_stylesheet_directory_uri(). '/style.css' ?>" rel="stylesheet" type="text/css">		
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
		<script type="text/javascript">WebFont.load({  google: {    families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]  }});</script>
		<!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
		<script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);
		</script>
		<script src="https://cdn-in.pagesense.io/js/hotwaxsoftwarepvtltd/ee83b2738ccd475dbf0038344a441274.js"></script>				
		<?php touch('wp-content/themes/hotwax-2020/home-v2.php'); ?>
		<?php wp_head(); ?>

		<script>
			

		</script>
		
		
	</head>
	<body class="main">
			<!-- header -->
			<header data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav" role="banner">
					<div class="container header-nav w-container">
						<!-- logo -->
						<a href="<?php echo home_url(); ?>" class="brand w-nav-brand">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo-hotwax-dark.svg" alt="Logo" class="logo-img">
						</a>
						<a href="<?php echo home_url(); ?>" class="brand w-nav-brand">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo-hotwax-icon.svg" alt="" class="header-logo icon">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo-hotwax-dark.svg" alt="" class="header-logo dark">
						</a>
						<!-- /logo -->

						<!-- nav -->
						<nav role="navigation" class="w-nav-menu">
							<?php html5blank_nav(); ?>
					    </nav>
					    <div class="w-nav-button">
					    	<div class="w-icon-nav-menu"></div>
					    </div>
						<!-- /nav -->
					</div>
				
					<!-- Custom Mega Menu -->
					<div class="custom-header-wrapper hotwax-custom-menu">
					  <div class="page-center">
						<div class="hotwax-custom-menu-inner">
						<div class="logo">
						  <!-- logo -->
						  <a href="<?php echo home_url(); ?>" class="brand w-nav-brand">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo-hotwax-dark.svg" alt="Logo" class="logo-img">
						  </a>
						  <a href="<?php echo home_url(); ?>" class="brand w-nav-brand">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo-hotwax-icon.svg" alt="" class="header-logo icon">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo-hotwax-dark.svg" alt="" class="header-logo dark">
						  </a>
						  <!-- /logo -->
						</div>
						<div class="right-custom-menu">
						  <div class="mega-menu-outer-wrap">
							<div class="mega-menu-inner">
							  <div class="mega-menu-list-wrap">
								<?php if( have_rows('menu_repeater','options') ): ?>
								<?php while( have_rows('menu_repeater','options') ): the_row(); ?>
								<div class="mega-menu-list-main">
								  <div class="mega-menu-list-items">
									<?php
									$link = get_sub_field('primary_level');
									if( $link ): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<a class="nav-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
									  <?php echo esc_html( $link_title ); ?> 
									  <?php if(get_sub_field('sub_menu_onoff') == 'yes'): ?>                
									   <i class="fa fa-chevron-down" aria-hidden="true"></i>
									  <?php endif; ?>
									</a>
									<?php endif; ?>
								  </div>
								<?php if(get_sub_field('sub_menu_onoff') == 'yes'): ?> 
								  <div class="mega-menu-list-sub-wrap class<?php the_sub_field('mega_simple'); ?>">
									<?php if( have_rows('sub_menu_repeater','options') ): ?>
									  <?php while( have_rows('sub_menu_repeater','options') ): the_row(); ?>									  
									  <div class="mega-menu-list-sub-items">										  
										<ul class="level2">
										  <?php if( have_rows('secondary_menu_repeater','options') ): ?>
											<?php while( have_rows('secondary_menu_repeater','options') ): the_row(); ?>
											<li>
											  <?php
											  $link = get_sub_field('menu_item');
											  if( $link ): 
											  $link_url = $link['url'];
											  $link_title = $link['title'];
											  $link_target = $link['target'] ? $link['target'] : '_self';
											  ?>
											  <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
												<?php the_sub_field('menu_text'); ?>
											  </a>
											  <?php endif; ?>
											  <?php if(get_sub_field('tertiary_menu_onoff') == 'yes'): ?> 
											  <ul class="level3">
												<?php if( have_rows('tertiary_menu_repeater','options') ): ?>
													  <?php while( have_rows('tertiary_menu_repeater','options') ): the_row(); ?>
												  <li>
													<?php
													$link = get_sub_field('menu_item_level3');
													if( $link ): 
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
													?>
													<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
													  <?php echo esc_html( $link_title ); ?>
													</a>
													<?php endif; ?>
													</li>
												<?php endwhile; ?>
													  <?php endif; ?> 
											  </ul>
										      <?php endif; ?>
											</li>
											<?php endwhile; ?>
										  <?php endif; ?> 
										</ul>
									  </div>
									 <?php endwhile; ?>
									<?php endif; ?> 
								  </div> 
								  <?php endif; ?> 
								</div>
								<?php endwhile; ?>
								<?php endif; ?> 
							  </div>
							</div>
						  </div>  
						</div>
						</div>
					  </div>
					</div>
					<!-- /Custom Mega Menu -->		
			</header>
			<!-- /header -->
</body>
		
		
		
		



		
