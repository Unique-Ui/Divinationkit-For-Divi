// Include Lightbox
import PhotoSwipeLightbox from '../lib/photoswipe/photoswipe-lightbox.esm.min.js';

const lightbox = new PhotoSwipeLightbox({
    // may select multiple "galleries"
    gallery: '.dina_masonry_gallery-wrapper',

    // Elements within gallery (slides)
    children: 'a',

    // setup PhotoSwipe Core dynamic import
    pswpModule: () => import('../lib/photoswipe/photoswipe.esm.min.js'),
    wheelToZoom: true,
});
lightbox.init();
