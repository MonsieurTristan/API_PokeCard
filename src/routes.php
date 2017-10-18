<?php

$app->get('/test', 'App\User\Controller\IndexController::testAction')->bind('app.test');
