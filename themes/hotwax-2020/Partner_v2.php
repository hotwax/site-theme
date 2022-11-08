<?php /* Template Name: Partner V2 */ ?>
<?php get_header(); ?>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<script type="text/javascript">
	var renderer, scene, camera, composer, planet, skelet;
	window.onload = function() {
		init();
		animate();
		// rise();
	}
	function init() {
		renderer = new THREE.WebGLRenderer({
			antialias: true,
			alpha: true
		});
		renderer.setPixelRatio((window.devicePixelRatio) ? window.devicePixelRatio : 1);
		renderer.setSize(window.innerWidth, window.innerHeight);
		renderer.autoClear = false;
		renderer.setClearColor(0x000000, 0.0);
		document.getElementById('canvas').appendChild(renderer.domElement);
		scene = new THREE.Scene();
		scene.fog = new THREE.Fog(0xffffff, 1, 1100);
		camera = new THREE.PerspectiveCamera(25, window.innerWidth / window.innerHeight, 1, 1000);
		camera.position.z = 800;
		camera.position.x = 0;
		camera.position.y = -33;
		scene.add(camera);
		planet = new THREE.Object3D();
		skelet = new THREE.Object3D();
		scene.add(planet);
		scene.add(skelet);
		var geom = new THREE.IcosahedronGeometry(15, 2);
		var mat = new THREE.MeshPhongMaterial({
			color: 0xBD9779,
			shading: THREE.FlatShading,
		});
		var bones = new THREE.MeshPhongMaterial({
			color: 0xBD9779,
			wireframe: true,
			side: THREE.DoubleSide,
		});
		var mesh = new THREE.Mesh(geom, mat);
		mesh.scale.x = mesh.scale.y = mesh.scale.z = 7.5;
		planet.add(mesh);
		var mesh = new THREE.Mesh(geom, bones);
		mesh.scale.x = mesh.scale.y = mesh.scale.z = 8.25;
		skelet.add(mesh);
		var ambientLight = new THREE.AmbientLight(0xf79421);
		scene.add(ambientLight);
		var directionalLight = new THREE.DirectionalLight(0xffffff);
		directionalLight.position.set(1, 1, 1).normalize();
		scene.add(directionalLight);
		window.addEventListener('resize', onWindowResize, false);
	};
	function onWindowResize() {
		camera.aspect = window.innerWidth / window.innerHeight;
		camera.updateProjectionMatrix();
		renderer.setSize(window.innerWidth, window.innerHeight);
	}
	function animate() {
		requestAnimationFrame(animate);
		planet.rotation.z += .001;
		planet.rotation.y = 0;
		planet.rotation.x = 0;
		skelet.rotation.z -= .001;
		skelet.rotation.y = 0;
		skelet.rotation.x = 0;
		renderer.clear();
		renderer.render( scene, camera );
	};
	function rise() {
		requestAnimationFrame(rise);
		if(mat.opacity < 1) {
			mat.opacity += (1 - balancer);
			balancer += 0.0075;
		}
		renderer.render( scene, camera );
	};
</script>
<?php if ( have_rows( 'hero' ) ) :  ?>
<?php while ( have_rows( 'hero' ) ) : the_row(); ?>
<div class="generic-hero">
	<div id="canvas" class="div-block-2"></div>
	<div class="container-6 w-container">
		<div class="solution-hero-text center">
			<h2 class="small-header subheader"><?php the_sub_field('subheader'); ?></h2>
			<h1 class="partners-page-header"><?php the_sub_field('header'); ?></h1>
			<p class="solution-hero-subheader"><?php the_sub_field('description'); ?></p>
			<a href="<?php the_sub_field('cta_redirect'); ?>" class="button w-button"><?php the_sub_field('cta_text'); ?></a>
		</div>
	</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<div class="product-info-nav-section">
	<div class="w-container">
		<div class="product-info-nav">
			<?php if ( have_rows( 'feature_sections' ) ) :  ?>
			<?php while ( have_rows( 'feature_sections' ) ) : the_row(); ?>
			<?php $index = get_row_index(); ?>
			<a href="#<?php the_sub_field('header_id'); ?>" class="product-info-link w-inline-block">
				<div><?php the_sub_field('header'); ?></div>
			</a>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="partners-wrapper">
	<div class="page-center">
		<?php if( have_rows('partner_section_repeater') ): ?>
		<?php while( have_rows('partner_section_repeater') ) : the_row(); ?>
		<?php $index = get_row_index(); ?>
		<div class="partners" id="<?php the_sub_field('partner_id'); ?>">
			<div class="partner-title">
				<h2><?php the_sub_field('partner_title'); ?></h2>
			</div>

			<div class="card-outer">
				<?php if( have_rows('block_card') ): ?>
				<?php while( have_rows('block_card') ) : the_row(); ?>
				<div class="card-inner" style="display:block">
					<div class="partner-content">
						<div class="partner-logo">
							<?php 
							$logo = get_sub_field('partner_logo');
							if( !empty( $logo ) ): ?>
							<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
							<?php endif; ?>
						</div>
						<div class="parnter-name">
							<h2>
								<?php the_sub_field('partner_name'); ?>
							</h2>
						</div>
						<div class="partner-tag">
							<p><?php the_sub_field('partner_tag'); ?></p>
						</div>
						<div class="one-line-text">
							<p><?php the_sub_field('one_line_text'); ?></p>
						</div>
						<div class="partner-button">
							<?php $button = get_sub_field( 'button' ); ?>
							<?php if ( $button ) : ?>
							<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>">
								<?php the_sub_field('button_text'); ?></a><i class="fas fa-arrow-right"></i>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>	
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>	
</div>
<?php if ( have_rows( 'cta_section' ) ) :  ?>
    <?php while ( have_rows( 'cta_section' ) ) : the_row(); ?>
      <div class="cta-section white-bg partners-cta-section">
        <div class="cta-text">
          <h2 class="section-header"><strong class="section-header"><?php the_sub_field('header'); ?></strong></h2>
          <div class="header-accent"></div>
          <p class="paragraph above-button"><?php the_sub_field('description'); ?></p><a href="<?php the_sub_field('cta_redirect'); ?>" class="button w-button"><?php the_sub_field('cta_text'); ?></a></div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
