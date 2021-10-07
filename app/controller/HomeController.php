<?php

/**
 *  HomeController handles routes for homepage
 */
class HomeController {

    /**
     * Handles incoming requests. A query parameter 'page' is used to identify 
     * the view that will be rendered and returned back to the client.
     */
    public static function index() {

        $view = new View('app/view/pages/welcome.php');
        
        $view->render([]); //put [] as argument when no data in view
    }

    public static function login() {

        $view = new View('app/view/pages/login.php');
        
        $view->render([]); //put [] as argument when no data in view
    }

    public static function admin() {

        $view = new View('app/view/pages/admin.php');
        
        $view->render([]); //put [] as argument when no data in view
    }

    public static function person() {

        $view = new View('app/view/pages/person.php');

        $model = new Attendee;

        $data = $model->getAll();
        
        $view->render($data); //put [] as argument when no data in view
    }

    public static function home() {

        $view = new View('app/view/pages/home.php');
        
        $view->render([]); //put [] as argument when no data in view
    }

}
