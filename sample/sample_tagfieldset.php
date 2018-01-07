<?php 
/* 
rdMyFramework - The framework for development webapplication interface 
Copyright (C) 2006-2007 Diana Roberto 
Version Alpha 0.0.0.10
For further information visit:
http://sourceforge.net/projects/rdmyframework/
*/

ini_set ("display_errors","1");
ini_set("error_reporting", E_STRICT);
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

<form>
<?php 
$ob = clsrdFactoryClass::createObject("tagcomponent.clsTagFieldSet");
$ob->get_StyleColl()->add_simpleRule("color","red");
$ob->get_LegendObj()->set_Value("Titolo legend"); 
$ob->set_Value("Testo dentro leggend"); 

$ob2 = clone $ob; 
$ob2->get_StyleColl()->add_simpleRule("color","green");
$ob2->get_AttColl()->add_singleAttr(READONLY);
$ob2->set_Value("Testo dentro leggend clonato"); 


$ob->draw();
$ob2->draw();

$ob3 = clone $ob; 
$ob2->remove_LegendObj(); 
$ob3->get_StyleColl()->add_simpleRule("color","black");
$ob3->get_AttColl()->add_singleAttr(READONLY);
$ob3->set_Value("Testo senza leggend clonato"); 
$ob3->draw(); 

?>
</form>
</BODY>
</HTML>
