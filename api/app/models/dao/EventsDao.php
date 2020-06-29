<?php
namespace Models\Dao;

use DB\DB;
use PDO;
use Services\Log;

class EventsDao
{
    /**
     * cria novo evento
     * @param Int    $responsavel
     * @param String $titulo
     * @param String $descricao
     * @param String $data YYYY-MM-dd
     * @param String $hora H:i:s
     * @param String $latitude
     * @param String $longitude
     * @param String $telefone (XX) XXXXX-XXXX
     * @param String $celular (XX) XXXXX-XXXX
     * @param String $cep XX.XXX-XXX
     * @param String $logradouro 
     * @param Int    $numero 
     * @param String $bairro 
     * @param String $complemento 
     * @param String $cidade 
     * @param String $estado 
     * @param String $urlImg 
     * @return Boolean
     */
    public static function create(Int $responsavel, String $titulo, String $descricao, String $data, string $hora, String $latitude, String $longitude, String $telefone, String $celular, String $cep, String $logradouro, Int $numero, String $bairro, String $complemento, String $cidade, String $estado, String $urlImg) 
    {
        $pdo   = DB::linkeband();
        $query = "INSERT INTO eventos (responsavel, titulo, descricao, data, hora, latitude, longitude, telefone, celular, cep, logradouro, numero, bairro, complemento, cidade, estado, url_img) VALUES (:responsavel, :titulo, :descricao, :data, :hora, :latitude, :longitude, :telefone, :celular, :cep, :logradouro, :numero, :bairro, :complemento, :cidade, :estado, :url_img)";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':responsavel' ,$responsavel);
        $stmt->bindParam(':titulo'      ,$titulo);       
        $stmt->bindParam(':descricao'   ,$descricao);       
        $stmt->bindParam(':data'        ,$data);
        $stmt->bindParam(':hora'        ,$hora);
        $stmt->bindParam(':latitude'    ,$latitude);
        $stmt->bindParam(':longitude'   ,$longitude);
        $stmt->bindParam(':telefone'    ,$telefone);
        $stmt->bindParam(':celular'     ,$celular);
        $stmt->bindParam(':cep'         ,$cep);
        $stmt->bindParam(':logradouro'  ,$logradouro);
        $stmt->bindParam(':numero'      ,$numero);
        $stmt->bindParam(':bairro'      ,$bairro);
        $stmt->bindParam(':complemento' ,$complemento);
        $stmt->bindParam(':cidade'      ,$cidade);
        $stmt->bindParam(':estado'      ,$estado);
        $stmt->bindParam(':url_img'     ,$urlImg);
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->execute();
    }

    /**
     * retorna todos os eventos com suas informações 
     * @return Array
     */
    public static function list() 
    {
        $pdo   = DB::linkeband();
        $query = "SELECT * FROM eventos ORDER BY data DESC";
        $stmt  = $pdo->prepare($query);
        $stmt->execute();
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * retorna um evento em específico
     * @param Int $id id do evento
     * @return Array
     */
    public static function getEventById (int $id) :array
    {
        $pdo   = DB::linkeband();
        $query = "SELECT * FROM eventos WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * retorna lista eventos de um responsável
     * @param Int $responsavel id do responsável
     * @return Array
     */
    public static function listEventByOwner (int $responsavel) :array
    {
        $pdo   = DB::linkeband();
        $query = "SELECT * FROM eventos WHERE responsavel =:responsavel ORDER BY data DESC";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':responsavel', $responsavel);
        $stmt->execute();
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * retorna lista eventos em um período
     * @param String $dataInicial YYYY-MM-dd
     * @param String $dataFinal YYYY-MM-dd
     * @return Array
     */
    public static function listEventByDate (String $dataInicial='', String $dataFinal='') :array
    {
        $pdo   = DB::linkeband();
        $query = "SELECT * FROM eventos WHERE data BETWEEN :data_inicial AND :data_final ORDER BY data DESC";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':data_inicial',!empty($dataInicial)?:date('Y-m-d'));
        $stmt->bindParam(':data_final',!empty($dataFinal)?:date('Y-m-d'));
        $stmt->execute();
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * atualiza dados do eventos
     * @param Int    $responsavel
     * @param String $titulo
     * @param String $descricao
     * @param String $data YYYY-MM-dd
     * @param String $hora H:i:s
     * @param String $latitude
     * @param String $longitude
     * @param String $telefone (XX) XXXXX-XXXX
     * @param String $celular (XX) XXXXX-XXXX
     * @param String $cep XX.XXX-XXX
     * @param String $logradouro 
     * @param Int    $numero 
     * @param String $bairro 
     * @param String $complemento 
     * @param String $cidade 
     * @param String $estado 
     * @param String $status 
     * @param String $urlImg 
     * @return Boolean
     */
    public static function update(Int $responsavel, String $titulo, String $descricao, String $data, string $hora, String $latitude, String $longitude, String $telefone, String $celular, String $cep, String $logradouro, Int $numero, String $bairro, String $complemento, String $cidade, String $estado, String $urlImg) :bool
    {
        $pdo   =DB::linkeband();
        $query ="UPDATE eventos SET responsavel=:responsavel, titulo=:titulo, descricao=:descricao, data=:data, hora=:hora, latitude=:latitude, longitude=:longitude, telefone=:telefone, celular=:celular, cep=:cep, logradouro=:logradouro, numero=:numero, bairro=:bairro, complemento=:complemento, cidade=:cidade, estado=:estado, url_img=:url_img WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':responsavel' ,$responsavel);
        $stmt->bindParam(':titulo'      ,$titulo);       
        $stmt->bindParam(':descricao'   ,$descricao);       
        $stmt->bindParam(':data'        ,$data);
        $stmt->bindParam(':hora'        ,$hora);
        $stmt->bindParam(':latitude'    ,$latitude);
        $stmt->bindParam(':longitude'   ,$longitude);
        $stmt->bindParam(':telefone'    ,$telefone);
        $stmt->bindParam(':celular'     ,$celular);
        $stmt->bindParam(':cep'         ,$cep);
        $stmt->bindParam(':logradouro'  ,$logradouro);
        $stmt->bindParam(':numero'      ,$numero);
        $stmt->bindParam(':bairro'      ,$bairro);
        $stmt->bindParam(':complemento' ,$complemento);
        $stmt->bindParam(':cidade'      ,$cidade);
        $stmt->bindParam(':estado'      ,$estado);
        $stmt->bindParam(':url_img'     ,$urlImg);
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->execute();
    }

    /**
     * atualiza dados do evento pelo id
     * @param Int    $id
     * @param String $titulo
     * @param String $descricao
     * @param String $data YYYY-MM-dd
     * @param String $hora H:i:s
     * @param String $telefone (XX) XXXXX-XXXX
     * @param String $celular (XX) XXXXX-XXXX
     * @param String $urlImg 
     * @return Boolean
     */
    public static function updateEventInfoById(Int $id,String $titulo, String $descricao, String $data, string $hora, String $telefone, String $celular, String $urlImg) :bool
    {
        $pdo   = DB::linkeband();
        $query = "UPDATE eventos SET id=:id, titulo=:titulo, descricao=:descricao, data=:data, hora=:hora,telefone=:telefone, celular=:celular, url_img=:url_img WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id'          ,$id);
        $stmt->bindParam(':titulo'      ,$titulo);       
        $stmt->bindParam(':descricao'   ,$descricao);       
        $stmt->bindParam(':data'        ,$data);
        $stmt->bindParam(':hora'        ,$hora);
        $stmt->bindParam(':telefone'    ,$telefone);
        $stmt->bindParam(':celular'     ,$celular);
        $stmt->bindParam(':url_img'     ,$urlImg);
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->execute();
    }

    /**
     * atualiza o link da img do evento pelo id
     * @param Int    $id
     * @param String $urlImg 
     * @return Boolean
     */
    public static function updateUrlImgById(Int $id, String $urlImg) :bool
    {
        $pdo   = DB::linkeband();
        $query = "UPDATE eventos SET url_img=:url_img WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id'          ,$id);
        $stmt->bindParam(':url_img'     ,$urlImg);
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->execute();
    }

    /**
     * atualiza dados do eventos
     * @param Int    $id
     * @param String $latitude
     * @param String $longitude
     * @param String $cep XX.XXX-XXX
     * @param String $logradouro 
     * @param Int    $numero 
     * @param String $bairro 
     * @param String $complemento 
     * @param String $cidade 
     * @param String $estado 
     * @return Boolean
     */
    public static function updateAddress(Int $id, String $latitude, String $longitude, String $cep, String $logradouro, Int $numero, String $bairro, String $complemento, String $cidade, String $estado) :bool
    {
        $pdo   = DB::linkeband();
        $query = "UPDATE eventos SET latitude=:latitude, longitude=:longitude, cep=:cep, logradouro=:logradouro, numero=:numero, bairro=:bairro, complemento=:complemento, cidade=:cidade, estado=:estado WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id'          ,$id);
        $stmt->bindParam(':latitude'    ,$latitude);
        $stmt->bindParam(':longitude'   ,$longitude);
        $stmt->bindParam(':cep'         ,$cep);
        $stmt->bindParam(':logradouro'  ,$logradouro);
        $stmt->bindParam(':numero'      ,$numero);
        $stmt->bindParam(':bairro'      ,$bairro);
        $stmt->bindParam(':complemento' ,$complemento);
        $stmt->bindParam(':cidade'      ,$cidade);
        $stmt->bindParam(':estado'      ,$estado);
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->execute();
    }

    /**
     * apaga o evento
     * @param Int $id
     * @return Boolean
     */
    public static function delete (Int $id) :bool
    {
        $pdo   = DB::linkeband();
        $query = "DELETE FROM eventos WHERE id =:id";
        $stmt  = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $error = $stmt->errorInfo();
        empty($error) ?: Log::PDO($error[2]);

        return $stmt->execute();
    }

}