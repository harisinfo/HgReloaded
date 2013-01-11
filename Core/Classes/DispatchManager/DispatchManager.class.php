<?php
/**
* @package: DispatchManager
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @since: 2012/12/18
*/


class DispatchManager extends RequestManager 
{
	private $module;
	private $application;
	private $r = array();
	private $session;
	private $insertObj = NULL;
	
	public function __constructor()
	{
		// Todo
	}
	
	public function bootstrap()
	{
		$this->r = RequestManager::processRequest();
		$this->r = RequestManager::processSession();
		
		if( isset( $this->r[ '_request' ][ 'module' ] ) === TRUE && isset( $this->r[ '_request' ][ 'application' ] ) === TRUE )
		{
			return $this->fetchLibrary( $this->r[ '_request' ][ 'application' ], $this->r[ '_request' ][ 'module' ] );
		}
		else
		{
			return FALSE;
		}
	}
	
	
	protected function fetchLibrary( $application, $module )
	{
		$j = @require_once( __APPLICATIONS_ROOT . "/" . $application . "/application.config.inc.php" );
		
		if( intval( $j ) != 1 )
		{
			die( "Failed to bootstrap application configuration for {$application}" );
		}
		
		global $loadModules;
		
		$i = @include_once( __APPLICATIONS_ROOT . "/" . $application . "/" . __MODULE_DIR . "/" . $loadModules[ 'module' ][ $module ] . "/" . 
							$loadModules[ 'manager' ][ $module ] . ".class.php" );		
		
		if( intval( $i ) == 1 )
		{			
			$object = new $loadModules[ 'manager' ][ $module ]( $this->r, $this->fetchDependencies( $application, $module ) );
			return $object;
		}
		else
		{
			die( "Failed to bootstrap {$module}" );
		}
		
		return FALSE;
	}
	
	
	protected function fetchDependencies( $application, $module )
	{
		$i = @require_once( __APPLICATIONS_ROOT . "/" . $application . "/application.config.inc.php" );
		
		if( intval( $i ) == 1 )
		{
			global $loadModules, $db;
			
			if( isset( $loadModules[ 'dependency' ][ $module ] ) === TRUE )
			{
				if( $loadModules[ 'dependency' ][ $module ] == 'mysqli' )
				{
					// globals again
					if( $this->insertObj != NULL )
					{
						if( is_object( $this->insertObj ) === TRUE )
						{
							if( get_class( $this->injectObj ) == $loadModules[ 'dependency' ][ $module ] )
							{
								return $this->insertObj;	
							}
							else
							{
								$this->injectObj = new $loadModules[ 'dependency' ][ $module ]( $db[ 'host' ], $db[ 'user' ], $db[ 'password' ], $db[ 'database' ] );
								return $this->injectObj;
							}
						}
					}
					else
					{
						$this->injectObj = new $loadModules[ 'dependency' ][ $module ]( $db[ 'host' ], $db[ 'user' ], $db[ 'password' ], $db[ 'database' ] );
						
							var_dump( $db );
							
							if( intval( mysqli_connect_errno() ) == 1 )
							{
    							printf( "Connect failed: %s\n", mysqli_connect_error() );
    							exit();
							}
						
						return $this->injectObj;
					}
				}
				elseif( class_exists( $loadModules[ 'dependency' ][ $module ] ) === TRUE )
				{
					// load module
				}
				else
				{
					// include module here from Application
					$dependency_module = $loadModules[ 'dependency' ][ $module ];
					
					$j = @include_once( __APPLICATIONS_ROOT . "/" . $application . "/" . __MODULE_DIR . "/" . $loadModules[ 'manager' ][ $dependency_module ] . 
										"/" . $loadModules[ 'manager' ][ $dependency_module ] . ".class.php" );
										
					if( intval( $j ) == 1 )
					{
						$injectObj = new $loadModules[ 'manager' ][ $dependency_module ]( $this->r );
						return $injectObj;
					}
				}
			}
		}
		
		return NULL;
	}
		
}


$dispatch = new DispatchManager();
$obj = $dispatch->bootstrap();

if( is_object( $obj ) === TRUE )
{
	$response = $obj->init();
}