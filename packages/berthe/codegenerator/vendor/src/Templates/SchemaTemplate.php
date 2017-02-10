<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 11:52 ص
 *
 * This Class handle parameter necessary for generating Schema of table, We found thing like "path to schema folder".
 */

namespace Berthe\Codegenerator\Templates;


class SchemaTemplate extends Templater
{
    /**
     * Template type name
     *
     * @var string
     */
    public $template = "schema";

    /**
     * Path to the folder where schema will to stored
     *
     * @var string
     */
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