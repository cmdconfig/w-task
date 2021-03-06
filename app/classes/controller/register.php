<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/25/15
 * Time: 11:51 PM
 */

use Model\Users;
class Controller_Register {

    private $checkFields = ['u_name','u_surname','u_email','u_pass','u_phone','u_birth','ct_captcha'];

    function __construct(){
    }

    /**
     * Метод отчечает за вывод формы регистрации
     */
    public function action_index(){
        \Core\View::forge('register',['asd'=>'register']);
    }

    /**
     * Регистрация пользователя
     * @return bool
     */
    public function post_go(){;
        if(!empty($_POST['form'])){
            $chForm = $this->checkForm($_POST['form']);
            if(!empty($chForm)){
                echo json_encode($chForm);
                return false;
            }
            $Users = \Model\Users::forge('mainServer');
            $form = Helpers\Main::prepareArr($_POST['form']);
            $chEmailExists = $Users->checkUser($form['u_email']);
            if(isset($chEmailExists['id'])){
                return ['u_email_v'];

            }
            $result = $Users->addUser($_POST['form']);

            if($result){
                $form = Helpers\Main::removeU($form);

                \Core\Session::set('uData',$form);
                echo 'ok';
                return true;
            }
        }
    }

    /**
     * Метод проверки каптчи
     */
    public function post_check_captcha(){
        require_once VENDORSPATH.'securimage/securimage.php';
        $image = new Securimage();

        if ($image->check($_POST['ct_captcha']) == true) {
            echo true;
        } else {
            echo false;
        }
    }

    /**
     * Метод загрузки изображений
     */
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

    /**
     * Метод проверки наличия почты
     */
    public function post_check_email(){
        $result = false;
        if(!empty($_POST['email'])){
            $result = Users::forge('mainServer')->checkUser($_POST['email']);
        }


        if(isset($result['id'])){
            echo true;
        }
    }

    /**
     * Метод проверки формы
     * @param $form
     * @return array
     */
    private function checkForm($form){
        $error = [];


        $form = Helpers\Main::prepareArr($form);
        foreach($this->checkFields as $key){
            if(empty($form[$key])){
                $error[] = $key;
            }
        }

        if (!filter_var($form['u_email'], FILTER_VALIDATE_EMAIL)) {
            if(!array_search('u_email',$form)){
                $error[] = 'u_email_v' ;
            }
        }

        return $error;
    }
}