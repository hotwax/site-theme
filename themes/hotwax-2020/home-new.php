<?php /* Template Name: Home New  */ ?>
<?php get_header(); ?> 
   <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js'></script>
<script>  
	(function($) { 
   $(document).ready(function(){
  $('.testimonial-slider').slick({
    arrows: true,
    centerPadding: "0px",
    dots: false,
    slidesToShow: 1,
    infinite: true
  });
 });
		})(jQuery);
	
(function($) { 
$( document ).ready(function() {



/****************** Initialize the HTTP request ***************************/
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
    myFunction(xhttp);
    }
};

/****************** Get the data from respective blog rss ***************************/
xhttp.open("GET", "//blog.hotwax.co//rss.xml", true);
xhttp.send();

function new_excerpt_more($more) {
   $current_post_id = get_the_ID();
   $current_post_meta = get_post_meta($current_post_id);

   if (isset($current_post_meta['feedzy_item_url'][0])) {
      return ' <a href="' . $current_post_meta['feedzy_item_url'][0] . '">Read More</a>';
   }
   return $more;
}
add_filter('excerpt_more', 'new_excerpt_more');
function myFunction(xml) {
    
    var xmlDoc = xhttp.responseXML; 

/****************** Get all the item tag data ***************************/ 
    x = xmlDoc.getElementsByTagName("item");

/****************** Loop inside item tag ***************************/
for (i = 0; i < x.length; i++) 
{

var flag = 0;
var count = 0;
/****************** Get the respective category ***************************/
 	var category=x[i].getElementsByTagName("category");

/****************** Get the link of respective blog ***************************/
var link=x[i].getElementsByTagName("link");

/****************** Get the title of respective blog ***************************/
var title=x[i].getElementsByTagName("title");

/****************** Get the description of respective blog ***************************/
var description=x[i].getElementsByTagName("description");

/****************** Get the author of respective blog ***************************/
        var author=x[i].getElementsByTagName("author");

/****************** Get the pubDate of respective blog ***************************/
        var pubDate=x[i].getElementsByTagName("pubDate");
        var date=x[i].getElementsByTagName("dc:date");

//var date=date[0].childNodes[0].nodeValue;
//var date=new Date(date);
//var date = date.toDateString();
   
var pubDate=pubDate[0].childNodes[0].nodeValue;
var pubDate=new Date(pubDate);
var pubDate= pubDate.toDateString();

    


  $(".blog-contaner").append("<div class='blog-post'><div class='blog-post-inner'><div class='bg'></div><h3><a href="+link[0].childNodes[0].nodeValue+">"+title[0].childNodes[0].nodeValue+"</a></h3><p class='date'>BLOG | Published "+pubDate+"</p><div class='desc'>"+ description[0].childNodes[0].nodeValue +"</div><a class='read-more-blog' href="+link[0].childNodes[0].nodeValue+">READ MORE</a> </div></div>");    

}


}



setTimeout(function(){ 


$( ".hs-featured-image").each(function() {
var srcimage = $(this).attr("src");
$(this).parent().parent().parent().parent().children(".bg").css('background-image', 'url(' + srcimage + ')');
});
$(".desc p").text(function(a,b){return b.substr(0,130).concat("...")});
 }, 4000);




 


 });
 })(jQuery);
	

