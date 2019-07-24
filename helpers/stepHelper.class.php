<?php

class stepHelper {

    public static function setStep($step)
    {
        $_SESSION[SYSTEM_ACRONYM]['step'] = $step;
    }
    
    public static function getStep()
    {
        $lang = $_SESSION[SYSTEM_ACRONYM]['step'];
        return $lang;
    }
}