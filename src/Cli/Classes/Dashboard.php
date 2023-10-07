<?php

namespace Cli;

class Dashboard
{
   use GetData, GetUser;

   protected $user;
   protected $logout = false;
   const USERS = "data/users.json";
   const TRANSACTIONS = "data/transactions.json";

   function __construct($user)
   {
      $this->user = $user;

      // checking transactions database file
      if (!file_exists(self::TRANSACTIONS)) {
         file_put_contents(self::TRANSACTIONS, '[]');
      }

      // checking user balance database file
      if (!file_exists(self::USERS)) {
         file_put_contents(self::USERS, '[]');
      }
   }
}
