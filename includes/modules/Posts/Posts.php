<?php

    class DINA_Posts extends DINA_Builder_Module_Type_PostBased {

        protected $module_credits = array(
            'module_uri' => DINA_DIVINATIONKIT_WEBSITE . 'modules/blog-posts/',
            'author'     => DINA_DIVINATIONKIT_AUTHOR,
            'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
        );

        public function init() {

            $this->name        = esc_html__( 'Blog Posts', 'divinationkit-for-divi' );
            $this->icon_path   = $this->dina_module_icon( 'posts' );
            $this->slug        = 'dina_posts';
            $this->vb_support  = 'on';
            $this->folder_name = 'Divi Nation Kit';

            $this->settings_modal_toggles = array(
                'general'  => array(
                    'toggles' => array(
                        'content'  => esc_html__( 'Content', 'divinationkit-for-divi' ),
                        'elements' => esc_html__( 'Elements', 'divinationkit-for-divi' ),
                    ),
                ),
                'advanced' => array(
                    'toggles' => array(
                        'layout'         => esc_html__( 'Layout', 'divinationkit-for-divi' ),
                        'thumbnail'      => esc_html__( 'Post Image', 'divinationkit-for-divi' ),
                        'content'        => array(
                            'title'             => esc_html__( 'Post Texts', 'divinationkit-for-divi' ),
                            'tabbed_subtoggles' => true,
                            'sub_toggles'       => array(
                                'title'       => array(
                                    'name' => esc_html__( 'Title', 'divinationkit-for-divi' ),
                                ),
                                'description' => array(
                                    'name' => esc_html__( 'Description', 'divinationkit-for-divi' ),
                                ),
                                'meta'        => array(
                                    'name' => esc_html__( 'Meta', 'divinationkit-for-divi' ),
                                ),
                            ),
                        ),
                        'category'       => array(
                            'title'             => esc_html__( 'Category', 'divinationkit-for-divi' ),
                            'tabbed_subtoggles' => true,
                            'sub_toggles'       => array(
                                'text'   => array(
                                    'name' => esc_html__( 'Text', 'divinationkit-for-divi' ),
                                ),
                                'design' => array(
                                    'name' => esc_html__( 'Design', 'divinationkit-for-divi' ),
                                ),
                            ),
                        ),
                        'read_more'      => array(
                            'title'             => esc_html__( 'Read More Text', 'divinationkit-for-divi' ),
                            'tabbed_subtoggles' => true,
                            'sub_toggles'       => array(
                                'text'   => array(
                                    'name' => esc_html__( 'Text', 'divinationkit-for-divi' ),
                                ),
                                'design' => array(
                                    'name' => esc_html__( 'Design', 'divinationkit-for-divi' ),
                                ),
                            ),
                        ),
                        'pagination'     => esc_html__( 'Pagination', 'divinationkit-for-divi' ),
                        'custom_spacing' => esc_html__( 'Custom Spacing', 'divinationkit-for-divi' ),
                        'border'         => esc_html__( 'Border', 'divinationkit-for-divi' ),
                    ),
                ),
            );
        }

        public function get_fields() {

            $content = array(
                'post_type'          => array(
                    'label'            => esc_html__( 'Post Type', 'divinationkit-for-divi' ),
                    'type'             => 'select',
                    'option_category'  => 'configuration',
                    'options'          => et_get_registered_post_type_options( false, false ),
                    'description'      => esc_html__( 'Choose posts of which post type you would like to display.', 'divinationkit-for-divi' ),
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'toggle_slug'      => 'content',
                    'default'          => 'post',
                ),
                'posts_number'       => array(
                    'label'            => esc_html__( 'Post Count', 'divinationkit-for-divi' ),
                    'type'             => 'text',
                    'option_category'  => 'configuration',
                    'description'      => esc_html__( 'Choose how much posts you would like to display per page.', 'divinationkit-for-divi' ),
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'toggle_slug'      => 'content',
                    'default'          => 9,
                ),
                'include_categories' => array(
                    'label'            => esc_html__( 'Included Categories', 'divinationkit-for-divi' ),
                    'type'             => 'categories',
                    'meta_categories'  => array(
                        'all'     => esc_html__( 'All Categories', 'divinationkit-for-divi' ),
                        'current' => esc_html__( 'Current Category', 'divinationkit-for-divi' ),
                    ),
                    'option_category'  => 'basic_option',
                    'renderer_options' => array(
                        'use_terms' => false,
                    ),
                    'description'      => esc_html__( 'Choose which categories you would like to include in the feed.', 'divinationkit-for-divi' ),
                    'toggle_slug'      => 'content',
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'show_if'          => array(
                        'post_type' => 'post',
                    ),
                ),
                'order_by'           => array(
                    'label'            => esc_html__( 'Order By', 'divinationkit-for-divi' ),
                    'description'      => esc_html__( 'Choose how your posts should be ordered.', 'divinationkit-for-divi' ),
                    'type'             => 'select',
                    'option_category'  => 'configuration',
                    'toggle_slug'      => 'content',
                    'default'          => 'date',
                    'options'          => array(
                        'date'  => esc_html__( 'Date', 'divinationkit-for-divi' ),
                        'title' => esc_html__( 'Title', 'divinationkit-for-divi' ),
                    ),

                    'default_on_front' => 'date',
                    'computed_affects' => array( '__posts' ),
                ),

                'order'              => array(
                    'label'            => esc_html__( 'Sorted By', 'divinationkit-for-divi' ),
                    'description'      => esc_html__( 'Choose how your posts should be sorted.', 'divinationkit-for-divi' ),
                    'type'             => 'select',
                    'option_category'  => 'configuration',
                    'toggle_slug'      => 'content',
                    'default'          => 'ASC',
                    'options'          => array(
                        'ASC'  => esc_html__( 'Ascending', 'divinationkit-for-divi' ),
                        'DESC' => esc_html__( 'Descending', 'divinationkit-for-divi' ),
                    ),

                    'default_on_front' => 'DESC',
                    'computed_affects' => array( '__posts' ),
                ),
                'date_format'        => array(
                    'label'            => esc_html__( 'Date Format', 'divinationkit-for-divi' ),
                    'type'             => 'text',
                    'option_category'  => 'configuration',
                    'description'      => esc_html__( 'If you would like to adjust the date format, input the appropriate PHP date format here.', 'divinationkit-for-divi' ),
                    'toggle_slug'      => 'content',
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'default'          => 'M j, Y',
                ),

                'show_content'       => array(
                    'label'            => esc_html__( 'Content Length', 'et_builder' ),
                    'type'             => 'select',
                    'option_category'  => 'configuration',
                    'options'          => array(
                        'off' => esc_html__( 'Show Excerpt', 'et_builder' ),
                        'on'  => esc_html__( 'Show Content', 'et_builder' ),
                    ),
                    'affects'          => array(
                        'show_more',
                        'show_excerpt',

                        'excerpt_length',
                    ),
                    'description'      => esc_html__( 'Showing the full content will not truncate your posts on the index page. Showing the excerpt will only display your excerpt text.', 'et_builder' ),
                    'toggle_slug'      => 'content',
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'default_on_front' => 'off',
                    'mobile_options'   => true,
                    'hover'            => 'tabs',
                ),

                'show_excerpt'       => array(
                    'label'            => esc_html__( 'Show Excerpt', 'divinationkit-for-divi' ),
                    'description'      => esc_html__( 'Turn excerpt on and off.', 'divinationkit-for-divi' ),
                    'type'             => 'yes_no_button',
                    'options'          => array(
                        'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                        'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                    ),
                    'default_on_front' => 'on',
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'depends_show_if'  => 'off',
                    'toggle_slug'      => 'content',
                    'option_category'  => 'configuration',
                    'mobile_options'   => true,
                    'hover'            => 'tabs',
                ),

                'excerpt_length'     => array(
                    'label'            => esc_html__( 'Excerpt Length', 'et_builder' ),
                    'description'      => esc_html__( 'Define the length of automatically generated excerpts. Leave blank for default ( 270 ) ', 'et_builder' ),
                    'type'             => 'text',
                    'default'          => '270',
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'depends_show_if'  => 'off',
                    'toggle_slug'      => 'content',
                    'option_category'  => 'configuration',
                ),

            );

            $elements = array(
                'show_more'       => array(
                    'label'            => esc_html__( 'Show Read More Button', 'divinationkit-for-divi' ),
                    'type'             => 'yes_no_button',
                    'option_category'  => 'configuration',
                    'options'          => array(
                        'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                        'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    ),
                    'depends_show_if'  => 'off',
                    'description'      => esc_html__( 'Here you can define whether to show "read more" link after the excerpts or not.', 'divinationkit-for-divi' ),
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'toggle_slug'      => 'elements',
                    'default_on_front' => 'off',
                    'mobile_options'   => true,
                    'hover'            => 'tabs',
                ),
                'show_thumbnail'  => array(
                    'label'            => esc_html__( 'Show Featured Image', 'divinationkit-for-divi' ),
                    'type'             => 'yes_no_button',
                    'option_category'  => 'configuration',
                    'options'          => array(
                        'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                        'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                    ),
                    'description'      => esc_html__( 'This will turn thumbnails on and off.', 'divinationkit-for-divi' ),
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'toggle_slug'      => 'elements',
                    'default_on_front' => 'on',
                    'mobile_options'   => true,
                    'hover'            => 'tabs',
                ),
                'show_author'     => array(
                    'label'            => esc_html__( 'Show Author', 'divinationkit-for-divi' ),
                    'type'             => 'yes_no_button',
                    'option_category'  => 'configuration',
                    'options'          => array(
                        'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                        'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                    ),
                    'description'      => esc_html__( 'Turn on or off the author link.', 'divinationkit-for-divi' ),
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'toggle_slug'      => 'elements',
                    'default_on_front' => 'on',
                    'mobile_options'   => true,
                    'hover'            => 'tabs',
                ),
                'show_date'       => array(
                    'label'            => esc_html__( 'Show Date', 'divinationkit-for-divi' ),
                    'type'             => 'yes_no_button',
                    'option_category'  => 'configuration',
                    'options'          => array(
                        'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                        'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                    ),
                    'description'      => esc_html__( 'Turn the date on or off.', 'divinationkit-for-divi' ),
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'toggle_slug'      => 'elements',
                    'default_on_front' => 'on',
                    'mobile_options'   => true,
                    'hover'            => 'tabs',
                ),
                'show_categories' => array(
                    'label'            => esc_html__( 'Show Categories', 'divinationkit-for-divi' ),
                    'type'             => 'yes_no_button',
                    'option_category'  => 'configuration',
                    'options'          => array(
                        'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                        'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                    ),
                    'description'      => esc_html__( 'Turn the category links on or off.', 'divinationkit-for-divi' ),
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'toggle_slug'      => 'elements',
                    'default_on_front' => 'on',
                    'mobile_options'   => true,
                    'hover'            => 'tabs',
                ),
                'show_comments'   => array(
                    'label'            => esc_html__( 'Show Comment Count', 'divinationkit-for-divi' ),
                    'type'             => 'yes_no_button',
                    'option_category'  => 'configuration',
                    'options'          => array(
                        'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                        'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                    ),
                    'description'      => esc_html__( 'Turn comment count on and off.', 'divinationkit-for-divi' ),
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'toggle_slug'      => 'elements',
                    'default_on_front' => 'on',
                    'mobile_options'   => true,
                    'hover'            => 'tabs',
                ),

                'meta_separator'  => array(
                    'label'            => esc_html__( 'Show Meta Separator', 'divinationkit-for-divi' ),
                    'type'             => 'yes_no_button',
                    'option_category'  => 'configuration',
                    'options'          => array(
                        'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                        'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                    ),
                    'description'      => esc_html__( 'Turn meta separator on and off.', 'divinationkit-for-divi' ),
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'toggle_slug'      => 'elements',
                    'default_on_front' => 'off',
                    'mobile_options'   => true,
                    'hover'            => 'tabs',
                ),

                'show_pagination' => array(
                    'label'            => esc_html__( 'Show Pagination', 'divinationkit-for-divi' ),
                    'type'             => 'yes_no_button',
                    'option_category'  => 'configuration',
                    'options'          => array(
                        'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                        'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                    ),
                    'description'      => esc_html__( 'Turn pagination on and off.', 'divinationkit-for-divi' ),
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'toggle_slug'      => 'elements',
                    'default_on_front' => 'off',
                    'mobile_options'   => true,
                    'hover'            => 'tabs',
                ),
                'offset_number'   => array(
                    'label'            => esc_html__( 'Post Offset Number', 'divinationkit-for-divi' ),
                    'type'             => 'text',
                    'option_category'  => 'configuration',
                    'description'      => esc_html__( 'Choose how many posts you would like to skip. These posts will not be shown in the feed.', 'divinationkit-for-divi' ),
                    'toggle_slug'      => 'content',
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'default'          => 0,
                ),
            );

            $posts = array(
                '__posts' => array(
                    'type'                => 'computed',
                    'computed_callback'   => array( 'DINA_Posts', 'get_posts' ),
                    'computed_depends_on' => array(
                        'post_type',
                        'posts_number',
                        'include_categories',
                        'order_by',
                        'order',
                        'date_format',
                        'show_thumbnail',
                        'show_content',
                        'show_more',
                        'show_author',
                        'show_date',
                        'show_categories',
                        'show_comments',
                        'show_excerpt',
                        'meta_separator',
                        'excerpt_length',
                        'show_pagination',
                        'offset_number',
                        'category_position',
                        'header_level',
                    ),
                ),
            );

            $layout = array(
                'layout'                => array(
                    'label'       => esc_html__( 'Post Layout', 'divinationkit-for-divi' ),
                    'type'        => 'select',
                    'options'     => array(
                        'grid' => esc_html__( 'Grid', 'divinationkit-for-divi' ),
                        'list' => esc_html__( 'List', 'divinationkit-for-divi' ),
                    ),
                    'default'     => 'grid',
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'layout',
                ),

                'category_position'     => array(
                    'label'            => esc_html__( 'Category Placement', 'divinationkit-for-divi' ),
                    'description'      => esc_html__( 'Choose category placement, where you can place category in different place', 'divinationkit-for-divi' ),
                    'type'             => 'select',
                    'option_category'  => 'basic_option',
                    'options'          => array(
                        'before_title' => esc_html__( 'Before Title', 'divinationkit-for-divi' ),
                        'with_meta'    => esc_html__( 'With Meta', 'divinationkit-for-divi' ),
                        'image'        => esc_html__( 'On Thumbnail', 'divinationkit-for-divi' ),
                    ),
                    'computed_affects' => array(
                        '__posts',
                    ),
                    'default'          => 'before_title',
                    'tab_slug'         => 'advanced',
                    'toggle_slug'      => 'layout',
                ),

                'vertical_position'     => array(
                    'label'          => esc_html__( 'Vertical Position', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define vertical position where you can choose (top/center/bottom)', 'divinationkit-for-divi' ),
                    'type'           => 'select',
                    'options'        => array(
                        'flex-start' => esc_html__( 'Top', 'divinationkit-for-divi' ),
                        'center'     => esc_html__( 'Center', 'divinationkit-for-divi' ),
                        'flex-end'   => esc_html__( 'Bottom', 'divinationkit-for-divi' ),
                    ),
                    'default'        => 'flex-start',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'layout',
                    'show_if'        => array(
                        'layout' => 'list',
                    ),
                    'mobile_options' => true,
                ),

                'column_number'         => array(
                    'label'           => esc_html__( 'Column Number', 'divinationkit-for-divi' ),
                    'type'            => 'range',
                    'option_category' => 'basic_option',
                    'range_settings'  => array(
                        'step' => 1,
                        'min'  => 1,
                        'max'  => 12,
                    ),
                    'default'         => '3',
                    'fixed_unit'      => '',
                    'validate_unit'   => false,
                    'unitless'        => true,
                    'mobile_options'  => true,
                    'tab_slug'        => 'advanced',
                    'toggle_slug'     => 'layout',
                ),

                'content_alignment'     => array(
                    'label'           => esc_html__( 'Content Alignment', 'divinationkit-for-divi' ),
                    'type'            => 'text_align',
                    'option_category' => 'configuration',
                    'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
                    'default'         => 'left',
                    'tab_slug'        => 'advanced',
                    'toggle_slug'     => 'layout',
                    'mobile_options'  => true,
                    'show_if'         => array(
                        'layout' => 'grid',
                    ),
                ),

                'space_between_item'    => array(
                    'label'           => esc_html__( 'Space Between Item', 'divinationkit-for-divi' ),
                    'type'            => 'range',
                    'option_category' => 'basic_option',
                    'range_settings'  => array(
                        'step' => 1,
                        'min'  => 0,
                        'max'  => 100,
                    ),
                    'default'         => '30px',
                    'tab_slug'        => 'advanced',
                    'toggle_slug'     => 'layout',
                    'mobile_options'  => true,
                    'show_if'         => array(
                        'layout' => 'grid',
                    ),
                ),
                'space_between_content' => array(
                    'label'           => esc_html__( 'Space Between Item', 'divinationkit-for-divi' ),
                    'type'            => 'range',
                    'option_category' => 'basic_option',
                    'range_settings'  => array(
                        'step' => 1,
                        'min'  => 0,
                        'max'  => 100,
                    ),
                    'default'         => '30px',
                    'tab_slug'        => 'advanced',
                    'toggle_slug'     => 'layout',
                    'mobile_options'  => true,
                    'show_if'         => array(
                        'layout' => 'list',
                    ),
                ),

            );

            $design = array(
                'thumbnail_width'         => array(
                    'label'           => esc_html__( 'Thumbnail Width', 'divinationkit-for-divi' ),
                    'type'            => 'range',
                    'option_category' => 'basic_option',
                    'range_settings'  => array(
                        'step' => 1,
                        'min'  => 0,
                        'max'  => 1000,
                    ),
                    'default'         => '100%',
                    'default_unit'    => '%',
                    'tab_slug'        => 'advanced',
                    'toggle_slug'     => 'thumbnail',
                    'mobile_options'  => true,
                ),

                'category_bg'             => array(
                    'label'          => esc_html__( 'Category Background', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define category background color', 'divinationkit-for-divi' ),
                    'type'           => 'color-alpha',
                    'default'        => '',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'category',
                    'sub_toggle'     => 'design',
                    'mobile_options' => true,
                ),

                'category_padding'        => array(
                    'label'          => esc_html__( 'Category Padding', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define custom padding for category', 'divinationkit-for-divi' ),
                    'type'           => 'custom_padding',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'category',
                    'sub_toggle'     => 'design',
                    'default'        => '0px|0px|0px|0px',
                    'mobile_options' => true,
                    'show_if'        => array(
                        'show_categories' => 'on',
                    ),
                ),
                'post_item_margin'        => array(
                    'label'          => esc_html__( 'Post Item Margin', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define custom margin for blog post item', 'divinationkit-for-divi' ),
                    'type'           => 'custom_margin',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'custom_spacing',
                    'default'        => '0px|0px|40px|0px',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                ),
                'post_item_padding'       => array(
                    'label'          => esc_html__( 'Post Item Padding', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define custom padding for blog post item', 'divinationkit-for-divi' ),
                    'type'           => 'custom_padding',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'custom_spacing',
                    'default'        => '0px|0px|0px|0px',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                ),

                'thumbnail_margin'        => array(
                    'label'          => esc_html__( 'Thumbnail Margin', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define custom margin for thumbnail', 'divinationkit-for-divi' ),
                    'type'           => 'custom_margin',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'custom_spacing',
                    'default'        => '0px|0px|0px|0px',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                ),
                'thumbnail_padding'       => array(
                    'label'          => esc_html__( 'Thumbnail Padding', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define custom padding for thumbnail', 'divinationkit-for-divi' ),
                    'type'           => 'custom_padding',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'custom_spacing',
                    'default'        => '0px|0px|0px|0px',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                ),

                'content_wrapper_margin'  => array(
                    'label'          => esc_html__( 'Content Wrapper Margin', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define custom margin for content wrapper', 'divinationkit-for-divi' ),
                    'type'           => 'custom_margin',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'custom_spacing',
                    'default'        => '0px|0px|0px|0px',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                ),
                'content_wrapper_padding' => array(
                    'label'          => esc_html__( 'Content Wrapper Padding', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define custom padding for content wrapper', 'divinationkit-for-divi' ),
                    'type'           => 'custom_padding',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'custom_spacing',
                    'default'        => '15px|0px|15px|0px',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                ),

                'read_more_bg'            => array(
                    'label'          => esc_html__( 'Read More Background', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define read more background color', 'divinationkit-for-divi' ),
                    'type'           => 'color-alpha',
                    'default'        => '',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'read_more',
                    'sub_toggle'     => 'design',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                ),

                'read_more_margin'        => array(
                    'label'          => esc_html__( 'Read More Margin', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define custom margin for read more button', 'divinationkit-for-divi' ),
                    'type'           => 'custom_margin',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'read_more',
                    'sub_toggle'     => 'design',
                    'default'        => '0px|0px|0px|0px',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                ),
                'read_more_padding'       => array(
                    'label'          => esc_html__( 'Read More Padding', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define custom padding for read more button', 'divinationkit-for-divi' ),
                    'type'           => 'custom_padding',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'read_more',
                    'sub_toggle'     => 'design',
                    'default'        => '0px|0px|0px|0px',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                ),
            );

            $pagination = array(
                'page_alignment'    => array(
                    'label'           => esc_html__( 'pagination Alignment', 'divinationkit-for-divi' ),
                    'type'            => 'text_align',
                    'option_category' => 'configuration',
                    'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
                    'default'         => 'center',
                    'tab_slug'        => 'advanced',
                    'toggle_slug'     => 'pagination',
                    'mobile_options'  => true,
                    'show_if'         => array(
                        'show_pagination' => 'on',
                    ),
                ),
                'page_space'        => array(
                    'label'           => esc_html__( 'Space Between Item', 'divinationkit-for-divi' ),
                    'type'            => 'range',
                    'option_category' => 'basic_option',
                    'range_settings'  => array(
                        'step' => 1,
                        'min'  => 0,
                        'max'  => 100,
                    ),
                    'default'         => '12px',
                    'tab_slug'        => 'advanced',
                    'toggle_slug'     => 'pagination',
                    'mobile_options'  => true,
                    'show_if'         => array(
                        'show_pagination' => 'on',
                    ),
                ),
                'page_color'        => array(
                    'label'          => esc_html__( 'Page Color', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define page number color', 'divinationkit-for-divi' ),
                    'type'           => 'color-alpha',
                    'default'        => '#ffffff',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'pagination',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                    'show_if'        => array(
                        'show_pagination' => 'on',
                    ),
                ),
                'active_page_color' => array(
                    'label'          => esc_html__( 'Active Page Color', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define page number color', 'divinationkit-for-divi' ),
                    'type'           => 'color-alpha',
                    'default'        => '#ffffff',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'pagination',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                    'show_if'        => array(
                        'show_pagination' => 'on',
                    ),
                ),
                'page_bg'           => array(
                    'label'          => esc_html__( 'Page Background', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define page number background color', 'divinationkit-for-divi' ),
                    'type'           => 'color-alpha',
                    'default'        => '#003222',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'pagination',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                    'show_if'        => array(
                        'show_pagination' => 'on',
                    ),
                ),
                'active_page_bg'    => array(
                    'label'          => esc_html__( 'Active Page Background', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define page number background color', 'divinationkit-for-divi' ),
                    'type'           => 'color-alpha',
                    'default'        => '#10b882',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'pagination',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                    'show_if'        => array(
                        'show_pagination' => 'on',
                    ),
                ),
                'page_margin'       => array(
                    'label'          => esc_html__( 'Pagination Margin', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define custom margin for Pagination area', 'divinationkit-for-divi' ),
                    'type'           => 'custom_margin',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'pagination',
                    'default'        => '0px|0px|0px|0px',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                    'show_if'        => array(
                        'show_pagination' => 'on',
                    ),
                ),
                'page_padding'      => array(
                    'label'          => esc_html__( 'Page Number Padding', 'divinationkit-for-divi' ),
                    'description'    => esc_html__( 'Define custom padding for page number', 'divinationkit-for-divi' ),
                    'type'           => 'custom_padding',
                    'tab_slug'       => 'advanced',
                    'toggle_slug'    => 'pagination',
                    'default'        => '5px|10px|5px|10px',
                    'mobile_options' => true,
                    'hover'          => 'tabs',
                    'show_if'        => array(
                        'show_pagination' => 'on',
                    ),
                ),
            );

            return array_merge( $content, $elements, $posts, $layout, $design, $pagination );
        }

        public function get_advanced_fields_config() {

            // Get theme accent color
            $et_accent_color = et_builder_accent_color();

            $advanced_fields = array(
                'text'           => false,
                'fonts'          => array(
                    'category_text'  => array(
                        'label'           => esc_html__( 'Category', 'divinationkit-for-divi' ),
                        'css'             => array(
                            'main'      => '%%order_class%% .dina_posts-categories a',
                            'important' => 'all',
                        ),
                        'font_size'       => array(
                            'default' => '14px',
                        ),
                        'line_height'     => array(
                            'default' => '1.2em',
                        ),
                        'hide_text_align' => true,
                        'tab_slug'        => 'advanced',
                        'toggle_slug'     => 'category',
                        'sub_toggle'      => 'text',
                        'show_if'         => array(
                            'show_categories' => 'on',
                        ),
                    ),
                    'title'          => array(
                        'label'           => esc_html__( 'Title', 'divinationkit-for-divi' ),
                        'css'             => array(
                            'main'      => '%%order_class%% .dina_posts-title',
                            'important' => false,
                        ),
                        'header_level'    => array(
                            'default'          => 'h2',
                            'computed_affects' => array(
                                '__posts',
                            ),
                        ),
                        'font_size'       => array(
                            'default' => '20px',
                        ),
                        'font'            => array(
                            'default' => '|600|||||||',
                        ),
                        'line_height'     => array(
                            'default' => '1.5em',
                        ),
                        'hide_text_align' => true,
                        'tab_slug'        => 'advanced',
                        'toggle_slug'     => 'content',
                        'sub_toggle'      => 'title',
                    ),
                    'meta'           => array(
                        'label'           => esc_html__( 'Description', 'divinationkit-for-divi' ),
                        'css'             => array(
                            'main'      => '%%order_class%% .dina_posts-meta span, %%order_class%% .dina_posts-meta span a',
                            'important' => false,
                        ),
                        'hide_text_align' => true,
                        'tab_slug'        => 'advanced',
                        'toggle_slug'     => 'content',
                        'sub_toggle'      => 'meta',
                        'font_size'       => array(
                            'default' => '14px',
                        ),
                        'line_height'     => array(
                            'default' => '1.2em',
                        ),
                    ),
                    'description'    => array(
                        'label'           => esc_html__( 'Description', 'divinationkit-for-divi' ),
                        'css'             => array(
                            'main'      => '%%order_class%% .dina_posts-content',
                            'important' => false,
                        ),
                        'hide_text_align' => true,
                        'tab_slug'        => 'advanced',
                        'toggle_slug'     => 'content',
                        'sub_toggle'      => 'description',
                        'font_size'       => array(
                            'default' => '14px',
                        ),
                        'line_height'     => array(
                            'default' => '1.2em',
                        ),
                    ),
                    'read_more_text' => array(
                        'label'           => esc_html__( 'Read More', 'divinationkit-for-divi' ),
                        'css'             => array(
                            'main'      => '%%order_class%% .dina_posts-read-more',
                            'important' => false,
                        ),
                        'hide_text_align' => true,
                        'tab_slug'        => 'advanced',
                        'toggle_slug'     => 'read_more',
                        'sub_toggle'      => 'text',
                        'font_size'       => array(
                            'default' => '14px',
                        ),
                        'line_height'     => array(
                            'default' => '1.2em',
                        ),
                    ),
                ),

                'borders'        => array(
                    'item'      => array(
                        'label_prefix' => esc_html__( 'Post Item', 'divinationkit-for-divi' ),
                        'sub_toggle'   => 'advanced',
                        'toggle_slug'  => 'border',
                        'css'          => array(
                            'main'      => array(
                                'border_radii'  => '%%order_class%% .dina_posts-container article',
                                'border_styles' => '%%order_class%% .dina_posts-container article',
                            ),
                            'important' => 'all',
                        ),
                        'defaults'     => array(
                            'border_radii'  => 'on|0px|0px|0px|0px',
                            'border_styles' => array(
                                'width' => '0px',
                                'color' => $et_accent_color,
                                'style' => 'solid',
                            ),
                        ),
                    ),
                    'thumbnail' => array(
                        'label_prefix' => esc_html__( 'Thumbnail', 'divinationkit-for-divi' ),
                        'sub_toggle'   => 'advanced',
                        'toggle_slug'  => 'thumbnail',
                        'css'          => array(
                            'main'      => array(
                                'border_radii'  => '%%order_class%% .dina_posts-thumbnail img',
                                'border_styles' => '%%order_class%% .dina_posts-thumbnail img',
                            ),
                            'important' => 'all',
                        ),
                        'defaults'     => array(
                            'border_radii'  => 'on|0px|0px|0px|0px',
                            'border_styles' => array(
                                'width' => '0px',
                                'color' => $et_accent_color,
                                'style' => 'solid',
                            ),
                        ),
                    ),
                    'category'  => array(
                        'label_prefix' => esc_html__( 'Category Text', 'divinationkit-for-divi' ),
                        'sub_toggle'   => 'advanced',
                        'toggle_slug'  => 'category',
                        'sub_toggle'   => 'design',
                        'css'          => array(
                            'main'      => array(
                                'border_radii'  => '%%order_class%% .dina_posts-categories a',
                                'border_styles' => '%%order_class%% .dina_posts-categories a',
                            ),
                            'important' => 'all',
                        ),
                        'defaults'     => array(
                            'border_radii'  => 'on|0px|0px|0px|0px',
                            'border_styles' => array(
                                'width' => '0px',
                                'color' => $et_accent_color,
                                'style' => 'none',
                            ),
                        ),
                    ),
                    'read_more' => array(
                        'label_prefix' => esc_html__( 'Read More', 'divinationkit-for-divi' ),
                        'tab_slug'     => 'advanced',
                        'toggle_slug'  => 'read_more',
                        'sub_toggle'   => 'design',
                        'css'          => array(
                            'main'      => array(
                                'border_radii'  => '%%order_class%% .dina_posts-read-more',
                                'border_styles' => '%%order_class%% .dina_posts-read-more',
                            ),
                            'important' => 'all',
                        ),
                        'defaults'     => array(
                            'border_radii'  => 'on|0px|0px|0px|0px',
                            'border_styles' => array(
                                'width' => '0px',
                                'color' => $et_accent_color,
                                'style' => 'none',
                            ),
                        ),
                    ),
                    'page'      => array(
                        'label_prefix'    => esc_html__( 'Page Number', 'divinationkit-for-divi' ),
                        'tab_slug'        => 'advanced',
                        'toggle_slug'     => 'pagination',
                        'css'             => array(
                            'main'      => array(
                                'border_radii'  => '%%order_class%% .dina_posts-pagination .page-numbers',
                                'border_styles' => '%%order_class%% .dina_posts-pagination .page-numbers',
                            ),
                            'important' => 'all',
                        ),
                        'defaults'        => array(
                            'border_radii'  => 'on|0px|0px|0px|0px',
                            'border_styles' => array(
                                'width' => '0px',
                                'color' => $et_accent_color,
                                'style' => 'none',
                            ),
                        ),
                        'depends_show_if' => array(
                            'show_pagination' => 'on',
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
                        'toggle_slug' => 'thumbnail',
                    ),
                    'css'                  => array(
                        'main' => '%%order_class%% .dina_posts-thumbnail img',
                    ),
                ),

                'background'     => array(
                    'css'     => array(
                        'main'      => '%%order_class%% .dina_posts-container article',
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
                            'main' => '%%order_class%% .dina_posts-container article',
                        ),
                    ),
                ),

            );

            return $advanced_fields;
        }

        static function get_posts( $args = array(), $conditional_tags = array(), $current_page = array() ) {
            global $paged;

            $defaults = array(
                'post_type'          => '',
                'posts_number'       => '',
                'include_categories' => '',
                'show_thumbnail'     => '',
                'show_content'       => '',
                'show_author'        => '',
                'show_date'          => '',
                'date_format'        => '',
                'show_categories'    => '',
                'show_comments'      => '',
                'show_excerpt'       => '',
                'excerpt_length'     => '',
                'show_pagination'    => '',
                'background_layout'  => '',
                'show_more'          => '',
                'header_level'       => 'h2',
            );

            $is_front_page = et_fb_conditional_tag( 'is_front_page', $conditional_tags );
            $is_single     = et_fb_conditional_tag( 'is_single', $conditional_tags );

            $args         = wp_parse_args( $args, $defaults );
            $post_type    = $args['post_type'];
            $categories   = $args['include_categories'];
            $posts_number = $args['posts_number'];
            $order_by     = $args['order_by'];
            $order        = $args['order'];

            $query_args = array(
                'posts_per_page' => intval( $posts_number ),
                'post_type'      => $post_type,
                'post_status'    => 'publish',
                'order_by'       => $order_by,
                'order'          => $order,
            );

            $post_id = isset( $current_page['id'] ) ? (int) $current_page['id'] : 0;

            if ( $post_type === 'post' ) {
                $query_args['cat'] = implode( ',', self::filter_include_categories( $categories, $post_id ) );
            }

            if ( defined( 'DOING_AJAX' ) && isset( $current_page['paged'] ) ) {
                $paged = intval( $current_page['paged'] ); //phpcs:ignore WordPress.Variables.GlobalVariables.OverrideProhibited
            } else {
                $paged = $is_front_page ? get_query_var( 'page' ) : get_query_var( 'paged' ); //phpcs:ignore WordPress.Variables.GlobalVariables.OverrideProhibited
            }

            // support pagination in VB
            if ( isset( $args['__page'] ) ) {
                $paged = $args['__page']; //phpcs:ignore WordPress.Variables.GlobalVariables.OverrideProhibited
            }

            $query_args['paged'] = $paged;
            if ( '' !== $args['offset_number'] && !empty( $args['offset_number'] ) ) {
                /**
                 * Offset + pagination don't play well. Manual offset calculation required
                 *
                 * @see: https://codex.wordpress.org/Making_Custom_Queries_using_Offset_and_Pagination
                 */
                if ( $paged > 1 ) {
                    $query_args['offset'] = ( ( $paged - 1 ) * intval( $args['posts_number'] ) ) + intval( $args['offset_number'] );
                } else {
                    $query_args['offset'] = intval( $args['offset_number'] );
                }
            }

            if ( $is_single ) {
                $main_query_post = ET_Post_Stack::get_main_post();

                if ( null !== $main_query_post ) {
                    $query_args['post__not_in'][] = $main_query_post->ID;
                }
            }

            $query = new WP_Query( $query_args );

        ob_start();?>

        <div class="dina_posts-wrapper">
        <?php

                    if ( $query->have_posts() ):
                        while ( $query->have_posts() ):
                            $query->the_post();
                            include 'templates/dina-post.php';
                        endwhile;
                    endif;

                ?>
        </div><?php
    if ( $args['show_pagination'] === 'on' ) {
                self::dina_pagination( $query );
            }

            $output = ob_get_clean();

            if ( !$output ) {
                $output = self::get_no_results_template();
            }

            return $output;
        }

        static function dina_pagination( $query ) {
            // Set up variables for pagination
            $big         = 999999999; // need an unlikely integer for replacement later
            $paged       = max( 1, get_query_var( 'paged' ) ); // get the current page number
            $total_pages = $query->max_num_pages; // get the total number of pages

            // Only paginate if there's more than one page
            if ( $total_pages > 1 ) {
                // Setup pagination arguments
                $pagination_args = array(
                    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'    => '?paged=%#%',
                    'current'   => $paged,
                    'total'     => $total_pages,
                    'prev_text' => __( 'Prev' ),
                    'next_text' => __( 'Next' ),
                    'type'      => 'array',
                    'end_size'  => 1,
                    'mid_size'  => 2,
                );

                $pagination_links = paginate_links( $pagination_args );

                if ( !empty( $pagination_links ) ) {
                    echo '<ul class="dina_posts-pagination">';
                    foreach ( $pagination_links as $link ) {
                        echo '<li>' . $link . '</li>';
                    }
                    echo '</ul>';
                }
            }
        }

        public function render( $attrs, $content, $render_slug ) {

            $this->render_css( $render_slug );

            $classes = array( 'dina_posts-container' );
            array_push( $classes, 'dina_posts-' . $this->props['layout'] );
            array_push( $classes, 'dina_posts-column-' . $this->props['column_number'] );

            $post_query_var = array(
                'post_type'          => $this->props['post_type'],
                'posts_number'       => $this->props['posts_number'],
                'include_categories' => $this->props['include_categories'],
                'show_thumbnail'     => $this->props['show_thumbnail'],
                'order_by'           => $this->props['order_by'],
                'order'              => $this->props['order'],
                'offset_number'      => $this->props['offset_number'],
                'show_content'       => $this->props['show_content'],
                'show_author'        => $this->props['show_author'],
                'show_date'          => $this->props['show_date'],
                'date_format'        => $this->props['date_format'],
                'show_categories'    => $this->props['show_categories'],
                'show_comments'      => $this->props['show_comments'],
                'show_excerpt'       => $this->props['show_excerpt'],
                'excerpt_length'     => $this->props['excerpt_length'],
                'show_pagination'    => $this->props['show_pagination'],
                'show_more'          => $this->props['show_more'],
                'meta_separator'     => $this->props['meta_separator'],
                'category_position'  => $this->props['category_position'],
                'header_level'       => et_pb_process_header_level( $this->props['title_level'], 'h2' ),
            );

            return sprintf(
                '<div class="%2$s">
                %1$s
            </div>',
                self::get_posts( $post_query_var ),
                join( ' ', $classes )
            );
        }

        public function render_css( $render_slug ) {

            if ( $this->props['layout'] === 'list' ) {
                $this->dina_responsive_css( $render_slug, array(
                    array(
                        'option_slug' => 'thumbnail_width',
                        'property'    => 'width',
                        'selector'    => '%%order_class%% .dina_posts-thumbnail-wrapper',
                    ),
                ) );
            }

            $this->dina_responsive_css( $render_slug, array(
                array(
                    'option_slug' => 'thumbnail_width',
                    'property'    => 'width',
                    'selector'    => '%%order_class%% .dina_posts-thumbnail',
                ),

                array(
                    'option_slug' => 'category_bg',
                    'property'    => 'background',
                    'selector'    => '%%order_class%% .dina_posts-categories a',
                    'hover'       => '%%order_class%%:hover .dina_posts-categories a',
                ),
                array(
                    'option_slug' => 'category_padding',
                    'property'    => 'padding',
                    'selector'    => '%%order_class%% .dina_posts-categories a',
                    'hover'       => '%%order_class%%:hover .dina_posts-categories a',
                ),

                array(
                    'option_slug' => 'space_between_item',
                    'property'    => 'column-gap',
                    'selector'    => '%%order_class%% .dina_posts-wrapper',
                ),

                array(
                    'option_slug' => 'space_between_content',
                    'property'    => 'gap',
                    'selector'    => '%%order_class%% .dina_posts-list article',
                ),

                array(
                    'option_slug' => 'vertical_position',
                    'property'    => 'align-items',
                    'selector'    => '%%order_class%% .dina_posts-container article',
                ),
                array(
                    'option_slug' => 'post_item_margin',
                    'property'    => 'margin',
                    'selector'    => '%%order_class%% .dina_posts-container article',
                ),
                array(
                    'option_slug' => 'post_item_padding',
                    'property'    => 'padding',
                    'selector'    => '%%order_class%% .dina_posts-container article',
                ),
                array(
                    'option_slug' => 'content_alignment',
                    'property'    => 'text-align',
                    'selector'    => '%%order_class%% .dina_posts-grid article',
                ),
                array(
                    'option_slug' => 'content_alignment',
                    'property'    => 'justify-content',
                    'selector'    => '%%order_class%% .dina_posts-grid .dina_posts-thumbnail-wrapper',
                ),
                array(
                    'option_slug' => 'content_wrapper_margin',
                    'property'    => 'margin',
                    'selector'    => '%%order_class%% .dina_posts-content-wrapper',
                    'hover'       => '%%order_class%%:hover .dina_posts-content-wrapper',
                ),
                array(
                    'option_slug' => 'content_wrapper_padding',
                    'property'    => 'padding',
                    'selector'    => '%%order_class%% .dina_posts-content-wrapper',
                    'hover'       => '%%order_class%%:hover .dina_posts-content-wrapper',
                ),
                array(
                    'option_slug' => 'thumbnail_margin',
                    'property'    => 'margin',
                    'selector'    => '%%order_class%% .dina_posts-thumbnail img',
                    'hover'       => '%%order_class%%:hover .dina_posts-thumbnail img',
                ),
                array(
                    'option_slug' => 'thumbnail_padding',
                    'property'    => 'padding',
                    'selector'    => '%%order_class%% .dina_posts-thumbnail img',
                    'hover'       => '%%order_class%%:hover .dina_posts-thumbnail img',
                ),

                array(
                    'option_slug' => 'read_more_bg',
                    'property'    => 'background',
                    'selector'    => '%%order_class%% .dina_posts-read-more',
                    'hover'       => '%%order_class%%:hover .dina_posts-read-more:hover',
                ),
                array(
                    'option_slug' => 'read_more_margin',
                    'property'    => 'margin',
                    'selector'    => '%%order_class%% .dina_posts-read-more',
                    'hover'       => '%%order_class%%:hover .dina_posts-read-more',
                ),
                array(
                    'option_slug' => 'read_more_padding',
                    'property'    => 'padding',
                    'selector'    => '%%order_class%% .dina_posts-read-more',
                    'hover'       => '%%order_class%%:hover .dina_posts-read-more',
                ),
            ) );

            if ( $this->props['show_pagination'] === 'on' ) {
                $this->dina_responsive_css( $render_slug, array(
                    array(
                        'option_slug' => 'page_alignment',
                        'property'    => 'justify-content',
                        'selector'    => '%%order_class%% .dina_posts-pagination',
                    ),
                    array(
                        'option_slug' => 'page_space',
                        'property'    => 'gap',
                        'selector'    => '%%order_class%% .dina_posts-pagination',
                    ),
                    array(
                        'option_slug' => 'page_color',
                        'property'    => 'color',
                        'selector'    => '%%order_class%% .dina_posts-pagination .page-numbers',
                        'hover'       => '%%order_class%% .dina_posts-pagination .page-numbers:hover',
                    ),
                    array(
                        'option_slug' => 'active_page_color',
                        'property'    => 'color',
                        'selector'    => '%%order_class%% .dina_posts-pagination .page-numbers.current',
                        'hover'       => '%%order_class%% .dina_posts-pagination .page-numbers.current:hover',
                    ),
                    array(
                        'option_slug' => 'page_bg',
                        'property'    => 'background',
                        'selector'    => '%%order_class%% .dina_posts-pagination .page-numbers',
                        'hover'       => '%%order_class%% .dina_posts-pagination .page-numbers:hover',
                    ),
                    array(
                        'option_slug' => 'active_page_bg',
                        'property'    => 'background',
                        'selector'    => '%%order_class%% .dina_posts-pagination .page-numbers.current',
                        'hover'       => '%%order_class%% .dina_posts-pagination .page-numbers.current:hover',
                    ),
                    array(
                        'option_slug' => 'page_margin',
                        'property'    => 'margin',
                        'selector'    => '%%order_class%% .dina_posts-pagination',
                        'hover'       => '%%order_class%% .dina_posts-pagination',
                    ),
                    array(
                        'option_slug' => 'page_padding',
                        'property'    => 'padding',
                        'selector'    => '%%order_class%% .dina_posts-pagination .page-numbers',
                        'hover'       => '%%order_class%% .dina_posts-pagination .page-numbers:hover',
                    ),
                ) );
            }

            // Responsive column number
            $column_number = $this->props['column_number'];
            $tablet_column = $this->props['column_number_tablet'] ? $this->props['column_number_tablet'] : $column_number;
            $phone_column  = $this->props['column_number_phone'] ? $this->props['column_number_phone'] : ( $tablet_column ? $tablet_column : $column_number );

            if ( isset( $column_number ) && !empty( $column_number ) ) {
                ET_Builder_Element::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dina_posts-wrapper',
                    'declaration' => sprintf( 'grid-template-columns: repeat(%1$s, 1fr);', $column_number ),
                ) );
            }
            if ( isset( $tablet_column ) && !empty( $tablet_column ) ) {
                ET_Builder_Element::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dina_posts-wrapper',
                    'declaration' => sprintf( 'grid-template-columns: repeat(%1$s, 1fr);', $tablet_column ),
                    'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
                ) );
            }
            if ( isset( $phone_column ) && !empty( $phone_column ) ) {
                ET_Builder_Element::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dina_posts-wrapper',
                    'declaration' => sprintf( 'grid-template-columns: repeat(%1$s, 1fr);', $phone_column ),
                    'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
                ) );
            }
        }
    }

new DINA_Posts();