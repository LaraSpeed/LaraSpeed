<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 05/10/16
 * Time: 10:45 ص
 */

namespace Berthe\Codegenerator\Contrats;


interface RelationSpecificationInterface
{
    function hasConstraints();
    function isFormDisplayable();
    function getRelationAccessor();
}