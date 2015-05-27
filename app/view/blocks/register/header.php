<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title>Тестовое задание</title>
    <script>
        var emptyField = '<?=__('register.empty_field',\Core\Session::get('lang'))?>';
        var valid_email = '<?=__('register.valid_email',\Core\Session::get('lang'))?>';
        var email_exists = '<?=__('register.email_exists',\Core\Session::get('lang'))?>';
        var captcha_err = '<?=__('register.captcha_err',\Core\Session::get('lang'))?>';
        var getFile = '<?=__('register.getFile',\Core\Session::get('lang'))?>';
        var uploadFile = '<?=__('register.uploadFile',\Core\Session::get('lang'))?>';

    </script>
<?=\Core\Asset::js([
    'jquery-2.1.1.min.js',
    'jquery-ui/jquery-ui.min.js',
    'JQuery.JSAjaxFileUploader.js',
    'jQuery-Mask/jquery.mask.js',

    'register.js',
    'main.js'
]);
?>
<?
$lang = \Core\Session::get('lang');
if(empty($lang) || $lang == 'ru'){
    echo \Core\Asset::js(['datepicker_ru.js']);
}
?>
<?=\Core\Asset::css([
    'register.css',
    'jquery-ui.css'
]);?>

</head>
<body>

