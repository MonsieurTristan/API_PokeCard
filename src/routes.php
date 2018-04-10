<?php

//Pokemons
//get
$app->get('/user/{iduser}/pokemonsName', 'App\UserPokemon\Controller\UserPokemonController::getPokemonNameByIdUser')->bind('app.getpokemonnamebyiduser');
//add
$app->post('/addPokemon','App\UserPokemon\Controller\UserPokemonController::addPokemonByIdUser')->bind('app.addPokemon');
//getAll
$app->get('/getAllPokemon', 'App\UserPokemon\Controller\UserPokemonController::getAllPokemon')->bind('app.getAllPokemon');

//Exchanges
//Create
$app->post('/createExchange', 'App\Exchange\Controller\ExchangeController::createExchange')->bind('app.createExchange');
//GetMyExchanges
$app->get('/getMyExchanges/{iduser1}', 'App\Exchange\Controller\ExchangeController::getMyExchanges')->bind('app.getMyExchanges');
//GetUsersExchanges
$app->get('/getUsersExchanges/{iduser1}', 'App\Exchange\Controller\ExchangeController::getUsersExchanges')->bind('app.getUsersExchanges');
//CancelExchange
$app->post('/cancelExchange','App\Exchange\Controller\ExchangeController::cancelExchange')->bind('app.cancelExchange');
//ValidateExchange
$app->post('/validateExchange', 'App\Exchange\Controller\ExchangeController::validateExchange')->bind('app.validateExchange');


//users
//Create
$app->post('/createUser', 'App\User\Controller\IndexController::createUser')->bind('app.createUser');
//Get
$app->get('/getUser/{id}','App\User\Controller\IndexController::getUser')->bind('app.getUser');
