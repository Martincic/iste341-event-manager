<?php

class Session extends Model{

    public $idsession;
    public $userattending;
    public $name;
    public $startdate;
    public $enddate;
    public $numberallowed;
    public $event;
//
    public function getById($id) {
        $session_obj = DB::queryOne('SELECT * FROM session WHERE idsession = :id', ['id' => $id], Session::class);
        //get venue obj
        $event_id = $session_obj->event;
        $event = new Event();
                
        $session_obj->event = $event->getById($event_id);
        return $session_obj;
    }

    public function getAll($event_id) {
        $user_id = $_SESSION['user']->id;
        return DB::queryAll('SELECT 
            idsession, 
            EXISTS( select * from attendee_session 
                    where attendee_session.attendee = :userid
                    AND attendee_session.session = session.idsession ) as "userattending",
            name, 
            event, 
            startdate,
            enddate,
            numberallowed,
            event from session
            WHERE event = :event;', [
                'userid' => $user_id,
                'event' => $event_id
            ], Session::class);
    }

    public static function add($data) {
        DB::query('INSERT INTO session(name, startdate, enddate, numberallowed, event)
                    VALUES(:name, :startdate, :enddate, :numberallowed, :event)',
                    [
                        "name" => $data["name"],
                        "startdate" => $data["datestart"],
                        "enddate" => $data["dateend"],
                        "numberallowed" => $data["numberallowed"],
                        "event" => $data["event"]
                    ]
        );
    }

    public function delete($id) {     
        DB::query('DELETE FROM session WHERE idsession = :id', ['id' => $id]);
        
    }

    public function __toString() {
        return "Session name is {$this->name}, event: {$this->event}, start time at: {$this->datestart} and end time at:
			 {$this->dateend}.The max number of attendees is {$this->numberallowed}";
    }

    public function attendees(){
        return  DB::queryAll('SELECT * from attendee_session WHERE session = :id', ['id' => $this->idsession], AttendeeSession::class);
    }

    public function register(Attendee $user)
    {
            //Relate user to certain session
            DB::query("INSERT INTO attendee_session(session, attendee) VALUES (:sess_id, :attendee_id)", [
                'sess_id' => $this->idsession,
                'attendee_id' => $user->id
            ]);
        

            //Relate user to certain event
            DB::query("INSERT INTO attendee_event(event, attendee, paid) VALUES (:event_id, :attendee_id, :paid);", [
                'event_id' => $this->event->idevent,
                'attendee_id' => $user->id,
                'paid' => 1
            ]);
    }

    public function unregister(Attendee $user)
    {
        //remove relation
        DB::query("DELETE FROM attendee_session WHERE attendee_session.session = :sess_id AND attendee_session.attendee = :attendee_id;", [
            'sess_id' => $this->idsession,
            'attendee_id' => $user->id
        ]);
        //remove relation
        DB::query("DELETE FROM attendee_event WHERE attendee_event.event = :event_id AND attendee_event.attendee = :attendee_id;", [
            'event_id' => $this->event->idevent,
            'attendee_id' => $user->id,
        ]);
    }

    public function whereUserRegistered(Attendee $user)
    {
        return DB::queryAll("SELECT * FROM session WHERE idsession IN 
                            (SELECT session FROM attendee_session WHERE attendee = :id);", [
                        'id' => $user->id
                    ],
                    Session::class);
    }

    public function setName($value){
        DB::query('UPDATE session SET name = :name WHERE idsession = :id', ['name' => $value, 'id' => $this->idsession]);
    }
    
    public function setDateStart($value){
        $value = date("Y-m-d H:i:s", strtotime($value));
        DB::query('UPDATE session SET startdate = :datestart WHERE idsession = :id', ['datestart' => $value, 'id' => $this->idsession]);
    }

    public function setDateEnd($value){
        $value = date("Y-m-d H:i:s", strtotime($value));
        DB::query('UPDATE session SET enddate = :dateend WHERE idsession = :id', ['dateend' => $value, 'id' => $this->idsession]);
    }

    public function setNumberAllowed($value){
        DB::query('UPDATE session SET numberallowed = :numberallowed WHERE idsession = :id', ['numberallowed' => $value, 'id' => $this->idsession]);
    }
}
