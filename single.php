<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blog
 */

get_header();
?>


<!-- blog area Start -->
	<div class="blog-details-area pd-top-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
						<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', get_post_type() );

								// the_post_navigation(
								// 	array(
								// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'blog' ) . '</span> <span class="nav-title">%title</span>',
								// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'blog' ) . '</span> <span class="nav-title">%title</span>',
								// 	)
								// );
						?>
					<div class="comment-area">								
						<?php

							// If comments are open or we have at least one comment, load up the comment template.
							//if ( comments_open() || get_comments_number() ) :
							//	comments_template();
							//endif; 
						?>															
                    </div>
						<?php
							endwhile; // End of the loop.
						?>                   
                </div>
				<div class="col-lg-4">
                    <div class="sidebar-area mt-5 mt-lg-0">
						
						<?php dynamic_sidebar( 'ab_blog_single_page_left_sidebar' ); ?> 
						
					</div>
				</div>
            </div>
        </div>
    </div> 
    <!-- blog area End -->

	<?php get_footer();?>
