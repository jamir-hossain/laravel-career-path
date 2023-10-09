<?php

require_once 'Router.php';

use App\Helper\App;
use App\Middleware\AuthMiddleware;
use App\Model\UserModel;


Router::get('create/admin', function () {
   new AuthMiddleware;

   App::view('admin/create');
});

Router::post('create/admin', function () {
   new AuthMiddleware;
   $errors = ['email' => null, 'password' => null];

   try {
      $email = $_POST['email'];
      $password = $_POST['password'];
      // unset($_POST['password']);

      $user = new UserModel();
      $result = $user->where('email', $email);
      $admin = $user->where('role', 'admin');

      if ($result) {
         $errors['email'] = 'Email already used by another account';
      }
      if (strlen($password) < 4) {
         $errors['password'] = 'Minimum password length will be 4 characters';
      }
      if ($admin) {
         $errors['email'] = 'Admin is already exists';
      }

      foreach ($errors as $key => $value) {
         if ($value) {
            App::view('admin/create', ['errors' => $errors]);
            return;
         }
      }

      $_POST['name'] = 'Admin';
      $_POST['role'] = 'admin';
      $user->create($_POST);
      header("Location: /login");
   } catch (\Throwable $th) {
      header("Location: /register");
   }
});


Router::get('admin/customers', function () {
   $auth = new AuthMiddleware;

   App::view('admin/customers');
});

Router::get('admin/transactions', function () {
   $auth = new AuthMiddleware;

   App::view('admin/transactions');
});

Router::get('admin/add-customer', function () {
   $auth = new AuthMiddleware;

   App::view('admin/add_customer');
});

Router::get('admin/customer-transactions', function () {
   $auth = new AuthMiddleware;

   App::view('admin/customer_transactions');
});
