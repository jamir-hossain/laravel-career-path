<?php

namespace Cli;

use Cli\Register;

class Admin extends Register
{
   function __construct()
   {
      if (!file_exists(self::USERS)) {
         file_put_contents(self::USERS, '[]');
      }
   }
}
