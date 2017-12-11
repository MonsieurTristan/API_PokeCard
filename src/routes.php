<?php

//Pokemons
$app->get('/id/{id}', 'App\Pokemon\Controller\PokemonController::getByIdAction')->bind('app.getbyid');

//Exchanges
$app->get('/createExchange/{iduser1}/{idpokemon1}/{iduser2}/{idpokemon2}/', 'App\Exchange\Controller\ExchangeController::createExchange')->bind('app.createExchange');
$app->get('/getExchangeToFriend/{iduser1}/', 'App\Exchange\Controller\ExchangeController::getExchangeToFriend')->bind('app.getExchangeToFriend');
$app->get('/getExchangeFromFriend/{iduser2}/', 'App\Exchange\Controller\ExchangeController::getExchangeFromFriend')->bind('app.getExchangeFromFriend');
