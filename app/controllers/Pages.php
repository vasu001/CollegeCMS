<?php

// Controller for Main Pages [index, about, careers, contact, facilities, campus_events]
class Pages extends Controller
{

    public function __construct()
    {

        $this->pageModel = $this->model('Page');

    }

    public function index()
    {

        unset($_SESSION['admin_id']);
        if (isloggedIn()) {

            redirect('students');

        }

        $data = [

            'title' => 'CCMS',
            'description' => 'Your Path Towards Excellence',

        ];

        // Route to views/pages/index
        $this->view('pages/index', $data);

    }

    public function about()
    {

        $data = [

            'title' => 'CCMS',
            'description' => 'Your Path Towards Excellence',

        ];

        // Route to views/pages/about
        $this->view('pages/about', $data);

    }

    public function campusEvent()
    {

        $data = [

            'title' => 'CCMS',
            'description' => 'Your Path Towards Excellence',

        ];

        // Route to views/pages/campusevent
        $this->view('pages/campusevent', $data);

    }

    public function facilities()
    {

        $data = [

            'title' => 'CCMS',
            'description' => 'Your Path Towards Excellence',

        ];

        // Route to views/pages/facilites
        $this->view('pages/facilities', $data);

    }

    public function career()
    {

        // Check form Submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Process Form

            // Sanitize POST data

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'CCMS',
                'description' => 'Your Path Towards Excellence',
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'mobile' => trim($_POST['mobile']),
                'date' => trim($_POST['date']),
                'curorg' => trim($_POST['curorg']),
                'query' => trim($_POST['query']),
                'permaddr' => trim($_POST['permaddr']),
                'pincode' => trim($_POST['pincode']),
                'curctc' => trim($_POST['curctc']),
                'expctc' => trim($_POST['expctc']),
                'gender' => trim($_POST['gender']),
                'name_error' => '',
                'email_error' => '',
                'mobile_error' => '',
                'date_error' => '',
                'curorg_error' => '',
                'query_error' => '',
                'permaddr_error' => '',
                'pincode_error' => '',
                'curctc_error' => '',
                'expctc_error' => '',
                'gender_error' => '',
            ];

            // Validate Name
            if (empty($data['name'])) {

                $data['name_error'] = 'Please enter name';

            }

            // Validate Mobile
            if (empty($data['mobile'])) {

                $data['mobile_error'] = 'Please enter mobile number';

            }

            // Validate DOB
            if (empty($data['date'])) {

                $data['date_error'] = 'Please enter today\'s date';

            }

            // Validate Current Organisation
            if (empty($data['curorg'])) {

                $data['curorg_error'] = 'Please enter your current organisation [use NA if not working]';

            }

            // Validate Message
            if (empty($data['query'])) {

                $data['query_error'] = 'Please enter your query';

            }
            // Validate Permanent Address
            if (empty($data['permaddr'])) {

                $data['permaddr_error'] = 'Please enter your permanent address';

            }

            // Validate Pincode
            if (empty($data['pincode'])) {

                $data['pincode_error'] = 'Please enter your pincode';

            }

            // Validate Current CTC
            if (empty($data['curctc'])) {

                $data['curctc_error'] = 'Please enter your current CTC';

            }

            // Validate Expected CTC
            if (empty($data['expctc'])) {

                $data['expctc_error'] = 'Please enter your expected CTC';

            }

            // Validate Gender
            if (empty($data['gender'])) {

                $data['gender_error'] = 'Please choose your gender';

            }

            // Validate Email
            if (empty($data['email'])) {

                $data['email_error'] = 'Please enter email';

            }

            // Make sure errors are empty
            if (empty($data['name_error']) && empty($data['email_error']) && empty($data['query_error']) && empty($data['mobile_error']) && empty($data['date_error']) && empty($data['curorg_error']) && empty($data['permaddr_error']) && empty($data['pincode_error']) && empty($data['curctc_error']) && empty($data['expctc_error']) && empty($data['gender_error'])) {

                // Validated & continue to database entry

                if ($this->pageModel->career($data)) {
                    flash('register_success', 'You details and message is recieved');
                    redirect('pages/career');

                } else {

                    die('Submission Failed!');

                }

            } else {

                // Load view with column empty error
                $this->view('pages/career', $data);

            }

        }

        $data = [

            'title' => 'CCMS',
            'description' => 'Your Path Towards Excellence',
            'name' => '',
            'email' => '',
            'mobile' => '',
            'date' => '',
            'curorg' => '',
            'query' => '',
            'permaddr' => '',
            'pincode' => '',
            'curctc' => '',
            'expctc' => '',
            'gender' => '',
            'name_error' => '',
            'email_error' => '',
            'mobile_error' => '',
            'date_error' => '',
            'curorg_error' => '',
            'query_error' => '',
            'permaddr_error' => '',
            'pincode_error' => '',
            'curctc_error' => '',
            'expctc_error' => '',
            'gender_error' => '',

        ];

        // Route to views/pages/career
        $this->view('pages/career', $data);

    }

    public function contact()
    {

        // Check form Submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Process Form

            // Sanitize POST data

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'CCMS',
                'description' => 'Your Path Towards Excellence',
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'mobile' => trim($_POST['mobile']),
                'query' => trim($_POST['query']),
                'course' => trim($_POST['course']),
                'name_error' => '',
                'email_error' => '',
                'mobile_error' => '',
                'query_error' => '',
                'course_error' => '',
            ];

            // Validate Name
            if (empty($data['name'])) {

                $data['name_error'] = 'Please enter name';

            }

            // Validate Mobile
            if (empty($data['mobile'])) {

                $data['mobile_error'] = 'Please enter mobile number';

            }

            // Validate Message
            if (empty($data['query'])) {

                $data['query_error'] = 'Please enter your query';

            }

            // Validate Gender
            if (empty($data['course'])) {

                $data['course_error'] = 'Please choose your course';

            }

            // Validate Email
            if (empty($data['email'])) {

                $data['email_error'] = 'Please enter email';

            }

            // Make sure errors are empty
            if (empty($data['name_error']) && empty($data['email_error']) && empty($data['query_error']) && empty($data['mobile_error']) && empty($data['course_error'])) {

                // Validate & continue to database entry

                if ($this->pageModel->contact($data)) {
                    flash('contact_success', 'Your message is recieved');
                    redirect('pages/contact');

                } else {

                    die('Submission Failed!');

                }

            } else {

                // Load view with column empty error
                $this->view('pages/contact', $data);

            }

        }

        $data = [

            'title' => 'CCMS',
            'description' => 'Your Path Towards Excellence',
            'name' => '',
            'email' => '',
            'mobile' => '',
            'query' => '',
            'course' => '',
            'name_error' => '',
            'email_error' => '',
            'mobile_error' => '',
            'query_error' => '',
            'course_error' => '',

        ];

        // Route to views/pages/career
        $this->view('pages/contact', $data);

    }
}