(function($) { 
$( document ).ready(function() {



/****************** Initialize the HTTP request ***************************/
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
    myFunction(xhttp);
    }
};

/****************** Get the data from respective blog rss ***************************/
xhttp.open("GET", "//blog.hotwax.co/podcast/rss.xml", true);
xhttp.send();



function myFunction(xml) {
    
    var xmlDoc = xhttp.responseXML; 

/****************** Get all the item tag data ***************************/ 
    x = xmlDoc.getElementsByTagName("item");

/****************** Loop inside item tag ***************************/
for (i = 0; i < x.length; i++) 
{

var flag = 0;
var count = 0;
/****************** Get the respective category ***************************/
 	var category=x[i].getElementsByTagName("category");

/****************** Get the link of respective blog ***************************/
var link=x[i].getElementsByTagName("link");

/****************** Get the title of respective blog ***************************/
var title=x[i].getElementsByTagName("title");

/****************** Get the description of respective blog ***************************/
var description=x[i].getElementsByTagName("description");

/****************** Get the author of respective blog ***************************/
        var author=x[i].getElementsByTagName("author");

/****************** Get the pubDate of respective blog ***************************/
        var pubDate=x[i].getElementsByTagName("pubDate");
        var date=x[i].getElementsByTagName("dc:date");

//var date=date[0].childNodes[0].nodeValue;
//var date=new Date(date);
//var date = date.toDateString();
   
var pubDate=pubDate[0].childNodes[0].nodeValue;
var pubDate=new Date(pubDate);
var pubDate= pubDate.toDateString();

    


  $(".podcast-contaner").append("<div class='blog-post'><div class='blog-post-inner'><div class='bg'></div><h3><a href="+link[0].childNodes[0].nodeValue+">"+title[0].childNodes[0].nodeValue+"</a></h3><p class='date'>PODCAST | Published "+pubDate+"</p><div class='desc'>"+ description[0].childNodes[0].nodeValue +"</div><a class='read-more-blog' href="+link[0].childNodes[0].nodeValue+">READ MORE</a> </div></div>");    

}


}



setTimeout(function(){ 


$( ".hs-featured-image").each(function() {
var srcimage = $(this).attr("src");
$(this).parent().parent().parent().parent().children(".bg").css('background-image', 'url(' + srcimage + ')');
});
$(".desc p").text(function(a,b){return b.substr(0,130).concat("...")});
 }, 4000);




 


 });
 })(jQuery);	
	
	
	
	
</script>
<style>

</style>


<div class="home-v2-wrapper">
	
	
	
	
<?php if( have_rows('banner') ): ?>
    <?php while( have_rows('banner') ): the_row(); 
        ?>
	
		 <?php if ( 'yes' == get_sub_field('banner_section_onoff') ): ?>   
	  		<div class="banner-wrapper">
	  			<div id="canvas" data-w-id="d60ecfd2-831e-efeb-96fe-5597d1c461bf" class="div-block"></div>
    			<div class="container-5 w-container">
				  <div class="banner-content">
					<div class="banner-heading">
						<h1><?php the_sub_field('banner_heading'); ?></h1>
					</div>
					<div class="banner-sub-heading">
						<h2><?php the_sub_field('banner_sub_heading'); ?></h2>
					</div>
					<div class="banner-description">
						<?php the_sub_field('banner_description'); ?>
					</div>
				  </div>
					<div class="banner-button">
						<?php 
							$link = get_sub_field('banner_cta_button_redirect');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="button w-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php the_sub_field('banner_cta_button_text'); ?><i class="fa-regular fa-right-long"></i></a>
							<?php endif; ?>

					</div>
				</div>
  			</div>
	
		<?php endif; ?>	
	
    <?php endwhile; ?>
<?php endif; ?>	
	
	
	
	

	
	
	
	


	
<?php if( have_rows('customer_brands') ): ?>
    <?php while( have_rows('customer_brands') ): the_row(); 

        ?>
	
	
	
	
	<?php if ( 'yes' == get_sub_field('customers_brands_onoff') ): ?>
        <div class="customers-brands">
            <div class="customers-wrapper">
				<div class="w-container">
					<div class="customer-brands-heading">
						<h2>
							<?php the_sub_field('heading'); ?>
						</h2>
					</div>
					
					<?php if( have_rows('logos') ): ?>
						<div class="customers-brands-repeater-wrapper">
						<?php while( have_rows('logos') ): the_row(); 
							$image = get_sub_field('image');
							?>
							<div class="customers-brands-image">
								<?php 
									$image = get_sub_field('logo');
									if( !empty( $image ) ): ?>
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" style="max-height:<?php the_sub_field('max_height'); ?>; max-width:<?php the_sub_field('max_width'); ?>;" />
									<?php endif; ?>
							</div>
							
		 <div class="hex-divider"></div>
						<?php endwhile; ?>
						</div>
					<?php endif; ?>
					
				</div>
			</div>
        </div>
