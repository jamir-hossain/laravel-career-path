<?php

namespace App;

use App\Dashboard;

class AdminDashboard  extends Dashboard
{
   protected $users;
   protected $transactions;

   function __construct($user)
   {
      parent::__construct($user);
      $this->users = $this->getData(self::USERS);
      $this->transactions = $this->getData(self::TRANSACTIONS);


      while (!$this->logout) {
         // Display menu options
         echo "\n-----------------------\n";
         echo "What do you want to do?\n";
         echo " 1. Show all users transactions\n";
         echo " 2. Show an user transactions\n";
         echo " 3. Show list of all the customers\n";
         echo " 4. Logout\n";

         // Read user input
         $choice = readline("Enter your choice: ");
         echo "\n";

         // Perform actions based on user's choice
         switch ($choice) {
            case '1':
               foreach ($this->users as $user) {
                  $user['transactions'] = $this->getUserTransactions($user['email']);

                  $this->printUserTransactions($user);
               }

               break;

            case '2':
               $email = readline("Enter user email: ");
               $user = $this->getUser(self::USERS, $email);
               $user['transactions'] = $this->getUserTransactions($user['email']);

               $this->printUserTransactions($user);
               break;

            case '3':
               foreach ($this->users as $user) {
                  echo "---------------------------------------\n";
                  echo "   Name : " . $user['name'] . "\n";
                  echo "   Email : " . $user['email'] . "\n";
                  echo "   Balance : " . $user['balance'] . "\n";
                  echo "---------------------------------------\n";
               }
               break;

            case '4':
               $this->logout = true;
               break;

            default:
               echo "Invalid choice. Please try again.\n";
         }
      }
   }


   public function getUserTransactions($email)
   {
      $userTransactions = array_filter($this->transactions, function ($transaction) use ($email) {
         if ($transaction['email'] === $email) {
            return $transaction;
         }
      });

      return $userTransactions;
   }


   public function printUserTransactions($user)
   {
      echo "---------------------------------------\n";
      echo "   Name : " . $user['name'] . "\n";
      echo "   Email : " . $user['email'] . "\n";
      echo "   Balance : " . $user['balance'] . "\n";
      echo "   Transactions : \n";
      foreach ($user['transactions'] as $transaction) {
         echo "      Transaction Type : " . $transaction['transaction_type'] . "\n";
         echo "      Transaction Amount : " . $transaction['amount'] . "\n";
      }
      echo "---------------------------------------\n";
   }
}
