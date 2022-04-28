<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog
 */

?>
<!-- blog area Start -->

    <div class="blog-details-wrap">
        <h3> <?php esc_html( the_title() ) ?></h3>
        <div>
        <?php  $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                echo '<a class="tag tag-pink" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            }
        ?> 
        </div>
        <div class="meta">
        <i class="fa fa-user-o"> </i>
            <?php echo get_the_author_meta('display_name'); ?>
        </div>
        <div class="meta float-sm-right">
            <div class="date">
                <i class="fa fa-clock-o"></i>
                <?php echo get_the_date() ?>
            </div>
            <div class="comments m-0">
                <i class="fa fa-comments"></i>
                <?php get_comments_number() ?>
            </div>
        </div>
        <div class="thumb">
            <?php the_post_thumbnail('large'); ?>
        </div>
        <p><?php the_content(); ?></p>
        
        <div class="ad-area mt-5">

            <?php dynamic_sidebar( 'ab_blog_single_page_ad_sidebar' ); ?> 
        
        </div>                        
        <div class="blog-share-area">
            <h5 class="mt-0">Share Post</h5>
            <ul class="social-area">
                <li>
                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                </li>
                <li>
                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a class="behance" href="#"><i class="fa fa-behance"></i></a>
                </li>
                <li>
                    <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                </li>
            </ul>
        </div>
        <div class="recent-blog-area">
            <div class="row">               
                    
                <?php dynamic_sidebar( 'ab_blog_single_page_related_post' ); ?> 
               
            </div>
        </div>
    </div>                    

    <!-- blog area End -->
