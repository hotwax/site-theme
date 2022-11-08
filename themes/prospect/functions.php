<?php
// CONSTANTS
$theme = wp_get_theme();
define('PROSPECT_THEME_NAME', $theme->get( 'Name' ));
define( 'PROSPECT_THEME_DIR', get_template_directory() );
define( 'PROSPECT_THEME_URI', get_template_directory_uri() );
define( 'PROSPECT_BEFORE_CE_TITLE', '<div class="ce_title">' );
define( 'PROSPECT_AFTER_CE_TITLE', '</div>' );
define( 'PROSPECT_V_SEP', '<span class="v_sep"></span>' );
if ( !defined( 'PROSPECT_THEME_COLOR' ) ){
	define( 'PROSPECT_THEME_COLOR', '#e95f58' );
}
define( 'PROSPECT_THEME_2_COLOR', '#4e9bdd' );
define( 'PROSPECT_THEME_3_COLOR', '#18bb7c' );
define( 'PROSPECT_THEME_HEADER_BG_COLOR', '#272b31' );
define( 'PROSPECT_THEME_HEADER_FONT_COLOR', '#f0f0f0' );
define( 'PROSPECT_THEME_FOOTER_BG_COLOR', '#2d3339' );
define( 'PROSPECT_MB_PAGE_LAYOUT_KEY', 'cws_mb_post' );
// \CONSTANTS

# TEXT DOMAIN
load_theme_textdomain( 'prospect', get_template_directory() .'/languages' );
# \TEXT DOMAIN

// INCLUDES
// config 
require_once( trailingslashit( get_template_directory() ) . 'includes/config/scg.php' );
// \config 
// core 
require_once( trailingslashit( get_template_directory() ) . 'includes/core/cws_thumb.php' );
require_once get_template_directory() . '/includes/core/class-tgm-plugin-activation.php';
require_once( trailingslashit( get_template_directory() ) . 'includes/core/pb.php' );
// \core 

// modules 
require_once( trailingslashit( get_template_directory() ) . 'includes/modules/cws_blog.php' );
require_once( trailingslashit( get_template_directory() ) . 'includes/modules/cws_breadcrumbs.php' );
require_once( trailingslashit( get_template_directory() ) . 'includes/modules/cws_comments.php' );
require_once( trailingslashit( get_template_directory() ) . 'includes/modules/cws_portfolio.php' );
require_once( trailingslashit( get_template_directory() ) . 'includes/modules/cws_staff.php' );
require_once( trailingslashit( get_template_directory() ) . 'includes/modules/cws_search.php' );


// \modules 
// \INCLUDES

function prospect_clear_closing_prgs ( $content ){
	$match = preg_match( "#^</p>#", $content, $matches, PREG_OFFSET_CAPTURE );
	if ( $match ){
		$match_data = $matches[0];
		$content = substr_replace( $content, "", $match_data[1], strlen( $match_data[0] ) );
	}
	return $content;
}
add_filter( 'the_content', 'prospect_clear_closing_prgs', 11 );

// Check plugin's version
function cws_check_plugin_version ( $plugin ){
	$opt_res = wp_remote_get('http://up.cwsthemes.com/plugins/update.php?pname=' . $plugin );

	if (( ! isset($opt_res->errors)) && (200 == $opt_res['response']['code'] ) ){
		$cws_chk_ret = $opt_res['body'];
	} else {
		switch ($plugin) {
			case 'revslider':
				$cws_chk_ret = "5.4.8";
				break;
			case 'js_composer':
				$cws_chk_ret = "5.7";
				break;			
			default:
				break;
		}
	}
	return $cws_chk_ret;
}
// \Check plugin's version

add_action( 'tgmpa_register', 'prospect_register_required_plugins' );

