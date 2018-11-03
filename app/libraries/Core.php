<?php

    // Declare Core Class
    class Core {
        
        // Assing default Controller
        protected $currentController = 'Pages'; // controller name always starts with capital letter as per agreed upon human convention

        // Assign default method inside the selected controller
        protected $currentMethod = 'index';

        // Assign the default parameters passed inside the called methods
        protected $params = [];

        // Initiate contructor
        public function __construct() {
            
            // Create a url array
            $url = $this->getURL();
          
            // Check if the files exists in the controller directory
            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
                // Then set as current controller
                $this->currentController = ucwords($url[0]);

                // Unset index 0
                unset($url[0]);
            
            }
           
            // Require the current incoming/default controller
            require_once('../app/controllers/'. $this->currentController . '.php');

            // Initiate the new controller class

            $this->currentController = new $this->currentController;

            // Now check for the method [second part of url] inside the class above

            if(isset($url[1])) {

                // Check to see if the incoming method exists with the controller class
                if(method_exists($this->currentController, $url[1])) {

                    // Exists? Then make it the currentMethod
                    $this->currentMethod = $url[1];

                    // Unset the url[1]
                    unset($url[1]);

                }

            }

            // Now move to third part of url - parameter values
            $this->params = $url ? array_values($url) : [];
           
            // Use call_user_func_array method to call the class->function->param in order from the above controller that is required
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

        }


        public function getURL() {
            
            // The url option comes in the form of get request, so check if get request is set
            if(isset($_GET['url'])) {
                
                // Skip the ending slash and store the string in the $url
                $url = rtrim($_GET['url'], '/');

                // Sanitize the URL
                $url = filter_var($url, FILTER_SANITIZE_URL);

                // Make the array using the explode function
                $url = explode('/', $url);

                // Return the url array to the caller
                return $url;

            }
        }

    }