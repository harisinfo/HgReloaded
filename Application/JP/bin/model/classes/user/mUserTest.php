<?php

/**
* @name: mUserTest
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @version: 1.0 
* @since: 23/04/2013
* @internal: mUserTest model class, call mUserTest to perform all user mobile related actions
*/

error_reporting(E_ALL | E_STRICT);
ini_set( "display_errors", 1 );
ini_set( "include_path", "C:\\wamp\\www\\Hg_Extended" );

require_once( 'global.config.inc.php' );

require_once( __PLUGIN_DIR . '/' . __SIMPLETEST_ENTRY_POINT . '/autorun.php' );
require_once( __APPLICATIONS_ROOT . '/JP/bin/model/interfaces/common/IModel.interface.php' );
require_once( 'mUser.class.php' );

require_once( 'mUserEmail.class.php' );
require_once( 'mUserMobile.class.php' );

class mUserTest extends UnitTestCase
{   
	function testInit()
    {
    	$request[ 'UserEmail' ] = new mUserEmail();
    	$request[ 'UserMobile' ] = new mUserMobile();
    	
    	$user = new mUser( $request );
    	
    	$response = $user->add();
    	$this->assertEqual( $response, TRUE );
    	
    	$userId = 1234;
    	
    	$response = $user->remove( $userId );
    	$this->assertEqual( $response, TRUE );
    	
    	$response = $user->update( $userId );
    	$this->assertEqual( $response, TRUE );
    	
		/*$requestmanager = new RequestManager();  
		$response = $requestmanager->processRequest();
		$this->assertIsA($response, 'array');*/
		//$this->assertIsA($response['ticket'], 'string');
	}
	
}