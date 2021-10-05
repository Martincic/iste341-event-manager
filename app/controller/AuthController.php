<?php

/**
 *  EventController handles routes for events
 */
class AuthController extends Controller{

    public static function login() {
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] != 'POST') self::redirectBack();

        if(empty($_POST['username'])) array_push($errors, 'Please fill out your username.');
        if(empty($_POST['password'])) array_push($errors, 'Please fill out your password.');

        if(!empty($errors)) self::abort('login', $errors);
    }

    public static function register() {
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] != 'POST') self::redirectBack();

        if(empty($_POST['username'])) array_push($errors, 'Please fill out your username.');
        if(empty($_POST['password'])) array_push($errors, 'Please fill out your password.');
        if(empty($_POST['password_confirm'])) array_push($errors, 'Please fill out your password confirmation.');

        if($_POST['password'] != $_POST['password_confirm']) array_push($errors, 'Your passwords do not match.');

        if(!empty($errors)) self::abort('register', $errors);
    }

    public static function loginForm()
    {
        $view = new View('app/view/pages/login.php');

        $view->render([]); //put [] as argument when no data in view
    }
    
    public static function registerForm()
    {
        $view = new View('app/view/pages/register.php');

        $view->render([]); //put [] as argument when no data in view
    }
}