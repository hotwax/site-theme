<?php /* Template Name: FF Home */ ?>
<?php get_header(); ?>
  <script type="text/javascript">
var renderer, scene, camera, composer, planet, skelet, balancer;
window.onload = function() {
  init();
  animate();
  rise();
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
  <div class="hero">
    <div id="canvas" data-w-id="d60ecfd2-831e-efeb-96fe-5597d1c461bf" class="div-block"></div>
    <div class="data-section-underlapper"></div>
    <div class="container-5 w-container">
      <h1 class="hero-header">Deliver an omnichannel experience to your customers with<br><span class="large">HotWax Commerce<br></span>Grow conversion, Average Order Value, Acquire new customers <br></h1><a href="#" class="button w-button">Call to Action</a></div>
    <div class="data-container w-container">
      <div class="w-row">
        <div class="w-col w-col-4">
          <div class="stat-block">
            <div class="data-circle w-embed">
              <div class="ProgressBar ProgressBar--animateAll" data-progress="59">
                <svg class="ProgressBar-contentCircle">
                  <!--  on défini le l'angle et le centre de rotation du cercle  -->
                  <circle transform="rotate(-90, 100, 100)" class="ProgressBar-background" cx="150" cy="50" r="45"></circle>
                  <circle transform="rotate(-90, 100, 100)" class="ProgressBar-circle" cx="150" cy="50" r="45"></circle>
                  <span class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                </svg>
              </div>
            </div>
            <h3 class="stat-label">LOREM IPSUM</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
        </div>
        <div class="w-col w-col-4">
          <div class="stat-block">
            <div class="data-circle w-embed">
              <div class="ProgressBar ProgressBar--animateAll" data-progress="33">
                <svg class="ProgressBar-contentCircle">
                  <!--  on défini le l'angle et le centre de rotation du cercle  -->
                  <circle transform="rotate(-90, 100, 100)" class="ProgressBar-background" cx="150" cy="50" r="45"></circle>
                  <circle transform="rotate(-90, 100, 100)" class="ProgressBar-circle" cx="150" cy="50" r="45"></circle>
                  <span class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                </svg>
              </div>
            </div>
            <h3 class="stat-label">LOREM IPSUM</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
        </div>
        <div class="w-col w-col-4">
          <div class="stat-block">
            <div class="data-circle w-embed">
              <div class="ProgressBar ProgressBar--animateAll" data-progress="88">
                <svg class="ProgressBar-contentCircle">
                  <!--  on défini le l'angle et le centre de rotation du cercle  -->
                  <circle transform="rotate(-90, 100, 100)" class="ProgressBar-background" cx="150" cy="50" r="45"></circle>
                  <circle transform="rotate(-90, 100, 100)" class="ProgressBar-circle" cx="150" cy="50" r="45"></circle>
                  <span class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                </svg>
              </div>
            </div>
            <h3 class="stat-label">LOREM IPSUM</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="customers">
    <div class="w-container">
      <h2 class="small-header">experience with global innovators</h2>
      <div class="customer-logos-container">
        <div class="customer-logo-container"><img src="../wp-content/themes/prospect-child/images/logo-essilor.svg" alt="" class="customer-logo essilor"></div>
        <div class="hex-divider"></div>
        <div class="customer-logo-container"><img src="../wp-content/themes/prospect-child/images/logo-ware2go.svg" alt="" class="customer-logo w2g"></div>
        <div class="hex-divider"></div>
        <div class="customer-logo-container"><img src="../wp-content/themes/prospect-child/images/logo-standard-restaurant-supply.png" srcset="../wp-content/themes/prospect-child/images/logo-standard-restaurant-supply-p-500.png 500w, ../wp-content/themes/prospect-child/images/logo-standard-restaurant-supply-p-800.png 800w, ../wp-content/themes/prospect-child/images/logo-standard-restaurant-supply-p-1080.png 1080w, ../wp-content/themes/prospect-child/images/logo-standard-restaurant-supply-p-1600.png 1600w, ../wp-content/themes/prospect-child/images/logo-standard-restaurant-supply-p-2000.png 2000w, ../wp-content/themes/prospect-child/images/logo-standard-restaurant-supply-p-2600.png 2600w, ../wp-content/themes/prospect-child/images/logo-standard-restaurant-supply-p-3200.png 3200w, ../wp-content/themes/prospect-child/images/logo-standard-restaurant-supply.png 4524w" sizes="(max-width: 479px) 151px, (max-width: 767px) 31vw, 159px" alt="" class="customer-logo standard-restaurant-supply"></div>
        <div class="hex-divider"></div>
        <div class="customer-logo-container"><img src="../wp-content/themes/prospect-child/images/logo-winning-appliances.svg" alt="" class="customer-logo essilor"></div>
        <div class="hex-divider"></div>
        <div class="customer-logo-container"><img src="../wp-content/themes/prospect-child/images/logo-cabi.svg" alt="" class="customer-logo cabi"></div>
        <div class="hex-divider"></div>
        <div class="customer-logo-container"><img src="../wp-content/themes/prospect-child/images/logo-marco.svg" alt="" class="customer-logo marco"></div>
      </div>
    </div>
  </div>
  <div class="interactive-phone-section">
    <div class="w-container">
      <div class="section-intro-text">
        <h2 class="section-header">Lorem Ipsum Dolor Sit Amet.</h2>
        <div class="header-accent"></div>
        <p class="paragraph">Innovative Brands deliver personalized, consistent &amp; progressive experience across all the channels no matter what journey customer takes.</p>
      </div>
      <div class="phone-interaction left w-row">
        <div class="link-column left w-col w-col-7">
          <a href="#" class="interactive-link w-inline-block">
            <div data-w-id="baa67a5d-089a-31ba-e8b2-a4d91af6188d" class="solution-interactive-block"><img src="../wp-content/themes/prospect-child/images/demo-icon.svg" alt="" class="interactive-icon">
              <h5 class="small-header">Ultrafast and engaging eCommerce</h5>
              <p class="interactive-paragraph">Increase online conversions and engage customers with personalized and engaging shopping experience.</p>
              <div class="interactive-cta-text">read more <span class="cta-chevrons">&gt;&gt;</span></div>
            </div>
          </a>
          <a href="#" class="interactive-link w-inline-block">
            <div data-w-id="a8d78dcf-baf7-16c8-ca16-ed21166c6a80" class="solution-interactive-block"><img src="../wp-content/themes/prospect-child/images/demo-icon.svg" alt="" class="interactive-icon">
              <h5 class="small-header">self-checkout</h5>
              <p class="interactive-paragraph">Empower customers to completely skip lines and kiosks, and check out using their smartphone without the hassle of downloading the mobile app</p>
              <div class="interactive-cta-text">read more <span class="cta-chevrons">&gt;&gt;</span></div>
            </div>
          </a>
          <a href="#" class="interactive-link w-inline-block">
            <div data-w-id="c9e726b2-8a22-2a37-e536-e13f24bb50db" class="solution-interactive-block"><img src="../wp-content/themes/prospect-child/images/demo-icon.svg" alt="" class="interactive-icon">
              <h5 class="small-header">click and collect</h5>
              <p class="interactive-paragraph">Increase your Average Order Value and Conversions with Buy Online Pickup In-Store (BOPIS)</p>
              <div class="interactive-cta-text">read more <span class="cta-chevrons">&gt;&gt;</span></div>
            </div>
          </a>
          <a href="#" class="interactive-link w-inline-block">
            <div data-w-id="4674fbc0-05d9-c447-284c-c8f61e34c2a0" class="solution-interactive-block"><img src="../wp-content/themes/prospect-child/images/demo-icon.svg" alt="" class="interactive-icon">
              <h5 class="small-header">Clienteling<br></h5>
              <p class="interactive-paragraph">Empower sales associates by giving them a 360 view of the customer at their fingertips to enhance customer engagement and in-store personalization using clienteling.</p>
              <div class="interactive-cta-text">read more <span class="cta-chevrons">&gt;&gt;</span></div>
            </div>
          </a>
        </div>
        <div class="phone-column w-col w-col-5"><img src="../wp-content/themes/prospect-child/images/blank-phone-white.png" srcset="../wp-content/themes/prospect-child/images/blank-phone-white-p-500.png 500w, ../wp-content/themes/prospect-child/images/blank-phone-white-p-800.png 800w, ../wp-content/themes/prospect-child/images/blank-phone-white.png 868w" sizes="(max-width: 767px) 100vw, 285px" alt="" class="phone-shot background"><img src="../wp-content/themes/prospect-child/images/Vue-Notification.png" srcset="../wp-content/themes/prospect-child/images/Vue-Notification-p-500.png 500w, ../wp-content/themes/prospect-child/images/Vue-Notification.png 868w" sizes="(max-width: 767px) 100vw, 285px" alt="" class="phone-shot pre-pop"><img src="../wp-content/themes/prospect-child/images/schedule-delivery.png" srcset="../wp-content/themes/prospect-child/images/schedule-delivery-p-500.png 500w, ../wp-content/themes/prospect-child/images/schedule-delivery-p-800.png 800w, ../wp-content/themes/prospect-child/images/schedule-delivery.png 868w" sizes="(max-width: 767px) 100vw, 285px" alt="" class="phone-shot"><img src="../wp-content/themes/prospect-child/images/personalized-customer-data.png" srcset="../wp-content/themes/prospect-child/images/personalized-customer-data-p-500.png 500w, ../wp-content/themes/prospect-child/images/personalized-customer-data-p-800.png 800w, ../wp-content/themes/prospect-child/images/personalized-customer-data.png 868w" sizes="(max-width: 767px) 100vw, 285px" data-w-id="d8c9c2f1-7dce-7bb9-be5b-5e3e4b368889" alt="" class="phone-shot"><img src="../wp-content/themes/prospect-child/images/Ecom-Store-Inv-Visibility.png" srcset="../wp-content/themes/prospect-child/images/Ecom-Store-Inv-Visibility-p-500.png 500w, ../wp-content/themes/prospect-child/images/Ecom-Store-Inv-Visibility-p-800.png 800w, ../wp-content/themes/prospect-child/images/Ecom-Store-Inv-Visibility.png 868w" sizes="(max-width: 767px) 100vw, 285px" data-w-id="6fd731db-be8b-3e76-56a2-67478c21079f" alt="" class="phone-shot"><img src="../wp-content/themes/prospect-child/images/Ready-to-pack-orders.png" srcset="../wp-content/themes/prospect-child/images/Ready-to-pack-orders-p-500.png 500w, ../wp-content/themes/prospect-child/images/Ready-to-pack-orders-p-800.png 800w, ../wp-content/themes/prospect-child/images/Ready-to-pack-orders.png 868w" sizes="(max-width: 767px) 100vw, 285px" alt="" class="phone-shot"><img src="../wp-content/themes/prospect-child/images/Ecom-unified-order-history.png" srcset="../wp-content/themes/prospect-child/images/Ecom-unified-order-history-p-500.png 500w, ../wp-content/themes/prospect-child/images/Ecom-unified-order-history-p-800.png 800w, ../wp-content/themes/prospect-child/images/Ecom-unified-order-history.png 868w" sizes="(max-width: 767px) 100vw, 285px" data-w-id="44e1ffec-44c1-0173-00cf-af1ef237ae1e" alt="" class="phone-shot"><img src="../wp-content/themes/prospect-child/images/Packed-orders.png" srcset="../wp-content/themes/prospect-child/images/Packed-orders-p-500.png 500w, ../wp-content/themes/prospect-child/images/Packed-orders-p-800.png 800w, ../wp-content/themes/prospect-child/images/Packed-orders.png 868w" sizes="(max-width: 767px) 100vw, 285px" alt="" class="phone-shot"><img src="../wp-content/themes/prospect-child/images/order-capture.png" srcset="../wp-content/themes/prospect-child/images/order-capture-p-500.png 500w, ../wp-content/themes/prospect-child/images/order-capture-p-800.png 800w, ../wp-content/themes/prospect-child/images/order-capture.png 868w" sizes="(max-width: 767px) 100vw, 285px" alt="" class="phone-shot"></div>
      </div>
      <div class="phone-interaction right w-row">
        <div class="phone-column w-col w-col-5"><img src="../wp-content/themes/prospect-child/images/blank-phone-white.png" srcset="../wp-content/themes/prospect-child/images/blank-phone-white-p-500.png 500w, ../wp-content/themes/prospect-child/images/blank-phone-white-p-800.png 800w, ../wp-content/themes/prospect-child/images/blank-phone-white.png 868w" sizes="(max-width: 767px) 100vw, 285px" alt="" class="phone-shot background"><img src="../wp-content/themes/prospect-child/images/Vue-Notification.png" srcset="../wp-content/themes/prospect-child/images/Vue-Notification-p-500.png 500w, ../wp-content/themes/prospect-child/images/Vue-Notification.png 868w" sizes="(max-width: 767px) 100vw, 285px" alt="" class="phone-shot pre-pop"><img src="../wp-content/themes/prospect-child/images/schedule-delivery.png" srcset="../wp-content/themes/prospect-child/images/schedule-delivery-p-500.png 500w, ../wp-content/themes/prospect-child/images/schedule-delivery-p-800.png 800w, ../wp-content/themes/prospect-child/images/schedule-delivery.png 868w" sizes="(max-width: 767px) 100vw, 285px" alt="" class="phone-shot"><img src="../wp-content/themes/prospect-child/images/inventory-visiblity.png" srcset="../wp-content/themes/prospect-child/images/inventory-visiblity-p-500.png 500w, ../wp-content/themes/prospect-child/images/inventory-visiblity-p-800.png 800w, ../wp-content/themes/prospect-child/images/inventory-visiblity.png 868w" sizes="(max-width: 767px) 100vw, 285px" data-w-id="70b0f4ae-6fb0-b36f-33e6-dc3c8e5ea9ab" alt="" class="phone-shot"><img src="../wp-content/themes/prospect-child/images/Ecom-Store-Inv-Visibility.png" srcset="../wp-content/themes/prospect-child/images/Ecom-Store-Inv-Visibility-p-500.png 500w, ../wp-content/themes/prospect-child/images/Ecom-Store-Inv-Visibility-p-800.png 800w, ../wp-content/themes/prospect-child/images/Ecom-Store-Inv-Visibility.png 868w" sizes="(max-width: 767px) 100vw, 285px" data-w-id="982d22c3-72ef-d2d1-745d-836e03833b44" alt="" class="phone-shot"><img src="../wp-content/themes/prospect-child/images/que-busting.png" srcset="../wp-content/themes/prospect-child/images/que-busting-p-500.png 500w, ../wp-content/themes/prospect-child/images/que-busting-p-800.png 800w, ../wp-content/themes/prospect-child/images/que-busting.png 868w" sizes="(max-width: 767px) 100vw, 285px" data-w-id="35fa799e-0d14-b308-f0e0-481bd81d57e7" alt="" class="phone-shot"><img src="../wp-content/themes/prospect-child/images/catalog-browsing.png" srcset="../wp-content/themes/prospect-child/images/catalog-browsing-p-500.png 500w, ../wp-content/themes/prospect-child/images/catalog-browsing-p-800.png 800w, ../wp-content/themes/prospect-child/images/catalog-browsing.png 868w" sizes="(max-width: 767px) 100vw, 285px" data-w-id="6eb2fd34-2c90-f5a3-7113-e645b3e8029d" alt="" class="phone-shot"></div>
        <div class="link-column right w-col w-col-7">
          <a href="#" class="interactive-link w-inline-block">
            <div data-w-id="8eae0371-ed14-cd15-a60e-086e62bf72c4" class="solution-interactive-block"><img src="../wp-content/themes/prospect-child/images/demo-icon.svg" alt="" class="interactive-icon">
              <h5 class="small-header">store inventory<br></h5>
              <p class="interactive-paragraph">Set up the stage for BOPIS, Ship from Store and other omnichannel operations and give better in-store customer experience.</p>
              <div class="interactive-cta-text">read more <span class="cta-chevrons">&gt;&gt;</span></div>
            </div>
          </a>
          <a href="#" class="interactive-link w-inline-block">
            <div data-w-id="8eae0371-ed14-cd15-a60e-086e62bf72bb" class="solution-interactive-block"><img src="../wp-content/themes/prospect-child/images/demo-icon.svg" alt="" class="interactive-icon">
              <h5 class="small-header">Store Fulfillment<br></h5>
              <p class="interactive-paragraph">Reduce shipping expenses and increase inventory turnover with store fulfillment<br></p>
              <div class="interactive-cta-text">read more <span class="cta-chevrons">&gt;&gt;</span></div>
            </div>
          </a>
          <a href="#" class="interactive-link w-inline-block">
            <div data-w-id="8eae0371-ed14-cd15-a60e-086e62bf72b3" class="solution-interactive-block"><img src="../wp-content/themes/prospect-child/images/demo-icon.svg" alt="" class="interactive-icon">
              <h5 class="small-header">Mobile Checkout<br></h5>
              <p class="interactive-paragraph">Enable sales associates to capture orders and process checkouts from anywhere within the store without leaving the customers.</p>
              <div class="interactive-cta-text">read more <span class="cta-chevrons">&gt;&gt;</span></div>
            </div>
          </a>
          <a href="#" class="interactive-link w-inline-block">
            <div data-w-id="8eae0371-ed14-cd15-a60e-086e62bf72ab" class="solution-interactive-block"><img src="../wp-content/themes/prospect-child/images/demo-icon.svg" alt="" class="interactive-icon">
              <h5 class="small-header">Endless Aisle<br></h5>
              <p class="interactive-paragraph">Save the sale by capturing orders for out-of-stock items and fulfill from nearby store or Distribution Centre (DC)</p>
              <div class="interactive-cta-text">read more <span class="cta-chevrons">&gt;&gt;</span></div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="how-it-works-section">
    <div class="w-container">
      <div class="section-intro-text">
        <h2 class="section-header">Lorem Ipsum Dolor Sit Amet.</h2>
        <div class="header-accent"></div>
        <p class="paragraph">Connect the Dots. Progress the Sale. This is OmniChannel Retail that Drives Value and Revenue for Fashion Brands.</p>
      </div>
      <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
        <div class="tabs-content w-tab-content">
          <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
            <div class="tab-pane-inner">
              <div class="tab-image"><img src="../wp-content/themes/prospect-child/images/customer-checkin.png" srcset="../wp-content/themes/prospect-child/images/customer-checkin-p-500.png 500w, ../wp-content/themes/prospect-child/images/customer-checkin.png 874w" sizes="100vw" alt="" class="customer-checkin-image"></div>
              <div class="tab-text">
                <h3>Check-in</h3>
                <p>Customer &quot;checks in&quot; using in-store QR code</p>
              </div>
            </div>
          </div>
          <div data-w-tab="Tab 2" class="w-tab-pane">
            <div class="tab-pane-inner">
              <div class="tab-image"><img src="../wp-content/themes/prospect-child/images/customer-checkin.png" srcset="../wp-content/themes/prospect-child/images/customer-checkin-p-500.png 500w, ../wp-content/themes/prospect-child/images/customer-checkin.png 874w" sizes="100vw" alt="" class="customer-checkin-image"></div>
              <div class="tab-text">
                <h3>Check-in</h3>
                <p>Customer &quot;checks in&quot; using in-store QR code</p>
              </div>
            </div>
          </div>
          <div data-w-tab="Tab 3" class="w-tab-pane">
            <div class="tab-pane-inner">
              <div class="tab-image"><img src="../wp-content/themes/prospect-child/images/customer-checkin.png" srcset="../wp-content/themes/prospect-child/images/customer-checkin-p-500.png 500w, ../wp-content/themes/prospect-child/images/customer-checkin.png 874w" sizes="100vw" alt="" class="customer-checkin-image"></div>
              <div class="tab-text">
                <h3>Check-in</h3>
                <p>Customer &quot;checks in&quot; using in-store QR code</p>
              </div>
            </div>
          </div>
          <div data-w-tab="Tab 4" class="w-tab-pane">
            <div class="tab-pane-inner">
              <div class="tab-image"><img src="../wp-content/themes/prospect-child/images/customer-checkin.png" srcset="../wp-content/themes/prospect-child/images/customer-checkin-p-500.png 500w, ../wp-content/themes/prospect-child/images/customer-checkin.png 874w" sizes="100vw" alt="" class="customer-checkin-image"></div>
              <div class="tab-text">
                <h3>Check-in</h3>
                <p>Customer &quot;checks in&quot; using in-store QR code</p>
              </div>
            </div>
          </div>
          <div data-w-tab="Tab 5" class="w-tab-pane">
            <div class="tab-pane-inner">
              <div class="tab-image"><img src="../wp-content/themes/prospect-child/images/customer-checkin.png" srcset="../wp-content/themes/prospect-child/images/customer-checkin-p-500.png 500w, ../wp-content/themes/prospect-child/images/customer-checkin.png 874w" sizes="100vw" alt="" class="customer-checkin-image"></div>
              <div class="tab-text">
                <h3>Check-in</h3>
                <p>Customer &quot;checks in&quot; using in-store QR code</p>
              </div>
            </div>
          </div>
          <div data-w-tab="Tab 6" class="w-tab-pane">
            <div class="tab-pane-inner">
              <div class="tab-image"><img src="../wp-content/themes/prospect-child/images/customer-checkin.png" srcset="../wp-content/themes/prospect-child/images/customer-checkin-p-500.png 500w, ../wp-content/themes/prospect-child/images/customer-checkin.png 874w" sizes="100vw" alt="" class="customer-checkin-image"></div>
              <div class="tab-text">
                <h3>Check-in</h3>
                <p>Customer &quot;checks in&quot; using in-store QR code</p>
              </div>
            </div>
          </div>
          <div data-w-tab="Tab 7" class="w-tab-pane">
            <div class="tab-pane-inner">
              <div class="tab-image"><img src="../wp-content/themes/prospect-child/images/customer-checkin.png" srcset="../wp-content/themes/prospect-child/images/customer-checkin-p-500.png 500w, ../wp-content/themes/prospect-child/images/customer-checkin.png 874w" sizes="100vw" alt="" class="customer-checkin-image"></div>
              <div class="tab-text">
                <h3>Check-in</h3>
                <p>Customer &quot;checks in&quot; using in-store QR code</p>
              </div>
            </div>
          </div>
          <div data-w-tab="Tab 8" class="w-tab-pane">
            <div class="tab-pane-inner">
              <div class="tab-image"><img src="../wp-content/themes/prospect-child/images/customer-checkin.png" srcset="../wp-content/themes/prospect-child/images/customer-checkin-p-500.png 500w, ../wp-content/themes/prospect-child/images/customer-checkin.png 874w" sizes="100vw" alt="" class="customer-checkin-image"></div>
              <div class="tab-text">
                <h3>Check-in</h3>
                <p>Customer &quot;checks in&quot; using in-store QR code</p>
              </div>
            </div>
          </div>
          <div data-w-tab="Tab 9" class="w-tab-pane">
            <div class="tab-pane-inner">
              <div class="tab-image"><img src="../wp-content/themes/prospect-child/images/customer-checkin.png" srcset="../wp-content/themes/prospect-child/images/customer-checkin-p-500.png 500w, ../wp-content/themes/prospect-child/images/customer-checkin.png 874w" sizes="100vw" alt="" class="customer-checkin-image"></div>
              <div class="tab-text">
                <h3>Check-in</h3>
                <p>Customer &quot;checks in&quot; using in-store QR code</p>
              </div>
            </div>
          </div>
          <div data-w-tab="Tab 10" class="w-tab-pane">
            <div class="tab-pane-inner">
              <div class="tab-image"><img src="../wp-content/themes/prospect-child/images/customer-checkin.png" srcset="../wp-content/themes/prospect-child/images/customer-checkin-p-500.png 500w, ../wp-content/themes/prospect-child/images/customer-checkin.png 874w" sizes="100vw" alt="" class="customer-checkin-image"></div>
              <div class="tab-text">
                <h3>Check-in</h3>
                <p>Customer &quot;checks in&quot; using in-store QR code</p>
              </div>
            </div>
          </div>
        </div>
        <div class="tabs-menu w-tab-menu"><a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link w--current"><img src="../wp-content/themes/prospect-child/images/icon-qr-code.svg" alt="" class="how-it-works-icon"><div class="text-block">Check-in</div></a><a data-w-tab="Tab 2" class="tab-link-tab-1 w-inline-block w-tab-link"><img src="../wp-content/themes/prospect-child/images/icon-bar-code.svg" alt="" class="how-it-works-icon"><div>item scan</div></a><a data-w-tab="Tab 3" class="tab-link-tab-1 w-inline-block w-tab-link"><img src="../wp-content/themes/prospect-child/images/icon-email.svg" alt="" class="how-it-works-icon"><div class="text-block-3">re-engagement</div></a><a data-w-tab="Tab 4" class="tab-link-tab-1 w-inline-block w-tab-link"><img src="../wp-content/themes/prospect-child/images/icon-sms.svg" alt="" class="how-it-works-icon"><div>SMS</div></a><a data-w-tab="Tab 5" class="tab-link-tab-1 w-inline-block w-tab-link"><img src="../wp-content/themes/prospect-child/images/icon-order.svg" alt="" class="how-it-works-icon"><div>order</div></a><a data-w-tab="Tab 6" class="tab-link-tab-1 w-inline-block w-tab-link"><img src="../wp-content/themes/prospect-child/images/icon-clickthrough.svg" alt="" class="how-it-works-icon"><div>clickthrough</div></a><a data-w-tab="Tab 7" class="tab-link-tab-1 w-inline-block w-tab-link"><img src="../wp-content/themes/prospect-child/images/icon-pickup.svg" alt="" class="how-it-works-icon"><div>pickup</div></a><a data-w-tab="Tab 8" class="tab-link-tab-1 w-inline-block w-tab-link"><img src="../wp-content/themes/prospect-child/images/icon-pricetag.svg" alt="" class="how-it-works-icon"><div>merchandizing</div></a><a data-w-tab="Tab 9" class="tab-link-tab-1 w-inline-block w-tab-link"><img src="../wp-content/themes/prospect-child/images/icon-rating.svg" alt="" class="how-it-works-icon"><div>rating</div></a><a data-w-tab="Tab 10" class="tab-link-tab-1 w-inline-block w-tab-link"><img src="../wp-content/themes/prospect-child/images/icon-share.svg" alt="" class="how-it-works-icon"><div>social share</div></a></div>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="w-container">
      <div class="footer-columns w-row">
        <div class="w-col w-col-4">
          <div class="footer-column-block"><img src="../wp-content/themes/prospect-child/images/logo-hotwax-dark.svg" alt="" class="footer-logo">
            <h5 class="footer-header">Get in Touch<br></h5>
            <div class="footer-form w-form">
              <form id="email-form" name="email-form" data-name="Email Form"><label for="email-2">Email Address</label><input type="email" class="text-field w-input" maxlength="256" name="email-2" data-name="Email 2" id="email-2" required=""><input type="submit" value="Submit" data-wait="Please wait..." class="button form-button w-button"></form>
              <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
              </div>
              <div class="w-form-fail">
                <div>Oops! Something went wrong while submitting the form.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="w-col w-col-4">
          <div class="footer-column-block">
            <div class="footer-block">
              <h5 class="footer-header">HotWax Commerce Headquarters<br></h5>
              <p>136 Main St A200<br>Salt Lake City, UT 84101</p>
            </div>
            <div class="footer-block">
              <h5 class="footer-header">contact sales<br></h5>
              <p>(877) 749-9989 (US)<br>(0731) 4055707 (INDIA)</p>
            </div>
            <div class="footer-block">
              <h5 class="footer-header">more on hotwax<br></h5><a href="#" class="footer-link">About</a><a href="#" class="footer-link">Partners</a><a href="#" class="footer-link">Connect</a></div>
          </div>
        </div>
        <div class="w-col w-col-4">
          <div class="footer-column-block">
            <div class="footer-block">
              <h5 class="footer-header">solutions<br></h5><a href="#" class="footer-link">OmniChannel Retailing</a><a href="#" class="footer-link">Nutrition &amp; Wellness</a><a href="#" class="footer-link">Fashion &amp; Apparel</a></div>
            <div class="footer-block">
              <h5 class="footer-header">products<br></h5><a href="#" class="footer-link">The OmniChannel Commerce Cloud</a><a href="#" class="footer-link">Unified Commerce</a><a href="#" class="footer-link">Master Data Management</a><a href="#" class="footer-link">Technology &amp; Architecture</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script async="" type="text/javascript">
(function ($){
    $.fn.bekeyProgressbar = function(options){
        options = $.extend({
        	animate     : true,
          animateText : true
        }, options);
        var $this = $(this);
        var $progressBar = $this;
        var $progressCount = $progressBar.find('.ProgressBar-percentage--count');
        var $circle = $progressBar.find('.ProgressBar-circle');
        var percentageProgress = $progressBar.attr('data-progress');
        var percentageRemaining = (100 - percentageProgress);
        var percentageText = $progressCount.parent().attr('data-progress');
        //Calcule la circonférence du cercle
        var radius = $circle.attr('r');
        var diameter = radius * 2;
        var circumference = Math.round(Math.PI * diameter);
        //Calcule le pourcentage d'avancement
        var percentage =  circumference * percentageRemaining / 100;
        $circle.css({
          'stroke-dasharray' : circumference,
          'stroke-dashoffset' : percentage
        })
        //Animation de la barre de progression
        if(options.animate === true){
          $circle.css({
            'stroke-dashoffset' : circumference
          }).animate({
            'stroke-dashoffset' : percentage
          }, 3000 )
        }
        //Animation du texte (pourcentage)
        if(options.animateText == true){
          $({ Counter: 0 }).animate(
            { Counter: percentageText },
            { duration: 3000,
             step: function () {
               $progressCount.text( Math.ceil(this.Counter) + '%');
             }
            });
        }else{
          $progressCount.text( percentageText + '%');
        }
    };
})(jQuery);
$(document).ready(function(){
  $('.ProgressBar--animateNone').bekeyProgressbar({
    animate : false,
    animateText : false
  });
  $('.ProgressBar--animateCircle').bekeyProgressbar({
    animate : true,
    animateText : false
  });
  $('.ProgressBar--animateText').bekeyProgressbar({
    animate : false,
    animateText : true
  });
  $('.ProgressBar--animateAll').each(function( index ) {
  	$( this ).bekeyProgressbar();
  });
})
</script>
<?php get_footer(); ?>