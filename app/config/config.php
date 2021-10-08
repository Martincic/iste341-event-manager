<?php

define("DB_HOST", "localhost"); //keep localhost with 'solace.ist.rit.edu' since localhost is the only allowed/registered name to be used by Solace 
define("DB_USER", "root");      //replace with data found in .my.cnf if hosted on Solace
define("DB_PASS", "");     //replace with data found in .my.cnf if hosted on Solace
define("DB_NAME", "event_manager");    //replace this with your rit username

//C:\Program Files (x86)\Ampps\www\...
define('PROJECT_ROOT', pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_DIRNAME) . '/');

//http://localhost/.../
//http://solace.ist.rit.edu/../
define('URL_ROOT', 'http://' . $_SERVER['SERVER_NAME'] . pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME) . '/');

define('TITLE', 'Event manager application');

define('BASE_URL', 'https://988a-88-207-80-44.ngrok.io/iste341-event-manager');
