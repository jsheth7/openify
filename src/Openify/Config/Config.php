<?php

namespace Openify\Config;

use Symfony\Component\Yaml\Yaml;

class Config {

    public function get(){
        $array = Yaml::parse($file);
        return $array;
        //print Yaml::dump($array);
    }

} 