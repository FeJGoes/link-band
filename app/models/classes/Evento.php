<?php
namespace Models\Classes;

use Models\Dao\EventoDao;
use DateTime;
use Services\Utils;

class Evento
{
    /**
     * @var Int  
     */
    private Int $responsavel;

    /**
     * @var String  
     */
    private string $titulo;

    /**
     * @var String  
     */
    private string $descricao;

    /**
     * @var String  
     */
    private string $data;

    /**
     * @var String  
     */
    private string $hora;

    /**
     * @var String  
     */
    private string $lat;
    
    /**
     * @var String  
     */
    private string $long;
    
    /**
     * @var String  
     */
    private string $telefone;
    
    /**
     * @var String  
     */
    private string $celular;
    
    /**
     * @var String  
     */
    private string $cep;
    
    /**
     * @var String  
     */
    private string $logradouro;
    
    /**
     * @var Int  
     */
    private Int $numero;
    
    /**
     * @var String  
     */
    private string $bairro;
    
    /**
     * @var String  
     */
    private string $complemento;
    
    /**
     * @var String  
     */
    private string $cidade;
    
    /**
     * @var String  
     */
    private string $estado;
    
    /**
     * @var String  
     */
    private String $urlImg;
    
    /**
     * @var String  
     */
    private String $criadoEm;
    
    /**
     * @var String  
     */
    private String $ultimaMod;
    
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
     * Get the value of responsavel
     *
     * @return Int
     */ 
    public function getResponsavel()
    {
        return $this->responsavel;
    }

    /**
     * Set the value of responsavel
     *
     * @param  Int  $responsavel
     *
     * @return  self
     */ 
    public function setResponsavel(?int $responsavel)
    {
        if(!empty($responsavel))
            if(is_numeric($responsavel))
                $this->responsavel = $responsavel;
            else
                $this->setErrorMsg('[responsavel] - não é válido');
        else
            $this->setErrorMsg('[responsavel] - está vazio');
        
    }

    /**
     * Get the value of titulo
     *
     * @return String
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @param  String  $titulo
     *
     * @return  self
     */ 
    public function setTitulo(?String $titulo)
    {
        if(!empty($titulo))
            if(strlen($titulo)<=50)
                $this->titulo = $titulo;
            else
                $this->setErrorMsg('[titulo] - ultrapassou o limite de 50 caracteres');
        else
            $this->setErrorMsg('[titulo] - está vazio');
        
        return $this;
    }

    /**
     * Get the value of descricao
     *
     * @return String
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @param  String  $descricao
     *
     * @return  self
     */ 
    public function setDescricao(?String $descricao)
    {
        if(!empty($descricao))
            $this->descricao = $descricao;
        else
            $this->setErrorMsg('[descricao] - está vazio');
        
        return $this;
    }

    /**
     * Get the value of data
     *
     * @return  String
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @param  String  $data
     *
     * @return  self
     */ 
    public function setData(?String $data)
    {
        if(!empty($data))
            if(DateTime::createFromFormat('Y-m-d',$data)!==FALSE)
                $this->data = $data;
            else
                $this->setErrorMsg('[data] - não corresponde ao formato YYYY-mm-dd');
        else
            $this->setErrorMsg('[data] - está vazia');
    }

    /**
     * Get the value of hora
     *
     * @return  String
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @param  String  $hora
     *
     * @return  self
     */ 
    public function setHora(?String $hora)
    {
        if(!empty($hora))
            if(DateTime::createFromFormat('H:i',$hora)!==FALSE)
                $this->hora = $hora;
            else
                $this->setErrorMsg('[hora] - não corresponde ao formato HH:mm');
        else
            $this->setErrorMsg('[hora] - está vazia');
    }

    /**
     * Get the value of lat
     *
     * @return  String
     */ 
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set the value of lat
     *
     * @param  String  $lat
     *
     * @return  self
     */ 
    public function setLat($lat)
    {
        if(!empty($lat))
            if(strlen($lat)<=50)
                $this->lat = $lat;
            else
                $this->setErrorMsg('[lat] - ultrapassou o limite de 50 caracteres');
        else
            $this->setErrorMsg('[lat] - está vazia');

        return $this;
    }
    
    /**
     * Get the value of long
     *
     * @return  String
     */ 
    public function getLong()
    {
        return $this->long;
    }

    /**
     * Set the value of long
     *
     * @param  String  $long
     *
     * @return  self
     */ 
    public function setLong($long)
    {
        if(!empty($long))
            if(strlen($long)<=50)
                $this->long = $long;
            else
                $this->setErrorMsg('[long] - ultrapassou o limite de 50 caracteres');
        else
            $this->setErrorMsg('[long] - está vazio');

        return $this;
    }

