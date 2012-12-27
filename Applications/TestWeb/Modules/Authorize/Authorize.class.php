<?php
/**
* @package: Authorize
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @since: 2012/12/17
*/


class Authorize
{
	private $username;
	private $password;
	private $o;
	
	public function __construct( $object = NULL )
	{
		$this->o = $object;
	}
	
	
	public function init()
	{
		/*$sql = "SELECT * FROM page";
		$result = $this->o->query($sql);
		$n = $result->num_rows;
		echo $n;*/
	}
	
	
	public function doLogin()
	{
		
	}
	
	
	protected function userLocked()
	{
		return TRUE;
	}
	
	
	protected function checkFailedLoginAttempts()
	{
		
	}
	
}