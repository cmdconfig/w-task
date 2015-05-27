<?php
/**
 * Title
 * Author: Petr Supe <cmdconfig@gmail.com
 * User: asm
 * Date: 8/3/14
 * Time: 10:16 PM
 */
 
 

namespace Helpers;


class Main {
    /**
     * @param $form
     * @return array
     */
    public static function prepareArr($form){
        $result = [];
        foreach($form as $val){
            $result[$val['name']] = $val['value'];
        }

        return $result;
    }

    public static function removeU($form){
        $result = [];
        foreach($form as $key=>$val){
            $tmpKey = str_replace("u_",'',$key);
            $result[$tmpKey] = $val;

        }
        return $result;
    }

} 