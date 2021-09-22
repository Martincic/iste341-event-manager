<?php

/**
 *  Common Controller class. Loads Models & Views.
 */
class Controller {

    /**
     * Handles incoming requests. A query parameter 'page' is used to identify 
     * the view that will be rendered and returned back to the client.
     */
    public static function handleRequest() {
        $page = filter_has_var(INPUT_GET, 'page') ? filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING) : NULL;

        $data = NULL;
        if ($page == NULL) {
            $view = new View('app/view/pages/login.php');
        } else {
            $view = new View('app/view/pages/' . $page . '.php');
            $model = new Model();
            $data = $model->getData($page);
        }
        $view->render($data);
    }
}
