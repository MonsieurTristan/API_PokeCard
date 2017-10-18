<?php

namespace App\User\Entity;

class User
{
    protected $token;


    public function __construct($token)
    {
        $this->token = $token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function toArray()
    {
        $array = array();
        $array['token'] = $this->token;
        return $array;
    }
}
