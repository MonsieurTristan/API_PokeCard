<?php

namespace App\Exchange\Entity;

class Exchange
{
    protected $id;
    protected $iduser1;
    protected $idpokemon1;
    protected $idpokemon2;
    protected $status;

    public function __construct($id,$iduser1,$idpokemon1,$idpokemon2,$status)
    {
        $this->id = $id;
        $this->iduser1 = $iduser1;
        $this->idpokemon1 = $idpokemon1;
        $this->idpokemon2 = $idpokemon2;
        $this->status = $status;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setIdUser1($iduser1)
    {
        $this->iduser1 = $iduser1;
    }

    public function getIdUser1()
    {
        return $this->iduser1;
    }

    public function setIdPokemon1($idpokemon1)
    {
        $this->idpokemon1 = $idpokemon1;
    }

    public function getIdPokemon1()
    {
        return $this->idpokemon1;
    }



    public function setIdPokemon2($idpokemon2)
    {
        $this->idpokemon2 = $idpokemon2;
    }

    public function getIdPokemon2()
    {
        return $this->idpokemon2;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }


    public function toArray()
    {
        $array = array();
        $array['id  '] = $this->id;
        $array['iduser1'] = $this->iduser1;
        $array['idpokemon1'] = $this->idpokemon1;
        $array['idpokemon2'] = $this->idpokemon2;
        $array['status'] = $this->status;
        return $array;
    }
}
