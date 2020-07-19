<?php
namespace Models\Classes;

use Models\Dao\UsuarioDao;

class Usuario
{
    /**
     * @var String  
     */
    private String $nome;

    /**
     * @var String  
     */
    private String $email;

    /**
     * @var String  
     */
    private String $senha;

    /**
     * @var String  
     */
    private String $tipo;

    /**
     * @var String  
     */
    private String $status;

    /**
     * @var Bool  
     */
    private Bool $error =FALSE;

    /**
     * @var String  
     */
    private String $errorMsg;

    /**
     * Get the value of error
     *
     * @return  Bool
     */ 
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set the value of error
     *
     * @param  Bool  $error
     *
     * @return  self
     */ 
    public function setError(Bool $error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Get the value of errorMsg
     *
     * @return  String
     */ 
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }

    /**
     * Set the value of errorMsg
     *
     * @param  String  $errorMsg
     *
     * @return  self
     */ 
    public function setErrorMsg(String $errorMsg)
    {
        $this->errorMsg = $errorMsg;
        $this->error    = TRUE;

        return $this;
    }

    /**
     * Get the value of nome
     *
     * @return  String
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @param  String  $nome
     *
     * @return  self
     */ 
    public function setNome(String $nome)
    {
        if(!empty($nome))
            if(strlen($nome)<=50)
                $this->nome = $nome;
            else
                $this->setErrorMsg('[nome] - ultrapassou o limite de 50 caracteres');
        else
            $this->setErrorMsg('[nome] - está vazio');

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  String
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  String  $email
     *
     * @return  self
     */ 
    public function setEmail(String $email)
    {
        if(!empty($email))
            if(strlen($email)<=50)
                $this->email = $email;
            else
                $this->setErrorMsg('[email] - ultrapassou o limite de 50 caracteres');
        else
            $this->setErrorMsg('[email] - está vazio');
    }

    /**
     * Get the value of senha
     *
     * @return  String
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @param  String  $senha
     *
     * @return  self
     */ 
    public function setSenha(String $senha)
    {
        if(!empty($senha))
            if(strlen($senha)<=50)
                $this->senha = $senha;
            else
                $this->setErrorMsg('[senha] - ultrapassou o limite de 50 caracteres');
        else
            $this->setErrorMsg('[senha] - está vazia');

        return $this;
    }

    /**
     * Get the value of tipo
     *
     * @return  String
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @param  String  $tipo
     *
     * @return  self
     */ 
    public function setTipo(String $tipo ='COMUM')
    {
        $validos =array('GESTOR','BANDA','COMUM');
        if(!empty($tipo))
            if(in_array($tipo,$validos))
                $this->tipo = $tipo;
            else
                $this->setErrorMsg('[tipo] - não está contido em ['.implode(' ,',$validos).']');
        else
            $this->setErrorMsg('[tipo] - está vazio');

        return $this;
    }

    /**
     * Get the value of status
     *
     * @return  String
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param  String  $status
     *
     * @return  self
     */ 
    public function setStatus(String $status)
    {
        $validos =array('ATIVO','INATIVO');
        if(!empty($status))
            if(in_array($status,$validos))
                $this->status = $status;
            else
                $this->setErrorMsg('[status] - não está contido em ['.implode(' ,',$validos).']');
        else
            $this->setErrorMsg('[status] - está vazio');


        return $this;
    }

     /**
     * Cria novo usuário
     * @param String $nome
     * @param String $email
     * @param String $senha
     * @param String $tipo 'COMUM' || 'BANDA' || 'GESTOR'
     * @return Array
     */
    public function create() :Array
    {
        if($this->getError()===FALSE)
        {
            $consulta =UsuarioDao::create(
                $this->getNome(),
                $this->getEmail(),
                $this->getSenha(),
                $this->getTipo());
            if($consulta===TRUE)
                $response =array(
                    "status"  =>"ok",
                    "message" =>"Usuário criado com sucesso!" );
            else
                $response =array(
                    "status" =>"error",
                    "message"=>"Ops, houve algum erro ao criar o usuário, verifique os dados e tente novemente!");
        }
        else
            $response =array(
                "status" =>"error",
                "message"=>$this->getErrorMsg());
                
        return $response;
    }

     /**
     * Lista todos os usuários
     * @return Array
     */
    public function list() :Array
    {
        $consulta =UsuarioDao::list();
        if(!empty($consulta))
            $response =array(
                "status"  =>"ok",
                "data"    =>$consulta );
        else
            $response =array(
                "status" =>"error",
                "message"=>"Ops, nenhum dado encontrado!");
                
        return $response;
    }

     /**
     * Lista todos os usuários
     * @return Array
     */
    public function getUserInfo(Int $id) :Array
    {
        $consulta =UsuarioDao::getUserInfo($id);
        if(!empty($consulta))
            $response =array(
                "status"  =>"ok",
                "data"    =>$consulta );
        else
            $response =array(
                "status" =>"error",
                "message"=>"Ops, nenhum dado encontrado!");
                
        return $response;
    }

     /**
     * Verifica se existe entre os usuários
     * @return Array
     */
    public function login(String $email, String $senha) :Array
    {
        $consulta =UsuarioDao::verifyLogin($email,$senha);
        if($consulta!==FALSE)
            $response =array(
                "status"  =>"ok",
                "message" =>"Seja Bem Vindo!",
                "data" => $consulta
             );
        else
            $response =array(
                "status" =>"error",
                "message"=>"Ops, usuário ou senha inválidos!");
                
        return $response;
    }

     /**
     * Verifica se existe entre os usuários
     * @return Array
     */
    public function emailExist(String $email) :bool
    {
        return UsuarioDao::emailExist($email);
    }


     /**
     * Cria novo usuário
     * @param Int    $id
     * @param String $nome
     * @param String $email
     * @param String $senha
     * @return Array
     */
    public function updateBandUserWithPass(Int $id) :Array
    {
        if($this->getError()===FALSE)
        {
            $consulta =UsuarioDao::updateBandUserWithPass(
                $id,
                $this->getNome(),
                $this->getEmail(),
                $this->getSenha());
            if($consulta===TRUE)
                $response =array(
                    "status"  =>"ok",
                    "message" =>"Usuário atualizado com sucesso!",
                    "data"    =>UsuarioDao::getUserInfo($id)
                );
            else
                $response =array(
                    "status" =>"error",
                    "message"=>"Ops, houve algum erro ao atualizar o usuário, verifique os dados e tente novemente!");
        }
        else
            $response =array(
                "status" =>"error",
                "message"=>$this->getErrorMsg());
                
        return $response;
    }

     /**
     * Cria novo usuário
     * @param Int    $id
     * @param String $nome
     * @param String $email
     * @param String $tipo 'COMUM' || 'BANDA' || 'GESTOR'
     * @param String $status 'ATIVO' || 'INATIVO'
     * @return Array
     */
    public function updateBandUser(Int $id) :Array
    {
        if($this->getError()===FALSE)
        {
            $consulta =UsuarioDao::updateBandUser(
                $id,
                $this->getNome(),
                $this->getEmail());
            if($consulta===TRUE)
                $response =array(
                    "status"  =>"ok",
                    "message" =>"Usuário atualizado com sucesso!",
                    "data"    =>UsuarioDao::getUserInfo($id) );
            else
                $response =array(
                    "status" =>"error",
                    "message"=>"Ops, houve algum erro ao atualizar o usuário, verifique os dados e tente novemente!");
        }
        else
            $response =array(
                "status" =>"error",
                "message"=>$this->getErrorMsg());
                
        return $response;
    }

     /**
     * Atualiza senha do usuário
     * @param Int    $id
     * @param String $senha
     * @return Array
     */
    public function updatePass(Int $id) :Array
    {
        if($this->getError()===FALSE)
        {
            $consulta =UsuarioDao::updateUserPass(
                $id,
                $this->getSenha());
            if($consulta===TRUE)
                $response =array(
                    "status"  =>"ok",
                    "message" =>"Senha do usuário atualizada com sucesso!" );
            else
                $response =array(
                    "status" =>"error",
                    "message"=>"Ops, houve algum erro ao atualizar a senha do usuário, verifique os dados e tente novemente!");
        }
        else
            $response =array(
                "status" =>"error",
                "message"=>$this->getErrorMsg());
                
        return $response;
    }

     /**
     * Apaga usuário
     * @return Array
     */
    public function delete(Int $id) :Array
    {
        $consulta =UsuarioDao::deleteUser($id);
        if(!empty($consulta))
            $response =array(
                "status"  =>"ok",
                "message" =>"Usuário apagado com sucesso!" );
        else
            $response =array(
                "status" =>"error",
                "message"=>"Ops, não foi possível apagar o usuário informado!");
                
        return $response;
    }
}
?>