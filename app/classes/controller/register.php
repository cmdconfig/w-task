<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/25/15
 * Time: 11:51 PM
 */

class Controller_Register {

    function __construct(){
//        $_SESSION['test']='Hello world!';
    }

    public function action_index(){

        \Core\View::forge('register',['asd'=>'register']);

    }
}