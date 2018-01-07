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
 * crea un blocco con un sfondo in modo da evere lo sfondo dinamico 
 * cioè si allunga in base al suo contenuto  
 *  
 * @author roberto diana 
 * @version 1.0.0.1
 * @package pk_customcomponent
*/ 
class rdBlockExtendBackground extends clsrdElementInLine
{
private $divHeader;
private $divBody;
private $divFooter;
private $divContainer;

  function __construct()
  {
    parent::__construct();
    $this->divContainer = clsFactoryClass::createObject("tagcomponent.div");
    $this->divContainer->get_StyleColl()->add_simpleRule("overflow","hidden");
    
    $this->divHeader = clsFactoryClass::createObject("tagcomponent.div");
    $this->divBody = clsFactoryClass::createObject("tagcomponent.div");
    $this->divFooter = clsFactoryClass::createObject("tagcomponent.div");
    
    
    $this->divContainer->add_Element($this->divHeader);
    $this->divContainer->add_Element($this->divBody);
    $this->divContainer->add_Element($this->divFooter);
    
  } 
  
  function set_divHeader($p_imagebackground,$p_height,$p_extra)
  {
    $this->divHeader->get_StyleColl()->add_functionRule("background-image:url",$p_imagebackground);
    $this->divHeader->get_StyleColl()->add_simpleRule("height",$p_height);
    $this->divHeader->get_StyleColl()->add_simpleRule(NOTAGCSS,$p_extra);
  }

  function set_divBody($p_imagebackground,$p_position,$p_backgroundcolor,$p_extra,$p_pclass)
  {
    $this->divBody->get_StyleColl()->add_functionRule("background-image:url",$p_imagebackground);
    $this->divBody->get_StyleColl()->add_simpleRule("background-position",$p_position);
    $this->divBody->get_StyleColl()->add_simpleRule("background-color",$p_backgroundcolor);
    $this->divBody->get_StyleColl()->add_simpleRule(NOTAGCSS,$p_extra);
    $this->divBody->get_AttColl()->add_simpleAttr(CSS,$p_pclass);
    
  }

  function set_divFooter($p_imagebackground,$p_height,$p_extra)
  {
    $this->divFooter->get_StyleColl()->add_functionRule("background-image:url",$p_imagebackground);
    $this->divFooter->get_StyleColl()->add_simpleRule("height",$p_height);
    $this->divFooter->get_StyleColl()->add_simpleRule(NOTAGCSS,$p_extra);

  }
  
  function draw()
  {
    $this->divContainer->draw();
  }
  
  function set_Value($p_value)
  {
    $this->divBody->set_Value($p_value);
  }
  
  function set_Width($p_width)
  {
    $this->divContainer->get_StyleColl()->add_simpleRule("width",$p_width);
  }

} 

?>
