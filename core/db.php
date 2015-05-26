<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/26/15
 * Time: 12:50 AM
 */

namespace Core;


class DB {
    /**
     * @var \PDO
     */
    public $db;
    /**
     * @var array
     */
    public $dbs;
    /**
     * @var array
     */
    public $tables;

    function __construct($server){
        $dbConfig = [];
        include_once APPPATH.'config/db.php';
        try {
            $this->db = new \PDO($dbConfig[$server]['dsn'], $dbConfig[$server]['user'], $dbConfig[$server]['password']);
        } catch (\PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
    }
}