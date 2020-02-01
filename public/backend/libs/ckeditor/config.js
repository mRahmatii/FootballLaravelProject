/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'fa';
	// config.uiColor = '#AADC6E';
	config.height = 400;

	// config.entities = false;
	config.basicEntities = false;
	// config.enterMode= CKEDITOR.ENTER_BR;
	// config.fillEmptyBlocks = false;

	config.allowedContent = true;
	config.extraAllowedContent= '*[*]{*}(*)';
	CKEDITOR.dtd.$removeEmpty.i = 0;

	// config.extraPlugins = 'uploadimage';
	// config.uploadUrl = root + 'admin/App/uploadImageContent';
	// config.imageUploadUrl = root + 'admin/App/uploadImageContent';
	// config.filebrowserUploadUrl = root + 'app/webroot/upload.php';
	config.filebrowserUploadUrl = base_url() + 'admin/App/uploadImage';
};
