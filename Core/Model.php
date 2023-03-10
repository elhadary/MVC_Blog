<?php

namespace app\Core;

use PDO;
use PDOException;


class Model
{


    protected $conn = null;
    protected $stmt = null;
    protected $result;
    protected $table;
    protected $query = '';
    public $error = "";

    function __construct () {
        $this->conn = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
            DB_USER, DB_PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }



    public function select()
    {
        $this->query = "SELECT * FROM `$this->table` ";
        return $this;
    }

    public function insert($array = [])
    {
        $array = [
          'email' => 'fareselhadary@gmail.com',
          'password' => '123456'
        ];
        foreach ($array as $key => $value)
        {

        }
        $this->query = "INSERT INTO `$this->table` ";
    }

    public function delete()
    {
        $this->query = "DELETE FROM `$this->table` ";
        return $this;
    }

    public function update($array)
    {
        $array = [
            'name' => 'test',
            'pass' => '123'
        ];
        $vars = '';
        foreach ($array as $key => $value)
            {
                $vars .= "`$key` = $value";
                if(array_key_last($array) !== $key)
                {
                    $vars .= " , ";
                }
            }

        $this->query = "UPDATE $this->table SET $vars";
        return $this;
    }

    public function where($one,$condition,$two)
    {
        $this->query .= "WHERE `$one` $condition $two ";
        return $this;
    }

    public function or($one,$condition,$two)
    {
        $this->query .= "OR `$one` $condition $two ";
        return $this;
    }
    public function and($one,$condition,$two)
    {
        $this->query .= "AND `$one` $condition $two ";
        return $this;
    }
    public function limit($max)
    {
        $this->query .= "LIMIT $max";
        return $this;
    }


    public function exec() //EXECUTE
    {
        $this->stmt = $this->conn->prepare($this->query);
        return $this->stmt->execute();
    }

    public function fetch()
    {

        $this->result = $this->conn->query($this->query)->fetch();
        return $this->result;
    }

    function __destruct () {
        if ($this->stmt!==null) { $this->stmt = null; }
        if ($this->conn!==null) { $this->conn = null; }
    }

}