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

<?php 

$ob = clsrdFactoryClass::createObject("tagcomponent.clsTagLabel");
$ob->get_StyleColl()->add_simpleRule("color","red");
$ob->set_Value("Ciao");

$ob2 = clone $ob; 
$ob->get_StyleColl()->add_simpleRule("color","green");
$ob->get_AttColl()->add_simpleAttr(RDFOR,'pippo');


$ob2->draw();
$ob->draw();


?>
</BODY>
</HTML>
