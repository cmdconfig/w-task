<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/25/15
 * Time: 6:57 PM
 */

class Controller_Index {

    function __construct(){

    }

    
    public function action_index(){
        $result = \Core\View::forge('index',['asd'=>'index main']);
    }

    public function post_register(){

    }
}