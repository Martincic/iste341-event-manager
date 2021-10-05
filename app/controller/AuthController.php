<?php

/**
 *  EventController handles routes for events
 */
class AuthController extends Controller{

    /*
        Authenticate the u
    */
    public static function login() {
        if($_SERVER['REQUEST_METHOD'] != 'POST') self::redirectBack();
        
        //filter
        $username = (new Filter)->data('Username', $_POST['username'])
                                ->sanitize_string()
                                ->required()
                                ->pattern('Alphanumeric')
                                ->min(4)
                                ->max(20);
        
        $password = (new Filter)->data('Password', $_POST['password'])
                                ->sanitize_string()
                                ->required()
                                ->pattern('Alphanumeric')
                                ->min(4)
                                ->max(20);
        $errors = [
            'username' => $username->getErrors(),
            'password' => $password->getErrors(),
        ];

        if(!$username->isSuccess() || !$password->isSuccess()) self::abort('login', $errors);
        
    }

    public static function register() {
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] != 'POST') self::redirectBack();
        
        //filter
        $username = (new Filter)->data('Username', $_POST['username'])
                                ->sanitize_string()
                                ->required()
                                ->pattern('Alphanumeric')
                                ->min(4)
                                ->max(20);

        $password = (new Filter)->data('Password', $_POST['password'])
                                ->sanitize_string()
                                ->required()
                                ->pattern('Alphanumeric')
                                ->min(4)
                                ->max(20);
        
        $password_confirm = (new Filter)->data('Password confiration', $_POST['password_confirm'])
                                ->sanitize_string()
                                ->required()
                                ->pattern('Alphanumeric')
                                ->min(4)
                                ->max(20);
        $errors = [
            'username' => $username->getErrors(),
            'password' => $password->getErrors(),
            'password_confirm' => $password_confirm->getErrors()
        ];
        
        if($password->value != $password_confirm->value) array_push($errors['password'], 'Your passwords do not match.');

        if(!$username->isSuccess() || !$password->isSuccess() || !$password_confirm->isSuccess()) self::abort('register', $errors);
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