function prospect_register_required_plugins (){
	$plugins = array(
		array(
			'name'					=> esc_html__( 'Prospect Shortcodes', 'prospect' ), // The plugin name
			'slug'					=> 'prospect-shortcodes', // The plugin slug (typically the folder name)
			'source'				=> get_template_directory() . '/plugins/prospect-shortcodes.zip', // The plugin source
			'required'				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.1.2',
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'			=> '', // If set, overrides default API URL and points to an external URL
		),			
		array(
			'name'					=> esc_html__( 'CWS Portfolio & Staff', 'prospect' ), // The plugin name
			'slug'					=> 'cws-portfolio-staff', // The plugin slug (typically the folder name)
			'source'				=> get_template_directory() . '/plugins/cws-portfolio-staff.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.1.1',
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'					=> esc_html__( 'CWS MegaMenu', 'prospect' ), // The plugin name
			'slug'					=> 'cws-megamenu', // The plugin slug (typically the folder name)
			'source'				=> get_template_directory() . '/plugins/cws-megamenu.zip', // The plugin source
			'required'				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.2',
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation'	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'					=> esc_html__( 'CWS Demo Importer', 'prospect' ), // The plugin name
			'slug'					=> 'cws-demo-importer', // The plugin slug (typically the folder name)
			'source'				=> get_template_directory() . '/plugins/cws-demo-importer.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.0.8', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'					=> esc_html__('CWS Flaticons','prospect'), // The plugin name
			'slug'					=> 'cws-flaticons', // The plugin slug (typically the folder name)
			'source'				=> get_template_directory() . '/plugins/cws-flaticons.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.1.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'					=> esc_html__('CWS Theme Options','prospect'), // The plugin name
			'slug'					=> 'cws_to', // The plugin slug (typically the folder name)
			'source'				=> get_template_directory() . '/plugins/cws_to.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.3.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'					=> esc_html__( 'WPBakery Visual Composer', 'prospect' ), // The plugin name
			'slug'					=> 'js_composer', // The plugin slug (typically the folder name)
			'source'				=> 'http://up.cwsthemes.com/plugins/js_composer.zip', // The plugin source
			'required'				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> cws_check_plugin_version('js_composer'), // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'			=> 'http://up.cwsthemes.com/plugins/', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'					=> esc_html__( 'Revolution Slider', 'prospect' ), // The plugin name
			'slug'					=> 'revslider', // The plugin slug (typically the folder name)
			'source'				=> 'http://up.cwsthemes.com/plugins/revslider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> cws_check_plugin_version('revslider'), 
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> 'http://up.cwsthemes.com/plugins/', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'					=> esc_html__( 'Contact Form 7', 'prospect' ), // The plugin name
			'slug'					=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'					=> esc_html__( 'WP Google Maps', 'prospect' ), // The plugin name
			'slug'					=> 'wp-google-maps', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'					=> esc_html__( 'oAuth Twitter Feed for Developers', 'prospect' ), // The plugin name
			'slug'					=> 'oauth-twitter-feed-for-developers', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'prospect',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_slug' 		=> 'themes.php', 				// Default parent menu slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
	);

	tgmpa( $plugins, $config );

}

class Prospect_Theme_Features{

	public function __construct (){

		// Makes sure the plugin is defined before trying to use it
		if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
		    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}		
		// Check if JS_Composer is active
		if (( in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) || (is_plugin_active_for_network( 'js_composer/js_composer.php' ) )){
			require_once( get_template_directory() . '/vc/prospect_vc_config.php' ); // JS_Composer Theme config file
			vc_disable_frontend(); //Disable Visual Composer Front-End Editor
		};
		// Load Woocommerce Extension
		require_once( get_template_directory() . '/woocommerce/wooinit.php' ); // WooCommerce Shop ini file
		// Check if WPML is active
		if ( prospect_check_for_plugin('sitepress-multilingual-cms/sitepress.php') ) {
			prospect_wpml_ext_init();
		}
		if ( class_exists( 'Prospect_SCG' ) ){
			new Prospect_SCG;
		}
		// Disable VC updates
		if (class_exists('Vc_Manager')) {
		   $vc_man = Vc_Manager::getInstance();
		   $vc_man->disableUpdater(true);
		   if (!isset($_COOKIE['vchideactivationmsg_vc11'])) {
		   		setcookie('vchideactivationmsg_vc11', WPB_VC_VERSION);
		   }
		}

		$this->theme_options_customizer_init ();
		$this->set_content_width ();
		add_action( 'prospect_header_meta', array( $this, 'prospect_default_header_meta' ) );
		add_action( 'after_setup_theme', array( $this, 'prospect_after_setup' ) );
		

		add_action( 'wp', array( $this, 'prospect_page_meta_vars' ) );
		add_filter( 'wp_title', array( $this, 'prospect_wp_title_filter' ) );
		add_filter('pre_set_site_transient_update_themes', array($this, 'prospect_check_for_update') );
		add_action('fw_enqueue_scripts', array($this, 'prospect_fw_admin_init' ) );
		add_action( 'wp_head', array( $this, 'prospect_render_site_icon' ) );
		add_filter( 'wp_get_nav_menu_items', array( $this, 'prospect_split_nav_menu' ) );
		add_filter( 'walker_nav_menu_start_el', array( $this, 'prospect_nav_menu_pointer' ), 10, 2 );
		add_filter( 'wp_nav_menu_items', array( $this, 'prospect_sandwich_menu_switcher' ), 10 ,2 );
		add_filter( 'wp_nav_menu_args', array( $this, 'prospect_sandwich_menu_class' ) );
		add_filter( 'widget_title', array( $this, 'prospect_wrap_widget_title' ), 11, 3 );

		add_action( 'wp_enqueue_scripts', array( $this, 'prospect_js_vars_init') );
		add_action( 'wp_enqueue_scripts', array( $this, 'prospect_register_reset_styles' ), 1 );
		add_action( 'wp_enqueue_scripts', array( $this, 'prospect_register_theme_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'prospect_enqueue_main_theme_stylesheet' ), 11 );		
		add_action( 'wp_enqueue_scripts', array( $this, 'prospect_sandwich_menu_animation' ), 11 );
		add_action( 'wp_enqueue_scripts', array( $this, 'prospect_load_youtube_api' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'prospect_register_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'prospect_define_ajaxurl' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'prospect_localize_data' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'prospect_enqueue_theme_stylesheet' ), 999 );
		add_action( 'wp_enqueue_scripts', array( $this, 'prospect_custom_styles_test' ), 900 );
		add_action( 'admin_enqueue_scripts', array( $this, 'prospect_register_admin_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'prospect_register_admin_styles' ) );
	}

	public function prospect_fw_admin_init( $hook ) {
		wp_enqueue_script('select2-js', get_template_directory_uri() . '/includes/core/assets/js/select2/select2.js', array('jquery') );
		wp_enqueue_style('select2-css', get_template_directory_uri() . '/includes/core/assets/js/select2/select2.css', false, '2.0.0' );
	}

# UPDATE THEME
	public function prospect_check_for_update($transient) {
		if (empty($transient->checked)) { return $transient; }

		$theme_pc = prospect_get_option( '_theme_purchase_code' );
		if (empty($theme_pc)) {
			add_action( 'admin_notices', array($this, 'prospect_an_purchase_code') );
		}

		$result = wp_remote_get('http://up.cwsthemes.com/products-updater.php?pc=' . $theme_pc . '&tname=' . 'prospect');
		if (!is_wp_error( $result ) ) {
			if (200 == $result['response']['code'] && 0 != strlen($result['body']) ) {
				$resp = json_decode($result['body'], true);
				$h = isset( $resp['h'] ) ? (float) $resp['h'] : 0;
				$theme = wp_get_theme(get_template());
				if ( version_compare( $theme->get('Version'), $resp['new_version'], '<' ) ) {
					$transient->response['prospect'] = $resp;
				}
			}
			else{
				unset($transient->response['prospect']);
			}
		}
		return $transient;
	}


	public function prospect_an_purchase_code() {
		$prospect_theme = wp_get_theme();
		echo "<div class='update-nag'>" . esc_html( $prospect_theme->get( 'Name' ) ) . esc_html__( ' theme notice: Please insert your Item Purchase Code in Theme Options to get the latest theme updates!', 'prospect' ) .'</div>';
	}
// \UPDATE THEME	

	public function prospect_default_header_meta (){
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">		
		<?php
	}

	public function theme_options_customizer_init (){
		if ( is_customize_preview() ) {
			if ( isset( $_POST['wp_customize']) && isset( $_POST['customized']) && $_POST['wp_customize'] == "on" ) {
				if (strlen($_POST['customized']) > 10) {
					global $cwsfw_settings;
					$post_values = json_decode( stripslashes_deep( $_POST['customized'] ), true );
					if (isset($post_values['cwsfw_settings'])) {
						$cwsfw_settings = $post_values['cwsfw_settings'];						
					}
				}
			}
		}
	}

	public function set_content_width (){
		if ( ! isset( $content_width ) ) {
			$content_width = 600;
		}
	}

	public function prospect_wrap_widget_title ( $title, $instance = array(), $id_base = "" ){
		if ( $id_base == "rss" && isset( $instance['url'] ) && !empty( $instance['url'] ) ){
			return $title;
		}
		else{
			return !empty( $title ) ? "<span>$title</span>" : $title;
		}
	}
	
	public function prospect_enqueue_theme_stylesheet () {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
	}


	public function prospect_custom_styles_test(){
	}




	public function prospect_after_setup (){
		add_theme_support( 'widgets' );
	   	add_theme_support( 'title-tag' );
	   	add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
		add_theme_support( 'automatic-feed-links' );
		$bg_defaults = array(
			'default-color'				=> '#fafafa'
		);
		
		// Add Gutenberg Compatibility
		add_theme_support( 'align-wide' );
		
		add_theme_support( 'custom-background', $bg_defaults );
	   	register_nav_menus( array(
		    'primary' => 'Primary Menu',
		    'secondary' => 'Secondary Menu'
		));		
	}

	public function prospect_wp_title_filter ( $title_text, $sep ){
		$site_name = get_bloginfo( 'name' );
		$site_tagline = get_bloginfo( 'description' );
		if ( is_home() ){
			$title_text = $site_name . $sep . $site_tagline;
		}
		else{
			$title_text .= $site_name;
		}
		return $title_text;		
	}

	public function prospect_render_site_icon (){
		if ( !function_exists( 'wp_site_icon' ) ){
			$site_icon_id = get_option( 'site_icon' );
			if ( !empty( $site_icon_id ) ){
				echo "<link rel='icon' href='" . esc_url(wp_get_attachment_image_src( $site_icon_id, array( 32, 32 ) ) ). "' sizes='32x32' />";
				echo "<link rel='icon' href='" . esc_url(wp_get_attachment_image_src( $site_icon_id, array( 192, 192 ) ) ). "' sizes='192x192' />";
				echo "<link rel='apple-touch-icon-precomposed' href='" . esc_url(wp_get_attachment_image_src( $site_icon_id, array( 180, 180 ) ) ). "' />";
				echo "<link rel='msapplication-TileImage' href='" . esc_url(wp_get_attachment_image_src( $site_icon_id, array( 270, 270 ) ) ). "' />";
			}
		}
	}
	public function prospect_split_nav_menu ( $items ){
		if ( is_admin() ) return $items;
		$top_level_items = array();
		for ( $i = 0; $i < count( $items ); $i++ ){
			$item = &$items[$i];
			if ( $item->menu_item_parent == '0' ){
				array_push( $top_level_items, $item );
			}
		}
		$top_level_items_count = count( $top_level_items );
		for ( $i = ceil( $top_level_items_count / 2 ); $i < $top_level_items_count; $i++ ){
			array_push( $top_level_items[$i]->classes, 'right' );
		}
		return $items;
	}
	public function prospect_nav_menu_pointer ( $item_output, $item ){
		if ( in_array( 'menu-item-has-children', $item->classes ) ){
			$item_output .= "<span class='pointer'></span>";
		}
		return $item_output;
	}
	public function prospect_sandwich_menu_switcher ( $items, $args){
		if ( !in_array( $args->menu_id, array( 'main_menu', 'sticky_menu' ) ) ) return $items;
		$sandwich_menu = prospect_get_option( 'sandwich_menu' );		
		if ( $sandwich_menu && $args->theme_location == 'primary' && !empty( $items ) ){
			$items .= "<div class='sandwich_switcher' data-sandwich-action='show_hide_main_menu_items' >";
				$items .= "<a class='switcher'>";
					$items .= "<span class='ham'>";
					$items .= "</span>";
				$items .= "</a>";
			$items .= "</div>";
		}
		return $items;
	}
	public function prospect_sandwich_menu_class ( $args ){
		if ( !in_array( $args['menu_id'], array( 'main_menu', 'sticky_menu' ) ) ) return $args;
		$sandwich_menu = prospect_get_option( 'sandwich_menu' );
		if ( $sandwich_menu ){
			if ( isset( $args['menu_class'] ) ){
				if ( !empty( $args['menu_class'] ) ){
					$args['menu_class'] .= ' sandwich';
				}
				else{
					$args['menu_class'] = 'sandwich';				
				}
			}
			else{
				$args['menu_class'] = 'sandwich';
			}
		}
		return $args;
	}
	public function prospect_sandwich_menu_animation (){
		$sandwich_menu 		= prospect_get_option( 'sandwich_menu' );
		$logo_pos 			= prospect_get_option( 'logo_pos' );
		$menu_pos 			= prospect_get_option( 'menu_pos' );
		$invert_items_anim 	= $logo_pos == 'right';
		if ( $sandwich_menu ){
			$anim_dur = 250;
			$anim_del = 60;
			$top_level_items = 0;
			$menu_locations = get_nav_menu_locations();
			if ( isset( $menu_locations['primary'] ) ){
				$term_id = $menu_locations['primary'];
				$items = wp_get_nav_menu_items( $term_id );
				if ( is_array( $items ) ){
					for ( $i = 0; $i < count( $items ); $i++ ){
						$item = $items[$i];
						if ( $item->menu_item_parent == '0' ){
							$top_level_items ++;
						}
					}
				}
			}
			$styles = "";
			for ( $i = 1; $i <= $top_level_items; $i++ ){
				$styles .= "
					.main_menu.sandwich.sandwich_active > .menu-item:nth-" . ( $invert_items_anim ? "" : "last-" ) . "child(n+$i){
						-webkit-transition: opacity "  . $anim_dur . "ms ease " . $anim_del . "ms;
						transition: opacity "  . $anim_dur . "ms ease " . $anim_del . "ms;
					}
					.main_menu.sandwich > .menu-item:nth-" . ( $invert_items_anim ? "last-" : "" ) . "child(n+$i){
						-webkit-transition: opacity "  . $anim_dur . "ms ease " . $anim_del . "ms;
						transition: opacity "  . $anim_dur . "ms ease " . $anim_del . "ms;
					}
				";
				$anim_dur += 50;
				$anim_del += 30;
			}
			if ( !empty( $styles ) ) wp_add_inline_style( 'main', $styles );
		}
	}
	public function prospect_register_reset_styles (){
		wp_enqueue_style( 'reset', PROSPECT_THEME_URI . '/css/reset.css' );
	}
	public function prospect_register_theme_styles (){
		$is_rtl = is_rtl();
		$stylesheets = array(
			'font_awesome'	=> PROSPECT_THEME_URI . '/fonts/fa/font-awesome.min.css',
			'cwsicon'		=> PROSPECT_THEME_URI . '/fonts/cws-icons/flaticon.css',
			'select2'		=> PROSPECT_THEME_URI . '/css/select2.css',
			'animate'		=> PROSPECT_THEME_URI . '/css/animate.css',
			'layout'		=> PROSPECT_THEME_URI . '/css/layout.css',
			'fancybox'		=> PROSPECT_THEME_URI . '/css/jquery.fancybox.css',
			'odometer'		=> PROSPECT_THEME_URI . '/css/odometer-theme-default.css'
		);

		do_action( 'prospect_render_fonts_url_hook' );

		foreach ( $stylesheets as $alias => $src ){
			wp_enqueue_style( $alias, $src );
		}

		// Import FlatIcon library, the default one or custom
		$cwsfi = get_option('cwsfi');
		if (!empty($cwsfi) && isset($cwsfi['css'])) { 
			wp_enqueue_style( 'flaticon', $cwsfi['css'] );
		}else{
			wp_enqueue_style( 'flaticon', PROSPECT_THEME_URI . '/fonts/fi/flaticon.css' );
		};
		// end of icons import

		$rtl_stylesheets = array(
			'layout-rtl'		=> PROSPECT_THEME_URI . '/css/layout-rtl.css',
		);
		if ( $is_rtl ){
			foreach ( $rtl_stylesheets as $alias => $src ){
				wp_enqueue_style( $alias, $src );
			}
		}
	}
	public function prospect_enqueue_main_theme_stylesheet (){
		$deps = array(
			'mediaelement',
			'wp-mediaelement',
			'select2',
			'animate',
			'layout',
			'fancybox',
			'odometer'
		);
		wp_enqueue_style( 'main', PROSPECT_THEME_URI . '/css/main.css', $deps );
		wp_add_inline_style( 'main', $this->body_font_styles () );
		wp_add_inline_style( 'main', $this->menu_font_styles () );
		wp_add_inline_style( 'main', $this->header_font_styles () );
		wp_add_inline_style( 'main', $this->custom_colors_styles () );
		wp_add_inline_style( 'main', $this->header_styles () );
		wp_add_inline_style( 'main', $this->footer_widgets_styles () );
		wp_add_inline_style( 'main', $this->footer_copyrights_styles () );
		wp_add_inline_style( 'main', $this->front_dynamic_styles () );	
	}
	public function prospect_load_youtube_api (){
	?>
		<script type="text/javascript">
			// Loads the IFrame Player API code asynchronously.
			var tag = document.createElement("script");
			tag.src = "https://www.youtube.com/player_api";
			var firstScriptTag = document.getElementsByTagName("script")[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		</script>
	<?php
	}
	public function prospect_register_scripts (){
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		$common_scripts = array(
			'retina'				=> PROSPECT_THEME_URI . '/js/retina_1.3.0.js',
			'select2'				=> PROSPECT_THEME_URI . '/js/select2.min.js',
			'cws_helpers'			=> PROSPECT_THEME_URI . '/js/cws_helpers.js',
			'cws_toggle'			=> PROSPECT_THEME_URI . '/js/cws_toggle.js',
			'cws_mobile_menu'		=> PROSPECT_THEME_URI . '/js/cws_mobile_menu.js',
			'cws_loader'			=> PROSPECT_THEME_URI . '/js/cws_loader.js',
			'fixed_sidebars'		=> PROSPECT_THEME_URI . '/js/sticky_sidebar.js'
		);
		$specific_scripts = array(
			'greensock_tween_lite'	=> PROSPECT_THEME_URI . '/js/TweenLite.min.js',
			'greensock_css_plugin'	=> PROSPECT_THEME_URI . '/js/CSSPlugin.min.js',
			'greensock_easing'		=> PROSPECT_THEME_URI . '/js/EasePack.min.js',	
			'vimeo_api'				=> PROSPECT_THEME_URI . '/js/jquery.vimeo.api.min.js',
			'cws_self_vimeo'		=> PROSPECT_THEME_URI . '/js/cws_self_vimeo_bg.js',
			'cws_YT_bg'				=> PROSPECT_THEME_URI . '/js/cws_YT_bg.js',
			'lavalamp'				=> PROSPECT_THEME_URI . '/js/jquery.lavalamp.min.js',
			'owl_carousel'			=> PROSPECT_THEME_URI . '/js/owl.carousel.js',
			'isotope'				=> PROSPECT_THEME_URI . '/js/isotope.pkgd.min.js',
			'fancybox'				=> PROSPECT_THEME_URI . '/js/jquery.fancybox.pack.js',
			'images_loaded'			=> PROSPECT_THEME_URI . '/js/imagesloaded.pkgd.min.js',
			'odometer'				=> PROSPECT_THEME_URI . '/js/odometer.js'
		);
		foreach ( $common_scripts as $handle => $src ) {
			wp_enqueue_script( $handle, $src, array( 'jquery' ), '', true );
		}
		foreach ( $specific_scripts as $handle => $src ) {
			wp_register_script( $handle, $src, array( 'jquery' ), '', true );
		}
		$main_deps = array(
			'jquery',
			'greensock_tween_lite',
			'greensock_css_plugin',
			'greensock_easing',
			'vimeo_api',
			'cws_self_vimeo',
			'cws_YT_bg',
			'lavalamp',
			'owl_carousel',
			'isotope',
			'fancybox',
			'images_loaded'
		);
		wp_enqueue_script( 'main', PROSPECT_THEME_URI . '/js/main.js', $main_deps, '', true );
		wp_enqueue_script( 'cws_loader', PROSPECT_THEME_URI . "/js/cws_loader.js", array( "jquery", "tweenmax" ), "1.0", false );
		// wp_enqueue_script( 'fixed_sidebars', PROSPECT_THEME_URI . "/js/sticky_sidebar.js", array( "main" ), "1.0", false );
	}
	public function prospect_define_ajaxurl (){
		wp_localize_script( 'main', 'ajaxurl', esc_url( admin_url( 'admin-ajax.php' ) ) );
	}
	public function prospect_register_admin_scripts (){
		$scripts = array(
			'custom-admin'	=> PROSPECT_THEME_URI . '/includes/core/assets/js/custom-admin.js'
		);
		foreach ( $scripts as $alias => $src ){
			wp_enqueue_script( $alias, $src );
		}
	}
	public function prospect_register_admin_styles (){

		// Import FlatIcon library, the default one or custom
		$cwsfi = get_option('cwsfi');
		$cws_flaticon_css = '';
		if (!empty($cwsfi) && isset($cwsfi['css'])) { 
			$cws_flaticon_css = $cwsfi['css'];
		}else{
			$cws_flaticon_css =  PROSPECT_THEME_URI . '/fonts/fi/flaticon.css';
		};
		// end of icons import

		$stylesheets = array(
			'font_awesome'	=> PROSPECT_THEME_URI . '/fonts/fa/font-awesome.min.css',
			'flaticon'		=> $cws_flaticon_css
		);
		foreach ( $stylesheets as $alias => $src ){
			wp_enqueue_style( $alias, $src );
		}
		wp_enqueue_style( 'mb-post-styles', PROSPECT_THEME_URI . '/includes/core/assets/css/mb-post-styles.css' );		
		wp_add_inline_style( 'mb-post-styles', $this->back_dynamic_styles () );
	}
	public function prospect_localize_data (){
		$data = array(
			'admin_bar' 			=> is_admin_bar_showing(),
			'rtl' 					=> is_rtl(),
			'menu_stick' 			=> (bool)prospect_get_option( 'menu_stick' ),
			'sandwich_menu' 		=> (bool)prospect_get_option( 'sandwich_menu' ),
		);

		$header_page_meta_vars 	= prospect_get_page_meta_var( array( 'header' ) );
		$page_override_header 	= !empty( $header_page_meta_vars );
		$header_covers_slider 	= false;
		if ( $page_override_header ){
			$header_covers_slider 	= isset( $header_page_meta_vars['header_covers_slider'] ) ? (bool)$header_page_meta_vars['header_covers_slider'] : $header_covers_slider;
		}
		else{
			$header_covers_slider 	= (bool)prospect_get_option( 'header_covers_slider' );
		}
		$data['header_covers_slider'] = $header_covers_slider;

		wp_localize_script( 'main', 'theme_opts', $data );
	}

	public function body_font_styles (){
		ob_start ();
		do_action( 'prospect_body_font_hook' );
		return ob_get_clean ();
	}
	public function menu_font_styles (){
		ob_start ();
		do_action( 'prospect_menu_font_hook' );
		return ob_get_clean ();
	}
	public function header_font_styles (){
		ob_start ();
		do_action( 'prospect_header_font_hook' );
		return ob_get_clean ();
	}
	public function custom_colors_styles (){
		ob_start ();
		do_action( 'prospect_custom_colors_hook' );
		return ob_get_clean ();
	}
	public function header_styles (){
		ob_start ();
		do_action( 'prospect_header_styles_hook' );
		return ob_get_clean ();		
	}
	public function footer_widgets_styles (){
		ob_start ();
		do_action( 'prospect_footer_widgets_styles_hook' );
		return ob_get_clean ();		
	}
	public function footer_copyrights_styles (){
		ob_start ();
		do_action( 'prospect_footer_copyrights_styles_hook' );
		return ob_get_clean ();		
	}
	public function front_dynamic_styles (){
		ob_start ();
		do_action( 'prospect_front_dynamic_styles_hook' );
		return ob_get_clean ();				
	}
	public function back_dynamic_styles (){
		ob_start ();
		do_action( 'prospect_back_dynamic_styles_hook' );
		return ob_get_clean ();				
	}
	public function prospect_page_meta_vars() {
		if ( is_page() ) {
			$pid = get_query_var( 'page_id' );
			$pid = ! empty( $pid ) ? $pid : get_queried_object_id();
			$post = get_post( $pid );
			$stored_meta = get_post_meta( $pid, PROSPECT_MB_PAGE_LAYOUT_KEY );
			$stored_meta = isset( $stored_meta[0] ) ? $stored_meta[0] : array();

			//Default value
			$GLOBALS['prospect_page_meta'] = array();
			$GLOBALS['prospect_page_meta']['header'] = array();

			if ( isset( $stored_meta['header_override'] ) && $stored_meta['header_override'] !== '0' ){
				if (!isset($stored_meta['menu_bg_color'])) {
					$stored_meta['menu_bg_color'] = '#fff';
				}
				if (!isset($stored_meta['menu_font_color'])) {
					$stored_meta['menu_font_color'] = '#1c3545';
				}
				$GLOBALS['prospect_page_meta']['header']['menu_opacity']			= $stored_meta['menu_opacity'];
				$GLOBALS['prospect_page_meta']['header']['header_covers_slider'] 	= $stored_meta['header_covers_slider'];
				$GLOBALS['prospect_page_meta']['header']['menu_bg_color'] 			= $stored_meta['menu_bg_color'];
				$GLOBALS['prospect_page_meta']['header']['menu_font_color'] 		= $stored_meta['menu_font_color'];
				$GLOBALS['prospect_page_meta']['header']['header_logo_light']	 	= $stored_meta['header_logo_light'];
				$GLOBALS['prospect_page_meta']['header']['default_header_image'] 	= $stored_meta[ 'default_header_image' ];
			}
			else{
				$GLOBALS['prospect_page_meta']['header']['menu_opacity'] 			= prospect_get_option( 'menu_opacity' );
				$GLOBALS['prospect_page_meta']['header']['header_covers_slider'] 	= prospect_get_option( 'header_covers_slider' );
				$GLOBALS['prospect_page_meta']['header']['menu_bg_color'] 			= prospect_get_option( 'menu_bg_color' );
				$GLOBALS['prospect_page_meta']['header']['menu_font_color'] 		= prospect_get_option( 'menu_font_color' );
				$GLOBALS['prospect_page_meta']['header']['header_logo_light'] 		= prospect_get_option( 'header_logo_light' );
				$GLOBALS['prospect_page_meta']['header']['default_header_image'] 	= prospect_get_option( 'default_header_image' );
			}
			$GLOBALS['prospect_page_meta']['sb'] = prospect_get_sidebars( $pid );
			$GLOBALS['prospect_page_meta']['footer'] = array( 'footer_sb_top' => '', 'footer_sb_bottom' => '' );
			if ( isset( $stored_meta['sb_foot_override'] ) && $stored_meta['sb_foot_override'] !== '0' ) {
				$GLOBALS['prospect_page_meta']['footer']['footer_sb_top'] = isset( $stored_meta['footer-sidebar-top'] ) ? $stored_meta['footer-sidebar-top'] : '';
			} else {
				$GLOBALS['prospect_page_meta']['footer']['footer_sb_top'] = prospect_get_option( 'footer_sb' );
			}
			$GLOBALS['prospect_page_meta']['slider'] = array( 'slider_override' => '', 'slider_shortcode' => '' );
			$GLOBALS['prospect_page_meta']['slider']['slider_override'] = isset( $stored_meta['sb_slider_override'] ) && $stored_meta['sb_slider_override'] !== '0' ? $stored_meta['sb_slider_override'] : false;
			$GLOBALS['prospect_page_meta']['slider']['slider_shortcode'] = isset( $stored_meta['slider_shortcode'] ) ? $stored_meta['slider_shortcode'] : '';
			return true;
		} else {
			return false;
		}
	}

	public function prospect_js_vars_init() {
		$sticky_sidebars = prospect_get_option('sticky_sidebars');
		if (!empty($sticky_sidebars)) {
			?>
			<script type="text/javascript">
				var sticky_sidebars = <?php echo esc_js($sticky_sidebars); ?>;
			</script>
			<?php
		}
	}

}
$prospect_theme_features = new Prospect_Theme_Features;

function prospect_check_for_plugin ( $plugin ){   /* $plugin - folder/file  */
    return (( in_array( $plugin, apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) || (is_plugin_active_for_network( $plugin ) ));
}

/*****
* WPML
*****/

function prospect_wpml_ext_init (){
	define('CWS_WPML_ACTIVE', true);
/*	add_filter( 'wp_nav_menu_items', 'prospect_wpml_ext_nav_menu_items_filter', 11, 2 );
	$GLOBALS['wpml_settings'] = get_option('icl_sitepress_settings');
	add_filter( "body_class", "prospect_wpml_ext_bodyClass_filter" );
	global $icl_language_switcher;*/
}
function prospect_is_wpml_active() {
	return defined('CWS_WPML_ACTIVE') && CWS_WPML_ACTIVE;
}
function prospect_show_flags_in_footer () {
	return isset( $GLOBALS['wpml_settings']['icl_lang_sel_footer'] ) ? $GLOBALS['wpml_settings']['icl_lang_sel_footer'] : false;
}
function prospect_wpml_ext_nav_menu_items_filter ( $items, $args ){
	$items = preg_replace( "#\"((\w|\s|-)*menu-item-language(\w|\s|-)*)\"#", "\"$1 right\"", $items );
	return $items;
}
/* ! WPML Issue ! */
function prospect_wpml_ext_bodyClass_filter ( $classes ){
	$wpml_prefix = "cws_wpml_icl_ls_";
	$opt_name = "";
	$display_flag = get_option( "icl_lso_flags" );
	$display_native_lang = get_option( "icl_lso_native_lang" );
	$display_display_lang = get_option( "icl_lso_display_lang" );
	if ( $display_flag && !$display_native_lang && !$display_display_lang ){
		$opt_name = "only_flag";
	}
	else if ( $display_native_lang && $display_display_lang ){
		$opt_name = "extended_width";
	}
	if ( !empty( $opt_name ) ){
		$classes[] = $wpml_prefix . $opt_name;
	}
	return $classes;
}
/******
* \WPML
******/

if ( !function_exists( "prospect_site_header_html" ) ){
	function prospect_site_header_html (){
		ob_start();
		$header_class = $sticky_header_class = $mobile_header_class = "site_header";

		$mobile_header_class .= " sandwich";
		$logo_init = prospect_get_option( 'logo' );
		$light_logo = prospect_get_option( 'light_logo' );
		$logo_dims = prospect_get_option( 'logo_dims' );
		$menu_fw = prospect_get_option( 'menu_fw' );
		$menu_fw = (bool)$menu_fw;

		$show_woo_minicart = prospect_check_for_plugin( 'woocommerce/woocommerce.php' ) && prospect_get_option( 'woo_cart_enable' );
		$header_page_meta_vars 	= prospect_get_page_meta_var( array( 'header' ) );
		$header_override 	= !empty( $header_page_meta_vars );
		
		if ( $header_override ){
			if ( $header_page_meta_vars['header_logo_light'] == 'black' ) {
				$logo = $logo_init;
			} else if ( $header_page_meta_vars['header_logo_light'] == 'white' ) {
				$logo = $light_logo;
			} else if ( $header_page_meta_vars['header_logo_light'] == 'none' ) {
				
			} 
		}
		else{
			$logo = $logo_init;
		}

		$logo_id = isset( $logo['id'] ) ? $logo['id'] : "";
		$logo_hdpi = isset( $logo['is_high_dpi'] ) ? (bool)$logo['is_high_dpi'] : false;
		$logo_obj = !empty( $logo_id ) ? wp_get_attachment_image_src( $logo_id, 'full' ) : array();
		$logo_bfi_args = array();
		if ( is_array( $logo_dims ) ){
			foreach ( $logo_dims as $key => $value ) {
				if ( !empty($value) ){
					$logo_bfi_args[$key] = $value;
				}
			}
		}

		$logo_srcs = prospect_get_img_srcs( $logo_obj, $logo_hdpi, $logo_bfi_args );
		$logo_exists 				= isset( $logo_srcs['src'] ) && !empty( $logo_srcs['src'] );
		$logo_src 					= $logo_exists ? $logo_srcs['src'] : '';
		$logo_retina_thumb_exists 	= $logo_exists ? $logo_srcs['retina_thumb_exists'] : false;
		$logo_retina_thumb_url 		= $logo_exists ? $logo_srcs['retina_thumb_url'] : '';
		/* sticky logo */
		$sticky_logo = prospect_get_option( 'sticky_logo' );
		$sticky_logo_id = isset( $sticky_logo['id'] ) ? $sticky_logo['id'] : "";
		$sticky_logo_hdpi = isset( $sticky_logo['is_high_dpi'] ) ? (bool)$sticky_logo['is_high_dpi'] : false;
		$sticky_logo_obj = !empty( $sticky_logo_id ) ? wp_get_attachment_image_src( $sticky_logo_id, 'full' ) : array();
		$sticky_logo_exists = !empty( $sticky_logo_obj );	
		$sticky_logo_src 					= "";
		$sticky_logo_retina_thumb_exists 	= false;
		$sticky_logo_thumb_url 				= "";
		if ( $sticky_logo_exists ){
			$sticky_logo_url = $sticky_logo_obj[0];
			if ( $sticky_logo_hdpi ){
				$sticky_logo_bfi_obj = cws_thumb( $sticky_logo_url, array( 'width' => floor( $sticky_logo_obj[1] / 2 ) ), false );
				$sticky_logo_src = $sticky_logo_bfi_obj[0];
				$sticky_logo_retina_thumb_exists = $sticky_logo_bfi_obj[3]["retina_thumb_exists"];
				$sticky_logo_retina_thumb_url = $sticky_logo_bfi_obj[3]["retina_thumb_url"];
			}
			else{
				$sticky_logo_src = $sticky_logo_url;
			}
		}
		else{
			$sticky_logo_exists 				= $logo_exists;
			$sticky_logo_src 					= $logo_src;
			$sticky_logo_retina_thumb_exists 	= $logo_retina_thumb_exists;
			$sticky_logo_retina_thumb_url 		= $logo_retina_thumb_url;
		}		
		/* \sticky logo */
		/* mobile logo */
		$mobile_logo = prospect_get_option( 'mobile_logo' );
		$mobile_logo_id = isset( $mobile_logo['id'] ) ? $mobile_logo['id'] : "";
		$mobile_logo_hdpi = isset( $mobile_logo['is_high_dpi'] ) ? (bool)$mobile_logo['is_high_dpi'] : false;
		$mobile_logo_obj = !empty( $mobile_logo_id ) ? wp_get_attachment_image_src( $mobile_logo_id, 'full' ) : array();
		$mobile_logo_exists = !empty( $mobile_logo_obj );	
		$mobile_logo_src 					= "";
		$mobile_logo_retina_thumb_exists 	= false;
		$mobile_logo_retina_thumb_url 		= "";
		if ( $mobile_logo_exists ){
			$mobile_logo_url = $mobile_logo_obj[0];
			if ( $mobile_logo_hdpi ){
				$mobile_logo_bfi_obj = cws_thumb( $mobile_logo_url, array( 'width' => floor( $mobile_logo_obj[1] / 2 ) ), false );
				$mobile_logo_src = $mobile_logo_bfi_obj[0];
				$mobile_logo_retina_thumb_exists = $mobile_logo_bfi_obj[3]["retina_thumb_exists"];
				$mobile_logo_retina_thumb_url = $mobile_logo_bfi_obj[3]["retina_thumb_url"];
			}
			else{
				$mobile_logo_src = $mobile_logo_url;
			}
		}
		else{
			$mobile_logo_exists 				= $logo_exists;
			$mobile_logo_src 					= $logo_src;
			$mobile_logo_retina_thumb_exists 	= $logo_retina_thumb_exists;
			$mobile_logo_retina_thumb_url 		= $logo_retina_thumb_url;		
		}
		/* \mobile logo */
		$logo_pos = prospect_get_option( 'logo_pos' );
		$header_class .= $logo_exists && !empty( $logo_pos ) ? " logo_$logo_pos" : "";
		$sticky_header_class .= $logo_exists && !empty( $logo_pos ) ? " logo_$logo_pos" : "";
		$logo_margins = prospect_get_option( 'logo_margins' );
		$logo_styles = "";
		if ( is_array( $logo_margins ) ){
			foreach ( $logo_margins as $side => $value ) {
				$logo_styles .= "padding-$side: $value;";
			}
		}
		$sticky_logo_styles = "";
		if ( is_array( $logo_margins ) ){
			$sticky_logo_styles .= !empty( $logo_margins['left'] ) ? "padding-left:" . $logo_margins['left'] . ";" : "";
			$sticky_logo_styles .= !empty( $logo_margins['right'] ) ? "padding-right:" . $logo_margins['right'] . ";" : "";
		}
		
		$logo_pos_check = esc_attr( prospect_get_option( 'logo_pos' ) );
		$logo_pos = !empty ( $logo_pos_check ) ? $logo_pos_check : 'left';

		$menu_pos_check = esc_attr( prospect_get_option( 'menu_pos' ) );
		$menu_pos = !empty ( $logo_pos_check ) ? $logo_pos_check : 'right';
		if ( $logo_pos == 'right' ){
			$menu_display_pos = 'left';
		}
		else if ( $logo_pos == 'left' ){
			$menu_display_pos = 'right';
		}
		else{
			$menu_display_pos = $menu_pos;
		}
		$menu_args = array(
			'menu_id' => 'main_menu',
			'menu_class' => 'main_menu' . ( !empty( $menu_display_pos ) ? " a_{$menu_display_pos}_flex" : "" ),
			'container' => false,
			'echo' => false,
			'theme_location' => 'primary'
		);
		$sticky_menu_args = array(
			'menu_id' => 'sticky_menu',
			'menu_class' => 'main_menu' . ( !empty( $menu_display_pos ) ? " a_{$menu_display_pos}_flex" : "" ),
			'container' => false,
			'echo' => false,
			'theme_location' => 'primary'
		);
		$mobile_menu_args = array(
			'menu_id'	=> 'mobile_menu',
			'menu_class'=> 'main_menu',
			'container'	=> false,
			'echo' => false,
			'theme_location' => 'primary'
		);
		$menu_exists = has_nav_menu( 'primary' );
		$menu = $menu_exists ? wp_nav_menu( $menu_args ) : "";
		$menu_stick = prospect_get_option( 'menu_stick' );
		$sticky_menu = ($menu_stick !== 'none') && $menu_exists ? wp_nav_menu( $sticky_menu_args ) : "";
		$mobile_menu = $menu_exists ? wp_nav_menu( $mobile_menu_args ) : "";
		$logo = "";
		$sticky_logo = "";
		$mobile_logo = "";
		if ( !$logo_exists ) {
			$logo .= "<div class='header_logo'" . ( !empty( $logo_styles ) ? " style='$logo_styles'" : "" ) . " role='banner'>";
				$logo .= "<a href='" . esc_url( get_site_url() ) . "'>";
					$logo .= "<h1>" . get_bloginfo( 'name' ) . "</h1>";
				$logo .= "</a>";
			$logo .= "</div>";
		}
		if ( $logo_exists ){
			$logo .= "<div class='header_logo'" . ( !empty( $logo_styles ) ? " style='$logo_styles'" : "" ) . " role='banner'>";
				$logo .= "<a href='" . esc_url( get_site_url() ) . "'>";
					$logo .= "<img src='$logo_src' class='header_logo_img'" . ( $logo_retina_thumb_exists ? " data-at2x='$logo_retina_thumb_url'" : " data-no-retina" ) . " alt />";
				$logo .= "</a>";
			$logo .= "</div>";
		}
		if ( $sticky_logo_exists ){
			$sticky_logo .= "<div class='header_logo'" . ( !empty( $sticky_logo_styles ) ? " style='$sticky_logo_styles'" : "" ) . " role='banner'>";
				$sticky_logo .= "<a href='" . esc_url( get_site_url() ) . "'>";					
					$sticky_logo .= "<img src='$sticky_logo_src' class='header_logo_img'" . ( $sticky_logo_retina_thumb_exists ? " data-at2x='$sticky_logo_retina_thumb_url'" : " data-no-retina" ) . " alt />";
				$sticky_logo .= "</a>";				
			$sticky_logo .= "</div>";
		}
		if ( $mobile_logo_exists ){
			$mobile_logo .= "<div class='header_logo' role='banner'>";
				$mobile_logo .= "<a href='" . esc_url( get_site_url() ) . "'>";
					$mobile_logo .= "<img src='".esc_url($mobile_logo_src)."' class='header_logo_img'" . ( $mobile_logo_retina_thumb_exists ? " data-at2x='".esc_url($mobile_logo_retina_thumb_url)."'" : " data-no-retina" ) . " alt />";
				$mobile_logo .= "</a>";				
			$mobile_logo .= "</div>";
		}	
		$mini_cart = '';
		if ( $show_woo_minicart ) {
			ob_start();
			ob_start();
			woocommerce_mini_cart();
			$minicart = ob_get_clean();
			$cart_url = esc_url( wc_get_cart_url() );
			$cart_content = (WC()->cart->cart_contents_count > 0) ? esc_html( WC()->cart->cart_contents_count ) : "";
			echo "<div id='woo_minicart_bar_item' class='bar_item'>";
				echo "<div id=\"top_panel_woo_minicart\" class=\"bar_item_content widget woocommerce\">" . $minicart;
				echo "</div>";
				echo "<a id='top_panel_woo_minicart_el' class='woo_icon bar_element fa fa-shopping-cart' href='$cart_url' title='" . esc_html__( "View your shopping cart", "prospect" ) . "'><span class='woo_mini_count'>$cart_content</span></a>";
			echo "</div>";
			$mini_cart = ob_get_clean();
		}

		$menu_search = '';
		$menu_search = "<div class='menu_search_button'></div>";
		$menu_boxed = $menu_fw ? ' menu_boxed' : '';
		if ( !empty( $logo ) || !empty( $menu ) ){
			echo "<header id='site_header'" . ( !empty( $header_class ) ? " class='" . esc_attr( trim( $header_class ) . $menu_boxed ) . "'" : "" ) . ">";
				if ( !empty( $logo ) ){
					if ( $logo_pos == 'center' ){
						echo "<div class='prospect_layout_container'>" . $logo;
						echo "</div>";
						echo "<div class='prospect_layout_container'>";
							echo "<div class='menu_wrapper " . ( !empty( $menu_pos_check ) ? " a_{$menu_pos_check}_flex" : "" ) . "'>" . $menu . $mini_cart . $menu_search;
							echo "</div>";
						echo "</div>";
					}
					else{
						echo "<div class='prospect_layout_container'>";
							if ( $logo_pos == 'right' ){
								echo "<div class='menu_wrapper'>" . $menu . $mini_cart . $menu_search . "</div>" . $logo;
							}
							else{
								echo sprintf("%s", $logo);
								echo "<div class='menu_wrapper'>" . $menu . $mini_cart . $menu_search . "</div>";
							}
						echo "</div>";
					}
				}
				else{
					echo "<div class='prospect_layout_container'>";
						echo "<div class='menu_wrapper'>" . $menu . $mini_cart . $menu_search . "</div>";
					echo "</div>";						
				}
				echo "<div class='menu_search_wrap'>";
					echo "<div class='container'>";
						echo "<div class='search_back_button'></div>";
						echo get_search_form();
					echo "</div>";
				echo "</div>";
			echo "</header>";
		}
		if ( ($menu_stick !== 'none') && !empty( $sticky_menu ) ){
			echo "<section id='sticky'" . ( !empty( $sticky_header_class ) ? " class='".esc_attr($sticky_header_class . " " . $menu_boxed )." " . $menu_stick ."'" : "" ) . ">";
				echo "<div id='sticky_box'>";
					echo "<div class='prospect_layout_container'>";
					if ( !empty( $sticky_logo ) ){
						if ( $logo_pos == 'center' ){
							echo sprintf("%s", $sticky_menu);
						}
						else if ( $logo_pos == 'right' ){
							echo sprintf("%s", $sticky_menu);
							echo sprintf("%s", $sticky_logo);
						}
						else{
							echo sprintf("%s", $sticky_logo);
							echo sprintf("%s", $sticky_menu);
						}
					}
					else{
						echo sprintf("%s", $sticky_menu);
					}
					echo "</div>";
				echo "</div>";
			echo "</section>";
		}
		if ( !empty( $logo ) || !empty( $mobile_menu ) ){
			$mobile_sandwich = "";
			$mobile_sandwich .= "<div class='sandwich_switcher' data-sandwich-action='toggle_mobile_menu' >";
				$mobile_sandwich .= "<a class='switcher'>";
					$mobile_sandwich .= "<span class='ham'>";
					$mobile_sandwich .= "</span>";
				$mobile_sandwich .= "</a>";
			$mobile_sandwich .= "</div>";
			echo "<section id='mobile_header'" . ( !empty( $mobile_header_class ) ? " class='".esc_attr($mobile_header_class)."'" : "" ) . ">";
					echo "<div class='prospect_layout_container" . ( empty( $mobile_logo ) && !empty( $mobile_menu ) ? " a_right_flex" : "" ) . "'>";
					if ( !empty( $mobile_logo ) ){
						echo sprintf("%s", $mobile_logo);
						echo !empty( $mobile_menu ) ? $mobile_sandwich : "";
					}
					else{
						echo !empty( $mobile_menu ) ? $mobile_sandwich : "";
					}
					echo "</div>";
					if ( !empty( $mobile_menu ) ){
						echo "<div id='mobile_menu_wrapper'>";
							echo "<div class='prospect_layout_container'>" . $mobile_menu;
							echo "</div>";
						echo "</div>";	
					}				
			echo "</section>";
		}
		$site_header_html = ob_get_clean();
		return $site_header_html;
	}
}
function prospect_header (){
	$header = "";

	$header_page_meta_vars 	= prospect_get_page_meta_var( array( 'header' ) );
	$page_override_header 	= !empty( $header_page_meta_vars );
	$customize_menu 		= (bool)prospect_get_option( 'customize_menu' );
	$menu_opacity 			= '100';
	$header_covers_slider 	= '';
	if ( $page_override_header ){
		$header_covers_slider 	= isset( $header_page_meta_vars['header_covers_slider'] ) ? (bool)$header_page_meta_vars['header_covers_slider'] : $header_covers_slider;
		$menu_opacity 			= isset( $header_page_meta_vars['menu_opacity'] ) ? $header_page_meta_vars['menu_opacity'] : $menu_opacity;	
	}
	else{
		$menu_opacity 			= prospect_get_option( 'menu_opacity' );
	}
	$menu_opacity = (int)$menu_opacity;
	ob_start();
	get_template_part( "top_panel" );
	$top_panel = ob_get_clean();
	
	$site_header_html = prospect_site_header_html();

	$slider = "";
	ob_start();
	get_template_part( 'slider' );
	$slider_section_content = ob_get_clean();
	if ( !empty( $slider_section_content ) ){
		$slider .= "<section id='main_slider_section'>";
			$slider .= $slider_section_content;
		$slider .= "</section>";
	}

	ob_start();
	get_template_part( "page_title" );
	$page_title = ob_get_clean();
	$header .= $header_covers_slider && empty( $slider ) ? "<div id='header_wrapper'>" : "";
		$header .= prospect_page_loader();
		$header .= $top_panel;
		$header .= $site_header_html;
		if ( empty( $slider ) ){
			$header .= $page_title;
		}
		else{
			$header .= $slider;
		}
	$header .= $header_covers_slider && empty( $slider ) ? "</div>" : "";

	echo sprintf("%s", $header);	
}

function prospect_get_img_srcs ( $img_data = array(), $hdpi = false, $bfi_args = array() ){
	if ( empty( $img_data ) ) return false;
	$url = $img_data[0];	
	$srcs = array(
		'src' 					=> '',
		'retina_thumb_exists'	=> false,
		'retina_thumb_url'		=> '' 
	);
	if ( empty( $bfi_args ) ){
		if ( $hdpi ){
			$bfi_obj = cws_thumb( $url, array( 'width' => floor( $img_data[1] / 2 ) ), false );
			$srcs['src'] = $bfi_obj[0];
			$srcs['retina_thumb_exists'] = $bfi_obj[3]["retina_thumb_exists"];
			$srcs['retina_thumb_url'] = $bfi_obj[3]["retina_thumb_url"];
		}
		else{
			$srcs['src'] = $url;
		}
	}
	else{
		$bfi_obj = cws_thumb( $url, $bfi_args, false );
		$srcs['src'] = $bfi_obj[0];
		$srcs['retina_thumb_exists'] = $bfi_obj[3]["retina_thumb_exists"];
		$srcs['retina_thumb_url'] = $bfi_obj[3]["retina_thumb_url"];
	}
	return $srcs;
}

function prospect_scroll_to_top (){
	ob_start();
	?>
	<div id='scroll_to_top' class='animated'>
		<i class='fa fa-angle-up'></i>
	</div>
	<?php
	return ob_get_clean();
}

function prospect_custom_search ( $form ) {    
	$form = "
		<form method='get' class='searchform' action=' ".site_url()." ' >
			<div class='search_wrapper'>
			<label><span class='screen-reader-text'>Search for:</span></label>
			<input type='text' placeholder='".esc_html__( 'Search...', 'prospect' )."' class='search-field' value='". esc_attr(apply_filters('the_search_query', get_search_query())) ."' name='s'/>
			<input type='submit' class='search-submit' value='".esc_html__( 'Search', 'prospect' )."' />
			</div>
		</form>";

	return $form;
}
add_filter('get_search_form','prospect_custom_search');

function prospect_get_post_term_links_str ( $tax = "", $delim = "&#x2c;&#x20;" ){
	$pid = get_the_id();
	$terms_arr = wp_get_post_terms( $pid, $tax );
	$terms = "";
	if ( is_wp_error( $terms_arr ) ){
		return $terms;
	}
	for( $i = 0; $i < count( $terms_arr ); $i++ ){
		$term_obj	= $terms_arr[$i];
		$term_slug	= $term_obj->slug;
		$term_name	= esc_html( $term_obj->name );
		$term_link	= esc_url( get_term_link( $term_slug, $tax ) );
		$terms		.= "<a href='$term_link'>$term_name</a>" . ( $i < ( count( $terms_arr ) - 1 ) ? $delim : "" ); 	
	}
	return $terms;	
}

function prospect_dbl_to_sngl_quotes ( $content ){
	return preg_replace( "|\"|", "'", $content );
}
add_filter( "prospect_dbl_to_sngl_quotes", "prospect_dbl_to_sngl_quotes" );

function prospect_Hex2RGBA( $hex, $opacity = '1' ) {
	$hex = str_replace('#', '', $hex);
	$color = '';

	if(strlen($hex) == 3) {
		$color = hexdec(substr($hex, 0, 1 )) . ',';
		$color .= hexdec(substr($hex, 1, 1 )) . ',';
		$color .= hexdec(substr($hex, 2, 1 )) . ',';
	}
	else if(strlen($hex) == 6) {
		$color = hexdec(substr($hex, 0, 2 )) . ',';
		$color .= hexdec(substr($hex, 2, 2 )) . ',';
		$color .= hexdec(substr($hex, 4, 2 )) . ',';
	}
	$color .= $opacity;
	return $color;
}

function prospect_get_option($name) {
	$ret = null;
	if (is_customize_preview()) {
		global $cwsfw_settings;
		if (isset($cwsfw_settings[$name])) {
			$ret = $cwsfw_settings[$name];
			if (is_array($ret)) {
				$theme_options = get_option( 'prospect' );
				if (isset($theme_options[$name])) {
					$to = $theme_options[$name];
					foreach ($ret as $key => $value) {
						$to[$key] = $value;
					}
					$ret = $to;
				}
			}
			return $ret;
		}
	}
	$theme_options = get_option( 'prospect' );
	$ret = isset($theme_options[$name]) ? $theme_options[$name] : null;
	$ret = stripslashes_deep( $ret );
	return $ret;
}

function prospect_get_all_fa_icons (){
	$meta = get_option('cws_fa');
	if (empty($meta) || (time() - $meta['t']) > 3600*7 ) {
		global $wp_filesystem;
		if( empty( $wp_filesystem ) ) {
			require_once( ABSPATH .'/wp-admin/includes/file.php' );
			WP_Filesystem();
		}
		$file = get_template_directory() . '/css/font-awesome.min.css';
		$fa_content = '';
		if ( $wp_filesystem && $wp_filesystem->exists($file) ) {
			$fa_content = $wp_filesystem->get_contents($file);
			if ( preg_match_all( "/fa-((\w+|-?)+):before/", $fa_content, $matches, PREG_PATTERN_ORDER ) ) {
				return $matches[1];
			}
		}
	} else {
		return $meta['fa'];
	}		
}

function prospect_render_social_links (){
	$out = "";
	$social_group = prospect_get_option( "social_group" );
	for ( $i = 0; $i < count( $social_group ); $i++ ){
		$social_icon = esc_html( $social_group[$i]['icon'] );
		$social_title = esc_html( $social_group[$i]['title'] );
		$social_url = esc_url( $social_group[$i]['url'] );
		if ( !empty( $social_icon ) ){
			$out .= "<a class='social_icon'" . ( !empty( $social_url ) ? " href='$social_url'" : "" ) . ( !empty( $social_title ) ? " title='$social_title'" : "" ) . ">" . prospect_figure_style() . "<i class='$social_icon'></i></a>";
		}
	}
	return $out;
}

function prospect_pagination ( $paged=1, $max_paged=1, $dynamic = true ){
	$is_rtl = is_rtl();

	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts	= explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = $GLOBALS['wp_rewrite']->using_permalinks() ? trailingslashit( $pagenum_link ) . '%_%' : trailingslashit( $pagenum_link ) . '?%_%';
	$pagenum_link = add_query_arg( $query_args, $pagenum_link );

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : 'paged=%#%';
	?>
	<div class="pagination<?php if($dynamic) echo ' dynamic'; ?>">
		<div class='page_links'>
		<?php
		$pagination_args = array( 'base' => $pagenum_link,
									'format' => $format,
									'current' => $paged,
									'total' => $max_paged,
									"prev_text" => "<i class='fa fa-long-arrow-" . ( $is_rtl ? "right" : 'left' ) . "'></i> " . esc_html__( "PREV", "prospect" ). " ",
									"next_text" => " " . esc_html__( "NEXT", "prospect" ). "  <i class='fa fa-long-arrow-" . ( $is_rtl ? "left" : 'right' ) . "'></i>",
									"link_before" => "",
									"link_after" => "",
									"before" => "",
									"after" => "",
									"mid_size" => 2,
									);
		$pagination = paginate_links( $pagination_args );
		echo sprintf("%s", $pagination);
		?>
		</div>
	</div>
	<?php
}

function prospect_page_links(){
	$args = array(
	 'before'		   => ''
	,'after'			=> ''
	,'link_before'	  => '<span>'
	,'link_after'	   => '</span>'
	,'next_or_number'   => 'number'
	,'nextpagelink'	 =>  esc_html__("Next Page",'prospect')
	,'previouspagelink' => esc_html__("Previous Page",'prospect')
	,'pagelink'		 => '%'
	,'echo'			 => 0 );
	$pagination = wp_link_pages( $args );
	echo !empty( $pagination ) ? "<div class='pagination'><div class='page_links'>$pagination</div></div>" : "";
}

function prospect_load_more ( $paged = 1, $max_paged = PHP_INT_MAX ){
	?>
		<a class="prospect_button large prospect_load_more" href="#"><?php echo esc_html__( "Load More", 'prospect' ); ?></a>
	<?php
}

function prospect_get_date_part ( $part = '' ){
	$part_val = '';
	$p_id = get_queried_object_id();
	$perm_struct = get_option( 'permalink_structure' );
	$use_perms = !empty( $perm_struct );
	$merge_date = get_query_var( 'm' );
	$match = preg_match( '#(\d{4})?(\d{1,2})?(\d{1,2})?#', $merge_date, $matches );
	switch ( $part ){
		case 'y':
			$part_val = $use_perms ? get_query_var( 'year' ) : ( isset( $matches[1] ) ? $matches[1] : '' );
			break;
		case 'm':
			$part_val = $use_perms ? get_query_var( 'monthnum' ) : ( isset( $matches[2] ) ? $matches[2] : '' );
			break;
		case 'd':
			$part_val = $use_perms ? get_query_var( 'day' ) : ( isset( $matches[3] ) ? $matches[3] : '' );
			break;
	}
	return $part_val;
}

function prospect_get_all_flaticon_icons() {
	$cwsfi = get_option('cwsfi');
	if (!empty($cwsfi) && isset($cwsfi['entries'])) {
		return $cwsfi['entries'];
	} else {
		global $wp_filesystem;
		if( empty( $wp_filesystem ) ) {
			require_once( ABSPATH .'/wp-admin/includes/file.php' );
			WP_Filesystem();
		}
		$file = get_template_directory() . '/fonts/fi/flaticon.css';
		$fi_content = '';
		$out = '';
		if ( $wp_filesystem && $wp_filesystem->exists($file) ) {
			$fi_content = $wp_filesystem->get_contents($file);
			if ( preg_match_all( "/flaticon-((\w+|-?)+):before/", $fi_content, $matches, PREG_PATTERN_ORDER ) ){
				return $matches[1];
			}
		}
	}
}


function prospect_body_font_styles (){
	$font_options_check = prospect_get_option( "body_font" );
	$font_options = !empty( $font_options_check ) ? $font_options_check : array('font-family' => 'Poppins',
																				 'font-weight' => array('300','500','600','700'),
																				 'font-sub' => array('latin'),
																				 'font-type' => '',
																				 'color' => '#808c95',
																				 'font-size' => '14px',
																				 'line-height' => '24px',
																				); 
	$font_family = esc_attr( $font_options['font-family'] );
	$font_size = esc_attr( $font_options['font-size'] );
	$line_height = esc_attr( $font_options['line-height'] );
	$font_color = esc_attr( $font_options['color'] );
	echo "body,
					.main_menu .cws_megamenu_item{
						" . ( !empty( $font_family ) ? "font-family: $font_family;" : "" ) . "
						" . ( !empty( $font_size ) ? "font-size: $font_size;" : "" ) . "
						" . ( !empty( $line_height ) ? "line-height: $line_height;" : "" ) . "
						" . ( !empty( $font_color ) ? "color: $font_color;" : "" ) . "
					}";
	echo "#wp-calendar td#prev a:before,
					#wp-calendar td#next a:before,
					.widget #searchform .screen-reader-text:before,
					#search_bar_item input[name='s']{
						" . ( !empty($font_size ) ? "font-size:$font_size;" : "" ) . "
					}";
	echo ".site_header#sticky.alt .main_menu .menu-item,
						.prospect_button,
						.prospect_button.alt:hover,
						.testimonial.without_image .author_info + .author_info:before{
						" . ( !empty( $font_color ) ? "color: $font_color;" : "" ) . "
					}";
	echo ".site_header#sticky.alt .main_menu.sandwich .sandwich_switcher .ham,
					.site_header#sticky.alt .main_menu.sandwich .sandwich_switcher .ham:before,
					.site_header#sticky.alt .main_menu.sandwich .sandwich_switcher .ham:after{
						" . ( !empty( $font_color ) ? "background-color: $font_color;" : "" ) . "
					}";
	echo ".widget ul>li.recentcomments:before,
					.widget ul>li.recentcomments:after{
						width: $line_height;
						height: $line_height;
					}
					.widget .menu .pointer{
						height: $line_height;
					}
					";
	echo !empty( $line_height ) ? ".dropcap{
						line-height: -webkit-calc($line_height*2);
						line-height: -ms-calc($line_height*2);
						line-height: calc($line_height*2);
						width: -webkit-calc($line_height*2);
						width: -ms-calc($line_height*2);
						width: calc($line_height*2);
					}
					" : "";			
}
add_action( 'prospect_body_font_hook', 'prospect_body_font_styles' );




	function merge_fonts_options ( $fonts_arr = array(), $ind = 0 ){
		$r = $temp = $rem_inds = array();
		if ( !isset( $fonts_arr[ $ind ] ) ){
			return $fonts_arr;
		}
		$cur_font_opts = $fonts_arr[ $ind ];
		$cur_font_family = $cur_font_opts['font-family'];
		if ( empty( $cur_font_family ) ){
			$r = merge_fonts_options( array_splice( $fonts_arr, $ind, 1 ), $ind );
		}
		else{
			for ( $i = $ind + 1; $i < count( $fonts_arr ); $i++ ){
				if ( $fonts_arr[$i]['font-family'] == $cur_font_family ){
					$temp['font-family'] = $cur_font_family;
					$temp['font-weight'] = $cur_font_opts['font-weight'];
					for ( $j = 0; $j < count(  $fonts_arr[$i]['font-weight'] ); $j ++ ){
						if ( !in_array( $fonts_arr[$i]['font-weight'][$j],  $temp['font-weight'] ) ){
							array_push( $temp['font-weight'], $fonts_arr[$i]['font-weight'][$j] );
						}
					}
					$temp['font-sub'] = $cur_font_opts['font-sub'];
					for ( $j = 0; $j < count(  $fonts_arr[$i]['font-sub'] ); $j ++ ){
						if ( !in_array( $fonts_arr[$i]['font-sub'][$j], $temp['font-sub'] ) ){
							array_push( $temp['font-sub'], $fonts_arr[$i]['font-sub'][$j] );
						}
					}
					$fonts_arr[$ind] = $temp;
					$r = merge_fonts_options( array_splice( $fonts_arr, $i, 1 ), $ind ); 
				}
			}
			$r = merge_fonts_options( $fonts_arr, $ind + 1 );
		}
		unset( $r['color'] );
		unset( $r['font-size'] );
		unset( $r['line-height'] );
		return $r;
	}

	function prospect_render_fonts_url (){
		$url = "";
		$query_args = "";
		$body_font_opts_check = prospect_get_option( "body_font" );
		$body_font_opts = !empty( $body_font_opts_check ) ? $body_font_opts_check : array('font-family' => 'Poppins',
																						 'font-weight' => array('300','500','600','700'),
																						 'font-sub' => array('latin'),
																						 'font-type' => '',
																						 'color' => '#808c95',
																						 'font-size' => '14px',
																						 'line-height' => '24px',
																						); 
		$menu_font_opts_check = prospect_get_option( "menu_font" );
		$menu_font_opts = !empty( $font_options_check ) ? $font_options_check : array('font-family' => 'Poppins',
																				 'font-weight' => array('500'),
																				 'font-sub' => array('latin'),
																				 'font-type' => '',
																				 'color' => '#1c3545',
																				 'font-size' => '12px',
																				 'line-height' => '36px',
																				); 
		$header_font_opts_check = prospect_get_option( "header_font" );
		$header_font_opts = !empty( $font_options_check ) ? $font_options_check : array('font-family' => 'Dosis',
																				 'font-weight' => array('regular' , '600'),
																				 'font-sub' => array('latin'),
																				 'font-type' => '',
																				 'color' => '#333333',
																				 'font-size' => '28px',
																				 'line-height' => '39px',
																				); 
		$fonts_opts = merge_fonts_options( array( $body_font_opts, $menu_font_opts, $header_font_opts ) );
		if ( empty( $fonts_opts ) ) return $url;
		$fonts_urls = array( count( $fonts_opts ) );
		$subsets_arr = array();
		$base_url = "//fonts.googleapis.com/css";
		$url = "";
		for ( $i = 0; $i < count( $fonts_opts ); $i++ ){
			$fonts_urls[$i] = "" . $fonts_opts[$i]['font-family'];
			$fonts_urls[$i] .= !empty( $fonts_opts[$i]['font-weight'] ) ? ":" . implode( $fonts_opts[$i]['font-weight'], ',' ) : "";
			for ( $j = 0; $j < count( $fonts_opts[$i]['font-sub'] ); $j++ ){
				if ( !in_array( $fonts_opts[$i]['font-sub'][$j], $subsets_arr ) ){
					array_push( $subsets_arr, $fonts_opts[$i]['font-sub'][$j] );
				}
			}
		};
		$query_args = array(
			'family'	=> urlencode( implode( $fonts_urls, '|' ) )
		);
		if ( !empty( $subsets_arr ) ){
			$query_args['subset']	= urlencode( implode( $subsets_arr, ',' ) );
		}
		$url = add_query_arg( $query_args, $base_url );

    	if ( 'off' !== _x( 'on', 'Google font: on or off', 'prospect' ) ) {
			$gf_url = esc_url( $url );
			if ( !empty( $gf_url ) ) wp_enqueue_style( 'gf', $gf_url);
		}
		
	}
	
add_action( 'prospect_render_fonts_url_hook', 'prospect_render_fonts_url' );

function prospect_menu_font_styles (){
	$font_options_check = prospect_get_option( "menu_font" );
	$font_options = !empty( $font_options_check ) ? $font_options_check : array('font-family' => 'Poppins',
																				 'font-weight' => array('500'),
																				 'font-sub' => array('latin'),
																				 'font-type' => '',
																				 'color' => '#1c3545',
																				 'font-size' => '12px',
																				 'line-height' => '36px',
																				); 
	$font_family = esc_attr( $font_options['font-family'] );
	$font_size = esc_attr( $font_options['font-size'] );
	$line_height = esc_attr( $font_options['line-height'] );
	$font_color = esc_attr( $font_options['color'] );
	echo ".main_menu .menu-item,
					#mobile_menu .megamenu_item_column_title,
					#mobile_menu .widget_nav_menu .menu-item{
						" . ( !empty( $font_family ) ? "font-family: $font_family;" : "" ) . "
						" . ( !empty( $font_size ) ? "font-size: $font_size;" : "" ) . "
						" . ( !empty( $line_height ) ? "line-height: $line_height;" : "" ) . "
						" . ( !empty( $font_color ) ? "color: $font_color;" : "" ) . "
					}";
	echo ".main_menu.sandwich .sandwich_switcher .ham,
					.main_menu.sandwich .sandwich_switcher .ham:before,
					.main_menu.sandwich .sandwich_switcher .ham:after,
					#mobile_header .sandwich_switcher .ham,
					#mobile_header .sandwich_switcher .ham:before,
					#mobile_header .sandwich_switcher .ham:after{
						background-color: #1c3545;
					}";
	echo ".main_menu > .menu-item + .menu-item:before{
						" . ( !empty( $font_size ) ? "height:$font_size;" : "" ) . "
					}";
	echo ".cws_megamenu_item .megamenu_item_column_title .pointer{
						" . ( !empty( $font_size ) ? "font-size:$font_size;" : "" ) . "
					}";
	echo "#mobile_menu .menu-item:hover{
						" . ( !empty( $font_color ) ? "color:$font_color;" : "" ) . "
					}";
}
add_action( 'prospect_menu_font_hook', 'prospect_menu_font_styles' );

