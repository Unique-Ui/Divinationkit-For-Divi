<?php

class DINA_Masonry_Gallery extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . '/modules/masonry-gallery/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__( 'Masonry Gallery', 'divinationkit-for-divi' );
        $this->slug        = 'dina_masonry_gallery';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';
        $this->icon_path   = $this->dina_module_icon( 'masonry' );

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'gallery'  => esc_html__( 'Images', 'divinationkit-for-divi' ),
                    'settings' => esc_html__( 'Settings', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'general' => esc_html__( 'General', 'divinationkit-for-divi' ),
                    'image'   => esc_html__( 'Image', 'divinationkit-for-divi' ),
                    'icon'    => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                    'title'   => esc_html__( 'Title', 'divinationkit-for-divi' ),
                    'border'  => esc_html__( 'Border', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    public function get_fields() {

        $content = array(
            'gallery_ids'        => array(
                'label'            => esc_html__( 'Images', 'divinationkit-for-divi' ),
                'description'      => esc_html__( 'Choose the images that you would like to appear in the image gallery.', 'divinationkit-for-divi' ),
                'type'             => 'upload-gallery',
                'computed_affects' => array(
                    '__gallery',
                ),
                'option_category'  => 'basic_option',
                'toggle_slug'      => 'gallery',
            ),
            'gallery_orderby'    => array(
                'label'            => esc_html__( 'Image Order', 'divinationkit-for-divi' ),
                'description'      => esc_html__( 'Select an ordering method for the gallery. This controls which gallery items appear first in the list.', 'divinationkit-for-divi' ),
                'type'             => 'select',
                'options'          => array(
                    'default' => esc_html__( 'Default', 'divinationkit-for-divi' ),
                    'rand'    => esc_html__( 'Random', 'divinationkit-for-divi' ),
                ),
                'default'          => 'default',
                'computed_affects' => array(
                    '__gallery',
                ),
                'toggle_slug'      => 'gallery',
            ),
            'column_count'       => array(
                'label'           => esc_html__( 'Column Count', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define how many column you want to display', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'default'         => '4',
                'toggle_slug'     => 'gallery',
                'mobile_options'  => true,
            ),
            'space_between_item' => array(
                'label'           => esc_html__( 'Space Between Item', 'divinationkit-for-divi' ),
                'type'            => 'range',
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 0,
                    'max'  => 100,
                ),
                'default'         => '30px',
                'toggle_slug'     => 'gallery',
                'mobile_options'  => true,
            ),

            '__gallery'          => array(
                'type'                => 'computed',
                'computed_callback'   => array( 'DINA_Masonry_Gallery', 'get_masonry_gallery' ),
                'computed_depends_on' => array(
                    'gallery_ids',
                    'gallery_orderby',
                    'hover_effect',
                    'lightbox',
                ),
            ),
        );
        $design = array(
            'image_padding' => array(
                'label'          => esc_html__( 'Image Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for image', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'image',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
                'hover'          => 'tabs',
            ),
        );

        $settings = array(
            'use_hover_effect' => array(
                'label'           => esc_html__( 'Use Hover Effect', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Turn on and off to use image hover effect.', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'settings',
                'option_category' => 'configuration',
                'mobile_options'  => true,
            ),
            'hover_effect'     => array(
                'label'            => esc_html__( 'Select 2D Hover Effect', 'divinationkit-for-divi' ),
                'type'             => 'select',
                'option_category'  => 'basic_option',
                'computed_affects' => array(
                    '__gallery',
                ),
                'options'          => array(
                    ''                                  => esc_html__( 'Select', 'divinationkit-for-divi' ),
                    'dina-hover-grow'                   => esc_html__( 'Grow', 'divinationkit-for-divi' ),
                    'dina-hover-shrink'                 => esc_html__( 'Shrink', 'divinationkit-for-divi' ),
                    'dina-hover-pulse'                  => esc_html__( 'Pulse', 'divinationkit-for-divi' ),
                    'dina-hover-pulse-grow'             => esc_html__( 'Pulse Grow', 'divinationkit-for-divi' ),
                    'dina-hover-pulse-shrink'           => esc_html__( 'Pulse Shrink', 'divinationkit-for-divi' ),
                    'dina-hover-pop'                    => esc_html__( 'Pop', 'divinationkit-for-divi' ),
                    'dina-hover-push'                   => esc_html__( 'Push', 'divinationkit-for-divi' ),
                    'dina-hover-bounce-in'              => esc_html__( 'Bounce In', 'divinationkit-for-divi' ),
                    'dina-hover-bounce-out'             => esc_html__( 'Bounce Out', 'divinationkit-for-divi' ),
                    'dina-hover-rotate'                 => esc_html__( 'Rotate', 'divinationkit-for-divi' ),
                    'dina-hover-rotate-grow'            => esc_html__( 'Rotate Grow', 'divinationkit-for-divi' ),
                    'dina-hover-float'                  => esc_html__( 'Float', 'divinationkit-for-divi' ),
                    'dina-hover-sink'                   => esc_html__( 'Sink', 'divinationkit-for-divi' ),
                    'dina-hover-bob'                    => esc_html__( 'Bob', 'divinationkit-for-divi' ),
                    'dina-hover-hang'                   => esc_html__( 'Hang', 'divinationkit-for-divi' ),
                    'dina-hover-skew-forward'           => esc_html__( 'Skew Forward', 'divinationkit-for-divi' ),
                    'dina-hover-skew-backward'          => esc_html__( 'Skew Backward', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-horizontal'      => esc_html__( 'Wobble Horizontal', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-vertical'        => esc_html__( 'Wobble Vertical', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-to-bottom-right' => esc_html__( 'Wobble to Bottom Right', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-to-top-right'    => esc_html__( 'Wobble to Top Right', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-top'             => esc_html__( 'Wobble Top', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-bottom'          => esc_html__( 'Wobble Bottom', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-skew'            => esc_html__( 'Wobble Skew', 'divinationkit-for-divi' ),
                    'dina-hover-buzz'                   => esc_html__( 'Buzz', 'divinationkit-for-divi' ),
                    'dina-hover-buzz-out'               => esc_html__( 'Buzz Out', 'divinationkit-for-divi' ),
                    'dina-hover-forward'                => esc_html__( 'Forward', 'divinationkit-for-divi' ),
                    'dina-hover-backward'               => esc_html__( 'Backward', 'divinationkit-for-divi' ),
                ),
                'toggle_slug'      => 'settings',
                'show_if'          => array(
                    'use_hover_effect' => 'on',
                ),

            ),
            'lightbox'         => array(
                'label'            => esc_html__( 'Listbox/Link', 'divinationkit-for-divi' ),
                'description'      => sprintf( '%1$s <a href="https://divinationkit.com/docs/modules/masonary-gallery">%1$s</a>', esc_html__( 'Choose action option where if you choose lightbox the image will popup on click, and for link it will navigate to the destination page', 'divinationkit-for-divi' ), esc_html__( 'Learn More', 'divinationkit-for-divi' ), ),
                'type'             => 'select',
                'options'          => array(
                    'none'         => esc_html__( 'None', 'divinationkit-for-divi' ),
                    'use_lightbox' => esc_html__( 'Use Lightbox', 'divinationkit-for-divi' ),
                    'use_link'     => esc_html__( 'Use Link', 'divinationkit-for-divi' ),
                ),
                'default'          => 'use_lightbox',
                'computed_affects' => array(
                    '__gallery',
                ),
                'toggle_slug'      => 'settings',
                'option_category'  => 'configuration',
            ),
        );

        return array_merge( $content, $design, $settings );
    }

    public function get_advanced_fields_config() {
        return array(
            'text'           => false,
            'borders'        => array(
                'main' => array(
                    'label_prefix' => esc_html__( 'Image', 'divinationkit-for-divi' ),
                    'sub_toggle'   => 'advanced',
                    'toggle_slug'  => 'border',
                    'css'          => array(
                        'main'      => array(
                            'border_radii'  => '%%order_class%%',
                            'border_styles' => '%%order_class%%',
                        ),
                        'important' => 'all',
                    ),
                    'defaults'     => array(
                        'border_radii'  => 'on|0px|0px|0px|0px',
                        'border_styles' => array(
                            'width' => '0px',
                            'color' => '#333333',
                            'style' => 'solid',
                        ),
                    ),
                ),
            ),
            'borders'        => array(
                'item' => array(
                    'label_prefix' => esc_html__( 'Image', 'divinationkit-for-divi' ),
                    'sub_toggle'   => 'advanced',
                    'toggle_slug'  => 'image',
                    'css'          => array(
                        'main'      => array(
                            'border_radii'  => '%%order_class%% .dina_masonry_gallery-item img',
                            'border_styles' => '%%order_class%% .dina_masonry_gallery-item img',
                        ),
                        'important' => 'all',
                    ),
                    'defaults'     => array(
                        'border_radii'  => 'on|0px|0px|0px|0px',
                        'border_styles' => array(
                            'width' => '0px',
                            'color' => '#333333',
                            'style' => 'solid',
                        ),
                    ),
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'important' => 'all',
                ),
            ),

            'filters'        => array(
                'child_filters_target' => array(
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'image',
                ),
                'css'                  => array(
                    'main' => '%%order_class%% .dina_masonry_gallery-item img',
                ),
            ),

            'background'     => array(
                'css'     => array(
                    'main'      => '%%order_class%%',
                    'important' => true,
                ),
                'options' => array(
                    'background_color' => array(
                        'default' => '',
                    ),
                ),
            ),

            'box_shadow'     => array(
                'default' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dina_masonry_gallery-item',
                    ),
                ),
            ),
        );
    }

    static function get_masonry_gallery( $args = array() ) {
        $attachments = array();

        $defaults = array(
            'gallery_ids'     => array(),
            'gallery_orderby' => '',
            'thumb_size'      => '',
            'thumb_width'     => '',
            'thumb_height'    => '',
        );

        $args = wp_parse_args( $args, $defaults );

        $attachments_args = array(
            'include'        => $args['gallery_ids'],
            'post_status'    => 'inherit',
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'order'          => 'ASC',
            'orderby'        => 'post__in',
        );

        if ( isset( $args['attachment_id'] ) ) {
            $attachments_args['attachment_id'] = $args['attachment_id'];
        }

        if ( 'rand' === $args['gallery_orderby'] ) {
            $attachments_args['orderby'] = 'rand';
        }

        $width  = 400;
        $height = 50;

        $width  = (int) apply_filters( 'et_pb_gallery_image_width', $width );
        $height = (int) apply_filters( 'et_pb_gallery_image_height', $height );

        $_attachments = get_posts( $attachments_args );

        foreach ( $_attachments as $key => $val ) {
            $attachments[$key]                  = $_attachments[$key];
            $attachments[$key]->image_alt_text  = get_post_meta( $val->ID, '_wp_attachment_image_alt', true );
            $attachments[$key]->image_src_full  = wp_get_attachment_image_src( $val->ID, 'full' );
            $attachments[$key]->image_src_thumb = wp_get_attachment_image_src( $val->ID, array( $width, $height ) );
            $attachments[$key]->link            = get_post_meta( $val->ID, 'dina_gallery_item_url', true );
            $attachments[$key]->link_target     = get_post_meta( $val->ID, 'dina_gallery_item_link_target', true );
        }

        return $attachments;

    }

    public function get_attachments( $args = array() ) {
        return self::get_masonry_gallery( $args );
    }

    public function render( $attrs, $content, $render_slug ) {

        $this->render_css( $render_slug );

        $gallery_ids      = $this->props['gallery_ids'];
        $gallery_orderby  = esc_attr( $this->props['gallery_orderby'] );
        $use_hover_effect = $this->props['use_hover_effect'];
        $hover_effect     = $this->props['hover_effect'];
        $lightbox         = $this->props['lightbox'];

        if ( $use_hover_effect === 'on' ) {
            wp_enqueue_style( 'dina-2d-hover-effects' );
        }

        if ( $lightbox === 'use_lightbox' ) {
            add_filter( 'script_loader_tag', 'add_type_attribute', 10, 3 );
            function add_type_attribute( $tag, $handle, $src ) {
                // if not your script, do nothing and return original $tag
                if ( 'dina-photoswipe' === $handle || 'dina-photoswipe-script' === $handle ) {
                    // change the script tag by adding type="module" and return it.
                    $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
                }

                return $tag;
            }
            wp_enqueue_style( 'dina-photoswipe' );
            wp_enqueue_script( 'dina-photoswipe' );
            wp_enqueue_script( 'dina-photoswipe-script' );

        }

        // Get gallery item data
        $attachments = $this->get_attachments( array(
            'gallery_ids'     => $gallery_ids,
            'gallery_orderby' => $gallery_orderby,
        ) );

        if ( empty( $attachments ) ) {
            return 'No Image Selected';
        }

        $output = sprintf(
            '<div class="dina_masonry_gallery-wrapper">'
        );

        foreach ( $attachments as $id => $attachment ) {
            $image_attrs = array(
                'alt' => $attachment->image_alt_text,
            );

            $image_output = sprintf(
                '<a
                    href="%1$s"
                    target="%8$s"
                    class="dina_masonry_gallery-item %7$s"
                    title="%2$s"
                    data-pswp-width="%3$s"
                    data-pswp-height="%4$s"
                >
                    <img src="%5$s" alt="%6$s" />
                </a>',
                $lightbox === 'none' ? '#' : ( $lightbox === 'use_link' ? $attachment->link : esc_url( $attachment->image_src_full[0] ) ),
                esc_attr( $attachment->post_title ),
                esc_attr( $attachment->image_src_full[1] ),
                esc_attr( $attachment->image_src_full[2] ),
                esc_attr( $attachment->image_src_thumb[0] ),
                esc_attr( $image_attrs['alt'] ), // 6
                esc_attr( $hover_effect ),
                esc_attr( $attachment->link_target )
            );

            $output .= sprintf(
                '%1$s',
                $image_output
            );

        }

        $output .= '</div>';

        return sprintf(
            '<div class="dina_masonry_gallery-container">
                %1$s
            </div>',
            $output
        );
    }

    public function render_css( $render_slug ) {

        $this->dina_responsive_css( $render_slug, array(
            array(
                'option_slug' => 'column_count',
                'property'    => 'column-count',
                'selector'    => '%%order_class%% .dina_masonry_gallery-wrapper',
            ),
            array(
                'option_slug' => 'space_between_item',
                'property'    => 'column-gap',
                'selector'    => '%%order_class%% .dina_masonry_gallery-wrapper',
            ),
            array(
                'option_slug' => 'space_between_item',
                'property'    => 'margin-bottom',
                'selector'    => '%%order_class%% .dina_masonry_gallery-item ',
            ),
            array(
                'option_slug' => 'image_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_masonry_gallery-item img',
                'hover'       => '%%order_class%% .dina_masonry_gallery-item:hover img',
            ),
        ) );
    }
}

new DINA_Masonry_Gallery();