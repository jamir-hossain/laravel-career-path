<?php

namespace App\Model;

use App\Database\Storage;
use PDO;

class Model
{
   protected $table;
   protected Storage $storage;

   public function __construct(string $table)
   {
      $this->table = $table;
      $this->storage = new Storage;
   }


   public function create(array $data)
   {
      // $sql = "INSERT INTO $this->table (...) VALUES (...);";

      $sql = "INSERT INTO $this->table (";
      $sql .= implode(', ', array_keys($data));
      $sql .= ") VALUES (";
      $sql .= ':' . implode(', :', array_keys($data));
      $sql .= ");";

      $stmt = $this->storage->prepare($sql);

      foreach ($data as $key => $value) {
         $stmt->bindValue(':' . $key, $value);
      }

      $stmt->execute();

      // Fetch the result as an associative array
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      return $result;
   }

   public function update(string $id, array $data)
   {
      // Assuming you are using PDO for database access
      $params = [];
      $sql = "UPDATE $this->table SET ";

      foreach ($data as $key => $value) {
         $sql .= "$key = :$key, ";
         $params[":$key"] = $value;
      }

      // Remove the trailing comma and space
      $sql = rtrim($sql, ', ');
      $sql .= " WHERE id = :id";
      $params[':id'] = $id;

      $stmt = $this->storage->prepare($sql);

      foreach ($params as $param => $value) {
         $stmt->bindValue($param, $value);
      }
      $stmt->execute();

      // Fetch the result as an associative array
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      return $result;
   }

   public function find(string $id)
   {
      $sql = "SELECT * FROM $this->table WHERE id = :id;";
      $stmt = $this->storage->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      // Fetch the result as an associative array
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      return $result;
   }

   public function where(string $key, $value)
   {
      $sql = "SELECT * FROM $this->table WHERE $key = '$value';";
      $stmt = $this->storage->prepare($sql);
      $stmt->execute();

      // Fetch the result as an associative array
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      return $result;
   }
}
