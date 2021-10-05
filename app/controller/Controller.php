<?php

/**
 *  Controller base class
 */
class Controller {

    public static function redirectBack()
    {
        print_r($_SERVER);
        header("location:javascript://history.go(-1)");
        die();
    }
    
    public static function abort(string $view, $errors = [])
    {
        $view = new View('app/view/pages/'.$view.'.php');
        $view->render(['errors' => $errors]);
    }
}