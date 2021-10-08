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
