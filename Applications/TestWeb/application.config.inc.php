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