<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/25/15
 * Time: 7:05 PM
 */

class Controller_Lk {

    function __construct(){

    }

    public function action_index(){
        var_dump('lk action_index');

    }

    public function action_register(){
        $result = \Core\View::forge('lk',['asd'=>'lk register1']);
        return $result;
    }
}