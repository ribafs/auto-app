<?php

class langHelper {

    public static function getLang()
    {
        $lang = $_SESSION[SYSTEM_ACRONYM]['lang'];
        return $lang;
    }

    public static function getMsg($keyMsg)
    {
        $lang = self::getLang();
        require_once __DIR__.'/../lang/'.$lang.'.php';

        $keyExist = array_key_exists($keyMsg, $msg);
        if($keyExist){

        }
        return $lang;
    }
}