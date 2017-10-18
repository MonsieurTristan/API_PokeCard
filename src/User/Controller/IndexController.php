<?php

namespace App\User\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function testAction(Request $request)
    {

        $data = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        $content = json_encode($data);
        return new Response($content, 200, ['Content-type'=>'application/json']);
    }

}
