<?php

    // Create Master Controller to be extended by every other controller
    class Controller {

        // Controller for loading model
        public function model($model) {

            // Check if requested model file exists or not?
            if(file_exists('../app/models/'.$model.'.php')) {

                // Require Model File from Model Directory
                require_once('../app/models/'. $model . '.php');

                // Instantiate model
                return new $model();

            } else {

                die('Model doesn\'t exists');

            }


        }


        // Controller for loading view
        public function view($view, $data = []) {

            // Check for the file in the view directory
            if(file_exists('../app/views/'.$view.'.php')){

                // Require View File from View Directory
                require_once('../app/views/'.$view.'.php');

            } else {

                die('View doesn\'t exists');

            }

        }

    }