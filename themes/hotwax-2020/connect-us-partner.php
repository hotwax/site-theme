<?php /* Template Name: Connect Us Partners */ ?>
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
  camera.position.x = 150;
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
</script>
</head>
<body class="main">
  <div class="connect-section">
    <div id="canvas" class="div-block-2 contact-canvas"></div>
    <div class="container-6 w-container">
      <?php if ( have_rows( 'hero' ) ) :  ?>
        <?php while ( have_rows( 'hero' ) ) : the_row(); ?>
          <div class="contact-inner">
            <div class="connect-text-outer">
              <div class="solution-hero-text left">
                <h1 class="contact-us-header"><?php the_sub_field('header'); ?></h1>
                <p class="cta-subhear"><?php the_sub_field('description'); ?></p>
                <h2 class="small-header list-header"><?php the_sub_field('list_header'); ?></h2>
                <?php the_sub_field('list'); ?>
              </div>
              <div class="form-block w-form">
                <h2 class="small-header form-header"><?php the_sub_field('form_header'); ?></h2>
                <?php the_sub_field('form_code'); ?>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
	
  <style>
   .solution-hero-text.left{
      margin-top: -375px ;
    }
   .connect-text-outer{
      align-items: center ;
    }
	  @media(max-width: 991px){
	.solution-hero-text.left{
      margin-top: 0px;
    } 
	  }
  </style>
<?php get_footer(); ?>