import React, { Component } from 'react';

export class Posts extends Component {
    static slug = 'dina_posts';

    static css(props) {}
    render() {
        console.log(this.props.__posts);
        return (
            <div
                className="dina_posts-container dina_posts-grid"
                dangerouslySetInnerHTML={{ __html: this.props.__posts }}
            />
        );
    }
}

export default Posts;
