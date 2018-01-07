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
 * classe rdBasicText 
 * gestisce il un testo semplice può anche essere html
 *  
 * @author roberto diana 
 * @version 1.0.0.1
 * @package pk_customcomponent
*/ 
class rdBasicText extends clsrdElement
{

  function __construct()
  {
    parent::__construct();
  } 
  

  function draw()
  {
    echo $this->get_Value();
  }
} 

?>
