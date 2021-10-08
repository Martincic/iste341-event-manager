<?php

/**
 *  ManagerController handles routes for homepage
 */
class ManagerController {

    /**
     * Handles incoming requests. A query parameter 'page' is used to identify 
     * the view that will be rendered and returned back to the client.
     */
    public static function eventList() {

        $view = new View('app/view/pages/manager/event_list.php');
        
        // $events = (new Event)->managedBy($_SESSION['user']->id);
        $events = (new Event)->getAll();

        $view->render($events); //put [] as argument when no data in view
    }

    
    /*
        EDIT EVENT
    */
    public static function editEvent($event_id, $type)
    {
        $event = (new Event)->getById($event_id);

        
        $method = 'set' . $type; //example setName()

        if(isset($_POST[$type]) ){ //$_POST['Name']
            //update and refresh $events
            $events = $event->$method($_POST[$type]);
        }else {
            $events = (new Event)->getAll();
        }

        //back to event list
    
        $view = new View('app/view/pages/manager/event_list.php');

        $view->render($events); //put [] as argument when no data in view
    }

    
    /*
        DELETE EVENT
    */
    public static function deleteEvent($event_id)
    {
        $event = (new Event)->getById($event_id);
        
        //update and refresh $events
        $events = $event->delete($event_id);

        //back to event list
        $view = new View('app/view/pages/manager/event_list.php');

        $view->render($events); //put [] as argument when no data in view
    }


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

}
