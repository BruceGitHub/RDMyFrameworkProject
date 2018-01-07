<?php
/* 
rdMyFramework - The framework for development webapplication interface 
Copyright (C) 2006-2007 Diana Roberto 
Version Alpha 0.0.0.10
For further information visit:
http://sourceforge.net/projects/rdmyframework/
*/

/**
 * rdFramework 
 * classe rdCollectionObject
 * 
 * @version 1.0.0.0
 * @package pk_util
 */
class rdCollectionObject extends rdCollectionItem
{
    function __construct() 
    { 
    	parent::__construct();
    	$this->set_mode_Replace(false);
    }
    	
    function add($p_object,$p_key=-1)
    {
     parent::add($p_object,$p_key);   
    }  
}

?>