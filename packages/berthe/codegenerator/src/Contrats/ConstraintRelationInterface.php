<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 05/10/16
 * Time: 11:19 ص
 */

namespace Berthe\Codegenerator\Contrats;


interface ConstraintRelationInterface
{
    function getForeignConstraintView();
    function getDropTableConstraintView();
}