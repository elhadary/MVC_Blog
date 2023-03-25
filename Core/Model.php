<?php

namespace app\Core;

use DI\Container;
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
    public $fetchCount = 0;

    function __construct (Container $c) {

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

        $columns = '(';
        $values = '(';

        foreach ($array as $key => $value)
        {
            $columns .= $key;
            array_key_last($array) !== $key ? $columns .= ',' : $columns .= ')';

            $values .= "'$value'";
            array_key_last($array) !== $key ? $values .= ',' : $values .= ')';
        }

        $this->query = "INSERT INTO `$this->table` $columns VALUES $values";
        return $this;
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
        $this->query .= "WHERE `$one` $condition '$two' ";
        return $this;
    }

    public function or($one,$condition,$two)
    {
        $this->query .= "OR `$one` $condition '$two' ";
        return $this;
    }
    public function and($one,$condition,$two)
    {
        $this->query .= "AND `$one` $condition '$two' ";
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
        try {
            $this->stmt->execute();
            if($this->stmt->rowCount() == 0)
            {
                $this->error = 'No rows affected';
            }
        }catch (\Exception $e)
        {
            echo $e->getMessage();
            header( "refresh:3;url=/register" );
        }

    }
    public function fetchAll()
    {
        $this->result = $this->conn->query($this->query)->fetchAll();
        $this->fetchCount = $this->conn->query($this->query)->rowCount();
        return $this->result;
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