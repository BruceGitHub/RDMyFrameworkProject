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
 * class clsTagMeta
 * gestisce il tag meta
 * 
 * @author roberto diana 
 * @version 1.0.0.0
 * @package pk_tagcomponent
 */ 
class clsrdTagMeta extends clsrdElementInLine
{

  function __construct()
  {
    parent::__construct();
  }
  
  
  function draw()
  {
    parent::_beforeDraw();
    $attribs = $this->get_AttColl()->get_BuildCollection();
    echo "<meta ".$attribs." />\n";
  }
  
  
}
?>
