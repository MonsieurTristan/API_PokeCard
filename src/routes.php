<?php

$app->get('/test', 'App\User\Controller\IndexController::testAction')->bind('app.test');
$app->get('/id/{id}', 'App\User\Controller\IndexController::getByIdAction')->bind('app.getbyid');


$app->get('/createExchange/{iduser1}/{idpokemon1}/{iduser2}/{idpokemon2}/', 'App\Exchange\Controller\ExchangeController::createExchange')->bind('app.createExchange');
