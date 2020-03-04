<?php
namespace Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Models\UsuarioModel;


class LoginController 
{

    public function canIenter(Request $request, Response $response, $args)
    {
        $UM = new UsuarioModel;
        $userModel = $UM->getAll();
        $post = $request->getParsedBody();
        $email = $post['email'];
        $senha = $post['senha'];
      
        if (!is_null($userModel['error'])) 
        {
            if ($email == $userModel['user-info']['email'])
            {
                if($senha == $userModel['user-info']['senha'])
                {
                    if($userModel['user-info']['status'] == 'ATIVE') 
                    {
                        $result['error'] = FALSE;
                        $result['error-type'] = NULL;
                        $result['message'] = 'Bem-vindo';
                        $result['data'] = $userModel['user-info'];
                    }
                    else 
                    {
                        $result['error'] = TRUE;
                        $result['error-type'] = 3;
                        $result['message'] = 'usuário ainda não foi confirmado';
                    }
                } 
                else 
                {
                    $result['error'] = TRUE;
                    $result['error-type'] = 2;
                    $result['message'] = 'senha ínvalida';
                }
            } 
            else 
            {
                $result['error'] = TRUE;
                $result['error-type'] = 1;
                $result['message'] = 'email não cadastrado';
            }
        } 
        else 
        {
            $result['error'] = TRUE;
            $result['error-type'] = 0;
            $result['message'] = 'SQL-Exception '.$userModel['error'][2];
        }
        
        $response->getBody()->write(json_encode($result));
        return $response
                    ->withHeader('Content-Type', 'application/json');
    }
  
}

?>