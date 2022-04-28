<?php
/**
 * Abblog-full-top-news widget class
 *
 * Displays posts from a selected category
 *
 * @since 1.0.0
*/
class Abblog_editor_choices extends WP_Widget 
{

    public function __construct() 
    {
        parent::__construct(
            'widget_editor_choices', 
            _x( 'AB Full Editor Choices', 'Category Posts Widget' ), 
            [ 'description' => __( 'Display a list of posts from a selected category.' ) ] 
        );
        $this->alt_option_name = 'widget_editor_choices';

        add_action( 'save_post', [$this, 'flush_widget_cache'] );
        add_action( 'deleted_post', [$this, 'flush_widget_cache'] );
        add_action( 'switch_theme', [$this, 'flush_widget_cache'] );
    }

    public function widget( $args, $instance ) 
    {
        $post_no = !empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;
        $cache = [];
        if ( ! $this->is_preview() ) {
            $cache = wp_cache_get( 'widget_cat_posts', 'widget' );
        }

        if ( ! is_array( $cache ) ) {
            $cache = [];
        }

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();

        $title          = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Category Posts' );
        /** This filter is documented in wp-includes/default-widgets.php */
        $title          = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number         = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number ) {
            $number = 5;
        }
        $cat_id         = $instance['cat_id'];
        $random         = $instance['rand'] ? true : false; 
        $excerpt        = $instance['excerpt'] ? true : false; 
        $thumbnail      = $instance['thumbnail'] ? true : false; 

        /**
         * Filter the arguments for the Category Posts widget.
         *
         * @since 1.0.0
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args An array of arguments used to retrieve the category posts.
         */
        if( true === $random ) {

            $query_args = [
                'posts_per_page'    => $number,
                'cat'               => $cat_id,
                'orderby'           => 'rand'
            ];

        }else{  

            $query_args = [
                'posts_per_page'    => $number,
                'cat'               => $cat_id,
            ];

        }
    
        $q = new WP_Query( apply_filters( 'category_posts_args', $query_args ) );

        if( $q->have_posts() ) { ?>



        <!-- editors-area Start -->
        <div class="editors-area bg-gray pd-top-70 pd-bottom-50">
            <div class="container">
                <div class="section-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4 class="title"><?php echo $title ?></h4>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="editors-slider owl-carousel">

                        <?php while( $q->have_posts() ) {
                        $q->the_post(); ?>

                            <div class="item">
                                <div class="top-post-wrap">
                                    <div class="thumb">
                                        <div class="overlay-full"></div>
                                        <?php the_post_thumbnail('large'); ?>
                                    </div>
                                    <div class="top-post-details">

                                        <?php  $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            echo '<a class="tag top-right tag-red" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                        }
                                        ?> 
                                        <div class="meta d-block mt-3">
                                            <div class="date">
                                                <i class="fa fa-clock-o"></i>
                                                <? echo get_the_date() ?>
                                            </div>
                                        </div>
                                        <h6><a href="<? the_permalink(); ?>"><?php esc_html( the_title() ) ?></a></h6>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- editors-area End -->

        <?php
            wp_reset_postdata();
        }
            echo $args['after_widget']; 

        if ( ! $this->is_preview() ) {
            $cache[ $args['widget_id'] ] = ob_get_flush();
            wp_cache_set( 'widget_cat_posts', $cache, 'widget' );
        } else {
            ob_end_flush();
        }
    }

    public function update( $new_instance, $old_instance ) 
    {
        $instance                   = $old_instance;
        $instance['title']          = strip_tags( $new_instance['title'] );
        $instance['number']         = (int) $new_instance['number'];
        $instance['cat_id']         = (int) $new_instance['cat_id'];
        $instance['rand']           = $new_instance['rand'];
        $instance['excerpt']        = $new_instance['excerpt'];
        $instance['thumbnail']      = $new_instance['thumbnail'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_category_posts']) )
            delete_option('widget_category_posts');

        return $instance;
    }

    public function flush_widget_cache() 
    {
        wp_cache_delete('widget_cat_posts', 'widget');
    }

    public function form( $instance ) 
    {

        $title      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $cat_id     = isset( $instance['cat_id'] ) ? absint( $instance['cat_id'] ) : 1;
        $random     = isset( $instance['rand'] ) ? $instance['rand'] : false; 
        $excerpt    = isset( $instance['excerpt'] ) ? $instance['excerpt'] : false; 
        $thumbnail  = isset( $instance['thumbnail'] ) ? $instance['thumbnail'] : false; 
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
            <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('cat_id'); ?>"><?php _e( 'Category Name:' )?></label>
            <select id="<?php echo $this->get_field_id('cat_id'); ?>" name="<?php echo $this->get_field_name('cat_id'); ?>">
                <?php 
                $this->categories = get_categories();
                foreach ( $this->categories as $cat ) {
                    $selected = ( $cat->term_id == esc_attr( $cat_id ) ) ? ' selected = "selected" ' : '';
                    $option = '<option '.$selected .'value="' . $cat->term_id;
                    $option = $option .'">';
                    $option = $option .$cat->name;
                    $option = $option .'</option>';
                    echo $option;
                }
                ?>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('rand'); ?>"><?php _e( 'Show random posts' ); ?></label>
            <?php $checked = ( $random ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'rand' ); ?>" name="<?php echo $this->get_field_name( 'rand' ); ?>" value="true" <?php echo $checked; ?> />    
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('excerpt'); ?>"><?php _e( 'Show excerpt. If unchecked, only the title of the post will be displayed' ); ?></label>
            <?php $checked = ( $excerpt ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" value="true" <?php echo $checked; ?> />    
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e( 'Hide post thumbnail' ); ?></label>
            <?php $checked = ( $thumbnail ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" value="true" <?php echo $checked; ?> />    
        </p>

    <?php
    }

}

