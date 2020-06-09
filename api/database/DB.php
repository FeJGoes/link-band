<?php
namespace DB;

use PDO;
/**
 * Constroi a conexão PDO com os diversos bancos de dados
 */
class DB
{
    /**
     * Abre conexão com a base de dados do ESCRITÓRIO VIRTUAL
     * @return PDO 
     */
    public static function linkeband() 
    {
        return new PDO (
                        "mysql:dbname=".getenv('DB_NAME').";host=".getenv('DB_HOST'), 
                        getenv('DB_USER'), getenv('DB_PASS'), 
                        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
                         PDO::ATTR_ERRMODE, 
                         PDO::ERRMODE_EXCEPTION]);
    } 

}