function prospect_header_font_styles (){
	$font_options_check = prospect_get_option( "header_font" );
	$font_options = !empty( $font_options_check ) ? $font_options_check : array('font-family' => 'Dosis',
																				 'font-weight' => array('regular' , '600'),
																				 'font-sub' => array('latin'),
																				 'font-type' => '',
																				 'color' => '#333333',
																				 'font-size' => '28px',
																				 'line-height' => '39px',
																				); 
	$font_family = esc_attr( $font_options['font-family'] );
	$font_size = esc_attr( $font_options['font-size'] );
	$line_height = esc_attr( $font_options['line-height'] );
	$font_color = esc_attr( $font_options['color'] );
	echo ".widgettitle{
						" . ( !empty( $font_family ) ? "font-family: $font_family;" : "" ) . "
						" . ( !empty( $font_size ) ? "font-size: $font_size;" : "" ) . "
						" . ( !empty( $line_height ) ? "line-height: $line_height;" : "" ) . "
						" . ( !empty( $font_color ) ? "color: $font_color;" : "" ) . "
					}";
	echo ".widgettitle + .carousel_nav{
						" . ( !empty( $line_height ) ? "line-height: $line_height;" : "" ) . "
	}
	";
	echo "h1, h2, h3, h4, h5, h6{
						" . ( !empty( $font_family ) ? "font-family: $font_family;" : "" ) . "
						" . ( !empty( $font_color ) ? "color: $font_color;" : "" ) . "
					}";
	echo "ol, blockquote, .widget ul a,
					.widget_header .carousel_nav > *:hover,
					.prospect_sc_carousel_header .carousel_nav > *:hover,
					#comments .comment_meta,
					.cws_staff_post.posts_grid_post:hover .post_title,
					.cws_megamenu_item .megamenu_item_column_title{
						" . ( !empty( $font_color ) ? "color: $font_color;" : "" ) . "
	}";
	echo ".widget_header .carousel_nav > *:hover,
					.prospect_sc_carousel_header .carousel_nav > *:hover{
						" . ( !empty( $font_color ) ? "border-color: $font_color;" : "" ) . "
	}";
	echo "#banner_404,
					.pricing_plan_price{
					" . ( !empty( $font_family ) ? "font-family: $font_family;" : "" ) . "
	}";
	echo "
					@media screen and ( min-width: 981px ){
						#page.single_sidebar .cws_staff_posts_grid.posts_grid_2 .cws_staff_post_title.posts_grid_post_title,
						#page.double_sidebar .cws_staff_posts_grid.posts_grid_2 .cws_staff_post_title.posts_grid_post_title{
							" . ( !empty( $font_color ) ? "color: $font_color;" : "" ) . "							
						}
					}
	";
	echo "
					@media screen and ( max-width: 479px ){
						.cws_staff_post_title.posts_grid_post_title{
							" . ( !empty( $font_color ) ? "color: $font_color;" : "" ) . "							
						}
					}
	";
}
add_action( 'prospect_header_font_hook', 'prospect_header_font_styles' );

