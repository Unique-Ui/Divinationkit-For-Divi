<?php

class DINA_Icon_List_Child extends DINA_Module_Core {

    public function init() {

        $this->name                     = esc_html__( 'Icon List Item', 'divinationkit-for-divi' );
        $this->type                     = 'child';
        $this->slug                     = 'dina_icon_list_child';
        $this->child_title_var          = 'admin_title';
        $this->child_title_fallback_var = 'title';
        $this->vb_support               = 'on';

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'icon'    => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                    'content' => esc_html__( 'Content', 'divinationkit-for-divi' ),
                    'tooltip' => esc_html__( 'Tooltip', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'icon'        => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                    'title'       => esc_html__( 'Title', 'divinationkit-for-divi' ),
                    'description' => esc_html__( 'Description', 'divinationkit-for-divi' ),
                    'tooltip'     => array(
                        'title'             => esc_html__( 'Tooltip', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'style'        => array(
                                'name' => esc_html__( 'Style', 'divinationkit-for-divi' ),
                            ),
                            'tooltip_text' => array(
                                'name' => esc_html__( 'Tooltip Text', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                    'badge'       => array(
                        'title'             => esc_html__( 'Badge', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'style'      => array(
                                'name' => esc_html__( 'Style', 'divinationkit-for-divi' ),
                            ),
                            'badge_text' => array(
                                'name' => esc_html__( 'Badge Text', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                ),
            ),
        );

        $this->custom_css_fields = array(
            'icon'                      => array(
                'label'    => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                'selector' => '.dina_icon_list-container %%order_class%% .dina_icon_list-icon i.dina_icon',
            ),
            'icon_list_text'            => array(
                'label'    => esc_html__( 'List Text', 'divinationkit-for-divi' ),
                'selector' => '.dina_icon_list-container %%order_class%% .dina_icon_list-title',
            ),
            'icon_list_description'     => array(
                'label'    => esc_html__( 'List Text', 'divinationkit-for-divi' ),
                'selector' => '.dina_icon_list-container %%order_class%% .dina_icon_list-description',
            ),
            'icon_list_badge'           => array(
                'label'    => esc_html__( 'Badge', 'divinationkit-for-divi' ),
                'selector' => '.dina_icon_list-container %%order_class%% .dina_icon_list-badge',
            ),
            'icon_list_tooltip_button'  => array(
                'label'    => esc_html__( 'Tooltip Button', 'divinationkit-for-divi' ),
                'selector' => '.dina_icon_list-container %%order_class%% .dina_tooltip-trigger',
            ),
            'icon_list_tooltip_wrapper' => array(
                'label'    => esc_html__( 'Tooltip Wrapper', 'divinationkit-for-divi' ),
                'selector' => '.dina_icon_list-container %%order_class%% .dina_tooltip-wrapper',
            ),
            'icon_list_tooltip_text'    => array(
                'label'    => esc_html__( 'Tooltip Wrapper', 'divinationkit-for-divi' ),
                'selector' => '.dina_icon_list-container %%order_class%% .dina_tooltip-text',
            ),
            'item'                      => array(
                'label'    => esc_html__( 'Icon List Item', 'divinationkit-for-divi' ),
                'selector' => '.dina_icon_list-container %%order_class%% .dina_icon_list_child',
            ),
        );
    }

    public function get_fields() {

        $content = array(
            'use_icon'    => array(
                'label'           => esc_html__( 'Use Icon', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can choose whether icon will be display or not', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'on',
                'toggle_slug'     => 'icon',
            ),

            'icon'        => array(
                'label'       => esc_html__( 'Select Icon', 'divinationkit-for-divi' ),
                'type'        => 'select_icon',
                'toggle_slug' => 'icon',
                'tab_slug'    => 'general',
                'show_if'     => array(
                    'use_icon' => 'on',
                ),
            ),

            'title'       => array(
                'label'           => esc_html__( 'Title', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define icon list title.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'toggle_slug'     => 'content',
                'dynamic_content' => 'text',
            ),

            'description' => array(
                'label'           => esc_html__( 'Description', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define icon list description', 'divinationkit-for-divi' ),
                'type'            => 'tiny_mce',
                'toggle_slug'     => 'content',
                'dynamic_content' => 'text',
            ),
        );

        $tooltip = array(
            'use_tooltip'      => array(
                'label'           => esc_html__( 'Use Tooltip', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can choose whether tooltip will be display or not', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'tooltip',
            ),

            'tooltip_text'     => array(
                'label'           => esc_html__( 'Tooltip Text', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define tooltip text and this will display whenever hover the info icon', 'divinationkit-for-divi' ),
                'type'            => 'textarea',
                'toggle_slug'     => 'tooltip',
                'dynamic_content' => 'text',
                'show_if'         => array(
                    'use_tooltip' => 'on',
                ),
            ),

            'tooltip_position' => array(
                'label'       => esc_html__( 'Tooltip Position', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Here you can define tooltip position like (top, bottom, left, right)', 'divinationkit-for-divi' ),
                'type'        => 'select',
                'options'     => array(
                    'top'    => esc_html__( 'Top', 'divinationkit-for-divi' ),
                    'right'  => esc_html__( 'Right', 'divinationkit-for-divi' ),
                    'bottom' => esc_html__( 'Bottom', 'divinationkit-for-divi' ),
                    'left'   => esc_html__( 'Left', 'divinationkit-for-divi' ),
                ),
                'default'     => 'top',
                'toggle_slug' => 'tooltip',
                'show_if'     => array(
                    'use_tooltip' => 'on',
                ),
            ),
        );

        $tooltip_design = array(
            'tooltip_bg'           => array(
                'label'          => esc_html__( 'Tooltip Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change tooltip background color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#333333',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'tooltip',
                'sub_toggle'     => 'style',
                'mobile_options' => true,
            ),

            'tooltip_button_color' => array(
                'label'          => esc_html__( 'Tooltip Button Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change tooltip button color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#dddddd',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'tooltip',
                'sub_toggle'     => 'style',
                'mobile_options' => true,
            ),

            'tooltip_button_size'  => array(
                'label'          => esc_html__( 'Tooltip button Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define tooltip button size', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '14px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'tooltip',
                'sub_toggle'     => 'style',
            ),

            'tooltip_padding'      => array(
                'label'          => esc_html__( 'Tooltip Wrapper Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for flip card tooltip wrapper', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'tooltip',
                'sub_toggle'     => 'style',
                'mobile_options' => true,
            ),
        );

        $badge = array(
            'use_badge'     => array(
                'label'           => esc_html__( 'Use Badge', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can choose whether badge will be display or not', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'content',
            ),

            'badge_text'    => array(
                'label'       => esc_html__( 'Badge Text', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define badge text', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
                'show_if'     => array(
                    'use_badge' => 'on',
                ),
            ),

            'badge_bg'      => array(
                'label'          => esc_html__( 'Badge Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change your front side badge background color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'badge',
                'sub_toggle'     => 'style',
                'show_if'        => array(
                    'use_badge' => 'on',
                ),
                'mobile_options' => true,
            ),

            'badge_padding' => array(
                'label'          => esc_html__( 'Badge Wrapper Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for flip card badge wrapper', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'badge',
                'sub_toggle'     => 'style',
                'mobile_options' => true,
            ),

        );

        return array_merge( $content, $tooltip, $badge, $tooltip_design );
    }

    public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();
        $advanced_fields = array();

        $advanced_fields['fonts']['title'] = array(
            'label'            => esc_html__( 'Title', 'divinationkit-for-divi' ),
            'css'              => array(
                'main'      => '.dina_icon_list-container %%order_class%% .dina_icon_list-title',
                'important' => false,
            ),
            'header_level'     => array(
                'default' => 'h4',
            ),
            'font_size'        => array(
                'default' => '18px',
            ),
            'options_priority' => array(
                'header_text_color' => 9,
            ),
            'tab_slug'         => 'advanced',
            'toggle_slug'      => 'title',
            'line_height'      => array(
                'default' => '1.5em',
            ),
        );

        $advanced_fields['fonts']['description'] = array(
            'label'       => esc_html__( 'Description', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '.dina_icon_list-container %%order_class%% .dina_icon_list-description p',
                'important' => true,
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'description',
            'font_size'   => array(
                'default' => '16px',
            ),
            'line_height' => array(
                'default' => '1.2em',
            ),
        );

        $advanced_fields['fonts']['tooltip'] = array(
            'label'       => esc_html__( 'Description', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '.dina_icon_list-container %%order_class%% .dina_tooltip-text',
                'important' => false,
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'tooltip',
            'sub_toggle'  => 'tooltip_text',
            'font_size'   => array(
                'default' => '14px',
            ),
            'line_height' => array(
                'default' => '1.2em',
            ),
        );

        $advanced_fields['fonts']['badge_text'] = array(
            'label'       => esc_html__( 'Badge Text', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '.dina_icon_list-container %%order_class%% .dina_icon_list-badge',
                'important' => true,
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'badge',
            'sub_toggle'  => 'badge_text',
            'font_size'   => array(
                'default' => '12px',
            ),
            'line_height' => array(
                'default' => '1.2em',
            ),
        );

        $advanced_fields['borders']['badge'] = array(
            'label_prefix'    => esc_html__( 'Badge', 'divinationkit-for-divi' ),
            'tab_slug'        => 'advanced',
            'toggle_slug'     => 'badge',
            'sub_toggle'      => 'style',
            'css'             => array(
                'main'      => array(
                    'border_radii'  => '.dina_icon_list-container %%order_class%% .dina_icon_list-badge',
                    'border_styles' => '.dina_icon_list-container %%order_class%% .dina_icon_list-badge',
                ),
                'important' => false,
            ),
            'depends_show_if' => array(
                'use_badge' => 'on',
            ),
            'defaults'        => array(
                'border_radii'  => 'on|0px|0px|0px|0px',
                'border_styles' => array(
                    'width' => '0px',
                    'color' => $et_accent_color,
                    'style' => 'solid',
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

    public function render_tooltip() {

        $tooltip_text     = $this->props['tooltip_text'];
        $tooltip_position = $this->props['tooltip_position'];

        return sprintf(
            '<div class="dina_tooltip_container">
                <span class="dina_tooltip-trigger"></span>
                <div class="dina_tooltip-wrapper dina_tooltip-%2$s">
                    <div class="dina_tooltip-text">%1$s</div>
                </div>
            </div>',
            $tooltip_text,
            $tooltip_position,
        );

    }

    public function render_icon() {

        return sprintf(
            '<div class="dina_icon_list-icon">
                <i class="dina_icon">%1$s</i>
            </div>',
            $this->dina_render_icon( 'icon' )
        );

    }

    public function render_title() {

        $heading       = $this->props['title'];
        $heading_level = et_pb_process_header_level( $this->props['title_level'], 'h5' );
        $content       = '';

        // If use tooltip
        $use_tooltip = $this->props['use_tooltip'];

        if ( !empty( $heading ) ) {

            if ( $use_tooltip === 'on' ) {
                $content = sprintf(
                    '<div class="dina_icon_list-use-tooltip">
                        <%1$s class="dina_icon_list-title">%2$s %4$s</%1$s>
                        %3$s
                    </div>',
                    $heading_level,
                    $heading,
                    $this->render_tooltip(),
                    $this->render_badge(),
                );
            } else {
                $content = sprintf(
                    '<%1$s class="dina_icon_list-title">%2$s %3$s</%1$s>',
                    $heading_level,
                    $heading,
                    $this->render_badge(),
                );
            }

        }

        return $content;
    }

    public function render_description() {

        return sprintf(
            '<div class="dina_icon_list-description">
                %1$s
            </div>',
            $this->render_MCE( $this->props['description'] )
        );
    }

    public function render_badge() {
        $is_use_badge = $this->props['use_badge'] === 'on' ? true : false;
        $badge_text   = $this->props['badge_text'];

        if ( $is_use_badge ) {
            return sprintf(
                '<span class="dina_icon_list-badge">%1$s</span>',
                $badge_text
            );
        }
    }

    public function render( $attrs, $content, $render_slug ) {

        $this->render_css( $render_slug );

        return sprintf(
            '<div class="dina_icon_list-item">
                %1$s
                <div class="dina_icon_list-content">
                    %2$s
                    %3$s
                </div>
            </div>',
            $this->render_icon(),
            $this->render_title(),
            $this->render_description()
        );
    }

    public function render_css( $render_slug ) {
        // Generate icon style
        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'icon',
                'important'      => true,
                'selector'       => '.dina_icon_list-container %%order_class%% .dina_icon_list-icon i.dina_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );

        $this->dina_responsive_css( $render_slug, array(
            // Tooltip
            array(
                'option_slug' => 'tooltip_bg',
                'property'    => 'background',
                'selector'    => '.dina_icon_list-container %%order_class%% .dina_tooltip-wrapper',
            ),
            array(
                'option_slug' => 'tooltip_bg',
                'property'    => 'border-top-color',
                'selector'    => '.dina_icon_list-container %%order_class%% .dina_tooltip-wrapper::after',
            ),
            array(
                'option_slug' => 'tooltip_button_color',
                'property'    => 'color',
                'selector'    => '.dina_icon_list-container %%order_class%% .dina_tooltip-trigger::after',
            ),
            array(
                'option_slug' => 'tooltip_button_size',
                'property'    => 'font-size',
                'selector'    => '.dina_icon_list-container %%order_class%% .dina_tooltip-trigger::after',
            ),

            array(
                'option_slug' => 'badge_bg',
                'property'    => 'background',
                'selector'    => '.dina_icon_list-container %%order_class%% .dina_icon_list-badge',
            ),
        ) );

        if ( $this->props['tooltip_padding'] !== '' ) {
            $this->dina_responsive_css( $render_slug, array(
                array(
                    'option_slug' => 'tooltip_padding',
                    'property'    => 'padding',
                    'selector'    => '.dina_icon_list-container %%order_class%% .dina_tooltip-wrapper',
                ),
            ) );
        }

        if ( $this->props['badge_padding'] !== '' ) {
            $this->dina_responsive_css( $render_slug, array(
                array(
                    'option_slug' => 'badge_padding',
                    'property'    => 'padding',
                    'selector'    => '.dina_icon_list-container %%order_class%% .dina_icon_list-badge',
                ),
            ) );
        }

    }
}

new dina_Icon_List_Child();