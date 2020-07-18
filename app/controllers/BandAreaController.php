<?php

namespace Controllers;

use Controllers\Controller;
use GuzzleHttp\Client;
use Laminas\Diactoros\Response\JsonResponse;

class BandAreaController
{
    public static function loginView()
	{
        $Controller = new Controller;
        
        /**
         * @var $title innerText da TAG <title>
         */
        $title ='Login - Link&Band';

        /**
         * @method array setCss() Acrescenta os arquivos css nesta requisição
         */
        $Controller->setCss(['login.css']);

		/**
         * @method array setJs() Acrescenta os arquivos scripts Javascript nesta requisição
         */
        $Controller->setJs(['login.js']);

        /**
         * @method array setView() Acrescenta os arquivos de views nesta requisição
         */
		$Controller->setView(['area-usuario/login.php']);

		/**
		 * Dados a ser utilizados na view
		 */
        
		$param ='';

		/**
		 * Renderizar a config
		 */
        $Controller->render($title,$param,FALSE,FALSE);	
	}
	
    public static function createView()
	{
        $Controller = new Controller;
        
        /**
         * @var $title innerText da TAG <title>
         */
        $title ='Minha Conta - Link&Band';

        /**
         * @method array setCss() Acrescenta os arquivos css nesta requisição
         */
        $Controller->setCss(['form.css']);

		/**
         * @method array setJs() Acrescenta os arquivos scripts Javascript nesta requisição
         */
        $Controller->setJs(['register-user.js']);

        /**
         * @method array setView() Acrescenta os arquivos de views nesta requisição
         */
		$Controller->setView(['area-usuario/registro-usuario.php']);

		/**
		 * Dados a ser utilizados na view
		 */
        
		$param ='';

		/**
		 * Renderizar a config
		 */
        $Controller->render($title,$param,FALSE,FALSE);	
	}
	
    public static function home()
	{
        $Controller = new Controller;
        
        /**
         * @var $title innerText da TAG <title>
         */
        $title ='Evento - Link&Band';

        /**
         * @method array setCss() Acrescenta os arquivos css nesta requisição
         */
        $Controller->setCss(['form.css','events.css']);

		/**
         * @method array setJs() Acrescenta os arquivos scripts Javascript nesta requisição
         */
        $Controller->setJs(['event.js']);

        /**
         * @method array setView() Acrescenta os arquivos de views nesta requisição
         */
		$Controller->setView(['area-usuario/events.php']);

		/**
		 * Dados a ser utilizados na view
		 */
        
		$param ='';

		/**
		 * Renderizar a config
		 */
        $Controller->render($title,$param,FALSE,FALSE);	
    }
    

    public static function login()
	{
        $client = new Client;
        $response = $client->request('POST', 'http://localhost/api/login',[
            'multipart' => [
                [
                    'name'     => 'email',
                    'contents' => $_POST['email']
                ],
                [
                    'name'     => 'senha',
                    'contents' => $_POST['senha']
                ]
            ]
        ]);

        if($response->getStatusCode() === 200)
        {
            $res = (json_decode($response->getBody(),true));
            $_SESSION['nome']      = $res['data']['nome'];
            $_SESSION['email']     = $res['data']['email'];
            $_SESSION['status']    = $res['data']['status'];
            $_SESSION['tipo']      = $res['data']['tipo'];
            $_SESSION['permissao'] = $res['data']['permissao'];
            echo ($response->getBody());
        }
	}

    public static function logout()
	{
        session_destroy();
        header('Location: '.HOST.'area-restrita/login');
	}
	
}