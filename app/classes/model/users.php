<?php
/**
 * Created by PhpStorm.
 * User: asm
 * Date: 5/26/15
 * Time: 6:57 PM
 */

namespace Model;


use Core\DB;

class Users extends DB {


    public static function forge($server){
        return new self($server);
    }

    public function __construct($server){
        parent::__construct($server);
        $dbs = [];
        $tables = [];
        include_once APPPATH.'config/config.php';
        $this->dbs = $dbs[$server];
        $this->tables[$server];
    }

    /**
     * Метод для проверки наличия польователя с такой почтой
     * @param string $email
     * @return mixed
     */
    public function checkUser($email){
        $table = $this->dbs['w_task'].'.'.$this->tables['w_task']['users'];
        $select = $this->db->prepare("SELECT id FROM {$table} WHERE email=:email");
        $select->bindParam(':email',$email,\PDO::PARAM_STR);
        $select->setFetchMode(\PDO::FETCH_ASSOC);
        $select->execute();
        $result = $select->fetch();

        return $result;
    }

    public function addUser($form){
        $pass = md5($form['u_pass']);
        $table = $this->dbs['w_task'].'.'.$this->tables['w_task']['users'];
        $insert = $this->db->prepare("INSERT INTO {$table} u_name,surname,email,pass,phone,birth,sex,ava_file_name
                    VALUES(:u_name,:surname,:email,:pass,:phone,:birth,:sex,:ava_file_name)");
        $insert->bindParam(':u_name',$form['u_name'],\PDO::PARAM_STR);
        $insert->bindParam(':surname',$form['u_surname'],\PDO::PARAM_STR);
        $insert->bindParam(':email',$form['u_email'],\PDO::PARAM_STR);
        $insert->bindParam(':pass',$pass,\PDO::PARAM_STR);
        $insert->bindParam(':phone',$form['u_phone'],\PDO::PARAM_STR);
        $insert->bindParam(':birth',$form['u_birth'],\PDO::PARAM_STR);
        $insert->bindParam(':sex',$form['u_sex'],\PDO::PARAM_STR);
        $insert->bindParam(':ava_file_name',$form['u_ava_file_name'],\PDO::PARAM_STR);
        $insert->execute();


    }




}