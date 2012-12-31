<?php
global $loadPlugins, $loadModules, $db;

// Session Encryption keyhash
define('KEYHASH' , 'v6*pV!L5b!tSF@d~)x2T(Mi_');

// Application Constants
define('__APPLICATION_NAME' , 'TestWeb');
define('__APPLICATION_SIGNATURE' , 'TW');
define('__SITE_IDENTIFIER' , 'TW');

$db[ 'host' ] = 'localhost';
$db[ 'user' ] = 'root';
$db[ 'password' ] = '';
$db[ 'database' ] = 'testweb';

$loadModules[ 'module' ][ 'HelloWorld' ] = 'HelloWorld';
$loadModules[ 'name' ][ 'HelloWorld' ] = 'HelloWorld.class.php';
$loadModules[ 'manager' ][ 'HelloWorld' ] = 'HelloWorld';
$loadModules[ 'dependency' ][ 'HelloWorld' ][ 'default' ][ 0 ] = 'HelloWorld';
$loadModules[ 'dependency' ][ 'HelloWorld' ][ 'action' ][ 0 ] = 'HelloWorld';
$loadModules[ 'template' ][ 'HelloWorld' ] = 'HelloWorld';


$loadModules[ 'module' ][ 'Authorize' ] = 'Authorize';
$loadModules[ 'name' ][ 'Authorize' ] = 'Authorize.class.php';
$loadModules[ 'manager' ][ 'Authorize' ] = 'Authorize';
$loadModules[ 'dependency' ][ 'Authorize' ] = 'mysqli';
$loadModules[ 'template' ][ 'Authorize' ] = 'login.tpl';

$loadModules[ 'module' ][ 'category' ] = 'CategoryManager';
$loadModules[ 'name' ][ 'category' ] = 'CategoryManager.class.php';
$loadModules[ 'manager' ][ 'category' ] = 'CategoryManager';
$loadModules[ 'dependency' ][ 'category' ] = 'mysqli';

$loadModules[ 'module' ][ 'page' ] = 'PageManager';
$loadModules[ 'name' ][ 'page' ] = 'PageManager.class.php';
$loadModules[ 'manager' ][ 'page' ] = 'PageManager';
$loadModules[ 'dependency' ][ 'page' ] = 'mysqli'; // inject category into page manager

