<?php /* Template Name: Buy Online Pick-Up In Store Solution Template */ ?>
<?php get_header(); ?>

  
<link href='https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=OpenSans:100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
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
<style>
	
	/*! HTML5 Boilerplate v8.0.0 | MIT License | https://html5boilerplate.com/ */

/* main.css 2.1.0 | MIT License | https://github.com/h5bp/main.css#readme */
/*
 * What follows is the result of much research on cross-browser styling.
 * Credit left inline and big thanks to Nicolas Gallagher, Jonathan Neal,
 * Kroc Camen, and the H5BP dev community and team.
 */

/* ==========================================================================
   Base styles: opinionated defaults
   ========================================================================== */

html {
  color: #222;
  font-size: 1em;
  line-height: 1.4;
}

/*
 * Remove text-shadow in selection highlight:
 * https://twitter.com/miketaylr/status/12228805301
 *
 * Vendor-prefixed and regular ::selection selectors cannot be combined:
 * https://stackoverflow.com/a/16982510/7133471
 *
 * Customize the background color to match your design.
 */

::-moz-selection {
  background: #b3d4fc;
  text-shadow: none;
}

::selection {
  background: #b3d4fc;
  text-shadow: none;
}

/*
 * A better looking default horizontal rule
 */

hr {
  display: block;
  height: 1px;
  border: 0;
  border-top: 1px solid #ccc;
  margin: 1em 0;
  padding: 0;
}

/*
 * Remove the gap between audio, canvas, iframes,
 * images, videos and the bottom of their containers:
 * https://github.com/h5bp/html5-boilerplate/issues/440
 */

audio,
canvas,
iframe,
img,
svg,
video {
  vertical-align: middle;
}

/*
 * Remove default fieldset styles.
 */

fieldset {
  border: 0;
  margin: 0;
  padding: 0;
}

/*
 * Allow only vertical resizing of textareas.
 */

textarea {
  resize: vertical;
}

/* ==========================================================================
   Author's custom styles
   ========================================================================== */

/* ==========================================================================
   Helper classes
   ========================================================================== */

/*
 * Hide visually and from screen readers
 */

.hidden,
[hidden] {
  display: none !important;
}

/*
 * Hide only visually, but have it available for screen readers:
 * https://snook.ca/archives/html_and_css/hiding-content-for-accessibility
 *
 * 1. For long content, line feeds are not interpreted as spaces and small width
 *    causes content to wrap 1 word per line:
 *    https://medium.com/@jessebeach/beware-smushed-off-screen-accessible-text-5952a4c2cbfe
 */

.sr-only {
  border: 0;
  clip: rect(0, 0, 0, 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  white-space: nowrap;
  width: 1px;
  /* 1 */
}

/*
 * Extends the .sr-only class to allow the element
 * to be focusable when navigated to via the keyboard:
 * https://www.drupal.org/node/897638
 */

.sr-only.focusable:active,
.sr-only.focusable:focus {
  clip: auto;
  height: auto;
  margin: 0;
  overflow: visible;
  position: static;
  white-space: inherit;
  width: auto;
}

/*
 * Hide visually and from screen readers, but maintain layout
 */

.invisible {
  visibility: hidden;
}

/*
 * Clearfix: contain floats
 *
 * For modern browsers
 * 1. The space content is one way to avoid an Opera bug when the
 *    `contenteditable` attribute is included anywhere else in the document.
 *    Otherwise it causes space to appear at the top and bottom of elements
 *    that receive the `clearfix` class.
 * 2. The use of `table` rather than `block` is only necessary if using
 *    `:before` to contain the top-margins of child elements.
 */

.clearfix::before,
.clearfix::after {
  content: " ";
  display: table;
}

.clearfix::after {
  clear: both;
}

/* ==========================================================================
   EXAMPLE Media Queries for Responsive Design.
   These examples override the primary ('mobile first') styles.
   Modify as content requires.
   ========================================================================== */

@media only screen and (min-width: 980px) {
  /* Style adjustments for viewports that meet the condition */
}

@media print,
  (-webkit-min-device-pixel-ratio: 1.25),
  (min-resolution: 1.25dppx),
  (min-resolution: 120dpi) {
  /* Style adjustments for high resolution devices */
}

/* ==========================================================================
   Print styles.
   Inlined to avoid the additional HTTP request:
   https://www.phpied.com/delay-loading-your-print-css/
   ========================================================================== */

@media print {
  

 

  pre {
    white-space: pre-wrap !important;
  }

  pre,
  blockquote {
    border: 1px solid #999;
    page-break-inside: avoid;
  }

  img {
    page-break-inside: avoid;
  }

  
}

/* My Custom Styles */

  /* BOPIS */
  #accurateInventory{
    grid-row: 2;
    display: grid;
    grid-template-columns: max-content 70px max-content;
    justify-content: center;
    max-width: var(--iPhone-width);
    margin: auto;
  }

  #bopis-1{
    grid-row: 1;
    grid-column: 1 / 3;
  }

  #bopis0{
    grid-row: 1;
    grid-column: 2 / 4;
  }

  #bopis1{
    grid-row: 4;
  }

  #bopis2{
    grid-row: 6;
  }  

  #bopisf0{
    grid-row: 1;
  }

  #bopisf1{
    grid-row: 3;
  }

  #bopisf2{
    grid-row: 5;
  }

  #bopisf3{
    grid-row: 7;
  }

  /* Desktop CSS */
	@media only screen and (min-width: 980px) {

    /* BOPIS */
    .bopis{
      padding-top: 140px;
    }

    #bopis > .content{
      grid-template-rows: .7fr 1fr .7fr max-content auto;
      grid-template-columns: 1fr 1fr;
      grid-column-gap: var(--grid-gap);
    }

    #accurateInventory{
      grid-row: 1 / 3;
      grid-column: 1;
      grid-template-columns: max-content 150px max-content;
      justify-content: end;
      margin: unset;
    }

    #bopis1{
      grid-row: 2 / 5;
      align-self: center;
    }

    #bopis2{
      grid-row: 4 / 7;
      grid-column: 1;
      align-self: flex-end;
    }

    #bopisf0{
      grid-row: 1;
      grid-column: 2;
      align-self: end;
    }

    #bopisf1{
      grid-area: 3 / 1;
      align-self: center;
    }

    #bopisf2{
      grid-area: 5 / 2 / 6 / 3;
      padding-top: 63px;
    }
    
    #bopisf3{
      grid-row: 6;
      grid-column: 2;
      padding-bottom: 80px;
      margin-top: 102px;
    }
  }
