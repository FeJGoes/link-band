<?php
namespace App\Models;

use PDO;

class UsuarioModel
{
    private $pdo;

    function __construct() 
    {
        $conn = new PDO (
            "mysql:dbname=linkEband;host=localhost", 
            'root', 
            '', 
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $conn;
    }

    /**
     * retorna todos os usuários com suas informações 
     * @return Array
     */
    public function getAll () :array
    {
        $query = "SELECT * FROM usuarios";
        $stmt  = $this->pdo->prepare($query);
        $stmt->execute();
        $data   = $stmt->fetch(PDO::FETCH_ASSOC);
        $error  = $stmt->errorInfo();
        $return = 
        [
            'error'=> $error,
            'user' => $data
        ];
        return $return;
    }

    /**
     * retorna informações de usuário em específico
     * @param int $id
     * @return Array
     */
    public function getUserInfo (int $id) :array
    {
        $query = "SELECT id, nome, email, senha, tipo FROM usuarios WHERE id = :id";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data   = $stmt->fetch(PDO::FETCH_ASSOC);
        $error  = $stmt->errorInfo();
        $return = 
        [
            'error'=> $error,
            'user' => $data
        ];
        return $return;
    }

    /**
     * cria novo usuário
     * @param String $nome
     * @param String $email
     * @param String $senha
     * @param String $tipo - 'COMMON' || 'BAND'
     * @return Boolean
     */
    public function createNew (String $nome, String $email, String $senha, String $tipo = 'COMMON') :bool
    {
        $query = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (:nome, :email, :senha, :tipo)";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':senha', $senha);       
        $stmt->bindParam(':tipo', $tipo);
        return $stmt->execute();
    }

    /**
     * atualiza dados do usuário
     * @param Int $id
     * @param String $nome
     * @param String $email
     * @param String $senha
     * @param String $tipo - 'COMMON' || 'BAND'
     * @return Boolean
     */
    public function updateUser (Int $id, String $nome = NULL, String $email = NULL, String $senha = NULL) :bool
    {
        $param['nome']  = is_null($nome)  || empty($nome) ? '' : "nome = '$nome'";
        $param['email'] = is_null($email) || empty($email) ? '' : "email = '$email'";
        $param['senha'] = is_null($senha) || empty($senha) ? '' : "senha = '$senha'";
        $values         = implode(',', array_filter($param));

        $query = "UPDATE usuarios SET $values WHERE id = :id";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    /**
     * apaga o usuário
     * @param Int $id
     * @return Boolean
     */
    public function deleteUser (Int $id) :bool
    {
        $query = "DELETE FROM usuarios WHERE id = :id";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

     /**
     * atualiza dados do usuário
     * @param Int $id
     * @param String $senha
     * @return Boolean
     */
    public function updateUserPass (Int $id, String $senha = NULL) :bool
    {
        $query = "UPDATE usuarios SET senha = :senha WHERE id = :id";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }  
}
?>