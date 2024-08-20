(function($) {
    $('.dina_testimonial_slider-container').each(function() {
        const settings = $(this).data('settings');
        $(this).slick(settings);
    });
})(jQuery);
