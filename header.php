<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('home-newspro'); ?>>
<?php wp_body_open(); ?>
    <div class="adbar-area d-none d-lg-block pd-top-30 pd-bottom-30" style="background-color: #F1F4FF;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 align-self-center">
                    <div class="logo text-md-left">
                        <?php
                            the_custom_logo();
                            if ( is_front_page() && is_home() ) :
                                ?>
                            <a class="main-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
                                <?php
                            else :
                                ?>
                                <a class="main-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
                                <?php
                            endif;
                        ?>
                    </div>
                </div>
                <div class="col-md-6 text-md-right text-center">
                    <?php dynamic_sidebar( 'ab_blog_header_ad_section' ); ?>
                </div>
                <div class="col-lg-3 align-self-center">
                    <?php dynamic_sidebar( 'ab_blog_header_sidebar' ); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- navbar start -->
    <div class="navbar-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo d-lg-none d-block">
						<div class="site-branding">
                        <?php
                            the_custom_logo();
                            if ( is_front_page() && is_home() ) :
                                ?>
                            <a class="main-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
                                <?php
                            else :
                                ?>
                                <a class="main-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
                                <?php
                            endif;
                        ?>
						</div><!-- .site-branding -->
                    </div>
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#miralax_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="nav-right-part nav-right-part-mobile">
                    <a class="cart-header" href="#"><img src="assets/img/icon/cart.png" alt="img"><span>5</span></a>
                    <a class="search header-search" href="#"><i class="fa fa-search"></i></a>
                </div>
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'menu-1',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'miralax_main_menu',
                        'menu_class'        => 'navbar-nav menu-open',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                ?>
            </div>
        </nav>
    </div>
    <!-- navbar end -->
