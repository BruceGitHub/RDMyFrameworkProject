<?
/* 
rdMyFramework - The framework for development webapplication interface 
Copyright (C) 2006-2007 Diana Roberto 
Version Alpha 0.0.0.10
For further information visit:
http://sourceforge.net/projects/rdmyframework/
*/
/**
 * rdFramework 
 *
 * Change-log:
 * 20-10-05 : Creazione
 *   
 * @version 1.0.0.0
 * @package pk_customcomponent
 */

//non rimuovere :import package di base
require_once(dirname(__FILE__)."/../pk_util/import_util.php");
require_once(dirname(__FILE__)."/../pk_tagcomponent/import_tagcomponent.php");

require("rdBasicText.php");
require("rdBlockExtendBackground.php");
require("rdBlockExtendBackgroundV1.php");
require("rdSlidingMenu.php");
require("rdBlockWithLabel.php");
require("rdBlockCenterImage.php");
require("rdGridMatrix.php");
require("rdSimpleStringGrid.php");

//
//import package estensioni etc.
//aggiungere qui i package opzionali da utilizzare 
//
require_once(dirname(__FILE__)."/pk_layout/import_layoutcomponent.php");
require_once(dirname(__FILE__)."/pk_gd2/import_gd2.php");

?>
