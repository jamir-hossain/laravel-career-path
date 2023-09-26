<?php

namespace App;

class Register
{
   use UserStore;

   public $password;
   const DATABASE = "data/users.json";

   function __construct()
   {
      if (!file_exists(self::DATABASE)) {
         file_put_contents(self::DATABASE, '[]');
      }
      $this->name = readline("Name : ");
      $this->email = readline("Email : ");
      $this->password = readline("Password : ");
   }

   public function save()
   {
      $user = [
         'name' => $this->name,
         'email' => $this->email,
         'password' => $this->password,
         'role' => 'customer'
      ];

      $this->saveUser($user);

      return $user;
   }
}
