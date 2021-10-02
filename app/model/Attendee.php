<?php

class Attendee extends Model{

    public $id;
    public $last_name;
    public $first_name;
    public $nick_name;

    public function add($data) {
        
    }

    public function getById($id) {
        return DB::queryOne('SELECT * FROM person WHERE id = :id', ['id' => $id], 'Person');
    }

    public function getAll() {
        return DB::queryAll('SELECT * FROM attendee WHERE 1', [], Attendee::class);
    }

    //TODO: implement record deletion
    public function delete($data) {
        
    }

    public function __toString() {
        return "I am {$this->first_name} {$this->last_name} and my
			nickname is {$this->nick_name}";
    }

}
