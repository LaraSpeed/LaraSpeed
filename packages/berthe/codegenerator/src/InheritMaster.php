<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:57 م
 */

namespace Berthe\Codegenerator;


class InheritMaster implements NormalizeInterface
{

    public $normalize;

    public function __construct(NormalizeInterface $normalize)
    {
        $this->normalize = $normalize;
    }

    function normalize($stringToPrepends, $path)
    {
        $this->normalize->normalize($stringToPrepends, $path);

        FileUtils::prependString("@extends('master')\n@section('content')\n", $path);
        FileUtils::appendString("@endsection", $path);
    }
}