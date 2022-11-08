<?php /* Template Name: FF Our Story */ ?>
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
        <div class="our-story-hero">
          <div class="container-6 w-container">
            <h1><?php the_sub_field( 'header' ); ?></h1>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
    <div class="story-container">
    <?php if ( have_rows( 'text_box_1' ) ) :  ?>
        <?php while ( have_rows( 'text_box_1' ) ) : the_row(); ?>
          <div class="story-section" id="story-1">
            <h3 class="section-subheader"><?php the_sub_field( 'title' ); ?></h3>
            <div class="story-modules-container">
              <?php the_sub_field( 'content' ); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php if ( have_rows( 'text_box_2' ) ) :  ?>
        <?php while ( have_rows( 'text_box_2' ) ) : the_row(); ?>
          <div class="story-section" id="story-2">
            <img src="../../wp-content/themes/hotwax-2020/images/story-1-2.png" class="story-dashed-line">
            <h3 class="section-subheader"><?php the_sub_field( 'title' ); ?></h3>
            <div class="story-modules-container">
              <?php the_sub_field( 'content' ); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php if ( have_rows( 'text_box_3' ) ) :  ?>
        <?php while ( have_rows( 'text_box_3' ) ) : the_row(); ?>
          <div class="story-section" id="story-3">
            <img src="../../wp-content/themes/hotwax-2020/images/story-2-3.png" class="story-dashed-line">
            <h3 class="section-subheader"><?php the_sub_field( 'title' ); ?></h3>
            <div class="story-modules-container">
              <?php the_sub_field( 'content' ); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php if ( have_rows( 'text_box_4' ) ) :  ?>
        <?php while ( have_rows( 'text_box_4' ) ) : the_row(); ?>
          <div class="story-section" id="story-4">
            <img src="../../wp-content/themes/hotwax-2020/images/story-3-4.png" class="story-dashed-line">
            <h3 class="section-subheader"><?php the_sub_field( 'title' ); ?></h3>
            <div class="story-modules-container">
              <?php the_sub_field( 'content' ); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php if ( have_rows( 'text_box_5' ) ) :  ?>
        <?php while ( have_rows( 'text_box_5' ) ) : the_row(); ?>
          <div class="story-section" id="story-5">
            <img src="../../wp-content/themes/hotwax-2020/images/story-4-5.png" class="story-dashed-line">
            <h3 class="section-subheader"><?php the_sub_field( 'title' ); ?></h3>
            <div class="story-modules-container">
              <?php the_sub_field( 'content' ); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php if ( have_rows( 'text_box_6' ) ) :  ?>
        <?php while ( have_rows( 'text_box_6' ) ) : the_row(); ?>
          <div class="story-section" id="story-6">
            <img src="../../wp-content/themes/hotwax-2020/images/story-5-6.png" class="story-dashed-line">
            <h3 class="section-subheader"><?php the_sub_field( 'title' ); ?></h3>
            <div class="story-modules-container">
              <?php the_sub_field( 'content' ); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php if ( have_rows( 'text_box_7' ) ) :  ?>
        <?php while ( have_rows( 'text_box_7' ) ) : the_row(); ?>
          <div class="story-section" id="story-7">
            <img src="../../wp-content/themes/hotwax-2020/images/story-6-7.png" class="story-dashed-line">
            <h3 class="section-subheader"><?php the_sub_field( 'title' ); ?></h3>
            <div class="story-modules-container">
              <?php the_sub_field( 'content' ); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
  <?php get_footer(); ?>
  