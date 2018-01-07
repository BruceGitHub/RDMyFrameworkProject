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


INCLUDE_ONCE("../rdmyframework/import_corerdmyframework.php");
INCLUDE_ONCE("../rdmyframework/pk_tagcomponent/import_tagcomponent.php");

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

//creo un div
$obDiv = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");
$obDiv ->get_StyleColl()->add_simpleRule("color","red");
$obDiv ->get_StyleColl()->add_functionRule("background:url","fotina_piscina.jpg");
$obDiv ->get_StyleColl()->add_simpleRule("background-repeat","no-repeat");
$obDiv ->get_StyleColl()->add_simpleRule("text-align","center");
$obDiv ->get_StyleColl()->add_simpleRule("width","100px");
$obDiv ->get_StyleColl()->add_simpleRule("height","100px");
$obDiv->set_Value("Lorem impsum");

$obDiv2 = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");
$obDiv2 = clone $obDiv;
$obDiv->add_Element($obDiv2);
$obDiv->draw();

echo $obDiv->get_Source();

	
?>
</DIV>


</BODY>
</HTML>
