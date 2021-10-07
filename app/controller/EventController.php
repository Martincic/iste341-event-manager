<?php

/**
 *  EventController handles routes for events
 */
class EventController {

    public static function index() {
        $view = new View('app/view/pages/event/index.php');
        
        $model = new Event;
        $events = $model->getAll();

        $view->render($events); //put [] as argument when no data in view
    }

    public static function single($event_id) {
        $view = new View('app/view/pages/event/single.php');

        $event = (new Event)->getById($event_id);

        $sessions = $event->sessions();

        $data = [
            'event' => $event,
            'sessions' => $sessions
        ];
        $view->render($data); //put [] as argument when no data in view
    }

    /*
        This endpoint is toggle. 
    */
    public static function register($session_id)
    {
        $session = (new Session)->getById($session_id);
        $message = 'Succesfully registered for ' . $session->name . ' at ' . $session->startdate;
        try{
            $session->register($_SESSION['user']);
        }
        catch(PDOException $pdo) {
            $session->unregister($_SESSION['user']); 
            $message = 'Succesfully removed from ' . $session->name;
        }

        $view = new View('app/view/pages/event/success.php');

        $data = [
            'message' => $message,
            'session' => $session
        ];
        $view->render($data);
    }

    public static function registrations() 
    {
        $view = new View('app/view/pages/registrations.php');
        $sessions_user_registered = [];
        // get user
        if(isset($_SESSION['user']) && is_a($_SESSION['user'], Attendee::class)){
            $user = $_SESSION['user'];
            $sessions_user_registered = (new Session)->whereUserRegistered($user);
        }
        //get event ids connected to user
        
        $data = [
            'sessions' => $sessions_user_registered
        ];

        $view->render($data); //put [] as argument when no data in view
    }
}