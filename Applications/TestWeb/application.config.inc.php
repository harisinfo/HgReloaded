<?php
global $loadPlugins, $loadModules;

// Session Encryption keyhash
define('KEYHASH' , 'v6*pV!L5b!tSF@d~)x2T(Mi_');

// Application Constants
define('__APPLICATION_NAME' , 'TestWeb');
define('__APPLICATION_SIGNATURE' , 'TW');

$loadModules[ 'module' ][ 'HelloWorld' ] = 'HelloWorld';
$loadModules[ 'name' ][ 'HelloWorld' ] = 'HelloWorld.class.php';
$loadModules[ 'manager' ][ 'HelloWorld' ] = 'HelloWorld';
$loadModules[ 'dependency' ][ 'HelloWorld' ][ 'default' ][ 0 ] = 'HelloWorld';
$loadModules[ 'dependency' ][ 'HelloWorld' ][ 'action' ][ 0 ] = 'HelloWorld';
$loadModules[ 'template' ][ 'HelloWorld' ] = 'HelloWorld';


$loadModules[ 'module' ][ 'Authorize' ] = 'Authorize';
$loadModules[ 'name' ][ 'Authorize' ] = 'Authorize.class.php';
$loadModules[ 'manager' ][ 'Authorize' ] = 'Authorize';
//$loadModules[ 'dependency' ][ 'Authorize' ][ 'default' ][ 0 ] = 'Authorize';
//$loadModules[ 'dependency' ][ 'Authorize' ][ 'login' ][ 0 ] = 'mysqli';
$loadModules[ 'dependency' ][ 'Authorize' ] = 'mysqli';
$loadModules[ 'template' ][ 'Authorize' ] = 'login.tpl';