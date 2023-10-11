<?php

namespace App\Middleware;

use App\Model\CustomerModel;

class AuthMiddleware
{
   private $authUser;

   function __construct()
   {
      session_start();
      $uri = $_SERVER['REQUEST_URI'];
      $path = explode('/', $uri);

      if (isset($_SESSION["user"])) {
         $this->authUser = $_SESSION["user"];

         if ($this->authUser['role'] !== 'admin') {
            if ($path[1] === 'admin') {
               header("Location: /customer/dashboard");
            }
         }

         if (count($path) < 3) {
            header("Location: /customer/dashboard");
         }
      } else {
         if (count($path) > 2) {
            if ($path[1] === 'customer' || $path[1] === 'admin') {
               header("Location: /login");
            }
         }
      }
   }

   public function user()
   {
      $customer = new CustomerModel();
      $user = $customer->find($this->authUser['id']);

      return $user;
   }
}
