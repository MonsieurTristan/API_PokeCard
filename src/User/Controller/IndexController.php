<?php

namespace App\User\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function testAction(Request $request)
    {

        $data = array('id'=>1, 'name' => "pikachu", 'hp' => 50, 'damage' => 3);
        $content = json_encode($data);
        return new Response($content, 200, ['Content-type'=>'application/json']);
    }

}
