try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

import 'lightgallery.js'

lightGallery(document.getElementById('display-mode'));
