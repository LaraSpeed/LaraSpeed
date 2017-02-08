<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:26 م
 */

namespace Berthe\Codegenerator\Contrats;


interface NormalizeInterface
{
    function normalize($stringToPrepends, $path);
}