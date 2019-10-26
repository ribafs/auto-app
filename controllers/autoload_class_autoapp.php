<?php
if ( !function_exists( 'autoapp_class_autoload') ) {
    function autoapp_class_autoload( $class_name )
    {
        $path = __DIR__.DS.$class_name.'.class.php';
        if (file_exists($path)){
            require_once $path;
        } else {
            return false;
        }
    }
spl_autoload_register('autoapp_class_autoload');
}