<?php endif; ?>		
	
	
    <?php endwhile; ?>
<?php endif; ?>	
	
	


	


			<?php if( have_rows('omnichannel') ): ?>
      <?php while( have_rows('omnichannel') ): the_row(); ?>
		
		
	<?php if ( 'yes' == get_sub_field('omnichannel_onoff') ): ?>
	
	<div class="omnichannel-wrapper">
	<div class="container-5 w-container">
		
      <div class="omnichannel-inner-wrapper">
		  <div class="omnichannel-heading">
			<h2><?php the_sub_field('omnichannel_heading'); ?></h2>
			  <div class="header-accent"></div>
		<div class="omnichannel-content">
			<?php the_sub_field('omnichannel_description'); ?>
		</div>
			  
		  </div>
		<div class="omnichannel-whole-inner-wrapper">
			<div class="omnichannel-repeater">
			<?php if( have_rows('omnichannel_repeater') ): ?>
            <?php while( have_rows('omnichannel_repeater') ): the_row(); ?>
			<div class="omnichannel-repeater-inner-wrapper">
				<a href="<?php the_sub_field('omnichannel_redirect'); ?>">
					<div class="omnichannel-content-wrapper">
						<div class="omnichannel-repeater-featured-image">
							<?php 
                  $oc_featured_image = get_sub_field('oc_featured_image');
                   if( !empty( $oc_featured_image) ): ?>
                   <img src="<?php echo esc_url($oc_featured_image['url']); ?>" alt="<?php echo        esc_attr($oc_featured_image['alt']); ?>" />
                    <?php endif; ?>
						</div>
					<div class="omnichannel-repeater-icon">
					<?php 
                  $oc_image = get_sub_field('oc_image');
                   if( !empty( $oc_image) ): ?>
                   <img src="<?php echo esc_url($oc_image['url']); ?>" alt="<?php echo esc_attr($oc_image['alt']); ?>" />
                    <?php endif; ?>
				</div>
				 <div class="omnichannel-repeater-content">
					 <div class="oc-name">
					 <span> <?php the_sub_field('oc_name'); ?></span>
				</div>
                <div class="oc-description">
					<p><?php the_sub_field('oc_description'); ?></p>
				</div>
				<div class="oc-button">
					<p><?php the_sub_field('oc_cta_text'); ?> <i class="fas fa-angle-double-right"></i></p>
				</div>
				</div>
					</div>
					</a>
			</div>
          <?php endwhile; ?>
        <?php endif; ?>
		</div>
		  <div class="omnichannel-featured-image">
			  <?php 
                  $omnichannel_featured_image = get_sub_field('omnichannel_featured_image');
                   if( !empty( $omnichannel_featured_image) ): ?>
                   <img src="<?php echo esc_url($omnichannel_featured_image['url']); ?>" alt="<?php echo esc_attr($omnichannel_featured_image['alt']); ?>" />
                    <?php endif; ?>
		  </div>
	    </div>
	   </div>
		
		<?php endif; ?>	
		
		
		
		<?php endwhile; ?>
      <?php endif; ?>
		
		
		
		</div>
	</div>
	
	

	
			
			
				
			<?php if( have_rows('why_hot_wax') ): ?>
      <?php while( have_rows('why_hot_wax') ): the_row(); ?>
				
				
		<?php if ( 'yes' == get_sub_field('why_hotwax_commerce_onoff') ): ?>	
	
	
	<div class="why-hotwax-wrapper">
			<div class="why-hot-wax-whole">
				
				
			<div class="why-hot-wax-featured-image">
			  <?php 
                  $wt_featured_image = get_sub_field('wt_featured_image');
                   if( !empty( $wt_featured_image) ): ?>
                   <img src="<?php echo esc_url($wt_featured_image['url']); ?>" alt="<?php echo esc_attr($wt_featured_image['alt']); ?>" />
                    <?php endif; ?>
		  </div>
      <div class="why-hot-wax-inner-wrapper">
		<div class="why-hot-wax-heading">
			<h2><?php the_sub_field('wt_heading'); ?></h2>
			<div class="header-accent"></div>
		</div>
		  <div class="why-hot-wax-content">
			  <h3><?php the_sub_field('wt_sub_heading'); ?></h3>
			  <p><?php the_sub_field('wt_content'); ?></p>
		  </div>
		<div class="why-hot-wax-repeater-outer-wrapper">
			<h3><?php the_sub_field('wt_repeater_heading'); ?></h3>
			<div class="why-hot-wax-repeater-wrapper">
			<?php if( have_rows('wt_repeater') ): ?>
            <?php while( have_rows('wt_repeater') ): the_row(); ?>
			<div class="why-hot-wax-repeater-inner-wrapper">
				<div class="why-hot-wax-repeater-icon">
					<?php 
                  $wt_repeater_icon = get_sub_field('wt_repeater_icon');
                   if( !empty( $wt_repeater_icon) ): ?>
                   <img src="<?php echo esc_url($wt_repeater_icon['url']); ?>" alt="<?php echo esc_attr($wt_repeater_icon['alt']); ?>" />
                    <?php endif; ?>
				</div>
                     <div class="why-hot-wax-repeater-content">
					  <p><?php the_sub_field('wt_repeater_content'); ?></p>
				     </div>
				</div>
				<?php endwhile; ?>
               <?php endif; ?>
			</div>
		</div>
	    </div>
				
			<?php endif; ?>		
				
			<?php endwhile; ?>
      <?php endif; ?>
				
					
				
	   </div>
     </div>
	



	
	
	
	

	
	
			<?php if( have_rows('client_testimonial') ): ?>
      <?php while( have_rows('client_testimonial') ): the_row(); ?>
			
		<?php if ( 'yes' == get_sub_field('client_testimonial_onoff') ): ?>	
	<div class="client-testimonial-wrapper">
		<div class="container-5 w-container">
			
      <div class="client-testimonial-inner-wrapper">
		<div class="client-testimonial-heading">
			<h2><?php the_sub_field('client_testimonial_heading'); ?></h2>
			<div class="header-accent"></div>
		</div>
		<div class="testimonial-repeater testimonial-slider">
			<?php if( have_rows('testimonial_repeater') ): ?>
            <?php while( have_rows('testimonial_repeater') ): the_row(); ?>
			<div class="testimonial-repeater-inner-wrapper">
				<div class="testimonial-sub-repeater-wrapper">
				<div class="testimonial-repeater-content-wrapper">
					<div class="testimonial-content">
					 <span> <?php the_sub_field('testimonial_content'); ?></span>
				</div>
                <div class="testimonial-client-name">
					<p><?php the_sub_field('testimonial_client_name'); ?></p>
				</div>
				<div class="testimonial-client-designation">
					<p><?php the_sub_field('testimonial_client_designation'); ?></p>
				</div>
				</div>
				<div class="testimonial-image">
					<?php 
                  $testimonial_image = get_sub_field('testimonial_image');
                   if( !empty( $testimonial_image) ): ?>
                   <img src="<?php echo esc_url($testimonial_image['url']); ?>" alt="<?php echo esc_attr($testimonial_image['alt']); ?>" />
                    <?php endif; ?>
				</div>
			</div>
			</div>
          <?php endwhile; ?>
        <?php endif; ?>
		</div>
	   </div>
			
			<?php endif; ?>	
			
		<?php endwhile; ?>
      <?php endif; ?>
			
			
			
		</div>
	</div>

	

	
	
	


    
		  
     <?php if( have_rows('unify') ): ?>
      <?php while( have_rows('unify') ): the_row(); ?>
		  
			<?php if ( 'yes' == get_sub_field('unify_onoff') ): ?>	
	
	<div class="unify-wrapper">
	  <div class="container-5 w-container">
		  
      <div class="unify-inner-wrapper">
		<div class="unify-heading">
			<h2><?php the_sub_field('heading'); ?></h2>
			<div class="header-accent"></div>
		</div>
		<div class="stats-group">
			<?php if( have_rows('stats_group') ): ?>
            <?php while( have_rows('stats_group') ): the_row(); ?>
			<div class="stats-group-inner-wrapper">
				 <h2> <?php the_sub_field('stat_number'); ?></h2>
                <h3><?php the_sub_field('stat_name'); ?></h3>
			    <p><?php the_sub_field('stat_description'); ?></p>
			</div>
          <?php endwhile; ?>
        <?php endif; ?>
		</div>
	   </div>
		  
		  <?php endif; ?>	
		  
		<?php endwhile; ?>
      <?php endif; ?>
		  
			  
		  
    </div>
   </div>


	

	
	
	
	
	
