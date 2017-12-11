<?php

namespace App\Exchange\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExchangeController
{
    public function getExchangeToFriend(Request $request)
    {


        return new Response($json, 200, ['Content-type'=>'application/json']);
    }

    public function getExchangeFromFriend(Request $request)
    {

        return new Response($json, 200, ['Content-type'=>'application/json']);
    }

    public function createExchange(Request $request,Application $app)
    {
        $parameters = $request->attributes->all();
        $exchange =  $app['repository.exchange']->insert($parameters);

        return new Response("ok", 200, ['Content-type'=>'application/json']);
    }


}
