import React, { Component } from 'react';
import {
    renderIcon,
    renderIconStyle,
    setResponsiveCSS,
} from '../Core/DiviNationKit-core';

export class IconListChild extends Component {
    static slug = 'dina_icon_list_child';

    static css(props) {
        const additionalCss = [];

        const iconStyle = renderIconStyle(
            props,
            'icon',
            '.dina_icon_list-container %%order_class%% .dina_icon_list-icon i.dina_icon'
        );

        const responsiveCss = setResponsiveCSS(props, [
            // Tooltip
            {
                selector:
                    '.dina_icon_list-container %%order_class%% .dina_tooltip-wrapper',
                optionName: 'tooltip_bg',
                property: 'background',
            },
            {
                selector:
                    '.dina_icon_list-container %%order_class%% .dina_tooltip-wrapper::after',
                optionName: 'tooltip_bg',
                property: 'border-top-color',
            },
            {
                selector:
                    '.dina_icon_list-container %%order_class%% .dina_tooltip-trigger::after',
                optionName: 'tooltip_button_color',
                property: 'color',
            },
            {
                selector:
                    '.dina_icon_list-container %%order_class%% .dina_tooltip-trigger::after',
                optionName: 'tooltip_button_size',
                property: 'font-size',
            },

            {
                selector:
                    '.dina_icon_list-container %%order_class%% .dina_icon_list-badge',
                optionName: 'badge_bg',
                property: 'background',
            },
        ]);

        if (props.tooltip_padding !== '') {
            additionalCss.push(
                setResponsiveCSS(props, [
                    {
                        selector:
                            '.dina_icon_list-container %%order_class%% .dina_tooltip-wrapper',
                        optionName: 'tooltip_padding',
                        property: 'padding',
                    },
                ])
            );
        }

        if (props.badge_padding !== '') {
            additionalCss.push(
                setResponsiveCSS(props, [
                    {
                        selector:
                            '.dina_icon_list-container %%order_class%% .dina_icon_list-badge',
                        optionName: 'badge_padding',
                        property: 'padding',
                    },
                ])
            );
        }

        return additionalCss.concat(iconStyle).concat(responsiveCss);
    }

    renderTooltip = () => {
        const tooltipText = this.props.tooltip_text;
        const tooltipPosition =
            this.props.tooltip_position !== undefined
                ? this.props.tooltip_position
                : 'top';

        return (
            <div className="dina_tooltip_container">
                <span className="dina_tooltip-trigger"></span>
                <div
                    className={`dina_tooltip-wrapper dina_tooltip-${tooltipPosition}`}
                >
                    <div className="dina_tooltip-text">{tooltipText}</div>
                </div>
            </div>
        );
    };

    renderTitle = () => {
        const heading = this.props.title;
        const Title = this.props.title_level ? this.props.title_level : 'h5';

        const useTooltip = this.props.use_tooltip;
        let content;

        if (useTooltip === 'on') {
            content = (
                <div className="dina_icon_list-use-tooltip">
                    <Title className={`dina_icon_list-title`}>
                        {heading} {this.renderBadge()}
                    </Title>
                    {this.renderTooltip()}
                </div>
            );
        } else {
            content = (
                <Title className={`dina_icon_list-title`}>
                    {heading} {this.renderBadge()}
                </Title>
            );
        }

        return content;
    };

    renderMCE = (description) => {
        if (description) {
            if (this.props.dynamic.description.value) {
                return (
                    <div className="dina_icon_list-description">
                        {this.props.dynamic.description.render()}
                    </div>
                );
            } else {
                return (
                    <div
                        className="dina_icon_list-description"
                        dangerouslySetInnerHTML={{ __html: description }}
                    ></div>
                );
            }
        }
    };

    renderBadge() {
        const isUseBadge = this.props.use_badge === 'on' ? true : false;
        const badgeText = this.props.badge_text;

        if (isUseBadge) {
            return <span className="dina_icon_list-badge">{badgeText}</span>;
        }
    }

    render() {
        return (
            <div className="dina_icon_list-item">
                <div className="dina_icon_list-icon">
                    <i className="dina_icon">{renderIcon(this.props.icon)}</i>
                </div>
                <div className="dina_icon_list-content">
                    {this.renderTitle()}
                    {this.renderMCE(this.props.description)}
                </div>
            </div>
        );
    }
}

export default IconListChild;
