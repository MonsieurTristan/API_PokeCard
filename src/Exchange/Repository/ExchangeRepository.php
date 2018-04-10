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

   public function getMyExchanges($parameters)
   {
     $queryBuilder = $this->db->createQueryBuilder();
     $queryBuilder
         ->select('e.*')
         ->from('ExchangePaul', 'e')
         ->where('iduser1 = ?')
         ->setParameter(0, $parameters['iduser1']);

     $statement = $queryBuilder->execute();
     $exchangesData = $statement->fetchAll();
     $exchangesEntityList=null;
     foreach ($exchangesData as $exchangeData) {
         $tmp = new Exchange($exchangeData['id'],$exchangeData['iduser1'],$exchangeData['idpokemon1'],$exchangeData['idpokemon2'],$exchangeData['status']);
         $exchangesEntityList[] = $tmp->toArray();
     }

     return $exchangesEntityList;
   }

   public function getUsersExchanges($parameters)
   {
     $queryBuilder = $this->db->createQueryBuilder();
     $queryBuilder
         ->select('e.*')
         ->from('ExchangePaul', 'e')
         ->where('iduser1 != ?')
         ->setParameter(0, $parameters['iduser1']);

     $statement = $queryBuilder->execute();
     $exchangesData = $statement->fetchAll();
     $exchangesEntityList=null;
     foreach ($exchangesData as $exchangeData) {
         $tmp = new Exchange($exchangeData['id'],$exchangeData['iduser1'],$exchangeData['idpokemon1'],$exchangeData['idpokemon2'],$exchangeData['status']);
         $exchangesEntityList[] = $tmp->toArray();
     }

     return $exchangesEntityList;
   }

   public function insert($parameters)
  {
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->insert('ExchangePaul')
        ->values(
            array(
              'id'=> 'null',
              'iduser1' => ':iduser1',
              'idpokemon1' => ':idpokemon1',
              'idpokemon2' => ':idpokemon2',
              'status' => ':status'
            )
        )
         ->setParameter(':iduser1', $parameters['iduser1'])
         ->setParameter(':idpokemon1', $parameters['idpokemon1'])
         ->setParameter(':idpokemon2', $parameters['idpokemon2'])
         ->setParameter(':status', 'waiting');
      $statement = $queryBuilder->execute();
  }

  public function cancelExchange($parameters)
 {
     $queryBuilder = $this->db->createQueryBuilder();
     $queryBuilder
       ->delete('ExchangePaul')
       ->where('id = :id')
       ->setParameter('id', $parameters['id']);
     $statement = $queryBuilder->execute();
 }

 public function updateStatus($id){
   $queryBuilder = $this->db->createQueryBuilder();
   $queryBuilder
     ->update('ExchangePaul','e')
     ->set('e.status', ':status')
     ->where('id = :id')
     ->setParameter(':id', $id)
     ->setParameter(':status', "done");
   $statement = $queryBuilder->execute();
 }


}
