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
 * classe rdSimpleStringGrid 
 * crea una grid 
 *
 * @author roberto diana 
 * @version 1.0.2.0
 * @package pk_customcomponent
*/ 
class rdSimpleStringGrid implements irdElement
{
private $collColumn; 
private $templRow;
private $templCell;
private $source;
private $bAutosize;
public  static $listAttribForAutosize=array();

/**
 * event
*/ 
private $onDrawInitRow;
private $onDrawEndRow;
private $onDrawInitCell;
private $onDrawEndCell;



  function __construct()
  {
    $this->divContainer = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");
	$this->collColumn = clsrdFactoryClass::createObject("pk_util.rdCollectionItem");
	$this->templRow = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");
	$this->templCell = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");
	
	
	self::$listAttribForAutosize[] = 'margin-left';
	self::$listAttribForAutosize[] = 'margin-right';
	self::$listAttribForAutosize[] ='padding-left';
	self::$listAttribForAutosize[] ='padding-right';
	self::$listAttribForAutosize[] ='width';
	self::$listAttribForAutosize[] ='border-right';
	self::$listAttribForAutosize[] ='border-left';
    	
	//
	//default value
	//
	$this->bAutosize = true;
  } 

  function get_Container()
  {
  		return $this->divContainer;
  }
  
  function get_TemplRow()
  {
   	return  $this->templRow;
  }

  function get_TemplCell()
  {
   	return  $this->templCell;
  }
  
  function get_CollColumn()
  {
    return $this->collColumn;
  }
  
  function set_Autosize($p_bool)
  {
  	$this->bAutosize = $p_bool;  
  }
  
  function set_Source($p_source)
  {
  	$this->source = $p_source;
  }
  
  function set_onDrawInitRow($p_event)
  {
  	$this->onDrawInitRow = 	$p_event;  
  }
  
  function set_onDrawEndRow($p_event)
  {
  	$this->onDrawEndRow = 	$p_event;  
  }
  
  function set_onDrawInitCell($p_event)
  {
  	$this->onDrawInitCell = 	$p_event;  
  }
  
  function set_onDrawEndCell($p_event)
  {
  	$this->onDrawEndCell = 	$p_event;  
  }  
  	
  function add_Column($p_column,$p_key)
  {
    $p_column->get_Column()->get_StyleColl()->add_simpleRule("float","left");
    /*
            echo '<pre>';
            print_r($p_column);
            echo '</pre>';
    */
  	$this->collColumn->add($p_column,$p_key);			  
  }
  
  function AddGenericValueIfNotSet($p_or,$p_target)
  {
        //style
        $p_target->get_StyleColl()->goFirst();
	    while($p_target->get_StyleColl()->isLastElement() == false )
	    {
	        $Tmp = $p_target->get_StyleColl()->get_CpyElement();  
	        //$Tmp = $p_target->get_StyleColl()->get_Object();
	        //echo $Tmp->get_Key().' '.$Tmp->get_Object().' <br> ';
	        
	        if ($p_or->get_StyleColl()->get_ItemByKey($Tmp->get_Key()) == "") 
	        {
	            //echo $Tmp->get_Key().' '.$Tmp->get_Object().' ';  
                $p_or->get_StyleColl()->add_SimpleRule($Tmp->get_Key(),$Tmp->get_Object()); 
            }
	        
	        $p_target->get_StyleColl()->goNext();
	    }
  
    
    return $p_or;
  }
  
  function DelConflictGenericValue($p_or,$p_target)
  {
        //style
        $p_target->get_StyleColl()->goFirst();
	    while($p_target->get_StyleColl()->isLastElement() == false )
	    {
	        $Tmp = $p_target->get_StyleColl()->get_CpyElement();  
            $p_or->get_StyleColl()->del_ItemByKey($Tmp->get_Key());
	        $p_target->get_StyleColl()->goNext();
	    }
    return $p_or;
  }
  
