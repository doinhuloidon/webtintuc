/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	 config.language = 'vi';
	 config.uiColor = '#00BCD4';
	 
	config.filebrowserBrowseUrl='public/js/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl='public/js/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl='public/js/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl='public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl='public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl='public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
