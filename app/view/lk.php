<div id="body-wrapper">
    <div id="ava-wrapper">
        <img src="/data/ava/<?=$data['ava_file_name']?>" id="ava">
    </div>
    <div id="name-wrapper">
        <?=$data['surname']?> <?=$data['u_name']?>
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