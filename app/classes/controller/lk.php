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

    public function post_enter(){

        if(isset($_POST['email']) && isset($_POST['pass'])){
            $result = \Model\Users::forge('mainServer')->getUserByLoginPass($_POST['email'],$_POST['pass']);
            if(!empty($result)){
                \Core\Session::set('uData',$result);
                return true;
            }
        }
    }

    public function action_index(){
        $uData = \Core\Session::get('uData');
        if(empty($uData)){
            header('Location: /');
        } else {
            $result = \Core\View::forge('lk',$uData);
        }

    }

    public function action_register(){
        $result = \Core\View::forge('lk',['asd'=>'lk register1s']);
        return $result;
    }
}