<?php get_footer(); ?>

<style>
	body{
		font-family: 'Open Sans',sans-serif;
	}
	.partners-wrapper{
		background:#fff;
		padding:20px 20px 30px 20px;
	}
	.page-center {
		max-width: 1170px !important;
		margin: 0 auto !important;
		float: none !important;
		padding: 0px !important;
	}
	.partners {
		padding-top: 40px;
	}
	.partner-title h2{
		text-align:left;
		color:#000;
		padding:10px 24px;
		line-height: 44px;
		font-size: 30px;
		font-weight: 700;
		margin-top: 50px;
		margin-bottom: 20px;
		font-family: Montserrat,sans-serif;
	}
	.card-outer{
		display: flex;
		justify-content:flex-start;
		flex-wrap: wrap;
		margin:0;
	}
	.card-inner{
		border: 0;
		margin: 0px;
		padding:0px;
		flex: 0 30%;
		background: #fff 0% 0% no-repeat padding-box;
		box-shadow: 0px 0px 12px #00000017;
		border-radius: 5px;
		margin: 0 1.5%;
		margin-bottom: 3% !important;
		//display: none;
		padding-bottom: 10px;
	}
	.partner-content{
		padding:45px 30px;
	}
	.partner-logo{
		text-align: center;
		margin-bottom: 30px;
		margin-left: auto;
		margin-right: auto;
		height: 100px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.partner-logo img {
		max-width: 100%;
		max-height: 100%;
	}
	.parnter-name h2{
		color: #000;
		font-size: 20px;
		line-height: 28px;
		text-decoration: none;
		font-weight: 600;
		font-family: 'Open Sans',sans-serif;
		margin-top:0;
		margin-bottom:10px;
		cursor:pointer;
	}
	.partner-tag p{
		color: #ccc;
		display: flex;
		flex-wrap: wrap;
		font-size: 14px;
		font-weight: bold;
		text-transform: uppercase;
		margin-top:0;
		margin-bottom:10px;
	}
	.partners-cta-section{
		padding-top: 0px;
	}
	.solution-hero-text.center {
		padding: 70px 0px;
	}
	.product-info-link {
		position: relative;
		z-index: 99999999;
	}
	.one-line-text p{
		line-height: 23px;
		margin-top: 0;
		font-size: 14px;
		color: #666;
		margin-top:0;
		margin-bottom:10px;
	}
	.partner-button a{
		letter-spacing: 1.54px;
		color: #666;
		text-transform: uppercase;
		text-decoration: none;
		font-weight: bold;
		font-size: 14px;
		cursor:pointer;
	}
	.partner-button a i::before{
		content: "\f061";
		letter-spacing: 1.54px;
		color: #666;
	}
	.partner-button .fa-arrow-right:before {
		padding-left: 6px;
		font-size:14px !important;
		letter-spacing: 1.54px;
		color: #666;
		font-weight: 900;
		font-family: Font Awesome\ 5 Free;	
	}
	.partner-button a:hover{
		text-decoration:none;
	}
	.partner-button {
		padding-top: 20px;
	}
	@media (max-width: 768px){
		.card-inner{
			flex:47%;
		}
	}
	@media (max-width: 600px){
		.card-inner{
			flex:100%;
		}
		.partners-wrapper{
			padding:30px 20px 0px 20px;
		}
		.card-inner{
			margin-bottom:10% !important;
		}
	}
</style>