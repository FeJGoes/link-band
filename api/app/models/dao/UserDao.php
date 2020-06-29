<?php
namespace Models\Dao;

use DB\DB;
use PDO;
use Services\Log;

class UserDao
{
    /**
     * cria novo usuário
     * @param String $nome
     * @param String $email
     * @param String $senha
     * @param String $tipo 'COMUM' || 'BANDA' || 'GESTOR'
     * @param Array $permissao 
     * @return Boolean
     */
    public static function create(String $nome, String $email, String $senha, String $tipo, string $permissao) :bool
    {
        $pdo   = DB::linkeband();
        $query = "INSERT INTO usuarios (nome, email, senha, tipo, permissao) VALUES (:nome, :email, :senha, :tipo, :permissao)";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);       
        $stmt->bindParam(':senha', $senha);       
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':permissao', json_encode($permissao));
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

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
        empty($error) ?: Log::PDO($error[2]);

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
        $query = "SELECT id, nome, email, senha, tipo, permissao FROM usuarios WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Verifica informações de login do usuário 
     * @param String $email
     * @param String $senha
     * @return Bool
     */
    public static function verifyLogin (String $email, String $senha) :bool
    {
        $pdo   = DB::linkeband();
        $query = "SELECT COUNT(*) as total FROM usuarios WHERE email =:email AND senha =:senha";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $data =$stmt->fetch(PDO::FETCH_ASSOC); 
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return  $data['total']>0 ? TRUE:FALSE;
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
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Verifica a email do usuário 
     * @param Int $id
     * @param String $email
     * @return Boolean
     */
    public static function emailExist(Int $id, String $email) :Bool
    {
        $pdo   = DB::linkeband();
        $query = "SELECT COUNT(*) as total FROM usuarios WHERE id =:id AND email =:email";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $data =$stmt->fetch(PDO::FETCH_ASSOC); 
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $data['total']>0 ? TRUE:FALSE;
    }

    /**
     * atualiza dados do usuário
     * @param Int $id
     * @param String $nome
     * @param String $email
     * @param String $senha
     * @param String $tipo 'COMUM' || 'BANDA' || 'GESTOR'
     * @param String $permissao 
     * @return Boolean
     */
    public static function updateUser(Int $id, String $nome, String $email, String $tipo, String $status, String $permissao) :bool
    {
        $pdo   = DB::linkeband();
        $query = "UPDATE usuarios SET nome =:nome, email =:email, tipo =:tipo, status =:status, permissao =:permissao WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':permissao', json_encode($permissao));
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

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
        empty($error) ?: Log::PDO($error[2]);

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
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->execute();
    }

}