<?
/* 
rdMyFramework - The framework for development webapplication interface 
Copyright (C) 2006-2007 Diana Roberto 
Version Alpha 0.0.0.10
For further information visit:
http://sourceforge.net/projects/rdmyframework/
*/
require_once(dirname(__FILE__) . '/interfTag.php');

DEFINE("BASECLASS","clsrdElement");
DEFINE("CSS2","class=");
DEFINE("STYLE","style=");

//
//queste costanti sono obsolete
//e verranno eliminate
//
DEFINE("NAME","name=");
DEFINE("ID","id=");
DEFINE("VALUE","value=");
DEFINE("SRC","src=");
DEFINE("BORDER","border=");
DEFINE("TYPE","type=");
DEFINE("LABEL","label=");
DEFINE("SIZE","size=");
DEFINE("RDFOR","for=");
DEFINE("ACTION","action=");
DEFINE("METHOD","method=");
DEFINE("ENCTYPE","enctype=");
DEFINE("ACCEPT-CHARSET","accept-charset=");
DEFINE("ACCEPT","accept=");
DEFINE("ALT","alt=");


//
//singoli 
//
DEFINE("READONLY","readonly");
DEFINE("SELECTED","selected");
DEFINE("DISABLED","disabled");
DEFINE("MULTIPLE","multiple ");
DEFINE("CHECKED","checked");

//
//particolari
//
DEFINE("NOTAG","notag");
DEFINE("NOTAGCSS","notagcss");
DEFINE("IS_CSSFUNC","iscssfunc");
DEFINE("NULL","");

/**
 * rdFramework
 * classe clsElement
 *  
 * @author roberto diana 
 * @version 1.0.3.2
 * @package pk_tagcomponent
*/
class clsrdElement implements irdElement
{
private    $value;
private    $ob_styleColl;
private    $ob_attColl;
private    $ob_classColl;
private    $list_attribs;
private    $tag_name; 
private    $class_name; 

public $test; 
  function __construct()
  {
    $this->test = 'clsElement';
    $this->ob_styleColl = clsrdFactoryClass::createObject("pk_util.rdCollectionStyle");
    $this->ob_attColl = clsrdFactoryClass::createObject("pk_util.rdCollectionAttr");
    $this->ob_classColl = clsrdFactoryClass::createObject("pk_util.rdCollectionClass");
  }
  
  /*
  * clonazione oggetti 
  */    
  function __clone() 
  {
    $this->ob_styleColl = clone($this->ob_styleColl);
    $this->ob_attColl = clone($this->ob_attColl);
    $this->ob_classColl = clone($this->ob_classColl);
    
    //dbg
	//echo "<br> clone tag <br>";
  }  
  
  function get_StyleColl()
  {
    return $this->ob_styleColl;
  }
  
  
  function get_AttColl()
  {
    return $this->ob_attColl;
  }
  
  function set_Name($p_name)
  {
    $this->get_AttColl()->add_simpleAttr(NAME,$p_name);
  }  
  
  function set_Id($p_id)
  {
    $this->get_AttColl()->add_simpleAttr(ID,$p_id);
  }
  
  function set_Value($p_value)
  {
    $this->value = $p_value;
  }
  
  function set_ClassName($p_ClassName)
  {
    $this->class_name = $p_ClassName; 
  }

  function get_ClassName()
  {
    return $this->class_name; 
  }

  
  function get_Value()
  {
  	
  	if (is_object($this->value) && is_subclass_of($this->value,BASECLASS))
  	{
      ob_start();
      $this->value->draw();  
      $out = ob_get_contents();
      ob_end_clean(); 
      return $out; 
    }
    else 
    {
      return $this->value; 
    } 
  }
  
  function get_ListAttribs()
  {
    return $this->list_attribs;
  } 
  
  function get_ClassColl()
  {
		return $this->ob_classColl;
	}
  
  /*
  * recupera le tre collezzioni canoniche 
  * style,class,attributi
  * e le compatta in una sola stringa 
  */
  protected function _beforeDraw()
  {
      $style = $this->get_StyleColl()->get_BuildCollection();
      $attribs = $this->get_AttColl()->get_BuildCollection();
      $class = $this->get_ClassColl()->get_BuildCollection();

      $this->list_attribs = ' '.$attribs .' '.$class.' '.$style;
  }
  
  public function draw()
  {
      $this->_beforeDraw();
  }
  
  public function get_Source()
  {
      ob_start();
      $this->draw(); 
      $out = ob_get_contents();
      ob_end_clean(); 
      
      return $out; 
  }
  
  
}

/**
 * rdFramework
 * classe clsrdElementInLine
 * classe elemento in line (br,input,etc.)
 *
 * @author roberto diana 
 * @version 1.0.0.2
 * @package pk_tagcomponent
*/
class clsrdElementInLine extends clsrdElement
{
  public function draw()
  {
      parent::draw();
      echo $this->get_Value();
  }
}

/**
 * rdFramework
 * classe clsrdElementBlock
 * elemento block  (div,span,etc)
 *  
 * @author roberto diana 
 * @version 1.0.0.2
 * @package pk_tagcomponent
*/
abstract class clsrdElementBlock extends clsrdElement
{
  function __construct($p_tagname="")
  {
    $this->tagname = $p_tagname; 
    parent::__construct();
  } 
  
    
  function drawHeader()
  {
    parent::_beforeDraw();
    $attribs = $this->get_ListAttribs();
    echo "<$this->tagname ".$attribs.">\n";
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
    echo "\n</$this->tagname>\n";
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
 * classe clsrdBaseControlInLine
 * base controlli inline 
 *  
 * @author roberto diana 
 * @version 1.0.0.2
 * @package pk_tagcomponent
*/
abstract class clsrdBaseControlInLine extends clsrdElementInLine
{
}

?>