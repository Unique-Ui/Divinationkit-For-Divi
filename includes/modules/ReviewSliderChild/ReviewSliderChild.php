<?php

class DINA_Testimonial_Slider_Child extends DINA_Module_Core {

    public function init() {

        $this->name                     = esc_html__( 'Slider Item', 'divinationkit-for-divi' );
        $this->slug                     = 'dina_testimonial_slider_child';
        $this->vb_support               = 'on';
        $this->type                     = 'child';
        $this->main_css_element         = "%%order_class%%";
        $this->child_title_var          = 'admin_title';
        $this->child_title_fallback_var = 'name';

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'content'         => esc_html__( 'Content', 'divinationkit-for-divi' ),
                    'image'           => esc_html__( 'Image', 'divinationkit-for-divi' ),
                    'rating_settings' => esc_html__( 'Rating Settings', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'layout'         => esc_html__( 'Layouts', 'divinationkit-for-divi' ),
                    'image'          => esc_html__( 'Image', 'divinationkit-for-divi' ),
                    'rating_design'  => esc_html__( 'Rating', 'divinationkit-for-divi' ),
                    'rating_number'  => esc_html__( 'Rating Number', 'divinationkit-for-divi' ),
                    'name'           => esc_html__( 'Name Text', 'divinationkit-for-divi' ),
                    'position'       => esc_html__( 'Position Text', 'divinationkit-for-divi' ),
                    'testimonial'    => esc_html__( 'Content', 'divinationkit-for-divi' ),
                    'custom_spacing' => esc_html__( 'Custom Spacing', 'divinationkit-for-divi' ),
                    'borders'        => esc_html__( 'Borders', 'divinationkit-for-divi' ),
                ),
            ),
        );

        $this->custom_css_fields = array(
            'container'     => array(
                'label'    => esc_html__( 'Container', 'divinationkit-for-divi' ),
                'selector' => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-container',
            ),
            'img'           => array(
                'label'    => esc_html__( 'Image', 'divinationkit-for-divi' ),
                'selector' => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-img img',
            ),
            'name'          => array(
                'label'    => esc_html__( 'Name', 'divinationkit-for-divi' ),
                'selector' => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-name',
            ),
            'position'      => array(
                'label'    => esc_html__( 'Position', 'divinationkit-for-divi' ),
                'selector' => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-position',
            ),
            'stars_wrapper' => array(
                'label'    => esc_html__( 'Stars Wrapper', 'divinationkit-for-divi' ),
                'selector' => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-stars',
            ),
            'star'          => array(
                'label'    => esc_html__( 'Star', 'divinationkit-for-divi' ),
                'selector' => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-star span',
            ),
            'fill_star'     => array(
                'label'    => esc_html__( 'Active Star', 'divinationkit-for-divi' ),
                'selector' => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-star-filled span',
            ),
            'number'        => array(
                'label'    => esc_html__( 'Active Star', 'divinationkit-for-divi' ),
                'selector' => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-rating-number',
            ),
            'text'          => array(
                'label'    => esc_html__( 'Active Star', 'divinationkit-for-divi' ),
                'selector' => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-description p',
            ),
        );
    }

    public function get_fields() {

        $content = array(
            'use_image'   => array(
                'label'           => esc_html__( 'Show Image', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can choose whether reviewer image will be display or not', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'on',
                'toggle_slug'     => 'image',
            ),

            'image'       => array(
                'label'              => esc_html__( 'Upload Image', 'divinationkit-for-divi' ),
                'description'        => esc_html__( 'Upload an image or type in the URL of the image you would like to display.', 'divinationkit-for-divi' ),
                'type'               => 'upload',
                'upload_button_text' => esc_attr__( 'Upload an image', 'divinationkit-for-divi' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'divinationkit-for-divi' ),
                'update_text'        => esc_attr__( 'Set As Image', 'divinationkit-for-divi' ),
                'toggle_slug'        => 'image',
                'show_if'            => array(
                    'use_image' => 'on',
                ),
            ),

            'image_alt'   => array(
                'label'       => esc_html__( 'Image Alt Text', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define the image alternative text', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'image',
                'show_if'     => array(
                    'use_image' => 'on',
                ),
            ),

            'name'        => array(
                'label'       => esc_html__( 'Name', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define testimonial name', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
            ),

            'position'    => array(
                'label'       => esc_html__( 'Position', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define testimonial designation and company name', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
            ),

            'description' => array(
                'label'           => esc_html__( 'Description', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define testimonial description.', 'divinationkit-for-divi' ),
                'type'            => 'tiny_mce',
                'toggle_slug'     => 'content',
                'dynamic_content' => 'text',
            ),
        );

        $rating_settings = array(
            'rating_style' => array(
                'label'       => esc_html__( 'Choose Rating Style', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Here you can choose different kind of styles', 'divinationkit-for-divi' ),
                'type'        => 'select',
                'options'     => array(
                    'none'        => esc_html__( 'None', 'divinationkit-for-divi' ),
                    'only_star'   => esc_html__( 'Only Stars', 'divinationkit-for-divi' ),
                    'only_number' => esc_html__( 'Only Number', 'divinationkit-for-divi' ),
                    'both'        => esc_html__( 'Both Start and Number', 'divinationkit-for-divi' ),
                ),
                'default'     => 'both',
                'toggle_slug' => 'rating_settings',
            ),

            'rating_scale' => array(
                'label'          => esc_html__( 'Rating Scale', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default'        => '5',
                'default_unit'   => '',
                'allowed_units'  => array( '' ),
                'validate_unit'  => false,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 10,
                ),
                'toggle_slug'    => 'rating_settings',
                'show_if_not'    => array(
                    'rating_style' => 'none',
                ),
            ),

            'rating'       => array(
                'label'          => esc_html__( 'Rating', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default'        => '5',
                'default_unit'   => '',
                'allowed_units'  => array( '' ),
                'validate_unit'  => false,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => '.1',
                    'max'  => 10,
                ),
                'toggle_slug'    => 'rating_settings',
                'show_if_not'    => array(
                    'rating_style' => 'none',
                ),
            ),
        );

        $layout = array(
            'layout'             => array(
                'label'       => esc_html__( 'Layout Style', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Here you can choose different kind of testimonial layout styles', 'divinationkit-for-divi' ),
                'type'        => 'select',
                'options'     => array(
                    'style-one'   => esc_html__( 'Style 1', 'divinationkit-for-divi' ),
                    'style-two'   => esc_html__( 'Style 2', 'divinationkit-for-divi' ),
                    'style-three' => esc_html__( 'Style 3', 'divinationkit-for-divi' ),
                    'style-four'  => esc_html__( 'Style 4', 'divinationkit-for-divi' ),
                ),
                'default'     => 'style-one',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'layout',
            ),

            'image_gap'          => array(
                'label'          => esc_html__( 'Image Space', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change space between author image and info.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 250,
                ),
                'show_if_not'    => array(
                    'layout' => 'style-four',
                ),
                'mobile_options' => true,
            ),

            'alignment'          => array(
                'label'           => esc_html__( 'Content Alignment', 'dina-divi-nations' ),
                'type'            => 'text_align',
                'option_category' => 'configuration',
                'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
                'default'         => 'left',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
                'mobile_options'  => true,
                'show_if'         => array(
                    'layout' => 'style-four',
                ),
            ),

            'vertical_alignment' => array(
                'label'           => esc_html__( 'Vertical Alignment', 'dina-divi-nations' ),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'start'  => esc_html__( 'Top', 'divinationkit-for-divi' ),
                    'center' => esc_html__( 'Center', 'divinationkit-for-divi' ),
                    'end'    => esc_html__( 'Bottom', 'divinationkit-for-divi' ),
                ),
                'default'         => 'center',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
                'mobile_options'  => true,
                'show_if'         => array(
                    'layout' => 'style-three',
                ),
            ),

            'rating_position'    => array(
                'label'       => esc_html__( 'Rating Position', 'divinationkit-for-divi' ),
                'type'        => 'select',
                'options'     => array(
                    'under_testimonial' => esc_html__( 'Under testimonial Text', 'divinationkit-for-divi' ),
                    'top_testimonial'   => esc_html__( 'Top testimonial Text', 'divinationkit-for-divi' ),
                    'under_author'      => esc_html__( 'Under Position Text', 'divinationkit-for-divi' ),
                ),
                'default'     => 'under_author',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'layout',
            ),
        );

        $design = array(
            'image_width'     => array(
                'label'          => esc_html__( 'Image Width', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change your back side image width.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => '%',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'image',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 100,
                ),
                'show_if_not'    => array(
                    'layout' => 'style-three',
                ),
            ),

            'star_color'      => array(
                'label'          => esc_html__( 'Star Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change star color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'rating_design',
                'mobile_options' => true,
                'hover'          => 'tabs',
                'show_if_not'    => array(
                    'rating_style' => 'none',
                ),
            ),

            'fill_star_color' => array(
                'label'          => esc_html__( 'Active Star Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change filled/active star color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'rating_design',
                'mobile_options' => true,
                'hover'          => 'tabs',
                'show_if_not'    => array(
                    'rating_style' => 'none',
                ),
            ),

            'star_size'       => array(
                'label'          => esc_html__( 'star Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change your back side star size.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'rating_design',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 1000,
                ),
                'show_if_not'    => array(
                    'rating_style' => 'none',
                ),
            ),
        );

        $custom_spacing = array(
            'image_margin'            => array(
                'label'          => esc_html__( 'Image Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for image', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'custom_spacing',
                'default'        => '',
                'mobile_options' => true,
            ),

            'image_padding'           => array(
                'label'          => esc_html__( 'Image Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for image', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'custom_spacing',
                'default'        => '',
                'mobile_options' => true,
            ),

            'rating_margin'           => array(
                'label'          => esc_html__( 'Rating Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for rating section', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'custom_spacing',
                'default'        => '',
                'mobile_options' => true,
            ),

            'rating_padding'          => array(
                'label'          => esc_html__( 'Rating Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for rating section', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'custom_spacing',
                'default'        => '',
                'mobile_options' => true,
            ),

            'content_wrapper_margin'  => array(
                'label'          => esc_html__( 'Content Wrapper Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for content wrapper', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'custom_spacing',
                'default'        => '',
                'show_if'        => array(
                    'layout' => array( 'style-three', 'style-four' ),
                ),
                'mobile_options' => true,
            ),

            'content_wrapper_padding' => array(
                'label'          => esc_html__( 'Content Wrapper Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for content wrapper', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'custom_spacing',
                'default'        => '',
                'show_if'        => array(
                    'layout' => array( 'style-three', 'style-four' ),
                ),
                'mobile_options' => true,
            ),

        );

        return array_merge( $content, $rating_settings, $layout, $design, $custom_spacing );
    }

    public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                = array();
        $advanced_fields['text']        = false;
        $advanced_fields['text_shadow'] = array();
        $advanced_fields['fonts']       = array();

        $advanced_fields['borders']['main'] = array(
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'borders',
            'css'         => array(
                'main'      => array(
                    'border_radii'  => '.dina_testimonial_slider-container %%order_class%%',
                    'border_styles' => '.dina_testimonial_slider-container %%order_class%%',
                ),
                'important' => 'all',
            ),
            'defaults'    => array(
                'border_radii'  => 'on|0px|0px|0px|0px',
                'border_styles' => array(
                    'width' => '0px',
                    'color' => '#333333',
                    'style' => 'solid',
                ),
            ),
        );

        $advanced_fields['borders']['image'] = array(
            'label_prefix' => esc_html__( 'Image/Icon', 'divinationkit-for-divi' ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'image',
            'css'          => array(
                'main'      => array(
                    'border_radii'  => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-img',
                    'border_styles' => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-img',
                ),
                'important' => true,
            ),
            'defaults'     => array(
                'border_radii'  => 'on|0px|0px|0px|0px',
                'border_styles' => array(
                    'width' => '0px',
                    'color' => $et_accent_color,
                    'style' => 'solid',
                ),
            ),
        );

        $advanced_fields['fonts']['rating_number'] = array(
            'label'       => esc_html__( 'Rating Number', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '.dina_testimonial_slider-container %%order_class%% .dina_rating-number',
                'important' => true,
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'rating_number',
            'font_size'   => array(
                'default' => '16px',
            ),
            'line_height' => array(
                'default' => '1.2em',
            ),
        );

        $advanced_fields['fonts']['name'] = array(
            'label'        => esc_html__( 'Name', 'divinationkit-for-divi' ),
            'css'          => array(
                'main'      => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-name',
                'important' => true,
            ),
            'header_level' => array(
                'default' => 'h3',
            ),
            'font_size'    => array(
                'default' => '16px',
            ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'name',
            'line_height'  => array(
                'default' => '1.5em',
            ),
        );

        $advanced_fields['fonts']['position'] = array(
            'label'        => esc_html__( 'position', 'divinationkit-for-divi' ),
            'css'          => array(
                'main'      => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-position',
                'important' => true,
            ),
            'header_level' => array(
                'default' => 'h4',
            ),
            'font_size'    => array(
                'default' => '16px',
            ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'position',
            'line_height'  => array(
                'default' => '1.5em',
            ),
        );

        $advanced_fields['fonts']['description'] = array(
            'label'       => esc_html__( 'Description', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-description p',
                'important' => true,
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'testimonial',
            'font_size'   => array(
                'default' => '14px',
            ),
            'line_height' => array(
                'default' => '1.2em',
            ),
        );

        $advanced_fields['background'] = array(
            'css'     => array(
                'main'      => '.dina_testimonial_slider-container %%order_class%%',
                'important' => true,
            ),
            'options' => array(
                'background_color' => array(
                    'default' => 'rgba(1, 86, 77, 0.05)',
                ),
            ),
        );

        $advanced_fields['margin_padding'] = array(
            'css' => array(
                'important' => 'all',
            ),
        );

        return $advanced_fields;
    }

    public function render_img() {

        if ( $this->props['use_image'] === 'on' ) {

            return sprintf(
                '<div class="dina_testimonial_box-img">
                    <img src = "%1$s" alt = "%2$s"/>
                </div>',
                $this->props['image'],
                $this->props['image_alt']
            );
        }
    }

    public function render_name() {

        $heading       = $this->props['name'];
        $heading_level = et_pb_process_header_level( $this->props['name_level'], 'h3' );

        if ( !empty( $heading ) ) {

            return sprintf(
                '<%1$s class="dina_testimonial_box-name">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    public function render_position() {

        $heading       = $this->props['position'];
        $heading_level = et_pb_process_header_level( $this->props['position_level'], 'h4' );

        if ( !empty( $heading ) ) {

            return sprintf(
                '<%1$s class="dina_testimonial_box-position">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    public function render_rating() {

        $rating_style = $this->props['rating_style'];

        $rating_scale = $this->props['rating_scale'];
        $rating       = $this->props['rating'];
        $fill_star    = ( 100 * floatval( $rating ) ) / floatval( $rating_scale );

        if ( $rating_style === 'none' ) {
            return;
        }

        if ( $rating_style === 'only_star' ) {
            return sprintf(
                '<div class="dina_rating-wrapper">
                    <div class="dina_rating-star-wrapper">
                        %1$s
                    </div>
                </div>',
                $this->render_stars( $rating, $rating_scale ),
            );
        }

        if ( $rating_style === 'only_number' ) {
            return sprintf(
                '<div class="dina_rating-wrapper">
                    <div class="dina_rating-number">
                        (%1$s/%2$s)
                    </div>
                </div>',
                $rating,
                $rating_scale
            );
        }

        if ( $rating_style === 'both' ) {

            return sprintf(
                '<div class="dina_rating-wrapper">
                    <div class="dina_rating-star-wrapper">
                        %1$s
                    </div>
                    <div class="dina_rating-number">
                        (%2$s/%3$s)
                    </div>
                </div>',
                $this->render_stars( $rating, $rating_scale ),
                $rating,
                $rating_scale,
            );
        }
    }

    public function render( $attrs, $content, $render_slug ) {

        $this->render_css( $render_slug );

        $layout          = $this->props['layout'];
        $rating_position = $this->props['rating_position'];
        $model           = '';

        if ( $layout === 'style-one' ) {
            $model = sprintf(
                '<div class="dina_testimonial_box-container dina_testimonial_box-%6$s">
                    <div class="dina_testimonial_box-author">
                        %1$s
                        <div class="dina_testimonial_box-info">
                            %2$s
                            %3$s
                           %7$s
                        </div>
                    </div>
                    <div class="dina_testimonial_box-content">
                        %8$s
                        <div class="dina_testimonial_box-description">
                            %5$s
                        </div>
                        %9$s
                    </div>
                </div>',
                $this->render_img(),
                $this->render_name(),
                $this->render_position(),
                $this->render_rating(),
                $this->render_MCE( $this->props['description'] ),
                $layout,
                ( $rating_position === 'under_author' ) ? $this->render_rating() : '',
                ( $rating_position === 'top_testimonial' ) ? $this->render_rating() : '',
                ( $rating_position === 'under_testimonial' ) ? $this->render_rating() : ''
            );
        }

        if ( $layout === 'style-two' ) {
            $model = sprintf(
                '<div class="dina_testimonial_box-container dina_testimonial_box-%6$s">
                <div class="dina_testimonial_box-content">
                    %8$s
                    <div class="dina_testimonial_box-description">
                        %5$s
                    </div>
                    %9$s
                </div>
                    <div class="dina_testimonial_box-author">
                        %1$s
                        <div class="dina_testimonial_box-info">
                            %2$s
                            %3$s
                            %7$s
                        </div>
                    </div>
                </div>',
                $this->render_img(),
                $this->render_name(),
                $this->render_position(),
                $this->render_rating(),
                $this->render_MCE( $this->props['description'] ),
                $layout,
                ( $rating_position === 'under_author' ) ? $this->render_rating() : '',
                ( $rating_position === 'top_testimonial' ) ? $this->render_rating() : '',
                ( $rating_position === 'under_testimonial' ) ? $this->render_rating() : ''
            );
        }

        if ( $layout === 'style-three' ) {
            $model = sprintf(
                '<div class="dina_testimonial_box-container dina_testimonial_box-%6$s">
                    %1$s
                    <div class="dina_testimonial_box-content-wrapper">
                        <div class="dina_testimonial_box-author">
                            <div class="dina_testimonial_box-info">
                                %2$s
                                %3$s
                            </div>
                            %7$s
                        </div>
                        <div class="dina_testimonial_box-content">
                            %8$s
                            <div class="dina_testimonial_box-description">
                                %5$s
                                %6$s
                            </div>
                            %9$s
                        </div>
                    </div>
                </div>',
                $this->render_img(),
                $this->render_name(),
                $this->render_position(),
                $this->render_rating(),
                $this->render_MCE( $this->props['description'] ),
                $layout,
                ( $rating_position === 'under_author' ) ? $this->render_rating() : '',
                ( $rating_position === 'top_testimonial' ) ? $this->render_rating() : '',
                ( $rating_position === 'under_testimonial' ) ? $this->render_rating() : ''
            );
        }

        if ( $layout === 'style-four' ) {
            $model = sprintf(
                '<div class="dina_testimonial_box-container dina_testimonial_box-%6$s">
                    <div class="dina_testimonial_box-img-wrapper">
                        %1$s
                    </div>
                    <div class="dina_testimonial_box-content-wrapper">
                        <div class="dina_testimonial_box-author">
                            <div class="dina_testimonial_box-info">
                                %2$s
                                %3$s
                                %7$s
                            </div>
                        </div>
                        <div class="dina_testimonial_box-content">
                            %8$s
                            <div class="dina_testimonial_box-description">
                                %5$s
                                %6$s
                            </div>
                            %9$s
                        </div>
                    </div>
                </div>',
                $this->render_img(),
                $this->render_name(),
                $this->render_position(),
                $this->render_rating(),
                $this->render_MCE( $this->props['description'] ),
                $layout,
                ( $rating_position === 'under_author' ) ? $this->render_rating() : '',
                ( $rating_position === 'top_testimonial' ) ? $this->render_rating() : '',
                ( $rating_position === 'under_testimonial' ) ? $this->render_rating() : ''
            );
        }

        return $model;
    }

    public function render_css( $render_slug ) {

        $this->dina_responsive_css( $render_slug, array(
            array(
                'option_slug' => 'image_width',
                'property'    => 'width',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-img',
            ),
            array(
                'option_slug' => 'image_margin',
                'property'    => 'margin',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-img',
            ),
            array(
                'option_slug' => 'image_padding',
                'property'    => 'padding',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-img',
            ),

            array(
                'option_slug' => 'star_color',
                'property'    => 'color',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_rating-star',
            ),
            array(
                'option_slug' => 'star_size',
                'property'    => 'font-size',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_rating-star',
            ),
            array(
                'option_slug' => 'fill_star_color',
                'property'    => 'color',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_rating-star-full, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-1::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-2::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-3::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-4::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-5::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-6::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-7::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-8::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-9::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-10::before',
                'important'   => true,
            ),

            array(
                'option_slug' => 'rating_margin',
                'property'    => 'margin',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_rating-wrapper',
            ),
            array(
                'option_slug' => 'rating_padding',
                'property'    => 'padding',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_rating-wrapper',
            ),

            array(
                'option_slug' => 'image_gap',
                'property'    => 'gap',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-author, .dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-style-three',
            ),
            array(
                'option_slug' => 'alignment',
                'property'    => 'justify-content',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-img-wrapper, .dina_testimonial_slider-container %%order_class%% .dina_rating-wrapper',
            ),
            array(
                'option_slug' => 'alignment',
                'property'    => 'text-align',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-content-wrapper',
            ),

            array(
                'option_slug' => 'vertical_alignment',
                'property'    => 'align-items',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-author, .dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-style-three',
            ),

            array(
                'option_slug' => 'content_wrapper_margin',
                'property'    => 'margin',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-content-wrapper',
            ),
            array(
                'option_slug' => 'content_wrapper_padding',
                'property'    => 'padding',
                'selector'    => '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-content-wrapper',
            ),

        ) );
    }
}

new DINA_Testimonial_Slider_Child();