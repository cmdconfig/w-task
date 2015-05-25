<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/25/15
 * Time: 7:58 PM
 */

namespace Core;


class Autoloader {
    public static $method;


    public static function load_classes($uri) {


        $classWithPath = explode('/',$uri);
        $class = $classWithPath[count($classWithPath)-2];
        self::$method = $classWithPath[count($classWithPath)-1];

        if(empty($class) && count($classWithPath) <> 2){
            $class = 'index';
        } elseif (count($classWithPath) == 2){
            $class = $classWithPath[count($classWithPath)-1];
        }
        if(empty(self::$method) || count($classWithPath) == 2 ){
            self::$method = 'index';
        }

//        var_dump($classWithPath);
//        var_dump(count($class));
//        var_dump(self::$method);
//        die();
        if(file_exists(APPPATH.'classes/controller/'.$class.'.php')){
            include_once APPPATH.'classes/controller/'.$class.'.php';
            $class = 'Controller_'.ucfirst($class);
            if(class_exists($class)){
                return new $class;
            }
        }

        return false;

    }

}