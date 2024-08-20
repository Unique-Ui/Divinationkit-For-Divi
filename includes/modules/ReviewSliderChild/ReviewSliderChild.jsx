import React, { Component } from 'react';
import './styles.css';
import { defaultImage, setResponsiveCSS } from '../Core/DiviNationKit-core';

export class TestimonialSliderChild extends Component {
    static slug = 'dina_testimonial_slider_child';

    static css(props) {
        const additionalCss = [];

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-img',
                optionName: 'image_width',
                property: 'width',
            },
            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-img',
                optionName: 'image_margin',
                property: 'margin',
            },
            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-img',
                optionName: 'image_padding',
                property: 'padding',
            },

            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_rating-star',
                optionName: 'star_color',
                property: 'color',
            },
            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_rating-star',
                optionName: 'star_size',
                property: 'font-size',
            },
            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_rating-star-full, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-1::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-2::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-3::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-4::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-5::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-6::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-7::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-8::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-9::before, .dina_testimonial_slider-container %%order_class%% .dina_rating-star-10::before',
                optionName: 'fill_star_color',
                property: 'color',
            },

            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_rating-wrapper',
                optionName: 'rating_margin',
                property: 'margin',
            },
            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_rating-wrapper',
                optionName: 'rating_padding',
                property: 'padding',
            },

            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-author, .dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-style-three',
                optionName: 'image_gap',
                property: 'gap',
            },
            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-img-wrapper, .dina_testimonial_slider-container %%order_class%% .dina_rating-wrapper',
                optionName: 'alignment',
                property: 'justify-content',
            },
            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-content-wrapper',
                optionName: 'alignment',
                property: 'text-align',
            },
            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-style-three',
                optionName: 'vertical_alignment',
                property: 'align-items',
            },

            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-content-wrapper',
                optionName: 'content_wrapper_margin',
                property: 'margin',
            },
            {
                selector:
                    '.dina_testimonial_slider-container %%order_class%% .dina_testimonial_box-content-wrapper',
                optionName: 'content_wrapper_padding',
                property: 'padding',
            },
        ]);

        return additionalCss.concat(responsiveCss);
    }

    renderImage = () => {
        const useImage = this.props.use_image ? this.props.use_image : 'on';
        if (useImage === 'on') {
            const image = this.props.image ? this.props.image : defaultImage;
            return (
                <div className="dina_testimonial_box-img">
                    <img src={image} alt="" />
                </div>
            );
        }
    };

    renderName = () => {
        const heading = this.props.name;
        const Title = this.props.name_level ? this.props.name_level : 'h3';

        if (heading) {
            return (
                <Title className="dina_testimonial_box-name">{heading}</Title>
            );
        }
    };

    renderPosition = () => {
        const heading = this.props.position;
        const Title = this.props.position_level
            ? this.props.position_level
            : 'h3';

        if (heading) {
            return (
                <Title className="dina_testimonial_box-position">
                    {heading}
                </Title>
            );
        }
    };

    renderStars = (rating, ratingScale) => {
        let stars = [];
        const flooredRating = Math.floor(rating);
        const halfStar = Math.floor((rating - flooredRating) * 10);

        for (let i = 1.0; i <= ratingScale; i++) {
            if (i <= flooredRating) {
                stars.push(
                    <span
                        key={i}
                        className="dina_rating-star dina_rating-star-full"
                    >
                        ★
                    </span>
                );
            } else if (i === flooredRating + 1 && rating !== flooredRating) {
                stars.push(
                    <span
                        key={i}
                        className={`dina_rating-star dina_rating-star-${halfStar}`}
                    >
                        ★
                    </span>
                );
            } else {
                stars.push(
                    <span
                        key={i}
                        className="dina_rating-star dina_rating-star-empty"
                    >
                        ★
                    </span>
                );
            }
        }

        return stars;
    };

    renderRating() {
        const ratingStyle = this.props.rating_style
            ? this.props.rating_style
            : 'both';
        const rating = this.props.rating ? this.props.rating : 5;
        const ratingScale = this.props.rating_scale
            ? this.props.rating_scale
            : 5;

        let ratingLayout = '';

        if (ratingStyle === 'only_star') {
            ratingLayout = (
                <div className="dina_rating-wrapper">
                    <div className="dina_rating-star-wrapper">
                        {this.renderStars(rating, ratingScale)}
                    </div>
                </div>
            );
        }

        if (ratingStyle === 'only_number') {
            ratingLayout = (
                <div className="dina_rating-wrapper">
                    <div className="dina_rating-number">
                        ({rating}/{ratingScale})
                    </div>
                </div>
            );
        }
        if (ratingStyle === 'both') {
            ratingLayout = (
                <div className="dina_rating-wrapper">
                    <div className="dina_rating-star-wrapper">
                        {this.renderStars(rating, ratingScale)}
                    </div>
                    <div className="dina_rating-number">
                        ({rating}/{ratingScale})
                    </div>
                </div>
            );
        }

        return ratingLayout;
    }

    renderDescription = (description) => {
        if (description) {
            if (this.props.dynamic.description.value) {
                return <>{this.props.dynamic.description.render()}</>;
            } else {
                return (
                    <div
                        dangerouslySetInnerHTML={{ __html: description }}
                    ></div>
                );
            }
        }
    };

    render() {
        const ratingPosition = this.props.rating_position
            ? this.props.rating_position
            : 'under_author';
        const layout = this.props.layout ? this.props.layout : 'style-one';
        let content = '';

        if (layout === 'style-one') {
            content = (
                <div
                    className={`dina_testimonial_box-container dina_testimonial_box-${layout}`}
                >
                    <div className="dina_testimonial_box-author ">
                        {this.renderImage()}
                        <div className="dina_testimonial_box-info">
                            {this.renderName()}
                            {this.renderPosition()}
                            {ratingPosition === 'under_author' &&
                                this.renderRating()}
                        </div>
                    </div>
                    <div className="dina_testimonial_box-content">
                        {ratingPosition === 'top_testimonial' &&
                            this.renderRating()}

                        <div className="dina_testimonial_box-description">
                            {this.renderDescription(this.props.description)}
                        </div>
                        {ratingPosition === 'under_testimonial' &&
                            this.renderRating()}
                    </div>
                </div>
            );
        }

        if (layout === 'style-two') {
            content = (
                <div
                    className={`dina_testimonial_box-container dina_testimonial_box-${layout}`}
                >
                    <div className="dina_testimonial_box-content">
                        {ratingPosition === 'top_testimonial' &&
                            this.renderRating()}

                        <div className="dina_testimonial_box-description">
                            {this.renderDescription(this.props.description)}
                        </div>
                        {ratingPosition === 'under_testimonial' &&
                            this.renderRating()}
                    </div>
                    <div className="dina_testimonial_box-author ">
                        {this.renderImage()}
                        <div className="dina_testimonial_box-info">
                            {this.renderName()}
                            {this.renderPosition()}
                            {ratingPosition === 'under_author' &&
                                this.renderRating()}
                        </div>
                    </div>
                </div>
            );
        }

        if (layout === 'style-three') {
            content = (
                <div
                    className={`dina_testimonial_box-container dina_testimonial_box-${layout}`}
                >
                    {this.renderImage()}
                    <div className="dina_testimonial_box-content-wrapper">
                        <div className="dina_testimonial_box-author ">
                            <div className="dina_testimonial_box-info">
                                {this.renderName()}
                                {this.renderPosition()}
                            </div>
                            {ratingPosition === 'under_author' &&
                                this.renderRating()}
                        </div>
                        <div className="dina_testimonial_box-content">
                            {ratingPosition === 'top_testimonial' &&
                                this.renderRating()}
                            <div className="dina_testimonial_box-description">
                                {this.renderDescription(this.props.description)}
                            </div>
                            {ratingPosition === 'under_testimonial' &&
                                this.renderRating()}
                        </div>
                    </div>
                </div>
            );
        }

        if (layout === 'style-four') {
            content = (
                <div
                    className={`dina_testimonial_box-container dina_testimonial_box-${layout}`}
                >
                    <div className="dina_testimonial_box-img-wrapper">
                        {this.renderImage()}
                    </div>
                    <div className="dina_testimonial_box-content-wrapper">
                        <div className="dina_testimonial_box-author ">
                            <div className="dina_testimonial_box-info">
                                {this.renderName()}
                                {this.renderPosition()}
                                {ratingPosition === 'under_author' &&
                                    this.renderRating()}
                            </div>
                        </div>
                        <div className="dina_testimonial_box-content">
                            {ratingPosition === 'top_testimonial' &&
                                this.renderRating()}
                            <div className="dina_testimonial_box-description">
                                {this.renderDescription(this.props.description)}
                            </div>
                            {ratingPosition === 'under_testimonial' &&
                                this.renderRating()}
                        </div>
                    </div>
                </div>
            );
        }

        return content;
    }
}

export default TestimonialSliderChild;
