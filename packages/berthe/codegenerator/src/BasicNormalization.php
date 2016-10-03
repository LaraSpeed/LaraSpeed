<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:46 م
 */

namespace Berthe\Codegenerator;


class BasicNormalization implements NormalizeInterface
{

    function normalize($stringToPrepends, $path)
    {
        $content = file_get_contents($path);

        //Normalize Code
        $content = str_replace('S3B', '@', $content);
        file_put_contents($path, "$stringToPrepends".$content);
        chmod($path, 0777);
    }
}