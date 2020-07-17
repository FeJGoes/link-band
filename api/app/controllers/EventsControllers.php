<?php
namespace Controllers;

use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request };
use Models\Classes\EventsClass;

class EventsControllers  
{
    public function create(Request $request, Response $response, $args)
    {
        $body          =$request->getParsedBody();
        $uploadedFile  =$request->getUploadedFiles();
        $Event         =new EventsClass;

        if($uploadedFile['avatar']->getError()===UPLOAD_ERR_OK)
        {
            $filename  =$uploadedFile['avatar']->getClientFilename();
            $extension =pathinfo($filename, PATHINFO_EXTENSION);

            if(in_array($extension,['png','jpg','jpeg']))
            {
                $newFilename =md5($filename).'.'.$extension;
                $uploadedFile['avatar']->moveTo(BASEAPI_DIR.ARCHIVES_DIR."avatar/".$newFilename);

                $Event->setUrlImg(ARCHIVES_DIR."avatar/$newFilename");
                $Event->setResponsavel($body['responsavel']);
                $Event->setTitulo($body['titulo']);
                $Event->setDescricao($body['descricao']);
                $Event->setData($body['data']);
                $Event->setHora($body['hora']);
                $Event->setLat($body['latitude']);
                $Event->setLong($body['longitude']);
                $Event->setTelefone($body['telefone']);
                $Event->setCelular($body['celular']);
                $Event->setCep($body['cep']);
                $Event->setLogradouro($body['logradouro']);
                $Event->setNumero($body['numero']);
                $Event->setBairro($body['bairro']);
                $Event->setComplemento($body['complemento']);
                $Event->setCidade($body['cidade']);
                $Event->setEstado($body['estado']);

                $res =$Event->create();
            }
            else
                $res =array(
                    'status' =>'error',
                    'message'=>'A extensão fornecida não corresponde à ['.implode(',',['png','jpg','jpeg']).']'
                );
        }
        else
            $res =array(
                'status' =>'error',
                'message'=>'Houve algum problema com arquivo enviado. '.$uploadedFile['avatar']->getError()
            );
        
    
        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }

    public function list(Request $request, Response $response, $args)
    {
        $res =(new EventsClass)->listByOwner($args['id_responsavel']);
    
        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                    ->withHeader('Content-Type', 'application/json');  
    }

    public function getEvent(Request $request, Response $response, $args)
    {
        $res =(new EventsClass)->getEventById($args['id']);
    
        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                    ->withHeader('Content-Type', 'application/json');  
    }

    // public function updateUser(Request $request, Response $response, $args)
    // {
    //     $body =$request->getParsedBody();

    //     $User = new UserModel;
    //     $User->setNome($body['nome']);
    //     $User->setEmail($body['email']);
    //     $User->setTipo($body['tipo']);
    //     $User->setStatus($body['status']);
    //     $User->setPermissao($body['permissao']);
    //     $res =$User->updateUser($args['id']);
    //     $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
    //     return $response
    //                     ->withHeader('Content-Type', 'application/json');  
    // }

    public function update(Request $request, Response $response, $args)
    {
        $body =$request->getParsedBody();

        $User = new EventsClass;
        // $User->setSenha($body['senha']);
        // $res =$User->updatePass($args['id']);
        $res =($args['id']);

        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }

    public function delete(Request $request, Response $response, $args)
    {
        $res =(new EventsClass)->delete($args['id']);
    
        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }

    public function local (Request $request, Response $response, $args)
    {
        // $uploadedFile  =$request->getUploadedFiles();
        $res =['message'=> 'Hello World!'];
    
        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }
}

?>