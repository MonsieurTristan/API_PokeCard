<?php

namespace App\User\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function testAction(Request $request)
    {

        $url="https://pokeapi.co/api/v2/pokedex/1/";
        $data = file_get_contents($url);
        $data = json_decode ($data ,true);
        $pokemons = $data['pokemon_entries'];

        $pokemonfr=array();

        foreach ($pokemons as $pokemon) {
            $urlpokemon = $pokemon['pokemon_species']['url'];
            $datapokemons = file_get_contents($urlpokemon);
            $datapokemons = json_decode ($datapokemons ,true);
            $datapokemons = $datapokemons['names'];

            foreach($datapokemons as $datapokemon){
              if($datapokemon['language']['name']='fr'){
                array_push($pokemonfr,$datapokemon['name']);
              }
            }
        }
        $json = array('name' => $pokemonfr );
        $json = json_encode ($json);

        return new Response($json, 200, ['Content-type'=>'application/json']);
    }



}
