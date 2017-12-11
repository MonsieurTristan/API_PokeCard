<?php

namespace App\Pokemon\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PokemonController
{


    public function getPokemonById(Request $request)
    {
        $url="https://pokeapi.co/api/v2/pokedex/1/";
        $data = file_get_contents($url);
        $data = json_decode ($data ,true);
        $pokemons = $data['pokemon_entries'];
        $parameters = $request->attributes->all();


        foreach ($pokemons as $pokemon) {

          if($pokemon['entry_number']==$parameters['id']){

            $pokemon = $pokemon['pokemon_species'];
            $json = json_encode($pokemon['name']);
            return new Response($json, 200, ['Content-type'=>'application/json']);

          }
        }
        $json = json_encode("Erreur");
        return new Response($json, 200, ['Content-type'=>'application/json']);
      }



}
