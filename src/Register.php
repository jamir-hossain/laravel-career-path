<?php

namespace App;

class Register
{
   use GetData, GetUser;

   public $name;
   public $email;
   public $password;
   const USERS = "data/users.json";

   function __construct()
   {
      if (!file_exists(self::USERS)) {
         file_put_contents(self::USERS, '[]');
      }
   }


   public function register($role)
   {
      $this->name = readline("Name : ");
      $this->email = readline("Email : ");

      // checking user email whether register or not
      while ($this->getUser(self::USERS, $this->email)) {
         echo "This email already used\n";
         $this->email = readline("Email : ");
      }

      $this->password = readline("Password : ");
      // checking the minimum password length
      while (strlen($this->password) < 4) {
         echo "Minimum password length will be 4\n";
         $this->password = readline("Password : ");
      }

      $user = [
         'name' => $this->name,
         'email' => $this->email,
         'password' => $this->password,
         'role' => $role,
         'balance' => 0,
      ];

      $users = $this->getData(self::USERS);
      array_push($users, $user);

      // Write the updated JSON data back to the file
      file_put_contents(self::USERS, json_encode($users));

      return $user;
   }
}
