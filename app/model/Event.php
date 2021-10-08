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
        return DB::queryAll('SELECT idevent,
        (SELECT name FROM venue WHERE venue.idvenue = event.venue) as "venue",
        name,
        datestart,
        dateend,
        numberallowed
         FROM event WHERE 1', [], Event::class);
    }

    public static function add($data) {
        //get user/manager
        $manager_id = $_SESSION['user']->id;
        //create event
        $event_id = DB::query('INSERT INTO event(name, datestart, dateend, numberallowed, venue)
                    VALUES(:name, :datestart, :dateend, :numberallowed, :venue)',
                    [
                        'name'=>$data['name'],
                        'datestart'=>date("Y-m-d H:i:s", strtotime($data['datestart'])),
                        'dateend'=>date("Y-m-d H:i:s", strtotime($data['dateend'])),
                        'numberallowed'=>$data['numberallowed'],
                        'venue'=>$data['venue']
                    ]
        );
    }

    public function delete($id) {     
        DB::query('DELETE FROM event WHERE event.idevent = :id', ['id' => $id]);
        DB::query('DELETE FROM session WHERE event = :id', ['id' => $id]);
        DB::query('DELETE FROM attendee_event WHERE event = :id', ['id' => $id]);
        DB::query('DELETE FROM manager_event WHERE event = :id', ['id' => $id]);

        DB::query('DELETE FROM attendee_session WHERE attendee_session.session IN 
            (SELECT session.idsession from session WHERE session.event = :id)', [
            'id' => $id
        ]);
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
        $value = date("Y-m-d H:i:s", strtotime($value));
        DB::query('UPDATE event SET datestart = :datestart WHERE idevent = :id', ['datestart' => $value, 'id' => $this->idevent]);
    }

    public function setDateEnd($value){
        $value = date("Y-m-d H:i:s", strtotime($value));
        DB::query('UPDATE event SET dateend = :dateend WHERE idevent = :id', ['dateend' => $value, 'id' => $this->idevent]);
    }

    public function setNumberAllowed($value){
        DB::query('UPDATE event SET numberallowed = :numberallowed WHERE idevent = :id', ['numberallowed' => $value, 'id' => $this->idevent]);
    }
    
    public function setVenue($value){
        DB::query('UPDATE event SET venue = :venue WHERE idevent = :id', ['venue' => $value, 'id' => $this->idevent]);
    }
}
