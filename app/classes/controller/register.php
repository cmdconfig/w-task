<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/25/15
 * Time: 11:51 PM
 */

class Controller_Register {

    public function action_index(){
        \Core\View::forge('register',['asd'=>'register']);
    }
}