<?php
// Base Controller
// Load Models and Views

class Controller {

    // Load model
    public function model($model) {
        // Require model file
        require_once ROOT_DIR . '/app/models/' . $model . '.php';
        return new $model();
    }

        // Load view
    public function view($view, $data = []) {
        // Check for view file
        if(file_exists(ROOT_DIR . '/app/views/' . $view . '.php')) {
            require_once ROOT_DIR . '/app/views/' . $view . '.php';
        }
        else {
            die('View does not exist');
        }
    }

}
