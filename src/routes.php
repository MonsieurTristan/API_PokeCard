<?php

//Pokemons
$app->get('/user/{iduser}/pokemons', 'App\UserPokemon\Controller\UserPokemonController::getPokemonByIdUser')->bind('app.getpokemonbyiduser');
//Exchanges
$app->get('/createExchange/{iduser1}/{idpokemon1}/{iduser2}/{idpokemon2}/', 'App\Exchange\Controller\ExchangeController::createExchange')->bind('app.createExchange');
$app->get('/getExchangeToFriend/{iduser1}/', 'App\Exchange\Controller\ExchangeController::getExchangeToFriend')->bind('app.getExchangeToFriend');
$app->get('/getExchangeFromFriend/{iduser2}/', 'App\Exchange\Controller\ExchangeController::getExchangeFromFriend')->bind('app.getExchangeFromFriend');
