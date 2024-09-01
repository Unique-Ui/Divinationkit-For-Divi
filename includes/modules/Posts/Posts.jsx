import React, { Component } from 'react';
import { setResponsiveCSS } from '../Core/DiviNationKit-core';

export class Posts extends Component {
    static slug = 'dina_posts';

    static css(props) {
        let additionalCss = [],
            pagination,
            layoutList;

        if (props.layout === 'list') {
            layoutList = setResponsiveCSS(props, [
                {
                    selector: '%%order_class%% .dina_posts-thumbnail-wrapper',
                    optionName: 'thumbnail_width',
                    property: 'width',
                },
            ]);
        }

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dina_posts-categories a',
                optionName: 'category_bg',
                property: 'background',
            },
            {
                selector: '%%order_class%% .dina_posts-categories a',
                optionName: 'category_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_posts-wrapper',
                optionName: 'space_between_item',
                property: 'column-gap',
            },
            {
                selector: '%%order_class%% .dina_posts-list article',
                optionName: 'space_between_content',
                property: 'gap',
            },

            {
                selector: '%%order_class%% .dina_posts-container article',
                optionName: 'vertical_position',
                property: 'align-items',
            },
            {
                selector: '%%order_class%% .dina_posts-container article',
                optionName: 'post_item_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_posts-container article',
                optionName: 'post_item_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_posts-grid article',
                optionName: 'content_alignment',
                property: 'text-align',
            },
            {
                selector:
                    '%%order_class%% .dina_posts-grid .dina_posts-thumbnail-wrapper',
                optionName: 'content_alignment',
                property: 'justify-content',
            },
            {
                selector: '%%order_class%% .dina_posts-content-wrapper',
                optionName: 'content_wrapper_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_posts-content-wrapper',
                optionName: 'content_wrapper_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_posts-thumbnail',
                optionName: 'thumbnail_width',
                property: 'width',
            },
            {
                selector: '%%order_class%% .dina_posts-thumbnail img',
                optionName: 'thumbnail_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_posts-thumbnail img',
                optionName: 'thumbnail_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_posts-read-more',
                optionName: 'read_more_bg',
                property: 'background',
            },
            {
                selector: '%%order_class%% .dina_posts-read-more',
                optionName: 'read_more_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_posts-read-more',
                optionName: 'read_more_padding',
                property: 'padding',
            },
        ]);

        if (props.show_pagination === 'on') {
            pagination = setResponsiveCSS(props, [
                {
                    selector: '%%order_class%% .dina_posts-pagination',
                    optionName: 'page_alignment',
                    property: 'justify-content',
                },
                {
                    selector: '%%order_class%% .dina_posts-pagination',
                    optionName: 'page_space',
                    property: 'gap',
                },
                {
                    selector:
                        '%%order_class%% .dina_posts-pagination .page-numbers',
                    optionName: 'page_color',
                    property: 'color',
                },
                {
                    selector:
                        '%%order_class%% .dina_posts-pagination .page-numbers.current',
                    optionName: 'active_page_color',
                    property: 'color',
                },
                {
                    selector:
                        '%%order_class%% .dina_posts-pagination .page-numbers',
                    optionName: 'page_bg',
                    property: 'background',
                },
                {
                    selector:
                        '%%order_class%% .dina_posts-pagination .page-numbers.current',
                    optionName: 'active_page_bg',
                    property: 'background',
                },
                {
                    selector: '%%order_class%% .dina_posts-pagination',
                    optionName: 'page_margin',
                    property: 'margin',
                },
                {
                    selector:
                        '%%order_class%% .dina_posts-pagination .page-numbers',
                    optionName: 'page_padding',
                    property: 'padding',
                },
            ]);
        }

        return additionalCss
            .concat(responsiveCss)
            .concat(layoutList)
            .concat(pagination);
    }

    render() {
        let classes = ['dina_posts-container'];

        classes.push(`dina_posts-${this.props.layout}`);
        classes.push(`dina_posts-column-${this.props.column_number}`);

        return (
            <div
                className={classes.join(' ')}
                dangerouslySetInnerHTML={{ __html: this.props.__posts }}
            />
        );
    }
}

export default Posts;
