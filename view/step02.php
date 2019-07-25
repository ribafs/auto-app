<?php
var_dump($_REQUEST);

$host = ArrayHelper::get($_POST,'host');
if($host){

$db   = ArrayHelper::get($_POST,'db');
$user = ArrayHelper::get($_POST,'user');
$pass = ArrayHelper::get($_POST,'pass');
$sgbd = ArrayHelper::get($_POST,'dbms');
$port = ArrayHelper::get($_POST,'port');
$_SESSION[SYSTEM_ACRONYM]['GEN_SYSTEM_ACRONYM'] = ArrayHelper::get($_POST,'GEN_SYSTEM_ACRONYM');

TGeneratorHelper::createRootDirNewApp();
TGeneratorHelper::copySystemSkeletonToNewSystem();


/*
$content = "<?php

class Connection
{
	private \$host = '$host';
	private \$db = '$db';
	private \$user = '$user';
	private \$pass = '$pass';
	public  \$sgbd = '$sgbd';
	private \$port = '$port';
";

    if(is_readable('./classes/connection.txt')){
        $fp = fopen('./classes/connection.txt', "r");
        $content2 = fread($fp, filesize ('./classes/connection.txt'));
        fclose($fp);
    }else{
        echo "<script>alert('The directory classes require read permission to web server!')</script>";
        exit;
    }

    $content .=$content2;

    if(is_writable('./classes')){
        $fp = fopen('./classes/connection.php', "w");
        fwrite($fp, $content);
        fclose($fp);
    }else{
        echo "<script>alert('The directory classes require write permission to web server!')</script>";
        exit();
    }

    header('location: index.php');
    */
}
?>
