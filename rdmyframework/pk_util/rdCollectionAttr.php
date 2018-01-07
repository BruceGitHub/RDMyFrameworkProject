<?
/* 
rdMyFramework - The framework for development webapplication interface 
Copyright (C) 2006-2007 Diana Roberto 
Version Alpha 0.0.0.10
For further information visit:
http://sourceforge.net/projects/rdmyframework/
*/

/**
 * rdFramework 
 * classe rdCollectionAttr
 *  
 * gestisce la collezione di ogni attributo 
 * alla fine crea nomeattributo="valore" 
 * oppure solo valore (tipo readonly)
 * 
 * @version 1.0.1.0
 * @package pk_util
 */
class rdCollectionAttr extends rdCollectionItem
{
static private $attrbs_single = array();
  function __construct() 
  { 
	parent::__construct();
	$this->attrbs_single = array(SELECTED,
                                 DISABLED,
                                 MULTIPLE,
                                 READONLY,
                                 CHECKED);
  }
    
    function add_simpleAttr($p_key,$p_value) 
    {
    $this->del_ItemByKey($p_key);
    
    //    
    //facility
    //
    
    //echo $p_key; 
    
    if (
        $p_key[strlen($p_key)-1] != '=' 
        && !in_array($p_key,$this->attrbs_single) 
       ) 
    $p_key .='='; 
    
    $this->add($p_value,$p_key);
    }
	
	function get_ItemByKey($p_key)
	{
	    //
	    //se la chiave non ha il simbolo = lo
	    //aggiungo io 
	    $p_key = trim($p_key);
        if ($p_key[strlen($p_key)-1] != '=' 
            && !in_array($p_key,$this->attrbs_single))
        {
            $p_key.='=';     
        }
        return parent::get_ItemByKey($p_key);
    }
	
	function add_singleAttr($p_key)
	{
	   $this->add_simpleAttr($p_key,$p_key); 
    }
	
    function get_BuildCollection()
    {
    $out = "";
    $this->goFirst();
    while($this->isLastElement() == false )
    {
    $ob = $this->get_CpyElement();
    $kiave = $ob->get_Key();
    $valore = $ob->get_Object();
    
    if ($valore != "")
    {
        if (in_array($kiave,$this->attrbs_single))
        $out .= strtolower($valore).' ';
        else
        $out .= strtolower($kiave) .'\''.$valore.'\''.' ';

    }
         
    $this->goNext();
    }
    return $out; 
    }
	
	
};
?>
