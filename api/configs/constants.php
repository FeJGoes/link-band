<?php

namespace Configs;


define('BASEAPI_DIR'  ,$_SERVER['DOCUMENT_ROOT'].'/');
define('HOST'         ,$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/');
define('HOST_API'     ,$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/api/');

define('AUTOLOAD'         ,'vendor/autoload.php');
define('CSS_DIR'          ,'public/css/');
define('JS_DIR'           ,'public/js/');
define('IMGS_DIR'         ,'public/images/');
define('ARCHIVES_DIR'     ,'public/archives/');
define('DOWNLOADS_DIR'    ,'public/downloads/');
define('TEMPLATE_DIR'     ,'public/templates/');
define('CONTROLLERS_DIR'  ,'app/controllers/');
define('MODELS_DIR'       ,'app/models/');
define('VIEWS_DIR'        ,'app/views/');
define('SERVICES_DIR'     ,'app/services/');
define('DATABASE_DIR'     ,'database/');
define('LIBS_DIR'         ,'libs/');