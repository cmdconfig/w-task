<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/25/15
 * Time: 6:50 PM
 */
//phpinfo(INFO_VARIABLES);die();
error_reporting(E_ALL);
ini_set("display_errors", 1);

define('APPPATH', realpath('app/').'/');
define('COREPATH', realpath('core').'/');
define('ASSETPATH', realpath('assets').'/');

//var_dump($_SERVER["REQUEST_URI"]);

include_once COREPATH."config.php";
include_once COREPATH."base.php";
include_once COREPATH."lang.php";
include_once COREPATH.'autoloader.php';
include_once COREPATH.'asset.php';
include_once COREPATH.'view.php';

$Autoloader = new \Core\Autoloader();

$Controller = $Autoloader::load_classes($_SERVER["REQUEST_URI"]);

if(!empty($_POST)){
    $method = 'post_'.\Core\Autoloader::$method;
    $Controller->$method();
} else {
    $method = 'action_'.\Core\Autoloader::$method;

    $Controller->$method();
}

