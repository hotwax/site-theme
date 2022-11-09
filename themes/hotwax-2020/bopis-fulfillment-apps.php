<?php /* Template Name: OmniChannel Retail Sales Auditing */ ?>
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

	html{
		scroll-behavior: smooth;
	}

	html, body{
		overflow-x: hidden;
	}

	body{
		background-color: var(--surface);
		color: var(--font-color-body);
	}
	--Mac-width: 110vw;
	--Mac-height: calc(var(--Mac-width) * .61);

	body{
		--red: #EC2227;
		--m-shadow: 0px 0px 17px rgba(0, 0, 0, 0.06), 
			13px 13px 28px rgba(0, 0, 0, 0.09);

		--font-body: "Open Sans", sans-serif;
		--font-special: "Montserrat", sans-serif;

		--grid-gap: 100px;

		--image-zindex: 2;
		--below-image: 1;
		--above-image: 3;


		--Mac-width: 110vw;
		--Mac-height: calc(var(--Mac-width) * .61);



		--surface: white;
		--font-color-body: #222;
	}
	
	#subtitle {
			color: var(--red)
	}

	.menuwrapper {
		width: 80%;
		max-width: max-content;
		background-color: hsla(360, 150%, 100%, .7);
		backdrop-filter: blur(15px);
		box-shadow: var(--m-shadow);
		border-radius: 16px;
		padding: 16px 0 16px 16px;
		overflow: scroll;
	}

	nav{
		display: grid;
		grid-auto-flow: column;
		grid-gap: 24px;
	}

	nav :last-child{
		padding-right: 16px;
	}

	#home {
		margin: auto;
		padding: 0 20px 50px 20px;
	}


	/* device styling start*/
	.iPhone, iPad{
		position: relative;
	} 

	.iPhone{
		max-width: var(--iPhone-width);
	}

	.iPad{
		max-width: var(--iPad-width);
	}
	.Mac {
		max-width: var(--Mac-width);
		height: var(--Mac-height);
		position: absolute;
	}

	.Mac-container {
		height: var(--Mac-height);
		position: relative;
	}
	.iPhone::before{
		background-image: url(https://www.hotwax.co/wp-content/uploads/2021/08/iOS_Shadow-1.png);
		width: var(--iPhone-shadow-width);
		height: var(--iPhone-shadow-height);
		background-size: var(--iPhone-shadow-width) var(--iPhone-shadow-height);
		background-repeat: no-repeat;
		content: '';
		position: absolute;
		z-index: var(--below-image);
		top: -6px;
		left: -12px;
	}

	.iPad::before{
		background-image: url(https://www.hotwax.co/wp-content/uploads/2021/08/iPad_Shadow.png);
		width: var(--iPad-shadow-width);
		height: var(--iPad-shadow-height);
		background-size: var(--iPad-shadow-width) var(--iPad-shadow-height);
		background-repeat: no-repeat;
		content: '';
		display: block;
		position: absolute;
		z-index: var(--below-image);
	}



	img{
		position: relative;
		z-index: var(--image-zindex);
		max-width: 100%;
	}
	div#home h3 {
		font: 700 18px/2rem var(--font-special);
		color: var(--red);
	}
	div#home p {
		font-family: var(--font-body);
		font-weight: 300;
		font-size: 18px;
		line-height: 2rem;
	}
	/* Mobile only CSS */
	@media only screen and (max-width: 980px){
		#home{
			overflow-x: hidden;
		}
	}

	/* Desktop CSS */
	@media only screen and (min-width: 980px) {

		body{
			--iPhone-width: 387px;
			--iPhone-shadow-width: 628px;
			--iPhone-shadow-height: 963px;

			--iPad-width: 861px;
			--iPad-shadow-width: 979px;
			--iPad-shadow-height: 779px; 

			--Mac-width: 1060px;
			--Mac-height: 650px;
		}

		#home {
			max-width: 980px;
			margin: auto;
			padding: 0 20px 110px;
		}

		.iPhone::before{
			top: -9px;
			left: -18px;
		}

		/* font styling start */
		h1{
			font-size: 64px;
			font-weight: 900;
		}
		/* font styling end */
	}
	/* device styling end */


	html{
		scroll-behavior: smooth;
	}

	body{
		overflow-x: hidden;
		background-color: var(--surface);
		color: var(--font-color-body);
	}
	:root{
		--red: #EC2227;
		--m-shadow: 0px 0px 17px rgba(0, 0, 0, 0.06), 
			13px 13px 28px rgba(0, 0, 0, 0.09);

		--font-body: "Open Sans", sans-serif;
		--font-special: "Montserrat", sans-serif;

		--grid-gap: 100px;


		--surface: white;
		--font-color-body: #222;
	}




	/* layout styling start */
	/* #home {
	margin: auto;
	padding: 0 20px;
	} */

	.menuwrapper{
		position: fixed;
		left: 50%;
		transform: translate(-50%, 0);
		top: 36px;
		z-index: 11;
	}

	.content{
		display: grid;
		margin-top: 60px;
	}
	.title{
		display: flex;
		justify-content: space-between;
		align-items: flex-end;
		flex-wrap: wrap;
	}

	
	/* layout styling end */

	/* media style start */
	#logo{
		margin: auto;
		margin-bottom: 24px;
		width: 190px;
	}

	.tech_logos{
		display: none;
	}
	@supports (display: grid){
		.tech_logos{
			grid-column: 1;
			grid-row: 1;
			display: grid;
			grid-template-rows: repeat(3, 1fr);
			align-items: center;
			justify-content: center;
		}
	}

	#HC_logo{
		grid-row: 1;
		margin-bottom: 8px;
	}

	#Vue_logo{
		grid-row: 2;
	}

	#Ionic_logo{
		grid-row: 3;
	}

	.HWClogo, .HWSlogo{
		width: 60%;
	}

	#next_steps{
		display: grid;
		grid-auto-flow: row;
		grid-gap: 24px;
		justify-items: center;
		padding: 100px 0;
	}

	#next_steps > a{
		width: 80%;
	}

	#next_steps > h1{
		grid-area: 1 / 1 / 2 / 2;
		justify-self: center;
	}

	#benefits{
		grid-column: 1 / -1;
		display: grid;
		grid-auto-flow: row;
		grid-gap: 24px;
		text-align: center;
		margin-bottom: 40px;
	}

	.card{
		display: grid;
		grid-auto-flow: row;
		grid-gap: 16px;
		justify-items: center;
		background-color: rgba(255, 255, 255, 0);
		padding: 16px 8px;
		border-radius: 16px;
		box-shadow: var(--m-shadow);
		cursor: pointer;
		box-sizing: border-box;
		height: 100%;
		transition: box-shadow 150ms ease-in, border-width 50ms ease-in;
		text-align: center;
		color: #222;
	}

	a > div:active{
		background-color: rgb(221, 221, 221);
	}
	/* media style end */



	/* introduction */


	.intro_content{
		grid-column: 1;
		grid-row: 1;
		position: relative;
		z-index: 10;
		padding-bottom: 20px;
		background-color: rgba(255,255,255,0.67);
		backdrop-filter: blur(18px);
		text-align: center;
		font-family: var(--font-special);
	}

	#git{
		background-color: rgba(0, 0, 0, 0.87);
	}

	#short_d{
		margin-top: 68px;
	}

	#long_d{
		margin-top: 50px;
	}

	#reperia{
		background-color: rgb(0, 153, 204);
		margin-top: 32px;
	}

	#reperia > img{
		background-color: white;
		object-fit: contain;
	}

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

	/* DC */

	#dc{
		display: grid;
	}
	#dc > .content{
		display: grid;
		justify-self: center;
		grid-template-rows: repeat(5, auto);
		grid-template-columns: 1fr 1fr;
		grid-gap: 32px;
		width: max-content;
	}

	#dc1{
		grid-row: 1 / 3;
		grid-column: 1 / 2;
	}

	#dc2{
		grid-row: 2 / 4;
		grid-column: 2 / 3;
	}

	#dc3{
		grid-row: 3 / 5;
		grid-column: 1 / 2;
	}

	/* Clienteling */
	#clnt1{
		grid-row: 1;
		z-index: 2;
	}

	#clnt2 {
		grid-row: 3;
	}

	#clnt3{
		grid-area: 6 / 1;
		grid-column: 1;
		margin-top: -138px;
	}

	#clntf3, #clntf4{
		position: relative;
		z-index: 3;
	}

	#clntf4{
		grid-area: 6 / 1;
		align-self: end;
	}
	#clnt3::before{
		/* adjusting position shadow for awkward image size */
		top: 212px;
	}

	/* mPOS */
	#mpos1{
		grid-row: 2;
	}
	/* Pre Order */

	#PO2{
		margin-top: 45px;
	}



	/* Store Inventory Management */
	#simf1{
		grid-row: 1;
	}

	#sim3{
		margin-top: 24px;
	}


	/* Fimga */
	#figma{
		display: grid;
		grid-auto-flow: row;
		grid-template-rows: 104px;
		grid-row-gap: 16px;
		margin: auto;
		padding: 40px 24px;
		margin-bottom: 150px;
		border-radius: 16px;
		box-shadow: var(--m-shadow);
		width: 80%;
		box-sizing: border-box;
	}

	.figmalogo{
		max-height: 100%;
		justify-self: center;
		align-self: center;
	}

	#figma > a{
		color: var(--red);
		font-family: var(--font-special);
	}


	/* Mobile only CSS */
	@media only screen and (max-width: 980px) {
		#home{
			overflow-x: hidden;
		}

		.logo{
			max-height: 10vh;
		}
		.iPhone, .iPad{
			margin: auto;
		}

		h3{
			margin-top: 16px;
		}
		#oresa1 {
			margin-bottom: 50px;
		}

		#oresa2 {
			margin-block: 50px;
		}

		.content{
			grid-auto-flow: row;
			grid-row-gap: 24px;
		}
		.Mac-container {
			overflow: visible;
			display: flex;
			justify-content: center;
		}
	}


	/* Mobile only CSS end */

	/* Desktop CSS */
	@media only screen and (min-width: 980px) {
		/* font styling start */

		/* font styling end */


		/* layout styling start */
		/* #home {
		max-width: 980px;
		margin: auto;
		padding: 0 20px;
	} */

		.content{
			margin-top: 100px;
		}

		.feature{
			width: 352px;
		}


		/* layout styling end */


		/* media style start */
		.tech_logos{
			grid-template-columns: repeat(3, 1fr);
			grid-template-rows: 1fr;
		}

		#HC_logo{
			grid-area: 1 / 2;
			justify-self: center;
			align-self: end;
		}

		#Vue_logo{
			grid-area: 1 / 3;
			justify-self: center;
			align-self: center;
			width: 50%;
		}

		#Ionic_logo{
			grid-area: 1 / 1;
			justify-self: center;
			align-self: center;
		}

		.logo{
			width: 100%;
		}
		/* media style end */


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

		/* #bopis0{
		grid-row: 1 / 3;
		grid-column: 1;
	} */

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

		/* DC */

		#dc > .content{
			grid-auto-flow: column;
			grid-template-rows: 1fr;
			grid-template-columns: repeat(3, 1fr);
			justify-self: center;
			/* width: max-content; */
			display: grid;
			grid-gap: 24px;
		}

		#dc1, #dc2, #dc3{
			grid-area: unset;
		}

		/* Clienteling */
		#clnt > .content{
			grid-template-rows: auto auto 1fr 2fr;
			grid-template-columns: 1fr 1fr;
			grid-column-gap: var(--grid-gap);
			grid-row-gap: 50px;
		}

		#clnt1{
			grid-row: 2 / 3;
			z-index: 2;
		}

		#clnt2 {
			grid-row: 2 / 3;
		}

		#clnt3{
			grid-row: 3 / 5;
			margin-top: -200px;
			z-index: 1;
		}

		#clnt3::before{
			/* adjusting position shadow for awkward image size */
			top: 341px;
		}

		#clntf1{
			grid-row: 1 / 1 / 2 / 2;
		}

		#clntf2{
			grid-row: 1 / 2 / 2 / 3;
		}

		#clntf3{
			grid-row: 3 / 4;
			grid-column: 2;
			align-self: end;
		}

		#clntf4{
			grid-row: 4 / 5;
			grid-column: 2;
			align-self: start;
			padding-top: 36px;
		}

		/* mPOS */
		#mpos > .content{
			grid-template-rows: max-content auto auto;
			grid-template-columns: 1fr 1fr;
			grid-column-gap: var(--grid-gap);
		}

		#mpos1{
			grid-area: 1 / 2 / 3 / 3;
		}

		#mpos2{
			grid-area: 3 / 1;
		}

		#mposf1{
			grid-area: 1 / 1;
			padding-top: 115px;

		}

		#mposf2{
			grid-area: 2 / 1;
			padding-top: 153px;
		}

		#mposf3{
			padding-top: 120px;
		}

		/* Pre Order */

		#po > .content{
			grid-template-columns: 1fr 1fr;
			grid-template-rows: repeat(4, auto);
			grid-column-gap: var(--grid-gap);
		}

		#POf3{
			padding-top: 30px;
			grid-column: 1;
			grid-row: 1;
		}

		#POf4{
			grid-column: 1;
			grid-row: 2;
		}

		#PO3{
			grid-column: 2;
			grid-row: 1 / 3;
		}

		#PO4{
			grid-column: 1;
			grid-row: 3;
		}

		#POf5{
			grid-column: 2;
			align-self: center;
		}

		#Releasing{
			margin-top: 100px;
			grid-column: 1 / 3;
		}

		#POf6{
			width: var(--iPad-width);
			margin: auto;
		}

		#PO1, #PO2{
			margin-left: auto;
			margin-right: auto;
		}

		/* Ship from Store */
		#sfs > .content{
			grid-template-columns: 1fr 1fr;
			grid-template-rows: auto auto 130px auto
		}

		#sfstablet{
			display: inherit;
			grid-row: 1;
			grid-column: 1 / 3;
			grid-template-rows: auto auto;
			grid-template-columns: 1fr 1fr;
			justify-items: center;
			align-items: start;

		}
		/* centering tablet sfs view */
		#sfsf1{
			grid-row: 1;
			grid-column: 1;
		}

		#sfsf2{
			grid-row: 1;
			grid-column: 2;
		}

		#sfs1{
			grid-row: 2;
			grid-column: 1 / 3;
			padding-top: 35px;
			padding-bottom: 120px;
		}
		/* end tablet sfs view */

		#sfsf3{
			grid-row: 2 / 4;
			grid-column: 1;
			align-self: center;
		}

		#sfs2{
			grid-row: 2 / 4;
			grid-column: 2;
		}

		#sfsf4{
			grid-row: 3 / 5;
			grid-column: 2;
			align-self: center;
		}

		#sfs3{
			grid-row: 3 / 5;
			grid-column: 1;
		}

		/* Store Inventory Management */
		#sim > .content{
			grid-template-columns: 1fr 1fr;
			grid-template-rows: repeat(3, auto);
			grid-column-gap: var(--grid-gap);
		}

		#sim1{
			grid-area: 1 / 1;
		}

		#sim2{
			grid-area: 2 / 2;
			margin-top: -166px;
		}

		#simf1{
			grid-area: 1 / 2;
			align-self: center;
		}

		#simf2{
			grid-area: 2 / 1;
			align-self: center;
			margin-top: -166px;
		}

		#simf3{
			width: 100%;
			padding: 80px 0 15px;
		}

		/* wrapper class to align text to the left but keep it aligned with the iPad frame */
		.receiving{
			grid-column: 1 / 3;
			margin: auto;
		}

		/* next steps */
		#next_steps{
			grid-auto-flow: row;
			grid-template-columns: repeat(2, 1fr);
			justify-items: stretch;
		}

		#next_steps > h1{
			grid-area: 1 / 1 / 2 / 3;
			justify-self: center;
		}

		#next_steps > a{
			width: unset;
		}

		.card{
			padding: 40px;
		}

		/* OReSA */
		#oresa > .content {
			grid-template-columns: 1fr 1fr;
			grid-template-rows: repeat(3, auto);
			column-gap: 32px;
			justify-self: center;
			/margin-bottom: 250px;
		}

		#oresa1 {
			grid-row: 1;
			grid-column: 2;
		}

		#oresaf1 {
			grid-row: 1;
			grid-column: 1;
			align-self: center;
		}

		#oresa2 {
			grid-row: 2;
			grid-column: 1;
			position: relative;
			margin-top: -35px;
		}

		#oresaf2 {
			grid-row: 2;
			grid-column: 2;
			padding-top: 100px;
		}

		#oresa3 {
			position: relative;
			padding-top: 50px;
		}

		#oresaf3 {
			padding-top: 220px;
		}

		#oresa2 > img {
			position: absolute;
			max-width: var(--Mac-width);
			right: 0;
		}

		#oresa3 > img {
			position: absolute;
			max-width: var(--Mac-width);
			left: 0;
		}

		#figma{
			grid-template-columns: 104px 1fr;
			grid-template-rows: repeat(3, auto);
			grid-column-gap: 50px;
			width: 100%;
		}

		.figmalogo {
			grid-area: 1 / 1 / 4 / 2;
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

	<section id="oresa">
		<!-- 		<div>
<h1>OmniChannel Retail Sales Auditing</h1>
<br>
<p>
subtitle
</p>
</div> -->
		<div class="content">
			<div id="oresaf1" class="feature">
				<h3>
					BOPIS
				
				</h3>
				<p>
					Automatically reads daily sales totals of transactional systems (e.g. eCommerce & POS) and compares them to sales totals of accounting systems, enabling the finance team to simplify daily sales reconciliation.  If discrepancies are identified in sales totals, a gap analysis report is generated automatically and can be sent to the finance team.
				</p>
			</div>
			<div id="oresa1" class="iPhone">
				<img src="https://www.hotwax.co/wp-content/uploads/2022/10/oresa_1.png" alt="OReSA">
			</div>
			<div id="oresa2" class="Mac-container">
				<img class="Mac" src="https://www.hotwax.co/wp-content/uploads/2022/10/Reconsiliation-Report.png" alt="OReSA">
			</div>
			<div id="oresaf2" class="feature">
				<h3>
					Ensure integrity of data flowing to the accounting system
				</h3>
				<p>
					OReSA ensures the accuracy of daily sales & returns data flowing from the eCommerce/POS systems to the OMS to the accounting system by using system and user-defined validations.  In the case of data loss, a daily report of missing data is generated and emailed to the operations team so that errors can be identified and fixed quickly to ensure accuracy of the daily sales reconciliation process.
				</p>
			</div>
			<div id="oresaf3" class="feature">
				<h3>
					Simplify the month-end closing process
				</h3>
				<p>
					OReSA automates the daily sales reconciliation process and ensures the integrity of data flowing to the accounting system, eliminates time-consuming month-end sales auditing tasks and helps finance teams close their financial month in minutes as opposed to hours or days.
				</p>
			</div>
			<div id="oresa3" class="Mac-container">
				<img class="Mac" src="https://www.hotwax.co/wp-content/uploads/2022/10/Missing-Orders-Report.png" alt="OReSA">
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
		.Mac {
			max-width: 100%;
			position: relative;
			height: auto;
		}
	}
</style>
<?php endif; ?>
<?php get_footer(); ?>