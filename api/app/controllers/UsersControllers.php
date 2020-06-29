<?php
namespace Controllers;

use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request };
use Models\Classes\UserClass;

class UsersControllers 
{
    public function createUser (Request $request, Response $response, $args)
    {
        $body =$request->getParsedBody();

        $User = new UserClass;
        $User->setNome($body['nome']);
        $User->setEmail($body['email']);
        $User->setSenha($body['senha']);
        $User->setTipo($body['tipo']);
        $User->setStatus('ATIVO');
        $User->setPermissao($body['permissao']);
        $res =$User->create();

        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }

    public function list(Request $request, Response $response, $args)
    {
        $res =(new UserClass)->list();
    
        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                    ->withHeader('Content-Type', 'application/json');  
    }

    public function getUser (Request $request, Response $response, $args)
    {
        $res =(new UserClass)->getUserInfo($args['id']);
    
        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                    ->withHeader('Content-Type', 'application/json');  
    }

    public function login (Request $request, Response $response, $args)
    {
        $body =$request->getParsedBody();
        
        $res =(new UserClass)->login($body['email'],$body['senha']);
    
        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                    ->withHeader('Content-Type', 'application/json');  
    }

    public function updateUser(Request $request, Response $response, $args)
    {
        $body =$request->getParsedBody();

        $User = new UserClass;
        $User->setNome($body['nome']);
        $User->setEmail($body['email']);
        $User->setTipo($body['tipo']);
        $User->setStatus($body['status']);
        $User->setPermissao($body['permissao']);
        $res =$User->updateUser($args['id']);
        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }

    public function updatePass (Request $request, Response $response, $args)
    {
        $body =$request->getParsedBody();

        $User = new UserClass;
        $User->setSenha($body['senha']);
        $res =$User->updatePass($args['id']);

        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }

    public function delete (Request $request, Response $response, $args)
    {
        $res =(new UserClass)->delete($args['id']);
    
        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }

    public function teste (Request $request, Response $response, $args)
    {
        $res =['message'=> BASE_DIR.ARCHIVES_DIR."avatar/"];
    
        $response->getBody()->write(json_encode($res, JSON_UNESCAPED_SLASHES,JSON_UNESCAPED_UNICODE));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }
}

?>