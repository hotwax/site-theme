<?php /* Template Name: FF Solution */ ?>
<?php get_header(); ?>
  <script type="text/javascript">
var renderer, scene, camera, composer, planet, skelet;
window.onload = function() {
  init();
  animate();
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
  scene.fog = new THREE.Fog(0xA6CDFB, 1, 1200);
  camera = new THREE.PerspectiveCamera(25, window.innerWidth / window.innerHeight, 1, 1000);
  camera.position.z = 500;
  camera.position.x = -150;
  camera.position.y = 0;
  scene.add(camera);
  planet = new THREE.Object3D();
  skelet = new THREE.Object3D();
  scene.add(planet);
  scene.add(skelet);
  var geom = new THREE.IcosahedronGeometry(15, 2);
  var mat = new THREE.MeshPhongMaterial({
    color: 0xBD9779,
    shading: THREE.FlatShading
  });
  var bones = new THREE.MeshPhongMaterial({
    color: 0xBD9779,
    wireframe: true,
    side: THREE.DoubleSide
  });
  var mesh = new THREE.Mesh(geom, mat);
  mesh.scale.x = mesh.scale.y = mesh.scale.z = 10;
  planet.add(mesh);
  var mesh = new THREE.Mesh(geom, bones);
  mesh.scale.x = mesh.scale.y = mesh.scale.z = 11;
  skelet.add(mesh);
  var ambientLight = new THREE.AmbientLight(0xBD9779);
  scene.add(ambientLight);
  var directionalLight = new THREE.DirectionalLight(0xffffff);
  directionalLight.position.set(-1, 1, 1).normalize();
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
</script>
  <?php if ( have_rows( 'hero' ) ) :  ?>
    <?php while ( have_rows( 'hero' ) ) : the_row(); ?>
      <div class="generic-hero">
        <div id="canvas" class="div-block-2 opaque"></div>
        <div class="left w-container">
          <div class="solution-hero-text left">
            <h1 class="solution-hero-header"><?php the_sub_field('header'); ?><br></h1>
            <img src="<?php the_sub_field('icon'); ?>" alt="" class="solution-hero-icon">
            <p class="solution-hero-subheader"><?php the_sub_field('description'); ?></p>
            <a href="<?php the_sub_field('cta_redirect'); ?>" class="button w-button"><?php the_sub_field('cta_text'); ?></a></div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php if ( have_rows( 'benefits_section' ) ) :  ?>
    <?php while ( have_rows( 'benefits_section' ) ) : the_row(); ?>
      <div class="solution-benefits-section">
        <div class="w-container">
          <h2 class="small-header"><?php the_sub_field('header'); ?></h2>
          <div class="benefits-container">
            <?php if ( have_rows( 'benefits' ) ) :  ?>
              <?php while ( have_rows( 'benefits' ) ) : the_row(); ?>
                <div class="solution-benefits-block">
                  <h4 class="heading-3"><?php the_sub_field( 'benefit' ); ?></h4>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php if ( have_rows( 'benefit_sections' ) ) :  ?>
    <?php while ( have_rows( 'benefit_sections' ) ) : the_row(); ?>
      <?php $index = get_row_index(); ?>
      <div class="benefit-row <?php if($index % 2 == 0): ?>benefit-row-left<?php else: ?>reverse<?php endif; ?>">
        <div class="benefit-row-columns w-row <?php if($index % 2 == 0): ?><?php else: ?>reverse<?php endif; ?>">
          <div class="benefit-row-column w-col w-col-6">
            <div class="benefit-row-text">
              <h2 class="small-header section-subheader"><?php the_sub_field( 'subheader' ); ?></h2>
              <h2 class="section-header"><strong class="section-header"><?php the_sub_field( 'header' ); ?></strong></h2>
              <div class="header-accent subheader-accent"></div>
              <div class="text-block-2"><?php the_sub_field( 'description' ); ?></div>
              <?php if( get_sub_field("cta_redirect") ): ?>
                <a href="<?php the_sub_field('cta_redirect'); ?>" class="button in-text w-button"><?php the_sub_field('cta_text'); ?></a>
              <?php endif; ?>
            </div>
          </div>
          <div class="benefit-row-column w-col w-col-6">
            <div class="benefit-row-image" style="background: url('/wp-content/themes/hotwax-2020/images/hexagon-side-<?php if($index % 2 == 0): ?>left<?php else: ?>right<?php endif; ?>.svg') <?php if($index % 2 == 0): ?>-1<?php else: ?>101<?php endif; ?>% 50% no-repeat, url('<?php the_sub_field( 'image' ); ?>') center no-repeat;"></div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php $cta_section = get_field('cta_section'); if( $cta_section ): ?>
  <div class="cta-section">
    <div class="cta-text">
      <h2 class="section-header"><strong class="section-header"><?php echo $cta_section['header']; ?></strong></h2>
      <div class="header-accent"></div>
      <p class="paragraph above-button"><?php echo $cta_section['description']; ?></p><a href="<?php echo $cta_section['cta_redirect']; ?>" class="button w-button"><?php echo $cta_section['cta_text']; ?></a></div>
  </div>
  <?php endif; ?>
<?php get_footer(); ?>