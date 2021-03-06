<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/25/15
 * Time: 11:37 PM
 */

namespace Core;


class Asset {
    /**
     * Метод подгрузки файлов js
     * @param array $files
     * @return string
     */
    public static function js($files = []){
        $result = [];
        foreach($files as $val){

            if(file_exists(ASSETPATH.'js/'.$val)){
                $result[]='<script type="text/javascript" src="http://'.$_SERVER["SERVER_NAME"].'/assets/js/'.$val.'"></script>';
            }

        }

        return join("\r\n",$result)."\r\n";
    }

    /**
     * Метод подгрузки файлов css
     * @param $files
     * @return string
     */
    public static function css($files){
        $result = [];
        foreach($files as $val){

            if(file_exists(ASSETPATH.'css/'.$val)) {
                $result[] = '<link type="text/css" rel="stylesheet" href="http://' . $_SERVER["SERVER_NAME"] . '/assets/css/' . $val . '" />';
            }
        }
        return join("\r\n",$result)."\r\n";
    }
}