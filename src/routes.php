<?php

/** ****************************************************************************
 * LOGIN ROUTES
 */
$app->post('/login', '\Controllers\LoginController:canIenter');

/** ****************************************************************************
 * USUÁRIO ROUTES
 */

$app->post('/user/new', '\Controllers\UsuarioController:createUser');
$app->post('/user/edit', '\Controllers\UsuarioController:editReg');

?>