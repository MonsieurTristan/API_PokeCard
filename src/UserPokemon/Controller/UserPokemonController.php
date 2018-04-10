<?php

namespace App\UserPokemon\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserPokemonController
{




    public function getPokemonNameByIdUser(Request $request, Application $app){
      $parameters = $request->attributes->all();
      $idpokemons =  $app['repository.userpokemon']->getAllPokemonByUser($parameters);
      foreach ($idpokemons as $idpokemon) {
        $name= $app['repository.userpokemon']->getPokemonById($idpokemon['idpokemon']);
        $json[]= array("name" => $name,
                 "id" =>$idpokemon['idpokemon']);
      }
      $json = json_encode($json);
      return new Response($json, 200, ['Content-type'=>'application/json']);
    }

    public function getAllPokemon(Request $request, Application $app){
      $url="https://pokeapi.co/api/v2/pokedex/1/";
      $data = file_get_contents($url);
      $data = json_decode ($data ,true);
      $pokemons = $data['pokemon_entries'];

      foreach ($pokemons as $pokemon) {

       $tmp = $pokemon['entry_number'];
       $pokemon = $pokemon['pokemon_species'];
       $json[] = array("id" => $tmp,
                       "name" =>$pokemon['name'],
                     );

      }
      $json = json_encode($json);
      return new Response($json, 200, ['Content-type'=>'application/json']);
    }



    public function addPokemonByIdUser(Request $request, Application $app){
      $parameters = json_decode(file_get_contents('php://input'), true);
      $i = 0;
      while($i != $parameters['nbpkmn'])
      {
        $app['repository.userpokemon']->addPokemon($parameters['iduser'],rand(1,721));
        $i = $i +1;
      }
      return new Response("ok", 200, ['Content-type'=>'application/json']);
    }



}