if ( !function_exists( "prospect_custom_colors_styles" ) ){
	function prospect_custom_colors_styles (){
		$theme_custom_color_check = esc_attr( prospect_get_option( 'theme_color' ) );
		$theme_custom_color = !empty ( $theme_custom_color_check ) ? $theme_custom_color_check : '#e95f58';

		$theme_2_custom_color_check = esc_attr( prospect_get_option( 'theme_2_color' ) );
		$theme_2_custom_color = !empty ( $theme_2_custom_color_check ) ? $theme_2_custom_color_check : '#4e9bdd';

		$theme_3_custom_color_check = esc_attr( prospect_get_option( 'theme_3_color' ) );
		$theme_3_custom_color = !empty ( $theme_3_custom_color_check ) ? $theme_3_custom_color_check : '#18bb7c';

		$footer_bg_color_check = esc_attr( prospect_get_option( 'footer_bg_color' ) );
		$footer_bg_color = !empty ( $footer_bg_color_check ) ? $footer_bg_color_check : '#2d3339';

		echo "a,
									ul li:before,
									ul.custom_icon_style .list_list,
									#page_title_section .bread-crumbs a:hover,
									.widget ul a:hover,
									.gallery_post_carousel_nav:hover,
									h1 > a:hover,
									h2 > a:hover,
									h3 > a:hover,
									h4 > a:hover,
									h5 > a:hover,
									h6 > a:hover,
									.post_posts_grid_post_content.read_more_alt .more-link:hover,
									#comments .comments_number,
									.wp-playlist-light .wp-playlist-current-item:before,
									.wp-playlist-light .wp-playlist-tracks .wp-playlist-playing,
									.cws_staff_post_terms.single_post_terms,
									#footer_widgets .widget ul a:hover,
									#footer_social .social_icon:hover,
									.prospect_icon,
									.prospect_icon.icon_alt.hovered:hover,
									.banner_icon,
									.prospect_services_title,
									.prospect_services_column:hover 
									.testimonial .author_status,
									.vc_images_carousel .vc_carousel-control .icon-next:hover,
									.vc_images_carousel .vc_carousel-control .icon-prev:hover,
									.cws_twitter .cws_twitter_icon i,
									.select2-results .select2-highlighted,
									.prospect_milestone:not(.milestone-alt) .prospect_milestone_content .prospect_milestone_icon,
									.cta_icon,
									span.wpcf7-form-control-wrap:first-of-type:last-of-type:first-child input.wpcf7-validates-as-required.wpcf7-not-valid + .wpcf7-not-valid-tip:after,
									.post_posts_grid_post_content.read_more_alt
									.more-link i,
									.pagination .page-numbers.next i,
									.pagination .page-numbers.prev i,
									.comment-reply-link i,
									.widget #searchform .screen-reader-text.hover,
									.widget_social .social_icon:hover,
									.widget.custom_color .widget_social .social_icon:hover,
									.prospect_services_column.icon_alt.hovered:hover .prospect_services_icon .icon,
									.prospect_services_column .prospect_services_icon .icon,
									.prospect_sc_carousel .carousel_nav > .prev:hover,
									.prospect_sc_carousel .carousel_nav > .next:hover,
									.cws_staff_post.posts_grid_post:hover .post_title,
									.prospect_process_title .process_number,
									.prospect_process_icon,
									.small_type .latest_post_post:hover .latest_post_post_date .date,
									.latest_post_post .latest_post_post_media .link:hover,
									.cws_staff_photo .figure_container .link:hover,
									.hexagon_grid .pic .links a:hover{
			color: $theme_custom_color;
		}
								.figure_wrap svg,
								.widget_social .social_icon:hover .figure_wrap svg{
			stroke: $theme_custom_color;
		}
								.figure_wrap svg,
								.prospect_milestone.milestone-alt .prospect_milestone_background .figure_wrap svg,
								.widget_social .social_icon .figure_wrap svg,
								.prospect_services_column.hovered:hover .prospect_services_icon svg,
								.prospect_services_column.icon_alt .prospect_services_icon svg,
								.prospect_icon.icon_alt .figure_wrap svg,
								.prospect_icon.hovered:hover .figure_wrap svg{
			fill: $theme_custom_color;
		}
								hr:before,
								.post_terms .v_sep{
			border-left-color: $theme_custom_color;
		}
								abbr,
								.vc_tta.vc_general.vc_tta-tabs.vc_tta-tabs-position-top .vc_tta-tab.vc_active{
			border-bottom-color: $theme_custom_color;
		}
								mark,
								.prospect_button:hover,
								.more-link:hover,
								input[type='submit']:hover,
								button:hover,
								#top_panel_bar #searchsubmit,
								#top_panel_bar #searchsubmit:hover,
								.widget ul>li.recentcomments:after,
								.widget .menu .pointer:before,
								.widget .menu .pointer:after,
								.widget .menu .menu-item.active,
								.widget .menu .menu-item:hover,
								a[rel^=\"attachment\"]:before,
								.gallery .gallery-item a:before,
								.cws_portfolio_posts_grid.posts_grid_2 .item:hover .posts_grid_divider,
								.cws_portfolio_posts_grid.posts_grid_3 .item:hover .posts_grid_divider,
								.cws_portfolio_posts_grid.posts_grid_4 .item:hover .posts_grid_divider,
								.wp-playlist-light .wp-playlist-current-item,
								.prospect_button.alt,
								.dropcap,
								.prospect_banner,
								.prospect_pb_progress,
								.prospect_services_divider,
								.pricing_plan_title,
								#top_panel i,
								hr.posts_grid_small_divider,
								.vc_tta.vc_general.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-title:before,
								input[type='submit'],
								.widget .widgettitle:after,
								hr.short,
								.testimonial.prospect_module figcaption:before,
								.process_number_wrap,
								.filter_wrap .filter.active:before,
								.testimonial.prospect_module .quote q:after,
								.vc_toggle_active .vc_toggle_title> *:first-child:before{
			background-color: $theme_custom_color;
		}
								.prospect_button,
								.more-link,
								input[type='submit'],
								button,
								.latest_tweets .tweet:before,
								.cws_twitter .cws_twitter_icon i,
								.cta_icon,
								span.wpcf7-form-control-wrap:first-of-type:last-of-type:first-child input.wpcf7-not-valid,
								.pagination .page_links > a:hover,
								.pagination .page_links > span.current{
			border-color: $theme_custom_color;
		}
								.main_menu > .menu-item >.sub-menu,
								.prospect_services_column{
			border-top-color: $theme_custom_color;
		}
		";
		echo ".comment-form-rating .stars .stars-active,
									.post_post_terms,
									.post_post_terms a,
									.pagination .page_links > *,
									.comment-reply-link,
									.widget ul a,
									.widget_tag_cloud a,
									.cws_portfolio_post_terms,
									.cws_portfolio_post_terms a,
									.latest_post_list_more,
									.filter_wrap .filter,
									.post_social_links.cws_staff_social_links a{
			color: $theme_2_custom_color;
		}
									#top_panel_bar #search_bar_item input[name='s']{
			background-color: rgba(" . prospect_Hex2RGBA( $theme_custom_color, '0.85' ) . ");
		}
									hr:before,
									#top_panel_social_el,
									.prospect_button.button_color_2:hover,
									.prospect_button.alt.button_color_2,
									.owl-controls .owl-page.active{
			background-color: $theme_2_custom_color;
		}
									prospect_button.button_color_2,
									.owl-controls .owl-page.active{
			border-color: $theme_2_custom_color;
		}
									.latest_post_list_more:hover .figure_wrap svg,
									.post_social_links.cws_staff_social_links a:hover .figure_wrap svg{
			fill: $theme_2_custom_color;
		}
									.latest_post_list_more:hover .figure_wrap svg,
									.post_social_links.cws_staff_social_links a:hover .figure_wrap svg{
			stroke: $theme_2_custom_color;
		}
		";
		echo ".prospect_button.button_color_3,
									span.wpcf7-form-control-wrap:first-of-type:last-of-type:first-child + input[type='submit'],
									#banner_404_away .prospect_button{
			border-color: $theme_3_custom_color;
		}
								.vc_tta.vc_general.vc_tta-tabs.vc_tta-tabs-position-bottom .vc_tta-tab.vc_active,
								.hex:before,
								.menu_search_wrap .search-field{
			border-bottom-color: $theme_3_custom_color;
		}
								hr:before{
			border-right-color: $theme_3_custom_color;
		}
								.hex:after{
			border-top-color: $theme_3_custom_color;
		}
								#wp-calendar td:not(#prev):not(#next) a,
								#wp-calendar td:not(#prev):not(#next) a:before,
								#wp-calendar td:not(#prev):not(#next) a:after,
								.prospect_button.button_color_3:hover,
								.prospect_button.alt.button_color_3,
								span.wpcf7-form-control-wrap:first-of-type:last-of-type:first-child + input[type='submit'],
								.post_post.sticky > .post_post_header,
								.lavalamp-object:before,
								.hex,
								#banner_404_away .prospect_button:hover,
								.woo_mini_count,
								.main_menu .sub-menu .menu-item > a:after{
			background-color: $theme_3_custom_color;
		}
								#wp-calendar td#prev a:hover:before,
								#wp-calendar td#next a:hover:before,
								.main_menu .sub-menu .menu-item.current-menu-item{
			color: $theme_3_custom_color;
		}
								#scroll_to_top{
			background-color: $footer_bg_color;
		}
								.hex{
			box-shadow: 0 0 20px $theme_3_custom_color, 0 0 20px $theme_3_custom_color;
		}
								.woo_banner_wrapper .figure_wrap svg{
			fill: $theme_3_custom_color;
		}
								.woo_banner_wrapper .figure_wrap svg{
			stroke: $theme_3_custom_color;
		}";		
	}
}
add_action( 'prospect_custom_colors_hook', 'prospect_custom_colors_styles' );

function prospect_header_styles (){
	$p_id = get_queried_object_id();
	$post_type = get_post_type( $p_id );
	$header_menu_font_color = '';
	$header_font_color = '';

	$font_options_check = prospect_get_option( "menu_font" );
	$font_options = !empty( $font_options_check ) ? $font_options_check : array('font-family' => 'Poppins',
																				 'font-weight' => array('500'),
																				 'font-sub' => array('latin'),
																				 'font-type' => '',
																				 'color' => '#1c3545',
																				 'font-size' => '12px',
																				 'line-height' => '36px',
																				); 
	$font_color = esc_attr( $font_options['color'] );


	$header_font_color_check = esc_attr( prospect_get_option( 'header_font_color' ) );
	$header_font_color = !empty ( $header_font_color_check ) ? $header_font_color_check : '#ffffff';
	$header_bg_color_check = esc_attr( prospect_get_option( 'header_bg_color' ) );
	$header_bg_color = !empty ( $header_bg_color_check ) ? $header_bg_color_check : '#272b31';
	$menu_override_font_color = esc_attr( prospect_get_option( 'menu_font_color' ) );	
	$menu_font_color_check = $font_color;
	if (!empty ( $menu_override_font_color )){
		$menu_font_color = $menu_override_font_color;
	} else {
		$menu_font_color = !empty ( $menu_font_color_check ) ? $menu_font_color_check : '#1c3545';
	}
	$header_page_meta_vars 	= prospect_get_page_meta_var( array( 'header' ) );
	$page_override_header 	= !empty( $header_page_meta_vars );
	$customize_menu 		= (bool)prospect_get_option( 'customize_menu' );
	$header_covers_slider 	= false;
	$menu_opacity 			= '100';
	if ( $page_override_header ){
		$menu_opacity 			= isset( $header_page_meta_vars['menu_opacity'] ) ? $header_page_meta_vars['menu_opacity'] : $menu_opacity;	
		$menu_font_color 		= isset( $header_page_meta_vars['menu_font_color'] ) ? $header_page_meta_vars['menu_font_color'] : $menu_font_color;	
		$menu_bg_color 			= isset( $header_page_meta_vars['menu_bg_color'] ) ? $header_page_meta_vars['menu_bg_color'] : $menu_bg_color;
	}
	else{
		$menu_opacity 			= prospect_get_option( 'menu_opacity' );
		$menu_bg_color 			= prospect_get_option( 'menu_bg_color' );
	}
	$menu_opacity_css = $menu_opacity !== "" ? strval( (int)$menu_opacity / 100 ) : "";
	$post_thumb_url = "";

	if ( has_post_thumbnail () && !(in_array( $post_type, array( 'post', 'cws_portfolio', 'cws_staff', 'product', 'lp_course' ) ) || is_archive()) ){
		$post_thumb_id = get_post_thumbnail_id( $p_id );
		$post_thumb_obj = !empty( $post_thumb_id ) ? wp_get_attachment_image_src( $post_thumb_id, 'full' ) : array();
		$post_thumb_url = isset( $post_thumb_obj[0] ) ? $post_thumb_obj[0] : "";		
	}
	else{
		$post_thumb_obj = prospect_get_option( 'default_header_image' );
		if (isset($GLOBALS['prospect_page_meta']['header']['default_header_image']) && !empty($GLOBALS['prospect_page_meta']['header']['default_header_image']['src'])){
			$post_thumb_obj = $GLOBALS['prospect_page_meta']['header']['default_header_image'];
		}
		$post_thumb_url = isset( $post_thumb_obj['src'] ) ? $post_thumb_obj['src'] : "";
	}
	echo "
	#top_panel i{
		color: $header_bg_color;
	}
	";
	echo "
	header .main_menu > .menu-item{
		color: $header_menu_font_color;
	}
	";
	echo "#top_panel,
							#page_title_section #page_title,
							#top_panel_social .social_icon{
		color: $header_font_color;
	}";
	echo "
	#main_menu.sandwich .sandwich_switcher .ham,
	#main_menu.sandwich .sandwich_switcher .ham:before,
	#main_menu.sandwich .sandwich_switcher .ham:after,
	#mobile_header .sandwich_switcher .ham,
	#mobile_header .sandwich_switcher .ham:before,
	#mobile_header .sandwich_switcher .ham:after{
		background-color: $header_menu_font_color;
	}";
	if ( $menu_opacity_css !== "" ){
		echo  "
			#site_header,
			#mobile_header{
				background-color:rgba(" . prospect_Hex2RGBA( $menu_bg_color, $menu_opacity_css ) . ");
		}";
	}
	else{
		echo  "
			#site_header,
			#mobile_header{
				background-color:$menu_bg_color;
		}";
	}
	echo "
	#woo_minicart_bar_item .bar_element,
	.menu_wrapper .menu_search_button,
	#main_menu > .menu-item{
		color: $menu_font_color;
	}
	.main_menu > .wpml-ls-slot-main-menu:before{
		border-right-color: $menu_font_color;
	}
	";		
	if ( $header_covers_slider ){
		echo "
		#header_wrapper,
		#page_title_section{
			background-color: $header_bg_color;
		}
		";
		if ( !empty( $post_thumb_url ) ){
			echo "
			#header_wrapper{
				background-image: url($post_thumb_url);
			}
			";			
		}
	}
	else{
		echo "
		#top_panel,
		#page_title_section{
			background-color: $header_bg_color;
		}
		";
		if ( !empty( $post_thumb_url ) ){
			echo "
			#page_title_section{
				background-image: url($post_thumb_url);
			}
			";			
		}
	}
}
add_action( 'prospect_header_styles_hook', 'prospect_header_styles' );

