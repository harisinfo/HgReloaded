<?php
include_once( __CORE_DIR . '/Classes' . '/MySQLDriverManager/MySQLDriverManager.class.php');

class TestMySQLDriverManager extends UnitTestCase
{   
	function testInit()
    {  
        $dbmanager = new MySQLDriverManager();  
        $response = $dbmanager->connect();
        $this->assertIsA($response, 'Object: of mysqli');
        //$this->assertIsA($response['ticket'], 'string');
	}
	
}