<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:57 م
 *
 * This class is used to perform Inherit normalization to  generated files by adding line of code to the beginning or the end of files,
 * It's mainly used when wanted to add (@extends("master") or @section to generated file
 */

namespace Berthe\Codegenerator\Normalizer;

use Berthe\Codegenerator\Contrats\NormalizeInterface;
use Berthe\CodeGenerator\Utils\FileUtils;

class InheritMaster implements NormalizeInterface
{

    /**
     * Variable
     *
     * @var NormalizeInterface
     */
    public $normalize;

    /**
     * InheritMaster constructor.
     * @param NormalizeInterface $normalize
     */
    public function __construct(NormalizeInterface $normalize)
    {
        $this->normalize = $normalize;
    }

    /**
     * Perform the normalization
     *
     * @param $stringToPrepends
     * @param $path
     */
    function normalize($stringToPrepends, $path)
    {
        $this->normalize->normalize($stringToPrepends, $path);

        FileUtils::prependString("@extends('master')\n@section('content')\n", $path);
        FileUtils::appendString("@endsection", $path);
    }
}