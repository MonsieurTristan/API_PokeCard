<?php

$app->get('/test', 'App\User\Controller\IndexController::testAction')->bind('app.test');
$app->get('/id/{id}', 'App\User\Controller\IndexController::getByIdAction')->bind('app.getbyid');
