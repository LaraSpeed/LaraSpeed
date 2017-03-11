<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 11/03/2017
 * Time: 10:39
 */

namespace Berthe\Codegenerator\Normalizer;


use Berthe\Codegenerator\Contrats\NormalizeInterface;
use Berthe\Codegenerator\Utils\FileUtils;

class SimpleInheritMaster implements NormalizeInterface
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

        FileUtils::prependString("@extends('simpleMaster')\n@section('content')\n", $path);
        FileUtils::appendString("@endsection", $path);
    }
}