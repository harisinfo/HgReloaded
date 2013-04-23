<?php
include_once( __CORE_DIR . '/Classes' . '/SessionManager/SessionManager.class.php');

class TestHomePageManager extends UnitTestCase
{   
	function testInit()
    {  
        $sessionmanager = new SessionManager();  
        $response = $sessionmanager->readSession();
        $this->assertIsA($response, 'array');
        $this->assertIsA($response['ticket'], 'string');
	}
	
}