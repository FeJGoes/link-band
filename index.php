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

require 'routes.php';

// Run application
$app->run();
