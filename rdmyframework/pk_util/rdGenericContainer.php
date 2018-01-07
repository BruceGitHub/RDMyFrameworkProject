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
* classe rdGenericContainer
*  
* per gestire le collezzioni di oggetti 
* 
* @version 1.0.0.1
* @package pk_util
*/
class rdGenericContainer
{
protected $lst = array();  
private $cursor; 


function __construct() 
{
$this->cursor = 0; 
}

/*
* clonazione oggetti 
*/

function __clone() 
{
    for ($i=0; $i<count($this->lst);$i++) 
    {
     //echo get_class($this->lst[$i]); 
     $this->lst[$i] = clone($this->lst[$i]);   
    }
    //dbg
    //echo "<br>clone rdGenericContainer <br>";
}

function add($pObj) 
{
	array_push($this->lst,$pObj);
	
}

/*
* non usata.
function delete_element($p_obj)
{
   $lst = clone($this->lst);
   
   for ($i=0; $i<count($lst); $i++)
   {
  if ($p_obj == $lst[$i]) break;
 }
 unset($lst);
 
 if ($i >=0)
 unset($this->lst[$i]);
 else
 return false;
}
*/

function delete_ElementByPos($p_pos)
{
array_splice($this->lst,$p_pos,1);
}

function delete_AllElement()
{
array_splice($this->lst,0,count($this->lst));
}

function goFirst() 
{
	reset($this->lst);
	$this->cursor = 0;
}

function goNext() 
{
	next($this->lst);
	$this->cursor++;
}

function goPrev() 
{
	prev($this->lst);
	$this->cursor--;
}

function get_ElementByPos($pos)
{
   return $this->lst[$pos];
}

function &get_RefElement()
{
 return  $this->lst[$this->cursor];
}

function get_CpyElement() 
{
	return $this->lst[$this->cursor];
}

function get_NumElement() 
{
	return count($this->lst);
}

function isLastElement()
{
  return (count($this->lst) == $this->cursor);
}

};
?>
