import React, { Component } from 'react';
import {
    dinaGetCustomBgCSS,
    setResponsiveCSS,
} from '../Core/DiviNationKit-core';

export class Person extends Component {
    static slug = 'dina_person';

    static css(props) {
        const additionalCss = [];
        let imageWidth;

        const size = props.icon_size.split('px')[0] * 2;

        additionalCss.push([
            {
                selector: '%%order_class%% .dina_person-social-network',
                declaration: `width: ${size}px; height: ${size}px;`,
            },
        ]);

        if (props.layout === 'style-four') {
            imageWidth = setResponsiveCSS(props, [
                {
                    selector: '%%order_class%% .dina_person-img',
                    optionName: 'image_width',
                    property: 'width',
                },
            ]);
        } else {
            imageWidth = setResponsiveCSS(props, [
                {
                    selector: '%%order_class%% .dina_person-img img',
                    optionName: 'image_width',
                    property: 'width',
                    defaultCss: 'display: inline-block',
                },
                {
                    selector: '%%order_class%% .dina_person-img img',
                    optionName: 'image_width',
                    property: 'width',
                },
            ]);
        }

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dina_person-img',
                optionName: 'image_align',
                property: 'text-align',
            },
            {
                selector: '%%order_class%% .dina_person-social-links',
                optionName: 'icon_alignment',
                property: 'justify-content',
            },
            {
                selector: '%%order_class%% .dina_person-social-links',
                optionName: 'icon_gap',
                property: 'gap',
            },
            {
                selector:
                    '%%order_class%% .dina_person-social-network span::before',
                optionName: 'icon_size',
                property: 'font-size',
            },

            {
                selector:
                    '%%order_class%% .dina_person-social-network span::before',
                optionName: 'icon_bg',
                property: 'background',
            },
            {
                selector:
                    '%%order_class%% .dina_person-social-network span::before',
                optionName: 'icon_color',
                property: 'color',
            },

            // Custom Spacing
            {
                selector: '%%order_class%% .dina_person-info',
                optionName: 'content_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_person-info',
                optionName: 'content_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_person-social-links',
                optionName: 'network_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_person-social-links',
                optionName: 'network_padding',
                property: 'padding',
            },

            // Style three
            {
                selector:
                    '%%order_class%% .dina_person-style-three .dina_person-social-links',
                optionName: 'offset_x',
                property: 'top',
            },
        ]);

        const content_bg = dinaGetCustomBgCSS(
            props,
            'content',
            '%%order_class%% .dina_person-style-two .dina_person-info',
            '',
            '#00e091'
        );

        return additionalCss
            .concat(responsiveCss)
            .concat(content_bg)
            .concat(imageWidth);
    }

    renderImage = () => {
        return (
            <div className="dina_person-img">
                <img src={this.props.image} alt="" />
            </div>
        );
    };

    renderName = () => {
        const heading = this.props.name;
        const Title = this.props.name_level ? this.props.name_level : 'h3';

        if (heading) {
            return <Title className="dina_person-name">{heading}</Title>;
        }
    };

    renderPosition = () => {
        const heading = this.props.position;
        const Title = this.props.position_level
            ? this.props.position_level
            : 'h3';

        if (heading) {
            return <Title className="dina_person-position">{heading}</Title>;
        }
    };

    renderDescription = () => {
        const description = this.props.description;

        if (description !== undefined) {
            if (this.props.dynamic.description.value) {
                return (
                    <div className="dina_person-description">
                        {this.props.dynamic.description.render()}
                    </div>
                );
            } else {
                return (
                    <div
                        className="dina_person-description"
                        dangerouslySetInnerHTML={{ __html: description }}
                    ></div>
                );
            }
        }
    };

    render() {
        let classes = ['dina_person-container'];

        classes.push(`dina_person-${this.props.layout}`);

        if (this.props.show_info_on_hover === 'on') {
            classes.push('dina_person-info-show-on-hover');
        }

        if (this.props.show_network_on_hover === 'on') {
            classes.push('dina_person-network-show-on-hover');
        }

        return (
            <div className={classes.join(' ')}>
                {this.renderImage()}
                <div className="dina_person-info">
                    <div className="dina_person-details">
                        {this.renderName()}
                        {this.renderPosition()}
                        {this.renderDescription()}
                    </div>
                    {this.props.content.length > 0 && (
                        <div className="dina_person-social-links">
                            {this.props.content}
                        </div>
                    )}
                </div>
            </div>
        );
    }
}

export default Person;
