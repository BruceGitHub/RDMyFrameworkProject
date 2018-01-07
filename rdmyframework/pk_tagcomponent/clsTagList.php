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
 * class clsTagUl 
 * gestisce il tag ul (unorder list)
 *   
 * @author roberto diana 
 * @version 1.0.0.1
 * @package pk_tagcomponent
*/
class clsrdTagUl extends clsrdElementBlock
{
protected $ob_collection;

  function __construct()
  {
    parent::__construct();
    $this->ob_collection = clsrdFactoryClass::createObject("pk_util.rdGenericContainer");
    $this->test = 'clsTagUl';

  }
  
  /*
  * clonazione oggetti 
  */    
  function __clone() 
  {
    $this->ob_collection = clone($this->ob_collection);
    
	//dbg
	//echo "<br>clone clsTagUl";
  }    
  
  function add_ListItem($p_ListItem)
  {
    if (!is_subclass_of($p_ListItem,BASECLASS))
    {   
        throw new rdExceptNoDerivBaseClass();
    }

    $this->ob_collection->add($p_ListItem);
  }
  
  function drawHeader()
  {
    $css_style = $this->get_StyleColl()->get_BuildCollection();
    $attribs = $this->get_AttColl()->get_BuildCollection();
    parent::_beforeDraw();
    echo "<ul ".$this->get_ListAttribs().">\n";
  }
  
  function drawBody()
  {
    $this->ob_collection->goFirst();
    while($this->ob_collection->isLastElement() == false )
    {
        $ob = $this->ob_collection->get_CpyElement();  
        
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
    echo "</ul>\n";
  }    
  
  function draw($p_modedraw=-1)
  {
    $this->drawHeader();
    $this->drawBody();
    $this->drawFooter();
  }
  
}

/**
 * rdFramework
 * class clsTagLI 
 * gestisce il tag li (list item)
 *   
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_tagcomponent
*/
class clsrdTagLi extends clsrdElementInline
{
  function __construct()
  {
    parent::__construct();
    $this->test = 'clsTagLi';
  }

  
  function draw()
  {
    parent::draw();
    echo "<li". $this->get_ListAttribs() .">".$this->get_value().'</li>'."\n";
  }
}



?>
