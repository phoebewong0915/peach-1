/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'en';
	//config.extraPlugins = 'uploadimage';
	// config.uiColor = '#AADC6E';
	config.extraPlugins = 'html5video,widget,widgetselection,clipboard,lineutils,youtube';
	config.autoGrow_minHeight = 600;
	config.autoGrow_maxHeight = 800;
	config.autoGrow_bottomSpace = 50;
	config.allowedContent = true;
	config.extraAllowedContent='data-toggle[*]{*}';
};
