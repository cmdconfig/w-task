<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/26/15
 * Time: 12:27 AM
 */

namespace Core;


class Lang {


    /**
     * @param $string
     * @param $setLang
     * @return mixed
     */
    public static function get($string,$setLang){
        $langArr = [];
        $lang = explode('.',$string);

        $file = APPPATH.'lang/'.$setLang.'/'.$lang[0].'.php';
        if(file_exists($file)){
            include_once $file;
            return $langArr[$lang[1]];
        }
    }
}