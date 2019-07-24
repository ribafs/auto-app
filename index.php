<?php
require_once __DIR__.'/load_files.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_cache_expire(60);
  session_start();
  $_SESSION[SYSTEM_ACRONYM]['lang']='en-us';
  $_SESSION[SYSTEM_ACRONYM]['step']=0;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo SYSTEM_NAME.' - v'.SYSTEM_VERSION ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require_once __DIR__.'/jumbotron.php';

$stepZero = ( stepHelper::getStep() == 0 );
$langEn   = ( ArrayHelper::get($_REQUEST,'language') == null );
if( $stepZero && $langEn ) {
  require_once __DIR__.'/step00.php';
} else{
  $lang = ArrayHelper::get($_REQUEST,'language');
  langHelper::setLang($lang);
  var_dump(langHelper::getLang());
}