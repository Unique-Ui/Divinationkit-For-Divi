<?php

class DINA_Person extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . '/modules/person/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {

        $this->name            = esc_html__( 'Person', 'divinationkit-for-divi' );
        $this->slug            = 'dina_person';
        $this->child_slug      = 'dina_person_child';
        $this->child_item_text = esc_html__( 'Social Network', 'divinationkit-for-divi' );
        $this->vb_support      = 'on';
        $this->folder_name     = 'Divi Nation Kit';
        $this->icon_path       = $this->dina_module_icon( 'person' );

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'image'   => esc_html__( 'Image', 'dina-divinationkit' ),
                    'content' => esc_html__( 'Content', 'dina-divinationkit' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'layout'         => esc_html__( 'Layout', 'divinationkit-for-divi' ),
                    'icon'           => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                    'image'          => esc_html__( 'Image', 'divinationkit-for-divi' ),
                    'content'        => array(
                        'title'             => esc_html__( 'Person Texts', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'name'        => array(
                                'name' => esc_html__( 'Title', 'divinationkit-for-divi' ),
                            ),
                            'position'    => array(
                                'name' => esc_html__( 'Position', 'divinationkit-for-divi' ),
                            ),
                            'description' => array(
                                'name' => esc_html__( 'Description', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                    'custom_spacing' => esc_html__( 'Custom Spacing', 'divinationkit-for-divi' ),
                    'borders'        => esc_html__( 'Border', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    public function get_fields() {

        $content = array(
            'image'       => array(
                'label'              => esc_html__( 'Upload Image', 'divinationkit-for-divi' ),
                'description'        => esc_html__( 'Upload an image or type in the URL of the image you would like to display.', 'divinationkit-for-divi' ),
                'type'               => 'upload',
                'upload_button_text' => esc_attr__( 'Upload an image', 'divinationkit-for-divi' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'divinationkit-for-divi' ),
                'update_text'        => esc_attr__( 'Set As Image', 'divinationkit-for-divi' ),
                'toggle_slug'        => 'content',
            ),

            'image_alt'   => array(
                'label'       => esc_html__( 'Image Alt Text', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define the image alternative text', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
            ),

            'name'        => array(
                'label'       => esc_html__( 'Name', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define person name', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
            ),

            'position'    => array(
                'label'       => esc_html__( 'Position', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define person designation and company name', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
            ),

            'description' => array(
                'label'           => esc_html__( 'Description', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define description text for your icon box.', 'divinationkit-for-divi' ),
                'type'            => 'tiny_mce',
                'toggle_slug'     => 'content',
                'sub_toggle'      => 'side',
                'dynamic_content' => 'text',
            ),
        );

        $layout = array(
            'layout'                => array(
                'label'       => esc_html__( 'Select Layout Style', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Here you can choose different kind of review layout styles', 'divinationkit-for-divi' ),
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

            'show_info_on_hover'    => array(
                'label'       => esc_html__( 'Show Info On Hover', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Turn off you wan to show the person info on hover', 'divinationkit-for-divi' ),
                'type'        => 'yes_no_button',
                'options'     => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'     => 'off',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'layout',
                'show_if'     => array(
                    'layout' => 'style-two',
                ),
            ),

            'show_network_on_hover' => array(
                'label'       => esc_html__( 'Show Social Icon On Hover', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Turn off you wan to show the person social icon on hover', 'divinationkit-for-divi' ),
                'type'        => 'yes_no_button',
                'options'     => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'     => 'off',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'layout',
                'show_if'     => array(
                    'layout' => 'style-three',
                ),
            ),

            'offset_x'              => array(
                'label'          => esc_html__( 'Vertical Offset', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define social links vertical position', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => '%',
                'default'        => '50%',
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'show_if'        => array(
                    'layout' => 'style-three',
                ),
                'mobile_options' => true,
            ),

            'image_width'           => array(
                'label'          => esc_html__( 'Image Width', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define person image width', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => '%',
                'default'        => '45%',
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'show_if'        => array(
                    'layout' => 'style-four',
                ),
                'mobile_options' => true,
            ),

        );

        $content_bg = $this->dina_custom_background_fields( 'content', 'Content', 'advanced', 'layout',
            array( 'color', 'gradient', 'image' ),
            array(
                'layout' => 'style-two',
            ),
            '#00e091'
        );

        $design = array(
            'icon_alignment' => array(
                'label'           => esc_html__( 'Icon Alignment', 'divinationkit-for-divi' ),
                'type'            => 'text_align',
                'option_category' => 'configuration',
                'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'icon',
                'mobile_options'  => true,
            ),

            'icon_bg'        => array(
                'label'          => esc_html__( 'Icon Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon background color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_color'     => array(
                'label'          => esc_html__( 'Icon Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#ffffff',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_size'      => array(
                'label'          => esc_html__( 'Icon Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon size.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '16px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 1000,
                ),
            ),

            'icon_gap'       => array(
                'label'          => esc_html__( 'Space Between Icons', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define space between icons', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 250,
                ),
                'default'        => '10px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
            ),
        );

        $custom_spacing = array(
            'content_margin'  => array(
                'label'          => esc_html__( 'Content Wrapper Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin content wrapper', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'custom_spacing',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),
            'content_padding' => array(
                'label'          => esc_html__( 'Content Wrapper Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding content wrapper', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'custom_spacing',
                'default'        => '20px|20px|20px|20px',
                'mobile_options' => true,
            ),

            'network_margin'  => array(
                'label'          => esc_html__( 'Social Link Wrapper Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin social link wrapper', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'custom_spacing',
                'default'        => '20px|0px|0px|0px',
                'mobile_options' => true,
            ),
            'network_padding' => array(
                'label'          => esc_html__( 'Social Link Wrapper Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding social link wrapper', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'custom_spacing',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),
        );

        return array_merge( $content, $layout, $content_bg, $design, $custom_spacing );
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
                    'border_radii'  => '%%order_class%%',
                    'border_styles' => '%%order_class%%',
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

        $advanced_fields['borders']['icons'] = array(
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'icon',
            'css'         => array(
                'main'      => array(
                    'border_radii'  => '%%order_class%% .dina_person-social-network span::before',
                    'border_styles' => '%%order_class%% .dina_person-social-network span::before',
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
            'label_prefix' => esc_html__( 'Image', 'divinationkit-for-divi' ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'image',
            'css'          => array(
                'main'      => array(
                    'border_radii'  => '%%order_class%% .dina_person-img',
                    'border_styles' => '%%order_class%% .dina_person-img',
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

        $advanced_fields['fonts']['name'] = array(
            'label'        => esc_html__( 'Name', 'divinationkit-for-divi' ),
            'css'          => array(
                'main'      => '%%order_class%% .dina_person-name',
                'important' => true,
            ),
            'header_level' => array(
                'default' => 'h3',
            ),
            'font_size'    => array(
                'default' => '16px',
            ),
            'line_height'  => array(
                'default' => '1.5em',
            ),
            'font'         => array(
                'default' => '|600|||||||',
            ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'content',
            'sub_toggle'   => 'name',
        );

        $advanced_fields['fonts']['position'] = array(
            'label'        => esc_html__( 'position', 'divinationkit-for-divi' ),
            'css'          => array(
                'main'      => '%%order_class%% .dina_person-position',
                'important' => true,
            ),
            'header_level' => array(
                'default' => 'h4',
            ),
            'font_size'    => array(
                'default' => '16px',
            ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'content',
            'sub_toggle'   => 'position',
            'line_height'  => array(
                'default' => '1.5em',
            ),
        );

        $advanced_fields['fonts']['description'] = array(
            'label'           => esc_html__( 'Description', 'divinationkit-for-divi' ),
            'css'             => array(
                'main'      => '%%order_class%% .dina_person-description p',
                'important' => false,
            ),
            'tab_slug'        => 'advanced',
            'toggle_slug'     => 'content',
            'sub_toggle'      => 'description',
            'font_size'       => array(
                'default' => '14px',
            ),
            'hide_text_align' => true,
            'line_height'     => array(
                'default' => '1.2em',
            ),
        );

        $advanced_fields['background'] = array(
            'css'     => array(
                'main'      => '%%order_class%%',
                'important' => true,
            ),
            'options' => array(
                'background_color' => array(
                    'default' => 'rgba(1, 86, 77, 0.05)',
                ),
            ),
        );

        return $advanced_fields;
    }

    public function render_img() {

        return sprintf(
            '<div class="dina_person-img">
                <img src="%1$s" alt="%2$s"/>
            </div>',
            $this->props['image'],
            $this->props['image_alt']
        );
    }

    public function render_name() {

        $heading       = $this->props['name'];
        $heading_level = et_pb_process_header_level( $this->props['name_level'], 'h3' );

        if ( !empty( $heading ) ) {

            return sprintf(
                '<%1$s class="dina_person-name">%2$s</%1$s>',
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
                '<%1$s class="dina_person-position">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    public function render_description() {
        if ( $this->props['description'] !== '' ) {
            return sprintf(
                '<div class="dina_person-description">
                    %1$s
                </div>',
                $this->render_MCE( $this->props['description'] )
            );
        }
    }

    public function render_social_links( $content ) {
        if ( $content ) {
            return sprintf(
                '<div class="dina_person-social-links">
                    %1$s
                </div>',
                $content
            );
        }
    }

    public function render( $attrs, $content, $render_slug ) {

        $this->render_css( $render_slug );
        $classes = array( 'dina_person-container' );

        array_push( $classes, "dina_person-{$this->props['layout']}" );

        if ( $this->props['show_info_on_hover'] === 'on' ) {
            array_push( $classes, 'dina_person-info-show-on-hover' );
        }

        if ( $this->props['show_network_on_hover'] === 'on' ) {
            array_push( $classes, 'dina_person-network-show-on-hover' );
        }

        return sprintf(
            '<div class="%1$s">
                %2$s
                <div class="dina_person-info">
                    <div class="dina_person-details">
                        %3$s
                        %4$s
                        %6$s
                    </div>
                    %5$s
                </div>
            </div>',
            join( ' ', $classes ),
            $this->render_img(),
            $this->render_name(),
            $this->render_position(),
            $this->render_social_links( $this->content ), // 5
            $this->render_description(),
        );
    }

    public function render_css( $render_slug ) {

        $size   = explode( 'px', $this->props['icon_size'] )[0] * 2;
        $layout = $this->props['layout'];

        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => '%%order_class%% .dina_person-social-network',
            'declaration' => "width:{$size}px; height: {$size}px;",
        ) );

        $this->dina_responsive_css( $render_slug, array(
            array(
                'option_slug' => 'icon_alignment',
                'property'    => 'justify-content',
                'selector'    => '%%order_class%% .dina_person-social-links',
            ),
            array(
                'option_slug' => 'icon_gap',
                'property'    => 'gap',
                'selector'    => '%%order_class%% .dina_person-social-links',
            ),
            array(
                'option_slug' => 'icon_size',
                'property'    => 'font-size',
                'selector'    => '%%order_class%% .dina_person-social-network span::before',
                'hover'       => '%%order_class%% .dina_person-social-network:hover span::before',
            ),
            array(
                'option_slug' => 'icon_bg',
                'property'    => 'background',
                'selector'    => '%%order_class%% .dina_person-social-network span::before',
                'hover'       => '%%order_class%% .dina_person-social-network:hover span::before',
            ),
            array(
                'option_slug' => 'icon_color',
                'property'    => 'color',
                'selector'    => '%%order_class%% .dina_person-social-network span::before',
                'hover'       => '%%order_class%% .dina_person-social-network:hover span::before',
            ),

            // Custom spacing
            array(
                'option_slug' => 'content_margin',
                'property'    => 'margin',
                'selector'    => '%%order_class%% .dina_person-info',
            ),
            array(
                'option_slug' => 'content_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_person-info',
            ),
            array(
                'option_slug' => 'network_margin',
                'property'    => 'margin',
                'selector'    => '%%order_class%% .dina_person-social-links',
            ),
            array(
                'option_slug' => 'network_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_person-social-links',
            ),

            // Style three
            array(
                'option_slug' => 'offset_x',
                'property'    => 'top',
                'selector'    => '%%order_class%% .dina_person-style-three .dina_person-social-links',
            ),

            // Style four
            array(
                'option_slug' => 'image_width',
                'property'    => 'width',
                'selector'    => '%%order_class%% .dina_person-style-four .dina_person-img',
            ),
        ) );

        // Content background
        if ( $layout === 'style-two' ) {
            $this->dina_custom_bg_style( $render_slug, 'content', '%%order_class%% .dina_person-style-two .dina_person-info', '%%order_class%%:hover .dina_person-style-two .dina_person-info' );
        }
    }
}

new DINA_Person();