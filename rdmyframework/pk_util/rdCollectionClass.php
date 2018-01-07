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
 * classe rdCollectionClass
 * 
 * @version 1.0.0.1
 * @package pk_util
 */
class rdCollectionClass extends rdCollectionItem
{
	function __construct() 
  { 
			parent::__construct();
			
  }
	
	function get_BuildCollection()
	{
    $this->goFirst();
	$out = "";
	$class = "";
    while($this->isLastElement() == false )
    {
    	$ob = $this->get_CpyElement();
    	$ob = $ob->get_Object(); 
    	$out .=" $ob ";
    	
			$this->goNext();
    }

    if ($out) $class = "class='$out'";
		return $class;
	} 
	
	
  
}

