<?php
/**
* @name: DBManager
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @since: 2012/10/12
* @internal: Dependency Injection
*/

class DBManager
{   
	protected static $instance, $db;
	
	public static function getInstance() 
	{
		if ( isset( self::$instance ) !== TRUE ) 
		{
			self::$instance = new DBManager;
		}
		
		return self::$instance;
	}
	
	
	public function __get( $foo )
	{            
		if ( array_key_exists( $foo, self::$session ) ) 
		{
            return self::$session[ $foo ];
        }
        

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return NULL;
	}
	
	
	public function __set( $foo, $bar )
	{
        self::$session[ $foo ] = $bar;
	}
	

	public function __clone() 
	{
		die( __CLASS__ . ' class can\'t be instantiated. Please use the method called getInstance.' );
	}
	
	
	private function __construct()
	{
		// do nothing
	}
	
}

$ob = DB::getInstance();
$ob->hello = 'hari';
echo $ob->hello;
