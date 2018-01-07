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
 * classe rdLayoutTwoCol
 * classe base per gestire i layout
 *  
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_layout
*/ 
class rdLayoutTwoCol extends rdLayout
{
  function __construct()
  {
    parent::__construct();
  } 
  
  function registerSection($p_container,
                           $p_header,
                           $p_content,
                           $p_sideone,
                           $p_footer)
  {
    $this->nameContainer = $p_container; 
    
    
    $this->divContainer = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");		
    $this->setNameSection($this->nameContainer,$this->divContainer); 

    $this->divSideOne = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");		
    $this->addSection($p_sideone,$this->divSideOne); 
    
    $this->divHeader = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");		
    $this->addSection($p_header,$this->divHeader); 
        
    $this->divFooter = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");		
    $this->addSection($p_footer,$this->divFooter);   

    $this->divContent = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");		
    $this->addSection($p_content,$this->divContent);   
      
    
    $this->divContainer->add_Element($this->divHeader);
    $this->divContainer->add_Element($this->divSideOne);
    $this->divContainer->add_Element($this->divContent);
    $this->divContainer->add_Element($this->divFooter);
    
    $this->addSection($this->nameContainer,$this->divContainer); 
  }
} 

?>
