<div id="body-wrapper">
    <div id="login-wrapper">
        <form method="post" action="/lk/enter" id="enter_form">
            <table>
                <tr>
                    <td><label for="u_email">email</label></td>
                    <td><input type="text" name="u_email" id="u_email"></td>
                </tr>
                <tr>
                    <td><label for="u_pass"><?=__('index.pass',\Core\Session::get('lang'))?></label></td>
                    <td><input type="text" name="u_pass" id="u_pass"></td>
                </tr>
            </table>
            <input type="submit" id="enter" value="<?=__('index.enter',\Core\Session::get('lang'))?>">
        </form>
    </div>
    <br />
    <a href="/register"><?=__('index.register',\Core\Session::get('lang'))?></a>
    <div id="downloadSrc-wrapper">
        <a href="/data/w-task.zip"><?=__('index.download_src',\Core\Session::get('lang'))?></a>
    </div>
</div>

