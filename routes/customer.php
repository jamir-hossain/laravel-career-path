<?php

use App\Controller\CustomerController;
use App\Helper\App;
use App\Middleware\AuthMiddleware;
use App\Model\CustomerModel;
use App\Model\TransactionModel;
use App\Model\UserModel;


Router::get('customer/dashboard', function () {
   $user = (new AuthMiddleware)->user();

   App::view('customer/dashboard', ['user' => $user]);
});


Router::get('customer/deposit', function () {
   $user = (new AuthMiddleware)->user();
   App::view('customer/deposit', ['user' => $user]);
});

Router::post('customer/deposit', function () {
   $amount = (int) $_POST['amount'];
   (new CustomerController())->deposit($amount);
});


Router::get('customer/withdraw', function () {
   $user = (new AuthMiddleware)->user();
   App::view('customer/withdraw', ['user' => $user]);
});

Router::post('customer/withdraw', function () {
   $amount = (int) $_POST['amount'];
   (new CustomerController())->withdraw($amount);
});


Router::get('customer/transfer', function () {
   $user = (new AuthMiddleware)->user();
   App::view('customer/transfer', ['user' => $user]);
});

Router::post('customer/transfer', function () {
   $email = $_POST['email'];
   $amount = (int) $_POST['amount'];
   (new CustomerController())->transfer($email, $amount);
});
