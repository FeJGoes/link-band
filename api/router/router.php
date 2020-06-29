<?php

use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

use Controllers\{
    EventsControllers,
    UsersControllers };

// Instantiate app
$app = AppFactory::create();
$app->setBasePath(getenv('BASE_PATH'));

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

$app->group('', function (RouteCollectorProxy $group) 
{
    /**
     * Users Routes 
     */
    $group->get('/teste'            ,UsersControllers::class.':teste');
    $group->post('/login'           ,UsersControllers::class.':login');
    $group->get('/users'            ,UsersControllers::class.':list');
    $group->get('/users/{id}'       ,UsersControllers::class.':getUser');
    $group->get('/users/{id}/email' ,UsersControllers::class.':updateUser');
    $group->post('/users'           ,UsersControllers::class.':createUser');
    $group->post('/users/{id}'      ,UsersControllers::class.':updateUser');
    $group->post('/users/{id}/pass' ,UsersControllers::class.':updatePass');
    $group->delete('/users/{id}'    ,UsersControllers::class.':delete');

    /**
     * Events Routes
     */
    $group->get('/local'                              ,EventsControllers::class.':local');
    $group->get('/users/{id_responsavel}/events'      ,EventsControllers::class.':list');
    $group->get('/users/{id_responsavel}/events/{id}' ,EventsControllers::class.':getEvent');
    $group->post('/events'                            ,EventsControllers::class.':create');
    $group->post('/users/{id_responsavel}/events/{id}',EventsControllers::class.':updateUser');
    $group->delete('/events/{id}'                     ,EventsControllers::class.':delete');
});

// Run application
$app->run();




?>