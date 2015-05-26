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
session_start();
define('APPPATH', realpath('app/').'/');
define('COREPATH', realpath('core').'/');
define('ASSETPATH', realpath('assets').'/');
define('DATAPATH', realpath('data').'/');
define('AVAPATH', realpath('data/ava').'/');
define('VENDORSPATH', realpath('app/vendors').'/');

//var_dump($_SERVER["REQUEST_URI"]);

include_once COREPATH."config.php";
include_once COREPATH."session.php";

include_once COREPATH."base.php";
include_once COREPATH."lang.php";
include_once COREPATH.'autoloader.php';
include_once COREPATH.'asset.php';
include_once COREPATH.'view.php';
require_once COREPATH.'namespace_autoloader.php';
require APPPATH.'bootstrap.php';

