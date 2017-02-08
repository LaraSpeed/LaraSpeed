<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 05/10/16
 * Time: 11:19 ص
 *
 * This contract is for Laravel relations which need foreign key and constraint to be setup
 */

namespace Berthe\Codegenerator\Contrats;


interface ConstraintRelationInterface
{
    function getForeignConstraintView();
    function getDropTableConstraintView();
}