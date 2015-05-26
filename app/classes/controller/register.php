<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/25/15
 * Time: 11:51 PM
 */

use Model\Users;
class Controller_Register {

    function __construct(){
    }

    public function action_index(){

        \Core\View::forge('register',['asd'=>'register']);

    }

    public function post_go(){;
        if(!empty($_POST['form'])){
            $result = \Model\Users::forge('mainServer')->addUser($_POST['form']);
            if($result){
                \Core\Session::set('uData',$_POST['form']);
                return true;
            }
        }
    }

    public function post_check_captcha(){
        require_once VENDORSPATH.'securimage/securimage.php';
        $image = new Securimage();

        if ($image->check($_POST['ct_captcha']) == true) {
            echo true;
        } else {
            echo false;
        }
    }

    public function post_upload_ava(){
        $uploadDir = DATAPATH.'ava/';
        $path_info = pathinfo($_FILES['file']['name']);;
        $fileName = uniqid().'.'.$path_info['extension'];
        $uploadFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            echo $fileName;
        } else {
            echo false;
        }
    }

    public function post_check_email(){
        $result = false;
        if(!empty($_POST['email'])){
            $result = Users::forge('mainServer')->checkUser($_POST['email']);
        }

        echo $result;
    }
}