<?php

use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

use Controllers\{
    UserControllers };

// Instantiate app
$app = AppFactory::create();
$app->setBasePath(getenv('BASE_PATH'));

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

$app->group('', function (RouteCollectorProxy $group) 
{
    $group->get('/teste'            ,UserControllers::class.':teste');
    $group->post('/login'           ,UserControllers::class.':login');
    $group->get('/users'            ,UserControllers::class.':list');
    $group->get('/users/{id}'       ,UserControllers::class.':getUser');
    $group->get('/users/{id}/email' ,UserControllers::class.':updateUser');
    $group->post('/users'           ,UserControllers::class.':createUser');
    $group->post('/users/{id}'      ,UserControllers::class.':updateUser');
    $group->post('/users/{id}/pass' ,UserControllers::class.':updatePass');
    $group->delete('/users/{id}'    ,UserControllers::class.':delete');
});

// Run application
$app->run();




?>