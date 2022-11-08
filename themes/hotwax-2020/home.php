<?php /* Template Name: FF Home */ ?>
<?php get_header(); ?>
  <div class="hero">
    <div id="canvas" data-w-id="d60ecfd2-831e-efeb-96fe-5597d1c461bf" class="div-block"></div>
    <div class="data-section-underlapper"></div>
    <div class="container-5 w-container">
      <?php $hero = get_field('hero'); if( $hero ): ?>
        <?php echo $hero['hero_text']; ?>
        <a href="<?php echo $hero['cta_redirect'] ?>" class="button w-button"><?php echo $hero['cta_text'] ?></a>
      <?php endif; ?>
    </div>
    <div class="data-container w-container">
      <div class="w-row">
        <?php if ( have_rows( 'stat_blocks' ) ) :  ?>
          <?php while ( have_rows( 'stat_blocks' ) ) : the_row(); ?>
            <div class="w-col w-col-4">
              <div class="stat-block">
                <div class="data-circle w-embed">
                  <div class="ProgressBar ProgressBar--animateAll" data-progress="<?php the_sub_field('percentage'); ?>">
                    <svg class="ProgressBar-contentCircle">
                      <!--  on défini le l'angle et le centre de rotation du cercle  -->
                      <circle transform="rotate(-90, 100, 100)" class="ProgressBar-background" cx="150" cy="50" r="45"></circle>
                      <circle transform="rotate(-90, 100, 100)" class="ProgressBar-circle" cx="150" cy="50" r="45"></circle>
                      <span class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                    </svg>
                  </div>
                </div>
                <h3 class="stat-label"><?php the_sub_field('header'); ?></h3>
                <p><?php the_sub_field('description'); ?></p>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php $customers = get_field('customers'); if( $customers ): ?>
  <div class="customers">
    <div class="w-container">
      <h2 class="small-header"><?php echo $customers['header']; ?></h2>
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
  <div class="interactive-phone-section">
    <div class="w-container">
      <?php if ( have_rows( 'value_props_one' ) ) :  ?>
        <?php while ( have_rows( 'value_props_one' ) ) : the_row(); ?>
          <div class="section-intro-text">
            <h2 class="section-header"><?php the_sub_field( 'header' ); ?></h2>
            <div class="header-accent"></div>
            <p class="paragraph"><?php the_sub_field( 'description' ); ?></p>
          </div>
          <div class="phone-interaction left w-row">
            <div class="link-column left w-col w-col-7">
              <?php if ( have_rows( 'value_props' ) ) :  ?>
                <?php while ( have_rows( 'value_props' ) ) : the_row(); ?>
                  <?php $index = get_row_index(); ?>
                  <a href="<?php the_sub_field( 'redirect' ); ?>" class="interactive-link w-inline-block" id="interactive-link-<?php echo $index; ?>">
                    <div class="solution-interactive-block">
                      <img src="<?php the_sub_field( 'icon' ); ?>" alt="" class="interactive-icon">
                      <h5 class="small-header"><?php the_sub_field( 'header' ); ?></h5>
                      <p class="interactive-paragraph"><?php the_sub_field( 'description' ); ?></p>
                      <div class="interactive-cta-text">read more <span class="cta-chevrons">&gt;&gt;</span></div>
                    </div>
                  </a>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
            <div class="phone-column w-col w-col-5">
              <?php if ( have_rows( 'value_props' ) ) :  ?>
                <?php while ( have_rows( 'value_props' ) ) : the_row(); ?>
                  <?php $index = get_row_index(); ?>
                  <img src="<?php the_sub_field( 'preview_image' ); ?>" class="phone-shot" id="phone-shot-<?php echo $index; ?>">
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      </div>
      <?php if ( have_rows( 'value_props_two' ) ) :  ?>
        <?php while ( have_rows( 'value_props_two' ) ) : the_row(); ?>
          <div class="phone-interaction right w-row">
            <div class="phone-column w-col w-col-5">
              <?php if ( have_rows( 'value_props' ) ) :  ?>
                <?php while ( have_rows( 'value_props' ) ) : the_row(); ?>
                  <?php 
                    $index = get_row_index(); 
                    $newindex = $index + 4;
                  ?>
                  <img src="<?php the_sub_field( 'preview_image' ); ?>" class="phone-shot" id="phone-shot-<?php echo $newindex; ?>">
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
            <div class="link-column right w-col w-col-7">
              <?php if ( have_rows( 'value_props' ) ) :  ?>
                <?php while ( have_rows( 'value_props' ) ) : the_row(); ?>
                  <?php 
                    $index = get_row_index(); 
                    $newindex = $index + 4;
                  ?>
                  <a href="<?php the_sub_field( 'redirect' ); ?>" class="interactive-link w-inline-block" id="interactive-link-<?php echo $newindex; ?>">
                    <div class="solution-interactive-block">
                      <img src="<?php the_sub_field( 'icon' ); ?>" alt="" class="interactive-icon">
                      <h5 class="small-header"><?php the_sub_field( 'header' ); ?></h5>
                      <p class="interactive-paragraph"><?php the_sub_field( 'description' ); ?></p>
                      <div class="interactive-cta-text">read more <span class="cta-chevrons">&gt;&gt;</span></div>
                    </div>
                  </a>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
<script async type="text/javascript">
  var renderer, scene, camera, composer, planet, skelet, balancer;
  document.addEventListener('DOMContentLoaded', function() {
    init();
    animate();
    rise();
  }, false);
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
    scene.fog = new THREE.Fog(0xA6CDFB, 1, 1000);
    camera = new THREE.PerspectiveCamera(25, window.innerWidth / window.innerHeight, 1, 1000);
    camera.position.z = 400;
    camera.position.x = 0;
    camera.position.y = 120;
    scene.add(camera);
    planet = new THREE.Object3D();
    skelet = new THREE.Object3D();
    balancer = 0;
    scene.add(planet);
    scene.add(skelet);
    planet.position.y = -180;
    skelet.position.y = -180;
    var geom = new THREE.DodecahedronGeometry(15, 2);
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
    mesh.scale.x = mesh.scale.y = mesh.scale.z = 17;
    planet.add(mesh);
    var mesh = new THREE.Mesh(geom, bones);
    mesh.scale.x = mesh.scale.y = mesh.scale.z = 18;
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
    if(camera.position.y >= 55) {
    camera.position.y -= (1 - balancer);
    balancer += 0.0075;
    }
    renderer.render( scene, camera );
  };
</script>
<?php get_footer(); ?>