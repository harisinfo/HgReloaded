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
	
	public function __construct( $request = FALSE, $object = NULL )
	{
		$this->request = $request;
		$this->o = $object;
		$this->response = FALSE;
	}
	
	
	public function init()
	{
		return $this->showPage();
	}
	
	
	public function showPage()
	{
		if( isset( $this->request[ '_request' ][ 'page_keyword' ] ) === TRUE )
		{
			$flag_show = 1;
			$sql = "SELECT * FROM page WHERE page_keyword = ? AND flag_show = ?";
			$stmt = $this->o->prepare( $sql );
    		$stmt->bind_param( "si", $this->request[ '_request' ][ 'page_keyword' ], $flag_show );
			$stmt->execute();
			
			$result = $stmt->get_result();
			
			return $result;
		}
		else
		{
			echo "404";
			return FALSE;
		}
	}
		
}