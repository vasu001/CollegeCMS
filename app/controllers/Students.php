<?php

class Students extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->studentModel = $this->model('Student');
    }

    public function index()
    {
        $row = $this->studentModel->getData();
        $data = [
            'name' => $row->{'Name'},
            'roll_num' => $row->{'Roll Number'},
            'email' => $row->{'Email'},
            'dob' => $row->{'Date of Birth'},
            'gender' => $row->{'Gender'},
            'course' => $row->{'Course'},
            'branch' => $row->{'Branch'},
            'year' => $row->{'Year'},
            'address' => $row->{'Address'},
            'mobile' => $row->{'Mobile'},
            'city' => $row->{'City'},
            'state' => $row->{'State'},
            'pincode' => $row->{'Pincode'},
            'photo' => $row->{'Photo'},

        ];
        $this->view('students/index', $data);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Upload Photo
            $target_dir = 'img/user_photos/';
            $filename = $_FILES['photo']['name'];
            $filesize = $_FILES['photo']['size'];
            $filetype = $_FILES['photo']['type'];
            $filetmpname = $_FILES['photo']['tmp_name'];
            $allowed_extension = ['png', 'jpg', 'jpeg', 'gif'];
            $temp = explode('.', $filename);
            $temp = end($temp);
            $file_extension = strtolower($temp);
            $upload_dir = $target_dir . basename($filename);
            $data = [
                'id' => trim($_SESSION['user_id']),
                'name' => trim($_POST['name']),
                'roll_num' => trim($_POST['roll_num']),
                'email' => trim($_POST['email']),
                'dob' => trim($_POST['dob']),
                'gender' => trim($_POST['gender']),
                'course' => trim($_POST['course']),
                'branch' => trim($_POST['branch']),
                'year' => trim($_POST['year']),
                'address' => trim($_POST['address']),
                'mobile' => trim($_POST['mobile']),
                'city' => trim($_POST['city']),
                'state' => trim($_POST['state']),
                'pincode' => trim($_POST['pincode']),
                'photo' => trim($upload_dir),
                'name_err' => '',
                'roll_num_err' => '',
                'email_err' => '',
                'dob_err' => '',
                'gender_err' => '',
                'course_err' => '',
                'branch_err' => '',
                'year_err' => '',
                'address_err' => '',
                'mobile_err' => '',
                'city_err' => '',
                'state_err' => '',
                'pincode_err' => '',
                'photo_err' => '',
            ];
            // Validation
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            if (empty($data['roll_num'])) {
                $data['roll_num_err'] = 'Please enter roll number';
            }
            if (empty($data['dob'])) {
                $data['dob_err'] = 'Please enter date of birthday';
            }
            if (empty($data['gender'])) {
                $data['gender_err'] = 'Please enter gender';
            }
            if (empty($data['course'])) {
                $data['course_err'] = 'Please enter course';
            }
            if (empty($data['branch'])) {
                $data['branch_err'] = 'Please enter branch';
            }
            if (empty($data['year'])) {
                $data['year_err'] = 'Please enter your current year';
            }
            if (empty($data['address'])) {
                $data['address_err'] = 'Please enter your address';
            }
            if (empty($data['mobile'])) {
                $data['mobile_err'] = 'Please enter your mobile';
            }
            if (empty($data['city'])) {
                $data['city_err'] = 'Please enter your city';
            }
            if (empty($data['state'])) {
                $data['state_err'] = 'Please enter your state';
            }
            if (empty($data['pincode'])) {
                $data['pincode_err'] = 'Please enter your area\'s pincode';
            }
            if (empty($data['photo'])) {
                $data['photo_err'] = 'Please upload your photo';
            } else {
                if (!empty($data['photo'])) {
                    // Check if the file has allowed file extension
                    if (!in_array($file_extension, $allowed_extension)) {
                        // Store the error since the extension isn't allowed
                        $data['photo_err'] = "Only jpeg, png, and jpg extension allowed";
                    }
                    // Check if size is under allowed limit
                    if ($filesize > 2000000) {
                        // Store the error message
                        $data['photo_err'] = "File must be under 2 MB";
                    }

                    // Check if errors array is empty
                    if (empty($data['photo_err'])) {
                        // Upload the image by moving it to $upload_dir
                        $didUpload = move_uploaded_file($filetmpname, $upload_dir);

                        // Check if the image got uploaded or generate error
                        if (!$didUpload) {
                            $data['photo_err'] = 'Uploading error! Try Again!';
                        }
                    }
                } else {
                    $data['photo_err'] = "No Image Received";
                }
            }

            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['roll_num_err']) && empty($data['dob_err']) && empty($data['gender_err']) && empty($data['course_err']) && empty($data['year_err']) && empty($data['branch_err']) && empty($data['address_err']) && empty($data['mobile_err']) && empty($data['city_err']) && empty($data['state_err']) && empty($data['pincode_err']) && empty($data['photo_err'])) {
                if ($this->studentModel->updateStudentInfo($data) && $this->studentModel->updateStudent($data)) {
                    // Updated the user
                    flash('register_success', 'Profile Updated Successfully');
                    redirect('students/update');
                } else {
                    flash('register_success', 'Profile Failed to Update', 'alert alert-danger');
                    redirect('students/update');
                }
            } else {
                $this->view('students/updateInfo', $data);
            }
        } else {
            $row = $this->studentModel->getData();
            $data = [
                'name' => $row->{'Name'},
                'roll_num' => $row->{'Roll Number'},
                'email' => $row->{'Email'},
                'dob' => $row->{'Date of Birth'},
                'gender' => $row->{'Gender'},
                'course' => $row->{'Course'},
                'branch' => $row->{'Branch'},
                'year' => $row->{'Year'},
                'address' => $row->{'Address'},
                'mobile' => $row->{'Mobile'},
                'city' => $row->{'City'},
                'state' => $row->{'State'},
                'pincode' => $row->{'Pincode'},
                'photo' => $row->{'Photo'},

            ];
            $this->view('students/updateInfo', $data);
        }
    }

    public function results()
    {
        $row = $this->studentModel->getData();
        $marks = $this->studentModel->getMarks();
        $range = 0;
        $obtained_marks = 0;
        $status = '';
        if($marks === false){
           $is_marks = false;
        } else{
        $is_marks = true;
        $total = 1000;
        foreach ($marks as $key) {
            $range += $key->{'Marks'};
        }
        $obtained_marks = $range;
        $range = $range / $total;
        $range = $range * 100;
        switch ($range) {
            case ($range > 33 && $range < 45):
                $status = '4th Div.(Pass)';
                break;
            case ($range >= 45 && $range < 55):
                $status = '3rd Div.(Pass)';
                break;
            case ($range >= 55 && $range < 65):
                $status = '2nd Div.(Pass)';
                break;
            case ($range >= 65 && $range < 75):
                $status = '1st Div.(Pass)';
                break;
            case ($range >= 75):
                $status = '1st Div.(Honors)';
                break;
            default:
                $status = 'Failed';

        }
        }
        $data = [
            'name' => $row->{'Name'},
            'photo' => $row->{'Photo'},
            'email' => $row->{'Email'},
            'marks' => $marks,
            'status' => $status,
            'total' => $range,
            'obtained' => $obtained_marks,
            'isData' => $is_marks
        ];
        $this->view('students/results', $data);
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
}
