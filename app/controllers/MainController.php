<?php

namespace Controllers;

use Controllers\Controller;

class MainController
{
    public static function pageMain()
	{
        $Controller = new Controller;
        
        /**
         * @var $title innerText da TAG <title>
         */
        $title ='Link&Band';

        /**
         * @method array setCss() Acrescenta os arquivos css nesta requisição
         */
        $Controller->setCss(['main.css']);

		/**
         * @method array setJs() Acrescenta os arquivos scripts Javascript nesta requisição
         */
        $Controller->setJs(['main.js']);

        /**
         * @method array setView() Acrescenta os arquivos de views nesta requisição
         */
		$Controller->setView(['main.php']);

		/**
		 * Dados a ser utilizados na view
		 */
        
		$param ='';

		/**
		 * Renderizar a config
		 */
        $Controller->render($title,$param);	
	}
	
}