<?php /* Template Name: 404 error  */ ?>
<?php get_header(); ?>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<script>  

	
	
	
	
	
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
xhttp.open("GET", "//blog.hotwax.co/rss.xml", true);
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

<div class="error-outer">
	<div class="error-inner">
		<div class="error-heading">
			<h2>Oops! Sorry, This page could not be found!</h2>
		</div>
		<div class="error-description">
			<p>
				To find what you're looking for you can return to the <a href="https://www.hotwax.co/">homepage</a> or <a href="https://www.hotwax.co/connect/">contact us</a> , or check out some content our customers can’t get enough of:
			</p>
		</div>
	</div>
</div>
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
		<?php echo do_shortcode("[feedzy-rss feeds='https://blog.hotwax.co/rss.xml' max='3'] "); ?></div> 
		
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
<style>
	
</style>

<?php get_footer(); ?>
