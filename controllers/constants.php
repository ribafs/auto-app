<?php
session_start();

define('SYSTEM_NAME'    , 'PHP Automatic Application');
define('SYSTEM_ACRONYM' , 'auto-app');
define('SYSTEM_VERSION' , '1.2.0');

define('ROOT_PATH', '../');

if(!defined('DS')) { 
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined('EOL')) {
    define('EOL', "\n");
}
if (!defined('ESP')) {
    define('ESP', '    ');
}
if (!defined('TAB')) {
    define('TAB', chr(9));
}