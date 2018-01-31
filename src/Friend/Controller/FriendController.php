<?php

namespace App\UserPokemon\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserPokemonController
{
    public function getPokemonByIdUser(Request $request, Application $app){
      $parameters = $request->attributes->all();
      $idpokemons =  $app['repository.userpokemon']->getAllPokemonByUser($parameters);
      foreach ($idpokemons as $idpokemon) {
        $json[] = $app['repository.userpokemon']->getPokemonById($idpokemon['idpokemon']);
      }
      $json = json_encode($json);
      return new Response($json, 200, ['Content-type'=>'application/json']);
    }






}
