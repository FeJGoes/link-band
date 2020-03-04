<?php
namespace Models;
use PDO;
use Services\DB;

class UsuarioModel
{
    public function getAll ()
    {
        $conection = new DB;
        $query = "SELECT * FROM usuarios";
        $stmt = $conection->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $error = $stmt->errorInfo();
        $return =
        [
            'error'     => $error,
            'user-info' => $data
        ];
        return $return;
    }

    public function createUser ()
    {

    }
}
?>