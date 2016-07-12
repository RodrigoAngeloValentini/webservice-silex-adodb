<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/adodb/adodb-php/adodb.inc.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

$app = new Silex\Application();
$app['debug'] = true;

$app['db'] = function(){
    $conexao = NewADOConnection('mysql');
    $conexao->SetFetchMode(ADODB_FETCH_ASSOC);
    $server = 'localhost';
    $user = 'root';
    $pwd = 'root';
    $db = 'silex-project';
    $conexao->Connect($server, $user, $pwd, $db);

    if(!$conexao){
        return $conexao->ErrorMsg();
    }else{
        return $conexao;
    }
};
$adodb = $app['db'];

$app->get('/', function (){
    return 'Home';
});

$app->mount('/teste', include 'teste.php');
$app->mount('/empresa',include 'empresa.php');

$app->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Origin', '*');
    $response->headers->set('Access-Control-Allow-Methods', '*');
});

$app->run();