    /**
     * Get the value of telefone
     *
     * @return  String
     */ 
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @param  String  $telefone
     *
     * @return  self
     */ 
    public function setTelefone(?String $telefone)
    {
        if(!empty($telefone))
            if(Utils::isValidPhone($telefone)!==FALSE)
                $this->telefone = $telefone;
            else
                $this->setErrorMsg('[telefone] -  não corresponde ao formato (xx) xxxx-xxxx');
        else
            $this->setErrorMsg('[telefone] - está vazio');

        return $this;
    }

    /**
     * Get the value of celular
     *
     * @return  String
     */ 
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set the value of celular
     *
     * @param  String  $celular
     *
     * @return  self
     */ 
    public function setCelular(?String $celular)
    {
        if(!empty($celular))
            if(Utils::isValidPhone($celular)!==FALSE)
                $this->celular = $celular;
            else
                $this->setErrorMsg('[celular] -  não corresponde ao formato (xx) xxxxx-xxxx');
        else
            $this->setErrorMsg('[celular] - está vazio');

        return $this;
    }

    /**
     * Get the value of cep
     *
     * @return  String
     */ 
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @param  String  $cep
     *
     * @return  self
     */ 
    public function setCep(?String $cep)
    {
        if(!empty($cep))
            if(Utils::isValidZipcode($cep)!==FALSE)
                $this->cep = $cep;
            else
                $this->setErrorMsg('[cep] -  não corresponde ao formato xx.xxx-xxx ou xxxxx-xxx');
        else
            $this->setErrorMsg('[cep] - está vazia');

        return $this;
    }
    
    /**
     * Get the value of logradouro
     *
     * @return  String
     */ 
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set the value of logradouro
     *
     * @param  String  $logradouro
     *
     * @return  self
     */ 
    public function setLogradouro(?String $logradouro)
    {
        if(!empty($logradouro))
            if(strlen($logradouro)<=150)
                $this->logradouro = $logradouro;
            else
                $this->setErrorMsg('[logradouro] - ultrapassou o limite de 150 caracteres');
        else
            $this->setErrorMsg('[logradouro] - está vazio');

        return $this;
    }

    /**
     * Get the value of numero
     *
     * @return  Int
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @param  Int  $numero
     *
     * @return  self
     */ 
    public function setNumero(?Int $numero)
    {
        if(!empty($numero))
            if(strlen((string) $numero)<=6)
                $this->numero = $numero;
            else
                $this->setErrorMsg('[numero] - ultrapassou o limite de 6 caracteres');
        else
            $this->setErrorMsg('[numero] - está vazio');

        return $this;
    }
        
    /**
     * Get the value of bairro
     *
     * @return  String
     */ 
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @param  String  $bairro
     *
     * @return  self
     */ 
    public function setBairro(?String $bairro)
    {
        if(!empty($bairro))
            if(strlen($bairro)<=100)
                $this->bairro = $bairro;
            else
                $this->setErrorMsg('[bairro] - ultrapassou o limite de 100 caracteres');
        else
            $this->setErrorMsg('[bairro] - está vazio');

        return $this;
    }
        
    /**
     * Get the value of complemento
     *
     * @return  String
     */ 
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set the value of complemento
     *
     * @param  String  $complemento
     *
     * @return  self
     */ 
    public function setComplemento(?String $complemento)
    {
        if(!empty($complemento))
            if(strlen($complemento)<=150)
                $this->complemento = $complemento;
            else
                $this->setErrorMsg('[complemento] - ultrapassou o limite de 150 caracteres');
        else
            $this->setErrorMsg('[complemento] - está vazio');

        return $this;
    }
        
    /**
     * Get the value of cidade
     *
     * @return  String
     */ 
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @param  String  $cidade
     *
     * @return  self
     */ 
    public function setCidade(?String $cidade)
    {
        if(!empty($cidade))
            if(strlen($cidade)<=100)
                $this->cidade = $cidade;
            else
                $this->setErrorMsg('[cidade] - ultrapassou o limite de 100 caracteres');
        else
            $this->setErrorMsg('[cidade] - está vazio');

        return $this;
    }

