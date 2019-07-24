<?php
require_once __DIR__.'/load_files.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_cache_expire(60);
  session_start();
  $_SESSION[SYSTEM_ACRONYM]['lang']='en-us';
  $_SESSION[SYSTEM_ACRONYM]['step']=0;
}

require_once __DIR__.'/header.php';
require_once __DIR__.'/jumbotron.php';

$formId = ArrayHelper::get($_REQUEST,'formid');
if( $formId == null ) {
  require_once __DIR__.'/step00.php';
} elseif( $formId == 'language' ){
  $lang = ArrayHelper::get($_REQUEST,'language');
  langHelper::setLang($lang);
  stepHelper::setStep(1);
  var_dump(langHelper::getLang());
  require_once __DIR__.'/step01.php';
}
require_once __DIR__.'/footer.php';