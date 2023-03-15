<?php
session_start();
    $route = isset($_GET['route']);
    if ($route) {
        $route = $_GET['route'];
    }
    else {
        $route = '';
    }
switch ($route) {
    
    case '':
        header('Location: home');
        break;
    case 'home':
        $_SESSION['title'] = 'Home';
        require 'home.php';
        break;
    case 'login':
        $_SESSION['title'] = 'login';
        require 'login.php';
        break;
    case 'register':
        $_SESSION['title'] = 'register';
        require 'register.php';
        break;
    case 'about':
        $_SESSION['title'] = 'about';
        require 'about.php';
        break;
    case 'profile':
        $_SESSION['title'] = 'profile';
        require 'profile.php';
        break;
    case 'adminsecure':
        $_SESSION['title'] = 'adminsecure';
        require 'adminsecure.php';
        break;
    case 'admin':
        $_SESSION['title'] = 'admin';
        require 'admin.php';
        break;
    case 'application':
        $_SESSION['title'] = 'application';
        require 'application.php';
        break;
    case 'logout':
        session_destroy();
        $_SESSION = [];
        header("Location: login");
        break;
    default:
        $_SESSION['title'] = 'Page not found';
        require '404.php';
        break;
}
?>