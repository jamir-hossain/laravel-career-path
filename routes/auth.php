<?php

use App\Controller\AdminController;
use App\Helper\App;
use App\Middleware\AuthMiddleware;


Router::get('login', function () {
   new AuthMiddleware;
   App::view('auth/login');
});

Router::post('login', function () {
   (new AdminController)->login($_POST);
});


Router::get('register', function () {
   new AuthMiddleware;
   App::view('auth/register');
});

Router::post('register', function () {
   (new AdminController)->register($_POST);
});
