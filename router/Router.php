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
               'controller'=>'AreaRestritaController',
               'action'    =>'loginView'
          );

          $route['/area-restrita/handshake'] =array(
               'controller'=>'AreaRestritaController',
               'action'    =>'login'
          );

          $route['/area-restrita/usuarios/destroy'] =array(
               'controller'=>'AreaRestritaController',
               'action'    =>'destroy'
          );

          $route['/area-restrita/usuarios/update'] =array(
               'controller'=>'AreaRestritaController',
               'action'    =>'update'
          );

          $route['/area-restrita/logout'] =array(
               'controller'=>'AreaRestritaController',
               'action'    =>'logout'
          );

          $route['/usuarios/email'] =array(
               'controller'=>'AreaRestritaController',
               'action'    =>'showEmail'
          );

          $route['/usuarios/novo'] =array(
               'controller'=>'AreaRestritaController',
               'action'    =>'createView'
          );

          $route['/usuarios/store'] =array(
               'controller'=>'AreaRestritaController',
               'action'    =>'storeUser'
          );

          $route['/area-restrita/home'] =array(
               'controller'=>'AreaRestritaController',
               'action'    =>'home'
          );

          $route['/area-restrita/eventos'] =array(
               'controller'=>'AreaRestritaController',
               'action'    =>'eventsView'
          );

          $route['/area-restrita/meus-dados'] =array(
               'controller'=>'AreaRestritaController',
               'action'    =>'editUserView'
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