<?php

class Event extends Model{

    public $idevent;
    public $name;
    public $datestart;
    public $dateend;
    public $numberallowed;
    public $venue;

    public function getById($id) {
        $event_obj = DB::queryOne('SELECT * FROM event WHERE idevent = :id', ['id' => $id], Event::class);
        //get venue obj
        $venue_id = $event_obj->venue;
        $venue = new Venue();
        
        $event_obj->venue = $venue->getById($venue_id);
        
        return $event_obj;
    }

    public function getAll() {
        return DB::queryAll('SELECT * FROM event WHERE 1', [], Event::class);
    }

    public function add($data) {
        //get user/manager
        $manager_id = $_SESSION['user']->id;
        //create event
        $event_id = DB::queryAndReturnID('INSERT INTO "event"("idevent","name", "datestart". "dateend", "numberallowed", "venue")
                    VALUES(:idevent, :"name", :datestart, :dateend, :numberallowed, :"venue")',
                    [
                        "idevent"=>$data["idevent"],
                        "name"=>$data["name"],
                        "datestart"=>$data["datestart"],
                        "dateend"=>$data["dateend"],
                        "numberallowed"=>$data["numberallowed"],
                        "venue"=>$data["venue"]
                    ]
        );

        //relate event and manager (ManagerEvents)
        DB::query('INSERT  INTO manager_event values(:event_id, :manager_id)',
                    [
                        'event_id' => $event_id,
                        'manager_id' => $manager_id
                    ]
        );
        return $this->getById($data["idevent"]);
    }

    public function delete($id) {     
        DB::query('DELETE * FROM "event" WHERE idevent = :id', ['id' => $id]);
    }

    public function __toString() {
        return "Event name is {$this->name}, location: {$this->venue}, start time at: {$this->datestart} and end time at:
			 {$this->dateend}.The max number of attendees is {$this->numberallowed}";
    }

    public function managedBy($user_id)
    {
        return DB::queryAll('SELECT * from event where idevent IN 
                            (SELECT event from manager_event WHERE manager = :id)', [
                                'id' => $user_id
                            ], Event::class);
    }
    
    public function sessions()
    {
        return DB::queryAll('SELECT * from session where event = :id', ['id' => $this->idevent], Session::class);
    }

    public function attendees(){
        return  DB::queryAll('SELECT * from attendee_event WHERE event = :id', ['id' => $this->idevent], AttendeeEvent::class);
    }

    public function setName($value){
        DB::query('UPDATE event SET name = :name WHERE idevent = :id', ['name' => $value, 'id' => $this->idevent]);
    }
    
    public function setDateStart($value){
        DB::query('UPDATE event SET datestart = :datestart WHERE idevent = :id', ['datestart' => $value, 'id' => $this->idevent]);
    }

    public function setDateEnd($value){
        DB::query('UPDATE event SET dateend = :dateend WHERE idevent = :id', ['dateend' => $value, 'id' => $this->idevent]);
    }

    public function setNumberAllowed($value){
        DB::query('UPDATE event SET numberallowed = :numberallowed WHERE idevent = :id', ['numberallowed' => $value, 'id' => $this->idevent]);
    }
}
