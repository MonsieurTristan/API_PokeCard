<?php

namespace App\User\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{

  public function createUser(Request $request,Application $app)
  {
      $parameters = json_decode(file_get_contents('php://input'), true);
      $user =  $app['repository.user']->insert($parameters);
      $i = 0;
      while($i != 6)
      {
        $app['repository.userpokemon']->addPokemon($parameters['id'],rand(1,721));
        $i = $i +1;
      }
      return new Response("ok", 200, ['Content-type'=>'application/json']);
  }

  public function getUser(Request $request,Application $app)
  {
    $parameters = $request->attributes->all();
    $user =  $app['repository.user']->getUserById($parameters);
    $json= $user;
    $json = json_encode($json);
    return new Response($json, 200, ['Content-type'=>'application/json']);
  }


}
