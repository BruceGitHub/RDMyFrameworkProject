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
class rdBlockCenterImage extends clsrdElement
{
private $divContainer;
private $imgImage;

  function __construct()
  {
    parent::__construct();
    $this->divContainer = clsFactoryClass::createObject("tagcomponent.div");
    $this->imgImage = clsFactoryClass::createObject("tagcomponent.clsTagImg");
    
    //
    //default value 
    //
    $this->divContainer->get_StyleColl()->add_simpleRule("overflow","hidden");    
    
  } 
  
  function getContainer()
  {
    return $this->divContainer;
  }
  
  function getImage()
  {
    return $this->imgImage; 
  }
  
  function _beforeDraw()
  {
    //
    //retriev dim of image and cal dim margin 
    //margin-top for center image
    //
    $valfotoh = (int)$this->getImage()->get_StyleColl()->get_ItemByName('height');
    $valblockh =  (int)$this->getContainer()->get_StyleColl()->get_ItemByName('height');
    $margin = $valblockh - $valfotoh;
    $margin = $margin / 2; 
    $this->getImage()->get_StyleColl()->add_simpleRule("margin-top",$margin.'px');
    $this->getContainer()->get_StyleColl()->add_simpleRule("text-align",'center');
    $this->getContainer()->add_Element($this->imgImage);
  }
  
  function draw()
  {
    parent::draw();
    $this->getContainer()->draw();
    $this->getContainer()->emptyCollection();
  }
} 

?>