function prospect_footer_widgets_styles (){
	$post_thumb_obj 	= prospect_get_option( 'default_footer_image' );
	$post_thumb_url 	= isset( $post_thumb_obj['src'] ) ? $post_thumb_obj['src'] : "";
	$footer_bg_color 	= prospect_get_option( 'footer_bg_color' );
	$footer_bg_color 	= esc_attr( $footer_bg_color );
	$footer_font_color	= prospect_get_option( 'footer_font_color' );
	$footer_font_color 	= esc_attr( $footer_font_color );
	$footer_title_color	= prospect_get_option( 'footer_title_color' );
	$footer_title_color = esc_attr( $footer_title_color );
	if ( is_page() ){
		$footer_sb = prospect_get_page_meta_var ( array( 'footer', 'footer_sb_top' ) );
	}
	else{
		$footer_sb = prospect_get_option( 'footer_sb' );
	}
	if ( is_active_sidebar( $footer_sb ) ){
		echo "
			#footer_widgets{
				background-color: 	$footer_bg_color;
				color:				$footer_font_color;
				background-image: url(" . esc_url($post_thumb_url) . ");
			}
			#footer_widgets .carousel_nav > *{
				color: 			$footer_font_color;
				border-color:	$footer_font_color;
			}
			#footer_widgets h1,
			#footer_widgets h2,
			#footer_widgets h3,
			#footer_widgets h4,
			#footer_widgets h5,
			#footer_widgets h6,
			#footer_widgets i,
			#footer_widgets .carousel_nav > *:hover,
			#footer_widgets .widget ul a,
			#footer_widgets .widget.custom_color input[type='submit']:hover,
			#footer_widgets .widget input,
			#footer_widgets .widget textarea{
				color:			$footer_title_color;
			}
			#footer_widgets .carousel_nav > *:hover{
				border-color:	$footer_title_color;
			}
			#footer_widgets .widget_header .carousel_nav > *:hover{
				background-color: $footer_title_color;
			}
		";
	}
}
add_action( 'prospect_footer_widgets_styles_hook', 'prospect_footer_widgets_styles' );

function prospect_footer_copyrights_styles (){
	$copyrights_bg_color = prospect_get_option( 'copyrights_bg_color' );
	$copyrights_bg_color = esc_attr( $copyrights_bg_color );
	$copyrights_font_color = prospect_get_option( 'copyrights_font_color' );
	$copyrights_font_color = esc_attr( $copyrights_font_color );
	echo "
		#site_footer{
			background-color: $copyrights_bg_color;
			color: $copyrights_font_color;
		}
		#footer_social .social_icon{
			color: $copyrights_font_color;
		}
	";
}
add_action( 'prospect_footer_copyrights_styles_hook', 'prospect_footer_copyrights_styles' );

function prospect_front_dynamic_styles (){
	ob_start();
	echo "
		#document > #wpadminbar{
			margin-top: auto;
		}
	";
	echo ob_get_clean();
}
add_action( 'prospect_front_dynamic_styles_hook', 'prospect_front_dynamic_styles' );

function prospect_back_dynamic_styles (){
	ob_start();
	echo "
	";
	echo ob_get_clean();
}
add_action( 'prospect_back_dynamic_styles_hook', 'prospect_back_dynamic_styles' );

function prospect_get_sidebars() {
	if ( is_home() ){
		$sidebar_pos = prospect_get_option( 'def-home-layout' );
		$sidebar1 = prospect_get_option( 'def-home-sidebar1' );
		$sidebar2 = prospect_get_option( 'def-home-sidebar2' );		
	}
	else if ( is_front_page() ){
		$p_id = get_queried_object_id ();
		$prospect_stored_meta = get_post_meta( $p_id, PROSPECT_MB_PAGE_LAYOUT_KEY );
		$sidebar1 = $sidebar2 = $sidebar_pos = $sb_block = '';
		if ( isset( $prospect_stored_meta[0] ) ) {
			$sidebar_pos = $prospect_stored_meta[0]['sb_layout'];
			if ( $sidebar_pos == 'default' ) {
				$sidebar_pos = prospect_get_option( 'def-home-layout' );
				$sidebar1 = prospect_get_option( 'def-home-sidebar1' );
				$sidebar2 = prospect_get_option( 'def-home-sidebar2' );

			} else {
				$sidebar1 = isset( $prospect_stored_meta[0]['sidebar1'] ) ? $prospect_stored_meta[0]['sidebar1'] : '';
				$sidebar2 = isset( $prospect_stored_meta[0]['sidebar2'] ) ? $prospect_stored_meta[0]['sidebar2'] : '';
			}
		} else {
			$sidebar_pos = prospect_get_option( 'def-home-layout' );
			$sidebar1 = prospect_get_option( 'def-home-sidebar1' );
			$sidebar2 = prospect_get_option( 'def-home-sidebar2' );
		}
	}
 	else if ( is_category() || is_tag() || is_archive() ) {
		$sidebar_pos = prospect_get_option( 'def-blog-layout' );
		$sidebar1 = prospect_get_option( 'def-blog-sidebar1' );
		$sidebar2 = prospect_get_option( 'def-blog-sidebar2' );
	} else if ( is_search() ) {
		$sidebar_pos = prospect_get_option( 'def-page-layout' );
		$sidebar1 = prospect_get_option( 'def-page-sidebar1' );
		$sidebar2 = prospect_get_option( 'def-page-sidebar2' );
	}else if ( is_single() ) {
		$p_id = get_queried_object_id ();
		$post_type = get_post_type($p_id);
		if( in_array( $post_type, array( 'attachment', 'cws_portfolio', 'cws_staff' ) ) ){
			$sidebar_pos = prospect_get_option("def-page-layout");
			$sidebar1 = prospect_get_option("def-page-sidebar1");
			$sidebar2 = prospect_get_option("def-page-sidebar2");
		}else if ( in_array( $post_type, array( 'post', 'attachment' ) ) ){
			$sidebar_pos = prospect_get_option("def-blog-layout");
			$sidebar1 = prospect_get_option("def-blog-sidebar1");
			$sidebar2 = prospect_get_option("def-blog-sidebar2");			
		}else{
			$sidebar_pos = prospect_get_option("def-page-layout");
			$sidebar1 = prospect_get_option("def-page-sidebar1");
			$sidebar2 = prospect_get_option("def-page-sidebar2");			
		}		
	}
	else if ( is_tax() ){
		$sidebar_pos = prospect_get_option("def-page-layout");
		$sidebar1 = prospect_get_option("def-page-sidebar1");
		$sidebar2 = prospect_get_option("def-page-sidebar2");		
	}
	else if ( is_page() ){
		$p_id = get_queried_object_id ();
		$prospect_stored_meta = get_post_meta( $p_id, PROSPECT_MB_PAGE_LAYOUT_KEY );
		$sidebar1 = $sidebar2 = $sidebar_pos = $sb_block = '';
		if ( isset( $prospect_stored_meta[0] ) ) {
			$sidebar_pos = $prospect_stored_meta[0]['sb_layout'];
			if ( $sidebar_pos == 'default' ) {
				$sidebar_pos = prospect_get_option( 'def-page-layout' );
				$sidebar1 = prospect_get_option( 'def-page-sidebar1' );
				$sidebar2 = prospect_get_option( 'def-page-sidebar2' );

			} else {
				$sidebar1 = isset( $prospect_stored_meta[0]['sidebar1'] ) ? $prospect_stored_meta[0]['sidebar1'] : '';
				$sidebar2 = isset( $prospect_stored_meta[0]['sidebar2'] ) ? $prospect_stored_meta[0]['sidebar2'] : '';
			}
		} else {
			$sidebar_pos = prospect_get_option( 'def-page-layout' );
			$sidebar1 = prospect_get_option( 'def-page-sidebar1' );
			$sidebar2 = prospect_get_option( 'def-page-sidebar2' );
		}
	}


	$ret = array();
	$ret['sb_layout'] = isset( $sidebar_pos ) ? $sidebar_pos : '';
	$ret['sidebar1'] = isset( $sidebar1 ) ? $sidebar1 : '';
	$ret['sidebar2'] = isset( $sidebar2 ) ? $sidebar2 : '';

	$sb_enabled = $ret['sb_layout'] != 'none';
	$ret['sb1_exists'] = $sb_enabled && is_active_sidebar( $ret['sidebar1'] );
	$ret['sb2_exists'] = $sb_enabled && $ret['sb_layout'] == 'both' && is_active_sidebar( $ret['sidebar2'] );

	$ret['sb_exist'] = $ret['sb1_exists'] || $ret['sb2_exists'];
	$ret['sb_layout_class'] = in_array( $sidebar_pos, array( 'left', 'right' ) ) ? 'single' : ( ( $sidebar_pos === "both" ) ? 'double' : '' );

	return $ret;
}

function prospect_get_page_meta_var( $keys = array() ){
	$p_meta = array();
	if ( isset( $GLOBALS['prospect_page_meta'] ) ) {
		$p_meta = $GLOBALS['prospect_page_meta'];
	} else {
		return false;
	}
	if ( is_string( $keys ) && ! empty( $keys ) ) {
		if ( isset( $p_meta[ $keys ] ) ) {
			return  $p_meta[ $keys ];
		} else {
			return false;
		}
	} else if ( is_array( $keys ) && ! empty( $keys ) ) {
		for ( $i = 0; $i < count( $keys ); $i++ ) {
			if ( isset( $p_meta[ $keys[ $i ] ] ) ) {
				if ( $i < count( $keys ) - 1 ) {
					if ( is_array( $p_meta[ $keys[ $i ] ] ) ) {
						$p_meta = $p_meta[ $keys[ $i ] ];
					} else {
						return false;
					}
				} else {
					return $p_meta[ $keys[ $i ] ];
				}
			} else {
				return false;
			}
		}
	} else {
		return false;
	}
}

function prospect_render_gradient_rules( $args = array() ) {
	extract( shortcode_atts( array(
		'settings' => array(),
		'selectors' => '',
		'use_extra_rules' => false
	), $args));
	$selectors_wth_pseudo = '';
	extract( shortcode_atts( array(
		'first_color' => PROSPECT_THEME_COLOR,
		'second_color' => '#0eecbd',
		'type' => 'linear',
		'angle' => '45',
		'shape_settings' => 'simple',
		'shape' => 'ellipse',
		'size_keyword' => '',
		'size' => ''
	), $settings));
	$out = '';
	$rules = '';
	$border_extra_rules = "border-color: transparent;\n-moz-background-clip: border;\n-webkit-background-clip: border;\nbackground-clip: border-box;\n-moz-background-origin:border;\n-webkit-background-origin:border;\nbackground-origin:border-box;\nbackground-repeat: no-repeat;";
	$transition_extra_rules = "-webkit-transition-property: background, color, border-color, opacity;\n-webkit-transition-duration: 0s, 0s, 0s, 0.6s;\n-o-transition-property: background, color, border-color, opacity;\n-o-transition-duration: 0s, 0s, 0s, 0.6s;\n-moz-transition-property: background, color, border-color, opacity;\n-moz-transition-duration: 0s, 0s, 0s, 0.6s;\ntransition-property: background, color, border-color, opacity;\ntransition-duration: 0s, 0s, 0s, 0.6s;";
	if ( $type == 'linear' ) {
		$rules .= "background: -webkit-linear-gradient(" . $angle . "deg, $first_color, $second_color);";
		$rules .= "background: -o-linear-gradient(" . $angle . "deg, $first_color, $second_color);";
		$rules .= "background: -moz-linear-gradient(" . $angle . "deg, $first_color, $second_color);";
		$rules .= "background: linear-gradient(" . $angle . "deg, $first_color, $second_color);";
	}
	else if ( $type == 'radial' ) {
		if ( $shape_settings == 'simple' ) {
			$rules .= "background: -webkit-radial-gradient(" . ( !empty( $shape ) ? " " . $shape . "," : "" ) . " $first_color, $second_color);";
			$rules .= "background: -o-radial-gradient(" . ( !empty( $shape ) ? " " . $shape . "," : "" ) . " $first_color, $second_color);";
			$rules .= "background: -moz-radial-gradient(" . ( !empty( $shape ) ? " " . $shape . "," : "" ) . " $first_color, $second_color);";
			$rules .= "background: radial-gradient(" . ( !empty( $shape ) ? " " . $shape . "," : "" ) . " $first_color, $second_color);";
		}
		else if ( $shape_settings == 'extended' ) {
			$rules .= "background: -webkit-radial-gradient(" . ( !empty( $size ) ? " " . $size . "," : "" ) . ( !empty( $size_keyword ) ? " " . $size_keyword . "," : "" ) . " $first_color, $second_color);";
			$rules .= "background: -o-radial-gradient(" . ( !empty( $size ) ? " " . $size . "," : "" ) . ( !empty( $size_keyword ) ? " " . $size_keyword . "," : "" ) . " $first_color, $second_color);";
			$rules .= "background: -moz-radial-gradient(" . ( !empty( $size ) ? " " . $size . "," : "" ) . ( !empty( $size_keyword ) ? " " . $size_keyword . "," : "" ) . " $first_color, $second_color);";
			$rules .= "background: radial-gradient(" . ( !empty( $size_keyword ) && !empty( $size ) ? " $size_keyword at $size" : "" ) . " $first_color, $second_color);";
		}
	}
	if ( !empty( $rules ) ) {
		$out .= !empty( $selectors ) ? "$selectors{\n$rules\n}" : $rules;
		if ( $use_extra_rules ) {
			$out .= !empty( $selectors ) ? "$selectors{\n$border_extra_rules\n}" : $border_extra_rules;
			$out .= !empty( $selectors ) ? "\n$selectors{\ncolor: #fff !important;\n}" : "color: #fff !important;";
			if ( !empty( $selectors ) ) {
				$selectors_wth_pseudo = str_replace( array( ":hover" ), "", $selectors );
				if ( !empty( $selectors_wth_pseudo ) ) {
					$out .= "\n$selectors_wth_pseudo{\n$transition_extra_rules\n}";
				}
			}
			else{
				$out .= $transition_extra_rules;
			}
		}
	}
	return preg_replace('/\s+/',' ', $out);
}

function prospect_widgets_init (){
	global $wp_registered_sidebars;
	if ( !array_key_exists( 'page_left_sidebar', $wp_registered_sidebars ) ){
		register_sidebar( array(
			'name' => esc_html__( 'Page Left Sidebar', 'prospect' ),
			'id' => 'page_left_sidebar',
			'before_title'	=> "<h3 class=\"widgettitle\">",
			'after_title'	=> "</h3>"
		));
	}
	if ( !array_key_exists( 'page_right_sidebar', $wp_registered_sidebars ) ){
		register_sidebar( array(
			'name' => esc_html__( 'Page Right Sidebar', 'prospect' ),
			'id' => 'page_right_sidebar',
			'before_title'	=> "<h3 class=\"widgettitle\">",
			'after_title'	=> "</h3>"
		));
	}
	if ( !array_key_exists( 'footer_area', $wp_registered_sidebars ) ){
		register_sidebar( array(
			'name' => esc_html__( 'Footer', 'prospect' ),
			'id' => 'footer_area',
			'before_title'	=> "<h3 class=\"widgettitle\">",
			'after_title'	=> "</h3>"
		));
	}
	$sidebars = prospect_get_option('sidebars');
	if (!empty($sidebars) && function_exists('register_sidebars') ) {
		foreach ($sidebars as $k => $sb) {
			if ( isset( $sb['title'] ) && !empty( $sb['title'] ) ) {
				register_sidebar( array(
				'name' => $sb['title'],
				'id' => strtolower(preg_replace("/[^a-z0-9\-]+/i", "_", $sb['title'])),
				));
			}
		}
	}
}
add_action( 'widgets_init', 'prospect_widgets_init' );

/******************** TESTIMONIAL ********************/

function prospect_testimonial_renderer( $atts ) {
	extract( shortcode_atts( array(
		'thumbnail'		=> null,
		'type_tes'		=> 'default',
		'quote'			=> '',
		'author_name'	=> '',
		'author_status'	=> '',
		'el_class'		=> ''
	), $atts));
	$quote        	= esc_html( $quote );
	$author_name 	= esc_html( $author_name );
	$author_status	= esc_html( $author_status );
	$el_class    	= esc_attr( $el_class );
	$type_tes 		= esc_html( $type_tes );
	ob_start();
	$author_section = '';
	$figure_form_style = 'hexagon';
	if ( !empty( $thumbnail ) ) {
		if ( $type_tes == 'hexagon') {
			$author_section .= "<figure class='author'>";
				if ( !empty( $thumbnail ) ) {
					$thumb_obj = cws_thumb( $thumbnail, array( 'width'=>200, 'height'=>225 , 'crop' => true ), false );
					$thumb_url = isset( $thumb_obj[0] ) ? esc_url( $thumb_obj[0] ) : "";
					if ( isset( $thumb_obj[3] ) ){
						extract( $thumb_obj[3] );
					}
					else{
		                $retina_thumb_exists = false;
		                $retina_thumb_url = '';
					}
					if ( $retina_thumb_exists ) {
						$author_section .= "<div class='figure_container medium " . $figure_form_style . " thumb'><img src='$thumb_url' data-at2x='$retina_thumb_url' alt /><canvas height='225' width='200'></canvas></div>";
					}
					else{
						$author_section .= "<div class='figure_container medium " . $figure_form_style . " thumb'><img src='$thumb_url' data-no-retina alt /><canvas height='225' width='200'></canvas></div>";
					}
				}
				if ( !empty( $author_name ) || !empty( $author_status ) ){
					$author_section .= "<figcaption>";
						$author_section .= !empty( $author_name ) ? "<span class='author_name author_info'>" . esc_html( $author_name ) . "</span>" : "";
						$author_section .= !empty( $author_status ) ? "<span class='author_status author_info'>" . esc_html( $author_status ) . "</span>" : "";
					$author_section .= "</figcaption>";
				}
			$author_section .= "</figure>";
		} else {
			$author_section .= "<div class='author'>";
				$author_section .= !empty( $author_name ) ? "<span class='author_name author_info'>" . esc_html( $author_name ) . "</span>" : "";
				$author_section .= !empty( $author_status ) ? "<span class='author_status author_info'>" . esc_html( $author_status ) . "</span>" : "";			
			$author_section .= "</div>";
		}
	}
	else{
		$author_section .= "<div class='author'>";
			$author_section .= !empty( $author_name ) ? "<span class='author_name author_info'>" . esc_html( $author_name ) . "</span>" : "";
			$author_section .= !empty( $author_status ) ? "<span class='author_status author_info'>" . esc_html( $author_status ) . "</span>" : "";			
		$author_section .= "</div>";
	}
	$quote_section_class = "quote";
	$quote_section_atts = '';
	$quote_section_atts .= !empty( $quote_section_class ) ? " class='" . trim( $quote_section_class ) . "'" : '';
	$quote = esc_html($quote);
	$quote_section = "";
	if ( !empty( $quote ) ){
		$quote_section .= "<div" . ( !empty( $quote_section_atts ) ? $quote_section_atts : "" ) . ">";
			$quote_section .= "<q>$quote</q>";
		$quote_section .= "</div>";
	}
	$thumbnail_props = has_post_thumbnail( ) ? wp_get_attachment_image_src(get_post_thumbnail_id( ),'full') : array();
	$real_thumbnail_dims = array();
	if ( !empty( $thumbnail_props ) && isset( $thumbnail_props[1] ) ) $real_thumbnail_dims['width'] = $thumbnail_props[1];
	if ( !empty(  $thumbnail_props ) && isset( $thumbnail_props[2] ) ) $real_thumbnail_dims['height'] = $thumbnail_props[2];
	$thumbnail_dims = prospect_get_post_thumbnail_dims( $real_thumbnail_dims );
	if (!empty($thumbnail)) {
		$thumb_obj = cws_thumb( $thumbnail, $thumbnail_dims, false );
		$thumb_url = isset( $thumb_obj[0] ) ? esc_url( $thumb_obj[0] ) : "";
		$thumbnail = esc_url($thumbnail);
		$retina_thumb_exists = false;
		$retina_thumb_url = "";
		if ( isset( $thumb_obj[3] ) ){
			extract( $thumb_obj[3] );
		}
	}
	$type_tes_class = '';
	$type_tes_class = (!empty($thumbnail) && $type_tes == 'hexagon') ? 'hexagon' : '';
	?>
		<?php
		echo ('<div class="testimonial prospect_module clearfix ' . ($thumbnail ? 'with_image ' : 'without_image ') . esc_attr($el_class) . esc_attr($type_tes_class) . '">');
		if (!empty($thumbnail)) {
			if ( $type_tes == 'hexagon') {
				echo sprintf("%s", $author_section . $quote_section);
			} else {
				echo "<div class='testimonial_img_container'>";
					if ( $retina_thumb_exists ) {
						echo "<img src='$thumb_url' data-at2x='$retina_thumb_url' alt />";
					}	else {
						echo "<img src='$thumb_url' data-no-retina alt />";
					}
				echo "</div>";
				echo "<div class='testimonial_container'>";
					echo sprintf("%s", $quote_section . $author_section);
				echo "</div>";
			}
		}
		else{
			echo sprintf("%s", $quote_section . $author_section);
		}
		?>
	</div>
	<?php
	return ob_get_clean();
}

