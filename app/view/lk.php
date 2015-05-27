<div id="body-wrapper">
    <div id="lang">
        <?if(\Core\Session::get('lang') == 'ru'):?>
            <img src="/assets/img/en.png" id="lang-img" lang="en">
        <?else:?>
            <img src="/assets/img/ru.png" id="lang-img" lang="ru">
        <?endif;?>
    </div>
    <div id="ava-wrapper">
        <img src="/data/ava/<?=empty($data['ava_file_name']) ? 'emptyreview.png' : $data['ava_file_name']?>" id="ava">
    </div>
    <div id="name-wrapper">
        <?=$data['surname']?> <?=isset($data['u_name']) ? $data['u_name'] : $data['name']?>
    </div>
    <div id="info-wrapper">

        <table id="info_table">
            <tr>
                <td><?=__('register.phone',\Core\Session::get('lang'))?></td>
                <td><?=$data['phone']?></td>
            </tr>
            <tr>
                <td><?=__('register.email',\Core\Session::get('lang'))?></td>
                <td><?=$data['email']?></td>
            </tr>
            <tr>
                <td><?=__('register.birth',\Core\Session::get('lang'))?></td>
                <td><?=$data['birth']?></td>
            </tr>
            <tr>
                <td><?=__('register.sex',\Core\Session::get('lang'))?></td>
                <td><?=__('register.sex_'.strtolower($data['sex']),\Core\Session::get('lang'))?></td>
            </tr>
        </table>
    </div>
    <div id="exitButton-wrapper">
        <input id="exitButton" type="button" value="<?=__('register.exit_button',\Core\Session::get('lang'))?>"></div>
</div>