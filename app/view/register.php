<div id="body-wrapper">
<?//=__('register.name',\Core\Session::get('lang'))?>
    <form name="register">
        <table>
            <tr>
                <td><label for="u_name"><?=__('register.name',\Core\Session::get('lang'))?></label></td>
                <td><input type="text" name="u_name" id="u_name"></td>
            </tr>
            <tr>
                <td><label for="u_surname"><?=__('register.surname',\Core\Session::get('lang'))?></label></td>
                <td><input type="text" name="u_surname" id="u_surname"></td>
            </tr>
            <tr>
                <td><label for="u_name"><?=__('register.email',\Core\Session::get('lang'))?></label></td>
                <td><input type="text" name="u_email" id="u_email"></td>
            </tr>
            <tr>
                <td><label for="u_name"><?=__('register.phone',\Core\Session::get('lang'))?></label></td>
                <td><input type="text" name="u_email" id="u_email"></td>
            </tr>
            <tr>
                <td><label for="u_address"><?=__('register.address',\Core\Session::get('lang'))?></label></td>
                <td><textarea type="text" name="u_address" id="u_address"></textarea></td>
            </tr>
        </table>
    </form>
</div>