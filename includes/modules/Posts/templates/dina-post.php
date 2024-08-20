<?php

$show_thumbnail  = $args['show_thumbnail'] === 'on' ? true : false;
$show_author     = $args['show_author'] === 'on' ? true : false;
$show_date       = $args['show_date'] === 'on' ? true : false;
$show_categories = $args['show_categories'] === 'on' ? true : false;
$show_comments   = $args['show_comments'] === 'on' ? true : false;
$show_pagination = $args['show_pagination'] === 'on' ? true : false;
$header_level    = $args['header_level'];

$thumbnail  = '';
$title      = '';
$meta_data  = array();
$author     = '';
$date       = '';
$comments   = '';
$categories = '';
$content    = '';

if ( $show_thumbnail && has_post_thumbnail() ) {
    $thumbnail = sprintf(
        '<a href="%1$s" class="dina_posts-thumbnail">
            <img src="%2$s" alt="">
        </a>',
        esc_url( get_the_permalink() ),
        esc_url( get_the_post_thumbnail_url() )
    );
}

$title = sprintf(
    '<%1$s class="dina_posts-title">
        <a href="%2$s">%3$s</a>
    </%1$s>',
    $header_level,
    esc_url( get_the_permalink() ),
    esc_html__( get_the_title(), 'divinationkit-for-divi' ),
);

if ( $show_author ) {
    $author = sprintf(
        '<span class="dina_posts-meta dina_posts-author">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dina_posts-meta-icon">
  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
  <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
  <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
</svg> <a href="%2$s"> %1$s</a>
        </span>',
        esc_html__( get_the_author(), 'divinationkit-for-divi' ),
        esc_url( get_the_author_posts_link() ),
    );
    array_push( $meta_data, $author );
}

if ( $show_date ) {
    $date = sprintf(
        '<span class="dina_posts-meta dina_posts-date">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dina_posts-meta-icon">
  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
  <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
  <path d="M16 3v4" />
  <path d="M8 3v4" />
  <path d="M4 11h16" />
  <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
</svg> %1$s
        </span>',
        esc_html__( get_the_date(), 'divinationkit-for-divi' ),
    );
    array_push( $meta_data, $date );
}

if ( $show_categories ) {
    $categories = sprintf(
        '<span class="dina_posts-meta dina_posts-categories">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dina_posts-meta-icon">
  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
  <path d="M4 4h6v6h-6z" />
  <path d="M14 4h6v6h-6z" />
  <path d="M4 14h6v6h-6z" />
  <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
</svg> %1$s
        </span>',
        et_builder_get_the_term_list( ', ' )
    );
    array_push( $meta_data, $categories );
}

if ( $show_comments ) {
    $comments = sprintf(
        '<span class="dina_posts-meta dina_posts-comments">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dina_posts-meta-icon">
  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
  <path d="M8 9h8" />
  <path d="M8 13h6" />
  <path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
</svg> %1$s %2$s
        </span>',
        esc_html__( get_comments_number(), 'divinationkit-for-divi' ),
        esc_html__( get_comments_number() > 1 ? 'Comments' : 'Comment', 'divinationkit-for-divi' ),
    );
    array_push( $meta_data, $comments );
}

$meta = sprintf(
    '<p class="dina_posts-meta">%1$s</p>',
    join( ' | ', $meta_data )
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

printf(
    '<article>
        %1$s
        <div class="dina_post-content-wrapper">
            %2$s
            %3$s
            %4$s
        </div>
    </article>',
    $thumbnail,
    $title,
    $meta,
    $content,
);
