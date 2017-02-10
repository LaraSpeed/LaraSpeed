<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:46 م
 *
 * This class is used to perform Basic normalization to  generated files by adding line of code to the beginning or the end of files,
 * replacing some characters.
 */

namespace Berthe\Codegenerator\Normalizer;

use Berthe\Codegenerator\Contrats\NormalizeInterface;


class BasicNormalization implements NormalizeInterface
{

    /**
     * Realize the normalization (cause PHP interpret some characters).
     *
     * @param $stringToPrepends
     * @param $path
     */
    function normalize($stringToPrepends, $path)
    {
        $content = file_get_contents($path);

        //Normalize Code
        $content = str_replace('S3B', '@', $content);
        $content = str_replace('S2BOBRACKET', '{{', $content);
        $content = str_replace('S2BCBRACKET', '}}', $content);
        $content = str_replace('S2CBOBRACKET', '{!!', $content);
        $content = str_replace('S2CBCBRACKET', '!!}', $content);
        file_put_contents($path, "$stringToPrepends".$content);
        chmod($path, 0777);
    }
}