<?php

class Session extends Model{

    public $idsession;
    public $name;
    public $datestart;
    public $dateend;
    public $numberallowed;
    public $event;

    public function getById($id) {
        $session_obj = DB::queryOne('SELECT * FROM "session" WHERE idsession = :id', ['id' => $id], Session::class);
        //get venue obj
        $event_id = $session_obj->event;
        $event = new Event();
                
        $session_obj->event = $event->getById($event_id);
                
        return $session_obj;
    }

    public function getAll() {
        return DB::queryAll('SELECT * FROM "session" WHERE 1', [], Session::class);
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

}
