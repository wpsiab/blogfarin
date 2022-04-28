<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog
 */
?>

<!-- post-banner start -->
        
<?php dynamic_sidebar( 'ab_blog_front_page_slider_area' ); ?>                     
<?php dynamic_sidebar( 'ab_blog_top_news' ); ?> 

    <div class=" bg-gray pd-top-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php dynamic_sidebar( 'ab_blog_font_page_top_sidebar' ); ?> 
                </div>
            </div>
        </div>
    </div>

<!-- fashion-lifestyle-news-area Start -->
    <div class="pd-top-30 pd-bottom-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <?php dynamic_sidebar( 'ab_blog_fashion_lifestyle' ); ?>  
                </div>
                <div class="col-lg-4 col-md-6">
                <?php dynamic_sidebar( 'ab_blog_home_top_left_sidebar' ); ?>  
                </div>
            </div>
        </div>
    </div>
<!-- fashion-lifestyle-news-area end -->
<?php dynamic_sidebar( 'ab_blog_trending_news' ); ?>  
<?php dynamic_sidebar( 'ab_blog_front_page_news_three' ); ?> 
<!-- video-news-area Start -->
<?php dynamic_sidebar( 'ab_blog_video_news' ); ?> 
<!-- video-news-area end -->
    <div class="pd-top-30 pd-bottom-30 text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php dynamic_sidebar( 'ab_blog_font_page_middle_ad' ); ?>  
                </div>
            </div>
        </div>
    </div>
<!-- covid-news-area Start -->
    <div class="covid-news-area pd-bottom-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <?php dynamic_sidebar( 'ab_blog_covid_news' ); ?>  
                </div>
                <div class="col-lg-4">
                <?php dynamic_sidebar( 'ab_blog_home_middle_left_sidebar' ); ?>  
                </div>
            </div>
        </div>
    </div>
<!-- covid-news-area End --> 

<?php dynamic_sidebar( 'ab_blog_editor_choice' ); ?>  
    <!-- news-area Start -->
    <div class="pd-top-70 pd-bottom-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">                   
                <?php dynamic_sidebar( 'ab_blog_more_news_section' ); ?>  
                </div>
                <div class="col-lg-4">
                <?php dynamic_sidebar( 'ab_blog_home_buttom_left_sidebar' ); ?>  
                </div>
            </div>
        </div>
    </div>
    <!-- news-area End -->
    <div class="pd-top-30 pd-bottom-30 text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php dynamic_sidebar( 'ab_blog_font_page_buttom_ad' ); ?>  
                </div>
            </div>
        </div>
    </div>