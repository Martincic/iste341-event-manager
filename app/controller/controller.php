<?php

/**
 *  Common Controller class. Loads Models & Views.
 */
class Controller {

    /**
     * Handles incoming requests. A query parameter 'page' is used to identify 
     * the view that will be rendered and returned back to the client.
     */
    public static function handleRequest() {

        $slug = self::getSlug();

        if($slug === '') {
            echo 'test';
        }

        // switch ($slug) {
        //     case '/' :
        //         echo 'index';
        //         break;
        //     case '' :
        //         echo 'another index';
        //         break;
        //     case '/about' :
        //         echo 'about';
        //         break;
        //     default:
        //         http_response_code(404);
        //         echo '404';
        //         break;
        // }

        // die();
        // $page = filter_has_var(INPUT_GET, 'page') ? filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING) : NULL;

        // $data = NULL;
        // if ($page == NULL) {
        //     $view = new View('app/view/pages/login.php');
        // } else {
        //     $view = new View('app/view/pages/' . $page . '.php');
        //     $model = new Model();
        //     $data = $model->getData($page);
        // }
        // $view->render($data);
    }

    /*
        .htaccess points any request to router.php (here),
    */
    public static function getSlug()
    {   
        $request = $_SERVER['REQUEST_URI'];
        $request = explode('/', $request);
        array_shift($request);
        array_shift($request);
        return implode('/', $request);
    }
}
