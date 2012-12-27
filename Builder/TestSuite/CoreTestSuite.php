<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
ini_set( "include_path","C:\\wamp\\www\\Hg_Reloaded_V_1" );

include_once( "hg.config.inc.php" );
include_once( __CORE_DIR . "/" . __CLASSES_DIR . "/RequestManager/RequestManager.class.php" );

$_request_manager = new RequestManager();

// Support Web Tests for the time being, built in for command line as well with CLI

if( $_request_manager->detectMedium() == 2 )
{
	if( isset( $_GET['class'] ) === TRUE )
	{
		include_once( __PLUGIN_DIR . '/SimpleTest/autorun.php' );
		
		if(!@include( __CORE_DIR . '/Classes/' . $_GET[ 'class' ] . '/' . $_GET[ 'class' ] . '.Test.php' ) ) 
		die( "Class Not Found" );
		
	}
}

