<?php

namespace App\Controller;

use App\Helper\App;
use App\Model\CustomerModel;

trait RegisterController
{
   private function customerRegister(array $customer, string $role, string $redirect)
   {
      $errors = ['email' => null, 'password' => null];

      try {
         $email = $customer['email'];
         $password = $customer['password'];

         $newCustomer = new CustomerModel();
         $result = $newCustomer->where('email', $email);
         if ($result) {
            $errors['email'] = 'Email already used by another account';
         }
         if (strlen($password) < 4) {
            $errors['password'] = 'Minimum password length will be 4 characters';
         }

         if ($role === 'admin') {
            $admin = $newCustomer->where('role', 'admin');
            if ($admin) {
               $errors['email'] = 'Admin is already exists';
            }
         }

         foreach ($errors as $key => $value) {
            if ($value) {
               App::view($redirect, ['errors' => $errors]);
               return;
            }
         }

         $customer['role'] = $role;
         $newCustomer->create($customer);

         return true;
      } catch (\Throwable $th) {
         return false;
      }
   }
}
