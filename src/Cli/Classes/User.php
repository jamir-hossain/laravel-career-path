<?php

namespace Cli;

use Cli\Register;
use Cli\UserDashboard;
use Cli\AdminDashboard;

class User extends Register
{
   public function login()
   {
      $this->email = readline("Email : ");
      $this->password = readline("Password : ");

      $user = $this->getUser(self::USERS, $this->email);

      if (!$user) {
         echo "Email or password didn't match\n";
         return;
      }

      if ($user['password'] !== $this->password) {
         echo "Email or password didn't match\n";
         return;
      }

      if ($user['role'] === 'admin') {
         new AdminDashboard($user);
      } else {
         new UserDashboard($user);
      }
   }
}
