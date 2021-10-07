
<?php
//DELETE??
class AttendeeSession extends Model{

    public $session;
    public $attendee;

    public function getAll() {
        return DB::queryAll('SELECT * FROM "attendee_session" WHERE 1', [], AttendeeSession::class);
    }

    public function add($data) {

        DB::query('INSERT INTO "attendee_session"("session","attendee")
                    VALUES(:"session", :attendee)',
                    [
                        "session"=>$data["session"],
                        "attendee"=>$data["attendee"]
                    ]
        );
        return $this->getById($data["session"], $data["attendee"]);
    }

    public function delete($session, $attendee) {     
        DB::query('DELETE * FROM "attendee_session" WHERE  "session" = :"session" AND attendee = :attendee', ['session' => $session, 'attendee'=>$attendee]);
        return $this->getAll();
    }

    public function __toString() {
        return "Session name is {$this->session}, attendee: {$this->attendee}";
    }

    // query all by attendee id
    // optional, use "session" as $id_type
    public function getById($id, $id_type = "attendee")
    {
        return DB::queryAll('SELECT * FROM "attendee_session" WHERE $id_type = :id', ['id' => $id], Attendeesession::class);
    }
}
