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
 * classe rdSlidingMenu  
 * crea un menu con le linguette per informazione
 * fare un ricerca in rete di sliding css  modificato in modo da funzionare
 * senza lista ma con i div 
 *  
 * @author roberto diana 
 * @version 1.0.0.0
 * 
 * @todo eliminare i loop ed usare nuove forme (tramite eventi)  
 * @todo rivedere metodo add_item
 *        
 * @package pk_customcomponent
*/ 
class rdSlidingMenu extends clsrdElementInLine
{
private $Item;
private $divContainer;
private $collItem;

	function __construct()
	{
		parent::__construct();
		$this->latoSx = clsFactoryClass::createObject("tagcomponent.div");
		$this->latoDx = clsFactoryClass::createObject("tagcomponent.div");
		$this->collItem = clsFactoryClass::createObject("pk_util.rdCollectionItem");
		$this->divContainer = clsFactoryClass::createObject("tagcomponent.div");
		
		//
		//default value
		//
		$this->divContainer->get_StyleColl()->add_simpleRule("overflow","hidden");
		
		$this->get_TemplSideSx()->get_StyleColl()->add_simpleRule("background-repeat","no-repeat");
		$this->get_TemplSideSx()->get_StyleColl()->add_simpleRule("float","left");
		
		$this->get_TemplSideDx()->get_StyleColl()->add_simpleRule("background-repeat","no-repeat");
		$this->get_TemplSideDx()->get_StyleColl()->add_simpleRule("float","left");
	} 
	
	
	function get_TemplSideSx()
	{
		return $this->latoSx;
	}
	
	function get_TemplSideDx()
	{
		return $this->latoDx;
	}  
	
	function get_Container()
	{
		return $this->divContainer;
	}
	
	function add_Item($p_value,$p_key=0)
	{
		//
		//always present 
		//
		$this->get_TemplSideDx()->get_StyleColl()->add_simpleRule("background-position","right top");
		$this->get_TemplSideDx()->get_StyleColl()->add_simpleRule("background-repeat","no-repeat");
		
		//
		//fill item menu 
		//			
		$ItemSli = clsFactoryClass::createObject("tagcustomcomponent.rdSlidingMenu.rdSlidingMenuItem");
		$ItemSli->get_LatoSx()->get_StyleColl()->set_Collection($this->get_TemplSideSx()->get_StyleColl());
		$ItemSli->get_LatoSx()->get_ClassColl()->set_Collection($this->get_TemplSideSx()->get_ClassColl());
		
		$ItemSli->get_LatoDx()->get_StyleColl()->set_Collection($this->get_TemplSideDx()->get_StyleColl());
		$ItemSli->get_LatoDx()->get_ClassColl()->set_Collection($this->get_TemplSideDx()->get_ClassColl());
		$ItemSli->get_LatoDx()->set_Value($p_value);
		
		$this->collItem->add($ItemSli,$p_key);
	}
	
	function get_ObjectByKey($p_key)
	{
		return $this->collItem->get_ItemByKey($p_key); 
	}
	
	function del_ObjectByKey($p_key)
	{
		return $this->collItem->del_ItemByKey($p_key); 
	}
	
	function _beforeDraw()
	{
		$this->collItem->goFirst();
		while($this->collItem->isLastElement() == false )
		{
			$ob = $this->collItem->get_CpyElement(); 
					 
			$ob = $ob->get_Object();
			$this->divContainer->add_Element($ob);
			$this->collItem->goNext();
		}
	  
	}  
	
	function draw()
	{
		parent::draw();
		$this->get_Container()->draw();
		$this->get_Container()->emptyCollection();
	}
	
	function set_Value($p_value)
	{
		assertMsg("Method non supported");
	}
	
	function set_Width($p_width)
	{
		$this->get_Container()->get_StyleColl()->add_simpleRule("width",$p_width);
	}
	
} 

/**
 * rdFramework
 * classe rdSlidingMenuItem  
 * è un item dell menu    
 *  
 * @author roberto diana 
 * @version 1.0.0.0
 *      
 * @package pk_customcomponent
*/ 
class rdSlidingMenuItem extends clsrdElementInLine
{
	function __construct()
	{
		parent::__construct();
		$this->latoSx = clsFactoryClass::createObject("tagcomponent.div");
		$this->latoDx = clsFactoryClass::createObject("tagcomponent.div");
		$this->body = clsFactoryClass::createObject("tagcomponent.div");
	}
	
	function get_LatoSx()
	{
		return $this->latoSx;
	} 
	
	function get_LatoDx()
	{
		return $this->latoDx;
	}
	
	function set_Value($p_value)
	{
		$this->latoDx->set_Value($p_value);
	}
	
	function draw()
	{
		parent::draw();
		$this->latoSx->draw();
		$this->latoDx->draw();
	}	
  	
}


?>
