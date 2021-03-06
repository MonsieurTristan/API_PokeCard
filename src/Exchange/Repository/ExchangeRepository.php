<?php

namespace App\Exchange\Repository;

use App\Exchange\Entity\Exchange;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class ExchangeRepository
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
   public function getAll()
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('e.*')
           ->from('Exchange', 'e');

       $statement = $queryBuilder->execute();
       $exchangesData = $statement->fetchAll();
       foreach ($exchangesData as $exchangeData) {
           $exchangeEntityList[$exchangeData['id']] = new Exchange($userData['id'],$userData['iduser1'],$userData['idpokemon1'],$userData['iduser2'],$userData['idpokemon2'],$userData['status']);
       }

       return $userEntityList;
   }

   public function insert($parameters)
  {
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->insert('Exchange')
        ->values(
            array(
              'iduser1' => ':iduser1',
              'idpokemon1' => ':idpokemon1',
              'iduser2' => ':iduser2',
              'idpokemon2' => ':idpokemon2',
              'status' => ':status'
            )
        )
         ->setParameter(':iduser1', $parameters['iduser1'])
         ->setParameter(':idpokemon1', $parameters['idpokemon1'])
         ->setParameter(':iduser2', $parameters['iduser2'])
         ->setParameter(':idpokemon2', $parameters['idpokemon2'])
         ->setParameter(':status', 'waiting');
      $statement = $queryBuilder->execute();
  }


}
