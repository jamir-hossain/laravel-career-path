<?php

namespace App\Model;

use App\Database\Storage;
use PDO;

class UserModel implements Model
{
   private $table = 'users';
   private Storage $storage;

   public function __construct()
   {
      $this->storage = new Storage;
   }

   public function create(array $data)
   {
      $name = $data['name'];
      $email = $data['email'];
      $password = $data['password'];

      $sql = "INSERT INTO $this->table (name, email, password) VALUES (:name, :email, :password);";

      $stmt = $this->storage->prepare($sql);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $password);
      $stmt->execute();
   }

   public function update(string $id, array $data)
   {
      // $name = $data['name'];
      // $email = $data['email'];
      // $password = $data['password'];
      // $sql = "UPDATE users SET name = '$name' WHERE id = '$id';";

      // Assuming you are using PDO for database access
      $sql = "UPDATE users SET ";
      $params = [];

      foreach ($data as $key => $value) {
         // Check if the key is valid for updating
         if ($key === 'name' || $key === 'email' || $key === 'password') {
            $sql .= "$key = :$key, ";
            $params[":$key"] = $value;
         }
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
   }

   public function find(string $id)
   {
      $sql = "SELECT * FROM $this->table WHERE id = '$id';";
      $this->storage->payload($sql);
   }

   public function where(string $key, $value)
   {
      $sql = "SELECT * FROM $this->table WHERE $key = '$value';";
      $this->storage->payload($sql);
   }
}
