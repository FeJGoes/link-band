<?php
ini_set('display_errors', 1);

require 'vendor/autoload.php';
require 'configs/constants.php';
require 'router/Router.php';
require 'database/DB.php';

// Carrega as variáveis ambiente do arquivo .ENV
(Dotenv\Dotenv::createImmutable(__DIR__))->load();

new Router($_SERVER['REQUEST_URI']);

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

