<?php

class Venue extends Model{

    public $idvenue;
    public $name;
    public $capacity;


    public function getById($id) {
        return DB::queryOne('SELECT * FROM "venue" WHERE idvenue = :id', ['id' => $id], Venue::class);
    }

    public function getAll() {
        return DB::queryAll('SELECT * FROM "venue" WHERE 1', [], Venue::class);
    }

    public function add($data) {
        DB::query('INSERT INTO "venue"("idevent","name", "capacity")
                    VALUES(:idvenue, :"name", :capacity)',
                    [
                        "idvenue"=>$data["idvenue"],
                        "name"=>$data["name"],
                        "capacity"=>$data["capacity"]
                    ]
        );
        return $this->getById($data["idvenue"]);
    }

    public function delete($id) {     
        DB::query('DELETE * FROM "venue" WHERE idvenue = :id', ['id' => $id]);
        return $this->getAll();
    }

    public function __toString() {
        return "Venue name is {$this->name}, capacity is {$this->capacity}";
    }

}
