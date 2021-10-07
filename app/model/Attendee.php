<?php

class Attendee extends Model{

    public $id;
    public $name;
    public $password;
    public $role;
    public $test;

    const USER_REGISTER_DEFAULT_ROLE = 1;

    public function authorize($username, $password) {        
        $user = DB::queryOne("SELECT * FROM attendee WHERE name = :username", [
            'username' => $username, 
        ], 'attendee');
        return $user;
    }
    
    public function create($username, $password) 
    {    
        if($this->usernameExists($username)) return;

        $hash = $password;
        //Create user
        $id = DB::queryAndReturnID("INSERT INTO attendee(name, password, role) VALUES(:username, :pwd, :roleid);", [
            'username' => $username,
            'pwd' => $hash,
            'roleid' => self::USER_REGISTER_DEFAULT_ROLE
        ]);

        //Query and return user
        return DB::queryOne("SELECT * FROM attendee WHERE id = :id", [
            'id' => $id
        ], 'Attendee');
    }

    public function usernameExists($username) {
        return  DB::query("SELECT * FROM attendee WHERE name = :username", ['username' => $username], 'Attendee');
    }

    public function getById($id) {
        return DB::queryOne('SELECT * FROM person WHERE id = :id', ['id' => $id], 'Person');
    }

    public function getAll() {
        return DB::queryAll('SELECT * FROM attendee WHERE 1', [], Attendee::class);
    }

    public function getId($username, $password) {
        return DB::queryOne('SELECT id FROM attendee WHERE name = :username AND password = :password', ['username' => $username,'password' => $password], Attendee::class);
    }

    //TODO: implement record deletion
    public function delete($data) {     
    
        
    }
}