</style>

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


<div id="home">

<section id="bopis">

      <div class="content">
        <div id="bopisf0" class="feature">
          <h3>
            Accurate Store Inventory Visibility
          </h3>
          <p>
            Provide real-time product and inventory visibility to your shoppers when they browse your website.
          </p>
        </div>
        <div id="accurateInventory">
          <div id="bopis-1" class="iPhone">
            <img src="https://www.hotwax.co/wp-content/uploads/2021/08/dc_1.png" alt="Product Page">
          </div>
          <div id="bopis0" class="iPhone">
            <img src="https://www.hotwax.co/wp-content/uploads/2021/08/dc_2.png" alt="In Store Availability">
          </div>
        </div>
        <div id="bopis1" class="iPhone">
          <img src="https://www.hotwax.co/wp-content/uploads/2021/08/Bopis_1-1.png" alt="BOPIS">
        </div>
        <div id="bopis2" class="iPhone">
          <img src="https://www.hotwax.co/wp-content/uploads/2021/08/Bopis_3.png" alt="BOPIS">
        </div>
        <div id="bopisf1" class="feature">
          <h3>
            Order Notifications
          </h3>
          <p>
            Send timely confirmations and notifications to inform customers of their order status.
          </p>
        </div>
        <div id="bopisf2" class="feature">
          <h3>
            Swift Order Fulfillment
          </h3>
          <p>
            Reduce delivery times by allowing the customer to pick up an online order from their local store.
          </p>
        </div>
        <div id="bopisf3" class="feature">
          <h3>
            Pick Up Assistance
          </h3>
          <p>
            Enable sales associates to access all order information immediately to improve customer service.
          </p>
        </div>
      </div>
    </section>

</div>







  <?php $cta_section = get_field('cta_section'); if( $cta_section ): ?>
  <div class="cta-section">
    <div class="cta-text">
      <h2 class="section-header"><strong class="section-header"><?php echo $cta_section['header']; ?></strong></h2>
      <div class="header-accent"></div>
      <p class="paragraph above-button"><?php echo $cta_section['description']; ?></p><a href="<?php echo $cta_section['cta_redirect']; ?>" class="button w-button"><?php echo $cta_section['cta_text']; ?></a></div>
  </div>

<style>
.iphone-twos:before {
    content: '';
    top: -16px;
    left: 31px;
}
/*	.new-bg:before {
    content: '';
    background-image: url(https://www.hotwax.co/wp-content/uploads/2021/08/iOS_Shadow.png);
    position: absolute;
    width: 100%;
    height: 560px;
    background-size: cover;
    left: 140px;
    top: 0px;
    background-repeat: no-repeat;
}*/
.new-bg {
    position: relative;
    left: -150px;
    width: 100%;
    display: initial;
}
img.new-one-img {
    width: auto;
    height: 750px !important;
    max-width: none;
    position: relative;
}

	@media(max-width:980px){
img.new-one-img {
    max-width: 100%;
    height: auto !important;
}

.iphone-twos:before {
    height: 375px !important;
    left: 83px;
    background-size: contain;
    top: 0;
}

.new-bg {
    left: 0;
}
	}
</style>
  <?php endif; ?>
<?php get_footer(); ?>