<?php

class Session extends Model{

    public $idsession;
    public $name;
    public $startdate;
    public $enddate;
    public $numberallowed;
    public $event;

    public function getById($id) {
        $session_obj = DB::queryOne('SELECT * FROM session WHERE idsession = :id', ['id' => $id], Session::class);
        //get venue obj
        $event_id = $session_obj->event;
        $event = new Event();
                
        $session_obj->event = $event->getById($event_id);
        return $session_obj;
    }

    public function getAll($event_id) {
        return DB::queryAll('SELECT * FROM session WHERE event = :event_id', ['event_id' => $event_id], Session::class);
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
        DB::query("INSERT INTO attendee_session('session', 'attendee') VALUES (:sess_id, :attendee_id)", [
            'sess_id' => $this->idsession,
            'attendee_id' => $user->id
        ]);

        //Relate user to certain event
        DB::query("INSERT INTO attendee_event('event', 'attendee', 'paid') VALUES (:event_id, :attendee_id, :paid)", [
            'event_id' => $this->event->id,
            'attendee_id' => $user->id,
            'paid' => 1
        ]);

        
    }
}
