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
*   
* @version 1.0.0.0
* @package pk_gd2
*/

require_once(dirname(__FILE__)."/gd2_exception.php");

//
//verifica che le gd2 siano presenti
//
if (!function_exists ("imagecreatetruecolor")) 
{ 
    throw new rdExceptNoGd2Installed(EX_NOGD2INSTALLED);
} 


?>