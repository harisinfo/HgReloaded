<?php

/**
* @name: mUserEmail
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @version: 1.0 
* @since: 23/04/2013
* @internal: mUserEmail model class, call mUserEmail to perform all user related actions
*/

class mUserEmail extends mysqli implements IModel
{
	private $request;
	
	public function __construct( $request = NULL )
	{
		$this->request = $request;
	}


	public function add( $userId )
	{
		return TRUE;
	}


	public function update( $userId )
	{
		return FALSE;
	}


	public function remove( $userId )
	{
		return FALSE;
	}
	
	
	public function get( $userId )
	{
		return FALSE;
	}
	
	
}