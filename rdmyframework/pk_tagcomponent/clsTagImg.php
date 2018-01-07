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
 * class clsTagImg 
 * gestisce il tag img
 * 
 * @author roberto diana 
 * @version 1.0.0.1
 * @package pk_tagcomponent
*/
 
require_once(dirname(__FILE__) . '/clsTag.php');

class clsrdTagImg extends clsrdElementInLine
{
private $src,$fileImg;

  function __construct()
  {
    parent::__construct();
  }
  
  function set_Src($p_src)
  {
    $this->src = $p_src;
  }
  
  function set_FileImg($p_fileImg)
  {
    $this->fileImg = $p_fileImg;
  }
  
  function get_FileImg()
  {
    return $this->fileImg;
  }
  
  function _beforeDraw()
  {
      $this->get_AttColl()->add_simpleAttr(SRC,"$this->src$this->fileImg");
  	  parent::_beforeDraw();
  }
  
  function draw()
  {
      $this->_beforeDraw();
      echo  "<img ".$this->get_ListAttribs().">";
  }
}

?>
