<?php

require 'vendor/autoload.php';
// Carrega as variáveis ambiente do arquivo .ENV
(Dotenv\Dotenv::createImmutable(__DIR__))->load();

require 'router/router.php';
require 'app/services/Middleware.php';