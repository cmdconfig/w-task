<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/25/15
 * Time: 9:13 PM
 */

namespace Core;


class View {
    /**
     * @var array
     */
    protected $data = [];
    /**
     * @var
     */
    public $html;
    /**
     * Метод устанавливает какую вью подгружать
     * @param null $options
     * @return View
     */
    public static function forge($file = null, $data = null){
        return new static($file, $data);
    }

    /**
     * Конструктор подгружающий основные файлы шаблона
     * @param null $file
     * @param null $data
     */
    function __construct($file = null, $data = null){

        if (is_object($data) === true){
            $data = get_object_vars($data);
        }
        elseif ($data and ! is_array($data))
        {
            throw new \InvalidArgumentException('The data parameter only accepts objects and arrays.');
        }
        if ($data !== null)
        {
            // Add the values to the current data
            $this->data = $data;
        }

        include_once APPPATH.'view/blocks/'.$file.'/header.php';
        include_once APPPATH.'view/'.$file.'.php';
        include_once APPPATH.'view/blocks/'.$file.'/footer.php';
    }

}