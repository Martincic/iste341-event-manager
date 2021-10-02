<?php

/**
 *  Router class. Handles slug and points to desired controller/function.
 */
class Router {

    /**
     * Handles incoming requests. A query parameter 'page' is used to identify 
     * the view that will be rendered and returned back to the client.
     */
    public static function handleRequest() {

        $slug = self::getSlug();
        
        if('' == $slug) {
            HomeController::index();
        }

        if('index' == $slug) {
            HomeController::index();
        }
        
        if('admin' == $slug) {
            HomeController::admin();
        }
        
        if('person' == $slug) {
            HomeController::person();
        }
        
        if('allEvents' == $slug) {
            HomeController::allEvents();
        }
        
        if('registrations' == $slug) {
            HomeController::registrations();
        }
        
        if('home' == $slug) {
            HomeController::home();
        }

        //default if no routes match
        http_response_code(404);
        $view = new View('app/view/pages/404.php');
        $view->render([]);
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
