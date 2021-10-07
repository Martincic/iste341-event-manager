<?php

/**
 *  EventController handles routes for events
 */
class AuthController extends Controller{

    /*
        Display login form
    */
    public static function loginForm()
    {
        if(!empty($_SESSION)) {
            session_destroy();
            header('Location:'.BASE_URL.'/login-form');
            die();
        }
        $view = new View('app/view/pages/login.php');

        $view->render([]); //put [] as argument when no data in view
    }
    
    /*
        Display register form
    */
    public static function registerForm()
    {
        if(!empty($_SESSION)) self::redirectBack();
        $view = new View('app/view/pages/register.php');

        $view->render([]); //put [] as argument when no data in view
    }

    /*
        Validate inputs and authenticate the user
    */
    public static function login() {
        if(!empty($_SESSION)) self::redirectBack();
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

        if(!$username->isSuccess() || !$password->isSuccess()) self::abort('login', ['errors'=> $errors]);
        $pass = hash('sha256', $password->value);
        
        $user = (new Attendee)->authorize($username->value, $pass);
        $_SESSION['user'] = $user ? $user : null;
        
        if(gettype($user) == 'boolean') self::abort('login', ['message' => 'No user found with these credentials.']);

        header('Location: '.BASE_URL . '/');
        die();
    }

    /*
        Validate input, register and authenticate user
    */
    public static function register() {
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
        
        $password_confirm = (new Filter)->data('Password confirmation', $_POST['password_confirm'])
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

        if(!$username->isSuccess() || !$password->isSuccess() || !$password_confirm->isSuccess()) self::abort('register', ['errors'=> $errors]);
        
        if((new Attendee)->usernameExists($username->value)) self::abort('register', ['message' => 'This username already exists!']);        
        $pass = hash('sha256', $password->value);
        $user = (new Attendee)->create($username->value, $pass) ?? null;

        $_SESSION['user'] = $user ? $user : null;
        header('Location: '.BASE_URL . '/');
        die();
    }
}