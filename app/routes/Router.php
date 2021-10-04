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
        $slug = explode('/',self::getSlug());

        if('' == $slug[0]) {
            HomeController::index();
        }

        if('index' == $slug[0]) {
            HomeController::index();
        }
        
        /*
            This is an example of route with parameter
        */
        
        if('person' == $slug[0]) {
            HomeController::person();
        }
        
        /*
            Route group for event routes 
            baseurl/events routes and all children 
            should be defined within this group
        */
        if('events' == $slug[0]) {
            //if slug 1 is not set, url must look like /events
            switch(count($slug)) {
                case 1:
                    EventController::index(); // /events
                case 2:
                    EventController::single($slug[1]); // /events/{id}
            }


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
