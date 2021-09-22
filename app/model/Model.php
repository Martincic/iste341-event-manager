<?php

/**
 * Holds the data for the view.
 */
class Model {
    
    private $data;

    /**
     * Gets the data for a view
     * @param type $page - string that holds the page/view name
     * @return type $data - array that holds the view data.
     */
    public function getData($page)
    {
        switch($page) {
            case 'login':
                $this->data = null;
                break;
            // kad stavim case: 'home' nece mi loadat home.php
            case 'home':
                $filter = new Filter($_REQUEST); //filter the request
                if($filter->validate()) {
                    $this->data = [
                        'username' => $filter->data['username'] ?? null,
                        'pin' => $filter->data['pin'] ?? null
                    ];
                }
                else {
                    $this->data = [
                        'errors' => $filter->errors
                    ];
                }
                break;
            }
            
        return $this->data;
    }

}
