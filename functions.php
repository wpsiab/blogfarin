<?php
/**
 * Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blog
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blog_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Blog, use a find and replace
		* to change 'blog' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'blog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add default posts Excerpt.

	class Excerpt {

		// Default length (by WordPress)
		public static $length = 55;
	  
		// So you can call: my_excerpt('short');
		public static $types = array(
			'short' => 25,
			'regular' => 55,
			'long' => 100
		  );
	  
		/**
		 * Sets the length for the excerpt,
		 * then it adds the WP filter
		 * And automatically calls the_excerpt();
		 *
		 * @param string $new_length 
		 * @return void
		 * @author Baylor Rae'
		 */
		public static function length($new_length = 55) {
		  Excerpt::$length = $new_length;
	  
		  add_filter('excerpt_length', 'Excerpt::new_length');
	  
		  Excerpt::output();
		}
	  
		// Tells WP the new length
		public static function new_length() {
		  if( isset(Excerpt::$types[Excerpt::$length]) )
			return Excerpt::$types[Excerpt::$length];
		  else
			return Excerpt::$length;
		}
	  
		// Echoes out the excerpt
		public static function output() {
		  the_excerpt();
		}
	  
	  }
	  
	  // An alias to the class
	  function my_excerpt($length = 55) {
		Excerpt::length($length);
	  }

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'blog' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'blog_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function blog_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'blog' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'blog' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blog_scripts() {
	wp_enqueue_style( 'vendor-style', get_template_directory_uri().'/assets/css/vendor.css', array(), _S_VERSION );
	wp_enqueue_style( 'magnific-style', get_template_directory_uri().'/assets/css/magnific-popup.css', array(), _S_VERSION );
	wp_enqueue_style( 'style-style', get_template_directory_uri().'/assets/css/style.css', array(), _S_VERSION );
	wp_enqueue_style( 'responsive-style', get_template_directory_uri().'/assets/css/responsive.css', array(), _S_VERSION );

	wp_enqueue_script( 'blog-vendor', get_template_directory_uri() . '/assets/js/vendor.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'blog-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'blog-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blog_scripts' );

/**
* Navwalker setup 
*/
require_once(get_template_directory().'/inc/navwalker.php');
/**
* Custom Widger 
*/
require_once(get_template_directory().'/inc/widget/abblog-widget-init.php');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Implement the theme function.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

