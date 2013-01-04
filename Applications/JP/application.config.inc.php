<?php
global $loadPlugins, $loadModules, $db;

// Session Encryption keyhash
define('KEYHASH' , 'v6*pV!L5b!tSF@d~)x2T(Mi_');

// Application Constants
define('__APPLICATION_NAME' , 'JallasPharmacy');
define('__APPLICATION_SIGNATURE' , 'JP');
define('__SITE_IDENTIFIER' , 'JP');

define('DEFAULT_LANGUAGE' , 'en-UK');
define('DEFAULT_LABEL' , 'en_UK');


// gender
define('GENDER_MALE', 0);
define('GENDER_FEMALE', 1);
define('GENDER_NONE', 2);

// authorisation levels
define('USER' , '0');
define('ADMIN' , '1');
define('MEDIC' , '2');
define('SUPER' , '3');

// get steps
define('STEP_1','Condition');
define('STEP_2','GeneralMedical');
define('STEP_3','Register');

// constant for authorisation of conditions / registration
define('NEW_CONSULTATION' , '0'); // New customer
define('NEW_CONDITION' , '1'); // Existing customer with new condition registration
define('NEW_TREATMENT' , '2'); // New treatment by customer

define('ADMIN_CONFIRMED' , '3'); // Admin has confirmed the customer
define('MEDIC_CONFIRMED' , '4'); // Medic has confirmed the customer
define('CONFIRMED', '5'); // Customer has been confirmed and is ready to order

define('ADMIN_NEED_MORE_INFO' , '5'); // Admin has requested more information
define('MEDIC_NEED_MORE_INFO' , '6'); // Medic needs more information

define('CUSTOMER_HAS_PROVIDED_MORE_INFO_ADMIN' , '7'); // Customer has provided more info to the admin
define('CUSTOMER_HAS_PROVIDED_MORE_INFO_MEDIC' , '8'); // Customer has provided more info to the medic

// constants for authorisation of orders
define('NEW_ORDER' , '0'); // New customer
define('ORDER_ADMIN_CONFIRMED' , '2'); // Existing customer with new condition registration
define('ORDER_MEDIC_CONFIRMED' , '3'); // New treatment by customer
define('ORDER_CONFIRMED', '4'); // Customer has been confirmed and is ready to order
define('ADMIN_NEED_MORE_INFO_REGARDING_ORDER' , '5'); // Admin has requested more information
define('MEDIC_NEED_MORE_INFO_REGARDING_ORDER' , '6'); // Medic needs more information
define('CUSTOMER_HAS_PROVIDED_MORE_INFO_ADMIN_ORDER' , '7'); // Customer has provided more info to the admin
define('CUSTOMER_HAS_PROVIDED_MORE_INFO_MEDIC_ORDER' , '8'); // Customer has provided more info to the medic

// constants for questions
define('MEDICAL_CONDITION_QUESTION_GENERAL' , '0');
define('MEDICAL_CONDITION_QUESTION_SPECIFIC' , '1');

// error messages
define('ANSWER_SELECTION_REQUIRED', 'Please select one option');
define('MORE_INFO_REQUIRED_YES_SOMETIMES', 'Please provide more details');


$db[ 'host' ] = 'localhost';
$db[ 'user' ] = 'root';
$db[ 'password' ] = '';
$db[ 'database' ] = 'jp';

$loadModules[ 'module' ][ 'condition' ] = 'ConditionManager';
$loadModules[ 'name' ][ 'condition' ] = 'ConditionManager.class.php';
$loadModules[ 'manager' ][ 'condition' ] = 'ConditionManager';
$loadModules[ 'dependency' ][ 'condition' ] = 'mysqli';
$loadModules[ 'attach' ][ 'condition' ][ 0 ] = 'page'; 

$loadModules[ 'module' ][ 'page' ] = 'PageManager';
$loadModules[ 'name' ][ 'page' ] = 'PageManager.class.php';
$loadModules[ 'manager' ][ 'page' ] = 'PageManager';
$loadModules[ 'dependency' ][ 'page' ] = 'mysqli';
$loadModules[ 'attach' ][ 'page' ][ 0 ] = 'category'; 

$loadModules[ 'module' ][ 'category' ] = 'CategoryManager';
$loadModules[ 'name' ][ 'category' ] = 'CategoryManager.class.php';
$loadModules[ 'manager' ][ 'category' ] = 'CategoryManager';
$loadModules[ 'dependency' ][ 'category' ] = 'mysqli';
