/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    config.language = 'vi';
    //config.uiColor = '#AADC6E';
    //config.filebrowserBrowseUrl = '/Assets/Plugins/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = '/assets/plugins/ckfinder/ckfinder.html?Type=Images';
    config.filebrowserFlashBrowseUrl = '/assets/plugins/ckfinder/ckfinder.html?Type=Flash';
    config.filebrowserImageUploadUrl = '/assets/plugins/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = '/assets/plugins/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Flash';
    config.contentsCss = 'https://fonts.googleapis.com/css?family=Open+Sans';
    config.font_names = 'Open Sans;' + config.font_names;
};
