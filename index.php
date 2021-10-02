<?php

require_once 'app/config/config.php';
require_once 'autoloader.php';
session_start();

Router::handleRequest();