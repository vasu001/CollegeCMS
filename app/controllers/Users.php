<?php

    class Users extends Controller {

        public function __construct() {
            // Create a new model and connect to database controller
            $this->userModel = $this->model('User');
        }

        public function register() {
            // Check Form Submition
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process Form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // POST DATA
                $data = [
                    'title' => 'CCMS',
                    'description' => 'Your Path Towards Excellence',
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => '',
                    'hash' => md5(rand(0, 10000))
                ];
                
                // Set session variable for account verification process
                $_SESSION['current_email'] = $data['email'];
                $_SESSION['current_hash'] = $data['hash'];

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check Email
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }
                // Validate Name
                if(empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }
                // Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }
                // Validate Confirm_Password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please enter confirm password';
                } else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords don\'t match';
                    }
                }

                // Make sure errors are empty
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated && Continue with the database entry
                    
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

                    // Register User
                    if($this->userModel->register($data)) {
                        flash('register_success', 'You are now registered. Click below to verify your account!');
                        redirect('users/verify');
                    } else {
                        die('Registration not successful!');
                    }

                } else {
                    // Load view with errors
                    $this->view('users/register', $data);   
                }

            } else {
                // Load Form
                // Init Form Data
                $data = [
                    'title' => 'CCMS',
                    'description' => 'Your Path Towards Excellence',
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => ''
                ];
                // Load view
                $this->view('users/register', $data);
            }
        }

        public function login() {
            // Check Form Submition
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process Form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // POST DATA
                $data = [
                    'title' => 'CCMS',
                    'description' => 'Your Path Towards Excellence',
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_error' => '',
                    'password_error' => ''
                ];

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } elseif($this->userModel->findUserByEmail($data['email'])){
                        // User Found
                } else {
                    $data['email_err'] = 'No user found';
                }
                
                // Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated && Continue with the database entry
                    
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                    if($loggedInUser) {
                        if($this->userModel->checkAccount($data['email'])){  
                            unset($_SESSION['current_email']);
                            unset($_SESSION['current_hash']);
                            // Create Session
                            $this->createUserSession($loggedInUser);
                        }else {
                            flash('register_success', 'You have not verified your account. Click below to verify it');
                            redirect('users/verify');
                        }
                        
                    } else {
                        $data['password_err'] = 'Password Incorrect';
                        $this->view('users/login', $data);
                    }

                } else {
                    // Load view with errors
                    $this->view('users/login', $data);   
                }

            } else {
                // Load Form
                // Init Form Data
                $data = [
                    'title' => 'CCMS',
                    'description' => 'Your Path Towards Excellence',
                    'email' => '',
                    'password' => '',
                    'email_error' => '',
                    'password_error' => ''
                ];
                // Load view
                $this->view('users/login', $data);
            }
        }


        public function createUserSession($loggedInUser) {
            $_SESSION['user_id'] = $loggedInUser->{'ID'};
            $_SESSION['user_email'] = $loggedInUser->{'Email ID'};
            $_SESSION['user_name'] = $loggedInUser->{'Name'};
            redirect('students');
        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }

        public function verify() {
            $data = [
                'title' => 'CCMS',
                'description' => 'Your Path Towards Excellence',
                'email' => $_SESSION['current_email'],
                'hash' => $_SESSION['current_hash']
            ];
            $this->view('users/verify', $data);
        }

        public function account($email, $hash) {
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                if($this->userModel->account($email, $hash)) {
                    flash('register_success', 'Your account is now activated. Login to your dashboard');
                    redirect('users/login');
                } else {
                    die('USER NOT VERIFIED');
                }
            } else {
                die('NOT GET');
            }
        }

    }