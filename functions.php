<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION


// BEGIN WOOCOMMERCE
add_filter( 'gettext', 'change_woocommerce_return_to_shop_text', 20, 3 );

function change_woocommerce_return_to_shop_text( $translated_text, $text, $domain ) {
        switch ( $translated_text ) {
            case 'Return to shop' :
                $translated_text = __( 'Return to Gallery', 'woocommerce' );
                break;
        }
    return $translated_text;
}

add_action( 'woocommerce_no_products_found', function(){
    remove_action( 'woocommerce_no_products_found', 'wc_no_products_found', 10 );

    $message = __( 'No gallery items were found.', 'woocommerce' );

    echo '<p class="woocommerce-info">' . $message .'</p>';
}, 9 );