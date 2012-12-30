<?php
/**
* @package: Authenticate
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @since: 2012/12/17
*/


class Authenticate
{
	private $username;
	private $password;
	private $o;
	private $request;
	
	public function __construct( $request = FALSE, $object = NULL )
	{
		$this->request = $request;
		$this->o = $object;
	}
	
	
	public function init()
	{
		if( isset( $this->request[ '_request' ][ 'action' ] ) === TRUE )
		{
			switch( $this->request[ '_request' ][ 'action' ] )
			{
				case 'login':
						return $this->doLogin();
					break;
				case 'logout':
						return $this->doLogout();
					break;
				default:
						return $this->showLogin();
					break;
			}
		}
		
		return $this->showLogin();
	}
	
	
	public function doLogin()
	{
		$sql = 'SELECT * FROM user WHERE username = "' . $this->request[ '_request' ][ 'user_name' ] . '" AND user_state = 1';
		$result = $this->o->query($sql);
		$n = $result->num_rows;
		echo $n;
	}
	
	
	public function doLogout()
	{
		
	}
	
	public function showLogin()
	{
		
	}
	
	
	protected function userLocked()
	{
		$sql = "SELECT user_id FROM ";
		return TRUE;
	}
	
	
	protected function checkFailedLoginAttempts()
	{
		
	}
	
}