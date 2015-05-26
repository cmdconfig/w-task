<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/26/15
 * Time: 12:32 AM
 */

/**
 * Функция для вывода языков
 *
 * @param	mixed	The string to translate
 * @param	array	The parameters
 * @return	string
 */
if ( ! function_exists('__'))
{
    function __($string, $params = array(), $default = null, $language = null)
    {
        return \Core\Lang::get($string, $params, $default, $language);
    }
}