<?php
// Block direct requests
if ( !defined('ABSPATH') )
    die('-1');


add_action( 'widgets_init', function(){
    register_widget( 'librafire_social_widget' );
});

/**
 * Adds My_Widget widget.
 */
class librafire_social_widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'librafire_social_widget', // Base ID
            __('Social Widget', 'mcp'), // Name
            array('description' => __( 'Display Social Links from theme options', 'mcp' ),) // Args
        );
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

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        $return_html = '';
        /*------- Variables ------*/
        $facebook_icon = get_theme_mod('social_customizer_fb_icon');
        $facebook_url = esc_url(get_theme_mod('social_customizer_fb_url'));
        $twitter_icon = get_theme_mod('social_customizer_tw_icon');
        $twitter_url = esc_url(get_theme_mod('social_customizer_tw_url'));
        $google_icon = get_theme_mod('social_customizer_g_icon');
        $google_url = esc_url(get_theme_mod('social_customizer_g_url'));
        $linkedIn_icon = get_theme_mod('social_customizer_lni_icon');
        $linkedIn_url = esc_url(get_theme_mod('social_customizer_lni_url'));
        $instagram_icon = get_theme_mod('social_customizer_instagram_icon');
        $instagram_url = esc_url(get_theme_mod('social_customizer_instagram_url'));
        $pinterest_icon = get_theme_mod('social_customizer_pinterest_icon');
        $pinterest_url = esc_url(get_theme_mod('social_customizer_pinterest_url'));

        /*---------------Icon Checker -------------------*/
        if($facebook_icon!=''): $fb_icon = '<img src='.$facebook_icon.'>'; else: $fb_icon = '<i class="fa fa-facebook-official"></i>';endif;
        if($twitter_icon!=''): $tw_icon ='<img src='.$twitter_icon.'>'; else: $tw_icon = '<i class="fa fa-twitter"></i>';endif;
        if($google_icon!=''): $go_icon = '<img src='.$google_icon.'>'; else: $go_icon = '<i class="fa fa-google-plus"></i>';endif;
        if($linkedIn_icon!=''): $li_icon = '<img src='.$linkedIn_icon.'>'; else: $li_icon = '<i class="fa fa-linkedin"></i>';endif;
        if($instagram_icon!=''): $inst_icon = '<img src='.$instagram_icon.'>'; else: $inst_icon ='<i class="fa fa-instagram"></i>';endif;
        if($pinterest_icon!=''): $pt_icon = '<img src='.$pinterest_icon.'>'; else: $pt_icon = '<i class="fa fa-pinterest"></i>';endif;

        if($facebook_url!=''){
            $return_html .= '<a href="'.$facebook_url.'" target="_blank">'.$fb_icon.'</a>';
        }
        if($twitter_url!=''){
            $return_html .= '<a href="'.$twitter_url.'" target="_blank">'.$tw_icon.'</a>';
        }
        if($google_url!=''){
            $return_html .= '<a href="'.$google_url.'" target="_blank">'.$go_icon.'</a>';
        }
        if($linkedIn_url!=''){
            $return_html .= '<a href="'.$linkedIn_url.'" target="_blank">'.$li_icon.'</a>';
        }
        if($instagram_url!=''){
            $return_html .= '<a href="'.$instagram_url.'" target="_blank">'.$inst_icon.'</a>';
        }
        if($pinterest_url!=''){
            $return_html .= '<a href="'.$pinterest_url.'" target="_blank">'.$pt_icon.'</a>';
        }
        echo $return_html;
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title='';
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'mcp' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            <div>Social Icon &Links from Theme options</div>
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }

} // class My_Widget