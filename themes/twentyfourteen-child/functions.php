<?php
function lonk_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'lonk_enqueue_styles' );
function lonk_trackers(){
echo '<meta name="google-site-verification" content="EBI-JylWqUvsr8GK2kDWTnOSFwU2RNh_9-Dem-YsAUI" />';
echo "\n";

}
add_action('wp_head', 'lonk_trackers', 12); // 12 = hook it late
