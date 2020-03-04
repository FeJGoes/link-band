<?php
namespace Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Models\UsuarioModel;

class UsuarioController 
{
    public function getAll(Request $request, Response $response, $args)
    {
        $UM = new UsuarioModel;
        $data = $UM->getAll();

        $infoResponse['data'] = $data;
        $infoResponse['error'] = FALSE;
    
        $response->getBody()->write(json_encode($infoResponse));
        return $response
                    ->withHeader('Content-Type', 'application/json');  
    }

    public function createUser(Request $request, Response $response, $args){

    $infoResponse['data'] = 'HELLO WORLD';
    $infoResponse['error'] = FALSE;
    $infoResponse['message'] = 'Conectado com sucesso';
   
    $response->getBody()->write(json_encode($infoResponse));
    return $response
                 ->withHeader('Content-Type', 'application/json');  
    }
}

?>