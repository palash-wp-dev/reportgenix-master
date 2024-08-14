<?php

/**
 *  appgenix recent post widget
 * @package appgenix
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit(); //exit if access directly
}

class Xgenious_All_Popular_Tags_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'xgenious_all_tags',
            esc_html__( 'Xgenious: All Tags', 'xgenious' ),
            array( 'description' => esc_html__( 'Display your popular tags.', 'xgenious' ) )
        );
    }

    public function widget( $args, $instance ) {

        $title = isset($instance['title']) && !empty($instance['title']) ? $instance['title'] : '';
        $number = isset($instance['number']) && !empty($instance['number']) ? $instance['number'] : '5';
        $order = isset($instance['order']) && !empty($instance['order']) ? $instance['order'] : 'ASC';

        echo wp_kses_post( $args['before_widget'] );

        if ( ! empty( $title ) ) {
            echo wp_kses_post( $args['before_title'] ) . esc_html( $title ) . wp_kses_post( $args['after_title'] );
        }

        ?>
        <div class="blog__details__side__item__inner mt-4">
            <div class="after-heading-line"></div>
            <div class="alltags mt-30">
                <?php
                $all_tags = get_tags( [
                    'order' => $order,
                    'orderby' => 'name',
                    'number' => $number,
                    'hide_empty' => true,
                ] );

                foreach ( $all_tags as $tag ) :
                    $tag_slug = $tag->slug; // Replace with the slug of the tag you want to link to
                    $tag_link = get_tag_link(get_term_by('slug', $tag_slug, 'post_tag'));
                    ?>
                    <a href="<?php echo esc_url( $tag_link ); ?>" class="single-tag"><?php printf( esc_html__( '%s', 'xgenious' ), $tag->name ); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        echo wp_kses_post( $args['after_widget'] );

    }

    public function form( $instance ) {
        //have to create form instance
        if ( ! empty( $instance ) && $instance['title'] ) {
            $title = apply_filters( 'widget_title', $instance['title'] );
        } else {
            $title = esc_html__( 'Popular Tag', 'xgenious' );
        }

        $number = ! empty( $instance ) && $instance['number'] ? $instance['number'] : '5';
        $order       = ! empty( $instance ) && $instance['order'] ? $instance['order'] : 'ASC';
        $order_arr   = array(
            'ASC'  => esc_html__( 'Ascending', 'xgenious' ),
            'DESC' => esc_html__( 'Descending', 'xgenious' )
        );
        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'xgenious' ); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ) ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ) ?>"><?php esc_html_e( 'No Of Tags', 'xgenious' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>"/>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ) ?>"><?php esc_html_e( 'Order', 'xgenious' ); ?></label>
            <select name="<?php echo esc_attr( $this->get_field_name( 'order' ) ) ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ) ?>">

                <?php
                foreach ( $order_arr as $key => $value ) {
                    $checked = ( $key == $order ) ? 'selected' : '';
                    printf( '<option value="%1$s" %3$s >%2$s</option>', $key, $value,$checked );
                }
                ?>
            </select>
        </p>
        <?php

    }

    public function update( $new_instance, $old_instance ) {

        $instance                = array();
        $instance['order']       = ( ! empty( $new_instance['order'] ) ? sanitize_text_field( $new_instance['order'] ) : '' );
        $instance['hide_empty']       = ( ! empty( $new_instance['hide_empty'] ) ? sanitize_text_field( $new_instance['hide_empty'] ) : true );
        $instance['title']       = ( ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '' );
        $instance['number'] = ( ! empty( $new_instance['number'] ) ? absint( $new_instance['number'] ) : '' );
        if ( is_numeric( $new_instance['number'] ) == false ) {
            $instance['number'] = $old_instance['number'];
        }
        return $instance;
    }

} // end class

if ( ! function_exists( 'Xgenious_All_Popular_Tags_Widget' ) ) {
    function Xgenious_All_Popular_Tags_Widget() {
        register_widget( 'Xgenious_All_Popular_Tags_Widget' );
    }

    add_action( 'widgets_init', 'Xgenious_All_Popular_Tags_Widget' );

}