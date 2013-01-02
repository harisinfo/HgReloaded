<?php

/**
* @package: PageManager
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @since: 2012/12/17
*/


class PageManager
{
	private $o;
	private $request;
	private $response;
	private $module = 'page';
	
	public function __construct( $request = FALSE, $object = NULL )
	{
		global $loadModules;
		$this->request = $request;
		$this->o = $object;
		$this->response = FALSE;
		
		if( isset( $loadModules[ 'attach' ][ $this->module ] ) === TRUE )
		{
			foreach( $loadModules[ 'attach' ][ $this->module ] as $key => $value )
			{
				$l = TRUE;
				
				if( isset( $loadModules[ 'attach' ][ $value ] ) === TRUE && count( $loadModules[ 'attach' ][ $value ] ) > 0  )
				{
					if( in_array( $this->module, $loadModules[ 'attach' ][ $value ] ) === TRUE )
					{
						$l = FALSE;
					}
				}
				
				if( $l === TRUE )
				{
					$j = @include_once( __APPLICATIONS_ROOT . "/" . $this->request[ '_request' ][ 'application' ] . "/" . __MODULE_DIR . "/" . $loadModules[ 'manager' ][ $value ] . 
											"/" . $loadModules[ 'manager' ][ $value ] . ".class.php" );
										
					if( intval( $j ) == 1 )
					{
						$attachObj = new $loadModules[ 'manager' ][ $value ]( $this->request, $this->o );
						$this->response[ $value ] = $attachObj->init();
					}
					else
					{
						echo "Failed to attach module $value, send silent output to error log <br />\n";
					}
				}
				else
				{
					echo "Failed to attach module $value as it is dependent, send silent output to error log <br />\n";
				}
			}
		}
	}
	
	
	public function init()
	{
		return $this->showPage();
	}
	
	
	private function showPage()
	{
		if( isset( $this->request[ '_request' ][ 'page_keyword' ] ) === TRUE )
		{
			$flag_show = 1;
			$sql = "SELECT * FROM page WHERE page_keyword = ? AND flag_show = ?";
			$stmt = $this->o->prepare( $sql );
    		$stmt->bind_param( "si", $this->request[ '_request' ][ 'page_keyword' ], $flag_show );
			$stmt->execute();
			$result = $stmt->get_result();
			
			$this->response[ $this->module ][ 'status' ] = 200;
		}
		else
		{
			$this->response[ $this->module ][ 'status' ] = 404;
		}
		
		return $this->response;
	}
		
}