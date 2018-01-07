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
//creo un div
$obDiv = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");

//imposto gli stile (tutti i parametri style html ) 
$obDiv ->get_StyleColl()->add_simpleRule("color","red");

//imposto lo sfondo 
$obDiv ->get_StyleColl()->add_functionRule("background:url","'sfondo.jpg'");

//creo una lista 
$ListaProdotti = clsrdFactoryClass::createObject("tagcomponent.clsTagUl");
$item = clsrdFactoryClass::createObject("tagcomponent.clsTagLi");
$item->set_Value("Item uno");
$item->get_StyleColl()->add_simpleRule("color","red");

//clone un elemento 
$item2 = clone $item;
$item2->set_Value("Item due");

//gli aggiungo alla lista 
$ListaProdotti->add_ListItem($item);
$ListaProdotti->add_ListItem($item2);

//aggiungo la lista al div 
$obDiv->add_Element($ListaProdotti);

//mostro il tutto 
$obDiv->draw();

echo $obDiv->get_Source();
	
?>
</DIV>


</BODY>
</HTML>
