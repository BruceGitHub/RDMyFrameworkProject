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
 * classe rdLayout 
 * classe base per gestire i layout
 *  
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_layout
*/ 
class rdLayout extends clsrdElement
{
private $section = array(); 
protected $nameContainer; 

  function __construct()
  {
    parent::__construct();
  } 
  
  /*
  registra le sezioni nell'array
  */
  protected function registerSection()
  {
		
  }
  
  protected function setNameSection($p_name,$p_section)
  {
    $p_section->get_AttColl()->add_simpleAttr(NAME,$p_name);
    $p_section->get_AttColl()->add_simpleAttr(ID,$p_name);   
  }
  
  protected function addSection($p_name,$p_section)
  {
    $this->setNameSection($p_name,$p_section);  
    $this->section[$p_name] = $p_section; 
  }
  
  function get_SectionByName($p_name)
  {
		return $this->section[$p_name]; 
  }  

  function draw()
  {
  parent::_beforeDraw();
  $ob = $this->section[$this->nameContainer];
  $ob->draw();
  }
} 

?>
