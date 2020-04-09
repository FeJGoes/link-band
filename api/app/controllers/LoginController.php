<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Models\UsuarioModel;


class LoginController 
{
    public function canIenter(Request $request, Response $response, $args)
    {
        
        $UM = new UsuarioModel;
        $post = $request->getParsedBody();
        $userModel = $UM->getAll();
        $email = $post['email'];
        $senha = $post['senha'];
      
        if (!is_null($userModel['error'])) 
        {
            if ($email == $userModel['user']['email'])
            {
                if($senha == $userModel['user']['senha'])
                {
                    if($userModel['user']['status'] == 'ATIVE') 
                    {
                        $result['error'] = FALSE;
                        $result['error-type'] = NULL;
                        $result['message'] = 'Bem-vindo';
                        $result['data'] = $userModel['user'];
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