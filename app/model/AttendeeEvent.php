
<?php
//DELETE??
class AttendeeEvent extends Model{

    public $event;
    public $attendee;
    public $paid;

    public function getAll() {
        return DB::queryAll('SELECT * FROM "attendee_event" WHERE 1', [], AttendeeEvent::class);
    }

    public function add($data) {

        DB::query('INSERT INTO "attendee_event"("event","attendee", "paid")
                    VALUES(:"event", :attendee, :paid)',
                    [
                        "event"=>$data["event"],
                        "attendee"=>$data["attendee"],
                        "paid"=>$data["paid"]
                    ]
        );
        return $this->getById($data["event"], $data["attendee"], $data["paid"]);
    }

    public function delete($event, $attendee) {     
        DB::query('DELETE * FROM "attendee_event" WHERE  "event" = :"event" AND attendee = :attendee', ['event' => $event, 'attendee'=>$attendee]);
        return $this->getAll();
    }

    public function __toString() {
        return "Event name is {$this->event}, attendee: {$this->attendee}, paid: {$this->paid}";
    }

    // query all by attendee id
    // optional, use "event" as $id_type
    public function getById($id, $id_type = "attendee")
    {
        return DB::queryAll('SELECT * FROM "attendee_event" WHERE $id_type = :id', ['id' => $id], AttendeeEvent::class);
    }
}
