<!-- $( ".selector" ).tabs( "option", "active", 2 ); -->
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

        $events = (new Event)->getAll();
        $venues = (new Venue)->getAll();

        $data = [
            'events' => $events,
            'venues' => $venues
        ];

        $view->render($data); //put [] as argument when no data in view
    }

    /*
        CREATE EVENT
    */
    public static function createEvent(){

        $name = (new Filter)->data('Name', $_POST['Name'] ?? null)
                                ->sanitize_string()
                                ->required()
                                ->pattern('words')
                                ->min(3)
                                ->max(20);

        $dateStart = (new Filter)->data('DateStart', $_POST['DateStart'] ?? null)
                                ->sanitize_string()
                                ->required();

        $dateEnd = (new Filter)->data('DateEnd', $_POST['DateEnd'] ?? null)
                                ->sanitize_string()
                                ->required();

        $numberAllowed = (new Filter)->data('NumberAllowed', $_POST['NumberAllowed'] ?? null)
                                ->sanitize_int()
                                ->required()
                                ->pattern('int');

        $venue = (new Filter)->data('Venue', $_POST['venue'] ?? null)
                                ->sanitize_int()
                                ->required()
                                ->pattern('int');
            
        $errors = [
            'name' => $name->getErrors(),
            'dateStart' => $dateStart->getErrors(),
            'dateEnd' => $dateEnd->getErrors(),
            'numberAllowed' => $numberAllowed->getErrors(),
            'venue' => $venue->getErrors()
        ];
        
        $event = (new Event)->getall();
        $venues = (new Venue)->getAll();
        
        if( !$name->isSuccess() ||
        !$dateStart->isSuccess() ||
        !$dateEnd->isSuccess() ||
        !$numberAllowed->isSuccess() ||
        !$venue->isSuccess() ) self::abort('manager/event_list', ['errors' => $errors, 'events' => $event, 'venues' => $venues]); 
        
        $data = [
            "name"=> $name->value,
            "datestart"=> $dateStart->value,
            "dateend"=> $dateEnd->value,
            "numberallowed"=> $numberAllowed->value,
            "venue"=> $venue->value,
        ];
        try{
            Event::add($data);
        }
        catch(PDOException $pdo) {
        }

        self::redirectBack();
    }


    /*
        CREATE SESSION 
    */
    public static function createSession($event_id){
        
        $name = (new Filter)->data('Name', $_POST['Name'] ?? null)
                                ->sanitize_string()
                                ->required()
                                ->pattern('words')
                                ->min(3)
                                ->max(50);

        $dateStart = (new Filter)->data('DateStart', $_POST['DateStart'] ?? null)
                                ->sanitize_string()
                                ->required();

        $dateEnd = (new Filter)->data('DateEnd', $_POST['DateEnd'] ?? null)
                                ->sanitize_string()
                                ->required();

        $numberAllowed = (new Filter)->data('NumberAllowed', $_POST['NumberAllowed'] ?? null)
                                ->sanitize_int()
                                ->required()
                                ->pattern('int');
            
        $errors = [
            'name' => $name->getErrors(),
            'dateStart' => $dateStart->getErrors(),
            'dateEnd' => $dateEnd->getErrors(),
            'numberAllowed' => $numberAllowed->getErrors(),
        ];

        $event = (new Event)->getById($event_id);

        $sessions = $event->sessions();

        if( !$name->isSuccess() ||
        !$dateStart->isSuccess() ||
        !$dateEnd->isSuccess() ||
        !$numberAllowed->isSuccess()) self::abort('manager/session_list', ['errors' => $errors, 'event' => $event, 'sessions' => $sessions]); 
        
        $data = [
            "name"=> $name->value,
            "datestart"=> $dateStart->value,
            "dateend"=> $dateEnd->value,
            "numberallowed"=> $numberAllowed->value,
            'event' => $event_id
        ];

        Session::add($data);

        self::redirectBack();
    }

    /*
        CREATE VENUE 
    */
    public static function createVenue(){
        $name = (new Filter)->data('Name', $_POST['Name'] ?? null)
                                ->sanitize_string()
                                ->required()
                                ->pattern('words')
                                ->min(3)
                                ->max(50);

        $capacity = (new Filter)->data('Capacity', $_POST['Capacity'] ?? null)
                                ->sanitize_int()
                                ->required()
                                ->pattern('int');
        $errors = [
            'name' => $name->getErrors(),
            'capacity' => $capacity->getErrors()
        ];
        
        $venues = (new Venue)->getAll();    
        $events = (new Event)->getall();
        
        if( !$name->isSuccess() ||
        !$capacity->isSuccess()) self::abort('manager/event_list', ['errors' => $errors, 'venues' => $venues, 'events' => $events]); 
    
        
        $data = [
            "name"=> $name->value,
            "capacity"=> $capacity->value
        ];
        
        try{
            Venue::add($data);
        }
        catch(PDOException $pdo) {
        }

        self::redirectBack();
    }

    
    /*
        EDIT EVENT
    */
    public static function editEvent($event_id, $type){
        $event = (new Event)->getById($event_id);

        $method = 'set' . $type; //example setName()

        $event->$method($_POST[$type]);
        
        self::redirectBack();
    }

    /*
        DELETE EVENT
    */
    public static function deleteEvent($event_id)
    {
        (new Event)->delete($event_id);
    
        //back to event list
        self::redirectBack();
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
        (new Session)->delete($session_id);

        self::redirectBack();
    }

    /*
        EDIT SESSION
    */
    public static function editSession($session_id, $type){
        $session = (new Session)->getById($session_id);

        $method = 'set' . $type; //example setName()

        $session->$method($_POST[$type]);
        self::redirectBack();
    }
}
