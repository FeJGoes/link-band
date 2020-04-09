<?php

use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

use function App\Services\httpBasicAuth;

use App\Controllers\LoginController;
use App\Controllers\UsuarioController;

// Instantiate app
$app = AppFactory::create();
$app->setBasePath('/linkeband/api');

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

$app->group('/v1', function (RouteCollectorProxy $group) 
{
    $group->post('/login', LoginController::class . ':canIenter');

   
    $group->post('/user/new', UsuarioController::class . ':createUser');
    $group->post('/user/edit', UsuarioController::class . ':editReg');


})->add(httpBasicAuth());

// Run application
$app->run();




?>