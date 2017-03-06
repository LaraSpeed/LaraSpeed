<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 24/10/16
 * Time: 11:51 ص
 *
 * This Class is used to load resources for the project, it load css, js, php and image file.
 */

namespace Berthe\Codegenerator\Core;


class ResourcesLoader
{
    /**
     * List of text resources to be loaded
     *
     * @var array
     */
    public $resources;

    /**
     * List of image resources to be loaded
     *
     * @var array
     */
    public $images;

    /**
     * ResourcesLoader constructor.
     * @param array $resources
     * @param array $img
     */
    public function __construct($resources = array(), $img = array()){
        $this->resources = $resources;
        $this->images = $img;
    }

    /**
     * Load text resources for the actual project if they didn't exist
     *
     * @return $this
     */
    public function load(){
        foreach ($this->resources as $input => $output){
            $p = base_path($output);

            if(!file_exists($p)) {
                $content = file_get_contents(__DIR__ . '/../views/' . $input);
                file_put_contents($p, $content);
            }
        }
        return $this;
    }

    /**
     * Load image resources for the actual project if they didn't exist
     *
     */
    public function loadImages()
    {
        foreach ($this->images as $oldPath => $newPath){
            $p = base_path($newPath);

            if(!file_exists($p)) {
                \File::copy(__DIR__ . '/../views/' . $oldPath, $p);
            }
        }
    }
    
    
}