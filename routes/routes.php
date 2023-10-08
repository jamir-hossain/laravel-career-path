<?php

require_once 'Router.php';

use App\Helper\App;
use App\Model\UserModel;

Router::get('', function () {
    $user = new UserModel();
    $result = $user->find(1);

    print_r($result);

    App::view('index');
});

Router::get('login', function () {
    App::view('auth/login');
});

Router::get('register', function () {
    App::view('auth/register');
});

Router::post('register', function () {
    // print_r($_POST);
    $user = new UserModel();
    $user->create($_POST);

    App::view('auth/register');
});

// Router::post('user_page', function () {
//     $data = [
//         'name' => $_POST['name']
//     ];

//     echo "user post page";
// });
