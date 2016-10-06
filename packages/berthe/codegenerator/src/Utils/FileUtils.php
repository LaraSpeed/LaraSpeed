<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:18 م
 */

namespace Berthe\Codegenerator\Utils;

use Berthe\Codegenerator\Contrats\NormalizeInterface;

class FileUtils
{
    /**
     * Helper function used to normalize to multiple file.
     * @param $toPrepend
     * @param $paths
     * @param $interfaceNormalize
     */
    public static function normalizeFile($toPrepend, $paths, NormalizeInterface $interfaceNormalize){
        foreach ($paths as $path){
            $interfaceNormalize->normalize($toPrepend, $path);
        }
    }

    /**
     * Prepends String to file.
     * @param $toPrepend
     * @param $path
     */
    public static function prependString($toPrepend, $path){
        $content = file_get_contents($path);
        file_put_contents($path, "$toPrepend".$content);
        chmod($path, 0777);
    }

    /**
     * Appends String to file.
     * @param $toAppend
     * @param $path
     */
    public static function appendString($toAppend, $path){
        $content = file_get_contents($path);
        file_put_contents($path, $content."$toAppend");
        chmod($path, 0777);
    }
}