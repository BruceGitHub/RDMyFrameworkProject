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
 * class clsTagLabel
 * gestisce il tag label 
 * 
 * @author roberto diana 
 * @version 1.0.2.0
 * @package pk_tagcomponent
 */ 
class clsrdTagLabel extends clsrdElementBlock
{

  function __construct()
  {
    parent::__construct('LABEL');
  }
      
  /*
  function drawHeader()
  {
    parent::_beforeDraw();
    $attribs = $this->get_ListAttribs();
    echo "<LABEL ".$attribs.">\n";
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
    echo "</LABEL>";
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
