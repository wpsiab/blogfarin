<?php
/**
 * Theme Name: AB Blog
 * Description: WP AB Blog custom widget.
 * Version: 1.0.0
 * Author: Md.Abdullah
 * Author URI: https://wnewspepers.xyz/portfolio
 * Text domain: Abdullah
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Function to register the widget areas(sidebar) and widgets.
 */
function ab_blog_widgets_init() {

	// Registering Header sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Sidebar', 'ab_blog' ),
			'id'            => 'ab_blog_header_sidebar',
			'description'   => esc_html__( 'Shows widgets in header section just above the main navigation menu.', 'ab_blog' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</aside>',
		)
	);

	// Registering the Front Page: Slider Area Sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: Slider Area', 'ab_blog' ),
			'id'            => 'ab_blog_front_page_slider_area',
			'description'   => esc_html__( 'Show widget just below menu. Suitable for TG: Featured Category Slider.', 'ab_blog' ),
			'before_title'  => '<h4 class="title"><span class="line">',
			'after_title'   => '</span></h4>',
		)
	);

	// Registering the Front Page: Area beside Top News.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: Full Top News', 'ab_blog' ),
			'id'            => 'ab_blog_top_news',
			'description'   => esc_html__( 'Show widget beside the slider. Suitable for TG: Highlighted Posts.', 'ab_blog' ),			
			'before_title'  => '<h4 class="title"><span class="line">',
			'after_title'   => '</span></h4>',

		)
	);

	// Registering the Front Page: Fashion and Lifestyle.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: Half Fashion and Lifestyle', 'ab_blog' ),
			'id'            => 'ab_blog_fashion_lifestyle',
			'description'   => esc_html__( 'Show widget beside the slider. Suitable for TG: Highlighted Posts.', 'ab_blog' ),			
			'before_title'  => '<h4 class="title"><span class="line">',
			'after_title'   => '</span></h4>',

		)
	);

	// Registering the Front Page: Content Top Section Sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: Full Trending News', 'ab_blog' ),
			'id'            => 'ab_blog_trending_news',
			'description'   => esc_html__( 'Content Top Section', 'ab_blog' ),
			'before_title'  => '<h4 class="title"><span class="line">',
			'after_title'   => '</span></h4>',
		)
	);

	// Registering the Front Page: News Three Sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: News Three', 'ab_blog' ),
			'id'            => 'ab_blog_front_page_news_three',
			'description'   => esc_html__( 'Full News Three Section', 'ab_blog' ),
		)
	);

	// Registering the Front Page: Video Section Sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: Video News', 'ab_blog' ),
			'id'            => 'ab_blog_video_news',
			'description'   => esc_html__( 'Content Buttom Right Section', 'ab_blog' ),
			'before_title'  => '<h4 class="title"><span  class="line">',
			'after_title'   => '</span></h4>',
		)
	);

	// Registering the Front Page: Covid-19 Section Sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: Covid News', 'ab_blog' ),
			'id'            => 'ab_blog_covid_news',
			'description'   => esc_html__( 'Content Buttom Right Section', 'ab_blog' ),
			'before_title'  => '<h4 class="title"><span  class="line">',
			'after_title'   => '</span></h4>',
		)
	);

	// Registering the Front Page: Editor Choices Section Sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: Editor Choices', 'ab_blog' ),
			'id'            => 'ab_blog_editor_choice',
			'description'   => esc_html__( 'Content Buttom Right Section', 'ab_blog' ),
			'before_title'  => '<h4 class="title"><span  class="line">',
			'after_title'   => '</span></h4>',
		)
	);

	// Registering the Front Page: More News Section Sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: More News', 'ab_blog' ),
			'id'            => 'ab_blog_more_news_section',
			'description'   => esc_html__( 'Content Buttom Right Section', 'ab_blog' ),
			'before_title'  => '<h4 class="title"><span  class="line">',
			'after_title'   => '</span></h4>',
		)
	);

	// Registering Home Top left sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Home Top Left Sidebar', 'ab_blog' ),
			'id'            => 'ab_blog_home_top_left_sidebar',
			'description'   => esc_html__( 'Shows widgets at Left sideber.', 'ab_blog' ),
		)
	);

	// Registering Home Middle left sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Home Top Middle Sidebar', 'ab_blog' ),
			'id'            => 'ab_blog_home_middle_left_sidebar',
			'description'   => esc_html__( 'Shows widgets at Middle Left sideber.', 'ab_blog' ),
		)
	);

	// Registering Home Buttom left sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Home buttom Left Sidebar', 'ab_blog' ),
			'id'            => 'ab_blog_home_buttom_left_sidebar',
			'description'   => esc_html__( 'Shows widgets at Buttom Left sideber.', 'ab_blog' ),
		)
	);
	
	// Registering Single sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Single Page left Sidebar', 'ab_blog' ),
			'id'            => 'ab_blog_single_page_left_sidebar',
			'description'   => esc_html__( 'Shows widgets at Single page left sideber.', 'ab_blog' ),
		)
	);
	// Registering Single Related Post sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Single Page Related Post', 'ab_blog' ),
			'id'            => 'ab_blog_single_page_related_post',
			'description'   => esc_html__( 'Shows widgets at Single page Related Post.', 'ab_blog' ),
		)
	);
	// Registering Page sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sideber', 'ab_blog' ),
			'id'            => 'ab_blog_page_sideber',
			'description'   => esc_html__( 'Shows widgets at Page Sideber.', 'ab_blog' ),
		)
	);

	// Registering Single page buttom Ad sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Single Page Ad', 'ab_blog' ),
			'id'            => 'ab_blog_single_page_ad_sidebar',
			'description'   => esc_html__( 'Shows widgets at Single page Ad sideber.', 'ab_blog' ),
		)
	);

	// Registering the Front Page: Header Ad Section Sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: Header Ad', 'ab_blog' ),
			'id'            => 'ab_blog_header_ad_section',
			'description'   => esc_html__( 'Header Ad Section', 'ab_blog' ),			
		)
	);

	// Registering Font page top ad sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Font Page Top Ad', 'ab_blog' ),
			'id'            => 'ab_blog_font_page_top_sidebar',
			'description'   => esc_html__( 'Shows widgets on Font Page Top Ad.', 'ab_blog' ),			
		)
	);

	// Registering Font Page Middle Ad sidebar.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Font Page Middle Ad ', 'ab_blog' ),
			'id'            => 'ab_blog_font_page_middle_ad',
			'description'   => esc_html__( 'Shows widgets Font Page Middle Ad.', 'ab_blog' ),
		)
	);

	// Registering footer Footer Logo.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Logo', 'ab_blog' ),
			'id'            => 'ab_blog_footer_logo',
			'description'   => esc_html__( 'Shows widgets at footer logo.', 'ab_blog' ),
			'before_widget' => '<aside id="%1$s" class="widget widget_about">',
			'after_widget'  => '</aside>',
		)
	);

	// Registering footer Business Description.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Business Description', 'ab_blog' ),
			'id'            => 'ab_blog_footer_business_des',
			'description'   => esc_html__( 'Shows widgets at footer Business Description.', 'ab_blog' ),
			'before_widget' => '<div id="" class="">',
			'after_widget'  => '</div>',
		)
	);
		// Registering footer menu Link.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Menu Link', 'ab_blog' ),
				'id'            => 'ab_blog_footer_menu_link',
				'description'   => esc_html__( 'Shows widgets at footer Menu link.', 'ab_blog' ),
				'before_widget' => '<div id="" class="widget widget_link">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);

	// Registering footer Useful Link.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Useful Link', 'ab_blog' ),
			'id'            => 'ab_blog_footer_useful_link',
			'description'   => esc_html__( 'Shows widgets at footer useful link.', 'ab_blog' ),
			'before_widget' => '<div id="" class="widget widget_link">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	// Registering footer Latest Posts.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Latest Posts', 'ab_blog' ),
			'id'            => 'ab_blog_footer_latest_post',
			'description'   => esc_html__( 'Shows widgets at footer Latest Posts.', 'ab_blog' ),
			'before_widget' => '<div id="" class="widget widget_link">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	// Registering footer Copyright.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Copyright', 'ab_blog' ),
			'id'            => 'ab_blog_footer_copyright',
			'description'   => esc_html__( 'Shows widgets at footer copyright.', 'ab_blog' ),
		)
	);
	
	register_widget( 'Abblog_full_top_news' );
	register_widget( 'Abblog_full_trending_news' );
	register_widget( 'Abblog_half_more_news' );
	register_widget( 'Abblog_editor_choices' );
	register_widget( 'Abblog_covid_news' );
	register_widget( 'Abblog_fashion_lifestyle' );
	register_widget( 'Abblog_news_video' );
	register_widget( 'Abblog_top_slider' );
	register_widget( 'Abblog_recent_post_sideber' );
	register_widget( 'Abblog_related_post' );
	register_widget( 'Abblog_page_more_news' );
}

add_action( 'widgets_init', 'ab_blog_widgets_init' );

require get_template_directory() . '/inc/widget/news-widgets/abblog-full-top-news.php';
require get_template_directory() . '/inc/widget/news-widgets/abblog-full-trending-news.php';
require get_template_directory() . '/inc/widget/news-widgets/abblog-half-more-news.php';
require get_template_directory() . '/inc/widget/news-widgets/abblog-editor-choices.php';
require get_template_directory() . '/inc/widget/news-widgets/abblog-covid-news.php';
require get_template_directory() . '/inc/widget/news-widgets/abblog-fashion-lifestyle.php';
require get_template_directory() . '/inc/widget/news-widgets/abblog-new-video.php';
require get_template_directory() . '/inc/widget/news-widgets/abblog-top-slider.php';
require get_template_directory() . '/inc/widget/news-widgets/abblog-recent-post-sideber.php';
require get_template_directory() . '/inc/widget/news-widgets/abblog-related-post.php';
require get_template_directory() . '/inc/widget/news-widgets/abblog-page_more-news.php';
