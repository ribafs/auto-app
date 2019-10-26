<?php
/**
 * Part of SysGen
 *
 * @author  Bjverde <bjverde@yahoo.com.br>
 * @link    https://github.com/bjverde/sysgen
 *
 * PHP Version 5.6
 */
class TGeneratorHelper
{ 
    public static function mkDir($path)
    {
        if (!is_dir($path)) {
            mkdir($path, 0744, true);
        }
    }
    public static function getPathNewSystem()
    {
        return ROOT_PATH.$_SESSION[SYSTEM_ACRONYM]['GEN_SYSTEM_ACRONYM'];
    }
    public static function createRootDirNewApp()
    {
        $path = self::getPathNewSystem();
        self::mkDir($path);
    }

    public static function copySystemSkeletonToNewSystemByTpSystem($pathSkeleton)
    {
        $pathNewSystem = self::getPathNewSystem();
        
        $list = new RecursiveDirectoryIterator($pathSkeleton);
        $it   = new RecursiveIteratorIterator($list);
        
        foreach ($it as $file) {
            if ($it->isFile()) {
                //echo ' SubPathName: ' . $it->getSubPathName();
                //echo ' SubPath:     ' . $it->getSubPath()."<br>";
                self::mkDir($pathNewSystem.DS.$it->getSubPath());
                copy($pathSkeleton.DS.$it->getSubPathName(), $pathNewSystem.DS.$it->getSubPathName());
            }
        }
    }

    public static function copySystemSkeletonToNewSystem()
    {
        $pathSkeleton  = 'system_skeleton';
        self::copySystemSkeletonToNewSystemByTpSystem($pathSkeleton);
    }
}