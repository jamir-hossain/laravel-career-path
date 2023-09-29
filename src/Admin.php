<?php

namespace App;

use App\Register;

class Admin extends Register
{
   function __construct()
   {
      if (!file_exists(self::USERS)) {
         file_put_contents(self::USERS, '[]');
      }
   }
}
