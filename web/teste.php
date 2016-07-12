<?php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

$teste = $app['controllers_factory'];

$teste->get('/', function () use ($adodb){
    $query = 'SELECT * FROM `users`';
    $rs = $adodb->Execute($query);
    return new JsonResponse($rs->getRows());
});

$teste->post('/',function(Request $request) use ($adodb){
    $data = $request->request->all();

    $nome = $data['nome'];
    return new JsonResponse(['method'=>'post']);
});

$teste->put('/',function(Request $request) use ($adodb){
    $data = $request->request->all();
    return new JsonResponse(['method'=>'put']);
});

$teste->delete('/',function(Request $request) use ($adodb){
    $data = $request->request->all();
    return new JsonResponse(['method'=>'delete']);
});

$teste->patch('/',function(Request $request) use ($adodb){
    $data = $request->request->all();
    return new JsonResponse(['method'=>'patch']);
});

return $teste;