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
 * classe clsrdFactoryClass per creare altre classe 
 *  
 * Si basa su un registro interno 
 *   
 * @author roberto diana 
 * @version 1.0.0.2
 * @package pk_setting
*/
class clsrdFactoryClass 
{
static private $registry;

  function clsFactoryClass()
  {
  }
  
  
  /*
  * static function register($p_name,$p_id,$p_bcheck)
  * 
  * registra una classe  
  * @param $p_bverconflictID server contrallare conflitti di $p_id 
  *     
  */  
  static function register($p_name,$p_id,$p_bverconflictID=false)
  {
    
    
    if (!is_array(self::$registry))
    self::$registry = array();
    
    
    self::$registry[$p_id] = $p_name;
    
  }
  
  static function createObject($p_id)
  {
    if (array_key_exists($p_id,self::$registry)) 
    {
        $class =  self::$registry[$p_id];
        return new $class();
    }
    else
    {
        throw new Exception(EX_NONREGISTERCLASS.' '.$p_id);
    }
  } 
   
}

/**
 * rdFramework
 * classe clsFactoryClass per creare altre classe 
 *  
 * Solo per compatibilità con la versione 
 * alpha 0.0.0.7
 *   
 * @deprecated
 * @author roberto diana 
 * @version 1.0.0.2
 * @package pk_setting
*/
class clsFactoryClass extends clsrdFactoryClass
{
    function __construct()
    {
        parent::__construct(); 
    }
}

?>