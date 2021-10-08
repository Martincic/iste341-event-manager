<?php

/**
 *  Controller base class
 */
class Controller {

    public static function redirectBack()
    {
        // header("Location:javascript://history.go(-1)");
        $previousPage = $_SERVER["HTTP_REFERER"];
        header('Location: '.$previousPage);
        die();
    }
    
    public static function abort(string $view, $data = [])
    {
        $view = new View('app/view/pages/'.$view.'.php');
        $view->render($data);
    }
}