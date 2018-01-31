<?php

//Pokemons
$app->get('/user/{iduser}/pokemonsName', 'App\UserPokemon\Controller\UserPokemonController::getPokemonNameByIdUser')->bind('app.getpokemonnamebyiduser');
$app->get('/user/{iduser}/pokemonsId', 'App\UserPokemon\Controller\UserPokemonController::getPokemonIdByIdUser')->bind('app.getpokemonidbyiduser');
//Exchanges
$app->get('/createExchange/{iduser1}/{idpokemon1}/{iduser2}/{idpokemon2}/', 'App\Exchange\Controller\ExchangeController::createExchange')->bind('app.createExchange');
$app->get('/getExchangeToFriend/{iduser1}/', 'App\Exchange\Controller\ExchangeController::getExchangeToFriend')->bind('app.getExchangeToFriend');
$app->get('/getExchangeFromFriend/{iduser2}/', 'App\Exchange\Controller\ExchangeController::getExchangeFromFriend')->bind('app.getExchangeFromFriend');
