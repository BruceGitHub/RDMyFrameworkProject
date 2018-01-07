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
 * class clsTagFieldSet
 * gestisce il tag fieldset 
 * 
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_tagcomponent
 */ 
class clsrdTagFieldSet extends clsrdElementBlock
{
private $ob_leggend; 

  function __construct()
  {
    parent::__construct();
    $this->ob_leggend = clsrdFactoryClass::createObject("tagcomponent.clsTagLegend");
  }
  
  function get_LegendObj()
  {
    return $this->ob_leggend; 
  }
  
  function remove_LegendObj()
  {
    $this->get_LegendObj()->set_Value("");   
  }
  
  function drawHeader()
  {
    parent::_beforeDraw();
    $attribs = $this->get_ListAttribs();
    echo "<FIELDSET ".$attribs.">\n";
  }
  
  function drawBody()
  {
        ob_start();
        if ($this->get_LegendObj()->get_Value() != "") 
            $this->get_LegendObj()->draw(); 
        echo $this->get_Value();
        $output =ob_get_contents();   
        ob_end_clean();          
        
	echo $output; 
  }
  
  function drawFooter()
  {
    echo "</FIELDSET>";
  }    
  
  function draw()
  {
    $this->drawHeader();
	$this->drawBody();
	$this->drawFooter();	
  }
  
}


/**
 * rdFramework
 * class clsTagLegend
 * gestisce il tag fieldset 
 * 
 * @author roberto diana 
 * @version 1.0.2.0
 * @package pk_tagcomponent
 */ 
class clsrdTagLegend extends clsrdElementBlock
{
  function __construct()
  {
    parent::__construct('LEGEND');
  }
  
  /*
  function drawHeader()
  {
    parent::_beforeDraw();
    $attribs = $this->get_ListAttribs();
    echo "<LEGEND ".$attribs.">\n";
  }
  
  function drawBody()
  {
        ob_start();
        echo $this->get_Value();
        $output =ob_get_contents();   
        ob_end_clean();          
        
	echo $output; 
  }
  
  function drawFooter()
  {
    echo "</LEGEND>";
  }    
  
  function draw()
  {
    $this->drawHeader();
	$this->drawBody();
	$this->drawFooter();	
  }
  */
}

?>
