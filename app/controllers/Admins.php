<?php

class Admins extends Controller
{
    private $offset;

    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->utilitiesModel = $this->model('Utilities');
        $this->studentModel = $this->model('Student');
    }

    public function index()
    {
        if (isAdminLoggedIn()) {
            redirect('admins/dashboard');
        } else {
            redirect('admins/login');

        }
    }

    public function dashboard()
    {
        $courseCount = $this->utilitiesModel->retrieveCourseCount();
        $studentCount = $this->utilitiesModel->retrieveStudentsCount();
        $subjectCount = $this->utilitiesModel->retrieveSubjectsCount();
        $resultsCount = $this->utilitiesModel->retrieveResultsCount();
        $data = [
            'courseCount' => $courseCount,
            'studentCount' => $studentCount,
            'subjectCount' => $subjectCount,
            'resultsCount' => $resultsCount
        ];
        $this->view('admins/dashboard', $data);
    }

    public function createCourse()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // POST DATA
            $data = [
                'newCourse' => trim($_POST['newCourse']),
            ];

            if ($this->utilitiesModel->addCourse($data['newCourse'])) {
                flash('course_success', 'Course Created');
                redirect('admins/createCourse');
            } else {
                flash('course_success', 'Error: New Course Couldn\'t be created', 'alert alert-danger');
                redirect('admins/createCourse');
            }

        } else {
            $this->view('admins/createCourse');
        }
    }

    public function createClass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // POST DATA
            $data = [
                'course_name' => trim($_POST['course_name']),
                'subject_name' => trim($_POST['subject_name']),
                'branch_name' => trim($_POST['branch_name']),
                'year_name' => trim($_POST['year_name']),
                'course_err' => '',
                'subject_err' => '',
                'branch_err' => '',
                'year_err' => ''
            ];
            if (empty($data['course_name'])) {
                $data['course_err'] = 'Please enter course';
            }
            if (empty($data['subject_name'])) {
                $data['subject_err'] = 'Please enter branch';
            }
            if (empty($data['branch_name'])) {
                $data['branch_err'] = 'Please enter branch';
            }
            if (empty($data['year_name'])) {
                $data['year_err'] = 'Please enter your current year';
            }

            if(empty($data['course_name']) && empty($data['subject_name']) && empty($data['branch_name']) && empty($data['year_name'])) {
                if ($this->utilitiesModel->addClass($data['course_name'], $data['subject_name'], $data['branch_name'], $data['year_name'])) {                    
                    flash('subject_success', 'Subject Added');
                    redirect('admins/createClass');
                } else {
                    flash('subject_success', 'Subject Cannot be Added', 'alert alert-danger');
                    redirect('admins/createClass');
                }
            }
        } else {
                $this->view('admins/createSubjects');
        }
    }

    public function addStudent()
    {
        // Check Form Submition
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process Form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // POST DATA
            $data = [
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
                if($this->studentModel->insertStudent($data)) {
                    flash('register_success', 'Student Profile Created Successfully');
                    redirect('admins/addStudent');
                } else {
                    flash('register_success', 'Student Profile Creation Failed! Try again...', 'alert alert-danger');
                    redirect('admins/addStudent');
                }

            } else {
                // Load view with errors
                $this->view('admins/addStudent', $data);  
            }
    } else {
        $data = [
            'name' => '',
            'email' => '',
            'password' => '',
            'confirm_password' => ''
        ];
        $this->view('admins/addStudent', $data);
    }
}

    public function manageStudent()
    {   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // POST DATA
            $data = [
                'deleteStudent' => trim($_POST['deleteStudent']),
            ];

            if ($this->studentModel->manageStudent($data['deleteStudent'])) {
                flash('delete_student', 'Student Removed');
                redirect('admins/manageStudent');
            } else {
                flash('delete_student', 'Error: Student cannot be removed! Try again...', 'alert alert-danger');
                redirect('admins/manageStudent');
            }
        } else {
            $row = $this->userModel->getAllUserData();
            $data = [
                'row' => $row
            ];
            $this->view('admins/manageStudent', $data);
        }
    }

    public function manageCourse()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // POST DATA
            $data = [
                'deleteCourse' => trim($_POST['deleteCourse']),
            ];

            if ($this->utilitiesModel->manageCourse($data['deleteCourse'])) {
                flash('delete_course', 'Course Deleted Successfully');
                redirect('admins/manageCourse');
            } else {
                flash('delete_course', 'Error: Course cannot be deleted! Try again...', 'alert alert-danger');
                redirect('admins/manageCourse');
            }

        } else {
            $row = $this->utilitiesModel->retrieveCourse();
            $data = [
                'row' => $row,
            ];
            $this->view('admins/manageCourse', $data);
        }
    }

    public function manageClass($offset = 1)
    {       
            
            $classCount = $this->utilitiesModel->retrieveSubjectsCount();
            $pages = ceil($classCount / 5);
            $row = $this->utilitiesModel->retrieveClass(5, $offset);
            $data = [
                'row' => $row,
                'pages' => $pages
            ];
            $this->view('admins/manageSubjects', $data);
    }

    

    public function deleteClass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // POST DATA
            $data = [
                'deleteClass' => trim($_POST['deleteClass']),
            ];

            if ($this->utilitiesModel->deleteClass($data['deleteClass'])) {
                flash('class_delete', 'Class Deleted');
                redirect('admins/manageClass');
            } else {
                flash('class_delete', 'Class deletion failed! Try again...', 'alert alert-danger');
                redirect('admins/manageClass');
            }
        }
    }

    /**
     *
     */
    public function result($offset = 1) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Declare the result
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'course' => trim($_POST['course']),
                'year' => trim($_POST['year']),
                'branch' => trim($_POST['branch']),
                'course_err' => '',
                'year_err' => '',
                'branch_err' => ''
            ];

            if(empty($data['course'])) {
                $data['course_err'] = 'Please select course';
            }
            if(empty($data['year'])) {
                $data['year_err'] = 'Please select year';
            }
            if(empty($data['branch'])) {
                $data['branch_err'] = 'Please select branch';
            }

            if(empty($data['course_err']) && empty($data['year_err']) && empty($data['branch_err'])) {
                // $data = $this->utilitiesModel->results($data['course'], $data['year'], $data['branch']);
                $_SESSION['course'] = $data['course'];
                $_SESSION['year'] = $data['year'];
                $_SESSION['branch'] = $data['branch'];
                $studentCount = $this->utilitiesModel->retrieveStudentsCount();
                $pages = ceil($studentCount / 10);
                $student = $this->studentModel->getStudents(10, $offset, $data['course'], $data['year'], $data['branch']);
                $data = [
                    'row' => $student,
                    'pages' => $pages
                ];
                if(empty($student)) {
                    flash('empty_student', 'No students exists in that selection category', 'alert alert-danger');
                    redirect('admins/result');
                } else {
                    $this->view('admins/result2', $data);
                }

            } else {
                $this->view('admins/result', $data);
            }

        } else {
            // Display page
            $this->view('admins/result');
        }
    }

    public function result2 ($offset = 1) {
        $studentCount = $this->utilitiesModel->retrieveStudentsCount();
        $pages = ceil($studentCount / 10);
        $student = $this->studentModel->getStudents(10, $offset, $_SESSION['course'], $_SESSION['year'], $_SESSION['branch']);
        $data = [
            'row' => $student,
            'pages' => $pages
        ];
        $this->view('admins/result2', $data);
    }

    public function updateResult($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['student_id'] = $id;

            $getStudent = $this->utilitiesModel->retriveStudent($id);

            $course_name =  $getStudent->{'Course'};
            $year_name = $getStudent->{'Year'};
            $branch_name = $getStudent->{'Specialization'};
            
            $getSubjects = $this->utilitiesModel->getSubjects($course_name, $year_name, $branch_name);
            $data = [
                'row' => $getSubjects,
                'name' => $getStudent->{'Name'}
            ];
            for($num = 1, $i=0; $num <= count($getSubjects); $num++, $i++) {
                $_SESSION['subject_id-'.$num] = $getSubjects[$i]->{'ID'};
            }

            $this->view('admins/result3', $data);
        }
    }

    public function updateMarks() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $number_of_marks = count($_POST);
            $insertMarks = $this->utilitiesModel->insertMarks($_POST, $number_of_marks);
            flash('declared_result', 'Marks updated for required Student');
            redirect('admins/result2');
        }
    }

    public function declareResult($id) {
        $declare = $this->utilitiesModel->declare($id);
        flash('declared_result', 'Result declared for required Student');
        redirect('admins/result2');
    }

    public function login()
    {
        // To show different header without loading navbar and logobar
        $_SESSION['login-page'] = 1;
        // Check Form Submition
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process Form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // POST DATA
            $data = [
                'title' => 'CCMS',
                'description' => 'Your Path Towards Excellence',
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } elseif ($this->userModel->adminFindUserByEmail($data['email'])) {
                // User Found
            } else {
                $data['email_err'] = 'No user found';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }
            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated && Continue with the database entry
                // Check and set logged in user
                $loggedInUser = $this->userModel->adminLogin($data['email'], $data['password']);
                if ($loggedInUser) {
                    // Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password Incorrect';

                    $this->view('admins/login', $data);
                }

            } else {

                // Load view with errors
                $this->view('admins/login', $data);
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
                'password_error' => '',
            ];
            // Load view
            $this->view('admins/login', $data);
        }

    }

    public function createUserSession($loggedInUser)
    {
        $_SESSION['admin_id'] = $loggedInUser->{'ID'};
        $_SESSION['admin_email'] = $loggedInUser->{'Email'};
        $_SESSION['admin_name'] = $loggedInUser->{'Name'};
        redirect('admins');
    }

    public function logout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_email']);
        unset($_SESSION['admin_name']);
        session_destroy();
        redirect('pages');
    }

}
