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

    public function post_go(){

//        var_dump($_POST['form']);
        if(!empty($_POST['form'])){

            \Model\Users::forge('mainServer')->addUser($_POST['form']);
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
        if(!empty($_POST['u_email'])){
            $result = \Model\Users::forge('mainServer')->checkUser($_POST['u_email']);

        }

        echo $result;
    }
}