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
    public static $loader;

    public function __construct(){
//        spl_autoload_register(array($this,'model'));
    }

    public static function init() {
        if (self::$loader == NULL)
            self::$loader = new self();

        return self::$loader;
    }

    public function model($class){
        $class = preg_replace('/_model$/ui','',$class);

        var_dump($class);
        set_include_path(get_include_path().PATH_SEPARATOR.'/model/');
//        set_include_path(APPPATH.'classes/model/');
        spl_autoload_extensions('.model.php');
        spl_autoload($class);
    }

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

        if(empty($class)){
            $class = 'index';
        }

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
