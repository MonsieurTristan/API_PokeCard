<?php

namespace App\UserPokemon\Repository;

use App\UserPokemon\Entity\UserPokemon;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class UserPokemonRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

   /**
    * Returns a collection of users.
    *
    * @param int $limit
    *   The number of users to return.
    * @param int $offset
    *   The number of users to skip.
    * @param array $orderBy
    *   Optionally, the order by info, in the $column => $direction format.
    *
    * @return array A collection of users, keyed by user id.
    */
   public function getAllPokemonByUser($parameters)
   {
     $queryBuilder = $this->db->createQueryBuilder();
     $queryBuilder
         ->select('up.*')
         ->from('UserPokemon', 'up')
         ->where('iduser = ?')
         ->setParameter(0, $parameters['iduser']);

     $statement = $queryBuilder->execute();
     $userpokemonsData = $statement->fetchAll();
     $userpokemonEntityList=null;
     foreach ($userpokemonsData as $userpokemonData) {
         $tmp = new UserPokemon($userpokemonData['idpokemon'],$userpokemonData['iduser']);
         $userpokemonEntityList[] = $tmp->toArray();
     }

     return $userpokemonEntityList;
   }


   public function getPokemonById($id){
     $url="https://pokeapi.co/api/v2/pokedex/1/";
     $data = file_get_contents($url);
     $data = json_decode ($data ,true);
     $pokemons = $data['pokemon_entries'];


     foreach ($pokemons as $pokemon) {

       if($pokemon['entry_number']==$id){

         $pokemon = $pokemon['pokemon_species'];
         $json = $pokemon['name'];
         return $json;

       }
     }
     $json ="Erreur";
     return $json;
   }


}
