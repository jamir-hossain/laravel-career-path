<?php

namespace App\Controller;

use App\Helper\App;
use App\Middleware\AuthMiddleware;
use App\Model\CustomerModel;
use App\Model\TransactionModel;

class CustomerController
{
   private $customer;

   function __construct()
   {
      $this->customer = (new AuthMiddleware)->user();
   }

   public function deposit($amount)
   {
      $this->validateAmount($amount, 'customer/deposit');
      $this->createTransaction($amount, 'deposit');
      header("Location: /customer/deposit");
   }

   public function withdraw($amount)
   {
      $this->validateAmount($amount, 'customer/withdraw');
      $this->createTransaction($amount, 'withdraw');
      header("Location: /customer/withdraw");
   }

   public function transfer($email, $amount)
   {
      $customer = new CustomerModel();
      $user = $customer->where('email', $email);

      if (!$user) {
         App::view(
            'customer/transfer',
            ['user' => $this->customer, 'error' => 'Customer not fund of this email']
         );
      }

      $this->validateAmount($amount, 'customer/transfer');
      $this->createTransaction($amount, 'transfer');

      $customer->update($user['id'], ['balance' => $user['balance'] + $amount]);
      header("Location: /customer/transfer");
   }


   private function createTransaction($amount, $type)
   {
      (new TransactionModel)->create([
         'customer_id' => $this->customer['id'],
         'payment_type' => $type,
         'amount' => $amount
      ]);

      $balance = $this->customer['balance'];
      $balance = $type === 'deposit' ? $balance + $amount : $balance - $amount;

      (new CustomerModel)->update($this->customer['id'], ['balance' => $balance]);
   }

   private function validateAmount($amount, $redirect)
   {
      $error = null;
      if ($amount < 0) {
         $error = 'Negative amount not accepted';
      }
      if ($amount > $this->customer['balance']) {
         $error = 'Withdraw amount not will be bigger then current balance';
      }

      if ($error) {
         App::view($redirect, ['user' => $this->customer, 'error' => $error]);
         return;
      }
   }
}
