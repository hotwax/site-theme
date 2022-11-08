<?php /* Template Name: FF Product */ ?>
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
  <?php if ( have_rows( 'hero' ) ) :  ?>
    <?php while ( have_rows( 'hero' ) ) : the_row(); ?>
      <div class="generic-hero long-hero">
        <div id="canvas" class="div-block-2">
        </div>
        <div class="container-6 w-container">
          <div class="solution-hero-text center">
            <h1 class="solution-hero-header"><?php the_sub_field('header'); ?><br></h1>
            <img src="<?php the_sub_field('icon'); ?>" alt="" class="solution-hero-icon">
            <p class="solution-hero-subheader"><?php the_sub_field('description'); ?></p>
            <a href="<?php the_sub_field('cta_redirect'); ?>" class="button w-button"><?php the_sub_field('cta_text'); ?></a>
          </div>
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
            <a href="#<?php echo $index; ?>" class="product-info-link w-inline-block">
              <div><?php the_sub_field('header'); ?></div>
            </a>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if ( have_rows( 'feature_sections' ) ) :  ?>
    <?php while ( have_rows( 'feature_sections' ) ) : the_row(); ?>
      <?php $index = get_row_index(); ?>
      <div id="<?php echo $index; ?>" class="product-info-section">
        <div class="w-container"><img src="<?php the_sub_field('icon'); ?>" alt="" class="product-info-icon">
          <h2 class="section-header"><?php the_sub_field('header'); ?></h2>
          <div class="info-blocks">
            <?php if ( have_rows( 'feature_benefits' ) ) :  ?>
              <?php while ( have_rows( 'feature_benefits' ) ) : the_row(); ?>
                <div class="info-block">
                  <div class="info-block-header"><?php the_sub_field('header'); ?></div>
                  <div class="header-accent"></div>
                  <p class="info-block-text"><?php the_sub_field('description'); ?><br></p>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php if ( have_rows( 'cta_section' ) ) :  ?>
    <?php while ( have_rows( 'cta_section' ) ) : the_row(); ?>
      <div class="cta-section">
        <div class="cta-text">
          <h2 class="section-header"><strong class="section-header"><?php the_sub_field('header'); ?></strong></h2>
          <div class="header-accent"></div>
          <p class="paragraph above-button"><?php the_sub_field('description'); ?></p><a href="<?php the_sub_field('cta_redirect'); ?>" class="button w-button"><?php the_sub_field('cta_text'); ?></a></div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
<?php get_footer(); ?>