<?php
use Symfony\Component\HttpFoundation\JsonResponse;

$empresa = $app['controllers_factory'];

$empresa->get('/',function(){
    $arr = [
        0 => ['name'=>'Empresa 1','value'=>0],
        1 => ['name'=>'Empresa 2','value'=>1],
        2 => ['name'=>'Empresa 3','value'=>2]
    ];
    //$response = new Response();
    //$response->headers->set('Content-Type', 'application/json');
    //return new Response(json_encode($arr));
    return new JsonResponse($arr);
});

return $empresa;