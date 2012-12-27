<?php
include_once( __CORE_DIR . '/Classes' . '/RequestManager/RequestManager.class.php');

class TestRequestManager extends UnitTestCase
{   
	function testInit()
    {  
        $requestmanager = new RequestManager();  
        $response = $requestmanager->processRequest();
        $this->assertIsA($response, 'array');
        //$this->assertIsA($response['ticket'], 'string');
	}
	
}