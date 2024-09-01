<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

function dina_global_assets_list( $global_list ) {

    $assets_list   = array();
    $assets_prefix = et_get_dynamic_assets_path();

    $assets_list['et_icons_fa'] = array(
        'css' => "{$assets_prefix}/css/icons_fa_all.css",
    );

    return array_merge( $global_list, $assets_list );
}

function dina_inject_fa_icons( $icon_data ) {
    if ( function_exists( 'et_pb_maybe_fa_font_icon' ) && et_pb_maybe_fa_font_icon( $icon_data ) ) {
        add_filter( 'et_global_assets_list', 'dina_global_assets_list' );
        add_filter( 'et_late_global_assets_list', 'dina_global_assets_list' );
    }
}

function dina_get_menu_options() {
    $menus   = wp_get_nav_menus();
    $options = array( 'none' => esc_html__( 'Select a menu', 'divinationkit-for-divi' ) );

    foreach ( $menus as $menu ) {
        $options[$menu->term_id] = $menu->name;
    }

    return $options;
}

function dina_attachment_field_add( $form_fields, $post ) {
    $form_fields['dina_gallery-title'] = array(
        'label' => esc_html__( 'For Gallery Module', 'divinationkit-for-divi' ),
        'input' => 'html',
        'html'  => esc_html__( ' ', 'divinationkit-for-divi' ),
    );

    $form_fields['dina_gallery_item_url'] = array(
        'label' => esc_html__( 'Link Url', 'divinationkit-for-divi' ),
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'dina_gallery_item_url', true ),
        'helps' => '',
    );

    $target_value = get_post_meta( $post->ID, 'dina_gallery_item_link_target', true );

    $form_fields['dina_gallery_item_link_target'] = array(
        'label' => esc_html__( 'Link Target', 'divinationkit-for-divi' ),
        'input' => 'html',
        'html'  => '<select class="widefat" name="attachments[' . $post->ID . '][dina_gallery_item_link_target]" id="attachments[' . $post->ID . '][dina_gallery_item_link_target]">
            <option value="_self"' . ( $target_value === '_self' ? 'selected="selected"' : '' ) . '>' . esc_html__( 'In The Same Window', 'divinationkit-for-divi' ) . '</option>
            <option value="_blank"' . ( $target_value === '_blank' ? 'selected="selected"' : '' ) . '>' . esc_html__( 'In The New Tab', 'divinationkit-for-divi' ) . '</option>
        </select>',
    );

    return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'dina_attachment_field_add', 10, 2 );

function dina_attachment_field_save( $post, $attachment ) {

    if ( isset( $attachment['dina_gallery_item_url'] ) ) {
        update_post_meta( $post['ID'], 'dina_gallery_item_url', $attachment['dina_gallery_item_url'] );
    }

    if ( isset( $attachment['dina_gallery_item_link_target'] ) ) {
        update_post_meta( $post['ID'], 'dina_gallery_item_link_target', $attachment['dina_gallery_item_link_target'] );
    }

    return $post;
}

add_filter( 'attachment_fields_to_save', 'dina_attachment_field_save', 10, 2 );

function dina_get_icon( $icon_name ) {

    return sprintf(
        '%1$s/assets/icons/%2$s.svg',
        plugins_url( '', DINA_DIVINATIONKIT_FILE ),
        $icon_name
    );
}
