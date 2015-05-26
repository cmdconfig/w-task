<?php
/**
 * Title
 * Author: Petr Supe <cmdconfig@gmail.com
 * User: asm
 * Date: 8/3/14
 * Time: 10:16 PM
 */
 
 

namespace Helpers;


class Helpers_Main {

    /**Правельные окончания
     * @param $n
     * @param $titles
     * @return mixed
     */
    public static function  numberEnd($n, $titles) {
    $cases = array(2, 0, 1, 1, 1, 2);
    return $titles[($n % 100 > 4 && $n % 100 < 20) ? 2 : $cases[min($n % 10, 5)]];
    }

    /**
     * Прверка ИНН
     * @param $string
     * @return bool
     */
    public static function checkINN($string){

        if(strlen($string)== 10 || strlen($string)== 13 || strlen($string)== 0){
            return true;
        }

        return false;
    }

    /**
     * Метод преобразует assoc в arr
     * @param $arr
     * @param $name
     * @return array
     */
    public static function assocToArr($arr,$name){
        $result = [];
        foreach($arr as $val){
            $result[] = $val[$name];
        }

        return $result;
    }

    /**
     * Проверка на ИП
     * @param int $inn
     * @return string
     */
    public function innEnterprises_individual( $inn){
        if(strlen($inn)== 10 )
            return 'individual';
    }

    /** Генерация паролей
     * @param $number
     * @return string
     */
    public static function generatePassword($number) {
        $arr = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'v', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'R', 'S', 'T', 'U', 'V', 'X', 'Y', 'Z', '2', '3', '4', '5', '6', '7', '8', '9'

            /*
            ,'.',',',
                '(',')','[',']','!','?',
                '&','^','%','@','*','$',
                '<','>','/','|','+','-',
                '{','}','`','~'
            */);
        // Генерируем пароль
        $pass = "";
        for($i = 0; $i < $number; $i++) {
            // Вычисляем случайный индекс массива
            $index = rand (0, count ($arr) - 1);
            $pass .= $arr[$index];
        }

        return $pass;
    }

    /**
     * @param $hex
     * @return string
     */
    public static function unhex($hex) {
        $str = "";
        for($i = 0; $i < strlen ($hex); $i += 2) {
            $ch = chr (hexdec ($hex{$i} . $hex{$i + 1}));
            $str .= $ch;
        }

        return $str;
    }
    /**
     * Транслитерация названия для характеристики
     * @param $str - входная строка
     * @return NULL
     */
    public static function translit($str) {
        $result = '';
        $aLetters = array(
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'e',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'i',
            'й' => 'ii',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'pz',
            'х' => 'x',
            'ц' => 'ch',
            'ч' => 'zh',
            'ш' => 'h',
            'щ' => 'h',
            'ъ' => 'ii',
            'ы' => 'e',
            'ь' => 'ii',
            'э' => 'e',
            'ю' => 'u',
            'я' => 'ya'
        );
        $result = str_replace(' ', '_', mb_strtolower($str));
        foreach ($aLetters as $ind => $val) {
            $result = str_replace($ind, $val, $result);
        }
        $result = preg_replace('/[^a-z\_]/is', '', $result);
        return $result;
    }


    /**
     * Функция генерирует псевдослучайный идентификатор при создании записи в БД
     * с целью поддержания целостности данных
     * @return integer
     * @since 1.0
     */
    public static function generateId()
    {
        return abs((int)((microtime(true) - 1358385060) * 1e7));
    }

    /**
     * Функция генерации GUID
     * @return случайный сгенерированный пароль
     */
    static public function generateGuid()
    {
        if (function_exists('com_create_guid'))
        {
            return com_create_guid();
        }
        else
        {
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtolower(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid =
                substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
            return $uuid;
        }
    }

    static public function generateGuidMd5($md5)
    {
        if (function_exists('com_create_guid'))
        {
            return com_create_guid();
        }
        else
        {
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtolower(md5(uniqid(rand(), true).$md5));
            $hyphen = chr(45);// "-"
            $uuid =
                substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
            return $uuid;
        }
    }

    /**
     * @param $form
     * @return array
     */
    public static function prepareArr($form){
        $result = [];
        foreach($form as $val){
            $result[$val['name']] = $val['value'];
        }

        return $result;
    }



} 