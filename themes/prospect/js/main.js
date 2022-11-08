"use strict";

jQuery(document).ready(function() {

var hashTagActive = false;


 jQuery('.menu-item a').click(function(event) {
if(!jQuery(this).hasClass("fancy") && jQuery(this).attr("href") != "#" && jQuery(this).attr("target") != "_blank"){
    var anchor = jQuery(this).attr("href");
    var link = anchor.replace('/#','#')
	var re = new RegExp( "^#.*$" );
	var matches = re.exec( link );

	if (matches == null && jQuery(this).attr("href").indexOf("#") != -1){
		return true;
	} else {
		event.preventDefault();
	}

    if (hashTagActive) return;
    hashTagActive = true;      
    
    if (jQuery(this).attr("href").indexOf("#") != -1 && matches !== null){

        if (jQuery(link).length){
                jQuery('html, body').animate({
                scrollTop: jQuery(link).offset().top
            }, 700, 'linear', function () {
                hashTagActive = false;
            });              
        }
    } else {
        jQuery('body').fadeOut(1000, newpage(anchor)); 
    }
       
  }
   });
   function newpage(e) {
     window.location = e;
   }
});

(function ($){
	prospect_header_covering_init ();
	cws_unite_boxed_wth_vc_stretch_row_content();	/* main.js must be loaded bedore js_composer_front.js */
	is_visible_init ();
	cws_progress_bar_init ();
	cws_milestone_init ();
	var directRTL;
	if (jQuery("html").attr('dir') == 'rtl') {
		directRTL =  'rtl'
	}else{
		directRTL =  ''
	};
	document.addEventListener( "DOMContentLoaded", function (){
		prospect_fix_vc_EqCols_stretching();
		if ( window.theme_opts.rtl ){
			prospect_fix_rtl_vc_stretchRow();
		}
		prospect_megamenu_active_cell_highlighting_init ();
		prospect_desktop_menu_hovering_init();
		jQuery( ".prospect_pb" ).cws_progress_bar();
		jQuery( ".prospect_milestone" ).cws_milestone();
		prospect_select2_init ();
		prospect_search_hovers_init ();
		prospect_top_panel_bar_init ();
		prospect_wp_widget_menu_init ();
		prospect_wp_widget_pages_init ();
		scroll_top_init ();
		prospect_msg_box_init ();
		cws_woo_product_thumbnails_carousel_init ();
		prospect_wp_standard_processing ();
		cws_sticky_sidebars_init();
		/* menu controllers */
		if ( window.cws_megamenu != undefined ){
			window.cws_megamenu_main 	= new cws_megamenu( document.querySelector( "#site_header .main_menu" ) );
			window.cws_megamenu_sticky 	= new cws_megamenu( document.querySelector( "#sticky_menu" ) );		
		}
		window.cws_mobile_menu 	= new cws_mobile_menu({
			menu_sel 		: '#mobile_menu',
			mobile_class	: '',
			toggles				: [
				{
					'behaviour'		: 'slideOnlyHeight',
					'parent_sel'	: '.menu-item',
					'opnr_sel'		: '.pointer',
					'sect_sel'		: '.sub-menu',
					'speed'			: 300,
					'active_class'	: 'active'				
				},
				{
					'behaviour'		: 'slideOnlyHeight',
					'parent_sel'	: '.wpb_wrapper',
					'opnr_sel'		: '.pointer',
					'sect_sel'		: '.megamenu_item_column_content',
					'speed'			: 300,
					'active_class'	: 'active'				
				}				
			]
		});
		window.cws_mobile_menu.set_instances ();
		/* \menu controllers */
	});

	window.addEventListener( "load", function (){
		prospect_carousel_init ();
		prospect_gallery_post_carousel_init ();
		prospect_sc_carousel_init ();
		prospect_isotope_init ();
		if ( Boolean( window.theme_opts.header_covers_slider ) ){
			prospect_header_covering_init ();
		}
		if ( Boolean( window.theme_opts.menu_stick ) && document.getElementById ( 'sticky' ) != null ){
			prospect_sticky_init ();
		}
		if ( document.getElementsByClassName( 'sandwich' ).length ){
			prospect_sandwich_init ();
		}
		cws_header_search();
		prospect_widget_carousel_init ();
		prospect_fancybox_init ();
		prospect_posts_grid_sections_dynamic_content_init ();
		prospect_posts_timeline_load_more();
		prospect_canvas_figure();
		prospect_menu_lavalamp();
		prospect_canvas_element();
		prospect_processes_resize();
		prospect_hexagon_grid();
		prospect_render_styles();
		prospect_woo_add_cart();
	}, false );
	function is_visible_init (){
		jQuery.fn.is_visible = function (){
			return ( jQuery(this).offset().top >= jQuery(window).scrollTop() ) && ( jQuery(this).offset().top <= jQuery(window).scrollTop() + jQuery(window).height() );
		}
	}
	function prospect_top_panel_bar_init (){
		var bar = document.getElementById ( 'top_panel_bar' );
		var els = $( '#top_panel_social_el, #searchform .screen-reader-text', bar );
		var i, el, item;
		for ( i = 0; i < els.length; i++ ){
			els[i].addEventListener( 'click', function ( e ){
				var el = e.srcElement ? e.srcElement : e.target;
				var item = el.parentNode;
				var input;
				e.preventDefault();
				switch( el.id ){
					case 'top_panel_social_el':
						var search_item = item.previousSibling;
						if ( cws_has_class( item, 'active' ) ){
							var icons, icons_num, icons_mid, max_duration, total_duration, duration1, duration2;
							icons = item.getElementsByClassName( "social_icon" );
							icons_num = icons.length;
							icons_mid = icons_num/2;
							max_duration = 0.4+((icons_mid-icons_num)*0.1);
							duration2 = 0.2;
							total_duration = duration1 > duration2 ? duration1 : duration2;
						    jQuery(icons).each(function(i){
								var cur = jQuery(this);
								var pos=i-icons_mid;
								if(pos>=0) pos+=1;
								var dist=Math.abs(pos);
								cur.css({
									zIndex:dist
								});

								TweenLite.to(cur,0.4+((icons_mid-dist)*0.1),{
									x:0,
									scale:1,
									ease:Quad.easeInOut
								});

								TweenLite.to(cur.find("i"),duration2,{
									scale:0,
									ease:Quad.easeIn
								});
							    setTimeout( function (){
									cws_remove_class( search_item, 'hidden' );
									cws_remove_class( item, 'active' );
							    }, total_duration * 1000);							
							});
						}
						else{
							cws_add_class( search_item, 'hidden' );
							setTimeout( function (){
								var icons, spacing, coefDir;
								icons = item.getElementsByClassName( "social_icon" );
								cws_add_class( item, 'active' );
								spacing = 40;
							    coefDir = Boolean(window.theme_opts.rtl) ? 1 : -1 ;
							    jQuery(icons).each(function(i){
							      var cur=jQuery(this);
							      var pos=i;
							      if(pos>=0) pos+=1;
							      var dist=Math.abs(pos);
							      cur.css({
							        zIndex:dist
							      });					      
							      TweenLite.to(cur,0.5*(dist),{
							        x:coefDir*pos*spacing,
							        scale:1,
							        ease:Elastic.easeOut,
							        easeParams:[1.01,0.5]
							      });							        
							      TweenLite.fromTo(cur.find("i"),0.2,{
							        scale:0
							      },{
							        delay:(0.2*dist)-0.1,
							        scale:1.0,
							        ease:Quad.easeInOut
							      })
							    })
							}, 300 );
						}
						break;
					default:
						if ( el.getAttribute( 'for' ) == 's' ){
							item = el.parentNode.parentNode.parentNode;
							input = el.nextElementSibling;
							if ( cws_has_class( item, 'active' ) ){
								cws_remove_class( item, 'active' );
								setTimeout( function (){
									input.blur();
								}, 0);
							}
							else{
								cws_add_class( item, 'active' );
								setTimeout( function (){
      								input.focus();
								}, 300);
							}
						}
				}
			}, false );
		}
	}
	function prospect_sticky_init (){
		window.sticky 			= {};
		window.sticky.active 	= !cws_is_mobile();
		window.sticky.init 		= false;
		window.sticky.class 	= 'stick';
		window.sticky.section 	= document.getElementById( 'sticky' );
		window.sticky.page_content	= document.getElementById( 'page' );
		window.sticky.start_pos 	= $( window.sticky.page_content ).offset().top;
		window.sticky.last_scroll_pos = window.pageYOffset;
		window.addEventListener( 'resize', function (){
			var mobile = sticky_is_mobile();
			var scroll_pos;
			if ( !mobile && !window.sticky.active ){
				scroll_pos = window.pageYOffset;				
				if ( scroll_pos < window.sticky.last_scroll_pos && scroll_pos > window.sticky.start_pos ){
					set_sticky( true );
				}
				window.sticky.active = true;
			}
			else if ( mobile && window.sticky.active ){
				reset_sticky( true );
				window.sticky.active = false;				
			}		
		});
		window.addEventListener( 'scroll', function (){
			var scroll_pos = window.pageYOffset;
			var stick_h = jQuery('#sticky').outerHeight(true);
			if ( window.sticky.active && jQuery('#sticky').hasClass('smart') ){
				if ( scroll_pos < window.sticky.last_scroll_pos && scroll_pos > window.sticky.start_pos && !window.sticky.init ){	
					set_sticky( true );
				}
				else if ( ( scroll_pos > window.sticky.last_scroll_pos || scroll_pos < window.sticky.start_pos  ) && window.sticky.init ){
					reset_sticky( true ); 
				}
			} else if ( window.sticky.active && jQuery('#sticky').hasClass('standard') ){
				if ( scroll_pos > stick_h ){	
					jQuery('#sticky').addClass('stick');
				}
				else if (  scroll_pos < stick_h ){
					jQuery('#sticky').removeClass('stick');
				}
			}
			window.sticky.last_scroll_pos = scroll_pos;
		});
	}
	function set_sticky ( animated ){
		var animated = animated != undefined ? animated : false;
		if ( animated ){
			cws_add_class( window.sticky.section, window.sticky.class );
			window.sticky.init = true;
		}
		else{
			window.sticky.section.style.display = 'block';
			window.sticky.init = true;
		}
	}
	function reset_sticky ( animated ){
		var animated = animated != undefined ? animated : false;
		if ( animated ){
			cws_remove_class( window.sticky.section, window.sticky.class );
			window.sticky.init = false;
		}
		else{
			window.sticky.section.style.display = 'none';
			window.sticky.init = false;
		}
	}
	function sticky_is_mobile (){
		return cws_has_class( document.body, 'cws_mobile' );
	}

	function prospect_header_covering_init (){
		// var i;
		// var sections = document.querySelectorAll( '#main_slider_section' );
		// var section;
		// if ( sections.length ){
		// 	for ( i = 0; i < sections.length; i++ ){
		// 		section = sections[i];
		// 		if ( !section.querySelectorAll( ".prospect_msg_box.prospect_module.warn" ).length ){
		// 			prospect_header_covers_section_init ( section );
		// 		}
		// 	}
		// }	
	}
	function prospect_header_covers_section_init ( section ){
		// prospect_set_header_covering ( section );
		// window.addEventListener( 'resize', function (){
		// 	prospect_set_header_covering( section );
		// }, false )
	}
	function prospect_set_header_covering ( section ){
		// var prev, top_offset, admin_bar, admin_bar_height;
		// admin_bar = document.getElementById( 'wpadminbar' );
		// admin_bar_height = admin_bar ? admin_bar.offsetHeight : 0;
		// switch ( section.id ){
		// 	case "main_slider_section":
		// 		prev = cws_get_flowed_previous ( section );
		// 		if ( !prev ){
		// 			return false;
		// 		}
		// 		top_offset = prev.offsetHeight + $( prev ).offset().top - admin_bar_height
		// 		section.style.marginTop = "-" + top_offset + "px";
		// 		break;
		// }
	}
	function cws_header_search (){
		jQuery(".site_header .menu_search_button").click(function(){
			jQuery(this).parents('.site_header').find('.menu_search_wrap').fadeToggle(200);
			jQuery(this).parents('.site_header').addClass('search-on');
			jQuery(this).parents('.site_header').find('.menu_search_wrap .search-field').focus();
		})
		jQuery('.site_header .menu_search_wrap .search_back_button').click(function(){
			jQuery(this).parents('.site_header').find('.menu_search_wrap').fadeToggle(200);
			jQuery(this).parents('.site_header').removeClass('search-on');
		})
	}	


	function prospect_sandwich_init (){
		var i, j, sections, section, switcher, section_sel;
		window.sandwich = {};
		window.sandwich.init = false;
		window.sandwich.class = 'sandwich';
		window.sandwich.active_class = 'sandwich_active';
		sections = document.getElementsByClassName( window.sandwich.class );
		window.sandwich.sections = [];
		for ( i = 0; i < sections.length; i++ ){
			section = sections[i];
			prospect_sandwich_section_init ( section );
		}
		window.sandwich.init = true;
	}
	function prospect_sandwich_section_init ( section ){
		var section 	= section;
		var switcher 	= section.getElementsByClassName( 'sandwich_switcher' )[0];
		if ( switcher === undefined ){
			return false;
		}
		var action 		= switcher.getAttribute( 'data-sandwich-action' );
		var handler, mobile_menu, mobile_menu_wrapper;
		window.sandwich.sections.push( {
			'section' 	: section,
			'switcher' 	: switcher,
			'action'	: action
		});
		switch ( action ){
			case 'toggle_mobile_menu':
				handler = function (){
					mobile_menu 		= section.querySelector( '#mobile_menu' );
					if ( mobile_menu == null ){
						return;
					}
					mobile_menu_wrapper = $( mobile_menu ).closest( '#mobile_menu_wrapper' );
					if ( cws_has_class( section, window.sandwich.active_class ) ){
						mobile_menu_wrapper.slideUp( 300 );
						cws_remove_class( section, window.sandwich.active_class );
					}
					else{
						mobile_menu_wrapper.slideDown( 300 );
						cws_add_class( section, window.sandwich.active_class );						
					}
				};				
				break;
			default:
				handler = function (){
					if ( cws_has_class( section, window.sandwich.active_class ) ){
						cws_remove_class( section, window.sandwich.active_class );
					}
					else{
						cws_add_class( section, window.sandwich.active_class );
					}
				};
		};
		switcher.addEventListener( 'click', handler, false );
	}  
	function prospect_select2_init (){
		jQuery("select").select2();
	}
	function prospect_search_hovers_init (){
		var i, el, target_el;
		var els = document.querySelectorAll( ".widget #searchsubmit, .widget .woocommerce-product-search input[type='submit']" );
		for ( i = 0; i < els.length; i++ ){
			prospect_search_hover_init ( els[i] );
		}
	}
	function prospect_search_hover_init ( el ){
		var target_el = $(el).siblings('.screen-reader-text')[0];
		el.addEventListener( 'mouseenter', function (){
			cws_add_class( target_el, 'hover' );
		});
		el.addEventListener( 'mouseout', function (){
			cws_remove_class( target_el, 'hover' );
		});
	}
	function prospect_wp_widget_menu_init (){
		$('.widget .menu .menu-item.menu-item-has-children > .pointer').on( 'click', function( e ) {
			var pointer, item, sub_menu, active_class;
			e.stopPropagation();
			active_class = 'active';
			pointer = this;
			item = pointer.parentNode;
			sub_menu = $( pointer ).siblings( 'ul' );
			if( sub_menu.length ) {
				if ( cws_has_class( item, active_class ) ){
					$( sub_menu ).slideUp( 500 );
					cws_remove_class( item, active_class );
					cws_remove_class( sub_menu[0], active_class );
				}
				else{
					$( sub_menu ).slideDown( 500 );
					cws_add_class( item, active_class );
					cws_add_class( sub_menu[0], active_class );					
				}
			} 
		});
	}
	function prospect_wp_widget_pages_init (){
		$('.widget .page_item.page_item_has_children > a').on( 'click', function( e ) {
			e.stopPropagation();
		});
		$('.widget .page_item.page_item_has_children').on( 'click', function( e ) {
			var item, sub_menu, active_class;
			e.stopPropagation();
			active_class = 'active';
			item = this;
			sub_menu = $(item).children('ul');
			if( sub_menu.length ) {
				if ( cws_has_class( item, active_class ) ){
					$( sub_menu ).slideUp( 500 );
					cws_remove_class( item, active_class );
					cws_remove_class( sub_menu[0], active_class );
				}
				else{
					$( sub_menu ).slideDown( 500 );
					cws_add_class( item, active_class );
					cws_add_class( sub_menu[0], active_class );					
				}
			} 
		});
	}
	function prospect_fancybox_init ( area ){
		var area = area == undefined ? document : area;
		if ( typeof $.fn.fancybox == 'function' ){
			$(".fancy").fancybox();
			$("a[rel^='attachment'][href*='.jpg'], a[rel^='attachment'][href*='.jpeg'], a[rel^='attachment'][href*='.png'],	a[rel^='attachment'][href*='.gif'],.gallery-icon a[href*='.jpg'],.gallery-icon a[href*='.jpeg'],.gallery-icon a[href*='.png'],.gallery-icon a[href*='.gif']").fancybox();
		}
	}
	function prospect_posts_grid_sections_dynamic_content_init (){
		var i, section;
		var sections = document.getElementsByClassName( 'posts_grid dynamic_content' );
		for ( i = 0; i < sections.length; i++ ){
			section = sections[i];
			prospect_posts_grid_section_dynamic_content_init ( section );
		}
	}
	function prospect_posts_grid_section_dynamic_content_init ( section ){

		var i, section_id, grid, loader, form, data_field, paged_field, filter_field, data, request_data, response_data, response_data_str, pagination, page_links, page_link, filter, load_more;
		if ( section == undefined ) return;
		grid = section.getElementsByClassName( 'prospect_grid' );
		if ( !grid.length ) return;
		grid = grid[0];
		loader = section.getElementsByClassName( 'cws_loader_holder' );
		loader = loader.length ? loader[0] : null; 
		form = section.getElementsByClassName( 'posts_grid_data' );
		if ( !form.length ) return;
		form = form[0];
		data_field = form.getElementsByClassName( 'posts_grid_ajax_data' );
		if ( !data_field.length ) return;
		data_field = data_field[0];
		data = data_field.value;
		data = JSON.parse( data );
		section_id = data['section_id'];
		request_data = response_data = data;

    	prospect_posts_grid_dynamic_pagination({
    		'section'		: section,
    		'section_id'	: section_id,
    		'grid'			: grid,
    		'loader'		: loader,
    		'form'			: form,
    		'data_field'	: data_field,
    		'paged_field'	: paged_field,
    		'filter_field'	: filter_field,
    		'data'			: data
		});

		filter = $( '.filter', section );
		var event_select;
		if ( $('.posts_grid_filter').hasClass('select_filter') ) {
			event_select = 'change';
		} else if ( $('.posts_grid_filter').hasClass('simple_filter') ) {
			event_select = 'click';
		}


		if ( filter.length ){
			filter.on( event_select, function (e){
				var filter = $(this);
				var filter_val;
				if ( event_select === "click" ) {
    				e.preventDefault();
					filter.addClass('active').siblings().removeClass('active')
					filter_val = filter.attr('data-filter');
				} else {
					filter_val = filter.val();
				}
				if ( loader != null ){
					if ( !cws_has_class( loader, "filter_action" ) ){
						cws_add_class( loader, "filter_action" );
					}
					if ( !cws_has_class( loader, "active" ) ){
						cws_add_class( loader, "active" );
					}
				}
				request_data['current_filter_val']	= filter_val;
				request_data['page']				= 1;
				$.post( ajaxurl, {
					'action'		: 'prospect_posts_grid_dynamic_filter',
					'data'			: request_data
				}, function ( response, status ){
					var response_container, old_items, new_items, pagination, new_pagination, img_loader;
					response_container = document.createElement( "div" );
					response_container.innerHTML = response;
					new_items = $( ".item", response_container );
					new_items.hide();
					new_pagination = response_container.getElementsByClassName( 'pagination dynamic' );
					new_pagination = new_pagination.length ? new_pagination[0] : null;
					old_items = $( ".item", grid );
					pagination = section.getElementsByClassName( 'pagination dynamic' );
					pagination = pagination.length ? pagination[0] : null;	
					$( grid ).append( new_items );
					prospect_hexagon_grid();
					img_loader = imagesLoaded ( grid );
					img_loader.on( "always", function (){
						prospect_canvas_figure();
						prospect_gallery_post_carousel_init( grid );
						prospect_fancybox_init ( grid );
						cws_touch_events_fix ( grid );
						if ($( grid ).hasClass('isotope')){
							$( grid ).isotope( 'remove', old_items );
						} else {
							new_items.fadeIn();
							$( old_items ).remove();
						}
						prospect_hexagon_grid();
						if ($( grid ).hasClass('isotope')) {
							$( grid ).isotope( 'appended', new_items );
							$( grid ).isotope( 'layout' );
						}
					    if (Retina.isRetina()) {
				        	jQuery(window.retina.root).trigger( "load" );
					    }
					    if ( pagination != null ){
						    cws_add_class ( pagination, "hiding animated fadeOut" );
						    setTimeout( function (){
						    	pagination.parentNode.removeChild( pagination );
						    	if ( new_pagination != null ){
							    	cws_add_class( new_pagination, "animated fadeIn" );
							    	section.insertBefore( new_pagination, form );
							    	prospect_posts_grid_dynamic_pagination({
								    		'section'		: section,
								    		'section_id'	: section_id,
								    		'grid'			: grid,
								    		'loader'		: loader,
								    		'form'			: form,
								    		'data_field'	: data_field,
								    		'paged_field'	: paged_field,
								    		'filter_field'	: filter_field,
								    		'data'			: data
							    		});					    		
						    	}
						    }, 300);
					    }
					    else{
					    	if ( new_pagination != null ){
						    	cws_add_class( new_pagination, "animated fadeIn" );
						    	section.insertBefore( new_pagination, form );
						    	prospect_posts_grid_dynamic_pagination({
							    		'section'		: section,
							    		'section_id'	: section_id,
							    		'grid'			: grid,
							    		'loader'		: loader,
							    		'form'			: form,
							    		'data_field'	: data_field,
							    		'paged_field'	: paged_field,
							    		'filter_field'	: filter_field,
							    		'data'			: data
						    	});	
							}					    	
					    }
						response_data['current_filter_val']	= filter_val;
						response_data['page']		= 1;
						response_data_str = JSON.stringify( response_data );
						data_field.value = response_data_str;
						if ( loader != null ){
							if ( cws_has_class( loader, "filter_action" ) ){
								cws_remove_class( loader, "filter_action" );
							}
							if ( cws_has_class( loader, "active" ) ){
								cws_remove_class( loader, "active" );
							}
						}
					});
				});
			})
		}

		load_more = section.getElementsByClassName( 'prospect_load_more' );
		if ( load_more.length ){
			load_more = load_more[0];
			load_more.addEventListener( 'click', function ( e ){
				var page, next_page, max_paged;
				e.preventDefault();
				if ( !cws_has_class( loader, "load_more_action" ) ){
					cws_add_class( loader, "load_more_action" );
				}
				if ( !cws_has_class( loader, "active" ) ){
					cws_add_class( loader, "active" );
				}
				page = data['page'];
				max_paged = data['max_paged'];
				next_page = page + 1;
				request_data['page'] = next_page;
				if ( next_page >= max_paged ){
					cws_add_class( load_more, 'hiding animated fadeOut' );
					setTimeout( function (){
						load_more.parentNode.removeChild( load_more );
					}, 300);
				}
				$.post( ajaxurl, {
					'action'		: 'prospect_posts_grid_dynamic_pagination',
					'data'			: request_data
				}, function ( response, status ){
					var response_container, new_items, img_loader;
					response_container = document.createElement( "div" );
					response_container.innerHTML = response;
					new_items = $( ".item", response_container );
					if ($( grid ).hasClass('isotope')){
						new_items.addClass( "hidden" );
					} else {
						new_items.hide();
					}
					$( grid ).append( new_items );
					img_loader = imagesLoaded ( grid );
					img_loader.on( "always", function (){
						prospect_canvas_figure();
						prospect_hexagon_grid();
						prospect_gallery_post_carousel_init( new_items );
						prospect_fancybox_init ( grid );
						cws_touch_events_fix ( grid );
						if ($( grid ).hasClass('isotope')) {
							new_items.removeClass( "hidden" );
						} else {
							new_items.fadeIn();
						}
						if ($( grid ).hasClass('isotope')) {	
							$( grid ).isotope( 'appended', new_items );
							$( grid ).isotope( 'layout' );
						}
					    if (Retina.isRetina()) {
				        	jQuery(window.retina.root).trigger( "load" );
					    }
						response_data['page'] = next_page;
						response_data_str = JSON.stringify( response_data );
						data_field.value = response_data_str;
						if ( loader != null ){
							if ( cws_has_class( loader, "load_more_action" ) ){
								cws_remove_class( loader, "load_more_action" );
							}
							if ( cws_has_class( loader, "active" ) ){
								cws_remove_class( loader, "active" );
							}
						}
					});
				});
			}, false );
		}
	}


	function prospect_posts_timeline_load_more() {
		jQuery(document).on('click', '.prospect_load_more_time_line', function(e) {
			e.preventDefault();
			var page, next_page, max_paged, response_data, response_data_str, data_field;
			var button = jQuery(this);
			var section = jQuery(this).parent('.latest_post_post_list');
			var field = section.find('.posts_grid_data');
			field = field[0];
			data_field = field.getElementsByClassName( 'posts_grid_ajax_data' );
			if ( !data_field.length ) return;
			data_field = data_field[0];
			var data = data_field.value;
			data = JSON.parse( data );
			var grid = section.find('.posts_time_line_wrap');;
			if ( !grid.length ) return;
			grid = grid[0];
			var request_data = response_data = data;


			page = data['page'];
			max_paged = data['max_paged'];
			next_page = page + 1;
			request_data['page'] = next_page;	


			if ( next_page >= max_paged ){
				button.addClass('hiding animated fadeOut');
				setTimeout( function (){
					button.remove();
					$(".latest_post_list_end").css('display','block');
				}, 600);
			}

			$.post( ajaxurl, {
				'action'		: 'prospect_posts_timeline',
				'data'			: request_data
			}, function ( response, status ){
				var response_container, new_items, img_loader;
				response_container = document.createElement( "div" );
				response_container.innerHTML = response;
				new_items = $( ".post", response_container );
				new_items.hide();
				new_items.removeClass('block_show');
				$( grid ).append( new_items );
				img_loader = imagesLoaded ( grid );
				img_loader.on( "always", function (){
					prospect_canvas_figure();
					prospect_hexagon_grid();
					prospect_gallery_post_carousel_init( new_items );
					prospect_fancybox_init ( grid );
					cws_touch_events_fix ( grid );
					$(new_items).each(function(index, el) {
						$(this).slideDown();
						$(this).delay(200*index).queue(function(){
							$(this).addClass('block_show');
							$(this).dequeue();
						});
					});
				    if (Retina.isRetina()) {
			        	jQuery(window.retina.root).trigger( "load" );
				    }
					response_data['page'] = next_page;
					response_data_str = JSON.stringify( response_data );
					data_field.value = response_data_str;
				});
			});
		});
	}


	function prospect_posts_grid_dynamic_pagination ( args ){
		var i, section, section_id, section_offset, grid, loader, form, data_field, paged_field, filter_field, data, request_data, response_data, pagination, page_links, page_link;

		section = args['section'];
		section_id = args['section_id'];
		grid = args['grid'];
		loader = args['loader'];
		form = args['form'];
		data_field = args['data_field'];
		paged_field	= args['paged_field'];
		filter_field = args['filter_field'];
		data = request_data = response_data = args['data'];
		section_offset = $( section ).offset().top;

		pagination = section.getElementsByClassName( 'pagination dynamic' );
		if ( !pagination.length ) return;
		pagination = pagination[0];
		page_links = pagination.getElementsByTagName( 'a' );
		for ( i = 0; i < page_links.length; i++ ){
			page_link = page_links[i];
			page_link.addEventListener( 'click', function ( e ){
				e.preventDefault();
				var el = e.srcElement ? e.srcElement : e.target;
				if ( loader != null ){
					if ( !cws_has_class( loader, "pagination_action" ) ){
						cws_add_class( loader, "pagination_action" );
					}
					if ( !cws_has_class( loader, "active" ) ){
						cws_add_class( loader, "active" );
					}
				}
				request_data['req_page_url'] = el.href;
				$.post( ajaxurl, {
					'action'		: 'prospect_posts_grid_dynamic_pagination',
					'data'			: request_data
				}, function ( response, status ){
					var section_offset_top, response_container, page_number_field, old_items, new_items, pagination, old_page_links, new_pagination, new_page_links, img_loader, page_number, response_data_str;
					response_container = document.createElement( "div" );
					response_container.innerHTML = response;
					new_items = $( ".item", response_container );
					new_items.hide();
					new_pagination = response_container.getElementsByClassName( 'pagination dynamic' );
					new_pagination = new_pagination.length ? new_pagination[0] : null;
					new_page_links = new_pagination != null ? new_pagination.getElementsByClassName( 'page_links' ) : [];
					new_page_links = new_page_links.length ? new_page_links[0] : null;
					page_number_field = response_container.getElementsByClassName( 'prospect_posts_grid_dynamic_pagination_page_number' );
					page_number_field = page_number_field.length ? page_number_field[0] : null;
					page_number = page_number_field != null ? page_number_field.value : "";						
					section_offset_top = $( section ).offset().top;
					old_items = $( ".item", grid );
					pagination = section.getElementsByClassName( 'pagination dynamic' );
					pagination = pagination.length ? pagination[0] : null;
					old_page_links = pagination != null ? pagination.getElementsByClassName( 'page_links' ) : [];
					old_page_links = old_page_links.length ? old_page_links[0] : null;	
					if ($('.prospect_grid').hasClass('isotope')) {					
						$( grid ).isotope( 'remove', old_items );
						$(old_items).remove();
					}
					if ($('.dynamic_content').hasClass('hexagon_grid')) {					
						$(old_items).fadeOut().remove();
					}
					if ( window.scrollY > section_offset_top ){
						jQuery( 'html, body' ).stop().animate({
							scrollTop : section_offset_top
						}, 300);
					}
					$( grid ).append( new_items );
					img_loader = imagesLoaded ( grid );
					img_loader.on( "always", function (){
						prospect_canvas_figure();
						prospect_hexagon_grid();
						prospect_gallery_post_carousel_init( grid );
						prospect_fancybox_init ( grid );
						cws_touch_events_fix ( grid );
						new_items.show();
						if ($('.prospect_grid').hasClass('isotope')) {
							$( grid ).isotope( 'appended', new_items );
							$( grid ).isotope( 'layout' );
						}
					    if (Retina.isRetina()) {
				        	jQuery(window.retina.root).trigger( "load" );
					    }
					    cws_add_class ( old_page_links, "hiding animated fadeOut" );
					    setTimeout( function (){
							try {
								pagination.removeChild ( old_page_links );
							}
							catch(i) {
								return false;
							}
					    	cws_add_class( new_page_links, "animated fadeIn" );
					    	pagination.appendChild ( new_page_links );
					    	prospect_posts_grid_dynamic_pagination({
						    		'section'		: section,
						    		'section_id'	: section_id,
						    		'grid'			: grid,
						    		'loader'		: loader,
						    		'form'			: form,
						    		'data_field'	: data_field,
						    		'paged_field'	: paged_field,
						    		'filter_field'	: filter_field,
						    		'data'			: data
					    		});
					    }, 300);
						response_data['page'] = page_number.length ? page_number : 1;
						response_data_str = JSON.stringify( response_data );
						data_field.value = response_data_str;
						if ( loader != null ){
							if ( cws_has_class( loader, "pagination_action" ) ){
								cws_remove_class( loader, "pagination_action" );
							}
							if ( cws_has_class( loader, "active" ) ){
								cws_remove_class( loader, "active" );
							}
						}
						if ( window.scrollY > section_offset ){
							jQuery( 'html, body' ).stop().animate({
								scrollTop : section_offset
							}, 300);
						}
					});
				});
			});
		}	
	}

	/* isotope */

	function prospect_isotope_init (){
		if ( typeof $.fn.isotope == 'function' ){
			$(".isotope").isotope({
				itemSelector: ".item"
			});
		}
	}

	function prospect_carousel_init ( area ){
		var area = area == undefined ? document : area;
		$( ".prospect_carousel", area ).each( function (){
			var owl = jQuery(this);
			var pag = owl.hasClass( 'carousel_pagination' );
			var carousel = this;
			var section = $( carousel ).closest( ".posts_grid" );
			var nav = $( ".carousel_nav", section );
			var cols = carousel.dataset.cols;
			var args = {
				itemsel: "*:not(style)",	/* for staff members because they have custom color styles */
				slideSpeed: 300,
				navigation: false,
				pagination: pag,
				direction: directRTL
			};
			switch ( cols ){
				case '4':
					args.itemsCustom = [
						[0,1],
						[579,2],
						[980,3],
						[1170, 4]
					];
					break
				case '3':
					args.itemsCustom = [
						[0,1],
						[579,2],
						[980,3]
					];
					break
				case '2':
					args.itemsCustom = [
						[0,1],
						[579,2]
					];
					break
				default:
					args.singleItem = true;
			}
			$( carousel ).owlCarousel( args );
			if ( nav.length ){
				$( ".next", nav ).click( function (){
					$( carousel ).trigger( "owl.next" );
				});
				$( ".prev", nav ).click( function (){
					$( carousel ).trigger( "owl.prev" );
				});
			}
		});
	}

	/* \isotope */

	/* carousel */
	function prospect_widget_carousel_init(){
		jQuery(".widget_carousel").each(function (){
			var owl = jQuery(this);
			var bullets_nav = owl.hasClass( 'bullets_nav' );
			owl.owlCarousel({
				singleItem: true,
				slideSpeed: 300,
				navigation: false,
				pagination: bullets_nav,
				direction: directRTL
			});
			jQuery(this).parent().find(".carousel_nav .next").click(function (){
					owl.trigger('owl.next');
			});
			jQuery(this).parent().find(".carousel_nav .prev").click(function (){
					owl.trigger('owl.prev');
			});
		});
	}
	function prospect_gallery_post_carousel_init( area ){
		var area = area == undefined ? document : area;
		jQuery( ".gallery_post_carousel", area ).each(function (){
			var owl = jQuery(this);
			owl.owlCarousel({
				singleItem: true,
				slideSpeed: 300,
				navigation: false,
				pagination: false,
				direction: directRTL
			});
			jQuery(this).parent().find(".carousel_nav.next").click(function (){
					owl.trigger('owl.next');
			});
			jQuery(this).parent().find(".carousel_nav.prev").click(function (){
					owl.trigger('owl.prev');
			});
		});
	}
	function prospect_count_carousel_items ( cont, layout_class_prefix, item_class, margin ){
		var re, matches, cols, cont_width, items, item_width, margins_count, cont_without_margins, items_count;
		if ( !cont ) return 1;
		layout_class_prefix = layout_class_prefix ? layout_class_prefix : 'grid-';
		item_class = item_class ? item_class : 'item';
		margin = margin ? margin : 30;
		re = new RegExp( layout_class_prefix + "(\\d+)" );
		matches = re.exec( cont.attr( "class" ) );
		cols = matches == null ? 1 : parseInt( matches[1] );
		cont_width = cont.outerWidth();
		items = cont.children( "." + item_class );
		item_width = items.eq(0).outerWidth();
		margins_count = cols - 1;
		cont_without_margins = cont_width - ( margins_count * margin ); /* margins = 30px */
		items_count = Math.round( cont_without_margins / item_width );	
		return items_count;
	}
	function prospect_sc_carousel_init (){
		jQuery( ".prospect_sc_carousel" ).each( prospect_sc_carousel_controller );
		window.addEventListener( 'resize', function (){
			jQuery( ".prospect_sc_carousel" ).each( prospect_sc_carousel_controller );		
		}, false);
	}
	function prospect_sc_carousel_controller (){
		var el = jQuery( this );
		var bullets_nav = el.hasClass( "bullets_nav" );
		var content_wrapper = jQuery( ".prospect_wrapper", el );
		var owl = content_wrapper;
		var content_top_level = content_wrapper.children().filter( function(){
			return cws_empty_p_filter_callback.call( this ) && cws_br_filter_callback.call( this ); /* fix wpautop & br tags */
		});
		var nav = jQuery( ".carousel_nav", el );
		var cols = el.data( "columns" );
		var items_count, grid_class, col_class, items, children, is_init, matches, args;
		if ( content_top_level.is( ".gallery[class*='galleryid-']" ) ){
			owl = content_top_level.filter( ".gallery[class*='galleryid-']" );
			is_init = owl.hasClass( "owl-carousel" );
			if ( is_init ) owl.data( "owlCarousel" ).destroy();
			owl.children( ":not(.gallery-item)" ).remove();
			items_count = prospect_count_carousel_items( owl, "gallery-columns-", "gallery-item" );
		}
		else if ( content_top_level.is( ".woocommerce" ) ){
			owl = content_top_level.children( ".products" );
			is_init = owl.hasClass( "owl-carousel" );
			if ( is_init ) owl.data( "owlCarousel" ).destroy();
			owl.children( ":not(.product)" ).remove();
			matches = /columns-\d+/.exec( content_top_level.attr( "class" ) );
			grid_class = matches != null && matches[0] != undefined ? matches[0] : '';
			owl.addClass( grid_class );
			items_count = prospect_count_carousel_items( owl, "columns-", "product" );
			owl.removeClass( grid_class );
		}
		else if ( content_top_level.is( "ul" ) ){
			owl = content_top_level;
			is_init = owl.hasClass( "owl-carousel" );
			if ( is_init ) owl.data( "owlCarousel" ).destroy();
			children = owl.children();
			children.each( function (){
				if ( !cws_empty_p_filter_callback.call( this ) || !cws_br_filter_callback.call( this ) ){
					$( this ).remove();
				}
			});
			items = owl.children();
			grid_class = "crsl-grid crsl-grid-" + cols;
			col_class = "grid_col_" + Math.round( 12 / cols );
			owl.addClass( grid_class );
			if ( !items.hasClass( "item" ) ) items.addClass( "item" )
			items.addClass( col_class );
			items_count = prospect_count_carousel_items( owl, "crsl-grid-", "item" );
			owl.removeClass( grid_class );
			items.removeClass( col_class );
		}
		else {
			is_init = owl.hasClass( "owl-carousel" );
			if ( is_init ) owl.data( "owlCarousel" ).destroy();
			children = owl.children();
			children.each( function (){
				if ( !cws_empty_p_filter_callback.call( this ) || !cws_br_filter_callback.call( this ) ){
					$( this ).remove();
				}
			});
			items = owl.children();
			grid_class = "crsl-grid-" + cols;
			col_class = "grid_col_" + Math.round( 12 / cols );
			owl.addClass( grid_class );
			if ( !items.hasClass( "item" ) ) items.addClass( "item" )
			items.addClass( col_class );
			items_count = prospect_count_carousel_items( owl, "crsl-grid-", "item" );
			owl.removeClass( grid_class );
			items.removeClass( col_class );
		}
		args = {
			slideSpeed: 300,
			navigation: false,
			pagination: bullets_nav,
			dragDirection: directRTL,
			direction: directRTL
		}
		switch ( items_count ){
			case 4:
				args.itemsCustom = [
					[0,1],
					[479,2],
					[980,3],
					[1170, 4]
				];
				break;
			case 3:
				args.itemsCustom = [
					[0,1],
					[479,2],
					[980,3]
				];	
				break;
			case 2:
				args.itemsCustom = [
					[0,1],
					[479,2]
				];	
				break;
			default:
				args.singleItem = true;
		}
		owl.owlCarousel(args);
		if ( nav.length ){
			jQuery( ".next", nav ).click( function (){
				owl.trigger( "owl.next" );
			});
			jQuery( ".prev", nav ).click( function (){
				owl.trigger( "owl.prev" );
			});
		}	
	}
	function cws_woo_product_thumbnails_carousel_init (){
		$( ".woo_product_thumbnail_carousel" ).each( function (){
			var cols, args, prev, next;
			var owl = $( this );
			var matches = /carousel_cols_(\d+)/.exec( this.className );
			if ( !matches ){
				cols = 3;
			}
			else{
				cols = matches[1];
			}
			args = {
				slideSpeed: 300,
				navigation: false,
				pagination: false,
				items: cols,
				direction: directRTL		
			}
			owl.owlCarousel( args );
			prev = this.parentNode.querySelector( ":scope > .prev" );
			next = this.parentNode.querySelector( ":scope > .next" );
			if ( prev ){
				prev.addEventListener( "click", function (){
					owl.trigger( "owl.prev" );
				}, false );
			}
			if ( next ){
				next.addEventListener( "click", function (){
					owl.trigger( "owl.next" );
				}, false );
			}
		});
	}
	/* \carousel */
	/* scroll to top */
	function scroll_top_vars_init (){
		window.scroll_top = {
			el : jQuery( "#scroll_to_top" ),
			anim_in_class : "fadeIn",
			anim_out_class : "fadeOut"
		};
	}
	function scroll_top_init (){
		scroll_top_vars_init ();
		scroll_top_controller ();
		window.addEventListener( 'scroll', scroll_top_controller, false);
		window.scroll_top.el.on( 'click', function (){
			jQuery( "html, body" ).animate( {scrollTop : 0}, '300', function (){
				window.scroll_top.el.css({
					"pointer-events" : "none"
				});
				window.scroll_top.el.addClass( window.scroll_top.anim_out_class );
			});
		});
	}
	function scroll_top_controller (){
		var scroll_pos = window.pageYOffset;
		if ( window.scroll_top == undefined ) return;
		if ( scroll_pos < 1 && window.scroll_top.el.hasClass( window.scroll_top.anim_in_class ) ){
			window.scroll_top.el.css({
				"pointer-events" : "none"
			});
			window.scroll_top.el.removeClass( window.scroll_top.anim_in_class );
			window.scroll_top.el.addClass( window.scroll_top.anim_out_class );
		}
		else if( scroll_pos >= 1 && !window.scroll_top.el.hasClass( window.scroll_top.anim_in_class ) ){
			window.scroll_top.el.css({
				"pointer-events" : "auto"
			});
			window.scroll_top.el.removeClass( window.scroll_top.anim_out_class );
			window.scroll_top.el.addClass( window.scroll_top.anim_in_class );
		}
	}
	/* \scroll to top */

	/* message box */
	function prospect_msg_box_init (){
		jQuery( document ).on( 'click', '.prospect_msg_box.closable .close_button', function (){
			var cls_btn = jQuery(this);
			var el = cls_btn.closest( ".prospect_msg_box" );
			el.fadeOut( function (){
				el.remove();
			});
		});
	}
	/* \message box */
	/* progress bar */
	function cws_progress_bar_init (){
		jQuery.fn.cws_progress_bar = function (){
			jQuery(this).each( function (){
				var el = jQuery(this);
				var done = false;
				if (!done) done = progress_bar_controller(el);
				jQuery(window).scroll(function (){
					if (!done) done = progress_bar_controller(el);
				});
			});
		}
	}

	function progress_bar_controller (el){
		if (el.is_visible()){
			var progress = el.find(".prospect_pb_progress");
			var value = parseInt( progress.attr("data-value") );
			var width = parseInt(progress.css('width').replace(/%|(px)|(pt)/,""));
			if ( width < value ){
				var progress_interval = setInterval( function(){
					width ++;
					progress.css("width", width+"%");
					if (width == value){
						clearInterval(progress_interval);
					}
				}, 5);
			}
			return true;
		}
		return false;
	}
	/* \progress bar */
	/* milestone */
	function cws_milestone_init (){
		jQuery.fn.cws_milestone = function (){
			jQuery(this).each( function (){		
				var el = jQuery(this);
				var number_container = el.find(".prospect_milestone_number");
				var done = false;
				if (number_container.length){
					if ( !done ) done = milestone_controller (el, number_container);
					jQuery(window).scroll(function (){
						if ( !done ) done = milestone_controller (el, number_container);
					});
				}
			});
		}
	}

	function cws_sticky_sidebars_init(){
		var sticky_sidebars ;
		if (sticky_sidebars == 1 && !cws_is_mobile_device() ){
			jQuery('.sidebar').theiaStickySidebar({
				additionalMarginTop: 60,
				additionalMarginBottom: 60
			});   
		}
	}

	function milestone_controller (el, number_container){
		var od, args;
		var speed = number_container.data( 'speed' );
		var number = number_container.text();
		if (el.is_visible()){
			args= {
				el: number_container[0],
				format: 'd',
			};
			if ( speed ) args['duration'] = speed;
			od = new Odometer( args );
			od.update( number );
			return true;
		}
		return false;
	}
	function get_digit (number, digit){
		var exp = Math.pow(10, digit);
		return Math.round(number/exp%1*10);
	}
	/* \milestone */

	function cws_ios_touch_events_empty_handler ( e ){
	    e.preventDefault();
	    return true;
	}
	function cws_touch_events_fix ( area ){
		area = area != undefined ? area : document;
		if ( cws_is_mobile_device() ){
			jQuery( ".pic", area ).on( "mouseenter", cws_ios_touch_events_empty_handler );
		}
	}
	cws_touch_events_fix ();

	function cws_unite_boxed_wth_vc_stretch_row_content (){
		var i;
		var boxed = cws_has_class( document.getElementById( "document" ), "boxed" );
		$( ".vc_row[data-vc-stretch-content]" ).each( function (){
			var ofs = $( this ).offset().left;
			this.style.paddingLeft = ofs + "px";
			this.style.paddingRight = ofs + "px";
		});
	}

	function prospect_wp_standard_processing (){
		var galls;
		jQuery( "img[class*='wp-image-']" ).each( function (){
			var canvas_id;
			var el = jQuery( this );
			var parent = el.parent( "a" );
			var align_class_matches = /align\w+/.exec( el.attr( "class" ) );
			var align_class = align_class_matches != null && align_class_matches[0] != undefined ? align_class_matches[0] : "";
			var added_class = "";
			if ( align_class.length ){
				if ( parent.length ){
					el.removeClass( align_class );
				}
				added_class += " " + align_class;
			}
			if ( parent.length ){
				parent.addClass( added_class );
			}
		});
		galls = jQuery( ".gallery[class*='galleryid-']" );
		if ( galls.length ){
			galls.each( function (){
				var gall = jQuery( this );
				var gall_id = cws_uniq_id ( "wp_gallery_" );
				jQuery( "a", gall ).attr( "data-fancybox-group", gall_id );
			});
		}
		jQuery( ".gallery-icon a[href*='.jpg'], .gallery-icon a[href*='.jpeg'], .gallery-icon a[href*='.png'], .gallery-icon a[href*='.gif'], .cws_img_frame[href*='.jpg'], .cws_img_frame[href*='.jpeg'], .cws_img_frame[href*='.png'], .cws_img_frame[href*='.gif']" ).fancybox();
	}

	function prospect_desktop_menu_hovering_init (){
		var els = document.querySelectorAll( "#site_header .menu-item.menu-item-has-children, #site_header .menu-item.menu-item-object-megamenu_item, #sticky .menu-item.menu-item-has-children, #sticky .menu-item.menu-item-object-megamenu_item" );
		var i, el;
		var avail_class = "avail";
		for ( i = 0; i < els.length; i++ ){
			el = els[i];
			if ( !$( el ).closest( ".widget.widget_nav_menu" ).length ){
				prospect_desktop_menu_el_hovering_init ( el );
			}
		}
	}
	function prospect_desktop_menu_el_hovering_init ( el ){
		var avail_class = "avail";
		var visible_class = "visible";
		var avail_delay = cws_has_class( el, "menu-item-object-megamenu_item" ) ? 300 : 300;
		var flag = false;
		var interval;
		el.addEventListener( "mouseenter", function ( e ){
			if ( !cws_has_class( el, avail_class ) ){
				cws_add_class( el, avail_class );
			}
			interval = setInterval( function (){
				if ( cws_has_class( el, avail_class ) ){
					if ( !cws_has_class( el, visible_class ) ){
						cws_add_class( el, visible_class );
					}
					clearInterval( interval );
				}
			}, 5 );
		}, false );
		el.addEventListener( "mouseleave", function ( e ){
			if ( cws_has_class( el, visible_class ) ){
				cws_remove_class( el, visible_class );
			}
			setTimeout( function (){
				if ( !$( el ).is( ":hover" ) ){
					if ( cws_has_class( el, avail_class ) ){
						cws_remove_class( el, avail_class );
					}
				}				
			}, avail_delay ); 	
		}, false );	
	}
	function prospect_megamenu_active_cell_highlighting_init (){
		$( ".main_menu .cws_megamenu_item .menu-item.current-menu-item" ).parents( ".menu-item" ).addClass( "current-menu-item" );
	}
	function prospect_fix_rtl_vc_stretchRow (){
		var rows = document.querySelectorAll( ".vc_row[data-vc-full-width-init='true']" );
		var i, row;
		for ( i = 0; i < rows.length; i++ ){
			row = rows[i];
			row.style.left = row.style.left.replace( /-/g, "" );
		}
	}
	function prospect_fix_vc_EqCols_stretching(){
		$( ".vc_row.vc_row-o-equal-height > .wpb_column > .vc_column-inner > .wpb_wrapper" ).each( function (){
			var wrapper = this;
			var flowed_children = [];
			var i, child, is_flowed;
			for ( i = 0; i < wrapper.childNodes.length; i++ ){
				child = wrapper.childNodes[i];
				is_flowed = cws_is_element_flowed( child );
				if ( is_flowed ){
					flowed_children.push( child );
				}
			}
			if ( flowed_children.length === 1 ){
				cws_add_class( wrapper, "children_height_stretchedByFlex" );
			}
		} );

	}
	function prospect_canvas_figure() {
		var len = $('[class^="figure_container"]').length;
		for (i = 0; i < len; i++) {
			var container = $('body').find('[class^="figure_container"]').eq(i),
				imgsource = container.children('img').attr('src'),
				figure = container.children('canvas')[0],
				prefix_2x = /@2x/g;
			if ($(container.children('img')).length == 0) continue;
			if (prefix_2x.test(imgsource)){
				imgsource = imgsource.replace(/@2x/g,"");
			}
			var fig = figure.getContext('2d');
			var img = new Image();
			img.src = imgsource;
			if (container.hasClass('medium')) {
				var num = 1.9;
			} else if (container.hasClass('mini2')) {
				var num = 6.65;
			} else if (container.hasClass('mini')) {
				var num = 4.8;
			} else if (container.hasClass('small')) {
				var num = 3.2;
			} else if (container.hasClass('big')) {
				var num = 1.375;
			} else if (container.hasClass('giant')) {
				var num = 1.04;
			} else if (container.hasClass('thumbnail')) {
				var num = 2.75;
			}
			fig.drawImage(img, 0, 0);
			fig.save();
			fig.globalCompositeOperation = 'destination-in';
			fig.beginPath();
			if (container.hasClass('hexagon')) {
				fig.moveTo(55 / num, 80 / num);
				fig.arcTo(190 / num, 0 / num, 335 / num, 80 / num, 55 / num);
				fig.arcTo(380 / num, 110 / num, 380 / num, 280 / num, 55 / num);
				fig.arcTo(380 / num, 325 / num, 250 / num, 395 / num, 55 / num);
				fig.arcTo(190 / num, 435 / num, 55 / num, 330 / num, 55 / num);
				fig.arcTo(5 / num, 325 / num, 5 / num, 110 / num, 55 / num);
				fig.arcTo(5 / num, 110 / num, 55 / num, 80 / num, 55 / num);
			}
			if (container.hasClass('pentagon')) {
				fig.moveTo(60 / num , 90 / num );
				fig.arcTo(195 / num, -10 / num , 335 / num , 80 / num , 50 / num );
				fig.arcTo(385 / num , 125 / num , 368 / num , 248 / num , 50 / num );
				fig.arcTo(315 / num , 353 / num , 255 / num , 355 / num , 50 / num );
				fig.arcTo(80 / num , 353 / num , 5 / num , 110 / num , 50 / num );
				fig.arcTo(3 / num , 125 / num , 78 / num , 85 / num , 50 / num );
			}
			if (container.hasClass('triangle')) {
				fig.moveTo(90 / num, 150 / num);
				fig.arcTo(180 / num, -10 / num, 270 / num, 90 / num, 50 / num);
				fig.arcTo(390 / num, 330 / num, 320 / num, 360 / num, 50 / num);
				fig.arcTo(-10 / num, 350 / num, 30 / num, 200 / num, 50 / num);
			}
			fig.fill();
			container.children('img').hide();
		}
	}
	function prospect_menu_lavalamp(){
		jQuery("#main_menu").lavalamp();
	}
	function prospect_canvas_element() {
		var len = $('[class^="prospect_process_column_line"]').length;
		for (i = 0; i < len; i++) {
			var container = $('body').find('[class^="prospect_process_column_line"]').eq(i),
				figure = container.children('canvas')[0];
			var ctx = figure.getContext('2d');
			ctx.beginPath();
		    ctx.setLineDash([10,5]);
		    ctx.lineWidth = 2;
		    ctx.strokeStyle = '#475a67';
		    ctx.moveTo(0,0);
		    ctx.bezierCurveTo(20,5,30,25,35,60);
    		ctx.bezierCurveTo(40,125,50,145,70,150);
		    ctx.stroke();
		}
	}
	function prospect_processes_resize() {
		if ($('.cws_sc_processes_wrap').width() < 1192) {
			$('.prospect_process_column_line').css('top','40px');
			$('.prospect_process_column:nth-child(even) .prospect_process_column_line').css('top','-20px');
		} else {
			$('.prospect_process_column_line').css('top','75px');
			$('.prospect_process_column:nth-child(even) .prospect_process_column_line').css('top','20px');
		}
		if ($('.cws_sc_processes_wrap').width() < 900) {
			$('.cws_sc_processes_wrap').addClass('simple');
		} else{
			$('.cws_sc_processes_wrap').removeClass('simple');
		}
		if ($('.cws_sc_processes_wrap').width() < 768) {
			$('.prospect_process_column').addClass('process_col_2');
		} else{
			$('.prospect_process_column').removeClass('process_col_2');
		}
		if ($('.cws_sc_processes_wrap').width() < 400) {
			$('.prospect_process_column').addClass('process_col_1');
		} else{
			$('.prospect_process_column').removeClass('process_col_1');
		}
		if ($('.posts_grid_filter').width() < 650) {
			$('.posts_grid_filter').addClass('select_filter');
			$('.posts_grid_filter').removeClass('simple_filter');
			prospect_posts_grid_sections_dynamic_content_init ( );
		} 
	}
	window.addEventListener( 'resize', function (){
			prospect_processes_resize();
			prospect_hexagon_grid();
		}, false )
	function prospect_hexagon_grid() {
		if ($('.cws_portfolio_posts_grid:not(.posts_grid_carousel) .portfolio_item_grid_post').hasClass('hex_style')) {
			var divs = $('.portfolio_item_grid_post');
			var k = true;
			var wrap_item, w, col_num, newval;
			var wrap_width = $(".cws_portfolio_posts_grid.hexagon_grid .prospect_grid").outerWidth();
			col_num = 4;
			if ( wrap_width < 1199 ) {
				col_num = 3;
			} 
			if ( wrap_width < 970) {
				col_num = 2;
			} 
			if ( wrap_width < 660) {
				col_num = 1;
			} 
			var wrap_fw = (col_num + 1) * 210
			if (wrap_width < 445) {
				wrap_fw = col_num * 210
			}
			var wrap_pw = (wrap_width - wrap_fw) / 2
			$(".cws_portfolio_posts_grid.hexagon_grid .prospect_grid").css({ "padding-left":wrap_pw,"padding-right":wrap_pw})

			var wrap_num1 = col_num;
			divs.removeClass('wrap1').removeClass('wrap2');
			for(var i = 0; i < divs.length; i+=1) {
				if (k) {
					wrap_item = i + wrap_num1;
					w = 1;
				} else {
					wrap_item = i + wrap_num1 + 1;
					w = 2;
				}
				divs.slice(i, wrap_item).addClass('wrap'+w+'');
				if (k) {
					i += wrap_num1-1;
					k = false;
				} else {
					i += wrap_num1;
					k = true;
				}
			}
		}
	}

	function prospect_render_styles(){
		var css = '';
		var head = document.head || document.getElementsByTagName('head')[0];
		var style = document.createElement('style');  
			jQuery('.render_styles').each(function(index, el) {
				var data = '';
				var data = JSON.parse(jQuery(el).data('style'));
				jQuery(el).removeAttr('data-style');
				css += data;
			});

		style.type = 'text/css';
		if (style.styleSheet){
		  style.styleSheet.cssText = css;
		} else {
		  style.appendChild(document.createTextNode(css));
		}
		head.appendChild(style);
	}

	function prospect_woo_add_cart(){
		$('li.product .add_to_cart_button').on( 'click', function() {
			$(this).parents('.product').addClass('added_product');
		});
	}


}(jQuery))



















