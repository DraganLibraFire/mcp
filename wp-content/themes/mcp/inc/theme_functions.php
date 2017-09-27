<?php
function get_footer_widget_class($option){
    $classes = explode(',',$option);
    $orgclasses=array();
    foreach ($classes as $clas) {
        $exploded = explode('/',$clas);
        if(intval($exploded[1])!=0){
            $orgclasses[] = 12/intval($exploded[1]);
        }else {
            $orgclasses[] = 12;
        }

    }
    return $orgclasses;
}
function get_font_options($header_option, $text_options){
    if($header_option!='' and $text_options!=''){
        $selectDirectoryInc = get_stylesheet_directory_uri().'/inc/';

        $finalselectDirectory = $selectDirectoryInc;
        $heading_variants ='';
        $text_variants ='';
        $fontFile = $finalselectDirectory . 'google-web-fonts.txt';
        $font_file_body = wp_remote_get($fontFile);
        if ( !is_wp_error( $font_file_body) ) {
            $content = json_decode($font_file_body['body']);
            $heading_font_family = $content->items[$header_option]->family;
            foreach ($content->items[$header_option]->variants as $variant) {
                $heading_variants .= $variant . ',';
            }

            $text_font_family = $content->items[$text_options]->family;
            foreach ($content->items[$text_options]->variants as $variant) {
                $text_variants .= $variant . ',';
            }
            return array('heading-family' => $heading_font_family, 'heading-variants' => $heading_variants , 'text-family' => $text_font_family , 'text-variants' =>$text_variants);
        }else {
            return array('heading-family' => '', 'heading-variants' => '' , 'text-family' => '' , 'text-variants' =>'');
        }

    }else {
        return array('heading-family' => '', 'heading-variants' => '' , 'text-family' => '' , 'text-variants' =>'');
    }
}

function the_social_links( $echo = false ){
    $return_html = '';
    /*------- Variables ------*/
    $facebook_icon = get_theme_mod('social_customizer_fb_icon');
    $facebook_url = esc_url(get_theme_mod('social_customizer_fb_url'));
    $twitter_icon = get_theme_mod('social_customizer_tw_icon');
    $twitter_url = esc_url(get_theme_mod('social_customizer_tw_url'));
    $youtube_icon = get_theme_mod('social_customizer_youtube_icon');
    $youtube_url = esc_url(get_theme_mod('social_customizer_youtube_url'));
    $google_icon = get_theme_mod('social_customizer_g_icon');
    $google_url = esc_url(get_theme_mod('social_customizer_g_url'));
    $linkedIn_icon = get_theme_mod('social_customizer_lni_icon');
    $linkedIn_url = esc_url(get_theme_mod('social_customizer_lni_url'));
    $instagram_icon = get_theme_mod('social_customizer_instagram_icon');
    $instagram_url = esc_url(get_theme_mod('social_customizer_instagram_url'));
    $pinterest_icon = get_theme_mod('social_customizer_pinterest_icon');
    $pinterest_url = esc_url(get_theme_mod('social_customizer_pinterest_url'));

    /*---------------Icon Checker -------------------*/
    if($facebook_icon!=''): $fb_icon = '<img src='.$facebook_icon.'>'; else: $fb_icon = '<i class="fa fa-facebook"></i>';endif;
    if($twitter_icon!=''): $tw_icon ='<img src='.$twitter_icon.'>'; else: $tw_icon = '<i class="fa fa-twitter"></i>';endif;
    if($google_icon!=''): $go_icon = '<img src='.$google_icon.'>'; else: $go_icon = '<i class="fa fa-google-plus"></i>';endif;
    if($youtube_icon!=''): $you_icon = '<img src='.$youtube_icon.'>'; else: $you_icon = '<i class="fa fa-youtube"></i>';endif;
    if($linkedIn_icon!=''): $li_icon = '<img src='.$linkedIn_icon.'>'; else: $li_icon = '<i class="fa fa-linkedin"></i>';endif;
    if($instagram_icon!=''): $inst_icon = '<img src='.$instagram_icon.'>'; else: $inst_icon ='<i class="fa fa-instagram"></i>';endif;
    if($pinterest_icon!=''): $pt_icon = '<img src='.$pinterest_icon.'>'; else: $pt_icon = '<i class="fa fa-pinterest"></i>';endif;

    if($facebook_url!=''){
        $return_html .= '<div class="social-icon-menu-items fb">';
        $return_html .= '<a href="'.$facebook_url.'" target="_blank">'.$fb_icon.'</a>';
        $return_html .= '</div>';
    }

    if($twitter_url!=''){
        $return_html .= '<div class="social-icon-menu-items tw">';
        $return_html .= '<a href="'.$twitter_url.'" target="_blank">'.$tw_icon.'</a>';
        $return_html .= '</div>';
    }

    if($google_url!=''){
        $return_html .= '<div class="social-icon-menu-items goo">';
        $return_html .= '<a href="'.$google_url.'" target="_blank">'.$go_icon.'</a>';
        $return_html .= '</div>';
    }

    if($youtube_url!=''){
        $return_html .= '<div class="social-icon-menu-items yt">';
        $return_html .= '<a href="'.$youtube_url.'" target="_blank">'.$you_icon.'</a>';
        $return_html .= '</div>';
    }

    if($linkedIn_url!=''){
        $return_html .= '<div class="social-icon-menu-items ln">';
        $return_html .= '<a href="'.$linkedIn_url.'" target="_blank">'.$li_icon.'</a>';
        $return_html .= '</div>';
    }

    if($instagram_url!=''){
        $return_html .= '<div class="social-icon-menu-items in">';
        $return_html .= '<a href="'.$instagram_url.'" target="_blank">'.$inst_icon.'</a>';
        $return_html .= '</div>';
    }

    if($pinterest_url!=''){
        $return_html .= '<div class="social-icon-menu-items pn">';
        $return_html .= '<a href="'.$pinterest_url.'" target="_blank">'.$pt_icon.'</a>';
        $return_html .= '</div>';
    }

    if( $echo )
        echo $return_html;
    else
        return $return_html;
}

add_shortcode( 'lf_social', 'the_social_links' );
/*
Social Widget
*/
require get_template_directory().'/inc/social-widget.php';
?>