<?php
require_once __DIR__.'/load_files.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_cache_expire(60);
  session_start();
  $_SESSION[SYSTEM_ACRONYM]['lang']='en-us';
  $_SESSION[SYSTEM_ACRONYM]['step']=0;
}

require_once __DIR__.'/view/header.php';


if(file_exists('./classes/connection.php')){
  require_once __DIR__.'/show_system.php';
}else{
  require_once __DIR__.'/view/jumbotron.php';
  $formId = ArrayHelper::get($_REQUEST,'formid');
  if( $formId == null ) {
    require_once __DIR__.'/view/step00.php';
  } elseif( $formId == 'language' ){
    $lang = ArrayHelper::get($_REQUEST,'language');
    langHelper::setLang($lang);
    stepHelper::setStep(1);
    require_once __DIR__.'/view/step01.php';
  }else{  
    stepHelper::setStep(2);
    require_once __DIR__.'/view/step02.php';
  }
}
require_once __DIR__.'/view/footer.php';