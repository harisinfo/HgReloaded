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
		$i = @include_once( __APPLICATIONS_ROOT . "/" . $application . "/" . __MODULE_DIR . "/" . $module . "/" . $module . ".class.php" );		
		
		if( intval( $i ) == 1 )
		{
			$object = new $module( $this->r, $this->fetchDependencies( $application, $module ) );
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
		$i = @include_once( __APPLICATIONS_ROOT . "/" . $application . "/application.config.inc.php" );
		
		if( intval( $i ) == 1 )
		{
			global $loadModules, $db;
			
			if( isset( $loadModules[ 'dependency' ][ $module ] ) === TRUE )
			{
				if( $loadModules[ 'dependency' ][ $module ] == 'mysqli' )
				{
					$injectObj = new $loadModules[ 'dependency' ][ $module ]( 'localhost', 'root', '', 'testweb' );
					
					return $injectObj;
				}
				elseif( class_exists( $loadModules[ 'dependency' ][ $module ] ) === TRUE )
				{
					// load module
				}
				else
				{
					// include module here from Application
					$j = @include_once( __APPLICATIONS_ROOT . "/" . $application . "/" . __MODULE_DIR . "/" . $loadModules[ 'dependency' ][ $module ] . 
										"/" . $loadModules[ 'dependency' ][ $module ] . ".class.php" );
										
					if( intval( $j ) == 1 )
					{
						echo "Include the file and create object";
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