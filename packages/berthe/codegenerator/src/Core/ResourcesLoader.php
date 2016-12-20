<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 24/10/16
 * Time: 11:51 ص
 */

namespace Berthe\Codegenerator\Core;


class ResourcesLoader
{
    public $resources;
    public $images;

    public function __construct($resources = array(), $img = array()){
        $this->resources = $resources;
        $this->images = $img;
    }

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