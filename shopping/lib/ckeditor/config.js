/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'en';
	// config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = base + "/lib/kcfinder/browse.php?opener=ckeditor&type=files" ;
    config.filebrowserImageBrowseUrl = base + "/lib/kcfinder/browse.php?opener=ckeditor&type=images" ;
    config.filebrowserFlashBrowseUrl = base + "/lib/kcfinder/browse.php?opener=ckeditor&type=flash" ;
    config.filebrowserUploadUrl = base + "/lib/kcfinder/upload.php?opener=ckeditor&type=files" ;
    config.filebrowserImageUploadUrl = base + "/lib/kcfinder/upload.php?opener=ckeditor&type=images" ;
    config.filebrowserFlashUploadUrl = base + "/lib/kcfinder/upload.php?opener=ckeditor&type=flash" ;

    //config.filebrowserBrowseUrl = base+"/lib/ckfinder/ckfinder.html";
    //
    //config.filebrowserImageBrowseUrl = base+"/lib/ckfinder/ckfinder.html?type=Images";
    //
    //config.filebrowserFlashBrowseUrl = base+"/lib/ckfinder/ckfinder.html?type=Flash";
    //
    //config.filebrowserUploadUrl = base+'/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    //
    //config.filebrowserImageUploadUrl = base+'/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    //
    //config.filebrowserFlashUploadUrl = base+'/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
