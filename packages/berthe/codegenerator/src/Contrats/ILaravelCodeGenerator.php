<?php

namespace Berthe\Codegenerator\Contrats;

use Berthe\Codegenerator\Templates\Templater;
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 09:19 ص
 */
interface ILaravelCodeGenerator
{
    function generateLaravelModel();
    function generateLaravelSchema();
    function generateLaravelController();
    function generateLaravelForm();
    public function generateLaravelShowForm();
    function generateLaravel($template = "form", $outdir = "form");
    public function generate($type = "Form");
    public function generateLaravelSchemaConstraint($template = "constraints", $outdir="");
}

interface IAdvancedLaravelGenerator {
    function generateLaravelModel();
    function generateLaravelSchema();
    function generateLaravelController();
    function generateLaravelForm();
    public function generateLaravelShowForm();
    public function generateLaravelDisplaySingleElement();
    public function generateLaravelEditForm();
    public function generateLaravelRelatedForm();
    function generateLaravel(Templater $templater);
    public function generate($type = "Form");
    public function generateLaravelSchemaConstraint($template = "constraints", $outdir="");
    public function generateLaravelSimpleFile(Templater $templater);

}