/******************** \TESTIMONIAL ********************/

/****************** POST TIME LINE SHORTCODE *******************/
function prospect_posts_timeline_render( $atts = array() ){
extract( shortcode_atts( array(
	'title'				=> '',
	'filter_by'			=> '',
	'cats'				=> array(),
	'tags'				=> array(),
	'post_pp'			=> '4',
	'count'				=> '99',
	'page'				=> '1',
	'hide_data'			=> array(),
	'hide_cat'			=> '',
	'type'				=> 'large_type',
	'chars_count'		=> '70'
), $atts));
$out = "";
$title 				= esc_html( $title );
$post_pp 				= (int)$post_pp;
$count 				= (int)$count;
$chars_count 		= (int)$chars_count;
$hide_cat 			= (bool)$hide_cat;
$type 				= esc_html( $type );

$page = (int)$page;

$title = apply_filters( 'latest_post_title', $title );

$query_args = array(
	'post_type'			=> array( 'post' ),
	'post_status'		=> 'publish',
	'posts_per_page'	=> $post_pp,
	'paged'	=> $page,
	'post__not_in'		=> get_option( 'sticky_posts' )
);
$tax_query = array();
$cat_query_args = array();
$tag_query_args = array();
if ( in_array( $filter_by, array( 'cat', 'cat_tag' ) ) ){
	$cat_tax = 'category';
	$cat_terms = $cats;
	if ( !empty( $cat_terms ) ){
		array_push( $cat_query_args, array(
			'taxonomy'	=> $cat_tax,
			'field'			=> 'slug',
			'terms'			=> $cat_terms
		));
	}
}
if ( in_array( $filter_by, array( 'tag', 'cat_tag' ) ) ){
	$tag_tax = 'post_tag';
	$tag_terms = $tags;
	if ( !empty( $tag_terms ) ){
		array_push( $tag_query_args, array(
			'taxonomy'	=> $tag_tax,
			'field'			=> 'slug',
			'terms'			=> $tag_terms
		));
	}
}
if ( !empty( $cat_query_args ) && !empty( $tag_query_args ) ){
	$tax_query['relation'] = 'OR';
}
$tax_query = array_merge( $tax_query, $cat_query_args, $tag_query_args );
if ( !empty( $tax_query ) ){
	$query_args['tax_query'] = $tax_query;
}

$q = new WP_Query( $query_args );

$latest_post_styles = "";

if ( !empty( $latest_post_styles ) ){
	echo "<style type='text/css'>$latest_post_styles</style>";
}

$post_list_classes = 'post_list latest_post_post_list';
$figure_form_style = 'hexagon';
echo "<div class='$post_list_classes $type'>";
echo "<div class='latest_post_list_start'>" . prospect_figure_style() . "</div>";
$post_pper = 0;
$canvas_height = '';
if ( $type == 'large_type'){
	if ( $figure_form_style == 'hexagon' ) { 
		$canvas_height = "135";
	} else if ( $figure_form_style == 'pentagon' ) {
		$canvas_height = "110";
	} else if ( $figure_form_style == 'triangle' ) {
		$canvas_height = "115";
	}
} else if ( $type == 'small_type') {
	if ( $figure_form_style == 'hexagon' ) { 
		$canvas_height = "65";
	} else if ( $figure_form_style == 'pentagon' ) {
		$canvas_height = "65";
	} else if ( $figure_form_style == 'triangle' ) {
		$canvas_height = "65";
	}
}
	
echo "<div class='posts_time_line_wrap'>";
while ( $q->have_posts() ):
	$q->the_post();
	$found_post = $q->found_posts;

	$max_paged = $found_post > $count ? ceil( $count / $post_pp ) : ceil( $found_post / $post_pp );

	$pid = get_the_id();
	$cur_post = get_post( $pid );
	$permalink = esc_url(get_permalink());
	echo "<article class='post latest_post_post clearfix block_show'>";
		$has_img = has_post_thumbnail( $pid );
		$thumb_props = wp_get_attachment_image_src( get_post_thumbnail_id( $pid ), 'full' );
		$thumb = $thumb_props[0];
		$retina_thumb_exists = false;
		$retina_thumb_url = "";
		if ( $type == 'large_type') {
			$thumb_obj = cws_thumb( $thumb, array( 'width' => 120, 'height' => 135 , 'crop' => true ), false );
		} else if ( $type == 'small_type') {
			$thumb_obj = cws_thumb( $thumb, array( 'width' => 60, 'height' => 65 , 'crop' => true  ), false );
		}
		
		$thumb_url = isset( $thumb_obj[0] ) ? esc_url($thumb_obj[0]) : "";	
		if ( isset( $thumb_obj[3] ) ){
			extract( $thumb_obj[3] );
		}
		$thumb_url = esc_url( $thumb_url );			
		$retina_thumb_url = esc_url( $retina_thumb_url );		
		if ( $type == 'large_type') {					
			echo "<div class='post_media latest_post_post_media'>";
				echo "<div class='figure_container small " . $figure_form_style . "'>" . prospect_figure_style();
					echo "<a class='link fa fa-share' href='$permalink'>" . prospect_figure_style() . "</a>";
					if ( $has_img ){
						if ( $retina_thumb_exists ) {
							echo "<img src='$thumb_url' data-at2x='$retina_thumb_url' alt /><canvas height='" . $canvas_height . "' width='120'></canvas>";
						}
						else{
							echo "<img src='$thumb_url' data-no-retina alt /><canvas height='" . $canvas_height . "' width='120'></canvas>";
						}
					} else {
						echo "<div class='figure_dummy'>" . prospect_figure_style() . "</div>";
					}
				echo "</div>";
			echo "</div>";
		} else if ( $type == 'small_type') {
			echo "<div class='post_date latest_post_post_date'>";
				echo "<a href='$permalink' class='center_figure_wrap'>" . prospect_figure_style(); 
					echo "<div class='center_figure'>" . prospect_figure_style() . "</div>";
					$date = get_the_time( "M j, Y" );
					if ( !empty( $date ) ) {
						echo "<div class='date'>" . $date . "</div>";
					}
				echo "</a>";
			echo "</div>";
		}
		$post_data = "";
		ob_start();
		if ( $type == 'small_type' && !empty($thumb_url) ) {
			echo "<div class='post_media latest_post_post_media'>";
				echo "<div class='figure_container mini2 " . $figure_form_style . "'>";
					if ( $retina_thumb_exists ) {
						echo "<img src='$thumb_url' data-at2x='$retina_thumb_url' alt /><canvas height='" . $canvas_height . "' width='60'></canvas>";
					}
					else{
						echo "<img src='$thumb_url' data-no-retina alt /><canvas height='" . $canvas_height . "' width='60'></canvas>";
					}
				echo "</div>";
			echo "</div>";
		}
		if ( $type == 'small_type'){
			echo "<div class='post_content_wrap'>";
		}
			$post_title = esc_html( get_the_title() );
			if ( !empty( $post_title ) ){
				echo "<h5 class='post_title latest_post_post_title'>";
					echo "<a href='$permalink'>" . $post_title;
					echo "</a>";
				echo "</h5>";
			}
			if ( $type == 'large_type'){
				$date = get_the_time( get_option("date_format") );
				if ( !empty( $date ) ) {
					echo "<div class='date'>" . $date . "</div>";
				}
			}
			$terms = $cats = $tags = "";
			if ( !in_array( 'cats', $hide_data ) ){
				$cats = prospect_get_post_term_links_str( 'category' );
			}
			if ( !in_array( 'tags', $hide_data ) ){
				$tags = prospect_get_post_term_links_str( 'post_tag' );
			}
			$terms .= $cats;
			$terms .= !empty( $cats ) && !empty( $terms ) ? "<br />" : "";
			$terms .= $tags;
			if ( !$hide_cat ) {
				echo !empty( $terms ) ? "<div class='post_terms latest_post_post_terms'>$terms</div>" : "";
			};
			if ( !in_array( 'desc', $hide_data ) ){
				$desc = !empty( $cur_post->post_excerpt ) ? wptexturize( $cur_post->post_excerpt ) : "";
				$desc = empty( $desc ) ? wptexturize( strip_shortcodes( strip_tags($cur_post->post_content) ) ) : $desc;
				$desc = substr( $desc, 0, $chars_count );
				$desc = esc_html( $desc );
				echo !empty( $desc ) ? "<p class='post_desc latest_post_post_desc'>$desc</p>" : ""; 
			}
		if ( $type == 'small_type'){
			echo "</div>";
		}
		$post_data = ob_get_clean();
		echo !empty( $post_data ) ? "<div class='post_data latest_post_post_data'>$post_data</div>" : "";	
	echo "</article>";
	endwhile;
	echo "</div>";
	wp_reset_postdata();
	echo "<a class='latest_post_list_more prospect_load_more_time_line' href='#'>" . prospect_figure_style() . "<span>MORE NEWS</span></a>";	
	prospect_loader_html();

	$ajax_data['post_type']	= 'post';
	$ajax_data['title'] =  $title;
	$ajax_data['filter_by'] =  $filter_by;
	$ajax_data['cats'] =  esc_html($cats);
	$ajax_data['tags'] =  $tags;

	$ajax_data['post_pp'] =  $post_pp;
	$ajax_data['max_paged']	= $max_paged;
	$ajax_data['count'] =  $count;
	$ajax_data['page'] =  $page;

	$ajax_data['hide_data'] =  $hide_data;
	$ajax_data['hide_cat'] =  $hide_cat;
	$ajax_data['type'] =  $type;
	$ajax_data['chars_count'] =  $chars_count;

	$ajax_data_str = json_encode( $ajax_data );
	echo "<form class='posts_grid_data'>";
		echo "<input type='hidden' class='posts_grid_ajax_data' name='timeline_ajax_data' value='$ajax_data_str' />";
	echo "</form>";
	echo "<div class='latest_post_list_end'>" . prospect_figure_style() . "</div>";

	echo "</div>";	
}

function prospect_posts_timeline (){
	extract( wp_parse_args( $_POST['data'], array(
		'post_pp'			=> '4',
		'count'				=> '99',
		'page'				=> '1',
	)));
	prospect_posts_timeline_render($_POST['data']);
}	
add_action( 'wp_ajax_prospect_posts_timeline', 'prospect_posts_timeline' );
add_action( 'wp_ajax_nopriv_prospect_posts_timeline', 'prospect_posts_timeline' );

/****************** /POST TIME LINE SHORTCODE *******************/
/****************** POSTS GRID AJAX *******************/
function prospect_posts_grid_dynamic_pagination (){
	extract( wp_parse_args( $_POST['data'], array(
		'section_id'				=> '',
		'post_type' 				=> '',
		'post_hide_meta'			=> array(),
		'cws_portfolio_data_to_show'=> '',
		'cws_staff_data_to_hide'	=> array(),
		'layout'					=> '1',
		'chars_count'				=> '200',
		'sb_layout'					=> '',
		'total_items_count'			=> get_option( 'posts_per_page' ),
		'items_pp'					=> get_option( 'posts_per_page' ),
		'page'						=> '1',
		'tax'						=> '',
		'terms'						=> array(),
		'filter'					=> 'false',
		'current_filter_val'		=> '',
		'req_page_url'				=> '',
		'addl_query_args'			=> array(),
		'portfolio_style' => ''
	)));
	$req_page = $page;
	if ( !empty( $req_page_url ) ){
		$match = preg_match( "#paged?(=|/)(\d+)#", $req_page_url, $matches );
		$req_page = $match ? $matches[2] : '1';								// if page parameter absent show first page 
	};
	$not_in = ( 1 == $req_page ) ? array() : get_option( 'sticky_posts' );
	$query_args = array('post_type'			=> array( $post_type ),
						'post_status'		=> 'publish',
						'post__not_in'		=> $not_in
						);
	$query_args['posts_per_page']		= $items_pp;
	$query_args['paged']				= $req_page;
	if ( $filter == 'true' && $current_filter_val != '_all_' && !empty( $current_filter_val ) ){
		$terms = array( $current_filter_val );
	}
	if ( !empty( $terms ) ){
		$query_args['tax_query'] = array(
			array(
				'taxonomy'		=> $tax,
				'field'			=> 'slug',
				'terms'			=> $terms
			)
		);
	}
	if ( in_array( $post_type, array( "cws_portfolio", "cws_staff" ) ) ){
		$query_args['orderby'] 	= "menu_order date title";
		$query_args['order']	= "ASC";
	}
	$query_args = array_merge( $query_args, $addl_query_args );
	$q = new WP_Query( $query_args );
	$found_posts = $q->found_posts;
	$max_paged = $found_posts > $total_items_count ? ceil( $total_items_count / $items_pp ) : ceil( $found_posts / $items_pp );
	$GLOBALS['prospect_posts_grid_atts'] = array(
		'layout'					=> $layout,
		'sb_layout'					=> $sb_layout,
		'post_hide_meta'			=> $post_hide_meta,
		'cws_portfolio_data_to_show'=> $cws_portfolio_data_to_show,
		'cws_staff_data_to_hide'	=> $cws_staff_data_to_hide,
		'total_items_count'			=> $total_items_count,
		'chars_count'				=> $chars_count,
		'portfolio_style'			=> $portfolio_style,

	);
	if ( function_exists( "prospect_{$post_type}_posts_grid_posts" ) ){
		call_user_func_array( "prospect_{$post_type}_posts_grid_posts", array( $q ) );
	}
	unset ( $GLOBALS['prospect_posts_grid_atts'] );
	prospect_pagination ( $req_page, $max_paged );
	echo "<input type='hidden' id='{$section_id}_dynamic_pagination_page_number' name='{$section_id}_dynamic_pagination_page_number' class='prospect_posts_grid_dynamic_pagination_page_number' value='$req_page' />";
	wp_die();
}	
add_action( 'wp_ajax_prospect_posts_grid_dynamic_pagination', 'prospect_posts_grid_dynamic_pagination' );
add_action( 'wp_ajax_nopriv_prospect_posts_grid_dynamic_pagination', 'prospect_posts_grid_dynamic_pagination' );

function prospect_posts_grid_dynamic_filter (){
	extract( wp_parse_args( $_POST['data'], array(
		'section_id'				=> '',
		'post_type' 				=> '',
		'post_hide_meta'			=> array(),
		'cws_portfolio_data_to_show'=> '',
		'cws_staff_data_to_hide'	=> array(),
		'layout'					=> '1',
		'chars_count'				=> '200',
		'sb_layout'					=> '',
		'total_items_count'			=> get_option( 'posts_per_page' ),
		'items_pp'					=> get_option( 'posts_per_page' ),
		'page'						=> '1',
		'portfolio_style'			=> '',
		'tax'						=> '',
		'terms'						=> array(),
		'filter'					=> 'false',
		'current_filter_val'		=> '',
		'addl_query_args'			=> array()
	)));
	$not_in = ( 1 == $req_page ) ? array() : get_option( 'sticky_posts' );
	$query_args = array('post_type'			=> array( $post_type ),
						'post_status'		=> 'publish',
						'post__not_in'		=> $not_in
						);
	$query_args['posts_per_page']		= $items_pp;
	$query_args['paged']		= $page;
	if ( $current_filter_val != '_all_' && !empty( $current_filter_val ) ){
		$terms = array( $current_filter_val );
	}
	if ( !empty( $terms ) ){
		$query_args['tax_query'] = array(
			array(
				'taxonomy'		=> $tax,
				'field'			=> 'slug',
				'terms'			=> $terms
			)
		);
	}
	if ( in_array( $post_type, array( "cws_portfolio", "cws_staff" ) ) ){
		$query_args['orderby'] 	= "menu_order date title";
		$query_args['order']	= "ASC";
	}
	$query_args = array_merge( $query_args, $addl_query_args );
	$q = new WP_Query( $query_args );
	$found_posts = $q->found_posts;
	$max_paged = $found_posts > $total_items_count ? ceil( $total_items_count / $items_pp ) : ceil( $found_posts / $items_pp );
	$is_pagination = $max_paged > 1;	
	$GLOBALS['prospect_posts_grid_atts'] = array(
		'layout'						=> $layout,
		'sb_layout'						=> $sb_layout,
		'post_hide_meta'				=> $post_hide_meta,
		'cws_portfolio_data_to_show'	=> $cws_portfolio_data_to_show,
		'cws_staff_data_to_hide'		=> $cws_staff_data_to_hide,
		'total_items_count'				=> $total_items_count,
		'chars_count'					=> $chars_count,
		'portfolio_style'				=> $portfolio_style
		);
	if ( function_exists( "prospect_{$post_type}_posts_grid_posts" ) ){
		call_user_func_array( "prospect_{$post_type}_posts_grid_posts", array( $q ) );
	}
	unset ( $GLOBALS['prospect_posts_grid_atts'] );
	if ( $is_pagination ){
		prospect_pagination ( $page, $max_paged );
	}
	wp_die();
}	
add_action( 'wp_ajax_prospect_posts_grid_dynamic_filter', 'prospect_posts_grid_dynamic_filter' );
add_action( 'wp_ajax_nopriv_prospect_posts_grid_dynamic_filter', 'prospect_posts_grid_dynamic_filter' );

/****************** \POSTS GRID AJAX ******************/

function prospect_get_page_title (){
	$text['home']		= esc_html__( 'Home', 'prospect' ); // text for the 'Home' link
	$text['category']	= esc_html__( 'Category "%s"', 'prospect' ); // text for a category page
	$text['search']		= esc_html__( 'Search for "%s"', 'prospect' ); // text for a search results page
	$text['taxonomy']	= esc_html__( 'Archive by %s "%s"', 'prospect' );
	$text['tag']		= esc_html__( 'Posts Tagged "%s"', 'prospect' ); // text for a tag page
	$text['author']		= esc_html__( 'Articles Posted by %s', 'prospect' ); // text for an author page
	$text['404']		= esc_html__( 'Error 404', 'prospect' ); // text for the 404 page
	$page_title = "";
	if ( is_404() ) {
		$page_title = '';
	} else if ( is_search() ) {
		$page_title = esc_html__( 'Search', 'prospect' );
	} else if ( is_front_page() ) {
		$page_title = esc_html__( 'Home', 'prospect' );
	} else if ( is_category() ) {
		$cat = get_category( get_query_var( 'cat' ) );
		$cat_name = isset( $cat->name ) ? $cat->name : '';
		$page_title = sprintf( $text['category'], $cat_name );
	} else if ( is_tag() ) {
		$page_title = sprintf( $text['tag'], single_tag_title( '', false ) );
	} elseif ( is_day() ) {
		echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
		echo sprintf( $link, get_month_link( get_the_time( 'Y' ),get_the_time( 'm' ) ), get_the_time( 'F' ) ) . $delimiter;
		$page_title = get_the_time( 'd' );
	} elseif ( is_month() ) {
		$page_title = get_the_time( 'F' );
	} elseif ( is_year() ) {
		$page_title = get_the_time( 'Y' );
	} elseif ( has_post_format() && ! is_singular() ) {
		$page_title = get_post_format_string( get_post_format() );
	} else if ( is_tax( array( 'cws_portfolio_cat', 'cws_staff_member_department', 'cws_staff_member_position' ) ) ) {
		$tax_slug = get_query_var( 'taxonomy' );
		$term_slug = get_query_var( $tax_slug );
		$tax_obj = get_taxonomy( $tax_slug );
		$term_obj = get_term_by( 'slug', $term_slug, $tax_slug );
		$singular_tax_label = isset( $tax_obj->labels ) && isset( $tax_obj->labels->singular_name ) ? $tax_obj->labels->singular_name : '';
		$term_name = isset( $term_obj->name ) ? $term_obj->name : '';
		$page_title = $singular_tax_label . ' ' . $term_name ;
	} elseif ( function_exists ( 'is_shop' ) && is_shop() ) {
		$page_title = woocommerce_page_title(false);		
	} elseif ( is_archive() ) {
		$post_type = get_post_type();
		$post_type_obj = get_post_type_object( $post_type );
		$post_type_name = isset( $post_type_obj->label ) ? $post_type_obj->label : '';
		$page_title = $post_type_name ;
	} else if ( is_post_type_archive( 'cws_portfolio' ) ) {
		$portfolio_slug = prospect_get_option('portfolio_slug');
		$post_type = get_post_type();
		$post_type_obj = get_post_type_object( $post_type );
		$post_type_name = isset( $post_type_obj->labels->menu_name ) ? $post_type_obj->labels->menu_name : '';
		$page_title = !empty($portfolio_slug) ? $portfolio_slug : $post_type_name ;
	}else if ( is_post_type_archive( 'cws_staff' ) ) {
		$stuff_slug = prospect_get_option('staff_slug');
		$post_type = get_post_type();
		$post_type_obj = get_post_type_object( $post_type );
		$post_type_name = isset( $post_type_obj->labels->menu_name ) ? $post_type_obj->labels->menu_name : '';
		$page_title = !empty($stuff_slug) ? $stuff_slug : $post_type_name ;
	}else {
		$blog_title = prospect_get_option('blog_title');
		$page_title = (!is_page() && !empty($blog_title)) ? $blog_title : get_the_title();
	}
	return $page_title;
}

