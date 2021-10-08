<?php

/**
 *  ManagerController handles routes for homepage
 */
class ManagerController extends Controller {

    /**
     * Handles incoming requests. A query parameter 'page' is used to identify 
     * the view that will be rendered and returned back to the client.
     */
    public static function eventList() {

        $view = new View('app/view/pages/manager/event_list.php');
        //ne radi
        // $events = (new Event)->managedBy($_SESSION['user']->id);

        //TEST getAll() dok ne fixamo managedBy()
        $events = (new Event)->getAll();

        $view->render($events); //put [] as argument when no data in view
    }

    
    /*
        EDIT EVENT
    */
    public static function editEvent($event_id, $type){
        $event = (new Event)->getById($event_id);

        $method = 'set' . $type; //example setName()
        $event->$method($_POST[$type]);
        
        // if(isset($_POST[$type]) ){ //$_POST['Name']
        //     //TU NESTO STEKA metoda getName() za testiranje
        //     //update and refresh $events
        //     $events = $event->$method($_GET[$type]);
        // }else {
        //     $events = (new Event)->getAll();
        // }
        self::redirectBack();
    }

    
    /*
        DELETE EVENT
    */
    public static function deleteEvent($event_id){
        $event = (new Event)->getById($event_id);
        
        //update and refresh $events
        $events = $event->delete($event_id);

        //back to event list
        $view = new View('app/view/pages/manager/event_list.php');

        $view->render($events); //put [] as argument when no data in view
    }

    /*
        LIST SESSIONS FOR SOME EVENT
    */
    public static function sessionList($event_id) {
        $view = new View('app/view/pages/manager/session_list.php');

        $event = (new Event)->getById($event_id);

        $sessions = $event->sessions();

        $data = [
            'event' => $event,
            'sessions' => $sessions
        ];
        $view->render($data); //put [] as argument when no data in view
    }

    /*
        DELETE SESSION
    */
    public static function deleteSession($session_id){
    }

    /*
        EDIT SESSION
    */
    public static function editSession($event_id, $type){
    }

}
