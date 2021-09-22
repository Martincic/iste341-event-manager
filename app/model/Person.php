<?php

//TODO: Person & Phone have something in common. Extract that in a parent class
class Person {

    public $id;
    public $last_name;
    public $first_name;
    public $nick_name;

    public function __construct() {
        DB::connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    //TODO: implement inserting new person into the DB
    public function add($data) {
        
    }

    public function getById($id) {
        return DB::queryOne('SELECT * FROM person WHERE id = :id', ['id' => $id], 'Person');
    }

    //TODO: implement getting all person records from the DB
    function getAll() {
        
    }

    //TODO: implement record deletion
    public function delete($data) {
        
    }

    public function __toString() {
        return "I am {$this->first_name} {$this->last_name} and my
			nickname is {$this->nick_name}";
    }

}
