<?php
/**
 * CV: Social Media
 *
 * Widget show the social media icons.
 *
 * @package CodeVibrant
 * @subpackage News Vibrant
 * @since 1.0.0
 */

class News_Vibrant_Social_Media extends WP_widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'news_vibrant_social_media',
            'description' => __( 'A widget shows the social media icons.', 'news-vibrant' )
        );
        parent::__construct( 'news_vibrant_social_media', __( 'CV: Social Media', 'news-vibrant' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

            'widget_title' => array(
                'news_vibrant_widgets_name'         => 'widget_title',
                'news_vibrant_widgets_title'        => __( 'Widget title', 'news-vibrant' ),
                'news_vibrant_widgets_field_type'   => 'text'
            )
        );
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        if ( empty( $instance ) ) {
            return ;
        }

        $news_vibrant_widget_title  = empty( $instance['widget_title'] ) ? '' : $instance['widget_title'];

        $get_social_media_icons = get_theme_mod( 'social_media_icons', '' );
        $get_decode_social_media = json_decode( $get_social_media_icons );

        echo $before_widget;
    ?>
            <div class="nv-aside-social-wrapper">
                <?php
                    if ( ! empty( $news_vibrant_widget_title ) ) {
                        echo $before_title . esc_html( $news_vibrant_widget_title ) . $after_title;
                    }
                ?>
                <div class="nv-social-icons-wrapper">
                    <?php
                        if ( !empty( $get_decode_social_media ) ) {
                            foreach ( $get_decode_social_media as $single_icon ) {
                                $icon_class = $single_icon->social_icon_class;
                                $icon_url = $single_icon->social_icon_url;
                                if ( !empty( $icon_url ) ) {
                                    echo '<span class="social-link"><a href="'. esc_url( $icon_url ) .'" target="_blank"><i class="'. esc_attr( $icon_class ) .'"></i></a></span>';
                                }
                            }
                        }
                    ?>
                </div><!-- .nv-social-icons-wrapper -->
            </div><!-- .nv-aside-social-wrapper -->
    <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    news_vibrant_widgets_updated_field_value()     defined in nv-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$news_vibrant_widgets_name] = news_vibrant_widgets_updated_field_value( $widget_field, $new_instance[$news_vibrant_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    news_vibrant_widgets_show_widget_field()       defined in nv-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $news_vibrant_widgets_field_value = !empty( $instance[$news_vibrant_widgets_name] ) ? wp_kses_post( $instance[$news_vibrant_widgets_name] ) : '';
            news_vibrant_widgets_show_widget_field( $this, $widget_field, $news_vibrant_widgets_field_value );
        }
    }
}