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
			$object = new $module;
			return $object;
		}
		else
		{
			die( "Failed to bootstrap {$module}" );
		}
		
		return FALSE;
	}
	
}


$dispatch = new DispatchManager();
$obj = $dispatch->bootstrap();

if( is_object( $obj ) === TRUE )
{
	$response = $obj->init();	
}
