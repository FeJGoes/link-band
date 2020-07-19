<?php

namespace Middlewares;

class RestritedAreaGuard 
{
    public static function verify()
    {
        if($_SERVER['REQUEST_URI'] == '/area-restrita/login'){
			if(!empty($_SESSION['nome'])){
				// Caso esteja na página de login e já esteja logado, manda para a home.
                header('location: '.HOST.'area-restrita/home');
			}
		}
		else{
			if(empty($_SESSION['nome'])){
				// Caso a sessão expirou, manda para a página de login.
				header('location: '.HOST.'area-restrita/login');
			}
		}
    }
}