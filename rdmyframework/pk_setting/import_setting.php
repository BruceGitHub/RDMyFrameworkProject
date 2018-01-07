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
 * 01-03-06 : Creazione
 *    
 * @version 1.0.0.0
 * @package pk_setting
 * 
 * questo package serve per tenere tutte le impostazioni 
 * generali es: path,lingua etc. 
 *    
 */
 require_once(dirname(__FILE__)."/rdFactoryClass.php");

 //messagi di errore 
 DEFINE("EX_NONREGISTERCLASS","Class not register");

  
 //registrazione oggetti comuni del framework 
 
 //tag 
 clsrdFactoryClass::register("clsrdElementInLine","tagcomponent.clsrdElementInLine");
 clsrdFactoryClass::register("clsrdTagDiv","tagcomponent.clsTagDiv");
 clsrdFactoryClass::register("clsrdTagImg","tagcomponent.clsTagImg");
 clsrdFactoryClass::register("clsrdTagUl","tagcomponent.clsTagUl");
 clsrdFactoryClass::register("clsrdTagLi","tagcomponent.clsTagLi");
 clsrdFactoryClass::register("clsrdTagInput","tagcomponent.clsTagInput");
 clsrdFactoryClass::register("clsrdTagCheckBox","tagcomponent.clsrdTagCheckBox"); 
 clsrdFactoryClass::register("clsrdTagSelect","tagcomponent.clsTagSelect");
 clsrdFactoryClass::register("clsrdTagOption","tagcomponent.clsTagSelect.clsTagOption");
 clsrdFactoryClass::register("clsrdTagOptionGroup","tagcomponent.clsTagSelect.clsTagOptionGroup");
 clsrdFactoryClass::register("clsrdTagTextArea","tagcomponent.clsTagTextArea");
 clsrdFactoryClass::register("clsrdTagFieldSet","tagcomponent.clsTagFieldSet"); 
 clsrdFactoryClass::register("clsrdTagLegend","tagcomponent.clsTagLegend"); 
 clsrdFactoryClass::register("clsrdTagLabel","tagcomponent.clsTagLabel");  
 clsrdFactoryClass::register("clsrdTagForm","tagcomponent.clsTagForm");  
 clsrdFactoryClass::register("clsrdTagA","tagcomponent.clsTagA"); 
 clsrdFactoryClass::register("clsrdTagMeta","tagcomponent.clsTagMeta"); 
 clsrdFactoryClass::register("clsrdTagH1","tagcomponent.clsTagH1");  
 clsrdFactoryClass::register("clsrdTagH2","tagcomponent.clsTagH2");
 clsrdFactoryClass::register("clsrdTagH3","tagcomponent.clsTagH3"); 
 clsrdFactoryClass::register("clsrdTagH4","tagcomponent.clsTagH4");
 clsrdFactoryClass::register("clsrdTagH5","tagcomponent.clsTagH5");
 clsrdFactoryClass::register("clsrdTagH6","tagcomponent.clsTagH6");
 clsrdFactoryClass::register("clsrdTagP","tagcomponent.clsTagP");   
 clsrdFactoryClass::register("clsrdTagSpan","tagcomponent.clsTagSpan");   
 
 //utili 
 clsrdFactoryClass::register("rdGenericContainer","pk_util.rdGenericContainer");
 clsrdFactoryClass::register("rdCollectionStyle","pk_util.rdCollectionStyle");
 clsrdFactoryClass::register("rdCollectionAttr","pk_util.rdCollectionAttr");
 clsrdFactoryClass::register("rdBaseClassItem","pk_util.rdBaseClassItem");
 clsrdFactoryClass::register("rdCollectionItem","pk_util.rdCollectionItem");
 clsrdFactoryClass::register("rdCollectionClass","pk_util.rdCollectionClass");
 clsrdFactoryClass::register("rdCollectionObject","pk_util.rdCollectionObject");

 
 //custom 
 clsrdFactoryClass::register("rdBlockExtendBackground","tagcustomcomponent.rdBlockExtendBackground");
 clsrdFactoryClass::register("rdBlockExtendBackgroundV1","tagcustomcomponent.rdBlockExtendBackgroundV1");
 clsrdFactoryClass::register("rdBasicText","tagcustomcomponent.rdBasicText");
 clsrdFactoryClass::register("rdSlidingMenu","tagcustomcomponent.rdSlidingMenu");
 clsrdFactoryClass::register("rdSlidingMenuItem","tagcustomcomponent.rdSlidingMenu.rdSlidingMenuItem");
 clsrdFactoryClass::register("rdBlockWithLabel","tagcustomcomponent.rdBlockWithLabel");
 clsrdFactoryClass::register("rdBlockCenterImage","tagcustomcomponent.rdBlockCenterImage"); 
 clsrdFactoryClass::register("rdGridMatrix","tagcustomcomponent.rdGridMatrix");
 clsrdFactoryClass::register("rdSimpleStringGrid","tagcustomcomponent.rdSimpleStringGrid");
 clsrdFactoryClass::register("rdGridCell","tagcustomcomponent.rdGridCell");
 clsrdFactoryClass::register("rdSimpleStringGridCell","tagcustomcomponent.rdSimpleStringGridCell");
 clsrdFactoryClass::register("rdStringGridColumn","tagcustomcomponent.rdSimpleStringGridCell.rdStringGridColumn");
 
 
 
?>