<?php

namespace App;

trait GetUser
{
   use GetData;

   public function getUser($path, $email)
   {
      $filteredUser = null;
      $users = $this->getData($path);

      foreach ($users as $user) {
         if ($user['email'] === $email) {
            $filteredUser = $user;
            break;
         }
      }

      return $filteredUser;
   }
}
