<div id="body-wrapper">
    <div id="lang">
        <?if(\Core\Session::get('lang') == 'ru'):?>
            <img src="/assets/img/en.png" id="lang-img" lang="en">
        <?else:?>
            <img src="/assets/img/ru.png" id="lang-img" lang="ru">
        <?endif;?>
    </div>
    <div id="reg_title"><?=__('register.title',\Core\Session::get('lang'))?></div>
    <form name="register" action="" method="post" id="register_form" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="u_name"><?=__('register.name',\Core\Session::get('lang'))?></label></td>
                <td><input type="text" class="u_reg_input" name="u_name" id="u_name"></td>
            </tr>
            <tr>
                <td><label for="u_surname"><?=__('register.surname',\Core\Session::get('lang'))?></label></td>
                <td><input type="text" class="u_reg_input" name="u_surname" id="u_surname"></td>
            </tr>
            <tr>
                <td><label for="u_email"><?=__('register.email',\Core\Session::get('lang'))?></label></td>
                <td><input type="text" class="u_reg_input" name="u_email" id="u_email"></td>
            </tr>
            <tr>
                <td><label for="u_pass"><?=__('register.pass',\Core\Session::get('lang'))?></label></td>
                <td><input type="password" class="u_reg_input" name="u_pass" id="u_pass">
                </td>
            </tr>
            <tr>
                <td><label for="u_pass_conf"><?=__('register.pass_conf',\Core\Session::get('lang'))?></label></td>
                <td><input type="password" class="u_reg_input" name="u_pass_conf" id="u_pass_conf">
                    <span id="checkPassTrue"><?=__('register.checkPassTrue',\Core\Session::get('lang'))?></span>
                    <span id="checkPassFalse"><?=__('register.checkPassFalse',\Core\Session::get('lang'))?></span>
                </td>
            </tr>
            <tr>
                <td><label for="u_phone"><?=__('register.phone',\Core\Session::get('lang'))?></label></td>
                <td><input type="text" class="u_reg_input" name="u_phone" id="u_phone"></td>
            </tr>
            <tr>
                <td><label for="u_birth"><?=__('register.birth',\Core\Session::get('lang'))?></label></td>
                <td><input type="text" class="u_reg_input" name="u_birth" id="u_birth"></td>
            </tr>
            <tr>
                <td><?=__('register.sex',\Core\Session::get('lang'))?></td>
                <td>
                    <div id="u_sex_radioset">
                        <input type="radio" name="u_sex" id="u_sex_m" value="m"><label for="u_sex_m">
                            <?=__('register.sex_m',\Core\Session::get('lang'))?></label>
                        <input type="radio" name="u_sex" id="u_sex_w" value="w"><label for="u_sex_w">
                            <?=__('register.sex_w',\Core\Session::get('lang'))?></label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Фотография</td>
                <td>
                    <input type="button" id="load_ava" value="<?=__('register.uploadPhoto',\Core\Session::get('lang'))?>">
                    <span><img src="" id="u_ava"></span>
                    <input type="hidden" id="u_ava_file_name" name="u_ava_file_name">
                </td>
            </tr>
            <tr>
                <td><label for="u_captcha"><?=__('register.captcha',\Core\Session::get('lang'))?></label></td>
                <td>
                    <?include_once VENDORSPATH.'securimage/captcha.html'?>


                </td>
            </tr>

        </table>
        <input type="button" id="finish_reg" value="<?=__('register.finish_reg',\Core\Session::get('lang'))?>">
    </form>
</div>
<div id="uploadFile"></div>
<div id="login-wrapper">
    <form method="post" action="/lk/enter" id="enter_form">
        <table>
            <tr>
                <td><label for="u_email">email</label></td>
                <td><input type="text" name="u_email" id="u_email"></td>
            </tr>
            <tr>
                <td><label for="u_pass_login"><?=__('index.pass',\Core\Session::get('lang'))?></label></td>
                <td><input type="password" name="u_pass" id="u_pass_login"></td>
            </tr>
        </table>
        <input type="submit" id="enter" value="<?=__('index.enter',\Core\Session::get('lang'))?>">
    </form>
</div>


