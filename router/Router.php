<?php

// use Controllers\{HomeController};


class Router 
{
     public function __construct(string $path)
     {
          $route['/'] =array(
               'controller'=>'HomeController',
               'action'    =>'pageHome'
          );

          $route['/home'] =array(
               'controller'=>'HomeController',
               'action'    =>'pageHome'
          );

          if (array_key_exists($path, $route)) 
               $this->run($route[$path]['controller'], $route[$path]['action']);
          else
          {
               require BASE_DIR.CONTROLLERS_DIR.'ErrorHandle.php';
               'Controllers\\'.ErrorHandle::run404();
          } 
     }

     public function run (string $controller, string $action)
     {
          require_once BASE_DIR.CONTROLLERS_DIR."$controller.php";
          call_user_func('Controllers\\'.$controller.'::'.$action);
     }
}