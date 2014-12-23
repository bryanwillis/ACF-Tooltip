<?php

function my_enqueue() {
    wp_enqueue_script( 'acf_tooltip_script', plugin_dir_url( __FILE__ ) . '/js/acf-tooltip-v4.js', array( 'jquery-qtip') );
    wp_enqueue_style( 'acf_tooltip_css', plugin_dir_url( __FILE__ ) . '/css/acf-tooltip.css' );
}
add_action( 'acf/input/admin_head', 'my_enqueue' );

?>
