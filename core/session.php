<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/26/15
 * Time: 1:11 AM
 */

namespace Core;


class Session {
    /**
     * @param string $name
     * @param mixed $data
     */
    public static function set($name,$data){
        $_SESSION[$name] = $data;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public static function get($name){
        if(empty($_SESSION[$name])){
            return false;
        }

        return $_SESSION[$name];
    }
}