<?php

namespace App;

class Dashboard
{
   private $user;
   private $amount;
   private $logout = false;
   const TRANSACTIONS = "data/transactions.json";
   const USER_BALANCE = "data/users.json";

   function __construct($user)
   {
      $this->user = $user;

      // checking transactions database file
      if (!file_exists(self::TRANSACTIONS)) {
         file_put_contents(self::TRANSACTIONS, '[]');
      }

      // checking user balance database file
      if (!file_exists(self::USER_BALANCE)) {
         file_put_contents(self::USER_BALANCE, '[]');
      }


      // handling user account activities
      while (!$this->logout) {
         // Display menu options
         echo "\n-----------------------\n";
         echo "What do you want to do?\n";
         echo " 1. Show my transactions\n";
         echo " 2. Deposit money\n";
         echo " 3. Withdraw money\n";
         echo " 4. Show current balance\n";
         echo " 5. Transfer money\n";
         echo " 6. Logout\n";

         // Read user input
         $choice = readline("Enter your choice: ");
         echo "\n";

         // Perform actions based on user's choice
         switch ($choice) {
            case '1':
               print_r($this->getTransactions());
               break;

            case '2':
               $this->deposit();
               break;

            case '3':
               $this->withdraw();
               break;

            case '4':
               break;

            case '5':
               break;

            case '6':
               $this->logout = false;
               break;

            default:
               echo "Invalid choice. Please try again.\n";
         }
      }
   }



   public function getTransactions()
   {
      // Load existing JSON data from the file
      $jsonData = file_get_contents(self::TRANSACTIONS);
      $userList = json_decode($jsonData, true);

      return $userList;
   }


   public function deposit()
   {
      $amount = readline("Enter deposit amount: ");
      $this->transactionHandler($amount, 'deposit');
      $this->addBalance($amount);
   }


   public function withdraw()
   {
      $amount = readline("Enter withdraw amount: ");
      $this->transactionHandler($amount, 'withdraw');
      $this->removeBalance($amount);
   }


   public function transactionHandler(int $money, string $type)
   {
      $deposit = [
         'email' => $this->user['email'],
         'transaction_type' => $type,
         'amount' => $money,
      ];

      $transactions = $this->getTransactions();
      array_push($transactions, $deposit);

      // // Write the updated JSON data back to the file
      file_put_contents(self::TRANSACTIONS, json_encode($transactions));
   }


   public function getBalance()
   {
      // Load existing JSON data from the file
      $jsonData = file_get_contents(self::USER_BALANCE);
      $balanceList = json_decode($jsonData, true);

      $userBalance = 0;
      foreach ($balanceList as $balance) {
         if ($balance['balance'] === $this->user['email']) {
            $userBalance = $balance['balance'];
            break;
         }
      }

      return $userBalance;
   }


   public function addBalance(int $amount)
   {
      // Load existing JSON data from the file
      $jsonData = file_get_contents(self::USER_BALANCE);
      $userList = json_decode($jsonData, true);

      $userList = array_map(function ($user) use ($amount) {
         if ($user['email'] === $this->user['email']) {
            $user['balance'] += $amount;
            return $user;
         } else {
            return $user;
         }
      }, $userList);

      // Write the updated JSON data back to the file
      file_put_contents(self::USER_BALANCE, json_encode($userList));
   }


   public function removeBalance(int $amount)
   {
      // Load existing JSON data from the file
      $jsonData = file_get_contents(self::USER_BALANCE);
      $userList = json_decode($jsonData, true);

      $userList = array_map(function ($user) use ($amount) {
         if ($user['email'] === $this->user['email']) {
            $user['balance'] -= $amount;
            return $user;
         } else {
            return $user;
         }
      }, $userList);

      // Write the updated JSON data back to the file
      file_put_contents(self::USER_BALANCE, json_encode($userList));
   }
}
