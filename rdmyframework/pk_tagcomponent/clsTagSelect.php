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
 * class clsTagOption
 * gestisce il tag option 
 * 
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_tagcomponent
 */ 
class clsrdTagOption extends clsrdElement
{
private $label;

  function __construct()
  {
    parent::__construct();
  } 
  
  function set_Selected($p_sel)
  {
    if ($p_sel==true)
    {
        $this->get_AttColl()->add_simpleAttr(SELECTED,SELECTED);
    }
  }
  
  
  function set_Disable($p_dis)
  {
    if ($p_dis==true)
    $this->get_AttColl()->add_simpleAttr(DISABLED,DISABLED);
  }    
  
  function set_Label($p_label)
  {
    $this->get_AttColl()->add_simpleAttr(LABEL,$p_label);
  }
  
  function set_Value($VALUE)
  {
    $this->get_AttColl()->add_simpleAttr(VALUE,$VALUE);  
  }

  function set_Text($p_text)
  {
    $this->value = $p_text;
  }  


  
  function draw()
  {
    parent::_beforeDraw();
    $attribs = $this->get_ListAttribs();
  
    echo "<option ".$this->get_ListAttribs().">$this->value</option>\n";
  }
}


/**
 * rdFramework
 * gestisce il tag OptionGroup 
 *
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_tagcomponent
 */ 
class clsrdTagOptionGroup extends clsrdElement
{
private $disable;
private $label;
private $text;
private $open;

  function __construct()
  {
    parent::__construct();
  } 
  
  function set_Disable($p_dis)
  {
    if ($p_dis==true)
    $this->get_AttColl()->add_simpleAttr(DISABLED,DISABLED);
  }  
  
  function set_Label($p_label)
  {
    $this->get_AttColl()->add_simpleAttr(LABEL,$p_label);
  }
  
  function set_Text($p_text)
  {
    $this->value = $p_text;
  }  
  
  function set_Open($p_open)
  {
    $this->open = $p_open;
  } 
  
    
  function draw()
  {
    parent::_beforeDraw();
    $attribs = $this->get_ListAttribs();  
    if ($this->open == true)
    echo "<OPTGROUP $attribs >\n";
    else
    echo "</OPTGROUP>\n";
  }
 
}



/**
 * rdFramework
 * class clsTagSelect 
 * gestisce il tag select 
 *   
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_tagcomponent
*/
class clsrdTagSelect extends clsrdElementBlock
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
    $this->ob_collection = clone($this->ob_collection);
    
	//dbg
	//echo "<br>clone clsTagSelect";
  }    
  
  function get_ElementColl()
  {
    return $this->ob_collection;
  }
  
  function add_OptionParam($p_sel,$p_dis,$p_label,$p_value,$p_text)
  {
    $temp = clsrdFactoryClass::createObject("tagcomponent.clsTagSelect.clsTagOption");
    $temp->set_Selected($p_sel);
    $temp->set_Disable($p_dis);
    $temp->set_Label($p_label);
    $temp->set_Value($p_value);
    $temp->set_Text($p_text);    
    
    $this->ob_collection->add($temp);
  }
  
  function add_OptionObject($p_object)
  {
    $this->ob_collection->add($temp); 
  }
  
  function add_OptionGroupParam($p_dis,$p_label,$p_text)
  {
    $temp = clsrdFactoryClass::createObject("tagcomponent.clsTagSelect.clsTagOptionGroup");
    $temp = new clsTagOptionGroup();
    $temp->set_Disable($p_dis);
    $temp->set_Label($p_label);
    $temp->set_Text($p_text);
    $temp->set_Open(true);
    $this->ob_collection->add($temp);
  }
  
  function add_OptionGroupObject($p_object)
  {
    $this->ob_collection->add($p_object); 
  }  
  
  function close_OptionGroup()
  {
    $temp = clsrdFactoryClass::createObject("tagcomponent.clsTagSelect.clsTagOptionGroup"); 
    $temp->set_Open(false);
    $this->ob_collection->add($temp);
  }
  
  function get_OptionsActive()
  {
    $items_active = clsrdFactoryClass::createObject("pk_util.rdCollectionObject");
    $this->ob_collection->goFirst();
    while($this->ob_collection->isLastElement() == false )
    {
        $ob = $this->ob_collection->get_CpyElement();  
        $ob = $ob->get_Object();
        if  ($ob->get_AttColl()->get_ItemByKey(SELECTED)==SELECTED)
		{
		  $items_active->add($ob); 
        }
        
        $this->ob_collection->goNext();
    }
    return $items_active; 
  }
  
  function get_OptionsByVal($p_val)
  {
    $items_active = clsrdFactoryClass::createObject("pk_util.rdCollectionObject");
    $this->ob_collection->goFirst();
    while($this->ob_collection->isLastElement() == false )
    {
        $ob = $this->ob_collection->get_CpyElement();  
        $ob = $ob->get_Object();
        if  ($ob->get_AttColl()->get_ItemByKey(VALUE)==$p_val)
		{
		  $items_active->add($ob); 
        }
        
        $this->ob_collection->goNext();
    }
    return $items_active; 
  }  
  
  function drawHeader()
  {
    parent::_beforeDraw();
    $attribs = $this->get_ListAttribs();
    echo "<SELECT ".$attribs.">\n";
  }
  
  function drawBody()
  {
    $this->ob_collection->goFirst();
    while($this->ob_collection->isLastElement() == false )
    {
        $ob = $this->ob_collection->get_CpyElement();  
        //$kiave = $ob->get_Key();
		$ob = $ob->get_Object();
        
        ob_start();
        echo $this->get_Value();
        $ob->draw();
        $output .=ob_get_contents();   
        ob_end_clean();          
        
        $this->ob_collection->goNext();
    }
	echo $output; 
  }
  
  function drawFooter()
  {
    echo "</SELECT>";
  }    
  
  function draw()
  {
    $this->drawHeader();
	$this->drawBody();
	$this->drawFooter();	
  }
  
}
?>
