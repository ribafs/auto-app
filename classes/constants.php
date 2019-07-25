<?php
if (! defined ( 'DS' )) {
    define('DS'   , DIRECTORY_SEPARATOR);
}

define('SYSTEM_NAME'    , 'PHP Automatic Application');
define('SYSTEM_ACRONYM' , 'auto-app');
define('SYSTEM_VERSION' , '1.2.0');

$session_status = session_status();
$session = $session_status !== PHP_SESSION_ACTIVE;
if ($session) {
    session_cache_expire(60);
    session_start();
    $_SESSION[SYSTEM_ACRONYM]['lang']='en-us';
    $_SESSION[SYSTEM_ACRONYM]['step']=0;
}



