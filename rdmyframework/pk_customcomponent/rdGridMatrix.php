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
 * classe rdGridMatrix 
 * cre una griglia ed ogni cella è un oggetto  
 *
 * @todo rivedere separtorrow
 *      
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_customcomponent
*/ 
class rdGridMatrix extends clsrdElement
{
private $collItem;
private $divCell;
private $divContainer;
private $numCol;
private $numRow;
private $obSeparateRow;

  function __construct()
  {
    parent::__construct();
    $this->divCell = clsFactoryClass::createObject("tagcomponent.div");
    $this->divContainer = clsFactoryClass::createObject("tagcomponent.div");
    $this->collItem = clsFactoryClass::createObject("pk_util.rdCollectionItem");
    $this->obSeparateRow = clsFactoryClass::createObject("tagcustomcomponent.rdBasicText");
    
		//
		//defaul value 
		//
		$this->numCol = 4;
		$this->numRow = 0;
		
		  
		$this->obSeparateRow->set_Value("<div style='
											clear: both;
											height:1px;
											width:1px;
								 			overflow:hidden;
										 '></div>");
  } 
  
  function get_SeparatoRow()
  {
		return $this->obSeparateRow;
	}
  
  function get_TemplCell()
  {
    	return $this->divCell;
  }
  
  function get_Container()
  {
  		return $this->divContainer;
  }
  
  function set_NumRow($p_NumRow)
  {
		$this->numRow = $p_NumRow; 
  }
	
  function get_NumRow()
  {
		return $this->numRow;
  }

  function set_NumCol($p_NumCol)
  {
		$this->numCol = $p_NumCol; 
  }

  function get_NumCol()
  {
		return $this->numCol; 
  }

  function set_Value($p_value)
  {
    assertMsg("Method non supported");
  }  
  
  function _beforeDraw()
  {
  	$contRow=0;
  	$stopRow=-1;
  	$contCol=0;
  	$contCell=0;
  	
  	//
  	//calc stop row 
  	//
  	if ($this->get_NumRow() >0 )
  	{
  		$stopRow = $this->get_NumRow()*$this->get_NumCol();
  	}
  	
    $this->collItem->goFirst();
    while($this->collItem->isLastElement() == false )
    {
	    $ob = $this->collItem->get_CpyElement();  
		$ob = $ob->get_Object(); 
        $this->divContainer->add_Element($ob);
        $this->collItem->goNext();
        $contCell++;
        $contCol++; 
        
        //
        //check limit
        //
        
        //
        //limit col
        //
        if ($contCol >= $this->get_NumCol())
        {
        	$ob = $this->get_SeparatoRow();
					$this->divContainer->add_Element($ob);
					$contCol = 0; 
				}
        
        //
        //limit row 
        //
        if ($this->get_NumRow() >0 && $contCell >= $stopRow)
        break; 
        
    }  
  }
  
	function add_Cell($p_object,$p_key)
	{
		//
		//fill item collection   
		//
		$cell = clsFactoryClass::createObject("tagcustomcomponent.rdGridCell");
		$cell->get_Cell()->get_StyleColl()->set_Collection($this->get_TemplCell()->get_StyleColl());
		$cell->set_Value($p_object);
		$this->collItem->add($cell,$p_key);
	}
  
	function draw()
	{
		parent::draw();
		$this->get_Container()->draw();
		$this->get_Container()->emptyCollection();
	}
} 

/**
 * rdFramework
 * classe rdGridCell  
 *  
 * @author roberto diana 
 * @version 1.0.0.0
 *      
 * @package pk_customcomponent
*/ 
class rdGridCell extends clsrdElementInLine
{
	function __construct()
	{
		parent::__construct();
		$this->cell = clsFactoryClass::createObject("tagcomponent.div");
	}
	
	function get_Cell()
	{
		return $this->cell;
	} 
	
	
	function set_Value($p_value)
	{
		$this->cell->emptyCollection();
		if (is_object($p_value) && is_subclass_of($p_value, 'clsElement'))
		$this->cell->add_Element($p_value);
		else
		$this->get_Cell()->set_Value($p_value);
	}
	
	function draw()
	{
		parent::draw();
		$this->get_Cell()->draw();
	}	
}


?>
