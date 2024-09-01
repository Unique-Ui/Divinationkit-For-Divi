import React, { useEffect } from 'react';
import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';

export default function Gallery(props, galleryID) {
    useEffect(() => {
        let lightbox = new PhotoSwipeLightbox({
            gallery: '#' + galleryID,
            children: 'a',
            pswpModule: () => import('photoswipe'),
        });
        lightbox.init();

        return () => {
            lightbox.destroy();
            lightbox = null;
        };
    }, []);

    const items = props.__gallery ? props.__gallery : [];
    const lightBox = props.lightbox;

    return (
        <div className="pswp-gallery" id={galleryID}>
            <div className="dina_masonry_gallery-wrapper">
                {items.map((item, i) => (
                    <a
                        key={galleryID + '_' + i}
                        href={
                            lightBox === 'none'
                                ? '#'
                                : lightBox === 'use_link'
                                ? item.link
                                : item.image_src_full[0]
                        }
                        target={item.link_target}
                        className={`dina_masonry_gallery-item ${props.hover_effect}`}
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
