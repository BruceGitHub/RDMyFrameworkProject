<?php 
/* 
rdMyFramework - The framework for development webapplication interface 
Copyright (C) 2006-2007 Diana Roberto 
Version Alpha 0.0.0.10
For further information visit:
http://sourceforge.net/projects/rdmyframework/
*/

ini_set ("display_errors","1");

//disable only for test
//ini_set("error_reporting", E_ALL);
ini_set("error_reporting", E_STRICT);

function microtime_float()
{
   list($usec, $sec) = explode(" ", microtime());
   return ((float)$usec + (float)$sec);
}
$start = microtime_float();

INCLUDE_ONCE("../rdmyframework/import_corerdmyframework.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<TITLE>Template</TITLE>
</HEAD>
<BODY>

<DIV style="clear:both"></DIV>                                                       

<?php 
$ob = clsrdFactoryClass::createObject("tagcomponent.clsTagSelect");

$ob->get_StyleColl()->add_simpleRule("color","red");
$ob->get_attColl()->add_singleAttr(MULTIPLE,MULTIPLE); 

/*
$ob->get_attColl()->add_simpleAttr(NAME,'camposelect'); 
$ob->get_attColl()->add_simpleAttr(SIZE,6); 
*/
/*$ob->add_OptionParamGroup('','label gruppo uno','text gruppo uno');
$ob->add_OptionParam('','','label 1','1','item 1'); 
$ob->add_OptionParam(true,true,'label 2','2','item 2'); 
$ob->add_OptionParam('','','label 3','3','item 3'); 
$ob->close_OptionGroup();
$ob->add_OptionParamGroup(true,'label gruppo due','text gruppo due');
$ob->add_OptionParam('','','label 1','1','item 1'); 
$ob->add_OptionParam(true,'','label 2','2','item 2'); 
$ob->add_OptionParam('','','label 3','3','item 3'); 
$ob->close_OptionGroup();
*/
$ob->add_OptionParam('true','','label 1','1','item 1'); 
$ob->add_OptionParam('','','label 2','2','item 2'); 
$ob->draw();
/*
$items = $ob->get_OptionsActive();


$items->goFirst();
while($items->isLastElement() == false )
{
$ite = $items->get_CpyElement();  
$ite = $ite->get_Object();
$ite->set_Text("modificato"); 
$items->goNext();
}
$ob->draw();
*/

$items = $ob->get_OptionsByVal('1');
$items->goFirst();
while($items->isLastElement() == false )
{
$ite = $items->get_CpyElement();  
$ite = $ite->get_Object();
$ite->set_Text("modificato 2"); 
$items->goNext();
}

unset($items);
unset($ite); 
$ob2 = clsrdFactoryClass::createObject("tagcomponent.clsTagSelect");
$ob2 = clone $ob; 
$ob2->add_OptionParam('','','label 4','4','item 4'); 
$ob2->get_StyleColl()->add_simpleRule("color","green");
$items = $ob2->get_OptionsActive(); 
$ite = $items->get_CpyElement(); 
$ite = $ite->get_Object();
$ite->set_Text("item 1 clonato"); 



$ob->draw();
$ob2->draw();
?>
</BODY>
</HTML>
