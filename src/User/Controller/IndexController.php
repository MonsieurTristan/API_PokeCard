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
        $json = $data['pokemon_entries'];
        $json = $data['pokemon_entries'][0];
        $json = json_encode ($json);

        return new Response($json, 200, ['Content-type'=>'application/json']);
    }

}
