<?php

use App\App;
use App\Lib\Erro;
require_once "./App/App.php";

session_start();

error_reporting(E_ALL & ~E_NOTICE ^ E_DEPRECATED);

require_once("vendor/autoload.php");

try {
    $app = new App();
    $app->run();
}catch (\Exception $e){
    $oError = new Erro($e);
    $oError->render();
}