<?php

require_once 'app/config/config.php';
require_once 'autoloader.php';
session_start();
// var_dump($_SESSION);die();
//If user is set to nothing, destroy that variable
if(array_key_exists('user', $_SESSION) && !is_a($_SESSION['user'], Attendee::class)) {
    unset($_SESSION['user']);
}
Router::handleRequest();