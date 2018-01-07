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
 * classe rdBlockWithLabel 
 * crea un blocco e permette di associarli un titolo inoltre il titolo può 
 * contenere una immagine   
 *  
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_customcomponent
*/ 
class rdBlockWithLabel extends clsrdElementInLine
{

  function __construct()
  {
    parent::__construct();
    $this->divLabel = clsFactoryClass::createObject("tagcomponent.div");
    $this->divBlock = clsFactoryClass::createObject("tagcomponent.div");
    $this->divContainer = clsFactoryClass::createObject("tagcomponent.div");
    $this->divFooter = clsFactoryClass::createObject("tagcomponent.div");
  } 
  
  function getLabel()
  {
    return $this->divLabel; 
  }  
  
  function getBlock()
  {
    return $this->divBlock;
  }
  
  function getContainer()
  {
    return $this->divContainer;
  }
  
  function getFooter()
  {
    return $this->divFooter;
  }

  function set_Value($p_value)
  {
    assertMsg("Method non supported");
  }   
  
  function _beforeDraw()
  {
    $this->getContainer()->add_Element($this->divLabel);
    $this->getContainer()->add_Element($this->divBlock);
    $this->getContainer()->add_Element($this->divFooter);
  }
  
  function draw()
  {
    parent::draw();
    $this->getContainer()->draw();
    $this->getContainer()->emptyCollection();
  }
} 

?>
