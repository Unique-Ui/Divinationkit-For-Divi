<?php

$show_thumbnail    = $args['show_thumbnail'] === 'on' ? true : false;
$alt_text          = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
$show_author       = $args['show_author'] === 'on' ? true : false;
$show_date         = $args['show_date'] === 'on' ? true : false;
$show_categories   = $args['show_categories'] === 'on' ? true : false;
$show_comments     = $args['show_comments'] === 'on' ? true : false;
$show_pagination   = $args['show_pagination'] === 'on' ? true : false;
$show_separator    = $args['meta_separator'] === 'on' ? true : false;
$show_more         = $args['show_more'] === 'on' ? true : false;
$header_level      = $args['header_level'];
$category_position = $args['category_position'];

$thumbnail        = '';
$title            = '';
$meta_data        = array();
$author           = '';
$date             = '';
$comments         = '';
$categories       = '';
$content          = '';
$separator        = '';
$read_more_button = '';

if ( $show_separator ) {
    $separator = '<span class="dina_posts-meta-separator">|</span>';
}

// Category
if ( $show_categories ) {
    if ( $category_position !== 'with_meta' ) {

        $categories = sprintf(
            '<p class="dina_posts-categories">
                %1$s
            </p>',
            et_builder_get_the_term_list( ', ' )
        );
    }
}

// Thumbnail
if ( $show_thumbnail && has_post_thumbnail() ) {
    $thumbnail = sprintf(
        '<div class="dina_posts-thumbnail-wrapper">
            <a href="%1$s" class="dina_posts-thumbnail">
                <img src="%2$s" alt="%3$s">
            </a>
            %4$s
        </div>',
        esc_url( get_the_permalink() ),
        esc_url( get_the_post_thumbnail_url() ),
        $alt_text,
        $category_position === 'image' ? $categories : '',
    );
}

// Title
$title = sprintf(
    '<%1$s class="dina_posts-title">
        <a href="%2$s">%3$s</a>
    </%1$s>',
    $header_level,
    esc_url( get_the_permalink() ),
    esc_html__( get_the_title(), 'divinationkit-for-divi' ),
);

// Author
if ( $show_author ) {
    $author = sprintf(
        '<span class="dina_posts-meta dina_posts-author">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-user">
  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
  <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
  <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
</svg>
            %1$s
        </span>',
        et_pb_get_the_author_posts_link(),
    );
    array_push( $meta_data, $author );
}

// Date
if ( $show_date ) {
    $date = sprintf(
        '<span class="dina_posts-meta dina_posts-date">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-month">
  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
  <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
  <path d="M16 3v4" />
  <path d="M8 3v4" />
  <path d="M4 11h16" />
  <path d="M7 14h.013" />
  <path d="M10.01 14h.005" />
  <path d="M13.01 14h.005" />
  <path d="M16.015 14h.005" />
  <path d="M13.015 17h.005" />
  <path d="M7.01 17h.005" />
  <path d="M10.01 17h.005" />
</svg>
            %1$s
        </span>',
        esc_html__( get_the_date(), 'divinationkit-for-divi' ),
    );
    array_push( $meta_data, $date );
}

if ( $category_position === 'with_meta' ) {
    $category_data = sprintf(
        '<span class="dina_posts-meta dina_posts-cat">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-folder">
  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
  <path d="M9 3a1 1 0 0 1 .608 .206l.1 .087l2.706 2.707h6.586a3 3 0 0 1 2.995 2.824l.005 .176v8a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-11a3 3 0 0 1 2.824 -2.995l.176 -.005h4z" />
</svg>
            %1$s
        </span>',
        et_builder_get_the_term_list( ', ' ),
    );

    array_push( $meta_data, $category_data );
}

// Comments
if ( $show_comments ) {
    $comments = sprintf(
        '<span class="dina_posts-meta dina_posts-comments">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-message">
  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
  <path d="M18 3a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-4.724l-4.762 2.857a1 1 0 0 1 -1.508 -.743l-.006 -.114v-2h-1a4 4 0 0 1 -3.995 -3.8l-.005 -.2v-8a4 4 0 0 1 4 -4zm-4 9h-6a1 1 0 0 0 0 2h6a1 1 0 0 0 0 -2m2 -4h-8a1 1 0 1 0 0 2h8a1 1 0 0 0 0 -2" />
</svg>
            %1$s %2$s
        </span>',
        esc_html__( get_comments_number(), 'divinationkit-for-divi' ),
        esc_html__( get_comments_number() > 1 ? 'Comments' : 'Comment', 'divinationkit-for-divi' ),
    );
    array_push( $meta_data, $comments );
}

// Meta
$meta = sprintf(
    '<p class="dina_posts-meta %2$s">%1$s</p>',
    join( $separator, $meta_data ),
    $show_separator ? 'dina_post-meta-use-separator' : '',
);

// Post content
if ( $args['show_content'] === 'on' ) {
    $content = sprintf(
        '<div class="dina_posts-content">%1$s</div>',
        esc_html__( the_content(), 'divinationkit-for-divi' ),
    );
} else if ( $args['show_excerpt'] === 'on' ) {
    $post_id = get_the_ID();
    $content = sprintf(
        '<div class="dina_posts-content">%1$s</div>',
        mb_strimwidth( get_the_excerpt( $post_id ), 0, $args['excerpt_length'], '...' )
    );
}

// Show More button
if ( $show_more ) {
    $read_more_button = sprintf(
        '<a href="%2$s" class="dina_posts-read-more">%1$s</a>',
        esc_html__( 'Read More', 'divinationkit-for-divi' ),
        esc_url( get_the_permalink() )
    );
}

printf(
    '<article>
        %1$s
        <div class="dina_posts-content-wrapper">
            %2$s
            %3$s
            %4$s
            %5$s
            %6$s
        </div>
    </article>',
    $thumbnail,
    $category_position === 'before_title' ? $categories : '',
    $title,
    $meta,
    $content,
    $read_more_button,
);
