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
//ini_set("error_reporting", E_ALL);


INCLUDE_ONCE("../rdmyframework/import_corerdmyframework.php");
INCLUDE_ONCE("../rdmyframework/pk_customcomponent/import_customcomponent.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<TITLE>Template</TITLE>
<link href="css_layout.css" rel="STYLESHEET" type="TEXT/CSS" />
</HEAD>
<BODY>

<DIV style="clear:both"></DIV>                                                       

<?php 

$ob = clsrdFactoryClass::createObject("pk_layout.rdLayoutTwoCol");
$ob->registerSection('container','header','sidebar2','sidebar','footer'); 
$ob->get_SectionByName('header')->set_Value("Header pagina");
$ob->get_SectionByName('sidebar2')->set_Value("Colonna centrale");
$ob->get_SectionByName('sidebar')->set_Value("Colonna sx");
$ob->get_SectionByName('footer')->set_Value("footer");
$ob->draw();
?>
</BODY>
</HTML>
