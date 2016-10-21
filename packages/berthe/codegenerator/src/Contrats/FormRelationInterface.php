<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 05/10/16
 * Time: 11:16 ص
 */

namespace Berthe\Codegenerator\Contrats;


interface FormRelationInterface
{
    function getFormView();
    function getDisplayView();
    function getEditView();
}