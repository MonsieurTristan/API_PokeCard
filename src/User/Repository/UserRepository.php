<?php

namespace App\User\Repository;

use App\User\Entity\User;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class UserRepository
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
    public function insert($parameters)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
         ->insert('UserPaul')
         ->values(
             array(
               'id' => ':id',
               'name' => ':name'
             )
         )
          ->setParameter(':id', $parameters['id'])
          ->setParameter(':name', $parameters['name']);
       $statement = $queryBuilder->execute();
   }

   public function getUserById($parameters)
   {
     $queryBuilder = $this->db->createQueryBuilder();
     $queryBuilder
         ->select('u.*')
         ->from('UserPaul', 'u')
         ->where('id = ?')
         ->setParameter(0, $parameters['id']);

     $statement = $queryBuilder->execute();
     $usersData = $statement->fetchAll();
     $userEntityList=null;
     foreach ($usersData as $userData) {
         $tmp = new User($userData['id'],$userData['name']);
         $userEntityList = $tmp->toArray();
     }

     return $userEntityList;
   }


}
