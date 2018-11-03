<?php

    // Redirect Page Function

    function redirect($location) {
        header('location: '.URLROOT.'/'.$location);
    }