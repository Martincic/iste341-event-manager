<?php

/*
 * Class to sanitize and validate the input.
 * Inspired by: https://github.com/davidecesarano/Validation
 */
class Filter {

    private $patterns = array(
        'uri' => '[A-Za-z0-9-\/_?&=]+',
        'url' => '[A-Za-z0-9-:.\/_?&=#]+',
        'alpha' => '[\p{L}]+',
        'words' => '[\p{L}\s]+',
        'Alphanumeric' => '[\p{L}0-9]+',
        'int' => '[0-9]+',
        'float' => '[0-9\.,]+',
        'tel' => '[0-9+\s()-]+',
        'text' => '[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',
        'file' => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+\.[A-Za-z0-9]{2,4}',
        'folder' => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+',
        'address' => '[\p{L}0-9\s.,()°-]+',
        'date_dmy' => '[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}',
        'date_ymd' => '[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}',
        'email' => '[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+[.]+[a-z-A-Z]'
    );
    private $errors = array();

    
    private $name;
    public $value;

    public function data($name, $value) {
        $this->name = $name;
        $this->value = $value;
        return $this;
    }

    public function required() {
        if (empty($this->value) || $this->value == null) {
            $this->errors[] = 'This field is required.';
        }
        return $this;
    }

    public function sanitize_string() {
        $this->value = filter_var($this->value, FILTER_SANITIZE_STRING);
        return $this;
    }

    public function sanitize_int() {
        $this->value = filter_var($this->value, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    public function sanitize_email() {
        $this->value = filter_var($this->value, FILTER_SANITIZE_EMAIL);
        return $this;
    }

    public function pattern($name) {
        if (!array_key_exists($name, $this->patterns)) {
            $this->errors[] = 'Wrong pattern name: ' . $name;
        } else {
            $regex = '/^(' . $this->patterns[$name] . ')$/u';
            if ($this->value != '' && !preg_match($regex, $this->value)) {
                $this->errors[] = $this->name . ' does not match the '.$name.' format.';
            }
        }
        return $this;
    }

    public function customPattern($pattern) {
        $regex = '/^(' . $pattern . ')$/u';
        if ($this->value != '' && !preg_match($regex, $this->value)) {
            $this->errors[] = $this->name . ' does not match the expected format.';
        }
        return $this;
    }

    public function min($length) {
        if (is_string($this->value)) {
            if (strlen($this->value) < $length) {
                $this->errors[] = 'The lenght of ' . $this->name . ' must be greater then ' . $length;
            }
        } else {
            if ($this->value < $length) {
                $this->errors[] = 'The lenght of ' . $this->name . ' must be greater then ' . $length;
            }
        }
        return $this;
    }

    public function max($length) {
        if (is_string($this->value)) {
            if (strlen($this->value) > $length) {
                $this->errors[] = 'The lenght of ' . $this->name . ' must be less then ' . $length;
            }
        } else {
            if ($this->value > $length) {
                $this->errors[] = 'The lenght of ' . $this->name . ' must be less then ' . $length;
            }
        }
        return $this;
    }

    public function isSuccess() {
        if (empty($this->errors)) {
            return true;
        }
    }

    public function getErrors() {
        if (!$this->isSuccess()) {
            return $this->errors;
        }
    }

    public function getErrorsAsHTML() {
        $html = '<ul>';
        foreach ($this->getErrors() as $error) {
            $html .= '<li>' . $error . '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

    public static function is_int($value) {
        if (filter_var($value, FILTER_VALIDATE_INT)) {
            return true;
        }
    }

    public static function is_float($value) {
        if (filter_var($value, FILTER_VALIDATE_FLOAT)) {
            return true;
        }
    }

    public static function is_alpha($value) {
        if (filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z]+$/")))) {
            return true;
        }
    }

    public static function is_alphanum($value) {
        if (filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z0-9]+$/")))) {
            return true;
        }
    }

    public static function is_url($value) {
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return true;
        }
    }

    public static function is_uri($value) {
        if (filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[A-Za-z0-9-\/_]+$/")))) {
            return true;
        }
    }

    public static function is_bool($value) {
        if (is_bool(filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE))) {
            return true;
        }
    }

    public static function is_email($value) {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
    }
}
?>