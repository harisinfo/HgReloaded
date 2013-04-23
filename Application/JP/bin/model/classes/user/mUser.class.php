<?php

/**
* @name: mUser
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @version: 1.0 
* @since: 23/04/2013
* @internal: mUser model class, call mUser to perform all user related actions
*/

class mUser extends mysqli implements IModel
{
	protected $request;
	
	public function __construct( $request )
	{
		$this->request = $request;
	}


	public function add( $userId = NULL )
	{
		$userId = 12345;
		return $this->request[ 'UserEmail' ]->add( $userId );
		//return FALSE;
	}


	public function update( $userId )
	{
		return FALSE;
	}


	public function remove( $userId )
	{
		return FALSE;
	}
	
	public function get( $userId = NULL )
	{
		return FALSE;
	}
	
}