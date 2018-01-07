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
 * classe clsrdTagDiv
 * gestisce il tag div
 *   
 * @author roberto diana 
 * @version 1.0.1.0
 * @package pk_tagcomponent
 */ 
class clsrdTagDiv extends clsrdElementBlock
{
private $open = -1;
protected $ob_collection;


  function __construct()
  {
    parent::__construct();
    $this->ob_collection = clsrdFactoryClass::createObject("pk_util.rdCollectionObject");
  } 
  
  /*
  * clonazione oggetti 
  */    
  function __clone() 
  {
    parent::__clone();
    $this->ob_collection = clone $this->ob_collection;
    
    //dbg
	//echo "<br>clone div";
  }   

  function get_ElementColl()
  {
    return $this->ob_collection;
  }
  
  function add_Element($p_object,$p_key=-1)
  { 
  
    if (is_string($p_object))
    {
      $p_el = clsFactoryClass::createObject("tagcomponent.clsrdElementInLine");
      $p_el->set_Value($p_object);
      $p_object = $p_el;
      unset($p_el);
    }
    
    if (!is_subclass_of($p_object,BASECLASS))
    {   
        throw new rdExceptNoDerivBaseClass();
    }
    
    $this->ob_collection->add($p_object,$p_key);
  }
  
  /**
  * rdFramework
  * disegna l'apertura del blocco
  *    
  * @author roberto diana 
  * @version 1.0.0.0
  * @package pk_tagcomponent
  */ 
  function drawHeader()
  {
      $this->_beforeDraw();
      $miscColl = $this->get_ListAttribs();
      echo "<DIV $miscColl>\n";

  }

  /**
  * rdFramework
  * disegna il corpo del blocco
  *    
  * @author roberto diana 
  * @version 1.0.0.0
  * @package pk_tagcomponent
  */ 
  function drawBody()
  {
	ob_start();
		echo $this->get_value();
		$output .=ob_get_contents();   
	ob_end_clean();          

    $this->ob_collection->goFirst();
    while($this->ob_collection->isLastElement() == false )
    {
        $ob = $this->ob_collection->get_CpyElement();  
        //$kiave = $ob->get_Key();
		$ob = $ob->get_Object();
        
        ob_start();
        $ob->draw();
        $output .=ob_get_contents();   
        ob_end_clean();          
        
        $this->ob_collection->goNext();
    }
	echo $output; 
  }

  /**
  * rdFramework
  * disegna la chiusura del blocco
  *    
  * @author roberto diana 
  * @version 1.0.0.0
  * @package pk_tagcomponent
  */ 
  function drawFooter()
  {
	echo "\n</DIV>\n";
  } 


  function draw()
  {
    $this->drawHeader();
	$this->drawBody();
	$this->drawFooter();	
  }
}  

?>