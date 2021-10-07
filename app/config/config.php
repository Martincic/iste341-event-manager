<?php

define("DB_HOST", "sql11.freemysqlhosting.net"); //keep localhost with 'solace.ist.rit.edu' since localhost is the only allowed/registered name to be used by Solace 
define("DB_USER", "sql11442168");      //replace with data found in .my.cnf if hosted on Solace
define("DB_PASS", "Ea914KbMJ4");     //replace with data found in .my.cnf if hosted on Solace
define("DB_NAME", "sql11442168");    //replace this with your rit username

//C:\Program Files (x86)\Ampps\www\...
define('PROJECT_ROOT', pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_DIRNAME) . '/');

//http://localhost/.../
//http://solace.ist.rit.edu/../
define('URL_ROOT', 'http://' . $_SERVER['SERVER_NAME'] . pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME) . '/');

define('TITLE', 'Event manager application');

define('BASE_URL', 'https://3114-88-207-113-81.ngrok.io/iste341-event-manager');
