
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

require('tinymce')
require('tinymce/themes/modern')
require('tinymce/plugins/link')
require('tinymce/plugins/image')
require('tinymce/plugins/lists')
require('tinymce/plugins/textcolor')
require('tinymce/plugins/media')
require('tinymce/plugins/emoticons')
    