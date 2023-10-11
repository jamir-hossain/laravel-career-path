<?php

namespace App\Model;

use PDO;

class TransactionModel extends Model
{
   public function __construct()
   {
      parent::__construct('transactions');
   }

   public function findWithRelation(string $id)
   {
      $sql = "SELECT
               transactions.id,
               transactions.payment_type,
               transactions.amount,
               transactions.created_at,
               transactions.updated_at,
               customers.id AS customer_id,
               customers.name AS customer_name,
               customers.email AS customer_email
         FROM transactions
         JOIN customers ON transactions.customer_id = customers.id
         WHERE transactions.id = :id;
      ";
      $stmt = $this->storage->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      // Fetch the result as an associative array
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      return $result;
   }

   public function whereWithRelation(string $key, $value)
   {
      $sql = "SELECT
               transactions.id,
               transactions.payment_type,
               transactions.amount,
               transactions.created_at,
               transactions.updated_at,
               customers.id AS customer_id,
               customers.name AS customer_name,
               customers.email AS customer_email
         FROM transactions
         JOIN customers ON transactions.customer_id = customers.id
         WHERE transactions.$key = '$value';
      ";
      $stmt = $this->storage->prepare($sql);
      $stmt->execute();

      // Fetch the result as an associative array
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      return $result;
   }
}
