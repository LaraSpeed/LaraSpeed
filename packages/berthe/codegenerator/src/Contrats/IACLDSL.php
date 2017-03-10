<?php
/**
 * Created by PhpStorm.
 * User: minfo
 * Date: 10/03/2017
 * Time: 20:09
 */

namespace Berthe\Codegenerator\Contrats;


interface IACLDSL
{
    public function role($name = "");
    public function domain($name = "");
    public function droit($name = "");
    public function end();
}