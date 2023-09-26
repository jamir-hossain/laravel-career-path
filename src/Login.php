<?php

class Login
{
   public $name;
   public $email;
   public $logged = false;
   const DATABASE = "data/users.json";

   function __construct()
   {
      if (!file_exists(self::DATABASE)) {
         file_put_contents(self::DATABASE, '[]');
      }
      $this->name = readline("Name : ");
      $this->email = readline("Email : ");
   }

   public function save()
   {
      $user = [
         'name' => $this->name,
         'email' => $this->email,
         'role' => 'customer'
      ];

      // Load existing JSON data from the file
      $jsonData = file_get_contents(self::DATABASE);
      $userList = json_decode($jsonData, true);
      array_push($userList, $user);

      // Write the updated JSON data back to the file
      file_put_contents(self::DATABASE, json_encode($userList));

      return $user;
   }
}
