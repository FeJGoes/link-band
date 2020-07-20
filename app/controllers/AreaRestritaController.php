<?php

namespace Controllers;

use Controllers\Controller;
use Middlewares\RestritedAreaGuard;

class AreaRestritaController
{

    /**************************************************************************/
    /**************************************************************************/
    /**************************************************************************/

    public static function loginView()
	{
        RestritedAreaGuard::verify();
        
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
		$Controller->setView(['area-restrita/login.php']);

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
		$Controller->setView(['area-restrita/form-create-user.php']);

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
        RestritedAreaGuard::verify();

        $Controller = new Controller;
        
        /**
         * @var $title innerText da TAG <title>
         */
        $title ='Home - Link&Band';

        /**
         * @method array setCss() Acrescenta os arquivos css nesta requisição
         */
        $Controller->setCss(['form.css','area-restrita.css']);

		/**
         * @method array setJs() Acrescenta os arquivos scripts Javascript nesta requisição
         */
        $Controller->setJs(['event.js']);

        /**
         * @method array setView() Acrescenta os arquivos de views nesta requisição
         */
		$Controller->setView(['area-restrita/home.php']);

		/**
		 * Dados a ser utilizados na view
		 */
        
		$param ='';

		/**
		 * Renderizar a config
		 */
        $Controller->render($title,$param,FALSE,FALSE);	
    }

    public static function eventsView()
	{
        RestritedAreaGuard::verify();

        $Controller = new Controller;
        
        /**
         * @var $title innerText da TAG <title>
         */
        $title ='Eventos - Link&Band';

        /**
         * @method array setCss() Acrescenta os arquivos css nesta requisição
         */
        $Controller->setCss(['form.css','area-restrita.css']);

		/**
         * @method array setJs() Acrescenta os arquivos scripts Javascript nesta requisição
         */
        $Controller->setJs(['event.js']);

        /**
         * @method array setView() Acrescenta os arquivos de views nesta requisição
         */
		$Controller->setView(['area-restrita/events.php']);

		/**
		 * Dados a ser utilizados na view
		 */
        
		$param ='';

		/**
		 * Renderizar a config
		 */
        $Controller->render($title,$param,FALSE,FALSE);	
    }

    public static function eventStore()
	{
        RestritedAreaGuard::verify();

        $Controller = new Controller;
        
        /**
         * @var $title innerText da TAG <title>
         */
        $title ='Cadastrar Evento - Link&Band';

        /**
         * @method array setCss() Acrescenta os arquivos css nesta requisição
         */
        $Controller->setCss(['form.css','area-restrita.css']);

		/**
         * @method array setJs() Acrescenta os arquivos scripts Javascript nesta requisição
         */
        $Controller->setJs(['event.js']);

        /**
         * @method array setView() Acrescenta os arquivos de views nesta requisição
         */
		$Controller->setView(['area-restrita/form-create-event.php']);

		/**
		 * Dados a ser utilizados na view
		 */
        
		$param ='';

		/**
		 * Renderizar a config
		 */
        $Controller->render($title,$param,FALSE,FALSE);	
    }

    public static function editUserView()
	{
        RestritedAreaGuard::verify();
        
        $Controller = new Controller;
        
        /**
         * @var $title innerText da TAG <title>
         */
        $title ='Editar meus dados - Link&Band';

        /**
         * @method array setCss() Acrescenta os arquivos css nesta requisição
         */
        $Controller->setCss(['form.css','area-restrita.css']);

		/**
         * @method array setJs() Acrescenta os arquivos scripts Javascript nesta requisição
         */
        $Controller->setJs(['user-data.js']);

        /**
         * @method array setView() Acrescenta os arquivos de views nesta requisição
         */
		$Controller->setView(['area-restrita/meus-dados.php']);

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
        $usuario  =new \Models\Classes\Usuario;
        $response =$usuario->login($_POST['email'],$_POST['senha']);

            if($response['status']=='ok')
            {
                $_SESSION['id']        = $response['data']['id'];
                $_SESSION['nome']      = $response['data']['nome'];
                $_SESSION['email']     = $response['data']['email'];
                $_SESSION['status']    = $response['data']['status'];
                $_SESSION['tipo']      = $response['data']['tipo'];
            }
            
            echo json_encode($response,JSON_UNESCAPED_UNICODE,JSON_UNESCAPED_SLASHES);
        
    }
    
    public static function destroy()
	{
        $usuario  =new \Models\Classes\Usuario;
        $response =$usuario->delete($_POST['id']);

        if($response['status']=='ok')
            session_destroy();
        
        echo json_encode($response,JSON_UNESCAPED_UNICODE,JSON_UNESCAPED_SLASHES);
    }
    
    public static function update()
	{
        $usuario  =new \Models\Classes\Usuario;
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        if(empty($_POST['senha']))
            $response =$usuario->updateBandUser($_POST['id']);
        else
        {
            $usuario->setSenha($_POST['senha']);
            $response =$usuario->updateBandUserWithPass($_POST['id']);
        }

        if($response['status']=='ok')
        {
            $_SESSION['nome']      = $response['data']['nome'];
            $_SESSION['email']     = $response['data']['email'];
        }
        
        echo json_encode($response,JSON_UNESCAPED_UNICODE,JSON_UNESCAPED_SLASHES);
    }
    
    public static function storeUser()
	{
        $usuario  =new \Models\Classes\Usuario;
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setTipo('BANDA');
        $usuario->setSenha($_POST['senha']);
        $response =$usuario->create();
        
        echo json_encode($response,JSON_UNESCAPED_UNICODE,JSON_UNESCAPED_SLASHES);
	}

    public static function logout()
	{
        session_destroy();
        header('Location: '.HOST.'area-restrita/login');
	}

    public static function showEmail()
	{
        $usuario  =new \Models\Classes\Usuario;
        echo json_encode($usuario->emailExist($_GET['e']));
	}
	
}