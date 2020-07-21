<?php
namespace Models\Dao;

use DB\DB;
use PDO;

class UsuarioDao
{
    /**
     * cria novo usuário
     * @param String $nome
     * @param String $email
     * @param String $senha
     * @param String $tipo 'COMUM' || 'BANDA' || 'GESTOR'
     * @return Boolean
     */
    public static function create(String $nome, String $email, String $senha, String $tipo) :bool
    {
        $pdo   = DB::linkeband();
        $query = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (:nome, :email, :senha, :tipo)";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':senha', $senha);       
        $stmt->bindParam(':tipo', $tipo);
        $error = $stmt->errorInfo();

        return $stmt->execute();
    }

    /**
     * retorna todos os usuários com suas informações 
     * @return Array
     */
    public static function list() 
    {
        $pdo   = DB::linkeband();
        $query = "SELECT * FROM usuarios";
        $stmt  = $pdo->prepare($query);
        $stmt->execute();
        $error = $stmt->errorInfo();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**z
     * retorna informações de usuário em específico
     * @param int $id
     * @return Array
     */
    public static function getUserInfo (int $id) :array
    {
        $pdo   = DB::linkeband();
        $query = "SELECT id, nome, email, senha, tipo FROM usuarios WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $error = $stmt->errorInfo();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * retorna informações de usuário em específico
     * @param string $email
     * @return 
     */
    public static function findUserByEmail (string $email) 
    {
        $pdo   = DB::linkeband();
        $query = "SELECT id, nome, email, tipo FROM usuarios WHERE email =:email";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Verifica informações de login do usuário 
     * @param String $email
     * @param String $senha
     * @return Bool
     */
    public static function verifyLogin (String $email, String $senha) 
    {
        $pdo   = DB::linkeband();
        $query = "SELECT id, nome, email, status, tipo FROM usuarios WHERE email =:email AND senha =:senha";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $data =$stmt->fetch(PDO::FETCH_ASSOC); 

        return  $data;
    }

    /**
     * Verifica a senha do usuário 
     * @param Int $id
     * @param String $senha
     * @return Array
     */
    public static function verifyPass (Int $id, String $senha) :array
    {
        $pdo   = DB::linkeband();
        $query = "SELECT id, senha FROM usuarios WHERE id =:id AND senha =:senha";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $error = $stmt->errorInfo();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Verifica a email do usuário 
     * @param String $email
     * @return Boolean
     */
    public static function emailExist(String $email) :Bool
    {
        $pdo   = DB::linkeband();
        $query = "SELECT COUNT(*) as total FROM usuarios WHERE email =:email";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $data =$stmt->fetch(PDO::FETCH_ASSOC); 

        return $data['total']>0 ? TRUE:FALSE;
    }

    /**
     * atualiza dados do usuário
     * @param Int $id
     * @param String $nome
     * @param String $email
     * @param String $senha
     * @param String $tipo 'COMUM' || 'BANDA' || 'GESTOR'
     * @return Boolean
     */
    public static function updateUser(Int $id, String $nome, String $email, String $tipo, String $status) :bool
    {
        $pdo   = DB::linkeband();
        $query = "UPDATE usuarios SET nome =:nome, email =:email, tipo =:tipo, status =:status WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':status', $status);
        $error = $stmt->errorInfo();

        return $stmt->execute();
    }

    /**
     * atualiza dados do usuário
     * @param Int $id
     * @param String $nome
     * @param String $email
     * @param String $senha
     * @return Boolean
     */
    public static function updateBandUserWithPass(Int $id, String $nome, String $email, String $senha) :bool
    {
        $pdo   = DB::linkeband();
        $query = "UPDATE usuarios SET nome =:nome, email =:email, senha =:senha WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        return $stmt->execute();
    }

    /**
     * atualiza dados do usuário
     * @param Int $id
     * @param String $nome
     * @param String $email
     * @return Boolean
     */
    public static function updateBandUser(Int $id, String $nome, String $email) :bool
    {
        $pdo   = DB::linkeband();
        $query = "UPDATE usuarios SET nome =:nome, email =:email WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);

        return $stmt->execute();
    }

     /**
     * atualiza dados do usuário
     * @param Int $id
     * @param String $senha
     * @return Boolean
     */
    public static function updateUserPass (Int $id, String $senha) :bool
    {
        $pdo   = DB::linkeband();
        $query = "UPDATE usuarios SET senha =:senha WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':id', $id);
        $error = $stmt->errorInfo();

        return $stmt->execute();
    }

    /**
     * apaga o usuário
     * @param Int $id
     * @return Boolean
     */
    public static function deleteUser (Int $id) :bool
    {
        $pdo   = DB::linkeband();
        $query = "DELETE FROM usuarios WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $error = $stmt->errorInfo();

        return $stmt->execute();
    }

}