<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/25/15
 * Time: 9:26 PM
 */

abstract class Controller {

    function __construct(){

    }

    public function loadView($view){
        include_once APPPATH.'view/blocks/'.$view.'/header.php';
        include_once APPPATH.'view/'.$view.'.php';
        include_once APPPATH.'view/blocks/'.$view.'/footer.php';
    }

    abstract function loadFiles($view);
}