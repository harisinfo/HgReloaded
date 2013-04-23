<?php

/**
* @name: mUserMobile
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @version: 1.0 
* @since: 23/04/2013
* @internal: mUserMobile model class, call mUserMobile to perform all user mobile related actions
*/

class mUserMobile extends mysqli implements IModel
{
	protected $request;
	
	public function __construct( $request )
	{
		$this->request = $request;
	}


	public function add()
	{
		return FALSE;
	}


	public function update()
	{
		return FALSE;
	}


	public function remove()
	{
		return FALSE;
	}
	
	
	public function email_exists()
	{
		return FALSE;
	}
	
}