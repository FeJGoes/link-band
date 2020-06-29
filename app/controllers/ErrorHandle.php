<?php

use Controllers\Controller;

class ErrorHandle
{
    public static function run404()
    {

        $Controller = new Controller;
        /**
         * @var $title innerText da TAG <title>
         */
        $title = '404';

        /**
         * @method array setCss() Acrescenta os arquivos css nesta requisição
         */
        // $Controller->setCss(['404.css']);

         /**
         * @method array setJs() Acrescenta os arquivos scripts Javascript nesta requisição
         */
        // $Controller->setJs([]);

         /**
         * @method array setView() Acrescenta os arquivos de views nesta requisição
         */
        $Controller->setView(['404.php']);
   
        $Controller->renderError($title);
    }
}