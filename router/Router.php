<?php

class Router 
{
     public function __construct(string $path)
     {
          $route['/'] =array(
               'controller'=>'MainController',
               'action'    =>'pageMain'
          );

          $route['/login'] =array(
               'controller'=>'BandAreaController',
               'action'    =>'pageFormLogin'
          );

          $route['/new'] =array(
               'controller'=>'BandAreaController',
               'action'    =>'pageFormRegUser'
          );

          $route['/events'] =array(
               'controller'=>'BandAreaController',
               'action'    =>'pageFormRegEvent'
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