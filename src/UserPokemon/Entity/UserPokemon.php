<?php

namespace App\UserPokemon\Entity;

class UserPokemon
{
    protected $idpokemon;
    protected $iduser;



    public function __construct($idpokemon, $iduser)
    {
        $this->idpokemon = $idpokemon;
        $this->iduser = $iduser;
    }

    public function setIdPokemon($idpokemon)
    {
        $this->idpokemon = $idpokemon;
    }

    public function getIdPokemon()
    {
        return $this->token;
    }
    public function setIdUser($iduser)
    {
        $this->iduser = $iduser;
    }

    public function getIdUser()
    {
        return $this->$iduser;
    }

    public function toArray()
    {
        $array = array();
        $array['idpokemon'] = $this->idpokemon;
        $array['iduser'] = $this->iduser;
        return $array;
    }
}