add_action( 'after_setup_theme', 'prospect_after_setup_theme' );
function prospect_after_setup_theme() {
	add_editor_style();
}
add_filter( 'mce_buttons_2', 'prospect_mce_buttons_2' );
function prospect_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'tiny_mce_before_init', 'prospect_tiny_mce_before_init' );
function prospect_tiny_mce_before_init( $settings ) {
	$settings['theme_advanced_blockformats'] = 'p,h1,h2,h3,h4';
	$style_formats = array(
		array( 'title' => 'Title', 'block' => 'h3', 'classes' => 'widgettitle' ),
		array( 'title' => 'Font-Size', 'items' => array(
			array( 'title' => '42px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-size' => '42px' , 'line-height' => '1.2em') ),
			array( 'title' => '28px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-size' => '28px' , 'line-height' => '1.4em') ),
			array( 'title' => '24px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-size' => '24px' , 'line-height' => '1.4em') ),
			array( 'title' => '20px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-size' => '20px' , 'line-height' => '1.4em') ),
			array( 'title' => '18px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-size' => '18px' , 'line-height' => '1.4em') ),
			array( 'title' => '16px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-size' => '16px' , 'line-height' => '1.4em') ),
			array( 'title' => '15px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-size' => '15px' , 'line-height' => '1.6em') ),
			array( 'title' => '14px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-size' => '14px' , 'line-height' => '1.64em') ),
			array( 'title' => '13px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-size' => '13px' , 'line-height' => '1.54em') ),
			)
		),
		array( 'title' => 'Font-Weight', 'items' => array(
			array( 'title' => '200', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-weight' => '200' ) ),
			array( 'title' => '300', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-weight' => '300' ) ),
			array( 'title' => '400', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-weight' => '400' ) ),
			array( 'title' => '500', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-weight' => '500' ) ),
			array( 'title' => '600', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em', 'styles' => array( 'font-weight' => '600' ) ),
			)
		),
		array( 'title' => 'Margin-Top', 'items' => array(
			array( 'title' => '0px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-top' => '0' ) ),
			array( 'title' => '10px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-top' => '10px' ) ),
			array( 'title' => '15px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-top' => '15px' ) ),
			array( 'title' => '20px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-top' => '20px' ) ),
			array( 'title' => '25px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-top' => '25px' ) ),
			array( 'title' => '30px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-top' => '30px' ) ),
			array( 'title' => '40px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-top' => '40px' ) ),
			array( 'title' => '50px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-top' => '50px' ) ),
			array( 'title' => '60px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-top' => '60px' ) ),
			)
		),
		array( 'title' => 'Margin-Bottom', 'items' => array(
			array( 'title' => '0px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-bottom' => '0px' ) ),
			array( 'title' => '10px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-bottom' => '10px' ) ),
			array( 'title' => '15px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-bottom' => '15px' ) ),
			array( 'title' => '20px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-bottom' => '20px' ) ),
			array( 'title' => '25px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-bottom' => '25px' ) ),
			array( 'title' => '30px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-bottom' => '30px' ) ),
			array( 'title' => '40px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-bottom' => '40px' ) ),
			array( 'title' => '50px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-bottom' => '50px' ) ),
			array( 'title' => '60px', 'selector' => 'h1,h2,h3,h4,h5,h6,p,span,i,b,strong,em,div,hr', 'styles' => array( 'margin-bottom' => '60px' ) ),
			)
		),
		array(
			'title' => 'Horizontal line', 'block' => 'hr', 'items' => array(
				array( 'title' => 'Simple',			'selector' => 'hr:not(.thin):not(.short):not(.short_simple):not(.short_thin)', 			'classes' => 'simple' ),
				array( 'title' => 'Thin',			'selector' => 'hr:not(.simple):not(.short):not(.short_simple):not(.short_thin)', 		'classes' => 'thin' ),
				array( 'title' => 'Short', 			'selector' => 'hr:not(.simple):not(.thin):not(.short_simple):not(.short_thin)', 		'classes' => 'short' ),
				array( 'title' => 'Short Simple', 	'selector' => 'hr:not(.simple):not(.thin):not(.short):not(.short_thin)', 'classes' => 	'short_simple' ),
				array( 'title' => 'Short Thin', 	'selector' => 'hr:not(.simple):not(.thin):not(.short):not(.short_simple)', 'classes' =>	'short_thin' )	
			)
	 	),
		array( 'title' => 'Borderless image', 'selector' => 'img', 'classes' => 'noborder' ),
	);
	// Before 3.1 you needed a special trick to send this array to the configuration.
	// See this post history for previous versions.
	$settings['style_formats'] = str_replace( '"', "'", json_encode( $style_formats ) );
	return $settings;
}

/* POSTS GRID */
function prospect_posts_grid ( $atts = array(), $content = "" ){
	$out = "";
	$defaults = array(
		'title'									=> '',
		'title_align'							=> 'left',
		'post_type'								=> '',
		'total_items_count'						=> '',
		'cws_portfolio_layout'					=> 'def',
		'cws_portfolio_show_data_override'		=> false,
		'cws_portfolio_data_to_show'			=> '',
		'cws_staff_layout'						=> 'def',
		'cws_staff_hide_meta_override'			=> false,			
		'cws_staff_data_to_hide'				=> '',
		'portfolio_style'						=> '',
		'display_style'							=> 'grid',
		'select_filter'							=> '',
		'carousel_pagination'					=> '',
		'items_pp'								=>  esc_html( get_option( 'posts_per_page' ) ),
		'paged'									=> 1,
		'tax'									=> '',
		'terms'									=> '',
		'chars_count'							=> '200',
		'addl_query_args'						=> array(),
		'el_class'								=> ''
	);
	$atts = shortcode_atts( $defaults, $atts );
	extract( $atts );
	$portfolio_style = esc_html($portfolio_style);
	$portfolio_fig_style =  (($portfolio_style == 'hex_style') || ($portfolio_style == 'hex_style_titles'));
	$section_id = uniqid( 'posts_grid_' );
	$ajax_data = array();
	$total_items_count = !empty( $total_items_count ) ? (int)$total_items_count : PHP_INT_MAX;
	$items_pp = !empty( $items_pp ) ? (int)$items_pp : esc_html( get_option( 'posts_per_page' ) );
	$paged = (int)$paged;
	$select_filter = (bool)$select_filter;
	$carousel_pagination = (bool)$carousel_pagination;

	$def_cws_portfolio_layout = prospect_get_option( 'def_cws_portfolio_layout' );
	$def_cws_portfolio_layout = isset( $def_cws_portfolio_layout ) ? $def_cws_portfolio_layout : "";
	$cws_portfolio_layout = ( empty( $cws_portfolio_layout ) || $cws_portfolio_layout === "def" ) ? $def_cws_portfolio_layout : $cws_portfolio_layout; 
	$cws_portfolio_show_data_override = !empty( $cws_portfolio_show_data_override ) ? true : false;
	$cws_portfolio_data_to_show = explode( ",", $cws_portfolio_data_to_show );
	$cws_portfolio_def_data_to_show = prospect_get_option( 'def_cws_portfolio_data_to_show' );
	$cws_portfolio_def_data_to_show  = isset( $cws_portfolio_def_data_to_show ) ? $cws_portfolio_def_data_to_show : array();
	$cws_portfolio_data_to_show = $cws_portfolio_show_data_override ? $cws_portfolio_data_to_show : $cws_portfolio_def_data_to_show;

	$def_cws_staff_layout = prospect_get_option( 'def_cws_staff_layout' );
	$def_cws_staff_layout = isset( $def_cws_staff_layout ) ? $def_cws_staff_layout : "";
	$cws_staff_layout = ( empty( $cws_staff_layout ) || $cws_staff_layout === "def" ) ? $def_cws_staff_layout : $cws_staff_layout; 
	$cws_staff_hide_meta_override = !empty( $cws_staff_hide_meta_override ) ? true : false;
	$cws_staff_data_to_hide = explode( ",", $cws_staff_data_to_hide );
	$cws_staff_def_data_to_hide = prospect_get_option( 'def_cws_staff_data_to_hide' );
	$cws_staff_def_data_to_hide  = isset( $cws_staff_def_data_to_hide ) ? $cws_staff_def_data_to_hide : array();
	$cws_staff_data_to_hide = $cws_staff_hide_meta_override ? $cws_staff_data_to_hide : $cws_staff_def_data_to_hide;	

	$el_class = esc_attr( $el_class );
	$sb = prospect_get_sidebars();
	$sb_layout = isset( $sb['sb_layout_class'] ) ? $sb['sb_layout_class'] : '';	
	$layout = "1";
	$post_type_obj = get_post_type_object( $post_type );
	switch ( $post_type ){
		case "cws_portfolio":
			$layout = $cws_portfolio_layout;
			break;
		case "cws_staff":
			$layout = $cws_staff_layout;
			break;
	}
	$terms = explode( ",", $terms );	
	$terms_temp = array();
	foreach ( $terms as $term ) {
		if ( !empty( $term ) ){
			if(strrpos($term, ') ')){
				$term = str_replace(substr($term, 0, strrpos($term, ') ') + 2), "", $term); 
			}
			array_push( $terms_temp, $term );
		}
	}
	$terms = $terms_temp;
	$all_terms = array();
	$all_terms_temp = !empty( $tax ) ? get_terms( $tax ) : array();
	$all_terms_temp = !is_wp_error( $all_terms_temp ) ? $all_terms_temp : array();
	foreach ( $all_terms_temp as $term ){
		array_push( $all_terms, $term->slug );
	}
	$terms = !empty( $terms ) ? $terms : $all_terms;
	$not_in = (1 == $paged) ? array() : get_option( 'sticky_posts' );
	$query_args = array('post_type'			=> array( $post_type ),
						'post_status'		=> 'publish',
						'post__not_in'		=> $not_in
						);
	if ( in_array( $display_style, array( 'grid', 'filter' ) ) ){
		$query_args['posts_per_page']		= $items_pp;
		$query_args['paged']		= $paged;
	}
	else{
		$query_args['nopaging']				= true;
		$query_args['posts_per_page']		= -1;
	}
	if ( !empty( $terms ) ){
		$query_args['tax_query'] = array(
			array(
				'taxonomy'		=> $tax,
				'field'			=> 'slug',
				'terms'			=> $terms
			)
		);
	}
	if ( in_array( $post_type, array( "cws_portfolio", "cws_staff" ) ) ){
		$query_args['orderby'] 	= "menu_order date title";
		$query_args['order']	= "ASC";
	}
	$query_args = array_merge( $query_args, $addl_query_args );
	$q = new WP_Query( $query_args );
	$found_posts = $q->found_posts;
	$requested_posts = $found_posts > $total_items_count ? $total_items_count : $found_posts;
	$max_paged = $found_posts > $total_items_count ? ceil( $total_items_count / $items_pp ) : ceil( $found_posts / $items_pp );
	$cols = in_array( $layout, array( 'medium', 'small' ) ) ? 1 : (int)$layout;
	$is_carousel = $display_style == 'carousel' && $requested_posts > $cols;
	wp_enqueue_script( 'fancybox' );
	$is_filter = in_array( $display_style, array( 'filter' ) ) && !empty( $terms ) ? true : false;
	$filter_vals = array();
	$use_pagination = in_array( $display_style, array( 'grid', 'filter' ) ) && $max_paged > 1;
	$pagination_type = "pagination";
	if ( !$is_filter && in_array( $layout, array( '2', '3', '4' ) ) ){
		$pagination_type = "load_more";
	}
	$dynamic_content = $is_filter || $use_pagination;
	if ( $is_carousel ){
		wp_enqueue_script( 'owl_carousel' );
	}
	else if ( in_array( $layout, array( "2", "3", "4" ) ) || $dynamic_content ){
		wp_enqueue_script( 'isotope' );
	}
	if ( $dynamic_content ){
		wp_enqueue_script( 'owl_carousel' ); // for dynamically loaded gallery posts
		wp_enqueue_script( 'images_loaded' );
	}
	ob_start ();
	$filter = $select_filter ? " select_filter" : " simple_filter";
	$classes = $carousel_pagination ? " carousel_pagination" : "";
	$hex_class = $portfolio_fig_style ? " hexagon_grid" : "";
	$isotope_style = !$portfolio_fig_style ? " isotope" : "";
	echo "<section id='$section_id' class='posts_grid {$post_type}_posts_grid posts_grid_{$layout} posts_grid_{$display_style}" . ( $dynamic_content ? " dynamic_content" : "" ) . ( !empty( $el_class ) ? " $el_class" : "" ) . $hex_class . $filter . " '>";
		if ( $is_carousel ){
			echo "<div class='widget_header clearfix'>";
				echo !empty( $title ) ? "<h2 class='widgettitle'>" . esc_html( $title ) . "</h2>" : "";		
				if ( !$carousel_pagination ) {
					echo "<div class='carousel_nav'>";
						echo "<span class='prev'>";
						echo "</span>";
						echo "<span class='next'>";
						echo "</span>";
					echo "</div>";	
				}		
				
			echo "</div>";			
		}
		else if ( $is_filter && count( $terms ) > 1 ){
			foreach ( $terms as $term ) {
				if ( empty( $term ) ) continue;
				$term_obj = get_term_by( 'slug', $term, $tax );
				if ( empty( $term_obj ) ) continue;
				$term_name = $term_obj->name;
				$filter_vals[$term] = $term_name;
			}
			if ( $filter_vals > 1 ){
				echo !empty( $title ) ? "<h2 class='widgettitle'>" . esc_html( $title ) . "</h2>" : "";
				echo "<ul class='filter_wrap'>";
					echo "<li data-filter='_all_' class='filter active'>All</li>";
					foreach ( $filter_vals as $term_slug => $term_name ){
						echo "<li data-filter='" . esc_html( $term_slug ) . "' class='filter'>" . esc_html( $term_name ) . "</li>";
					}
				echo "</ul>";
				echo "<select class='filter'>";
					echo "<option value='_all_' selected>" . esc_html__( 'All', 'prospect' ) . "</option>";
					foreach ( $filter_vals as $term_slug => $term_name ){
						echo "<option value='" . esc_html( $term_slug ) . "'>" . esc_html( $term_name ) . "</option>";
					}
				echo "</select>";
			}
			else{
				echo !empty( $title ) ? "<h2 class='widgettitle text_align{$title_align}'>" . esc_html( $title ) . "</h2>" : "";				
			}
		}
		else{
			echo !empty( $title ) ? "<h2 class='widgettitle text_align{$title_align}'>" . esc_html( $title ) . "</h2>" : "";
		}
		echo "<div class='prospect_wrapper'>";
			echo "<div class='" . ( $is_carousel ? "prospect_carousel" : "prospect_grid" . ( ( in_array( $layout, array( "2", "3", "4" ) ) || $dynamic_content ) ? $isotope_style : "" ) ) . $classes .  "'" . ( $is_carousel ? " data-cols='" . ( !is_numeric( $layout ) ? "1" : $layout ) . "'" : "" ) . ">";
				$GLOBALS['prospect_posts_grid_atts'] = array(
					'layout'						=> $layout,
					'sb_layout'						=> $sb_layout,
					'cws_portfolio_data_to_show'	=> $cws_portfolio_data_to_show,
					'cws_staff_data_to_hide'		=> $cws_staff_data_to_hide,
					'portfolio_style'				=> $portfolio_style,
					'total_items_count'				=> $total_items_count,
					'chars_count'					=> $chars_count,
					);
				if ( function_exists( "prospect_{$post_type}_posts_grid_posts" ) ){
					call_user_func_array( "prospect_{$post_type}_posts_grid_posts", array( $q ) );
				}
				unset( $GLOBALS['prospect_posts_grid_atts'] );
			echo "</div>";
			if ( $dynamic_content ){
				prospect_loader_html();
			}
		echo "</div>";
		if ( $use_pagination ){
			if ( $pagination_type == 'load_more' ){
				prospect_load_more ();
			}
			else{
				prospect_pagination ( $paged, $max_paged );
			}
		}
		if ( $dynamic_content ){
			$ajax_data['section_id']						= $section_id;
			$ajax_data['post_type']							= $post_type;
			$ajax_data['cws_portfolio_data_to_show']		= $cws_portfolio_data_to_show;
			$ajax_data['cws_staff_data_to_hide']			= $cws_staff_data_to_hide;
			$ajax_data['layout']							= $layout;
			$ajax_data['chars_count']						= $chars_count;
			$ajax_data['sb_layout']							= $sb_layout;
			$ajax_data['total_items_count']					= $total_items_count;
			$ajax_data['items_pp']							= $items_pp;
			$ajax_data['page']								= $paged;
			$ajax_data['max_paged']							= $max_paged;
			$ajax_data['tax']								= $tax;
			$ajax_data['terms']								= $terms;
			$ajax_data['filter']							= $is_filter;
			$ajax_data['current_filter_val']				= '_all_';
			$ajax_data['addl_query_args']					= $addl_query_args;
			$ajax_data['portfolio_style']				= $portfolio_style;
			$ajax_data_str = json_encode( $ajax_data );
			echo "<form id='{$section_id}_data' class='posts_grid_data'>";
				echo "<input type='hidden' id='{$section_id}_ajax_data' class='posts_grid_ajax_data' name='{$section_id}_ajax_data' value='$ajax_data_str' />";
			echo "</form>";
		}
	echo "</section>";
	$out = ob_get_clean();
	return $out;
}
/* \POSTS GRID */

/*	Visual Composer Overrides */

if ( prospect_check_for_plugin( 'cws-megamenu/cws-megamenu.php' ) && prospect_check_for_plugin( 'js_composer/js_composer.php' ) ){
	function vc_theme_vc_column ( $atts = array(), $content = "" ){
	    /**
	     * Shortcode attributes
	     * @var $atts
	     * @var $el_class
	     * @var $width
	     * @var $css
	     * @var $offset
	     * @var $content - shortcode content
	     * Shortcode class
	     * @var $this WPBakeryShortCode_VC_Column
	     */
	    $output = "";
	    $tag = "vc_column";
	    $sc_obj = Vc_Shortcodes_Manager::getInstance()->getElementClass( $tag );
	    $el_class = $width = $css = $offset = $mm_column_title = '';
	    $output = '';
	    $atts = vc_map_get_attributes( $sc_obj->getShortcode(), $atts );
	    extract( $atts );

	    $width = wpb_translateColumnWidthToSpan( $width );
	    $width = vc_column_offset_class_merge( $offset, $width );

	    $mm_column_title = !empty( $mm_column_title ) ? $mm_column_title : esc_html__( 'Title Must be Entered', 'prospect' );

	    $css_classes = array(
	        $sc_obj->getExtraClass( $el_class ),
	        'wpb_column',
	        'vc_column_container',
	        $width,
	    );

	    if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') )) {
	        $css_classes[]='vc_col-has-fill';
	    }

	    $wrapper_attributes = array();

	    $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $tag, $atts ) );
	    $wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

	    $output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
	    $output .= '<div class="vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '">';
	    $output .= '<div class="wpb_wrapper">';

	    if ( Cws_Megamenu::$megamenu_content_redered ){
	        $output .= "<div class='megamenu_item_column_title'><span>$mm_column_title</span><span class='pointer'></span></div>";
	        $output .= "<div class='megamenu_item_column_content'>";
	            $output .= "<div class='megamenu_item_column_content_wrapper'>";
	            	$output .= wpb_js_remove_wpautop( $content );
	            $output .= "</div>";
	        $output .= "</div>";        
	    }
	    else{
	        $output .= wpb_js_remove_wpautop( $content );        
	    }
	    $output .= '</div>';
	    $output .= '</div>';
	    $output .= '</div>';

	    return $output;  
	}
}

function vc_theme_vc_row ( $atts = array(), $content = "" ){
	/**
	 * Shortcode attributes
	 * @var $atts
	 * @var $el_class
	 * @var $full_width
	 * @var $full_height
	 * @var $equal_height
	 * @var $columns_placement
	 * @var $content_placement
	 * @var $parallax
	 * @var $parallax_image
	 * @var $css
	 * @var $el_id
	 * @var $video_bg
	 * @var $video_bg_url
	 * @var $video_bg_parallax
	 * @var $parallax_speed_bg
	 * @var $parallax_speed_video
	 * @var $content - shortcode content
	 * Shortcode class
	 * @var $this WPBakeryShortCode_VC_Row
	 */
	extract( shortcode_atts( array(
		"over_section"		=> ""
	), $atts));
	$output = "";
	$tag = "vc_row";
	$sc_obj = Vc_Shortcodes_Manager::getInstance()->getElementClass( $tag );
	$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = '';
	$disable_element = '';
	$output = $after_output = '';
	$over_section = (bool)$over_section;
	$atts = vc_map_get_attributes( $sc_obj->getShortcode(), $atts );
	extract( $atts );

	wp_enqueue_script( 'wpb_composer_front_js' );

	$el_class = $sc_obj->getExtraClass( $el_class );

	$el_class .= $over_section ? " over_section" : "";
	$css_classes = array(
		'vc_row',
		'wpb_row', //deprecated
		'vc_row-fluid',
		$el_class,
		vc_shortcode_custom_css_class( $css ),
	);

	if ( 'yes' === $disable_element ) {
		if ( vc_is_page_editable() ) {
			$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
		} else {
			return '';
		}
	}

	if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') ) || $video_bg || $parallax) {
		$css_classes[]='vc_row-has-fill';
	}

	if (!empty($atts['gap'])) {
		$css_classes[] = 'vc_column-gap-'.$atts['gap'];
	}

	$wrapper_attributes = array();
	// build attributes for wrapper
	if ( ! empty( $el_id ) ) {
		$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
	}
	if ( ! empty( $full_width ) ) {
		$wrapper_attributes[] = 'data-vc-full-width="true"';
		$wrapper_attributes[] = 'data-vc-full-width-init="false"';
		if ( 'stretch_row_content' === $full_width ) {
			$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
			$wrapper_attributes[] = 'data-vc-stretch-content="true"';
			$css_classes[] = 'vc_row-no-padding';
		}
		$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
	}

	if ( ! empty( $full_height ) ) {
		$css_classes[] = 'vc_row-o-full-height';
		if ( ! empty( $columns_placement ) ) {
			$flex_row = true;
			$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
			if ( 'stretch' === $columns_placement ) {
				$css_classes[] = 'vc_row-o-equal-height';
			}
		}
	}

	if ( ! empty( $equal_height ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-equal-height';
	}

	if ( ! empty( $content_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-content-' . $content_placement;
	}

	if ( ! empty( $flex_row ) ) {
		$css_classes[] = 'vc_row-flex';
	}

	$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

	$parallax_speed = $parallax_speed_bg;
	if ( $has_video_bg ) {
		$parallax = $video_bg_parallax;
		$parallax_speed = $parallax_speed_video;
		$parallax_image = $video_bg_url;
		$css_classes[] = 'vc_video-bg-container';
		wp_enqueue_script( 'vc_youtube_iframe_api_js' );
	}

	if ( ! empty( $parallax ) ) {
		wp_enqueue_script( 'vc_jquery_skrollr_js' );
		$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
		$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
		if ( false !== strpos( $parallax, 'fade' ) ) {
			$css_classes[] = 'js-vc_parallax-o-fade';
			$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
		} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
			$css_classes[] = 'js-vc_parallax-o-fixed';
		}
	}

	if ( ! empty( $parallax_image ) ) {
		if ( $has_video_bg ) {
			$parallax_image_src = $parallax_image;
		} else {
			$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
			$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
			if ( ! empty( $parallax_image_src[0] ) ) {
				$parallax_image_src = $parallax_image_src[0];
			}
		}
		$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
	}
	if ( ! $parallax && $has_video_bg ) {
		$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
	}
	$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $tag, $atts ) );
	$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
	$output .= wpb_js_remove_wpautop( $content );
	$output .= '</div>';
	$output .= $after_output;

	return $output;
}

