<?php

namespace App\Controller;

use App\Helper\App;
use App\Middleware\AuthMiddleware;
use App\Model\CustomerModel;
use App\Model\TransactionModel;

class AdminController
{
   private $customer;

   function __construct()
   {
      $this->customer = (new AuthMiddleware)->user();
   }

   public function login($user)
   {
      $error = null;

      try {
         $email = $user['email'];
         $password = $user['password'];

         $customer = new CustomerModel();
         $result = $customer->where('email', $email);

         if (!$result) {
            $error = 'Email or password not match';
         }
         if ($result && $password !== $result['password']) {
            $error = 'Email or password not match';
         }

         if ($error) {
            App::view('auth/login', ['error' => $error]);
            return;
         }

         session_start();
         $_SESSION["user"] = $result;
         header("Location: /customer/dashboard");
      } catch (\Throwable $th) {
         App::view('auth/login', ['error' => $th->getMessage()]);
      }
   }

   public function register($customer)
   {
      $result = $this->customerRegister($customer, 'customer', 'auth/register');

      if ($result) {
         header("Location: /login");
      } else {
         header("Location: /register");
      }
   }
}
