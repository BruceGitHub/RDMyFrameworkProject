<?php
/* 
rdMyFramework - The framework for development webapplication interface 
Copyright (C) 2006-2007 Diana Roberto 
Version Alpha 0.0.0.10
For further information visit:
http://sourceforge.net/projects/rdmyframework/
*/

 
require_once(dirname(__FILE__) . '/clsTag.php');

/**
 * rdFramework
 * classe clsTagInput
 * gestisce il tag input
 *   
 * @author roberto diana 
 * @version 1.0.0.3
 * @package pk_tagcomponent
 */ 
class clsrdTagInput extends clsrdElementInLine
{
private $typeTag; 
private $addExtraInfo;

  function __construct()
  {
    parent::__construct();
  } 
  
  
  /*
  * usata per aggiungere informazioni aggiuntive 
  *
  * @author roberto diana 
  * @version 1.0.0.0
  */ 
  protected function set_ExtraInfo($p_extrainfo)
  {
    $this->addExtraInfo = $p_extrainfo;
    $this->get_AttColl()->add_simpleAttr(NULL,$this->addExtraInfo);
  }
  
  function set_Type($p_type)
  {
    if (
          $p_type == "text"
          ||
          $p_type == "file"
          ||
          $p_type == "password"
          ||
          $p_type == "checkbox"
          ||
          $p_type == "radio"
          ||
          $p_type == "submit"
          ||
          $p_type == "reset"
       ) 
      {
        $this->typeTag = $p_type;
        $this->get_AttColl()->add_simpleAttr(TYPE,$p_type);
      }
      else
      assertMsg("clsTagInput::set_Type, p_type= $p_type. valore errato!");
  }
  
  function draw()
  {
  	parent::draw();
    echo "<input ".$this->get_ListAttribs().">";
  }
  
  function set_Value($p_value)
  {
    $this->get_AttColl()->add_simpleAttr('value',$p_value);
  }
 
} 


/**
 * rdFramework
 * classe clsTagCheckBox 
 * gestisce il tag checkbox 
 *  
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_tagcomponent
*/ 
class clsrdTagCheckBox extends clsrdTagInput
{
private $typeTag; 

  function __construct()
  {
    parent::__construct();
    $this->set_Type("checkbox");
  } 
  
  
} 

/**
 * rdFramework
 * classe clsTagRadio 
 * gestisce il tag radio group
 *    
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_tagcomponent
*/ 
class clsrdTagRadio extends clsrdTagInput
{
private $typeTag; 
private $bChecked;

  function __construct()
  {
    parent::__construct();
    $this->set_Type("radio");
  } 
  
  function set_Checked($p_check)
  {
       $this->bChecked = ($p_check == TRUE) ? "checked" : "" ;
  }
  
  function _beforeDraw()
  {
    $this->set_ExtraInfo($this->bChecked);
  }
  
  function draw()
  {
      $this->_beforeDraw();
      parent::draw();
  }
} 

?>
