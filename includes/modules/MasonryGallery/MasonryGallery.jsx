import React, { Component } from 'react';
import { setResponsiveCSS } from '../Core/DiviNationKit-core';

import './dina-2d-hover-effects.css';
import './styles.css';

export class MasonryGallery extends Component {
    static slug = 'dina_masonry_gallery';

    static css(props) {
        let additionalCss = [];

        const responsiveCss = setResponsiveCSS(props, [
            {
                optionName: 'column_count',
                property: 'column-count',
                selector: '%%order_class%% .dina_masonry_gallery-wrapper',
            },
            {
                optionName: 'space_between_item',
                property: 'column-gap',
                selector: '%%order_class%% .dina_masonry_gallery-wrapper',
            },
            {
                optionName: 'space_between_item',
                property: 'margin-bottom',
                selector: '%%order_class%% .dina_masonry_gallery-item',
            },
            {
                optionName: 'image_padding',
                property: 'padding',
                selector: '%%order_class%% .dina_masonry_gallery-item img',
            },
        ]);

        return additionalCss.concat(responsiveCss);
    }

    render() {
        const items = this.props.__gallery ? this.props.__gallery : [];
        const lightBox = this.props.lightbox;

        return (
            <div className="dina_masonry_gallery-container">
                <div className="dina_masonry_gallery-wrapper">
                    {items.map((item, i) => (
                        <a
                            key={i}
                            href={
                                lightBox === 'none'
                                    ? '#'
                                    : lightBox === 'use_link'
                                    ? item.link
                                    : item.image_src_full[0]
                            }
                            target={item.link_target}
                            className={`dina_masonry_gallery-item ${this.props.hover_effect}`}
                            data-pswp-width={item.image_src_full[1]}
                            data-pswp-height={item.image_src_full[2]}
                        >
                            <img src={item.image_src_full[0]} alt="" />
                        </a>
                    ))}
                </div>
            </div>
        );
    }
}

export default MasonryGallery;
