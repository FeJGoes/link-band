<?php
namespace Models;

use Dao\UserDao;

class UserModel
{
    /**
     * @var string  
     */
    private string $nome;

    /**
     * @var string  
     */
    private string $email;

    /**
     * @var string  
     */
    private string $senha;

    /**
     * @var string  
     */
    private string $tipo;

    /**
     * @var string  
     */
    private string $status;

    /**
     * @var string  
     */
    private string $permissao;

    /**
     * @var bool  
     */
    private bool $error =FALSE;

    /**
     * @var string  
     */
    private string $errorMsg;

    /**
     * Get the value of error
     *
     * @return  bool
     */ 
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set the value of error
     *
     * @param  bool  $error
     *
     * @return  self
     */ 
    public function setError(bool $error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Get the value of errorMsg
     *
     * @return  string
     */ 
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }

    /**
     * Set the value of errorMsg
     *
     * @param  string  $errorMsg
     *
     * @return  self
     */ 
    public function setErrorMsg(string $errorMsg)
    {
        $this->errorMsg = $errorMsg;
        $this->error    = TRUE;

        return $this;
    }

    /**
     * Get the value of nome
     *
     * @return  string
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @param  string  $nome
     *
     * @return  self
     */ 
    public function setNome(string $nome)
    {
        if(!empty($nome))
            if(strlen($nome)<=50)
                $this->nome = $nome;
            else
                $this->setErrorMsg('O nome ultrapassou o limite de 50 caracteres');
        else
            $this->setErrorMsg('O nome está vazio');

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        if(strlen($email)<=50)
            if(filter_var($email,FILTER_VALIDATE_EMAIL))
                $this->email = $email;
            else
                $this->setErrorMsg('O valor de email fornecido não é valido');
        else
            $this->setErrorMsg('O email ultrapassou o limite de 50 caracteres');
    }

    /**
     * Get the value of senha
     *
     * @return  string
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @param  string  $senha
     *
     * @return  self
     */ 
    public function setSenha(string $senha)
    {
        if(strlen($senha)<=50)
            $this->senha = $senha;
        else
            $this->setErrorMsg('A senha ultrapassou o limite de 50 caracteres');

        return $this;
    }

    /**
     * Get the value of tipo
     *
     * @return  string
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @param  string  $tipo
     *
     * @return  self
     */ 
    public function setTipo(string $tipo ='COMUM')
    {
        $validos =array('GESTOR','BANDA','COMUM');
        if(in_array($tipo,$validos))
            $this->tipo = $tipo;
        else
            $this->setErrorMsg('O valor fornecido para o tipo não está contido em ['.implode(' ,',$validos).']');

        return $this;
    }

    /**
     * Get the value of status
     *
     * @return  string
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param  string  $status
     *
     * @return  self
     */ 
    public function setStatus(string $status)
    {
        $validos =array('ATIVO','INATIVO');
        if(in_array($status,$validos))
            $this->status = $status;
        else
            $this->setErrorMsg('O valor fornecido para o status não está contido em ['.implode(' ,',$validos).']');

        return $this;
    }

    /**
     * Get the value of permissao
     *
     * @return  string
     */ 
    public function getPermissao()
    {
        return $this->permissao;
    }

    /**
     * Set the value of permissao
     *
     * @param  string  $permissao
     *
     * @return  self
     */ 
    public function setPermissao(string $permissao)
    {
        $this->permissao = $permissao;

        return $this;
    }

     /**
     * Cria novo usuário
     * @param String $nome
     * @param String $email
     * @param String $senha
     * @param String $tipo 'COMUM' || 'BANDA' || 'GESTOR'
     * @param Array $permissao 
     * @return Array
     */
    public function create() :Array
    {
        if($this->getError()===FALSE)
        {
            $consulta =UserDao::create(
                $this->getNome(),
                $this->getEmail(),
                $this->getSenha(),
                $this->getTipo(),
                $this->getPermissao());
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
        $consulta =UserDao::list();
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
        $consulta =UserDao::getUserInfo($id);
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
        $consulta =UserDao::verifyLogin($email,$senha);
        if($consulta!==FALSE)
            $response =array(
                "status"  =>"ok",
                "message" =>"Seja Bem Vindo!" );
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
    public function emailExist(Int $id, String $email) :Array
    {
        $consulta =UserDao::emailExist($id,$email);
        if($consulta!==FALSE)
            $response =array(
                "status"  =>"ok",
                "exist"   =>TRUE,
                "message" =>"Email já cadastrado" );
        else
            $response =array(
                "status" =>"error",
                "exist"  =>FALSE,
                "message"=>"Ops, nenhum dado encontrado!");
                
        return $response;
    }


     /**
     * Cria novo usuário
     * @param Int    $id
     * @param String $nome
     * @param String $email
     * @param String $tipo 'COMUM' || 'BANDA' || 'GESTOR'
     * @param String $status 'ATIVO' || 'INATIVO'
     * @param Array $permissao 
     * @return Array
     */
    public function updateUser(Int $id) :Array
    {
        if($this->getError()===FALSE)
        {
            $consulta =UserDao::updateUser(
                $id,
                $this->getNome(),
                $this->getEmail(),
                $this->getTipo(),
                $this->getStatus(),
                $this->getPermissao());
            if($consulta===TRUE)
                $response =array(
                    "status"  =>"ok",
                    "message" =>"Usuário atualizado com sucesso!" );
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
            $consulta =UserDao::updateUserPass(
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
        $consulta =UserDao::deleteUser($id);
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