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
* classe rdCollectionItem
* 
* @version 1.0.1.0
* @package pk_util
*/
class rdCollectionItem  
{
protected $lst;
private $breplace;

function __construct() 
{ 
$this->lst = clsrdFactoryClass::createObject("pk_util.rdGenericContainer");
$this->set_mode_Replace(true);
}

/*
* clonazione oggetti 
*/    
function __clone() 
{
$this->lst = clone($this->lst);

//dbg
//echo "<br>clone rdCollectionItem";
}   

function get_Collection()
{
	return $this->lst;
}

function set_Collection($p_CollStyle)
{

	$this->lst = $p_CollStyle->get_Collection();
}  

function set_mode_Replace($p_active)
{
$this->breplace = $p_active;
}

function get_mode_Replace()
{
return $this->breplace;
}  

function goFirst()
{
	$this->lst->goFirst();
}

function goNext()
{
	$this->lst->goNext();
}	

function isLastElement()
{
	return $this->lst->isLastElement();
}

function get_CpyElement()
{
	return $this->lst->get_CpyElement();
}

function get_Object()
{
	return $this->lst->get_Object();
}	

function add($p_value,$p_key=-1)
{
    if ($this->get_mode_Replace() == true) 
    $this->del_ItemByKey($p_key);

	$Item = clsrdFactoryClass::createObject("pk_util.rdBaseClassItem");
	$Item->set_Key($p_key);
	$Item->set_Object($p_value);
	$this->lst->add($Item);
}

function del_ItemByKey($p_key)
{
$this->lst->goFirst();
$i=0; 
while($this->lst->isLastElement() == false )
{
    $TmpItem = $this->lst->get_CpyElement();  
    $TmpItemKey = $TmpItem->get_Key();
			       
    if ($TmpItemKey === $p_key)
			{
				unset($TmpItemKey);
				$this->lst->delete_ElementByPos($i);
				return true;  
			} 
			$i++;
    $this->lst->goNext();
}			
}

function del_AllElement()
{
    $this->lst->delete_AllElement();    
}

function get_ItemByKey($p_key)
{
$this->lst->goFirst();
while($this->lst->isLastElement() == false )
{
    $TmpItem = $this->lst->get_CpyElement();  
    $TmpItemKey = $TmpItem->get_Key();
			       
    if ($TmpItemKey === $p_key)
			{
				unset($TmpItemKey);
				$ItemObject = $TmpItem->get_Object(); 
				return $ItemObject;  
			} 
    $this->lst->goNext();
}			
}

function get_NumElement()
{
  return $this->lst->get_NumElement();	
}


	
};
?>
