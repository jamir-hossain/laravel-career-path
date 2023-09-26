<?php

namespace App;

trait UserStore
{
   public $name;
   public $email;
   private $database = 'data/users.json';

   public function getUsers()
   {
      // Load existing JSON data from the file
      $jsonData = file_get_contents($this->database);
      $userList = json_decode($jsonData, true);

      return $userList;
   }

   public function saveUser($user)
   {
      $users = $this->getUsers();
      array_push($users, $user);

      // Write the updated JSON data back to the file
      file_put_contents($this->database, json_encode($users));
   }
}
