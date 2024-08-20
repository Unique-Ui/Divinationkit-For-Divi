<?php

namespace DINA_DIVINATIONKIT;

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Assets handlers class
 */
class DINA_Assets {

    /**
     * Class constructor
     */
    function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'register_assets' ) );
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts() {
        return array(

            'divi-default_values-script'    => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/js/dina-default-values.min.js',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'deps'    => array( 'jquery' ),
                'enqueue' => true,
            ),

            //Slick
            'dina-slick'                    => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/lib/slick/slick.min.js',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'deps'    => array( 'jquery' ),
                'enqueue' => false,
            ),
            'dina-slick-logo-slider'        => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/js/dina-slick-logo-slider.min.js',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'deps'    => array( 'jquery' ),
                'enqueue' => false,
            ),
            'dina-slick-testimonial-slider' => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/js/dina-slick-testimonial-slider.min.js',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'deps'    => array( 'jquery' ),
                'enqueue' => false,
            ),

            // Progress bar
            'dina-progress-bar'             => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/js/dina-progress-bar.min.js',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'deps'    => array( 'jquery' ),
                'enqueue' => false,
            ),

            'dina-basic-menu'               => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/js/dina-basic-menu.js',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'deps'    => array( 'jquery' ),
                'enqueue' => false,
            ),

        );
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles() {
        return array(

            'divi-nations-admin-style'  => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/admin/css/admin.min.css',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'enqueue' => true,
            ),
            'global'                    => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/css/global.min.css',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'enqueue' => true,
            ),

            'dina-2d-hover-effects'     => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/css/dina-2d-hover-effects.min.css',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'enqueue' => false,
            ),
            'dina-border-hover-effects' => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/css/dina-border-hover-effects.min.css',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'enqueue' => false,
            ),
            'dina-bg-hover-effects'     => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/css/dina-bg-hover-effects.min.css',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'enqueue' => false,
            ),

            // Slick
            'dina-slick'                => array(
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/lib/slick/slick.min.css',
                'version' => DINA_DIVINATIONKIT_VERSION,
                'enqueue' => false,
            ),
        );
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets() {
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            if ( $script['enqueue'] ) {
                wp_enqueue_script( $handle, $script['src'], $deps, $script['version'], true );
            } else {
                wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
            }
        }

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            if ( $style['enqueue'] ) {
                wp_enqueue_style( $handle, $style['src'], $deps, $style['version'] );
            } else {
                wp_register_style( $handle, $style['src'], $deps, $style['version'] );
            }
        }
    }

}
