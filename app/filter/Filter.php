<?php

/*
 * Class to sanitize and validate the data.
 */
class Filter {

    private $request;
    public $data;

    public function __construct($request)
    {
        $this->request = $request;
        $this->data = [];
        $this->errors = [];
    }
    
    public function validate()
    {
        $request = $this->request;

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            return true;
        }
        $username_check = $this->validateUsername($request['username']);
        
        $pin_check = $this->validatePin($request['password']);
        
        return $username_check && $pin_check;
    }

    public function validateUsername($input) 
    {
        if($input == null) {
            $message = 'You left username empty.';
            array_push($this->errors, $message);
            return false;
        }

        $sanitizedInput = filter_var($input, FILTER_SANITIZE_STRING);
        
        if(!preg_match('/^[a-zA-Z0-9]{2,}$/', $input)) 
        { 
            $message = "Enter valid username";
            array_push($this->errors, $message);
            return false; 
        }
        $this->data['username'] = $sanitizedInput;
        return true;
    }

    public function validatePin($input) 
    {
        if($input == null) {
            $message = 'You left pin empty.';
            array_push($this->errors, $message);
            return false;
        }

        $sanitizedInput = filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        
        if(!preg_match('/^[0-9]{4,8}$/', $sanitizedInput) )
        { 
            $message = "Enter valid pin";
            array_push($this->errors, $message);
            return false;
        }
        $this->data['pin'] = $sanitizedInput;
        return true;
    }
}