<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title>Тестовое задание</title>
    <?=\Core\Asset::js([
        'jquery-2.1.1.min.js',
        'jquery-ui/jquery-ui.min.js',
        'JQuery.JSAjaxFileUploader.js',
        'jQuery-Mask/jquery.mask.js',

        'index.js',
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
        'index.css',
        'jquery-ui.css'
    ]);?>
</head>
<body>

