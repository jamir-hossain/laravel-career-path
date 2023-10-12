<?php

require_once 'Router.php';

use App\Controller\AdminController;
use App\Helper\App;
use App\Middleware\AuthMiddleware;

Router::get('create/admin', function () {
   new AuthMiddleware;
   App::view('admin/create');
});

Router::post('create/admin', function () {
   $email = $_POST['email'];
   $password = $_POST['password'];
   (new AdminController)->createAdmin($email, $password);
});


Router::get('admin/customers', function () {
   (new AdminController)->customers();
});

Router::get('admin/transactions', function () {
   (new AdminController)->transactions();
});

Router::get('admin/add-customer', function () {
   $auth = new AuthMiddleware;
   App::view('admin/add_customer', ['user' => $auth->user()]);
});

Router::post('admin/add-customer', function () {
   (new AdminController)->createCustomer($_POST);
});

Router::get('admin/customer-transactions/{id}', function ($id) {
   (new AdminController)->customerTransactions($id);
});
