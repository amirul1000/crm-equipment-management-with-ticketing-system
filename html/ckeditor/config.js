﻿/**
 * Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/licensePortions Copyright IBM Corp., 2009-2015.
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.plugins =
		'a11yhelp,' +
		'basicstyles,' +
		'bidi,' +
		'blockquote,' +
		'clipboard,' +
		'colorbutton,' +
		'colordialog,' +
		'contextmenu,' +
		'dialogadvtab,' +
		'elementspath,' +
		'enterkey,' +
		'entities,' +
		'find,' +
		'flash,' +
		'floatingspace,' +
		'font,' +
		'format,' +
		'horizontalrule,' +
		'htmlwriter,' +
		'image,' +
		'iframe,' +
		'indentlist,' +
		'indentblock,' +
		'justify,' +
		'language,' +
		'link,' +
		'list,' +
		'liststyle,' +
		'magicline,' +
		'maximize,' +
		'newpage,' +
		'pagebreak,' +
		'pastefromword,' +
		'pastetext,' +
		'preview,' +
		'print,' +
		'removeformat,' +
		'save,' +
		'selectall,' +
		'showblocks,' +
		'showborders,' +
		'sourcearea,' +
		'specialchar,' +
		'stylescombo,' +
		'tab,' +
		'table,' +
		'tabletools,' +
		'templates,' +
		'toolbar,' +
		'undo,' +
		'wysiwygarea' +

		//add some extra core plugins
		',tableresize,' +
		'autogrow,' +

		//ibm extension plugins
		'ibmcustomdialogs,' +
		'ibmtoolbars,' +
		'ibmurllink,' +
		'ibmstatusmessage,' +
		'ibmbidi,' +
		'ibmpastenotesdatalink,' +
		'ibmpastevideo,' +
		'ibmpasteiframe,' +
		'ibmtabletools,' +
		'ibmimagedatauri,' +
		'ibmfontprocessor,' +
		'ibmmenuhelpmessage,' +
		'ibmlanguagedropdown,' +
		'ibmcharactercounter,' +
		'ibmbinaryimagehandler,' +
		'ibmajax,' +
		'ibmpermanentpen,'+

		//ibmsametimeemoticons should be configured before smiley so that config.smiley_path is set to use ibmsametimeemoticons/images by default rather than cksource smiley/images
		'ibmsametimeemoticons,' +
		'smiley'
		;
	config.dialog_backgroundCoverColor = 'black';
	config.dialog_backgroundCoverOpacity = 0.3;
	config.skin = 'oneui3';
	config.dialog_startupFocusTab = true;
	config.colorButton_enableMore = false;
	config.resize_enabled = false;
	config.toolbarCanCollapse = false;
	config.toolbar = 'Large';
	config.disableNativeSpellChecker = false;
	config.forceEnterMode = true;
	config.useComputedState = true;
	config.ignoreEmptyParagraph = false;
	config.autoGrow_onStartup = true;
	config.ibmFloatToolbar = true;
	config.ibmFilterPastedDataUriImage = false;
	config.magicline_color = 'blue';
	config.magicline_everywhere = false;
	config.removeDialogTabs = 'flash:advanced;image:advanced;';
	config.displayContextMenuHelpMessage = true;
	config.enableTableSort = true;
	config.ibmBinaryImageUploadUrl='';
    config.ibmBinaryImageUploadUrlTimeout=20000;
    config.ibmBinaryImageUploadImageMaxSizeLimit=15;	//in MB
    config.ibmPermanentpenCookies = true;

	//add a border to the default styling for find_highlight (specified in plugins/find/plugin.js) so that found text is also visibly highlighted in high contrast mode
	config.find_highlight = { element : 'span', styles : { 'background-color' : '#004', 'color' : '#fff', 'border' : '1px solid #004' } };

	// Paste from Word (Paste Special) configuration
	config.pasteFromWordRemoveFontStyles = false;
	config.pasteFromWordRemoveStyles = false;

	//Convert links as you type
	config.ibmAutoConvertUrls = true;

	//ACF configs
	config.allowedContent = true;			//turn off ACF by default

	// See the release notes for how to add a custom link dialog to the MenuLink button menu.
	config.menus =
	{
		/* Create a menu called MenuLink containing menu items for the urllink and bookmarks commands.
		   Include 'MenuLink' in the toolbar definition to see this menu in the editor*/
		link :
		{
			buttonClass : 'cke_button_link',
			commands : ['link', 'bookmark'],
			toolbar: 'insert,30'
		},


		// Create a menu called MenuPaste containing menu items for the specified commands.
		paste :
		{
			buttonClass : 'cke_button_pastetext',
			groupName : 'clipboard',
			commands : ['paste', 'pastetext'],
			toolbar: 'editing,0'
			// label will default to editor.lang.ibm.menu.paste
		}
	};
};


