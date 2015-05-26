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
        $result = [];
        if(isset($_POST['u_email']) && isset($_POST['u_pass'])){
            $result = \Model\Users::forge('mainServer')->getUserByLoginPass($_POST['u_email'],$_POST['u_pass']);

            if(!empty($result)){
                \Core\Session::set('uData',$result);
                header('Location: /lk');


            } else {
                header('Location: /');
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

    public function post_exit(){
        session_destroy();
        $uData = \Core\Session::get('uData');
        if(empty($uData)){
            echo true;
        }


    }
}