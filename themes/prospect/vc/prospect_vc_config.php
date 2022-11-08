<?php
	if ( !class_exists( 'Prospect_VC_Config' ) ){
		class Prospect_VC_Config{

			public function __construct ( $args = array() ){
				add_action( 'admin_init', array( $this, 'remove_meta_boxes' ) );
				add_action( 'admin_menu', array( $this, 'remove_grid_elements_menu' ) );
				add_action( 'vc_iconpicker-type-cws_flaticons', array( $this, 'add_cws_flaticons' ) );
				add_action( 'init', array( $this, 'remove_vc_elements' ) );
				add_action( 'init', array( $this, 'modify_vc_elements' ) );
				add_action( 'init', array( $this, 'config' ) );
				add_action( 'init', array( $this, 'extend_shortcodes' ) );
				add_action( 'init', array( $this, 'extend_params' ) );
			}
			public function config (){
				vc_set_default_editor_post_types( array(
					'page',					
					'megamenu_item'
				));
				vc_set_shortcodes_templates_dir( trailingslashit( get_template_directory() ) . 'vc/templates' );
			}
			public function get_defaults (){
				$this->args = wp_parse_args( $this->args, $this->defaults );
			}
			// Extend Composer with Theme Shortcodes
			public function extend_shortcodes (){

				get_template_part('vc/theme_shortcodes/cws_sc_vc_posts_grid' );
				get_template_part('vc/theme_shortcodes/cws_sc_vc_blog' );
				get_template_part('vc/theme_shortcodes/cws_sc_icon' );
				get_template_part('vc/theme_shortcodes/cws_sc_button' );
				get_template_part('vc/theme_shortcodes/cws_sc_embed' );
				get_template_part('vc/theme_shortcodes/cws_sc_carousel' );
				get_template_part('vc/theme_shortcodes/cws_sc_banner' );
				get_template_part('vc/theme_shortcodes/cws_sc_call_to_action' );			
				get_template_part('vc/theme_shortcodes/cws_sc_msg_box' );	
				get_template_part('vc/theme_shortcodes/cws_sc_progress_bar' );
				get_template_part('vc/theme_shortcodes/cws_sc_milestone' );			
				get_template_part('vc/theme_shortcodes/cws_sc_services' );
				get_template_part('vc/theme_shortcodes/cws_sc_testimonial' );
				get_template_part('vc/theme_shortcodes/cws_sc_pricing_plan' );	
				get_template_part('vc/theme_shortcodes/cws_sc_divider' );
				get_template_part('vc/theme_shortcodes/cws_sc_twitter' );
				get_template_part('vc/theme_shortcodes/cws_sc_spacing' );
				get_template_part('vc/theme_shortcodes/cws_sc_time_line' );
				get_template_part('vc/theme_shortcodes/cws_sc_processes' );
				get_template_part('vc/theme_shortcodes/cws_sc_process' );

				get_template_part('vc/theme_widgets/cws_widget_text' );					
				get_template_part('vc/theme_widgets/cws_widget_social' );
				get_template_part('vc/theme_widgets/cws_widget_twitter' );
				get_template_part('vc/theme_widgets/cws_widget_latest_posts' );
				get_template_part('vc/theme_widgets/cws_widget_staff' );
											
			}
			// Extend Composer with Custom Parametres
			public function extend_params (){
				get_template_part('vc/params/cws_dropdown' );
			}
			// Modify VC Elements
			public function modify_vc_elements (){
				vc_remove_param( 'vc_row', 'full_height' );
				vc_remove_param( 'vc_row', 'columns_placement' );
				vc_remove_param( 'vc_row', 'el_class' );
				$attributes = array(
					array(
						'type' => 'dropdown',
						'heading' => "Row Triangle",
						'param_name' => 'el_class',
						'value' => array(
							esc_html__( 'None', 'prospect' ) => "",
							esc_html__( 'Top', 'prospect' ) => "top_triangle",
							esc_html__( 'Bottom', 'prospect' ) => "bottom_triangle",
							esc_html__( 'Top and Bottom', 'prospect' ) => "triangle_line bottom_triangle",	
						)
					),
					array(
						'type' => 'checkbox',
						'param_name'	=> 'over_section',
						"value"			=> array( esc_html__( 'Row Over Section', 'prospect' ) => true )
					)	
				);
				vc_add_params( 'vc_row' , $attributes);

				vc_remove_param( 'vc_tta_accordion', 'style' );
				vc_remove_param( 'vc_tta_accordion', 'shape' );
				vc_remove_param( 'vc_tta_accordion', 'color' );
				vc_remove_param( 'vc_tta_accordion', 'no_fill' );
				vc_remove_param( 'vc_tta_accordion', 'spacing' );
				vc_remove_param( 'vc_tta_accordion', 'gap' );
				vc_remove_param( 'vc_tta_accordion', 'c_icon' );
				vc_add_param( 'vc_tta_accordion' , array(
					'type' => 'dropdown',
					'heading' => "Accordion Style",
					'param_name' => 'el_class',
					'value' => array(
						esc_html__( 'Classic', 'prospect' ) => "",
						esc_html__( 'Alternative', 'prospect' ) => "accordion_alternative",		
					)
				));

				vc_remove_param( 'vc_tta_tabs', 'style' );
				vc_remove_param( 'vc_tta_tabs', 'shape' );
				vc_remove_param( 'vc_tta_tabs', 'color' );
				vc_remove_param( 'vc_tta_tabs', 'no_fill_content_area' );
				vc_remove_param( 'vc_tta_tabs', 'spacing' );
				vc_remove_param( 'vc_tta_tabs', 'gap' );
				vc_remove_param( 'vc_tta_tabs', 'pagination_style' );
				vc_remove_param( 'vc_tta_tabs', 'pagination_color' );
				vc_add_param( 'vc_tta_tabs' , array(
					'type' => 'dropdown',
					'heading' => "Tabs Style",
					'param_name' => 'el_class',
					'value' => array(
						esc_html__( 'Classic', 'prospect' ) => "",
						esc_html__( 'Alternative', 'prospect' ) => "tabs_alternative",		
					)
				));

				vc_remove_param( 'vc_toggle', 'style' );
				vc_remove_param( 'vc_toggle', 'color' );
				vc_remove_param( 'vc_toggle', 'size' );

				vc_remove_param( 'vc_images_carousel', 'partial_view' );	
			}
			
			// Remove VC Elements
			public function remove_vc_elements (){
				if ( function_exists( 'vc_remove_element' ) ) {
					vc_remove_element( 'vc_separator' );
					vc_remove_element( 'vc_text_separator' );
					vc_remove_element( 'vc_message' );
					vc_remove_element( 'vc_gallery' );
					vc_remove_element( 'vc_tta_tour' );
					vc_remove_element( 'vc_tta_pageable' );
					vc_remove_element( 'vc_custom_heading' );
					vc_remove_element( 'vc_btn' );
					vc_remove_element( 'vc_cta' );
					vc_remove_element( 'vc_posts_slider' );
					vc_remove_element( 'vc_progress_bar' );
					vc_remove_element( 'vc_basic_grid' );
					vc_remove_element( 'vc_media_grid' );
					vc_remove_element( 'vc_masonry_grid' );
					vc_remove_element( 'vc_masonry_media_grid' );
					vc_remove_element( 'vc_widget_sidebar' );
				}
			}
			public function add_cws_flaticons ( $icons ){
				$icon_id = "";
				$fi_array = array();
				$fi_icons = prospect_get_all_flaticon_icons();
				$fi_exists = is_array( $fi_icons ) && !empty( $fi_icons );				
				if ( !is_array( $fi_icons ) || empty( $fi_icons ) ){
					return $icons;
				}
				for ( $i = 0; $i < count( $fi_icons ); $i++ ){
					$icon_id = $fi_icons[$i];
					$icon_class = "flaticon-{$icon_id}";
					array_push( $fi_array, array( "$icon_class" => $icon_id ) );
				}
				$icons = array_merge( $icons, $fi_array );
				return $icons;
			}
			// Remove teaser metabox
			public function remove_meta_boxes() {
				remove_meta_box( 'vc_teaser', 'page', 		'side' );
				remove_meta_box( 'vc_teaser', 'post', 		'side' );
				remove_meta_box( 'vc_teaser', 'portfolio', 	'side' );
				remove_meta_box( 'vc_teaser', 'product', 	'side' );
			}
			// Remove 'Grid Elements' from Admin menu
			public function remove_grid_elements_menu(){
			  remove_menu_page( 'edit.php?post_type=vc_grid_item' );
			}
		}
	}
	/**/
	/* Config and enable extension */
	/**/
	$vc_config = new Prospect_VC_Config ();
	/**/
	/* \Config and enable extension */
	/**/

	if(!class_exists('VC_CWS_Background')){
		class VC_CWS_Background extends Prospect_VC_Config{
			static public $columns = 0;
			static public $row_atts = '';
			function __construct(){
				add_action('admin_init',array($this,'cws_bg_init'));
			}
			public static function cws_open_vc_shortcode($atts, $content){
				$theme_color 		= esc_attr( prospect_get_option( "theme_color" ) );
				$bg_image_position = $bg_cws_size = $bg_cws_attachment = $customize_colors_overlay = $cws_overlay_color = $bg_cws_repeat = $html = "";
				extract( shortcode_atts( array(
				    "gap" => "",
				    "bg_cws_repeat" => "",		   
				    "bg_image_position" => "",
				    "customize_colors_overlay" => "",
				    "full_width" => "",
				    "bg_cws_size" => "",
				    "bg_cws_attachment" => "",
				    "cws_overlay_color" => $theme_color,
					
				), $atts ) );		
				$output = '<!-- CWS Row -->';
				$el_style_bg = isset($bg_cws_repeat) && !empty($bg_cws_repeat) ? 'background-repeat:'.$bg_cws_repeat.';' : '';
				$el_style_bg .= isset($bg_cws_size) && !empty($bg_cws_size) ? 'background-size:'.$bg_cws_size.';' : '';
				$el_style_bg .= isset($bg_cws_attachment) && !empty($bg_cws_attachment) ? 'background-attachment:'.$bg_cws_attachment.';' : '';
				if(isset($bg_image_position) && !empty($bg_image_position)){
					switch ($bg_image_position) {
						case 'left_top':
							$el_style_bg .= 'background-position:0%,0%;';
							break;
						case 'left_center':
							$el_style_bg .= 'background-position:0%,50%;';
							break;
						case 'left_bottom':
							$el_style_bg .= 'background-position:0%,100%;';
							break;
						case 'right_top':
							$el_style_bg .= 'background-position:100%,0%;';
							break;
						case 'right_center':
							$el_style_bg .= 'background-position:100%,50%;';
							break;
						case 'right_bottom':
							$el_style_bg .= 'background-position:100%,100%;';
							break;
						case 'center_top':
							$el_style_bg .= 'background-position:50%,0%;';
							break;
						case 'center_center':
							$el_style_bg .= 'background-position:50%,50%;';
							break;
						case 'center_bottom':
							$el_style_bg .= 'background-position:50%,100%;';
							break;
					}
				}
				$output .= '<div class="cws-content"'.(!empty($el_style_bg) ? ' style='.esc_attr($el_style_bg) : "").'>';	
				self::$row_atts = $atts;
				return $output;
			}

			public static function cws_open_vc_shortcode_column($atts, $content){		
				$output = '';
				self::$columns++;	
					
				if(self::$columns == 1){		
					$el_style = '';
					if(isset(self::$row_atts['bg_cws_color']) && !empty(self::$row_atts['bg_cws_color'])){
						if(self::$row_atts['bg_cws_color'] == 'gradient'){
							$el_style = cws_render_builder_gradient_rules(self::$row_atts);
						}else{
							$el_style =  "background-color:". self::$row_atts['cws_overlay_color'].";";
						}
					}
			
					if(!empty($el_style)){
						$output .= "<div class='cws-overlay-bg' style='".esc_attr($el_style)."'></div>";
					}
					if(isset(self::$row_atts['cws_pattern_image']) && !empty(self::$row_atts['cws_pattern_image'])){
						$src = wp_get_attachment_image_src(self::$row_atts['cws_pattern_image']);
						$output .= "<div class='cws-overlay-bg' style='background-image:url(".esc_attr($src[0]).")'></div>";
					}
				}
				return $output;
			} 
			/* end parallax_shortcode */

			public static function cws_close_vc_shortcode($atts, $content){	
				self::$row_atts = '';
				if(isset(self::$columns) && !empty(self::$columns)){
					self::$columns = 0;
				}
				return $output = "</div>";
			}

			function cws_bg_init(){
				$group_name = __('Design Options', 'prospect');
				$theme_color 		= esc_attr( prospect_get_option( "theme_color" ) );
				if(function_exists('vc_add_param')){
					vc_add_param('vc_row',array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Background Image Repeat", 'prospect'),
							"param_name" => "bg_cws_repeat",
							"value" => array(							
									__("Repeat", 'prospect') => "repeat",
									__("No Repeat", 'prospect') => "no-repeat",
									__("Repeat X", 'prospect') => "repeat-x",
									__("Repeat Y", 'prospect') => "repeat-y",
								),
							"description" => __("Options to control repeatation of the background image. Learn on <a href='http://www.w3schools.com/cssref/playit.asp?filename=playcss_background-repeat' target='_blank'>W3School</a>", 'prospect'),
							"group" => $group_name,
						)
					);
					vc_add_param('vc_row',array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Background Attachment", 'prospect'),
							"param_name" => "bg_cws_attachment",
							"value" => array(
									__("Scroll", 'prospect') => "scroll",
									__("Fixed", 'prospect') => "fixed",
								),
							"group" => $group_name,
						)
					);
					vc_add_param('vc_row',array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Background Image Size", 'prospect'),
							"param_name" => "bg_cws_size",
							"value" => array(
									__("Initial", 'prospect') => "initial",
									__("Cover", 'prospect') => "cover",
									__("Contain", 'prospect') => "contain",
								),
							"group" => $group_name,
						)
					);
					vc_add_param('vc_row',array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Background Image Position", 'prospect'),
							"param_name" => "bg_image_position",
							"value" => array(
									__("Left Top", 'prospect') => "left_top",
									__("Left Center", 'prospect') => "left_center",
									__("Left Bottom", 'prospect') => "left_bottom",
									__("Right Top", 'prospect') => "right_top",
									__("Right Center", 'prospect') => "right_center",
									__("Right Bottom", 'prospect') => "right_bottom",
									__("Center Top", 'prospect') => "center_top",
									__("Center Center", 'prospect') => "center_center",
									__("Center Bottom", 'prospect') => "center_bottom",
								),	
							"group" => $group_name,
						)
					);
					vc_add_param('vc_row',array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Background Color", 'prospect'),
							"param_name"		=> "bg_cws_color",
							"value" => array(
									__("None", 'prospect') => "none",
									__("Color", 'prospect') => "color",
									__("Gradient", 'prospect') => "gradient",
								),
							"group" => $group_name,
						)
					);
					vc_add_param('vc_row',array(
							"type" => "colorpicker",
							"class" => "",
							"heading"		=> esc_html__( 'Color', 'prospect' ),
							"param_name" => "cws_overlay_color",
							"group" => $group_name,
							"dependency"	=> array(
								"element"	=> "bg_cws_color",
								'value' => 'color',
								
							),
							"value"			=> $theme_color
						)
					);						
					vc_add_param('vc_row',array(
							"type" => "colorpicker",
							"class" => "",
							"heading"		=> esc_html__( 'From', 'prospect' ),
							"param_name" => "cws_gradient_color_from",
							"group" => $group_name,
							"dependency"	=> array(
								"element"	=> "bg_cws_color",
								'value' => 'gradient',
								
							),
							"value"			=> $theme_color
						)
					);					
					vc_add_param('vc_row',array(
							"type" => "colorpicker",
							"class" => "",
							"heading"		=> esc_html__( 'To', 'prospect' ),
							"param_name" => "cws_gradient_color_to",
							"group" => $group_name,
							"dependency"	=> array(
								"element"	=> "bg_cws_color",
								'value' => 'gradient',
								
							),
							"value"			=> $theme_color
						)
					);
					vc_add_param('vc_row',array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Type", 'prospect'),
							"param_name"		=> "cws_gradient_type",
							"value" => array(
									__("Linear", 'prospect') => "linear",
									__("Radial", 'prospect') => "radial",
								),
							"group" => $group_name,
							"dependency"	=> array(
								"element"	=> "bg_cws_color",
								'value' => 'gradient',
								
							),
						)
					);	
					vc_add_param('vc_row',array(
							"type"			=> "textfield",
							"class" => "",
							"heading"		=> esc_html__( 'Angle', 'prospect' ),
							"param_name"	=> "cws_gradient_angle",
							"value" => '45',
							"description"	=> esc_html__( 'Degrees: -360 to 360', 'prospect' ),
							"group" => $group_name,
							"dependency"	=> array(
								"element"	=> "cws_gradient_type",
								'value' => 'linear',						
							),
						)
					);
					vc_add_param('vc_row',array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Shape variant", 'prospect'),
							"param_name"		=> "cws_gradient_shape_variant_type",
							"value" => array(
									__("Simple", 'prospect') => "simple",
									__("Extended", 'prospect') => "extended",
								),
							"group" => $group_name,
							"dependency"	=> array(
								"element"	=> "cws_gradient_type",
								'value' => 'radial',	
							),
						)
					);					
					vc_add_param('vc_row',array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Shape", 'prospect'),
							"param_name"		=> "cws_gradient_shape_type",
							"value" => array(
									__("Ellipse", 'prospect') => "ellipse",
									__("Circle", 'prospect') => "circle",
								),
							"group" => $group_name,
							"dependency"	=> array(
								"element"	=> "cws_gradient_shape_variant_type",
								'value' => 'simple',	
							),
						)
					);						
					vc_add_param('vc_row',array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Size keyword", 'prospect'),
							"param_name"		=> "cws_gradient_size_keyword_type",
							"value" => array(
									__("Closest side", 'prospect') => "closest_side",
									__("Farthest side", 'prospect') => "farthest_side",
									__("Closest corner", 'prospect') => "closest_corner",
									__("Farthest corner", 'prospect') => "farthest_corner",
								),
							"group" => $group_name,
							"dependency"	=> array(
								"element"	=> "cws_gradient_shape_variant_type",
								'value' => 'extended',	
							),
						)
					);						
					vc_add_param('vc_row',array(
							"type" => "textfield",
							"class" => "",
							"heading" => __("Size", 'prospect'),
							"param_name"		=> "cws_gradient_size_type",
							"value" => '60% 55%',
							"description"	=> esc_html__( 'Two space separated percent values, for example (60% 55%)', 'prospect' ),
							"group" => $group_name,
							"dependency"	=> array(
								"element"	=> "cws_gradient_shape_variant_type",
								'value' => 'extended',	
							),
						)
					);					
					vc_add_param('vc_row',array(
							"type" => "attach_image",
							"class" => "",
							"heading" => __("Pattern", 'prospect'),
							"param_name"		=> "cws_pattern_image",
							"group" => $group_name,
						)
					);	
				}
			} 
		}
		new VC_CWS_Background;
	}
	
	if ( !function_exists( 'vc_theme_before_vc_row' ) ) {
		function vc_theme_before_vc_row($atts, $content = null) {
			return VC_CWS_Background::cws_open_vc_shortcode($atts, $content);
		}
	}

	if ( !function_exists( 'vc_theme_before_vc_column' ) ) {
		function vc_theme_before_vc_column($atts, $content = null) {
			new VC_CWS_Background();
			return VC_CWS_Background::cws_open_vc_shortcode_column($atts, $content);
		}
	}	
	if ( !function_exists( 'vc_theme_after_vc_row' ) ) {
		function vc_theme_after_vc_row($atts, $content = null) {
			 return VC_CWS_Background::cws_close_vc_shortcode($atts, $content);
		}
	}
?>