<?php

use App\Helper\App;
use App\Middleware\AuthMiddleware;
use App\Model\UserModel;


Router::get('customer/dashboard', function () {
   $auth = new AuthMiddleware;

   App::view('customer/dashboard', ['user' => $auth->user()]);
});

Router::get('customer/deposit', function () {
   $auth = new AuthMiddleware;

   App::view('customer/deposit', ['user' => $auth->user()]);
});

Router::get('customer/withdraw', function () {
   $auth = new AuthMiddleware;

   App::view('customer/withdraw', ['user' => $auth->user()]);
});

Router::get('customer/transfer', function () {
   $auth = new AuthMiddleware;

   App::view('customer/transfer', ['user' => $auth->user()]);
});
