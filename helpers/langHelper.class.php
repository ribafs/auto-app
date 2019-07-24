<?php

class langHelper {
    public const EN = 'en-su';

    public static function setLang($lang)
    {
        $_SESSION[SYSTEM_ACRONYM]['lang'] = $lang;
    }
    
    public static function getLang()
    {
        $lang = $_SESSION[SYSTEM_ACRONYM]['lang'];
        return $lang;
    }

    public static function getMsg($keyMsg)
    {
        $lang = self::getLang();
        require __DIR__.'/../lang/'.$lang.'.php';
        $keyExist = array_key_exists($keyMsg, $msgList);
        $text = null;
        if($keyExist){
            $text = $msgList[$keyMsg];
        }else{
            $msg = self::getMsg('ERROR-KEY-LANG');
            throw new InvalidArgumentException($msg.' key: '.$keyMsg);
        }
        return $text;
    }

    public static function showMsg($keyMsg)
    {
        $msg = self::getMsg($keyMsg);
        echo $msg;
    }

    public static function showHtmlLang()
    {
        $lang = self::getLang();
        echo '<html lang="'.$lang.'">';
    }

    public static function showNameVersion()
    {
        $name = self::getMsg('APP-TITLE');
        echo $name.' - v'.SYSTEM_VERSION;
    }

}