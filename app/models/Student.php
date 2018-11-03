<?php

class Student
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insertStudent($data)
    {
        $this->db->query('INSERT INTO students(`Name`, `Email ID`, `Password`, `Hash`, `Active`) VALUES(:name, :email, :password, :hash, 1)');

        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':hash', $data['hash']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function manageStudent($deleteId) {
        $this->db->query('DELETE FROM students WHERE students.id = :id');
        $this->db->bind(':id', $deleteId);
        return $this->db->execute();
    }

    public function updateStudent($data)
    {
        $query1 = $this->db->query('UPDATE `students` SET `Name` = :name, `Email ID` = :email WHERE `students`.`ID` = :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':id', $data['id']);
        $result1 = $this->db->execute();

        if ($result1) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStudentInfo($data)
    {
        $query2 = $this->db->query('UPDATE `students_info` SET `Roll Number` = :roll_num, `DOB` = :dob, `Mobile` = :mobile, `Gender` = :gender, `Address` = :addresses, `City` = :city, `State` = :stated, `Pincode` = :pincode, `Course` = :course, `Year` = :years, `Specialization` = :branch, `Photo ID` = :photo WHERE `students_info`.`Student ID` = :id');
        $this->db->bind(':roll_num', $data['roll_num']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':stated', $data['state']);
        $this->db->bind(':pincode', $data['pincode']);
        $this->db->bind(':course', $data['course']);
        $this->db->bind(':years', $data['year']);
        $this->db->bind(':branch', $data['branch']);
        $this->db->bind(':photo', $data['photo']);
        $this->db->bind(':addresses', $data['address']);
        $this->db->bind(':id', $data['id']);
        $result2 = $this->db->execute();

        if ($result2) {
            return true;
        } else {
            return false;
        }
    }

    public function getData()
    {
        $this->db->query('SELECT `students_info`.`ID` as ID, `students`.`Name` as Name, `students`.`Email ID` as Email, `students_info`.`Roll Number` as `Roll Number`, `students_info`.`DOB` as `Date of Birth`, `students_info`.`Mobile` as `Mobile`, `students_info`.`Gender` as Gender, `students_info`.`Address` as Address, `students_info`.`City` as City, `students_info`.`State` as State, `students_info`.`Pincode` as Pincode, `students_info`.`Course` as Course, `students_info`.`Year` as Year, `students_info`.`Specialization` as Branch, `students_info`.`Photo ID` as Photo FROM `students` INNER JOIN `students_info` ON `students`.`ID` = `students_info`.`Student ID` WHERE `students`.`ID` = :id');
        $this->db->bind(':id', $_SESSION['user_id']);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }

    }

    public function getMarks()
    {
        $this->db->query('SELECT `students`.`Name` as `Name`, `subjects`.`Name` as `Subject`, `student_marks`.`Marks` as `Marks` FROM `students`, `student_marks`, `subjects` WHERE `students`.`ID` = `student_marks`.`Student ID` AND `subjects`.`ID` = `student_marks`.`Subject ID` AND `students`.`ID` = :id AND `student_marks`.`is_declared` = 1');
        $this->db->bind(':id', $_SESSION['user_id']);
        $row = $this->db->resultSet();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getStudents($limit, $offset, $course, $year, $branch) {
        $offset = ($offset - 1) * $limit;
        $this->db->query('SELECT `students_info`.`Student ID` as `ID`, `students`.`Name` as `Name` FROM `students_info`, `students` WHERE `students_info`.`Student ID` = `students`.`ID` AND `students_info`.`Course` = :course AND `students_info`.`Year` = :year AND `students_info`.`Specialization` = :branch LIMIT :limit OFFSET :offset');
        $this->db->bind(':offset', $offset);
        $this->db->bind(':limit', $limit);
        $this->db->bind('course', $course);
        $this->db->bind('year', $year);
        $this->db->bind('branch', $branch);
        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        } else {
            return false;
        }
    }
}
