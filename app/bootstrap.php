<?php
/**
 *
 * Created by PhpStorm.
 * User: asm
 * Date: 5/26/15
 * Time: 8:58 PM
 */

$autoloader = new NamespaceAutoloader();
$autoloader->addNamespace('Model', APPPATH.'classes/model');
$autoloader->addNamespace('Core', COREPATH);
$autoloader->addNamespace('Helpers', APPPATH.'classes/helpers');
$autoloader->register();

if(!\Core\Session::get('lang')){
    \Core\Session::set('lang','ru');
}

$Autoloader = \Core\Autoloader::init();

$Controller = $Autoloader::load_classes($_SERVER["REQUEST_URI"]);

if(!empty($_POST)){
    $method = 'post_'.\Core\Autoloader::$method;
    $Controller->$method();
} else {
    $method = 'action_'.\Core\Autoloader::$method;

    $Controller->$method();
}
