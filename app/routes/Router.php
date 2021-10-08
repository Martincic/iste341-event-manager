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
        // var_dump($slug);die();

        if('login' == $slug[0]) {
            AuthController::login();
        }

        if('register' == $slug[0]) {
            AuthController::register();
        }

        if('login-form' == $slug[0]) {
            AuthController::loginForm();
        }
        
        if('register-form' == $slug[0]) {
            AuthController::registerForm();
        }

        //To access any routes below this line, user needs to be attendee
        self::protectRoute('3', '');

        if('' == $slug[0]) {
            HomeController::index(); 
        }
        
        if('index' == $slug[0]) {
            HomeController::index();
        }

        if('home' == $slug[0]) {
            HomeController::home();
        }

        if('registrations' == $slug[0]) {
           
            EventController::registrations();
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
                   
                    EventController::single($slug[1]); // /events/{event_id}
                case 4:
                    if($slug[2] == 'register'){
                       
                        EventController::register($slug[3]); // /events/{event_id}/register/{session_id}
                    }
            }
        }

        
        //To access any routes below this line, user needs to be a manager
        self::protectRoute('2', 'Manager or admin role required.');

        if('manage' == $slug[0]) {
            switch(count($slug)) {
                case 1:
                    ManagerController::eventList(); // /events
                case 2:
                    if($slug[1] == "createEvent") ManagerController::createEvent();
                    if($slug[1] == "createVenue") ManagerController::createVenue();

                case 3:
                    if($slug[2] == 'sessions')ManagerController::sessionList($slug[1]); // /manage/{event_id}/sessions     
                    else if($slug[2] == 'deleteEvent') ManagerController::deleteEvent($slug[1], $slug[2]); // /manage/{event_id}/deleteEvent
                    else if($slug[2] == 'createSession')ManagerController::createSession($slug[1]); // /manage/{event_id}/createSession     
                case 4:
                    if($slug[2] == 'editEvent'){
                        ManagerController::editEvent($slug[1], $slug[3]); // /manage/{event_id}/editEvent/{type}
                    }       
                case 5:
                    if($slug[4] == 'editSession'){
                        ManagerController::editSession($slug[3], $slug[5]); // manage/{event_id}/sessions/{session_id}/editSession/{type}

                    }
                    if($slug[4] == 'deleteSession'){
                        ManagerController::deleteSession($slug[3]); // manage/{event_id}/sessions/{session_id}/deleteSession/{type}
                    }         
                case 6:
                    ManagerController::editSession($slug[3], $slug[5]); // manage/{event_id}/sessions/{session_id}/editSession/{type}    
            }
            // /manage/1/sessions/1/deleteSession
            
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
    public static function protectRoute($role = 3, string $message)
    {
        //if user exists
        if(isset($_SESSION['user'])){

            //if role is not set, continue
            if(!$role) return;
            //if role is set and matches, continue
            if($_SESSION['user']->role <= $role) {
                return; //continue
            }
            else  {
                if($_SESSION['user']->role == 1) return;
                self::abort($message);
                die(5);
            }
        }
        else self::abort($message);
    }

    public static function abort($message)
    {
        $view = new View('app/view/pages/login.php');
        $view->render(['message' => $message]);
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
        array_shift($request);
        array_shift($request);
        return implode('/', $request);
    }
}
