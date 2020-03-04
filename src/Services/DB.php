<?php

namespace Services;
use PDO;

require_once '../Configs/Constants.php';

class DB 
{
    private $pdo;

    function __construct() 
    {
        return $this->pdo->conect();
    }

    public function conect()
    {
        $pdo = new PDO ("mysql:dbname=".DATABASE.";host=".HOST, USER_DATABASE, USER_PASS, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

}
?>