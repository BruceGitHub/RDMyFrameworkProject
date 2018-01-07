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
* importazione del core framework 
* @version 1.0.1.0
*/

/*
check-version 
*/
$php_ver = phpversion(); 
$php_ver = str_replace('.',"",$php_ver); 
if ($php_ver < "505") die("Versione del php installata non compatibile con il codice del framework, è richiesta versione 5.0.5"); 

/*
sempre presenti 
*/
require_once(dirname(__FILE__)."/pk_exception/import_exception.php");
require_once(dirname(__FILE__)."/pk_setting/import_setting.php");


/*
verifica impostazioni 
*/
if (!isset($rdmfSettingTagRequireComponent))
{
    require_once(dirname(__FILE__)."/pk_tagcomponent/import_tagcomponent.php");
}


/*
rilascio risorse non utili 
*/
unset($php_ver); 
unset($rdmfSettingTagRequireComponent); 
?>
