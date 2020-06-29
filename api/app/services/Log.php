<?php
namespace Services;

class Log 
{
    public static function PDO($message =NULL) :void
    {
            $log ="[## ".date('Y-m-d H:i:s')." ##] -- PDO Error".PHP_EOL;
            $log.=$message;
            file_put_contents('api/logs/LogSQL.log', $log, FILE_APPEND);
    }
}