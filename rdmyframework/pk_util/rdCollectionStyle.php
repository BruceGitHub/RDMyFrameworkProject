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
 * classe rdCollectionStyle
 *  
 * gestisce la collezione di ogni regola per il gruppo style
 * alla fine crea un stringa style="..."   
 * 
 * @version 1.0.0.3
 * @package pk_util
 */
class rdCollectionStyle extends rdCollectionItem
{
private $breplace;

  function __construct() 
  { 
	parent::__construct();
  }
  function add_functionRule($p_func,$p_param,$p_breplace=false)
  {
    if ($p_breplace == true) 
    $this->del_ItemByKey($p_key);

	$arrayEx = array();
	$arrayEx[] = $p_func.'('.$p_param.')';
	$arrayEx[] = IS_CSSFUNC;		
	
	$this->add($arrayEx,$p_func);
  }
    
  function add_simpleRule($p_key,$p_value,$p_breplace=false) 
  {
    if ($p_breplace == true) 
    $this->del_ItemByKey($p_key);
		
	$this->add($p_value,$p_key);
  }
	
	function get_BuildCollection()
	{
	$out = "";
	$style = "";
    $this->goFirst();
    while($this->isLastElement() == false )
    {
        $ob = $this->get_CpyElement();
        
        $kiave = $ob->get_Key();
		$valore = $ob->get_Object();
       
        
        $bCssFunc = false;
          
        if (is_array($valore))
        {
          $arr_val = $valore;
          $valore = $arr_val[0];
          $bCssFunc = $arr_val[1];
          $kiave = $arr_val[1];
        }
        
        
        if ($kiave != NOTAGCSS && $bCssFunc != IS_CSSFUNC)
          $out .= $kiave .':'.$valore.';';
        else
        if ($kiave == IS_CSSFUNC && $bCssFunc==IS_CSSFUNC)
          $out .= $valore.';';
        else
          $out .= $valore.';';
          
        $this->goNext();
    }
    
    if ($out) $style = 'style="'.$out.'"';
    return $style; 
  }
	
	
};
?>
