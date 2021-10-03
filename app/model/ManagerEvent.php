

<?php
//DELETE??
class ManagerEvent extends Model{

    public $event;
    public $manager;

    public function getAll() {
        return DB::queryAll('SELECT * FROM "manager_event" WHERE 1', [], ManagerEvent::class);
    }

    public function add($data) {

        DB::query('INSERT INTO "manager_event"("event","manager")
                    VALUES(:"event", :manager)',
                    [
                        "event"=>$data["event"],
                        "manager"=>$data["manager"],
                    ]
        );
        return $this->getById($data["event"], $data["manager"]);
    }

    public function delete($event, $manager) {     
        DB::query('DELETE * FROM "manager_event" WHERE  "event" = :"event" && manager = :manager', ['event' => $event, 'manager'=>$manager]);
        return $this->getAll();
    }

    public function __toString() {
        return "Event name is {$this->event}, manager: {$this->manager}";
    }

    public function events($manager)
    {
        return DB::queryAll('sql', ['manager_id' => $this], Events:class)
    }

    //controller
    //$event;
    //ManagerEvent()->getById($event->id)
}
