<?php /* Template Name: FF About */ ?>
<?php get_header(); ?>
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
</head>
<body class="main">
  <div class="hero-wrapper">
    <?php if ( have_rows( 'hero' ) ) :  ?>
      <?php while ( have_rows( 'hero' ) ) : the_row(); ?>
          <div class="generic-hero about-hero">
            <div id="canvas" class="div-block-2"></div>
            <div class="container-6 w-container">
              <div class="solution-hero-text center">
                <h2 class="small-header subheader"><?php the_sub_field( 'subheader' ); ?></h2>
                <h1 class="partners-page-header"><?php the_sub_field( 'header' ); ?></h1>
                <p class="solution-hero-subheader"><?php the_sub_field( 'description' ); ?></p>
                <a href="<?php the_sub_field('cta_redirect'); ?>" class="button w-button"><?php the_sub_field('cta_text'); ?></a>
              </div>
            </div>
          </div>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php if ( have_rows( 'about_intro' ) ) :  ?>
      <?php while ( have_rows( 'about_intro' ) ) : the_row(); ?>
        <div class="mission-statement-section">
          <div class="container-7 w-container">
            <div class="mission-statement-text">
              <h2 class="section-header"><strong class="section-header"><?php the_sub_field( 'header' ); ?></strong></h2>
              <div class="header-accent"></div>
              <?php the_sub_field( 'body' ); ?>
            </div><img src="images/hex-woman.png" srcset="/wp-content/themes/hotwax-2020/images/hex-woman-p-500.png 500w, /wp-content/themes/hotwax-2020/images/hex-woman-p-800.png 800w, /wp-content/themes/hotwax-2020/images/hex-woman-p-1080.png 1080w, /wp-content/themes/hotwax-2020/images/hex-woman.png 1574w" sizes="(max-width: 991px) 100vw, 1500px" alt="" class="hex-woman"></div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php if ( have_rows( 'leadership_section' ) ) :  ?>
      <?php while ( have_rows( 'leadership_section' ) ) : the_row(); ?>
        <div class="leadership-section">
          <div class="w-container">
            <h2 class="small-header section-subheader"><?php the_sub_field( 'description' ); ?></h2>
            <div class="leader-modules-container">
              <?php if ( have_rows( 'leadership_blocks' ) ) :  ?>
                <?php while ( have_rows( 'leadership_blocks' ) ) : the_row(); ?>
                  <div class="leader-module">
                    <div class="leader-head-shot-container"><img src="<?php the_sub_field( 'headshot' ); ?>" alt="" class="leader-headshot"></div>
                    <h3 class="leader-name"><?php the_sub_field( 'name' ); ?></h3>
                    <div class="founder-title"><?php the_sub_field( 'title' ); ?></div>
                    <p class="founder-info"><?php the_sub_field( 'description' ); ?></p>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <div class="header-section">
    <div class="w-container">
      <h2 class="small-header section-subheader">offices</h2>
    </div>
  </div>
  <div class="map-section">
    <div class="map-wrapper"><img src="../wp-content/themes/hotwax-2020/images/map.svg" alt="" class="map-image">
      <div data-w-id="ed2c81d2-26cc-7aa4-1820-24eb7e42e705" target="_blank" class="map-pin w-inline-block">
        <div style="display:none;-webkit-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="map-pin-tooltip north-america">
          <h5 class="country">SLC, Utah</h5>
        </div>
      </div>
      <div data-w-id="ed2c81d2-26cc-7aa4-1820-24eb7e42e715" target="_blank" class="map-pin italy w-inline-block">
        <div style="display:none;-webkit-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="map-pin-tooltip north-america">
          <h5 class="country">Milan, Italy</h5>
        </div>
      </div>
      <div data-w-id="ed2c81d2-26cc-7aa4-1820-24eb7e42e729" target="_blank" class="map-pin india  w-inline-block">
        <div style="display:none;-webkit-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="map-pin-tooltip north-america">
          <h5 class="country">Indore, India</h5>
        </div>
      </div>
      <div data-w-id="ed2c81d2-26cc-7aa4-1820-24eb7e42e735" target="_blank" class="map-pin uk w-inline-block">
        <div style="display:none;-webkit-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0, 0, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="map-pin-tooltip north-america">
          <h5 class="country">London, UK</h5>
        </div>
      </div>
    </div>
  </div>
  <?php if ( have_rows( 'cta_section' ) ) :  ?>
    <?php while ( have_rows( 'cta_section' ) ) : the_row(); ?>
      <div class="cta-section white-bg">
        <div class="cta-text">
          <h2 class="section-header"><strong class="section-header"><?php the_sub_field('header'); ?></strong></h2>
          <div class="header-accent"></div>
          <p class="paragraph above-button"><?php the_sub_field('description'); ?></p><a href="<?php the_sub_field('cta_redirect'); ?>" class="button w-button"><?php the_sub_field('cta_text'); ?></a></div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php get_footer(); ?>