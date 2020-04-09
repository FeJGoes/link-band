<?php

namespace App\Services;

use Tuupola\Middleware\HttpBasicAuthentication;

/**
 * Middleware basico de validação para uso da API
 *
 * @return HttpBasicAuthentication
 */
function httpBasicAuth ():HttpBasicAuthentication
{
    return new HttpBasicAuthentication([
        "users" => 
        [
            "root" => "t00r",
        ],
        "path"   => ["/linkeband/api/v1"],
        "ignore" => ["/linkeband/api/v1/login"],
        "realm"  => "Protected",
    ]);
}