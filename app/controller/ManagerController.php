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
        
        $events = (new Event)->managedBy($_SESSION['user']->id);

        $view->render($events); //put [] as argument when no data in view
    }

}
