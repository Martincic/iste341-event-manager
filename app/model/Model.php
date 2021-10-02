<?php

require_once __DIR__ . '/../db/DB.php';
/**
 * Holds the data for the view.
 */
class Model {
        
    public function __construct() {
        DB::connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
}
