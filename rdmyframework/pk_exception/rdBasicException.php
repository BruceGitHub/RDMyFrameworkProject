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
 * Classe eccezione base 
 *
 * package classi exception
 * @version 0.0.0.0
 * @package pk_exception
 */
class rdException extends Exception
{}


/**
 * rdFramework 
 * Classe eccezione tipo non derivato da base 
 *
 * package classi exception
 * @version 0.0.0.0
 * @package pk_exception
 */
class rdExceptNoDerivBaseClass extends rdException
{}


/**
 * rdFramework 
 * Classe eccezione tipo non object 
 *
 * package classi exception
 * @version 0.0.0.0
 * @package pk_exception
 */
class rdExceptNoVarObject extends rdException
{}


?>
