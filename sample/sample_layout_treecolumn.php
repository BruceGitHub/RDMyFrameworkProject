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


INCLUDE_ONCE("../rdmyframework/import_corerdmyframework.php");
INCLUDE_ONCE("../rdmyframework/pk_customcomponent/import_customcomponent.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<TITLE>Template</TITLE>
<link href="css_layout_treecol.css" rel="STYLESHEET" type="TEXT/CSS" />
</HEAD>
<BODY>
<?php 

$ob = clsrdFactoryClass::createObject("pk_layout.rdLayoutTreeCol");
$ob->registerSection('container','header','content','sidebar','sidebar2','footer'); 
$ob->get_SectionByName('header')->set_Value("Header pagina");
$ob->get_SectionByName('content')->set_Value("Colonna centrale");
$ob->get_SectionByName('sidebar')->set_Value("Colonna sx");
$ob->get_SectionByName('sidebar2')->set_Value("Colonna dx");
$ob->get_SectionByName('footer')->set_Value("footer");
$ob->draw();

echo "<br>"; 
$ob2 = clone $ob; 
$ob2->get_SectionByName('header')->get_StyleColl()->add_simpleRule("color","black"); 
$ob2->get_SectionByName('content')->get_StyleColl()->add_simpleRule("color","black"); 
$ob2->get_SectionByName('footer')->get_StyleColl()->add_simpleRule("color","black"); 
$ob2->get_SectionByName('header')->set_Value("clonato Header pagina");
$ob2->get_SectionByName('content')->set_Value("clonato Colonna centrale");
$ob2->get_SectionByName('sidebar')->set_Value("clonato Colonna sx");
$ob2->get_SectionByName('sidebar2')->set_Value("clonato Colonna dx");
$ob2->get_SectionByName('footer')->set_Value("clonato footer");

$ob2->draw();

?>
</BODY>
</HTML>
