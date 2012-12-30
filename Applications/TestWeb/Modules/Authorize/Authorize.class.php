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
				case 'register':
						return $this->doRegister();
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
		$sql = 'SELECT * FROM user WHERE user_name = "' . $this->request[ '_request' ][ 'user_name' ] . '" AND user_state = 1';
		$result = $this->o->query($sql);
		$n = $result->num_rows;
		$issetuid = FALSE;
		
		if( $n == 1 )
		{
			while($row=$result->fetch_array(MYSQLI_ASSOC))
			{
				if( crypt( $this->request[ '_request' ][ 'password' ], $row[ 'password' ] ) == $row[ 'password' ] )
				{
					foreach( $_SESSION as $key => $value )
					{
						if( decrypt( $key, KEYHASH ) == 'user_id' )
						{
							$issetuid = TRUE;
						}
					}
					
					if( $issetuid === FALSE )
					{
						$user_session_id = $this->setSession( 'user_id', $row[ 'user_id' ] );
						$sql = 'INSERT INTO user_login (user_id, user_session_id) VALUES (' . intval( $row[ 'user_id' ] ). ',"' . mysql_real_escape_string( $user_session_id ) . '")';
						$this->o->query($sql);
					}
					
					return TRUE;
				}
			}	
		}
		else
		{
			return FALSE;
		}
	}
	
	
	public function doRegister()
	{
		$sql = "INSERT INTO user SET user_name = 'hari', password = '" . crypt( "hello" ) . "'";
		//$this->o->query( $sql );
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
	
	
	public function setSession( $key, $value )
	{
		return $this->addSessionEncrypted( $key, $value );
	}
	
	
	protected function addSessionEncrypted( $key, $value )
	{
		$value_hash = encrypt( $value, KEYHASH );
		
		if($key=='user_id')
		{
			$_SESSION[ encrypt('c_user_id',KEYHASH) ] = crypt( $value ); // this is not needed
			$_SESSION[ encrypt($key,KEYHASH) ] = $value_hash;
		}
		else
		{
			$_SESSION[ encrypt($key,KEYHASH) ] = $value_hash;
		}
		
		return $value_hash;
	}
	
	
}