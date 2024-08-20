import React, { Component } from 'react';
import './styles.css';

export class BasicMenu extends Component {
    static slug = 'dina_basic_menu';
    render() {
        let classes = ['dina_basic_menu-container'];

        classes.push(`dina_basic_menu-${this.props.menu_type}`);
        classes.push(`dina_basic_menu-${this.props.submenu_direction}`);

        if (this.props.show_submenu_on_click === 'on') {
            classes.push('dina_basic_menu-click');
        } else {
            classes.push('dina_basic_menu-click');
        }

        return (
            <div
                className={classes.join(' ')}
                dangerouslySetInnerHTML={{ __html: this.props.__menu }}
            ></div>
        );
    }
}

export default BasicMenu;
