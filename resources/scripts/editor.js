import '@wordpress/edit-post';
import domReady from '@wordpress/dom-ready';
import { unregisterBlockStyle, registerBlockStyle } from '@wordpress/blocks';

domReady(() => {
    // image
    wp.blocks.unregisterBlockStyle('core/image', 'rounded');
    wp.blocks.unregisterBlockStyle('core/image', 'default');
    // quote
    wp.blocks.unregisterBlockStyle('core/quote', 'default');
    wp.blocks.unregisterBlockStyle('core/quote', 'large');
    // button
    wp.blocks.unregisterBlockStyle('core/button', 'fill');
    wp.blocks.unregisterBlockStyle('core/button', 'outline');
    // table
    wp.blocks.unregisterBlockStyle('core/table', 'regular');
    wp.blocks.unregisterBlockStyle('core/table', 'stripes');

    wp.data.dispatch('core/edit-post').removeEditorPanel('post-link');
    wp.data.dispatch('core/edit-post').removeEditorPanel('post-excerpt');
});
