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

INCLUDE_ONCE("../rdmyframework/pk_setting/import_setting.php");
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
$ob = clsrdFactoryClass::createObject("tagcomponent.clsTagInput");
$ob->get_StyleColl()->add_simpleRule("color","red");
$ob->get_StyleColl()->add_functionRule("background:url","fotina_piscina.jpg");
$ob->get_StyleColl()->add_simpleRule("text-align","center");
$ob->get_StyleColl()->add_simpleRule("width","200px");
$ob->get_StyleColl()->add_simpleRule("height","17px");
$ob->set_Value("Lorem impsum");
$ob->set_Type("text");
$ob->get_AttColl()->add_simpleAttr(ID,"tagimput");
$ob->get_AttColl()->add_simpleAttr(NAME,"tagimput");
$ob->set_Value('xx');
echo "text:"; $ob->draw();

echo "<br><br>";
$ob->set_Type("file");
echo "file:"; $ob->draw();

echo "<br><br>";
$ob->set_Type("password");
echo "password:"; $ob->draw();

echo "<br><br>";
$ob->set_Type("checkbox");
echo "checkbox:"; $ob->draw();
/*
echo ' '.$ob->get_attColl()->get_ItemByKey('value'); 

$ob->get_attColl()->add_singleAttr('checked');
echo ' '.$ob->get_attColl()->get_ItemByKey('checked'); 
$ob->get_attColl()->del_ItemByKey('checked');
echo ' '.$ob->get_attColl()->get_ItemByKey('checked'); 


echo '<pre>';
print_r($ob->get_attColl());
echo '</pre>';
*/

echo "<br><br>";
$ob->set_Type("radio");
echo "radio:"; $ob->draw();

echo "<pre>";
echo $ob->get_Source();
echo "</pre>";		
?>
</DIV>


</BODY>
</HTML>