<?php if( have_rows('pre_orders') ): ?>
    <?php while( have_rows('pre_orders') ): the_row(); 
        ?>
			<?php if ( 'yes' == get_sub_field('pre_orders_onoff') ): ?>	

			<div class="pre-orders-wrapper">
				 <div class="container-5 w-container">
					  <div class="pre-order-inner-wrapper">
							<div class="pre-order-heading">
								<h2><?php the_sub_field('heading'); ?></h2>
							</div>
							<div class="pre-order-button">
							  <?php 
								$link = get_sub_field('cta_button');
								if( $link ): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php the_sub_field('cta_button_text'); ?></a>
								<?php endif; ?>
							</div>
					  </div>
					</div>
					</div>
			<?php endif; ?>	
    <?php endwhile; ?>
<?php endif; ?>	
	
	


	
	


		
			
		
			
	
	

	
	<div class="blog-wrapper blog-tag-wrapper" >
	<div class="container">
		            <div class="latest-updates-heading">
			          <h2>Latest Updates</h2>
					 <div class="header-accent"></div>
		            </div>
		            <div class="blog-sec-heading">
					 	<h3>
							Blogs
						</h3>
		            </div>
                  	<div class="blog-contaner updates-group">
		
		<?php echo do_shortcode("[feedzy-rss feeds='https://blog.hotwax.co/rss.xml' max='3' ] "); ?>

		</div> 
		
		            <div class="podcast-sec-heading">
					 	<h3>
							Podcast Episodes
						</h3>
		            </div>
                  	<div class="podcast-contaner updates-group">
		
		<?php echo do_shortcode("[feedzy-rss feeds='https://blog.hotwax.co/podcast/rss.xml' max='3'] "); ?>
		</div>
				</div>
	</div>



	
	
	
	

	
			
			<?php if( have_rows('retail_tank') ): ?>
      <?php while( have_rows('retail_tank') ): the_row(); ?>
			
		<?php if ( 'yes' == get_sub_field('retail_tank_onoff') ): ?>	
	
	
	
	<div class="Retail-tank-wrapper">
		<div class="container-5 w-container">
			
			
			
      <div class="Retail-tank-inner-wrapper">
		<div class="Retail-tank-heading">
			<h2><?php the_sub_field('rt_heading'); ?></h2>
			<div class="header-accent"></div>
		</div>
		<div class="rt-repeater">
			<?php if( have_rows('rt_repeater') ): ?>
            <?php while( have_rows('rt_repeater') ): the_row(); ?>
			<div class="rt-repeater-inner-wrapper">
				<a href="<?php the_sub_field( 'rt_blog_post_link' ); ?>">
				<div class="rt-repeater-image" style="background-image:url('<?php echo get_sub_field('featured_image_rt'); ?>');">
				</div>
				 <div class="rt-repeater-content-wrapper">
					 <div class="rt-repeater-date">
					 <span> <?php the_sub_field('rt_blog_date'); ?></span>
				</div>
                <div class="rt-repeater-name">
					<p><?php the_sub_field('rt_blog_name'); ?></p>
				</div>
				<div class="rt-repeater-button">
					<div class="oc-button">
					<p>Know More  <i class="fas fa-angle-double-right"></i></p>
				</div>
				</div>
				</div>
				</a>
			</div>
          <?php endwhile; ?>
        <?php endif; ?>
		</div>
	   </div>
		<?php endif; ?>		
			
			
			
		<?php endwhile; ?>
      <?php endif; ?>
			
			
			
		</div>
		
		
		
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