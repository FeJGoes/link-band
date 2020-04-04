<?php
require './composer/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Controllers\LoginController;
use Controllers\UsuarioController;

// Instantiate app
$app = AppFactory::create();
$app->setBasePath('/TCC');

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// $app->add(function ($request, $response, $next) 
// {
//     $post = $request->getParsedBody();
//     if($post['token'] == '123456')
//     {
//         $response = $next($request, $response);
//     }
//     else
//     {
//         $response->getBody()->write(json_encode(["permission" => 405]));
//         $response->withHeader('Content-Type', 'application/json');
//     }


// 	return $response;
// });

require 'src/routes.php';

// Run application
$app->run();
