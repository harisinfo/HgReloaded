<?php
/**
* @name: BootstrapHandler
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @since: 2012/10/12
* @internal: singleton class
*/

class BootstrapHandler
{   
	protected static $instance;
	
	public static function getInstance() 
	{
		if ( isset( self::$instance ) !== TRUE ) 
		{
			self::$instance = new BootstrapHandler;
		}
		
		return self::$instance;
	}
	
	
	public function __clone() 
	{
		die( __CLASS__ . ' class can\'t be instantiated. Please use the method called getInstance.' );
	}
	
	
	private function __construct()
	{
		
	}
	
}