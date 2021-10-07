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

    public static function registrations() {
        $view = new View('app/view/pages/registrations.php');
        // get user id
        $attendee = $_SESSION['user']->id;

        //get event ids connected to user
        // $event_ids = (new AttendeeEvent)->getById($attendee);

        // //get ALL sessions for this attendee
        // $session_ids = (new AttendeeSession)->getById($attendee);

        $events = [];
        $sessions = [];

        // //get data and filter sessions if any
        // foreach($event_ids->event as $id){
        //     $event =  (new Event)->getById($id);
        //     array_push( $events, $event);

        //     //look for sessions 
        //     if(!empty($session_ids) > 0){ //there is a registered session
        //     //check for registered sessions with this event matching 

        //         $temp = $event->sessions();//get all sess
        //         //if session id matches session_attendee_id 
        //         if(!empty($temp)){
        //             for($i = 0; $i < count($temp)); $i++){
        //                 for($j = 0; $j < count($session_id)); $j++){

        //                     if($temp[$i]->idsession == $session_id[$j]->session ){
        //                         array_push($sessions, $temp[$i]);
        //                     }

        //                 }
        //             }
        //         }
        //     }
        // }

        $data = [
            'events' => $events,
            'sessions' => $sessions
        ];

        $view->render($data); //put [] as argument when no data in view
    }
}