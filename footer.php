<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog
 */

?>

	<footer id="" class="footer-area pd-top-60" style="background-image: url(assets/img/footer/bg.png);">
	<div class="container">           
            <div class="">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="widget widget_about">
                            <div class="logo">
                                <?php dynamic_sidebar( 'ab_blog_footer_logo' ); ?>       
                            </div>
                            <?php dynamic_sidebar( 'ab_blog_footer_business_des' ); ?>
                            
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                    <?php dynamic_sidebar( 'ab_blog_footer_menu_link' ); ?>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <?php dynamic_sidebar( 'ab_blog_footer_useful_link' ); ?>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <?php dynamic_sidebar( 'ab_blog_footer_latest_post' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <?php dynamic_sidebar( 'ab_blog_footer_copyright' ); ?>
                    </div>
                </div>
            </div>
        </div>
	</footer><!-- # -->

<?php wp_footer(); ?>

</body>
</html>