/*	\Visual Composer Overrides */

function prospect_loader_html ( $args = array() ){
	extract( wp_parse_args( $args, array(
		'holder_id'		=> '',
		'holder_class' 	=> '',
		'loader_id'		=> '',
		'loader_class'	=> ''
	)));
	$holder_class 	.= " cws_loader_holder";
	$loader_class 	.= " cws_loader";
	$holder_id		= esc_attr( $holder_id );
	$holder_class 	= esc_attr( trim( $holder_class ) );
	$loader_id		= esc_attr( $loader_id );
	$loader_class 	= esc_attr( trim( $loader_class ) );
	echo "<div " . ( !empty( $holder_id ) ? " id='$holder_id'" : "" ) . " class='$holder_class'>";
		echo "<div " . ( !empty( $loader_id ) ? " id='$loader_id'" : "" ) . " class='$loader_class'>";
			?>
			<svg width='104px' height='104px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-default"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(0 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(30 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.08333333333333333s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(60 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.16666666666666666s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(90 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.25s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(120 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.3333333333333333s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(150 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.4166666666666667s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(180 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.5s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(210 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.5833333333333334s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(240 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.6666666666666666s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(270 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.75s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(300 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.8333333333333334s' repeatCount='indefinite'/></rect><rect  x='46.5' y='40' width='7' height='20' rx='5' ry='5' fill='#000000' transform='rotate(330 50 50) translate(0 -30)'>  <animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.9166666666666666s' repeatCount='indefinite'/></rect></svg>
			<?php
		echo "</div>";
	echo "</div>";
}

function prospect_figure_style( $custom_color = '' , $alt = '' ) {
	$figure_style = 'hexagon';
	$theme_custom_color = esc_attr( prospect_get_option( 'theme_color' ) );
	ob_start();
	if ( $figure_style == 'hexagon' ) {
		echo "<div class='figure_wrap " . $figure_style . "'>
			<svg " . ( !empty( $custom_color ) && $alt ? "style='fill: $custom_color; stroke: transparent;'" : "" ) . ( !empty( $custom_color ) && !$alt ? "" : "" ) . " viewBox='0 0 110.74 123.18'><path d='M307.58,232.84l-40.2-23.21a14.17,14.17,0,0,1-7.09-12.27V150.94a14.17,14.17,0,0,1,7.09-12.27l40.2-23.21a14.17,14.17,0,0,1,14.17,0L362,138.67A14.17,14.17,0,0,1,369,150.94v46.42A14.17,14.17,0,0,1,362,209.63l-40.2,23.21A14.17,14.17,0,0,1,307.58,232.84Z' transform='translate(-259.29 -112.56)'/></svg>
    	</div>";
	} else if( $figure_style == 'triangle' ) {
		echo "<div class='figure_wrap " . $figure_style ."'>
			<svg " . ( !empty( $custom_color ) && $alt ? "style='fill: $custom_color; stroke: transparent;'" : "" ) . ( !empty( $custom_color ) && !$alt ? "style='fill: transparent; stroke: $custom_color;'" : "" ) . " viewBox='0 0 120.11 108.04'><path d='M43.91,134l44.86-77.7a14.17,14.17,0,0,1,24.55,0L158.17,134a14.17,14.17,0,0,1-12.27,21.26H56.18A14.17,14.17,0,0,1,43.91,134Z' transform='translate(-40.99 -48.2)'/></svg>
		</div>";
	} else if( $figure_style == 'pentagon' ) {
		echo "<div class='figure_wrap " . $figure_style ."'>
			<svg " . ( !empty( $custom_color ) && $alt ? "style='fill: $custom_color; stroke: transparent;'" : "" ) . ( !empty( $custom_color ) && !$alt ? "style='fill: transparent; stroke: $custom_color;'" : "" ) . " viewBox='0 0 115.56 111.38'><path d='M60.68,147.05L44.4,97a14.17,14.17,0,0,1,5.15-15.85l42.6-31a14.17,14.17,0,0,1,16.66,0l42.6,31A14.17,14.17,0,0,1,156.57,97L140.3,147.05a14.17,14.17,0,0,1-13.48,9.79H74.16A14.17,14.17,0,0,1,60.68,147.05Z' transform='translate(-42.71 -46.46)'/></svg>
		</div>";
	}
	return ob_get_clean();
}

add_action('print_media_templates', 'cws_print_media_templates');

function cws_print_media_templates(){
?>
<script type="text/html" id="tmpl-custom-gallery-setting">
	<h3 style="z-index: -1;">&nbsp;&nbsp;&nbsp;</h3>
    <h3>Custom Settings</h3>

	<label class="setting">
		<span><?php _e('Image Form','prospect'); ?></span>
		<select data-setting="img_figure_form">
			<option value="default"> Default </option>
			<option value="hexagon"> Hexagon </option>
		</select>
	</label>
	<label class="setting">
		<span><?php _e('Image Align','prospect'); ?></span>
		<select data-setting="img_align">
			<option value="flex-start"> Left </option>
			<option value="center"> Center </option>
			<option value="flex-end"> Right </option>
		</select>
	</label>

</script>

<script>

    jQuery(document).ready(function()
    {
        _.extend(wp.media.gallery.defaults, {
        img_figure_form: 'default',
        img_align: 'center'
        });

        wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
        template: function(view){
          return wp.media.template('gallery-settings')(view)
               + wp.media.template('custom-gallery-setting')(view);
        }
        });

    });

</script>
<?php
	
};

function my_post_gallery( $output, $attr ) {
 
	// Initialize
	global $post, $wp_locale;
 
	// Gallery instance counter
	static $instance = 0;
	$instance++;
 
	// Validate the author's orderby attribute
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) unset( $attr['orderby'] );
	}
 
	// Get attributes from shortcode
	extract( shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'div',
		'icontag'    => 'div',
		'captiontag' => 'div',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'img_figure_form'    => 'default',
		'img_align'    => 'center',
		'link'    => 'file',
	), $attr ) );
 
	// Initialize
	$id = intval( $id );
	$attachments = array();
	$img_figure_form = esc_html($img_figure_form);
	$img_align = esc_html($img_align);
	$link_to = esc_html($link);
	if ( $order == 'RAND' ) $orderby = 'none';

	if ( ! empty( $include ) ) {
 
		// Include attribute is present
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
 
		// Setup attachments array
		foreach ( $_attachments as $key => $val ) {
			$attachments[ $val->ID ] = $_attachments[ $key ];
		}
 
	} else if ( ! empty( $exclude ) ) {
 
		// Exclude attribute is present 
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
 
		// Setup attachments array
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	} else {
		// Setup attachments array
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	}
 
	if ( empty( $attachments ) ) return '';
 
	// Filter gallery differently for feeds
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) $output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
		return $output;
	}
	// Filter tags and attributes
	$itemtag = tag_escape( $itemtag );
	$captiontag = tag_escape( $captiontag );
	$columns = intval( $columns );
	$itemwidth = $columns > 0 ? floor( 100 / $columns ) : 100;
	$float = is_rtl() ? 'right' : 'left';
	$selector = "gallery-{$instance}";
 
	// Filter gallery CSS
	$styles = "";
	$styles = apply_filters( 'gallery_style', "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
				justify-content: {$img_align};
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>"
	);
	$styles = json_encode($styles);
	$output .= "<div id='$selector' data-style='".esc_attr($styles)."' class='gallery galleryid-{$id} render_styles'>";
	
	$hex_size = '';
	if ( $img_figure_form == 'hexagon' ) {
		if ( $columns == 1 || $columns == 2 || $columns == 3 ) {			
			if ( $size == 'large' || $size == 'full' ) {
				$img_size_w = '280';
				$img_size_h = '310';
				$hex_size .= ' big';
			} else if ( $size == 'medium') {
				$img_size_w = '200';
				$img_size_h = '225';
				$hex_size .= ' medium';
			} else if ( $size == 'thumbnail') {
				$img_size_w = '140';
				$img_size_h = '155';
				$hex_size .= ' thumbnail';
			}
		} else if ( $columns == 4 ) {
			if ( $size == 'medium' || $size == 'large' || $size == 'full') {
				$img_size_w = '200';
				$img_size_h = '225';
				$hex_size .= ' medium';
			} else if ( $size == 'thumbnail') {
				$img_size_w = '140';
				$img_size_h = '155';
				$hex_size .= ' thumbnail';
			}
		} else if ( $columns == 5 ) {
			if ( $size == 'thumbnail' || $size == 'medium' || $size == 'large' || $size == 'full') {
				$img_size_w = '140';
				$img_size_h = '155';
				$hex_size .= ' thumbnail';
			} 
		} else if ( $columns == 6 ) {
			if ( $size == 'thumbnail' || $size == 'medium' || $size == 'large' || $size == 'full') {
				$img_size_w = '140';
				$img_size_h = '155';
				$hex_size .= ' thumbnail';
			} 
		} else if ( $columns == 7 ) {
			if ( $size == 'thumbnail' || $size == 'medium' || $size == 'large' || $size == 'full') {
				$img_size_w = '80';
				$img_size_h = '90';
				$hex_size .= ' mini';
			} 
		} else if ( $columns == 8 ) {
			if ( $size == 'thumbnail' || $size == 'medium' || $size == 'large' || $size == 'full') {
				$img_size_w = '80';
				$img_size_h = '90';
				$hex_size .= ' mini';
			}
		} else if ( $columns == 9 ) {
			if ( $size == 'thumbnail' || $size == 'medium' || $size == 'large' || $size == 'full') {
				$img_size_w = '80';
				$img_size_h = '90';
				$hex_size .= ' mini';
			} 
		}
	}
	
	// Iterate through the attachments in this gallery instance
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		// Attachment link
		$link = isset( $attr['link'] ) && 'file' == $attr['link'] ? wp_get_attachment_link( $id, $size, false, false ) : wp_get_attachment_link( $id, $size, true, false ); 
 		
		// Start itemtag
		$gallery_size = $hex_size.'_size'; 
		$gallery_col = ' col_'.$columns; 
		$output .= "<div class='gallery-item " . $gallery_size . $gallery_col . "'>";
		// icontag
		$repl = "<div class='gallery-icon-link'>" . prospect_figure_style( ) . "</div>";
		if ( $img_figure_form == 'hexagon' ) {
			$img_src = $attachments[$id]->guid;
			$img_thumb = cws_thumb( $img_src, array( 'width'=>$img_size_w, 'height'=>$img_size_h , 'crop' => true ), true );
			$thumb_url = isset( $img_thumb[0] ) ? esc_url($img_thumb[0]) : "";
			$repl .= "<canvas height='" . $img_size_h ."' width='" . $img_size_w . "'></canvas>";
			$link = preg_replace("/(<a[^>]*>)(.*)(<\/a>)/", "$1<div class='figure_container " . $hex_size . " hexagon'>$repl$2</div>$3", $link);
			$link = preg_replace("/(src=\").*(\")/", "$1" . $thumb_url . "$2 alt", $link );
		} else {
			$link = preg_replace("/(<a[^>]*>)(.*)/", "$1$repl$2", $link);
		} 
		if ( $link_to == 'none') {
			$link = preg_replace("/<a[^>]*>([^|]*)<\/a>/", "<div>$1</div>", $link);
		}

		$output .= "
		<div class='gallery-icon'>
			$link
		</div>";
 
		if ( $captiontag && trim( $attachment->post_excerpt ) ) {
 
			// captiontag
			$output .= "
			<{$captiontag} class='gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
			</{$captiontag}>";
 
		}
 
		// End itemtag
		$output .= "</div>";
 
		// Line breaks by columns set
		if($columns > 0 && ++$i % $columns == 0) $output .= '<br style="clear: both">';
 
	}
 
	// End gallery output
	$output .= "
		<br style='clear: both;'>
	</div>\n";
 
	return $output;
 
}
 
// Apply filter to default gallery shortcode
add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );

/*	Slider Overlaying body class */

function prospect_slider_overlaying_body_class ( $classes ){
	$header_page_meta_vars 	= prospect_get_page_meta_var( array( 'header' ) );
	$page_override_header 	= !empty( $header_page_meta_vars );
	$header_covers_slider 	= false;
	if ( $page_override_header ){
		$header_covers_slider 	= isset( $header_page_meta_vars['header_covers_slider'] ) ? (bool)$header_page_meta_vars['header_covers_slider'] : $header_covers_slider;
	}
	else{
		$header_covers_slider 	= (bool)prospect_get_option( 'header_covers_slider' );
	}
	if ( $header_covers_slider ){
		$classes[] = 'header_covers_slider';
	}
	return $classes;	
}

add_filter( 'body_class', 'prospect_slider_overlaying_body_class' );

function prospect_background_color_default() {
	update_option ("background-color","#fafafa");
}
add_action ("after_switch_theme","prospect_background_color_default");

function cws_merge_arrs ( $arrs = array() ){
	$r = array();
	for ( $i = 0; $i < count( $arrs ); $i++ ){
		$r = array_merge( $r, $arrs[$i] );
	}
	return $r;
}

/**/
/**/
/* Composer Icon Params Group */
/**/
function prospect_icon_vc_sc_config_params ( $dep_el = "", $dep_val = false ){
	$libs_param = array(
		'type' => 'dropdown',
		'heading' => __( 'Icon library', 'prospect' ),
		'value' => array(
			__( 'Font Awesome', 'prospect' ) => 'fontawesome',
			__( 'Open Iconic', 'prospect' ) => 'openiconic',
			__( 'Typicons', 'prospect' ) => 'typicons',
			__( 'Entypo', 'prospect' ) => 'entypo',
			__( 'Linecons', 'prospect' ) => 'linecons',
			__( 'Mono Social', 'prospect' ) => 'monosocial',
		),
		'param_name' => 'icon_lib',
		'description' => __( 'Select icon library.', 'prospect' ),
	);
	if ( !empty( $dep_el ) ){
		$libs_param['dependency'] = array(
			"element"	=> $dep_el
		);
		if ( is_bool( $dep_val ) ){
			$libs_param['dependency']['not_empty'] = $dep_val;
		}
		else{
			$libs_param['dependency']['value'] = $dep_val;
		}
	}
	$iconpickers = array(
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'prospect' ),
			'param_name' => 'icon_fontawesome',
			'value' => '', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'dependency' => array(
				'element' => 'icon_lib',
				'value' => 'fontawesome',
			),
			'description' => __( 'Select icon from library.', 'prospect' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'prospect' ),
			'param_name' => 'icon_openiconic',
			'value' => '', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true, // default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_lib',
				'value' => 'openiconic',
			),
			'description' => __( 'Select icon from library.', 'prospect' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'prospect' ),
			'param_name' => 'icon_typicons',
			'value' => '', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true, // default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_lib',
				'value' => 'typicons',
			),
			'description' => __( 'Select icon from library.', 'prospect' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'prospect' ),
			'param_name' => 'icon_entypo',
			'value' => '', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true, // default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_lib',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'prospect' ),
			'param_name' => 'icon_linecons',
			'value' => '', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true, // default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_lib',
				'value' => 'linecons',
			),
			'description' => __( 'Select icon from library.', 'prospect' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'prospect' ),
			'param_name' => 'icon_monosocial',
			'value' => '', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true, // default true, display an "EMPTY" icon?
				'type' => 'monosocial',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_lib',
				'value' => 'monosocial',
			),
			'description' => __( 'Select icon from library.', 'prospect' ),
		)
	);

	$fi_icons = prospect_get_all_flaticon_icons();
	$fi_firsticon = "";
	$fi_exists = is_array( $fi_icons ) && !empty( $fi_icons );
	$fi_lib_key = esc_html__( 'CWS Flaticons', 'prospect' );
	if ( $fi_exists ){
		$fi_firsticon = $fi_icons[0];
		$libs_param['value'][$fi_lib_key] = 'cws_flaticons';
		array_push( $iconpickers, array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'prospect' ),
			'param_name' => 'icon_cws_flaticons',
			'value' => '', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true, // default true, display an "EMPTY" icon?
				'type' => 'cws_flaticons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_lib',
				'value' => 'cws_flaticons',
			),
			'description' => __( 'Select icon from library.', 'prospect' ),			
		));
	}

	$params = array_merge( array( $libs_param ), $iconpickers );
	return $params;		
}
/**/
/* \Composer Icon Params Group */
/**/
/**/
/* Get Selected Icons from Composer Attributes */
/**/
function prospect_vc_sc_get_icon ( $atts ){
	$defaults = array(
		'icon_lib' 				=> 'fontawesome',
		'icon_fontawesome'		=> '',
		'icon_openiconic'		=> '',
		'icon_typicons'			=> '',
		'icon_entypo'			=> '',
		'icon_linecons'			=> '',
		'icon_monosocial'		=> '',
		'icon_cws_flaticons'	=> ''
	);
	$proc_atts 	= wp_parse_args( $atts, $defaults );
	$lib 		= $proc_atts['icon_lib'];
	$icon_key 	= "icon_$lib";
	$icon 		= isset( $atts[$icon_key] ) ? $atts[$icon_key] : "";
	return $icon;
}
/**/
/* \Get Selected Icons from Composer Attributes */
/**/

if (!function_exists('prospect_page_loader')) {
	function prospect_page_loader (){
		if (prospect_get_option('show_loader') == '1'){
			echo '
				<div id="cws_page_loader_container" class="cws_loader_container">
					<div id="cws_page_loader" class="cws_loader">
						<span>' . esc_html__( "LOADING...", "prospect" ) . '</span>
						<div class="hex"></div>
						<div class="hex"></div>
						<div class="hex"></div>
						<div class="hex"></div>
						<div class="hex"></div>
						<div class="hex"></div>
						<div class="hex"></div>
					</div>
			</div>'; 
		}
	}
}

function prospect_woo_columns (){
	$woo_columns = prospect_get_option('woo_column');
}

function cws_render_builder_gradient_rules( $options ) {
	extract(shortcode_atts(array(
		'cws_gradient_color_from' => PROSPECT_THEME_COLOR,
		'cws_gradient_color_to' => '#0eecbd',
		'cws_gradient_type' => 'linear',
		'cws_gradient_angle' => '45',
		'cws_gradient_shape_variant_type' => 'simple',
		'cws_gradient_shape_type' => 'ellipse',
		'cws_gradient_size_keyword_type' => 'farthest-corner',
		'cws_gradient_size_type' => '',
	), $options));
	$out = '';
	if ( $cws_gradient_type == 'linear' ) {
		$out .= "background: -webkit-linear-gradient(" . $cws_gradient_angle . "deg, $cws_gradient_color_from, $cws_gradient_color_to);";
		$out .= "background: -o-linear-gradient(" . $cws_gradient_angle . "deg, $cws_gradient_color_from, $cws_gradient_color_to);";
		$out .= "background: -moz-linear-gradient(" . $cws_gradient_angle . "deg, $cws_gradient_color_from, $cws_gradient_color_to);";
		$out .= "background: linear-gradient(" . $cws_gradient_angle . "deg, $cws_gradient_color_from, $cws_gradient_color_to);";
	}
	else if ( $cws_gradient_type == 'radial' ) {
		if ( $cws_gradient_shape_variant_type == 'simple' ) {
			$out .= "background: -webkit-radial-gradient(" . ( !empty( $cws_gradient_shape_type ) ? " " . $cws_gradient_shape_type . "," : "" ) . " $cws_gradient_color_from, $cws_gradient_color_to);";
			$out .= "background: -o-radial-gradient(" . ( !empty( $cws_gradient_shape_type ) ? " " . $cws_gradient_shape_type . "," : "" ) . " $cws_gradient_color_from, $cws_gradient_color_to);";
			$out .= "background: -moz-radial-gradient(" . ( !empty( $cws_gradient_shape_type ) ? " " . $cws_gradient_shape_type . "," : "" ) . " $cws_gradient_color_from, $cws_gradient_color_to);";
			$out .= "background: radial-gradient(" . ( !empty( $cws_gradient_shape_type ) ? " " . $cws_gradient_shape_type . "," : "" ) . " $cws_gradient_color_from, $cws_gradient_color_to);";
		}
		else if ( $cws_gradient_shape_variant_type == 'extended' ) {
		
			$out .= "background: -webkit-radial-gradient(" . ( !empty( $cws_gradient_size_type ) ? " " . $cws_gradient_size_type . "," : "" ) . ( !empty( $cws_gradient_size_keyword_type ) ? " " . $cws_gradient_size_keyword_type . "," : "" ) . " $cws_gradient_color_from, $cws_gradient_color_to);";
			$out .= "background: -o-radial-gradient(" . ( !empty( $cws_gradient_size_type ) ? " " . $cws_gradient_size_type . "," : "" ) . ( !empty( $cws_gradient_size_keyword_type ) ? " " . $cws_gradient_size_keyword_type . "," : "" ) . " $cws_gradient_color_from, $cws_gradient_color_to);";
			$out .= "background: -moz-radial-gradient(" . ( !empty( $cws_gradient_size_type ) ? " " . $cws_gradient_size_type . "," : "" ) . ( !empty( $cws_gradient_size_keyword_type ) ? " " . $cws_gradient_size_keyword_type . "," : "" ) . " $cws_gradient_color_from, $cws_gradient_color_to);";
			$out .= "background: radial-gradient(" . ( !empty( $cws_gradient_size_keyword_type ) && !empty( $cws_gradient_size_type ) ? " $cws_gradient_size_keyword_type at $cws_gradient_size_type" : "" ) . " $cws_gradient_color_from, $cws_gradient_color_to);";
		}
	}
	$out .= "border-color: transparent;-webkit-background-clip: border;-moz-background-clip: border;background-clip: border-box;-webkit-background-origin: border;-moz-background-origin: border;background-origin: border-box;";
	return preg_replace('/\s+/',' ', $out);
}

?>