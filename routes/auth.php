<?php

use App\Helper\App;
use App\Middleware\AuthMiddleware;
use App\Model\UserModel;


Router::get('login', function () {
   new AuthMiddleware;

   App::view('auth/login');
});

Router::post('login', function () {
   new AuthMiddleware;
   $error = null;

   try {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = new UserModel();
      $result = $user->where('email', $email);

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
});


Router::get('register', function () {
   new AuthMiddleware;

   App::view('auth/register');
});

Router::post('register', function () {
   new AuthMiddleware;
   $errors = ['name' => null, 'email' => null, 'password' => null];

   try {
      $email = $_POST['email'];
      $password = $_POST['password'];
      // unset($_POST['password']);

      $user = new UserModel();
      $result = $user->where('email', $email);
      if ($result) {
         $errors['email'] = 'Email already used by another account';
      }
      if (strlen($password) < 4) {
         $errors['password'] = 'Minimum password length will be 4 characters';
      }

      foreach ($errors as $key => $value) {
         if ($value) {
            App::view('auth/register', ['errors' => $errors]);
            return;
         }
      }

      $_POST['role'] = 'customer';
      $user->create($_POST);
      header("Location: /login");
   } catch (\Throwable $th) {
      header("Location: /register");
   }
});
