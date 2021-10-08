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

    public function add($data) {
        DB::query('INSERT INTO "session"("idsession","name", "datestart". "dateend", "numberallowed", "event")
                    VALUES(:idsession, :"name", :datestart, :dateend, :numberallowed, :"event")',
                    [
                        "idesssion"=>$data["idsession"],
                        "name"=>$data["name"],
                        "datestart"=>$data["datestart"],
                        "dateend"=>$data["dateend"],
                        "numberallowed"=>$data["numberallowed"],
                        "event"=>$data["event"]
                    ]
        );
        return $this->getById($data["idsession"]);
    }

    public function delete($id) {     
        DB::query('DELETE * FROM "session" WHERE idsession = :id', ['id' => $id]);
        return $this->getAll();
        
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
}
