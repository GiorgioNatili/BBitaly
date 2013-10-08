/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for a single toolbar row.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		// On the basic preset, clipboard and undo is handled by keyboard.
		// Uncomment the following line to enable them on the toolbar as well.
		// { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'forms' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'tools' },
		{ name: 'others' },
		{ name: 'about' }
	];

	// The default plugins included in the basic setup define some buttons that
	// we don't want too have in a basic editor. We remove them here.
	config.removeButtons = 'Anchor,Underline,Strike,Subscript,Superscript';

	// Considering that the basic setup doesn't provide pasting cleanup features,
	// it's recommended to force everything to be plain text.
	config.forcePasteAsPlainText = false;

	// Let's have it basic on dialogs as well.
	config.removeDialogTabs = 'link:advanced';
        
        config.colorButton_enableMore = false ;
        config.colorButton_colors = '000000,feb71a,705e5f,95703c,7e4a5e,8b5543,6d715a,5c6e76' ;
        config.colorButton_colors2 = 'ffffff,e6e6e6,f6f6f6,e8dadc,f8d273,f3f9e3,fbeabe,f4f8db,FFFF00' ;
};
