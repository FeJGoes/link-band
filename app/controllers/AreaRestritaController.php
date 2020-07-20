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
	
    public static function createUserView()
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
        $evento    =new \Models\Classes\Evento;
        
		$param =$evento->listByOwner($_SESSION['id']);

		/**
		 * Renderizar a config
		 */
        $Controller->render($title,$param,FALSE,FALSE);	
    }

    public static function createEventView()
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
        $Controller->setJs(['event-create.js']);

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
    public static function editEventView()
	{
        RestritedAreaGuard::verify();

        $Controller = new Controller;
        
        /**
         * @var $title innerText da TAG <title>
         */
        $title ='Editar Evento - Link&Band';

        /**
         * @method array setCss() Acrescenta os arquivos css nesta requisição
         */
        $Controller->setCss(['form.css','area-restrita.css']);

		/**
         * @method array setJs() Acrescenta os arquivos scripts Javascript nesta requisição
         */
        $Controller->setJs(['event-edit.js']);

        /**
         * @method array setView() Acrescenta os arquivos de views nesta requisição
         */
		$Controller->setView(['area-restrita/form-edit-event.php']);

		/**
		 * Dados a ser utilizados na view
		 */
        $evento    =new \Models\Classes\Evento;
        
        $param =$evento->getEventById($_GET['e']);
        
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

    public static function destroyEvent()
	{
        $evento  =new \Models\Classes\Evento;
        $urlImg =$evento->getEventById($_POST['id'])['data']['url_img'];
        unlink($urlImg);
        $response =$evento->delete($_POST['id']);
        
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
        if($response['status']=='ok')
        {
            $mailer =new \Services\Mailer;
            $mailer->setSender('noreply@linkeband.com','link&band');
            $mailer->setReceiver($_POST['email'],$_POST['nome']);
            $mailer->setContent('Bem Vindo ao Link&Band',
            '<h1>Seja Bem Vindo(a)!, '.$_POST['nome'].'</h1><br>
            <p>Agora você já pode acessar nossa plataforma<p>
            <p><a href="'.HOST.'">link&band</a><p>',
            'Seja Bem Vindo!');
            $mailer->send();
        }
        
        echo json_encode($response,JSON_UNESCAPED_UNICODE,JSON_UNESCAPED_SLASHES);
	}
    
    public static function storeEvent()
	{
        $evento    =new \Models\Classes\Evento;

        if(isset($_FILES['banner']))
        {
            if($_FILES['banner']['error']===UPLOAD_ERR_OK)
            {
                $filename  =$_FILES['banner']['name'];
                $extension =pathinfo($filename, PATHINFO_EXTENSION);

                if(in_array($extension,['png','jpg','jpeg']))
                {
                    $newFilename =$_SESSION['id'].'-'.date('YmdHis').'.'.$extension;

                    if(move_uploaded_file($_FILES['banner']['tmp_name'], ARCHIVES_DIR."eventos/".$newFilename))
                    {
                        $evento->setUrlImg(ARCHIVES_DIR."eventos/$newFilename");
                    }
                    else
                    {
                        $evento->setUrlImg(ARCHIVES_DIR."eventos/default.png");
                        $response =array(
                            'status' =>'error',
                            'message'=>'Houve algum problema para salvar o arquivo'
                        );
                    }
                }
                else
                    $response =array(
                        'status' =>'error',
                        'message'=>'A extensão fornecida não corresponde à ['.implode(',',['png','jpg','jpeg']).']'
                    );
            }
            else
                $response =array(
                    'status' =>'error',
                    'message'=>'Houve algum problema com arquivo enviado. '
                );
        }
        else
        {
            $evento->setUrlImg(ARCHIVES_DIR."eventos/default.png");
        }
        
        $evento->setResponsavel($_SESSION['id']);
        $evento->setTitulo($_POST['titulo']);
        $evento->setGenero($_POST['genero']);
        $evento->setDescricao($_POST['descricao']);
        $evento->setData($_POST['data']);
        $evento->setHora($_POST['hora']);
        $evento->setTelefone($_POST['telefone'] ?: NULL);
        $evento->setCelular($_POST['celular']);
        $evento->setCep($_POST['cep']);
        $evento->setLogradouro($_POST['logradouro']);
        $evento->setNumero($_POST['numero']);
        $evento->setBairro($_POST['bairro']);
        $evento->setComplemento($_POST['complemento']  ?: NULL);
        $evento->setCidade($_POST['cidade']);
        $evento->setEstado($_POST['estado']);
        if(empty($response))
            $response =$evento->create();
        
        echo json_encode($response,JSON_UNESCAPED_UNICODE,JSON_UNESCAPED_SLASHES);
	}
    
    public static function updateEvent()
	{
        $evento    =new \Models\Classes\Evento;
        if(isset($_FILES['banner']))
        {
            if($_FILES['banner']['error']===UPLOAD_ERR_OK)
            {
                $filename  =$_FILES['banner']['name'];
                $extension =pathinfo($filename, PATHINFO_EXTENSION);

                if(in_array($extension,['png','jpg','jpeg']))
                {
                    $newFilename =$_SESSION['id'].'-'.date('YmdHis').'.'.$extension;
                    unlink($_POST['old_banner']);

                    if(move_uploaded_file($_FILES['banner']['tmp_name'], ARCHIVES_DIR."eventos/".$newFilename))
                    {
                        $evento->setUrlImg(ARCHIVES_DIR."eventos/$newFilename");
                        $evento->updateUrlImg($_POST['id']);
                    }
                    else
                    {
                        $evento->setUrlImg(ARCHIVES_DIR."eventos/default.png");
                        $response =array(
                            'status' =>'error',
                            'message'=>'Houve algum problema para salvar o arquivo'
                        );
                    }
                }
                else
                    $response =array(
                        'status' =>'error',
                        'message'=>'A extensão fornecida não corresponde à ['.implode(',',['png','jpg','jpeg']).']'
                    );
            }
            else
                $response =array(
                    'status' =>'error',
                    'message'=>'Houve algum problema com arquivo enviado. '
                );
        }
        
        
        $evento->setTitulo($_POST['titulo']);
        $evento->setGenero($_POST['genero']);
        $evento->setDescricao($_POST['descricao']);
        $evento->setData($_POST['data']);
        $evento->setHora($_POST['hora']);
        $evento->setTelefone($_POST['telefone'] ?: NULL);
        $evento->setCelular($_POST['celular']);
        $evento->setCep($_POST['cep']);
        $evento->setLogradouro($_POST['logradouro']);
        $evento->setNumero($_POST['numero']);
        $evento->setBairro($_POST['bairro']);
        $evento->setComplemento($_POST['complemento']  ?: NULL);
        $evento->setCidade($_POST['cidade']);
        $evento->setEstado($_POST['estado']);
        if(empty($response))
            $response =$evento->updateEvent($_POST['id']);
        
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