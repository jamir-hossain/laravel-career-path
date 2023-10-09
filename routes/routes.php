<?php

use App\Helper\App;
use App\Middleware\AuthMiddleware;
use App\Model\UserModel;

require_once 'Router.php';
require_once 'auth.php';
require_once 'admin.php';
require_once 'customer.php';


Router::get('', function () {
    session_start();
    $user = null;

    if (isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
    }

    App::view('index', ['user' => $user]);
});

Router::get('auth/logout', function () {
    $auth = new AuthMiddleware;

    session_start();
    session_unset();

    header("Location: /");
});
