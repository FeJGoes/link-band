<?php
namespace Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Models\UsuarioModel;

class UsuarioController 
{
    public function retriveAll(Request $request, Response $response, $args)
    {
        $UM = new UsuarioModel;
        $data = $UM->getAll();

        $infoResponse['data'] = $data;
        $infoResponse['error'] = FALSE;
    
        $response->getBody()->write(json_encode($infoResponse));
        return $response
                    ->withHeader('Content-Type', 'application/json');  
    }

    public function retriveOne (Request $request, Response $response, $args)
    {
        $post = $request->getParsedBody();
        $id   = $post['id'];
        $UM   = new UsuarioModel;
        $data = $UM->getUserInfo($id);


        $res['data']  = $data;
        $res['error'] = $data['error'][2];
    
        $response->getBody()->write(json_encode($res));
        return $response
                    ->withHeader('Content-Type', 'application/json');  
    }

    public function createUser (Request $request, Response $response, $args)
    {

        $UM = new UsuarioModel;
        // $infoResponse['data'] = $UM->testCon();
        $infoResponse['error'] = FALSE;
        $infoResponse['message'] = 'Conectado com sucesso';

        $response->getBody()->write(json_encode($infoResponse));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }

    public function editReg (Request $request, Response $response, $args)
    {
        $post = $request->getParsedBody();
        $id = !empty($post['id']) ? $post['id'] : FALSE ;

        if ($id)
        {
            if (count($post) == 0)
            {
                $nome  = $post['nome'];
                $email = $post['email'];
                $senha = $post['senha'];
                
                $UM = new UsuarioModel;
    
                if ($UM->updateUser($id, $nome, $email, $senha))
                {
                    $res['error']   = FALSE;
                    $res['message'] = 'Dados do usuário '.$id.' alterado com sucesso!';
                }
                else
                {
                    $res['error']   = TRUE;
                    $res['message'] = 'Não foi possível alterar os dados do usuário '.$id;
                }
            }
            else
            {
                $res['error']   = TRUE;
                $res['message'] = 'São necessários mais valores, além do ID';
            }
        }
        else
        {
            $res['error']   = TRUE;
            $res['message'] = 'ID de usuário não identificado';
        }

        $response->getBody()->write(json_encode($res));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }

    public function changePass (Request $request, Response $response, $args)
    {

        $UM = new UsuarioModel;
        // $infoResponse['data'] = $UM->testCon();
        $infoResponse['error'] = FALSE;
        $infoResponse['message'] = 'Conectado com sucesso';

        $response->getBody()->write(json_encode($infoResponse));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }

    public function deleteReg (Request $request, Response $response, $args)
    {

        $UM = new UsuarioModel;
        // $infoResponse['data'] = $UM->testCon();
        $infoResponse['error'] = FALSE;
        $infoResponse['message'] = 'Conectado com sucesso';

        $response->getBody()->write(json_encode($infoResponse));
        return $response
                        ->withHeader('Content-Type', 'application/json');  
    }
}

?>