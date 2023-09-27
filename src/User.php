<?php

namespace App;

class User
{
   public $name;
   public $email;
   public $password;
   const DATABASE = "data/users.json";

   function __construct()
   {
      if (!file_exists(self::DATABASE)) {
         file_put_contents(self::DATABASE, '[]');
      }
   }


   public function login()
   {
      $this->email = readline("Email : ");
      $this->password = readline("Password : ");

      if (!$this->getUser()) {
         echo "Email or password didn't match\n";
         return;
      }

      if ($this->getUser()['password'] !== $this->password) {
         echo "Email or password didn't match\n";
         return;
      }

      new Dashboard($this->getUser());
   }


   public function register()
   {
      $this->name = readline("Name : ");
      $this->email = readline("Email : ");

      // checking user email whether register or not
      while ($this->getUser()) {
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
         'role' => 'customer',
         'balance' => 0,
      ];

      $this->saveUser($user);

      return $user;
   }


   public function getUsers()
   {
      // Load existing JSON data from the file
      $jsonData = file_get_contents(self::DATABASE);
      $userList = json_decode($jsonData, true);

      return $userList;
   }


   public function getUser()
   {
      $filteredUser = null;
      $users = $this->getUsers();

      foreach ($users as $user) {
         if ($user['email'] === $this->email) {
            $filteredUser = $user;
            break;
         }
      }

      return $filteredUser;
   }


   public function saveUser($user)
   {
      $users = $this->getUsers();
      array_push($users, $user);

      // Write the updated JSON data back to the file
      file_put_contents(self::DATABASE, json_encode($users));
   }
}
