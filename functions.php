<?php

	// add_action('wp_footer', 'show_template');
	// function show_template() {
	// 	global $template;
	// 	print_r($template);
	// }

	function jquery_cdn(){
	  if(!is_admin()){
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
		wp_enqueue_script('jquery');
	  }
	}
	add_action('wp_enqueue_scripts', 'jquery_cdn');
	function rotary_scripts(){
		global $wp_query;

		wp_register_script(
			'bootstrap-script', 
			'//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', 
			array('jquery'), 
			'', 
			true
		);
		wp_register_script(
			'reload-posts', 
			'/wp-content/themes/rotary/js/reload-posts.js', 
			array('jquery'), 
			'', 
			true
		);
		wp_register_script(
			'css-grid-masonry',
			'/wp-content/themes/rotary/js/css-grid-masonry.js', 
			array('jquery'), 
			'', 
			true
		);
		wp_register_script(
			'gallery',
			'/wp-content/themes/rotary/js/gallery.js', 
			array('jquery'), 
			'', 
			true
		);
		wp_register_script(
			'documents',
			'/wp-content/themes/rotary/js/documents.js', 
			array('jquery'), 
			'', 
			true
		);
		wp_register_script(
			'show-club-members',
			'/wp-content/themes/rotary/js/show-club-members.js', 
			array('jquery'), 
			'', 
			true
		);
		wp_register_script(
			'retrieve-members-list',
			'http://ismyrotaryclub.org/ClubMembers/ClubMembers.cfm?AccountID=7610&ClubID=27090&MemberTypeIDs=0,5,16&callback=showClubMembers', 
			array('jquery'), 
			'', 
			true
		);
		wp_register_script(
			'show-leaders-page',
			'/wp-content/themes/rotary/js/show-leaders-page.js', 
			array('jquery'), 
			'', 
			true
		);
		wp_register_script(
			'retrieve-leaders-list',
			'http://IsMyRotaryClub.org/Club/clubleaders.cfm?D=7610&ClubID=27090&callback=showLeadersPage', 
			array('jquery'), 
			'', 
			true
		);

		wp_enqueue_script( 'bootstrap-script' );

		if( is_page_template( 'template-newsletters.php' ) || is_page_template( 'template-calendar.php' ) )
			wp_enqueue_script( 'reload-posts' );

		if( is_page_template( 'template-stories.php' ) )
			wp_enqueue_script( 'css-grid-masonry' );

		if( is_page_template( 'template-gallery.php' ) )
			wp_enqueue_script( 'gallery' );

		if( is_page_template( 'template-documents.php' ) )
			wp_enqueue_script( 'documents' );

		if( is_page_template( 'template-members.php' ) ){
			wp_enqueue_script( 'show-club-members' );
			wp_enqueue_script( 'retrieve-members-list' );
		}

		if( is_page_template( 'template-leaders.php' ) ){
			wp_enqueue_script( 'show-leaders-page' );
			wp_enqueue_script( 'retrieve-leaders-list' );
		}


		$params = array(
			'ajaxurl' 				=> admin_url( 'admin-ajax.php' ),
			'nonce'					=> wp_create_nonce( 'rotary-nonce' ),
		);
		wp_localize_script( 'reload-posts', 'ajaxParams', $params);

		$storyParams = array(
			'posts'					=> json_encode( $wp_query->query_vars ),
			'current_page'			=> get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
			'max_page'				=> ceil( $wp_query->found_posts / get_option( 'posts_per_page' ) ),
		);
		wp_localize_script( 'css-grid-masonry', 'ajaxParams', $params );
		wp_localize_script( 'css-grid-masonry', 'storyParams', $storyParams );
	}
	add_action('wp_enqueue_scripts', 'rotary_scripts', 100);
	
	function rotary_styles(){
	  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
	  wp_register_style('rotary', get_template_directory_uri() . '/style.css');
	  
	  wp_enqueue_style('bootstrap-css');
	  wp_enqueue_style('rotary');
	}
	add_action('wp_enqueue_scripts', 'rotary_styles');

	if(function_exists('acf_add_options_page')){
	  acf_add_options_page(array(
	    'page_title' => 'Global Site Settings',
	    'menu_title' => 'Global Settings',
	    'menu_slug' => 'global-settings',
	    'capability' => 'edit_posts',
	    'redirect' => false
	  ));
	}

	// load fonts
	function load_fonts() {
		wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700', false );
	}
	add_action( 'wp_enqueue_scripts', 'load_fonts' );

	// load font awesome
	function load_font_awesome(){
		wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.3.1/css/all.css');
	}
	add_action('wp_enqueue_scripts','load_font_awesome');

	// Register Navigation Menus
	register_nav_menus( array(
		'header_menu' => 'Header Menu',
		'main_menu' => 'Main Menu',
		'footer_menu' => 'Footer Menu'
	) );

	/*
	 * Newsletter Custom Post Type
	 */
	function create_post_type_newsletter() {
	  register_post_type( 'newsletter',
	    array(
	      'labels' 			=> array(
	        'name' 			=> __( 'Newsletters' ),
	        'singular_name' => __( 'Newsletter' )
	      ),
	      'public' 			=> true,
	      'has_archive' 	=> false,
	      'rewrite'			=> array( 'slug' => 'newsletters' )
	    )
	  );
	}
	add_action( 'init', 'create_post_type_newsletter' );

	/*
	 * Story Custom Post Type
	 */
	function create_post_type_story() {
	  register_post_type( 'story',
	    array(
	      'labels' 			=> array(
	        'name' 			=> __( 'Stories' ),
	        'singular_name' => __( 'Story' )
	      ),
	      'public' 			=> true,
	      'has_archive' 	=> false,
	      'rewrite'			=> array( 'slug' => 'stories' )
	    )
	  );
	}
	add_action( 'init', 'create_post_type_story' );

	include "functions/custom-nav-walker.php";
	include "functions/footer-nav-walker.php";
	include "functions/button-shortcode.php";
	include "functions/reload-event-posts.php";
	include "functions/reload-newsletter-posts.php";
	include "functions/story-view-more.php";
?>