  function retrievValueFromAttribute($p_TmpValue)
  {
    $TmpValue = $p_TmpValue;
	$TmpValue =str_replace("px",'',$TmpValue);
	$TmpValue =str_replace("%",'',$TmpValue);
	$TmpValue =str_replace("pt",'',$TmpValue);
	$TmpValue =str_replace("em",'',$TmpValue);
	$TmpValue = (int)$TmpValue; 
	
	return $TmpValue; 
  }
  
  
  function draw()
  {     
    	ob_start();
    	//
    	//eseguo un loop sulla collezione colonne e le disegno 
    	//
    	$this->collColumn->goFirst();
    	$sumWidth = 0;
	    while($this->collColumn->isLastElement() == false )
	    {
	        $TmpItem = $this->collColumn->get_CpyElement();  
	        $TmpItem = $TmpItem->get_Object();
            
            /*
            echo '<pre>';
            print_r($TmpItem);
            echo '</pre>';
            die();
            */

			if ($this->bAutosize)
			{
    			foreach (self::$listAttribForAutosize as $value)
    			{
    			$sumWidth += $this->retrievValueFromAttribute(
                              $TmpItem->get_Column()
                               ->get_StyleColl()
                               ->get_ItemByKey($value));
                }
			}			
			
			$TmpItem->draw();		       
	        $this->collColumn->goNext();
	    }	
	    
		$width = $this->get_Container()->get_StyleColl()->get_ItemByKey('width');
		
		
		if ($this->bAutosize == true)
		{
		  $width = $sumWidth."px";
		}
		
		$this->get_Container()->get_StyleColl()->add_simpleRule("width",$width);
	    $this->get_TemplRow()->get_StyleColl()->add_simpleRule("width",$width);
	    $this->get_TemplRow()->get_StyleColl()->add_simpleRule("clear",'both');
	    $numrow= -1;

		foreach ($this->source as $items)
		{
		  $linea = $items;
		  $numrow++;
		  
		  //chiama evento
		  if ($this->onDrawInitRow !="")
		  $this->onDrawInitRow->execute($this->templRow,$numrow);
		  
		  //disegna parte alta riga 
		  $this->templRow->drawHeader();

		    $this->collColumn->goFirst();
		    while($this->collColumn->isLastElement() == false )
		    {
		        $TmpItem = $this->collColumn->get_CpyElement();  
		        $Key = $TmpItem->get_Key();
		        $col = $TmpItem->get_Object();
		        
                /*
		        echo '<pre>';
                echo $Key;
                print_r($col);		        
		        echo '</pre>';
                */
                		        
		        if (array_key_exists($Key,$linea)) $value = $linea[$Key];
				//if ($value == "") $value= "&nbsp;";
				
				
				//
				//copio i dati di template cella
				//
                $TemplCell = clone $this->templCell; 
                
                //la larghezza la prendo solo dal template colonna 
                //cosi sono sicuro di non uscire fuori 
				$width = $col->get_Column()->get_StyleColl()->get_ItemByKey('width');

				$TemplCell = $this->AddGenericValueIfNotSet($TemplCell,$col->get_Column());
				$TemplCell = $this->DelConflictGenericValue($TemplCell,$this->templRow);
				$TemplCell->get_ClassColl()->set_Collection($col->get_Column()->get_ClassColl());

                //cancello i parametri che sicuramente non sono da settare
                $TemplCell->get_StyleColl()->del_ItemByKey('background-color');

				//parametri sempre presenti
				$TemplCell->get_StyleColl()->add_simpleRule("float",'left');
				$TemplCell->get_StyleColl()->add_simpleRule("width",$width);
				

                //imposta valore cella 
				$TemplCell->set_Value($value);
				
				
				//chiama evento
				if ($this->onDrawInitCell !="") 
				$this->onDrawInitCell->execute($col,$TemplCell,$numrow,$this->source,$Key);
				
				//disegna cella
				$TemplCell->draw();  
                
                
                //chiama evento
				if ($this->onDrawEndCell !="") 
				$this->onDrawEndCell->execute($col,$numrow);
				
				
		        $this->collColumn->goNext();
		    }
		  
		  if ($this->onDrawEndRow !="")
		  $this->onDrawEndRow->execute($this->templRow,$numrow);
		  
          //riga a capo 		  
          $break = "<div style='font-size:0px;height:1px;overflow:hidden;clear:both'>&nbsp;</div>";
		  
		  $this->templRow->set_Value($break);
		  $this->templRow->drawBody();
		  $this->templRow->drawFooter();
		  
		  		    
		}
	
	$output .=ob_get_contents();   
	ob_end_clean(); 		
	
	$this->divContainer->set_Value($output);
	
	echo"\n<!-- startgrid -->\n" ;
	$this->divContainer->draw();			
	echo"\n<!-- endgrid -->\n" ;	
  }
  
    function get_Source()
    {   
        ob_start();
            $this->draw();
    	    $out =ob_get_contents();   
	    ob_end_clean(); 		
    
    return $out; 
    }	
  
} 

/**
 * rdFramework
 * classe rdStringGridColumn 
 *  
 * @author roberto diana 
 * @version 1.0.0.0
 *      
 * @package pk_customcomponent
*/ 

class rdStringGridColumn implements irdElement
{
private $column;
	function __construct()
	{
		$this->column = clsrdFactoryClass::createObject("tagcomponent.clsTagDiv");
	}
	
	/*
	* clonazione oggetti 
	*/    
	public function __clone() 
	{
	  $this->column = clone($this->column);
	} 	

	function set_Value($p_value)
	{
	  	$this->column->set_Value($p_value);
	}
	
	function get_Column()
	{
	  return $this->column;
	}
	
	function draw()
	{
		$this->column->draw();
	}	

}

class rdStringGridEventOnDrawInitRow implements irdElement
{
  	function execute($p_row,$p_nrow)
  	{
	 	   
	}
}

class rdStringGridEventOnDrawEndRow implements irdElement
{
  	function execute($p_row,$p_nrow)
  	{
	 	   
	}
}

class rdStringGridEventOnDrawInitCell implements irdElement
{
  	function execute($p_col,$p_nrow,$p_cell,$p_source,$p_key)
  	{
	 	   
	}
}

class rdStringGridEventOnDrawEndtCell implements irdElement
{
  	function execute($p_col,$p_nrow)
  	{
	 	   
	}
}


?>
