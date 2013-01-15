<?php
global $loadPlugins, $loadModules, $db;

// Session Encryption keyhash
define( 'KEYHASH' , 'v6*pV!L5b!tSF@d~)x2T(Mi_' );

// Application Constants
define( '__APPLICATION_NAME' , 'HarisInfo' );
define( '__APPLICATION_SIGNATURE' , 'HI' );
define( '__SITE_IDENTIFIER' , 'HI' );

define( '__SMARTY_TEMPLATES' , "C:\wamp\www\Hg_html_V_1\\Themes\\HI\\templates" );
define( '__SMARTY_TEMPLATES_C' , "C:\\wamp\\www\\Hg_Reloaded_V_1\\Cache\\HI\\templates_c" );
define( '__SMARTY_TEMPLATES_CACHE' , "C:\\wamp\\www\\Hg_Reloaded_V_1\\Cache\\HI\\cache" );
define( '__SMARTY_TEMPLATES_CONFIG' , "C:\\wamp\\www\\Hg_Reloaded_V_1\\Cache\\HI\\config" );

$db[ 'host' ] = 'localhost';
$db[ 'user' ] = 'root';
$db[ 'password' ] = '';
$db[ 'database' ] = 'hi';

$loadModules[ 'module' ][ 'page' ] = 'PageManager';
$loadModules[ 'name' ][ 'page' ] = 'PageManager.class.php';
$loadModules[ 'manager' ][ 'page' ] = 'PageManager';
$loadModules[ 'dependency' ][ 'page' ] = 'mysqli';

//$loadModules[ 'attach' ][ 'page' ][ 0 ] = 'category'; 