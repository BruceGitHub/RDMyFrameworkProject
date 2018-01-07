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
* @package pk_layout
*/

//registrazione layout 
clsrdFactoryClass::register("rdLayoutTwoCol","pk_layout.rdLayoutTwoCol");  
clsrdFactoryClass::register("rdLayoutTreeCol","pk_layout.rdLayoutTreeCol");  


require("rdLayout.php");
require("rdLayoutTwoCol.php");
require("rdLayoutTreeCol.php");



?>
