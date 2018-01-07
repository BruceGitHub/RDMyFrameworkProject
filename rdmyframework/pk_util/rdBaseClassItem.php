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
 * classe rdBaseClassItem
 *
 * base per le collezioni di elementi 
 *   
 * @version 1.0.0.1
 * @package pk_util
 */
class rdBaseClassItem
{
private $obj; 
private $key;

    function __construct() 
    {
    }

    function __clone() 
    {
        if (is_object($this->obj))
        {
        $this->obj = clone($this->obj); 
        
        //dbg
        //echo "<br>clone rdBaseClassItem  <br>";
        }
    }
  
  
	function set_Object($p_object)
	{
		$this->obj = $p_object; 
	}
	
	function get_Object()
	{
		return $this->obj;
	}

	function set_Key($p_key)
	{
		$this->key = $p_key; 
	}
	
	function get_Key()
	{
		return $this->key;
	}
		
	
};
?>
