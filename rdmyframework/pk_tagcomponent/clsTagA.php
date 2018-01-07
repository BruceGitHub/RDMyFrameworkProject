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
 * class clsrdTagA
 * gestisce il tag a  
 * 
 * @author roberto diana 
 * @version 1.0.1.0
 * @package pk_tagcomponent
 */ 
class clsrdTagA extends clsrdElementBlock
{

  function __construct()
  {
    parent::__construct('A');
  }
  
  /*
  function drawHeader()
  {
    parent::_beforeDraw();
    $attribs = $this->get_ListAttribs();
    echo "<A ".$attribs.">\n";
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
    echo "</A>";
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
