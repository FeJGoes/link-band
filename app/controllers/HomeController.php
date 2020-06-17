<?php

namespace Controllers;

use Controllers\Controller;

class HomeController
{
    public static function pageHome()
	{
		$Controller = new Controller;
        /**
         * @var $title innerText da TAG <title>
         */
        $title ='Home-Link&Band';

        /**
         * @method array setCss() Acrescenta os arquivos css nesta requisição
         */
        $Controller->setCss(['']);

		/**
         * @method array setJs() Acrescenta os arquivos scripts Javascript nesta requisição
         */
        $Controller->setJs(['']);

         /**
         * @method array setView() Acrescenta os arquivos de views nesta requisição
         */
		$Controller->setView(['home.php']);

		/**
		 * Dados a ser utilizados na view
		 */
        
		$param = '';

		/**
		 * Renderizar a config
		 */
        $Controller->render($title,$param);	
	}
	
}