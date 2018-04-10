<?php

namespace App\Exchange\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExchangeController
{


    public function createExchange(Request $request,Application $app)
    {
        $parameters = json_decode(file_get_contents('php://input'), true);
        $exchange =  $app['repository.exchange']->insert($parameters);

        return new Response("ok", 200, ['Content-type'=>'application/json']);
    }

    public function getMyExchanges(Request $request,Application $app)
    {
        $parameters = $request->attributes->all();
        $exchange =  $app['repository.exchange']->getMyExchanges($parameters);
        $json= $exchange;
        $json = json_encode($json);
        return new Response($json, 200, ['Content-type'=>'application/json']);
    }

    public function getUsersExchanges(Request $request,Application $app)
    {
        $parameters = $request->attributes->all();
        $exchange =  $app['repository.exchange']->getUsersExchanges($parameters);
        $json= $exchange;
        $json = json_encode($json);
        return new Response($json, 200, ['Content-type'=>'application/json']);
    }

    public function cancelExchange(Request $request, Application $app)
    {
        $parameters = json_decode(file_get_contents('php://input'), true);
        $cancelExchange =  $app['repository.exchange']->cancelExchange($parameters);
        return new Response("ok", 200, ['Content-type'=>'application/json']);
    }

    public function validateExchange(Request $request, Application $app)
    {
        $parameters = json_decode(file_get_contents('php://input'), true);
        $countuser2 = $app['repository.userpokemon']->countPokemon($parameters['iduser2'],$parameters['idpokemon2']);
        $app['repository.userpokemon']->deletePokemon($parameters['iduser2'], $parameters['idpokemon2']);
        $app['repository.userpokemon']->addPokemon($parameters['iduser2'], $parameters['idpokemon1']);

        $countuser1 = $app['repository.userpokemon']->countPokemon($parameters['iduser1'],$parameters['idpokemon1']);
        $app['repository.userpokemon']->deletePokemon($parameters['iduser1'], $parameters['idpokemon1']);
        $app['repository.userpokemon']->addPokemon($parameters['iduser1'], $parameters['idpokemon2']);
        $app['repository.exchange']->updateStatus($parameters['id']);

        for ($i=0; $i <$countuser2-1 ; $i++) {
            $app['repository.userpokemon']->addPokemon($parameters['iduser2'], $parameters['idpokemon2']);
        }

        for ($i=0; $i <$countuser1-1 ; $i++) {
            $app['repository.userpokemon']->addPokemon($parameters['iduser1'], $parameters['idpokemon1']);
        }

        return new Response("ok", 200, ['Content-type'=>'application/json']);
    }


}
