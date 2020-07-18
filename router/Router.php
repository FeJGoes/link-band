<?php

class Router 
{
     public function __construct(string $path)
     {
          $route['/'] =array(
               'controller'=>'MainController',
               'action'    =>'pageMain'
          );

          $route['/area-restrita/login'] =array(
               'controller'=>'BandAreaController',
               'action'    =>'loginView'
          );

          $route['/area-restrita/handshake'] =array(
               'controller'=>'BandAreaController',
               'action'    =>'login'
          );
          
          $route['/area-restrita/usuarios/{id}'] =array(
               'controller'=>'BandAreaController',
               'action'    =>'show'
          );

          $route['/area-restrita/logout'] =array(
               'controller'=>'BandAreaController',
               'action'    =>'logout'
          );


          $route['/usuarios/novo'] =array(
               'controller'=>'BandAreaController',
               'action'    =>'createView'
          );

          $route['/area-restrita/home'] =array(
               'controller'=>'BandAreaController',
               'action'    =>'home'
          );

          if (array_key_exists($path, $route)) 
               $this->run($route[$path]['controller'], $route[$path]['action']);
          else
               Controllers\ErrorHandle::run404();
     }

     public function run (string $controller, string $action)
     {
          call_user_func('Controllers\\'.$controller.'::'.$action);
     }
}