<?php

function cwsfw_get_sections() {
	$settings = array(
		'header_options' => array(
			'type' => 'section',
			'title' => esc_html__( 'Header', 'prospect' ),
			'icon' => array('fa', 'header'),
			'active' => true, // true by default
			'layout' => array(
				'logo' => array(
					'type' => 'tab',
					'init' => 'open',
					'icon' => array('fa', 'check-square'),
					'title' => esc_html__( 'Logo', 'prospect' ),
					'layout' => array(
						'logo' => array(
							'title' => esc_html__( 'Dark Logo', 'prospect' ),
							'type' => 'media',
							'url-atts' => 'readonly',
							'addrowclasses' => 'grid-col-6',
							'layout' => array(
								'is_high_dpi' => array(
									'title' => esc_html__( 'High-Resolution logo', 'prospect' ),
									'type' => 'checkbox',
									'addrowclasses' => 'checkbox'
								),
							),
						),
						'light_logo' => array(
							'title' => esc_html__( 'Light Logo', 'prospect' ),
							'type' => 'media',
							'url-atts' => 'readonly',
							'addrowclasses' => 'grid-col-6',
							'layout' => array(
								'is_high_dpi' => array(
									'title' => esc_html__( 'High-Resolution Light logo', 'prospect' ),
									'type' => 'checkbox',
									'addrowclasses' => 'checkbox'
								),
							),
						),
						'header_logo_light' => array(
							'type' => 'select',
							'addrowclasses' => 'grid-col-12',
							'title' => esc_html__( 'Logo', 'prospect' ),
							'source' => array(
								'black' => array( esc_html__( 'Black', 'prospect' ), true),
								'white' => array( esc_html__( 'White', 'prospect' ), false),
								'none' => array( esc_html__( 'None', 'prospect' ), false)
							)
						),
						'logo_dims' => array(
							'title' => esc_html__( 'Dimensions', 'prospect' ),
							'type' => 'dimensions',
							'addrowclasses' => 'grid-col-4',
							'value' => array(
								'width' => array('placeholder' => esc_html__( 'Width', 'prospect' ), 'value' => '' ),
								'height' => array('placeholder' => esc_html__( 'Height', 'prospect' ), 'value' => '72px' ),
								),
						),
						'logo_pos' => array(
							'title' => esc_html__( 'Position', 'prospect' ),
							'type' => 'radio',
							'addrowclasses' => 'grid-col-4',
							'subtype' => 'images',
							'value' => array(
								'left' => array( esc_html__( 'Left', 'prospect' ), 	true, '', get_template_directory_uri() . '/img/fw_img/align-left.png' ),
								'center' =>array( esc_html__( 'Center', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/align-center.png' ),
								'right' =>array( esc_html__( 'Right', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/align-right.png' ),
							),
						),
						'logo_margins' => array(
							'title' => esc_html__( 'Spacings', 'prospect' ),
							'type' => 'margins',
							'addrowclasses' => 'grid-col-4',
							'value' => array(
								'top' => array('placeholder' => esc_html__( 'Top', 'prospect' ), 'value' => '14px'),
								'left' => array('placeholder' => esc_html__( 'left', 'prospect' ), 'value' => '0px'),
								'right' => array('placeholder' => esc_html__( 'Right', 'prospect' ), 'value' => '0px'),
								'bottom' => array('placeholder' => esc_html__( 'Bottom', 'prospect' ), 'value' => '14px'),
								),
						),
						'mobile_logo' => array(
							'title' => esc_html__( 'Mobile Logo', 'prospect' ),
							'type' => 'media',
							'url-atts' => 'readonly',
							'addrowclasses' => 'grid-col-6',
							'layout' => array(
								'is_high_dpi' => array(
									'title' => esc_html__( 'High-Resolution Mobile logo', 'prospect' ),
									'type' => 'checkbox',
									'addrowclasses' => 'checkbox'
								),
							),
						),
						'sticky_logo' => array(
							'title' => esc_html__( 'Sticky Logo', 'prospect' ),
							'type' => 'media',
							'addrowclasses' => 'grid-col-6',
							'url-atts' => 'readonly',
							'layout' => array(
								'is_high_dpi' => array(
									'title' => esc_html__( 'High-Resolution Sticky logo', 'prospect' ),
									'type' => 'checkbox',
									'addrowclasses' => 'checkbox'
								),
							),
						)
					)
				),
				'menu' => array(
					'type' => 'tab',
					'icon' => array( 'fa', 'list-alt' ),
					'title' => esc_html__( 'Menu', 'prospect' ),
					'layout' => array(
						'menu_pos' => array(
							'title' => esc_html__( 'Position', 'prospect' ),
							'type' => 'radio',
							'subtype' => 'images',
							'addrowclasses' => 'grid-col-4',
							'value' => array(
								'left' => array( esc_html__( 'Left', 'prospect' ), 	true, '', get_template_directory_uri() . '/img/fw_img/align-left.png' ),
								'center' =>array( esc_html__( 'Center', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/align-center.png' ),
								'right' =>array( esc_html__( 'Right', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/align-right.png' ),
							),
						),	
						'menu_opacity' => array(
							'title' 		=> esc_html__( 'Opacity', 'prospect' ),
							'tooltip' => array(
								'title' => esc_html__( 'Menu Opacity', 'prospect' ),
								'content' => esc_html__( 'This option will apply a transparent header when set to 0. Options available from 0 to 100', 'prospect' ),
							),								
							'type' 			=> 'number',
							'addrowclasses' => 'grid-col-4',
							'atts' 			=> " min='0' max='100'",
							'value'			=> '100'
						),
						'menu_bg_color' => array(
							'title' 		=> esc_html__( 'Background Color', 'prospect' ),
							'tooltip' => array(
								'title' => esc_html__( 'Background Color', 'prospect' ),
								'content' => esc_html__( 'Change the background color of the menu and logo area.', 'prospect' ),
							),							
							'type' 			=> 'text',
							'addrowclasses' => 'grid-col-4',
							'atts' 			=> 'data-default-color="#ffffff"',
							'value'			=> '#ffffff'
						),					
						'menu_fw' => array(
							'title' => esc_html__( 'Disable Full-Width Menu', 'prospect' ),
							'type' => 'checkbox',
							'addrowclasses' => 'checkbox grid-col-12'
						),
						'header_covers_slider' => array(
							'title' => esc_html__( 'Menu and logo overlays title area and homepage slider', 'prospect' ),
							'tooltip' => array(
								'title' => esc_html__( 'Menu Overlays Slider', 'prospect' ),
								'content' => esc_html__( 'This option will force the menu and logo sections to overlay the title area. <br> It is useful when using transparent menu.', 'prospect' ),
							),							
							'type' => 'checkbox',
							'atts' => 'data-options="e:menu_font_color;"',
							'addrowclasses' => 'checkbox grid-col-12'
						),
						'menu_font_color' => array(
							'title' 		=> esc_html__( 'Override Font Color', 'prospect' ),
							'tooltip' => array(
								'title' => esc_html__( 'Override Font Color', 'prospect' ),
								'content' => esc_html__( 'This color is applied to the main menu only, sub-menu items will use the color which is set in Typography section.<br /> This option is very useful when menu and logo covers title area or slider.', 'prospect' ),
							),							
							'type' 			=> 'text',
							'addrowclasses' => 'disable grid-col-12',
							'atts' 			=> 'data-default-color="#ffffff;"',
							'value'			=> '#ffffff'
						),							
						'menu_stick' => array(
							'type' => 'select',
							'addrowclasses' => 'grid-col-12',
							'title' => esc_html__( 'Sticky Menu', 'prospect' ),
							'source' => array(
								'none' => array(esc_html__( 'None', 'prospect' ), true),
								'smart' => array(esc_html__( 'Smart', 'prospect' ), false),
								'standard' => array(esc_html__( 'Standard', 'prospect' ), false),
							)
						),
					)
				),
				'header_options' => array(
					'type' => 'tab',
					'icon' => array('fa', 'header'),
					'title' => esc_html__( 'Title Area', 'prospect' ),
					'layout' => array(
						'page_title_spacings' => array(
							'title' => esc_html__( 'Title Spacings', 'prospect' ),
							'type' => 'margins',
							'value' => array(
								'top' => array('placeholder' => esc_html__( 'Top', 'prospect' ), 'value' => '110px'),
								'left' => array('placeholder' => esc_html__( 'left', 'prospect' ), 'value' => '0px'),
								'right' => array('placeholder' => esc_html__( 'Right', 'prospect' ), 'value' => '0px'),
								'bottom' => array('placeholder' => esc_html__( 'Bottom', 'prospect' ), 'value' => '110px'),
							),
						),
						'default_header_image'	=> array(
							'title'	=> esc_html__( 'Background Image', 'prospect' ),
							'addrowclasses' => 'grid-col-4',
							'type'	=> 'media'
						),
						'header_bg_color' => array(
							'title' 		=> esc_html__( 'Background Color', 'prospect' ),
							'atts' 			=> 'data-default-color="' . PROSPECT_THEME_HEADER_BG_COLOR . '"',
							'addrowclasses' => 'grid-col-4',
							'type' 			=> 'text',
							'value'			=> PROSPECT_THEME_HEADER_BG_COLOR
						),
						'header_font_color' => array(
							'title' 			=> esc_html__( 'Font Color', 'prospect' ),
							'atts' 				=> 'data-default-color="' . PROSPECT_THEME_HEADER_FONT_COLOR . '"',
							'addrowclasses' 	=> 'grid-col-4',
							'type' 				=> 'text',
							'value'				=> 	PROSPECT_THEME_HEADER_FONT_COLOR
						),
					)
				)				
			)
		),	// end of sections
		'styling_options' => array(
			'type' => 'section',
			'title' => esc_html__('Styling Options', 'prospect' ),
			'icon' => array('fa', 'paint-brush'),
			'layout' => array(
			'styling_options_color' => array(
					'type' => 'tab',
					'icon' => array('fa', 'calendar-plus-o'),
					'init' => 'open',
					'title' => esc_html__( 'Styling Options', 'prospect' ),
					'layout' => array(
						'theme_color' => array(
							'title' => esc_html__( 'Main Color', 'prospect' ),
							'atts' => 'data-default-color="' . PROSPECT_THEME_COLOR . '"',
							'addrowclasses' => 'grid-col-4',
							'type' => 'text',
							'value'	=> PROSPECT_THEME_COLOR
						),
						'theme_2_color' => array(
							'title' => esc_html__( 'Secondary Color', 'prospect' ),
							'atts' => 'data-default-color="' . PROSPECT_THEME_2_COLOR . '"',
							'addrowclasses' => 'grid-col-4',
							'type' => 'text',
							'value'	=> PROSPECT_THEME_2_COLOR
						),
						'theme_3_color' => array(
							'title' => esc_html__( 'Helper Color', 'prospect' ),
							'atts' => 'data-default-color="' . PROSPECT_THEME_3_COLOR . '"',
							'addrowclasses' => 'grid-col-4',
							'type' => 'text',
							'value'	=> PROSPECT_THEME_3_COLOR
						),
						'boxed_layout'	=> array(
							'title'	=> esc_html__( 'Apply Boxed Layout', 'prospect' ),
							'type'	=> 'checkbox',
							'atts' => 'data-options="e:url_background;"',
							'addrowclasses' => 'checkbox alt grid-col-12'		
						),	
						'url_background' => array(
					       'title' => esc_html__( 'Background Settings', 'prospect' ),
					       'type' => 'info',
					       'subtype'	=> 'link',
					       'addrowclasses' => 'disable grid-col-12',
					       'value' => '<a href="'.get_admin_url(null, 'customize.php?autofocus[control]=background_image').'" target="_blank">'.esc_html__('Click this link to customize your background settings','prospect').'</a>',
					    ),	
					),
				),
			),
		),
		'footer_options' => array(
			'type' => 'section',
			'title' => esc_html__('Footer', 'prospect' ),
			'icon' => array('fa', 'list-alt'),
			'layout' => array(
				'footer' => array(
					'type' => 'tab',
					'init' => 'open',
					'icon' => array( 'fa', 'fa-book' ),
					'title' => esc_html__( 'Footer', 'prospect' ),
					'layout' => array(
						'footer_bg_color'	=> array(
							'title'				=> esc_html__( 'Background Color', 'prospect' ),
							'atts'				=> 'data-default-color="' . PROSPECT_THEME_FOOTER_BG_COLOR . ';"',
							'addrowclasses' 	=> 'grid-col-4',
							'type'				=> 'text',
							'value'				=> PROSPECT_THEME_FOOTER_BG_COLOR
						),
						'footer_font_color' => array(
							'title' 			=> esc_html__( 'Font color', 'prospect' ),
							'atts' 				=> 'data-default-color="#b0b0b0;"',
							'addrowclasses' 	=> 'grid-col-4',
							'type' 				=> 'text',
							'value'				=> '#b0b0b0'
						),
						'footer_title_color' => array(
							'title' 			=> esc_html__( 'Title color', 'prospect' ),
							'atts' 				=> 'data-default-color="#fff;"',
							'addrowclasses' 	=> 'grid-col-4',
							'type' 				=> 'text',
							'value'				=> '#fff'
						),
						'default_footer_image'	=> array(
							'title'	=> esc_html__( 'Footer Image', 'prospect' ),
							'addrowclasses' => 'grid-col-12',
							'type'	=> 'media'
						),
						'footer_sb'			=> array(
							'title'			=> esc_html__( "Footer's Sidebar", 'prospect' ),
							'addrowclasses' => 'grid-col-12',
							'tooltip' => array(
								'title' => esc_html__( 'Footer area', 'prospect' ),
								'content' => esc_html__( 'This options will set the default Footer widget area, unless you override it on each page', 'prospect' ),
							),							
							'type'			=> 'select',
							'source'		=> 'sidebars'
						),						
						'copyrights_text'	=> array(
							'title'			=> esc_html__( "Copyrights content", 'prospect' ),
							'type'			=> 'textarea',
							'addrowclasses' => 'grid-col-12',
							'atts' 			=> 'rows="5"',
							'value'			=> esc_html__( "Copyrights 2016: Prospect - Creative Multipurpose WordPress Theme", 'prospect' )
						),
						'copyrights_bg_color'	=> array(
							'title'					=> esc_html__( 'Copyrights Background Color', 'prospect' ),
							'atts'					=> 'data-default-color="#23272c;"',
							'addrowclasses' 		=> 'grid-col-6',
							'type'					=> 'text',
							'value'					=> '#23272c'
						),
						'copyrights_font_color' => array(
							'title' 				=> esc_html__( 'Copyrights Font color', 'prospect' ),
							'atts' 					=> 'data-default-color="#fff;"',
							'addrowclasses' 		=> 'grid-col-6',
							'type' 					=> 'text',
							'value'					=> '#fff'	
						),
					)
				)
			)
		),	// end of sections
		'layout_options' => array(
			'type' => 'section',
			'title' => esc_html__('Page Layouts', 'prospect' ),
			'icon' => array('fa', 'th'),
			'layout'	=> array(
				'homepage_options' => array(
					'type' => 'tab',
					'init' 			=> 'open',					
					'title' => esc_html__('Home', 'prospect' ),
					'icon' => array('fa', 'calendar-plus-o'),
					'layout' => array(
						'home_slider_type' => array(
							'title' => esc_html__('Slider', 'prospect' ),
							'type' => 'radio',
							'value' => array(
								'none' => 	array( esc_html__('None', 'prospect' ), true, 'd:home_slider_shortcode;d:video_section;d:static_img_section' ),
								'img_slider'=>	array( esc_html__('Image Slider', 'prospect' ), false, 'e:home_slider_shortcode;d:video_section;d:static_img_section' ),
								'video_slider' => 	array( esc_html__('Video Slider', 'prospect' ), false, 'd:home_slider_shortcode;e:video_section;d:static_img_section' ),
								'stat_img_slider' => 	array( esc_html__('Static image', 'prospect' ), false, 'd:home_slider_shortcode;d:video_section;e:static_img_section' ),
							),
						),
						'home_slider_shortcode' => array(
							'title' => esc_html__( 'Slider shortcode', 'prospect' ),
							'addrowclasses' => 'disable',
							'type' => 'text',
							'value' => '[rev_slider homepage]',
						),
						'video_section' => array(
							'title' => esc_html__( 'Video Slider Settings', 'prospect' ),
							'type' => 'fields',
							'addrowclasses' => 'disable',
							'layout' => array(
								'slider_switch' => array(
									'type' => 'checkbox',
									'addrowclasses' => 'checkbox',
									'title' => esc_html__( 'Slider', 'prospect' ),
									'atts' => 'data-options="e:slider_shortcode;d:set_video_header_height"',
								),
								'slider_shortcode' => array(
									'title' => esc_html__( 'Slider', 'prospect' ),
									'addrowclasses' => 'disable',
									'type' => 'text',
								),
								'set_video_header_height' => array(
									'type' => 'checkbox',
									'addrowclasses' => 'checkbox',
									'title' => esc_html__( 'Set Video height', 'prospect' ),
									'atts' => 'data-options="e:video_header_height"',
								),
								'video_header_height' => array(
									'title' => esc_html__( 'Video height', 'prospect' ),
									'addrowclasses' => 'disable',
									'type' => 'number',
									'value' => '600',
								),
								'video_type' => array(
									'title' => esc_html__('Video type', 'prospect' ),
									'type' => 'radio',
									'value' => array(
										'self_hosted' => 	array( esc_html__('Self-hosted', 'prospect' ), true, 'e:sh_source;d:youtube_source;d:vimeo_source' ),
										'youtube'=>	array( esc_html__('Youtube clip', 'prospect' ), false, 'd:sh_source;e:youtube_source;d:vimeo_source' ),
										'vimeo' => 	array( esc_html__('Vimeo clip', 'prospect' ), false, 'd:sh_source;d:youtube_source;e:vimeo_source' ),
									),
								),
								'sh_source' => array(
									'title' => esc_html__( 'Add video', 'prospect' ),
									'type' => 'media',
								),
								'youtube_source' => array(
									'title' => esc_html__( 'Youtube video code', 'prospect' ),
									'addrowclasses' => 'disable',
									'type' => 'text',
								),
								'vimeo_source' => array(
									'title' => esc_html__( 'Vimeo embed url', 'prospect' ),
									'addrowclasses' => 'disable',
									'type' => 'text',
								),
								'use_pattern' => array(
									'type' => 'checkbox',
									'addrowclasses' => 'checkbox',
									'title' => esc_html__( 'Add pattern', 'prospect' ),
									'atts' => 'data-options="e:pattern_image"',
								),
								'pattern_image' => array(
									'title' => esc_html__( 'Pattern image', 'prospect' ),
									'addrowclasses' => 'disable',
									'type' => 'media',
								),
								'overlay_type' => array(
									'title' => esc_html__( 'Overlay type', 'prospect' ),
									'type' => 'radio',
									'subtype' => 'images',
									'value' => array(
										'none' => array( esc_html__( 'None', 'prospect' ), 	true, 'd:overlay_color;d:overlay_gradient_settings;d:overlay_opacity;', get_template_directory_uri() . '/img/fw_img/align-left.png' ),
										'color' => array( esc_html__( 'Color', 'prospect' ), 	false, 'e:overlay_color;d:overlay_gradient_settings;e:overlay_opacity;', get_template_directory_uri() . '/img/fw_img/align-left.png' ),
										'gradient' =>array( esc_html__( 'Gradient', 'prospect' ), false, 'd:overlay_color;e:overlay_gradient_settings;e:overlay_opacity;', get_template_directory_uri() . '/img/fw_img/align-center.png' ),
									),
								),
								'overlay_color' => array(
									'title' => esc_html__( 'Overlay Color', 'prospect' ),
									'atts' => 'data-default-color=""',
									'type' => 'text',
									'value'	=> ''
								),
								'overlay_opacity' => array(
									'type' => 'number',
									'title' => esc_html__( 'Opacity', 'prospect' ),
									'placeholder' => esc_html__( 'In percents', 'prospect' ),
									'value' => '40'
								),
								'overlay_gradient_settings' => array(
									'title' => esc_html__( 'Gradient settings', 'prospect' ),
									'type' => 'fields',
									'addrowclasses' => 'disable',
									'layout' => array(
										'first_color' => array(
											'type' => 'text',
											'title' => esc_html__( 'From', 'prospect' ),
											'atts' => 'data-default-color=""',
											'value'	=> ''
										),
										'second_color' => array(
											'type' => 'text',
											'title' => esc_html__( 'To', 'prospect' ),
											'atts' => 'data-default-color=""',
											'value'	=> ''
										),
										'type' => array(
											'title' => esc_html__( 'Gradient type', 'prospect' ),
											'type' => 'radio',
											'value' => array(
												'linear' => array( esc_html__( 'Linear', 'prospect' ),  true, 'e:angle;d:shape_settings' ),
												'radial' =>array( esc_html__( 'Radial', 'prospect' ), false,  'd:angle;e:shape_settings' ),
											),
										),
										'angle' => array(
											'type' => 'number',
											'title' => esc_html__( 'Angle', 'prospect' ),
											'value' => '45',
										),
										'shape_settings' => array(
											'title' => esc_html__( 'Gradient type', 'prospect' ),
											'type' => 'radio',
											'addrowclasses' => 'disable',
											'value' => array(
												'simple' => array( esc_html__( 'Simple', 'prospect' ),  true, 'e:shape;d:size_keyword;d:size' ),
												'extended' =>array( esc_html__( 'Extended', 'prospect' ), false, 'd:shape;e:size_keyword;e:size' ),
											),
										),
										'shape' => array(
											'title' => esc_html__( 'Gradient type', 'prospect' ),
											'type' => 'radio',
											'addrowclasses' => 'disable',
											'value' => array(
												'ellipse' => array( esc_html__( 'Ellipse', 'prospect' ),  true ),
												'circle' =>array( esc_html__( 'Circle', 'prospect' ), false ),
											),
										),
										'size_keyword' => array(
											'type' => 'select',
											'title' => esc_html__( 'Size keyword', 'prospect' ),
											'addrowclasses' => 'disable',
											'source' => array(
												'closest-side' => array(esc_html__( 'Closest side', 'prospect' ), false),
												'farthest-side' => array(esc_html__( 'Farthest side', 'prospect' ), false),
												'closest-corner' => array(esc_html__( 'Closest corner', 'prospect' ), false),
												'farthest-corner' => array(esc_html__( 'Farthest corner', 'prospect' ), true),
											),
										),
										'size' => array(
											'type' => 'text',
											'addrowclasses' => 'disable',
											'title' => esc_html__( 'Size', 'prospect' ),
											'atts' => 'placeholder="'.esc_html__( 'Two space separated percent values, for example (60% 55%)', 'prospect' ).'"',
										),
									),
								),
							),
						),// end of video-section
						'static_img_section' => array(
							'title' => esc_html__( 'Static image', 'prospect' ),
							'type' => 'fields',
							'addrowclasses' => 'disable',
							'layout' => array(
								'static_img' => array(
									'title' => esc_html__( 'Select an image', 'prospect' ),
									'type' => 'media',
									'url-atts' => 'readonly',
								),
							),
						),// end of static img slider-section
						'def-home-layout' => array(
							'title' 			=> esc_html__('Home Page Sidebar Layout', 'prospect' ),
							'type' 				=> 'radio',
							'subtype' 			=> 'images',
							'value' 			=> array(
								'left' 				=> 	array( esc_html__('Left', 'prospect' ), false, 'e:def-home-sidebar1;d:def-home-sidebar2;',	get_template_directory_uri() . '/img/fw_img/left.png' ),
								'right' 			=> 	array( esc_html__('Right', 'prospect' ), false, 'e:def-home-sidebar1;d:def-home-sidebar2;', get_template_directory_uri() . '/img/fw_img/right.png' ),
								'both' 				=> 	array( esc_html__('Both', 'prospect' ), false, 'e:def-home-sidebar1;e:def-home-sidebar2;', get_template_directory_uri() . '/img/fw_img/both.png' ),
								'none' 				=> 	array( esc_html__('None', 'prospect' ), true, 'd:def-home-sidebar1;d:def-home-sidebar2;', get_template_directory_uri() . '/img/fw_img/none.png' )
							),
						),
						'def-home-sidebar1' => array(
							'title' 		=> esc_html__('Sidebar', 'prospect' ),
							'type' 			=> 'select',
							'addrowclasses' => 'disable',
							'source' 		=> 'sidebars',
						),
						'def-home-sidebar2' => array(
							'title' 		=> esc_html__('Right sidebar', 'prospect' ),
							'type' 			=> 'select',
							'addrowclasses' => 'disable',
							'source' 		=> 'sidebars',
						)
					)
				),
				'page'		=> array(
					'type'			=> 'tab',
					'customizer' 	=> array( 'show' => false ),
					'icon' 			=> array( 'fa', 'calendar-plus-o' ),
					'title' 		=> esc_html__( 'Page', 'prospect' ),
					'layout'		=> array(
						'def-page-layout' => array(
							'title' 			=> esc_html__('Sidebar Position', 'prospect' ),
							'type' 				=> 'radio',
							'subtype' 			=> 'images',
							'value' 			=> array(
								'left' 				=> 	array( esc_html__('Left', 'prospect' ), false, 'e:def-page-sidebar1;d:def-page-sidebar2;',	get_template_directory_uri() . '/img/fw_img/left.png' ),
								'right' 			=> 	array( esc_html__('Right', 'prospect' ), true, 'e:def-page-sidebar1;d:def-page-sidebar2;', get_template_directory_uri() . '/img/fw_img/right.png' ),
								'both' 				=> 	array( esc_html__('Both', 'prospect' ), false, 'e:def-page-sidebar1;e:def-page-sidebar2;', get_template_directory_uri() . '/img/fw_img/both.png' ),
								'none' 				=> 	array( esc_html__('None', 'prospect' ), false, 'd:def-page-sidebar1;d:def-page-sidebar2;', get_template_directory_uri() . '/img/fw_img/none.png' )
							),
						),
						'def-page-sidebar1' => array(
							'title' 		=> esc_html__('Sidebar', 'prospect' ),
							'type' 			=> 'select',
							'addrowclasses' => 'disable',
							'source' 		=> 'sidebars',
						),
						'def-page-sidebar2' => array(
							'title' 		=> esc_html__('Right sidebar', 'prospect' ),
							'type' 			=> 'select',
							'addrowclasses' => 'disable',
							'source' 		=> 'sidebars',
						),
					)
				),
				'blog' => array(
					'type' => 'tab',
					'icon' => array( 'fa', 'fa-book' ),
					'title' => esc_html__( 'Blog', 'prospect' ),
					'layout' => array(
						'def-blog-layout' => array(
							'title' 			=> esc_html__('Sidebar Position', 'prospect' ),
							'type' 				=> 'radio',
							'subtype' 			=> 'images',
							'value' 			=> array(
								'left' 				=> 	array( esc_html__('Left', 'prospect' ), false, 'e:def-blog-sidebar1;d:def-blog-sidebar2;',	get_template_directory_uri() . '/img/fw_img/left.png' ),
								'right' 			=> 	array( esc_html__('Right', 'prospect' ), false, 'e:def-blog-sidebar1;d:def-blog-sidebar2;', get_template_directory_uri() . '/img/fw_img/right.png' ),
								'both' 				=> 	array( esc_html__('Both', 'prospect' ), false, 'e:def-blog-sidebar1;e:def-blog-sidebar2;', get_template_directory_uri() . '/img/fw_img/both.png' ),
								'none' 				=> 	array( esc_html__('None', 'prospect' ), true, 'd:def-blog-sidebar1;d:def-blog-sidebar2;', get_template_directory_uri() . '/img/fw_img/none.png' )
							),
						),
						'def-blog-sidebar1' => array(
							'title' 		=> esc_html__('Sidebar', 'prospect' ),
							'type' 			=> 'select',
							'addrowclasses' => 'disable',
							'source' 		=> 'sidebars',
						),
						'def-blog-sidebar2' => array(
							'title' 		=> esc_html__('Right sidebar', 'prospect' ),
							'type' 			=> 'select',
							'addrowclasses' => 'disable',
							'source' 		=> 'sidebars',
						),
						'def_blog_layout'	=> array(
							'title'		=> esc_html__( 'Blog Layout', 'prospect' ),
							'type'		=> 'radio',
							'subtype' 	=> 'images',
							'value' 	=> array(
								'1' 		=> array( esc_html__('Wide', 'prospect' ), true, '', get_template_directory_uri() . '/img/fw_img/large.png'),
								'medium' 	=> array( esc_html__('Medium', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/medium.png'),
								'small' 	=> array( esc_html__('Small', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/small.png'),
								'2' 		=> array( esc_html__('2 Cols', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/pinterest_2_columns.png'),
								'3'			=> array( esc_html__('3 Cols', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/pinterest_3_columns.png'),
							),
						),
						'def_post_hide_meta'	=> array(
							'title'		=> esc_html__( 'Hide Post Meta', 'prospect' ),
							'desc'	=> esc_html__( 'Properties specified here were hidden in post grid by default', 'prospect' ),
							'type'	=> 'select',
							'atts'	=> 'multiple',
							'source'	=> array(
								'date'		=> array( esc_html__( 'Date', 'prospect' ), false ),
								'post_info'	=> array( esc_html__( 'Post Info', 'prospect' ), false ),
								'comments'	=> array( esc_html__( 'Comments', 'prospect' ), false ),
								'read_more'	=> array( esc_html__( 'Read More', 'prospect' ), false ),
								'terms'		=> array( esc_html__( 'Terms', 'prospect' ), false ),
							),
						)
					)
				),
				'portfolio' => array(
					'type' => 'tab',
					'icon' => array( 'fa', 'fa-picture-o' ),
					'title' => esc_html__( 'Portfolio', 'prospect' ),
					'layout' => array(
						'def_cws_portfolio_layout'	=> array(
							'title'		=> esc_html__( 'Layout', 'prospect' ),
							'type'		=> 'radio',
							'subtype' => 'images',
							'value' => array(
								'1' => array( esc_html__('Wide', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/large.png'),
								'2' => array( esc_html__('2 Cols', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/pinterest_2_columns.png'),
								'3' => array( esc_html__('3 Cols', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/pinterest_3_columns.png'),
								'4' => array( esc_html__('4 Cols', 'prospect' ), true, '', get_template_directory_uri() . '/img/fw_img/pinterest_4_columns.png'),
							),
						),
						'def_cws_portfolio_data_to_show'	=> array(
							'title'		=> esc_html__( 'Show Meta Data', 'prospect' ),
							'type'		=> 'select',
							'atts'		=> 'multiple',
							'source'		=> array(
									'title'		=> array( esc_html__( 'Title', 'prospect' ), true ),
									'excerpt'	=> array( esc_html__( 'Excerpt', 'prospect' ), true ),
									'cats'		=> array( esc_html__( 'Categories', 'prospect' ), true )
							)
						)
					)
				),
				'staff' => array(
					'type' => 'tab',
					'icon' => array( 'fa', 'fa-picture-o' ),
					'title' => esc_html__( 'Staff', 'prospect' ),
					'layout' => array(
						'def_cws_staff_layout'	=> array(
							'title'		=> esc_html__( 'Layout', 'prospect' ),
							'type'		=> 'radio',
							'subtype' 	=> 'images',
							'value' 	=> array(
								'1' 		=> array( esc_html__('1 Col', 'prospect' ), false, '', get_template_directory_uri() . '/img/fw_img/large.png'),
								'2' 		=> array( esc_html__('2 Cols', 'prospect' ), true, '', get_template_directory_uri() . '/img/fw_img/pinterest_2_columns.png')
							),
						),
						'def_cws_staff_data_to_hide'	=> array(
							'title'		=> esc_html__( 'Hide Meta Data', 'prospect' ),
							'type'		=> 'select',
							'atts'		=> 'multiple',
							'source'		=> array(
								'department'	=> array( esc_html__( 'Departments', 'prospect' ), false ),
								'position'		=> array( esc_html__( 'Positions', 'prospect' ), false )
							)
						)
					)
				),
				'sidebars' => array(
					'type' => 'tab',
					'customizer' => array('show' => false),
					'icon' => array('fa', 'calendar-plus-o'),
					'title' => esc_html__( 'Sidebars', 'prospect' ),
					'layout' => array(
						'sidebars' => array(
							'type' => 'group',
							'addrowclasses' => 'group single_field',
							'title' => esc_html__('Sidebar generator', 'prospect' ),
							'button_title' => esc_html__('Add new sidebar', 'prospect' ),
							'layout' => array(
								'title' => array(
									'type' => 'text',
									'atts' => 'data-role="title"',
									'title' => esc_html__('Sidebar', 'prospect' ),
								)
							)
						),
						'sticky_sidebars' => array(
							'title' => esc_html__( 'Sticky Sidebars', 'prospect' ),
							'addrowclasses' => 'checkbox alt',
							'atts' => 'checked',
							'type' => 'checkbox',
					    )	
					)
				)
			)
		),
		'typography' => array(
			'type' => 'section',
			'title' => esc_html__('Typography', 'prospect' ),
			'icon' => array('fa', 'font'),
			'layout' => array(
				'menu_font_options' => array(
					'type' => 'tab',
					'init' => 'open',
					'icon' => array('fa', 'arrow-circle-o-up'),
					'title' => esc_html__( 'Menu', 'prospect' ),
					'layout' => array(
						'menu_font' => array(
							'title' => esc_html__('Menu Font', 'prospect' ),
							'type' => 'font',
							'font-color' => true,
							'font-size' => true,
							'font-sub' => true,
							'line-height' => true,
							'value' => array(
								'font-size' => '12px',
								'line-height' => '36px',
								'color' => '#1c3545',
								'font-family' => 'Poppins',
								'font-weight' => array( '500' ),
								'font-sub' => array('latin'),
							)
						)
					)
				),
				'header_font_options' => array(
					'type' => 'tab',
					'icon' => array('fa', 'arrow-circle-o-up'),
					'title' => esc_html__( 'Header', 'prospect' ),
					'layout' => array(
						'header_font' => array(
							'title' => esc_html__('Header\'s Font', 'prospect' ),
							'type' => 'font',
							'font-color' => true,
							'font-size' => true,
							'font-sub' => true,
							'line-height' => true,
							'value' => array(
								'font-size' => '28px',
								'line-height' => '39px',
								'color' => '#333333',
								'font-family' => 'Dosis',
								'font-weight' => array( '400', '600' ),
								'font-sub' => array('latin'),
							),
						)
					)
				),
				'body_font_options' => array(
					'type' => 'tab',
					'icon' => array('fa', 'arrow-circle-o-up'),
					'title' => esc_html__( 'Content', 'prospect' ),
					'layout' => array(
						'body_font' => array(
							'title' => esc_html__('Content Font', 'prospect' ),
							'type' => 'font',
							'font-color' => true,
							'font-size' => true,
							'font-sub' => true,
							'line-height' => true,
							'value' => array(
								'font-size' => '14px',
								'line-height' => '24px',
								'color' => '#808c95',
								'font-family' => 'Poppins',
								'font-weight' => array( '300', '400', '500', '600', '700' ),
								'font-sub' => array('latin'),
							)
						)
					)
				)
			)
		), // end of sections
		'social_options' => array(
			'type' => 'section',
			'title' => esc_html__('Socials', 'prospect' ),
			'icon' => array('fa', 'share-alt'),
			'layout' => array(
				'social_options'	=> array(
					'type' => 'tab',
					'init'	=> 'open',
					'icon' => array('fa', 'arrow-circle-o-up'),
					'title' => esc_html__( 'Social Options', 'prospect' ),
					'layout' => array(
						'social_group' => array(
							'type' => 'group',
							'addrowclasses' => 'group sortable',
							'title' => esc_html__('Social Networks', 'prospect' ),
							'button_title' => esc_html__('Add new social network', 'prospect' ),
							'layout' => array(
								'title' => array(
									'type' => 'text',
									'atts' => 'data-role="title"',
									'title' => esc_html__('Social account title', 'prospect' ),
								),
								'icon' => array(
									'type' => 'select',
									'addrowclasses' => 'fai',
									'source' => 'fa',
									'title' => esc_html__('Select the icon for this social contact', 'prospect' )
								),
								'url' => array(
									'type' => 'text',
									'title' => esc_html__('Url to your account', 'prospect' ),
								)
							)
						),
						'social_location' => array(
							'type' => 'select',
							'title' => esc_html__( 'Social Links Location', 'prospect' ),
							'source' => array(
								'none' => array( esc_html__( 'None', 'prospect' ), true),
								'top' => array( esc_html__( 'Top Panel', 'prospect' ), false),
								'bottom' => array( esc_html__( 'Footer', 'prospect' ), false),
								'both' => array( esc_html__( 'Both', 'prospect' ), false)
							)
						)						
					)
				)
			)
		),
		'maintenance' => array(
			'type' => 'section',
			'title' => esc_html__( 'Help & Maintenance', 'prospect' ),
			'icon' => array('fa', 'life-ring'),
			'layout' => array(
				'maintenance'	=> array(
					'type' => 'tab',
					'init'	=> 'open',
					'icon' => array('fa', 'arrow-circle-o-up'),
					'title' => esc_html__( 'Maintenance', 'prospect' ),
					'layout' => array(
						'show_loader'	=> array(
							'title'	=> esc_html__( 'Show Loader', 'prospect' ),
							'type'	=> 'checkbox',
							'addrowclasses' => 'checkbox alt',
							'value'	=> '1'		
						),
						'show_breadcrumbs'	=> array(
							'title'	=> esc_html__( 'Show breadcrumbs', 'prospect' ),
							'type'	=> 'checkbox',
							'atts' => 'checked',
							'addrowclasses' => 'checkbox alt',
							'value'	=> '1'		
						),
						'portfolio_slug' => array(
							'type' 	=> 'text',
							'addrowclasses' => 'grid-col-4',
							'title' => esc_html__( 'Portfolio Slug', 'prospect' ),
							'value'	=> 'portfolio'
						),					
						'staff_slug' => array(
							'type' 	=> 'text',
							'addrowclasses' => 'grid-col-4',
							'title' => esc_html__( 'Staff Slug', 'prospect' ),
							'value'	=> 'staff'
						),
						'_theme_purchase_code' => array(
							'title' => esc_html__( 'Item Purchase Code', 'prospect' ),
							'addrowclasses' => 'grid-col-12',
							'tooltip' => array(
								'title' => esc_html__( 'Item Purchase Code', 'prospect' ),
								'content' => esc_html__( 'Fill in this field with your Item Purchase Code in order to get the demo content and further theme updates.<br/> Please note, this code is applied to the theme only, it will not register Revolution Slider or any other plugins.', 'prospect' ),
							),													
							'type' 	=> 'text',
		       				'value' => 'abcd1234-ab12-cwst-13en-vatoelements'
						),
					)
				),
				'help' => array(
					'type' => 'tab',
					'icon' => array('fa', 'calendar-plus-o'),
					'title' => esc_html__( 'Help', 'prospect' ),
					'layout' => array(
						'help' => array(
					       'title' 			=> esc_html__( 'Help', 'prospect' ),
					       'addrowclasses' => 'grid-col-12',
					       'type' 			=> 'info',
					       'subtype'		=> 'custom',
					       'value' 			=> '<a class="cwsfw_info_button" href="http://prospect.cwsthemes.com/manual" target="_blank"><i class="fa fa-life-ring"></i>&nbsp;&nbsp;' . esc_html__( 'Online Tutorial', 'prospect' ) . '</a>&nbsp;&nbsp;<a class="cwsfw_info_button" href="https://www.youtube.com/user/cwsvideotuts/playlists" target="_blank"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;' . esc_html__( 'Video Tutorial', 'prospect' ) . '</a>',
					    ),
					)
				),				
			)
		)	
	);
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )  {
		$settings['woo_options'] = array(
			'type'		=> 'section',
			'title'		=> esc_html__( 'WooCommerce', 'prospect' ),
			'icon'		=> array('fa', 'shopping-cart'),
			'layout'	=> array(
				'woo_options' => array(
					'type' 	=> 'tab',
					'init'	=> 'open',
					'icon' 	=> array('fa', 'arrow-circle-o-up'),
					'title' => esc_html__( 'Woocommerce', 'prospect' ),
					'layout' => array(
						'woo_cart_enable'	=> array(
							'title'			=> esc_html__( 'Show WooCommerce Cart', 'prospect' ),
							'type'			=> 'checkbox',
							'addrowclasses'	=> 'checkbox alt'
						),
						'woo_sb_layout' => array(
							'title' => esc_html__('Sidebar Position', 'prospect' ),
							'type' => 'radio',
							'subtype' => 'images',
							'value' => array(
								'left' => 	array( esc_html__('Left', 'prospect' ), false, 'e:woo_sidebar;',	get_template_directory_uri() . '/img/fw_img/left.png' ),
								'right' => 	array( esc_html__('Right', 'prospect' ), true, 'e:woo_sidebar;', get_template_directory_uri() . '/img/fw_img/right.png' ),
								'none' => 	array( esc_html__('None', 'prospect' ), false, 'd:woo_sidebar;', get_template_directory_uri() . '/img/fw_img/none.png' )
							),
						),
						'woo_sidebar' => array(
							'title' => esc_html__('Select a sidebar', 'prospect' ),
							'type' => 'select',
							'addrowclasses' => 'disable',
							'source' => 'sidebars',
						),
						'woo_column' => array(
							'title' => esc_html__('Layout', 'prospect' ),
							'addrowclasses' => 'grid-col-4',
							'type' => 'select',
							'source' => array(
								'columns_1' => array(esc_html__( 'Columns 1', 'prospect' ), false),
								'columns_2' => array(esc_html__( 'Columns 2', 'prospect' ), false),
								'columns_3' => array(esc_html__( 'Columns 3', 'prospect' ), true),
								'columns_4' => array(esc_html__( 'Columns 4', 'prospect' ), false),
							),
						),
						'woo_num_products'	=> array(
							'title'			=> esc_html__( 'Products per page', 'prospect' ),
							'addrowclasses' => 'grid-col-4',
							'type'			=> 'number',
							'value'			=> get_option( 'posts_per_page' )
						),
						'woo_related_num_products'	=> array(
							'title'			=> esc_html__( 'Related products', 'prospect' ),
							'addrowclasses' => 'grid-col-4',
							'type'			=> 'number',
							'value'			=> get_option( 'posts_per_page' )
						)
					)
				)
			)
		);
	}
	return $settings;
}

?>