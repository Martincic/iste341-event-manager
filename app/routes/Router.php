<?php

/**
 *  Router class. Handles slug and points to desired controller/function.
 */
class Router {

    /**
     * Handles incoming requests. A query parameter 'page' is used to identify 
     * the view that will be rendered and returned back to the client.
     */
    public static function handleRequest() 
    {
        //from www.google.com/events/123 
        //the slug would be events/123
        
        //uncomment line below to set yourself as admin
        //$_SESSION['user']['role'] = 'admin';
        
        $slug = self::getSlug();
        $slug_arr = explode('/',$slug);
        
        if('' == $slug) {
            HomeController::index();
        }

        if('index' == $slug) {
            HomeController::index();
        }
        
        /*
            This is an example of route with parameter
        */
        if('registrations' == $slug_arr[0]) {
            HomeController::registrations($slug_arr[1]);
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
        This checks if user is logged in, if no parameter is required it will 
        look only if user is logged in. If there is parameter, it will check 
        if user is of that exact role.
    */
    public static function protectRoute(string $role = null)
    {
        //if user exists
        if(isset($_SESSION['user'])){

            //if role is not set, continue
            if(!$role) return;

            //if role is set and matches, continue
            if($_SESSION['user']['role'] == $role) {
                return; //continue
            }
            else self::abort();
        }
        else self::abort();
    }

    public static function abort()
    {
        $view = new View('app/view/pages/login.php');
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