    /**
     * Get the value of estado
     *
     * @return  String
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @param  String  $estado
     *
     * @return  self
     */ 
    public function setEstado(?String $estado)
    {
        $validos =array("AC", "AL", "AM", "AP", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN","RO", "RS", "RR", "SC", "SE", "SP", "TO");
        if(!empty($estado))
            if(in_array($estado,$validos))
                $this->estado = $estado;
            else
                $this->setErrorMsg('[estado] - não está contido em ['.implode(' ,',$validos).']');
        else
            $this->setErrorMsg('[estado] - está vazio');

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
    public function setStatus(?String $status='ABERTO')
    {
        $validos =array('ABERTO','FINALIZADO');
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
     * Get the value of urlImg
     *
     * @return  string
     */ 
    public function getUrlImg()
    {
        return $this->urlImg;
    }

    /**
     * Set the value of urlImg
     *
     * @param  string  $urlImg
     *
     * @return  self
     */ 
    public function setUrlImg(?String $urlImg)
    {
        if(!empty($urlImg))
            if(strlen($urlImg)<=250)
                $this->urlImg = $urlImg;
            else
                $this->setErrorMsg('[url_img] -ultrapassou o limite de 250 caracteres');
        else
            $this->setErrorMsg('[url_img] - está vazio');

        return $this;
    }

    /**
     * Get the value of criadoEm
     *
     * @return  String
     */ 
    public function getCriadoEm()
    {
        return $this->criadoEm;
    }

    /**
     * Set the value of criadoEm
     *
     * @param  String  $criadoEm
     *
     * @return  self
     */ 
    public function setCriadoEm(?String $criadoEm)
    {
        if(!empty($criadoEm))
            if(DateTime::createFromFormat('Y-m-d',$criadoEm)!==FALSE)
                $this->criadoEm = $criadoEm;
            else
                $this->setErrorMsg('[criado_em] - não corresponde ao formato YYYY-mm-dd');
        else
            $this->setErrorMsg('[criado_em] - está vazia');
    }

    /**
     * Get the value of ultimaMod
     *
     * @return  String
     */ 
    public function getUltimaMod()
    {
        return $this->ultimaMod;
    }

    /**
     * Set the value of ultimaMod
     *
     * @param  String  $ultimaMod
     *
     * @return  self
     */ 
    public function setUltimaMod(?String $ultimaMod)
    {
        if(!empty($ultimaMod))
            if(DateTime::createFromFormat('Y-m-d',$ultimaMod)!==FALSE)
                $this->ultimaMod = $ultimaMod;
            else
                $this->setErrorMsg('[ultima_mod] - não corresponde ao formato YYYY-mm-dd');
        else
            $this->setErrorMsg('[ultima_mod] - está vazia');
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
            $consulta =EventoDao::create(
                $this->getResponsavel(),
                $this->getTitulo(),
                $this->getDescricao(),
                $this->getData(),
                $this->gethora(),
                $this->getLat(),
                $this->getLong(),
                $this->getTelefone(),
                $this->getCelular(),
                $this->getCep(),
                $this->getLogradouro(),
                $this->getNumero(),
                $this->getBairro(),
                $this->getComplemento(),
                $this->getCidade(),
                $this->getEstado(),
                $this->getUrlImg()
                );
            if($consulta===TRUE)
                $response =array(
                    "status"  =>"ok",
                    "message" =>"Evento criado com sucesso!" );
            else
                $response =array(
                    "status" =>"error",
                    "message"=>"Ops, houve algum erro ao criar o evento, verifique os dados e tente novemente!");
        }
        else
            $response =array(
                "status" =>"error",
                "message"=>$this->getErrorMsg());
                
        return $response;
    }

     /**
     * Lista todos os eventos
     * @return Array
     */
    public function listByOwner($idResponsavel) :Array
    {
        $consulta =EventoDao::listEventByOwner($idResponsavel);
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
     * Busca informações de evento em especifico
     * @return Array
     */
    public function getEventById(Int $id) :Array
    {
        $consulta =EventoDao::getEventById($id);
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
     * Cria novo usuário
     * @param Int    $id
     * @param String $nome
     * @param String $email
     * @param String $tipo 'COMUM' || 'BANDA' || 'GESTOR'
     * @param String $status 'ATIVO' || 'INATIVO'
     * @param Array $permissao 
     * @return Array
     */
    // public function updateUser(Int $id) :Array
    // {
    //     if($this->getError()===FALSE)
    //     {
    //         $consulta =EventoDao::update(
    //             $id,
    //             $this->getNome(),
    //             $this->getEmail(),
    //             $this->getTipo(),
    //             $this->getStatus(),
    //             $this->getPermissao());
    //         if($consulta===TRUE)
    //             $response =array(
    //                 "status"  =>"ok",
    //                 "message" =>"Usuário atualizado com sucesso!" );
    //         else
    //             $response =array(
    //                 "status" =>"error",
    //                 "message"=>"Ops, houve algum erro ao atualizar o usuário, verifique os dados e tente novemente!");
    //     }
    //     else
    //         $response =array(
    //             "status" =>"error",
    //             "message"=>$this->getErrorMsg());
                
    //     return $response;
    // }

     /**
     * Apaga evento
     * @return Array
     */
    public function delete(Int $id) :Array
    {
        $consulta =EventoDao::delete($id);
        if(!empty($consulta))
            $response =array(
                "status"  =>"ok",
                "message" =>"evento apagado com sucesso!" );
        else
            $response =array(
                "status" =>"error",
                "message"=>"Ops, não foi possível apagar o evento informado!");
                
        return $response;
    }
}
?>