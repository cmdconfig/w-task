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

    /**
     * Метод отвечает за вывод первой сраницы
     */
    public function action_index(){
        $result = \Core\View::forge('index',['asd'=>'index main']);
    }

    public function post_lang(){
        if(isset($_POST['lang'])){
            \Core\Session::set('lang',$_POST['lang']);
            echo true;
        }
    }
}