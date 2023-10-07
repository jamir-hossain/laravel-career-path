<?php

namespace Cli;

use Cli\Dashboard;

class UserDashboard extends Dashboard
{
   function __construct($user)
   {
      parent::__construct($user);

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
               $transactions = $this->getData(self::TRANSACTIONS);
               print_r($transactions);
               break;

            case '2':
               $amount = readline("Enter deposit amount: ");
               $this->transactionHandler($amount, 'deposit', $this->user['email']);
               $this->balanceHandler($amount, 'deposit', $this->user['email']);
               break;

            case '3':
               $amount = readline("Enter withdraw amount: ");
               $this->transactionHandler($amount, 'withdraw', $this->user['email']);
               $this->balanceHandler($amount, 'withdraw', $this->user['email']);
               break;

            case '4':
               $balance = $this->getBalance();
               echo "Total balance : $balance\n";
               break;

            case '5':
               $email = readline("Enter receiver account email: ");
               $amount = readline("Enter the transfer amount: ");
               $this->transferMoney($email, $amount);
               $this->transactionHandler($amount, 'transfer', $this->user['email']);
               break;

            case '6':
               $this->logout = true;
               break;

            default:
               echo "Invalid choice. Please try again.\n";
         }
      }
   }


   public function getBalance()
   {
      $balanceList = $this->getData(self::USERS);

      $userBalance = 0;
      foreach ($balanceList as $balance) {
         if ($balance['email'] === $this->user['email']) {
            $userBalance = $balance['balance'];
            break;
         }
      }

      return $userBalance;
   }


   public function transferMoney(string $email, int $amount)
   {
      $userList = $this->getData(self::USERS);

      $userList = array_map(function ($user) use ($amount, $email) {
         if ($user['email'] === $email) {
            $user['balance'] += $amount;
            return $user;
         } else {
            if ($user['email'] === $this->user['email']) {
               $user['balance'] -= $amount;
               return $user;
            } else {
               return $user;
            }
         }
      }, $userList);

      // Write the updated JSON data back to the file
      file_put_contents(self::USERS, json_encode($userList));
   }


   public function balanceHandler(int $amount, string $type, string $email)
   {
      $userList = $this->getData(self::USERS);

      $userList = array_map(function ($user) use ($amount, $type, $email) {
         if ($user['email'] === $email) {
            if ($type === 'deposit') {
               $user['balance'] += $amount;
            }
            if ($type === 'withdraw') {
               $user['balance'] -= $amount;
            }
            return $user;
         } else {
            return $user;
         }
      }, $userList);

      // Write the updated JSON data back to the file
      file_put_contents(self::USERS, json_encode($userList));
   }


   public function transactionHandler(int $money, string $type, string $email)
   {
      $deposit = [
         'email' => $email,
         'transaction_type' => $type,
         'amount' => $money,
      ];

      $transactions = $this->getData(self::TRANSACTIONS);
      array_push($transactions, $deposit);

      // // Write the updated JSON data back to the file
      file_put_contents(self::TRANSACTIONS, json_encode($transactions));
   }
}
