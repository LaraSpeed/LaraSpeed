<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 11:52 ص
 */

namespace Berthe\Codegenerator\Templates;


class SchemaTemplate extends Templater
{
    public $template = "schema";
    public $outDir = "database/migrations";

    /**
     * Get the path the Schema file which will be created.
     * @param $tableName
     * @return string
     */
    function getPath($tableName)
    {
        return base_path($this->outDir).'/20'.date('y_m_0j_his').'_create_'.$tableName.'_table.php';
    }

}