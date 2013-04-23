<?php

/**
* @name: IModel
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @version: 1.0 
* @since: 23/04/2013
* @internal: Interface
*/

interface IModel
{
	const state_new = 0;
	const state_active = 1;
	const state_on_hold = 2;
	const state_awaiting_confirmation = 3;
	const state_deleted = 999;
	
	public function add( $userId );
	public function update( $userId );
	public function remove( $userId );
	public function get( $userId );
}
