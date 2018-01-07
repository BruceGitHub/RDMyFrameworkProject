<?php 
/* 
rdMyFramework - The framework for development webapplication interface 
Copyright (C) 2006-2007 Diana Roberto 
Version Alpha 0.0.0.10
For further information visit:
http://sourceforge.net/projects/rdmyframework/
*/

ini_set ("display_errors","1");

//disable only for test
//ini_set("error_reporting", E_ALL);
ini_set("error_reporting", E_STRICT);


INCLUDE_ONCE("../rdmyframework/import_corerdmyframework.php");
INCLUDE_ONCE("../rdmyframework/pk_customcomponent/import_customcomponent.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">
<HTML>
<style>
<!--
   
div.shadow{ float: left;padding:0 10px 10px 0;
    background: url(dropshadow.jpg) no-repeat bottom right}    
    
div.shadow div{ 
    border:0px solid #ccc;border-color: #ccc #666 #666 #ccc;
    _padding:5px}     
    
div.rigagrid:hover    
{
 background-color:red;
 color:white;
}
-->
</style>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<TITLE>Template</TITLE>
</HEAD>
<BODY>

<DIV style="clear:both"></DIV>                                                       

<?php 

class prova extends rdStringGridEventOnDrawInitRow
{
	function execute($p_row,$p_nrow)
	{
	  		$rand = rand(0,1000000);
	  		//$rand = "999999";
	  //$p_row->get_StyleColl()->add_simpleRule("color",'white');
	  //$rand = '999999';
	  //$p_row->get_StyleColl()->add_simpleRule("background-color",'#'.$rand);	
	  /*
	  static $i=0; 
	    if ($i)
	 	$p_row->get_StyleColl()->add_simpleRule("background-color",'#'.$rand);	
	 	else
	 	$p_row->get_StyleColl()->add_simpleRule("background-color",'#'.$rand);
		 
		$i=!$i;	
	 	*/
	}
}
$prova = new prova();

class endrow  
{
	function execute($p_row)
	{
	 //$p_row->set_Value("xx"); 	
	}
}
$endrow = new endrow();

class inicell  
{
	function execute($co,$cell,$ro)
	{
	 	//echo  "$co,$ro,$cell";		
	 	//echo "<div style='font-size:39px'>
		//".var_dump($co)."</div>";
		//echo "xx".$co->get_Column()->get_Value();
		//echo "num:".$ro."<br>";
		//$cell->set_Value("in:".$cell->get_Value());
		//$cell->get_StyleColl()->add_simpleRule("background-color",'#'.$rand);
	}
}
$inicell = new inicell();

class endcell  
{
	function execute($co,$ro)
	{
	 	//echo  "$co,$ro,$cell";		
	 	//echo "<div style='font-size:39px'>
		//".var_dump($co)."</div>";
		//echo "xx".$co->get_Column()->get_Value();
		//echo "num:".$ro."<br>";
		//$cell->set_Value("in:".$cell->get_Value());
	}
}
$endcell = new endcell();

$grid = new rdSimpleStringGrid();


$grid->set_onDrawInitRow($prova);
$grid->set_onDrawEndRow($endrow);
$grid->set_onDrawInitCell($inicell);
$grid->set_onDrawEndCell($endcell);


//$grid->set_Autosize(false);

//
//container 
//$grid->get_Container()->get_StyleColl()->add_simpleRule("width",((140*4)+8)."px");
//$grid->get_Container()->get_StyleColl()->add_functionRule("background:url","sfondo_grid.jpg");
//$grid->get_Container()->get_StyleColl()->add_simpleRule("overflow","hidden");

//
//riga
//$grid->get_TemplRow()->get_StyleColl()->add_simpleRule("background-color","red");
//$grid->get_TemplRow()->get_StyleColl()->add_simpleRule("font-size","10px");
//$grid->get_TemplRow()->get_StyleColl()->add_simpleRule("height","100%");
//$grid->get_TemplRow()->get_StyleColl()->add_simpleRule("border","1px solid #ccc;border-color: #ccc #666 #666 #ccc");
//$grid->get_TemplRow()->get_StyleColl()->add_simpleRule("color","blue");
//$grid->get_TemplRow()->get_StyleColl()->add_functionRule("background:url","sfondo_cell.jpg");
//$grid->get_TemplRow()->get_StyleColl()->add_simpleRule("border-bottom","2px solid green;");

//$grid->get_TemplRow()->get_StyleColl()->add_simpleRule("background-color","black");
$grid->get_TemplRow()->get_StyleColl()->add_simpleRule("border-bottom","1px solid #ccc;border-color: #ccc #666 #666 #ccc");
$grid->get_TemplRow()->get_StyleColl()->add_simpleRule("border-left","1px solid #ccc;border-color: #ccc #666 #666 #ccc");
$grid->get_TemplRow()->get_StyleColl()->add_simpleRule("font-size",'14px');
$grid->get_TemplRow()->get_StyleColl()->add_simpleRule("padding-top",'10px');
$grid->get_TemplRow()->get_ClassColl()->add('rigagrid');

//
//cella
//$grid->get_TemplCell()->get_StyleColl()->add_simpleRule("font-size",'20px');
//$grid->get_TemplCell()->get_StyleColl()->add_simpleRule("width","100px");
//$grid->get_TemplCell()->get_StyleColl()->add_simpleRule("border","2px solid green;");
//$grid->get_TemplCell()->get_StyleColl()->add_simpleRule("font-weight",'bold');

//
//colonne
$col =  clsrdFactoryClass::createObject("tagcustomcomponent.rdSimpleStringGridCell.rdStringGridColumn");
$col->get_Column()->get_StyleColl()->add_simpleRule("background-color","#8FBC8F");
$col->get_Column()->get_StyleColl()->add_simpleRule("text-align","center");
$col->get_Column()->get_StyleColl()->add_simpleRule("width","100px");
//$col->get_Column()->get_StyleColl()->add_simpleRule("border","1px solid #ccc;border-color: #ccc #666 #666 #ccc");


$col1 = clone $col;
$col1->set_Value("colonna 1");
$grid->add_Column($col1,'1');

$col->get_Column()->get_StyleColl()->add_simpleRule("text-align","left");
$col->get_Column()->get_StyleColl()->add_simpleRule("padding-right","10px");
$col2 = clone $col;
$col2->set_Value("colonna 2");
$grid->add_Column($col2,'2');


$col3 = clone $col;
$col3->set_Value("colonna 3");
$grid->add_Column($col3,'3');


$col4 = clone $col;
$col4->set_Value("colonna 4");
$grid->add_Column($col4,'4');

$src = array();

$linea = array();
$linea[1] = '<img src="telefono.jpg">';
$linea[2] =" (d)col2 testo lungo testo lungo testo ";
$linea[3] =" (d)col3 testo lungo testo lungo testo lungo testo lungo  ";
$linea[4] =" (d)col4 bello ";
$src[] = $linea;

$linea = array();
$linea[1] = '<img src="telefono.jpg">';
$linea[2] =" (d)col2 bello ";
$linea[3] =" (d)col3 testo lungo testo lungo testo lungo testo lungo  ";
$linea[4] =" (d)col4 bello ";
$src[] = $linea;

$linea = array();
$linea[1] = '<img src="telefono.jpg">';
$linea[2] =" (d)col2 bello ";
$linea[3] =" (d)col3 testo lungo testo lungo testo lungo testo lungo  ";
$linea[4] =" (d)col4 bello ";
$src[] = $linea;

$linea = array();
$linea[1] = '<img src="telefono.jpg">';
$linea[2] =" (d)col2 bello ";
$linea[3] =" (d)col3 testo lungo testo lungo testo lungo testo lungo  ";
$linea[4] =" (d)col4 bello ";
$src[] = $linea;


$grid->set_Source($src);

?>

<div class="shadow">
<?php
$grid->draw();
?>
</div>
<?php
/*
echo '<br>';
echo $grid->get_Source();
*/

?>
</DIV>

</BODY>
</HTML>
