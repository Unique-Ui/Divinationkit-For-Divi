<?php

class DINA_Basic_Menu extends DINA_Module_Core {
    /**
     * Menu module slug.
     *
     * @var string
     */
    protected static $menu_slug = 'dina_basic_menu';

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . 'modules/basic-menu/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {
        $this->name        = esc_html__( 'Basic Menu', 'divinationkit-for-divi' );
        $this->plural      = esc_html__( 'Basic Menus', 'divinationkit-for-divi' );
        $this->slug        = self::$menu_slug;
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';
        $this->icon_path   = $this->dina_module_icon( 'basic-menu' );

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'content'  => esc_html__( 'Content', 'divinationkit-for-divi' ),
                    'logo'     => esc_html__( 'Logo', 'divinationkit-for-divi' ),
                    'elements' => esc_html__( 'Elements', 'divinationkit-for-divi' ),
                    'settings' => esc_html__( 'Settings', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'layout'    => esc_html__( 'Layout', 'divinationkit-for-divi' ),
                    'menu_text' => esc_html__( 'Menu Text', 'divinationkit-for-divi' ),
                    'dropdown'  => esc_html__( 'Dropdown Menu', 'divinationkit-for-divi' ),
                    'icon'      => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                    'logo'      => esc_html__( 'Logo', 'divinationkit-for-divi' ),
                    'border'    => esc_html__( 'Border', 'divinationkit-for-divi' ),
                    'text'      => array(
                        'title'             => esc_html__( 'Text', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'text'  => array(
                                'name' => esc_html__( 'Text', 'divinationkit-for-divi' ),
                            ),
                            'style' => array(
                                'name' => esc_html__( 'Style', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                ),
            ),
        );
    }

    public function get_fields() {

        $menu = array(
            'menu_id' => array(
                'label'            => esc_html__( 'Menu', 'divinationkit-for-divi' ),
                'description'      => sprintf(
                    '<p class="description">%2$s. <a href="%1$s?action=edit&menu=0" target="_blank">%3$s</a>.</p>',
                    esc_url( admin_url( 'nav-menus.php' ) ),
                    esc_html__( 'Select a menu that should be used in the module', 'divinationkit-for-divi' ),
                    esc_html__( 'Click here to create new menu', 'divinationkit-for-divi' )
                ),
                'type'             => 'select',
                'option_category'  => 'basic_option',
                'options'          => dina_get_menu_options(),
                'toggle_slug'      => 'content',
                'computed_affects' => array(
                    '__menu',
                ),
            ),

            '__menu'  => array(
                'type'                => 'computed',
                'computed_callback'   => array( 'DINA_Basic_menu', 'dina_get_nav_menus' ),
                'computed_depends_on' => array(
                    'menu_id',
                ),
            ),
        );

        $logo = array(
            'logo'                => array(
                'label'              => esc_html__( 'Logo', 'divinationkit-for-divi' ),
                'description'        => esc_html__( 'Upload an image to display beside your menu.', 'divinationkit-for-divi' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_html__( 'Upload an image', 'divinationkit-for-divi' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'divinationkit-for-divi' ),
                'update_text'        => esc_attr__( 'Set As Logo', 'divinationkit-for-divi' ),
                'toggle_slug'        => 'logo',
                'dynamic_content'    => 'image',
                'mobile_options'     => true,
                'hover'              => 'tabs',
            ),

            'logo_url'            => array(
                'label'           => esc_html__( 'Logo Link URL', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'If you would like to make your logo a link, input your destination URL here.', 'divinationkit-for-divi' ),
                'toggle_slug'     => 'link_options',
                'dynamic_content' => 'url',
            ),

            'logo_url_new_window' => array(
                'label'            => esc_html__( 'Logo Link Target', 'divinationkit-for-divi' ),
                'type'             => 'select',
                'option_category'  => 'configuration',
                'options'          => array(
                    'off' => esc_html__( 'In The Same Window', 'divinationkit-for-divi' ),
                    'on'  => esc_html__( 'In The New Tab', 'divinationkit-for-divi' ),
                ),
                'toggle_slug'      => 'link_options',
                'description'      => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'divinationkit-for-divi' ),
                'default_on_front' => 'off',
            ),

            'logo_alt'            => array(
                'label'           => esc_html__( 'Logo Alt Text', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Define the HTML ALT text for your logo here.', 'divinationkit-for-divi' ),
                'tab_slug'        => 'custom_css',
                'toggle_slug'     => 'attributes',
                'dynamic_content' => 'text',
            ),

            'logo_width'          => array(
                'label'           => esc_html__( 'Logo Width', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Adjust the width of the logo.', 'divinationkit-for-divi' ),
                'type'            => 'range',
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'width',
                'mobile_options'  => true,
                'validate_unit'   => true,
                'allowed_values'  => et_builder_get_acceptable_css_string_values( 'width' ),
                'default'         => 'auto',
                'default_unit'    => '%',
                'range_settings'  => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '1',
                ),
                'responsive'      => true,
                'hover'           => 'tabs',
                'sticky'          => true,
            ),
        );

        $elements = array(
            'show_cart_icon'     => array(
                'label'           => esc_html__( 'Show Shopping Cart Icon', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'layout',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'elements',
                'mobile_options'  => true,
                'responsive'      => true,
                'hover'           => 'tabs',
                'sticky'          => true,
                'affects'         => array( 'show_cart_quantity' ),
            ),
            'show_cart_quantity' => array(
                'label'           => esc_html__( 'Show Cart Quantity', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'layout',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'elements',
                'show_if'         => array(
                    'show_cart_icon' => 'on',
                ),
            ),
            'show_search_icon'   => array(
                'label'           => esc_html__( 'Show Search Icon', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'layout',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'elements',
                'mobile_options'  => true,
                'responsive'      => true,
                'hover'           => 'tabs',
                'sticky'          => true,
            ),
        );

        $layout = array(
            'menu_type'             => array(
                'label'           => esc_html__( 'Menu Type', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'horizontal' => esc_html__( 'Horizontal', 'divinationkit-for-divi' ),
                    'vertical'   => esc_html__( 'Vertical', 'divinationkit-for-divi' ),
                ),
                'default'         => 'horizontal',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
            ),

            'menu_style'            => array(
                'label'           => esc_html__( 'Style', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'layout',
                'options'         => array(
                    'left_aligned'  => esc_html__( 'Left Aligned', 'divinationkit-for-divi' ),
                    'right_aligned' => esc_html__( 'Right Aligned', 'divinationkit-for-divi' ),
                    'centered'      => esc_html__( 'Centered', 'divinationkit-for-divi' ),
                ),
                'default'         => 'left_aligned',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
                'show_if'         => array(
                    'menu_type' => 'horizontal',
                ),
            ),

            'submenu_direction'     => array(
                'label'            => esc_html__( 'Dropdown Menu Direction', 'divinationkit-for-divi' ),
                'description'      => esc_html__( 'Here you can choose the direction that your sub-menus will open. You can choose to have them open downwards or upwards.', 'divinationkit-for-divi' ),
                'type'             => 'select',
                'option_category'  => 'configuration',
                'options'          => array(
                    'downwards' => esc_html__( 'Downwards', 'divinationkit-for-divi' ),
                    'upwards'   => esc_html__( 'Upwards', 'divinationkit-for-divi' ),
                ),
                'tab_slug'         => 'advanced',
                'toggle_slug'      => 'layout',
                'computed_affects' => array(
                    '__menu',
                ),
                'show_if'          => array(
                    'menu_type' => 'horizontal',
                ),
            ),

            'show_submenu_on_click' => array(
                'label'           => esc_html__( 'Show Submenu on Click', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'By default submenu show on hover, otherwise turn on if you want to show submenu on click', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'layout',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
                'show_if'         => array(
                    'menu_type' => 'horizontal',
                ),
            ),
        );

        return array_merge( $menu, $logo, $elements, $layout );
    }

    static function dina_get_nav_menus( $args = array() ) {

        $defaults = array(
            'menu_id' => '',
        );

        $args = wp_parse_args( $args, $defaults );

        $menu_args = array(
            'theme_location' => '',
            'container'      => '',
            'fallback_cb'    => '',
            'menu_class'     => '',
            'menu_id'        => '',
            'echo'           => false,
        );

        if ( '' !== $args['menu_id'] ) {
            $menu_args['menu'] = (int) $args['menu_id'];
        } else {
            // When menu ID is not preset, let's use the primary menu.
            // However, it's highly unlikely that the menu module won't have an ID.
            // When were're using menu module via the `menu_id` we don't need the menu's theme location.
            // We only need it when the menu doesn't have any ID and that occurs only used on headers and/or footers,
            // Or any other static places where we need menu by location and not by ID.
            $menu_args['theme_location'] = 'primary-menu';
        }

        $output = '<nav class="dina_basic_menu">';
        $output .= wp_nav_menu( $menu_args );
        $output .= '</nav>';

        return $output;
    }

    public function render( $attrs, $content, $render_slug ) {

        wp_enqueue_script( 'dina-basic-menu' );

        $menu_classes = array( 'dina_basic_menu-container' );
        $menu_id      = $this->props['menu_id'];

        array_push( $menu_classes, 'dina_basic_menu-' . $this->props['menu_type'] );
        array_push( $menu_classes, 'dina_basic_menu-' . $this->props['submenu_direction'] );

        if ( $this->props['show_submenu_on_click'] === 'on' ) {
            array_push( $menu_classes, 'dina_basic_menu-click' );
        } else {
            array_push( $menu_classes, 'dina_basic_menu-hover' );
        }

        $menu = self::dina_get_nav_menus( array( 'menu_ic', $menu_id ) );

        return sprintf(
            '<div class="%2$s">
                <div class="dina_basic_menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                %1$s
            </div>',
            $menu,
            join( ' ', $menu_classes )
        );
    }

}

new DINA_Basic_Menu();