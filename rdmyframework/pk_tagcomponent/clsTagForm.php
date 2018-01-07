<?
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
 * class clsTagForm
 * gestisce il tag label 
 * 
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_tagcomponent
 */ 
class clsrdTagForm extends clsrdElementBlock
{
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
	//echo "<br>clone form";
  }   
  

  function get_ElementColl()
  {
    return $this->ob_collection;
  }

  function add_Element($p_object,$p_key=-1)
  {
    if (!is_subclass_of($p_object,BASECLASS))
    {   
        throw new rdExceptNoDerivBaseClass();
    }
    
    $this->ob_collection->add($p_object,$p_key);
  }
  
  
  function drawHeader()
  {
    parent::_beforeDraw();
    $attribs = $this->get_ListAttribs();
    echo "<FORM ".$attribs.">\n";
  }
  
  function drawBody()
  {
    $output = ""; 
    if ($this->get_value() != "")
    {
        ob_start();
        echo '<P>'.$this->get_value().'</P>';
        $output =ob_get_contents();   
        ob_end_clean();          
    }
  
    $this->ob_collection->goFirst();
    while($this->ob_collection->isLastElement() == false )
    {
        $ob = $this->ob_collection->get_CpyElement();  
		$ob = $ob->get_Object();
        
        ob_start();
        $ob->draw();
        $output .=ob_get_contents();   
        ob_end_clean();          
        
        $this->ob_collection->goNext();
    }
	echo $output; 
  }
  
  function drawFooter()
  {
    echo "</FORM>";
  }    
  
  function draw()
  {
    $this->drawHeader();
	$this->drawBody();
	$this->drawFooter();	
  }
  
}
?>