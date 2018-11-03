<?php

    class Utilities {
        // Declare database variable
        private $db;
        private $course_id;
        private $year_id;
        // Create Constructor
        public function __construct() {
            // Init DB
            $this->db = new Database;
        }

        public function result($course, $year, $branch) {

        }

        public function addCourse($newCourse) {
            $this->db->query('INSERT INTO courses(`Name`) VALUES(:name)');
            $this->db->bind(':name', $newCourse);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function addClass($course_name, $subject_name, $branch_name, $year_name) {
            
            // Get Course ID from Course Name
            $this->db->query('SELECT `ID` FROM courses WHERE courses.`Name` = :course_name');
            $this->db->bind(':course_name', $course_name);
            $this->course_id = $this->db->single();
            // Get Year ID using Year Name
            $this->db->query('SELECT `ID` FROM year WHERE year.`Name` = :year_name');
            $this->db->bind(':year_name', $year_name);
            $this->year_id = $this->db->single();

            // Insert data to subjects
            $this->db->query('INSERT INTO subjects(`Course ID`, `Year ID`, `Name`) VALUES(:courseID, :yearID, :name)');
            $this->db->bind(':name', $subject_name);
            $this->db->bind(':courseID', $this->course_id);
            $this->db->bind(':yearID', $this->yearID);

            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function retrieveCourse() {
            $this->db->query('SELECT * FROM courses');
            return $this->db->resultSet();
        }
        
        public function retrieveClass($limit, $offset) {
            $offset = ($offset - 1) * $limit;
            $this->db->query('SELECT sycss.id as `ID`, sycss.`Subject ID` as `SubID`, courses.name as `Course Name`, year.name as `Year Name`, branch.name as `Branch Name`, subjects.name as `Class Name`, sycss.`Created_At` as `Created At` FROM courses, year, branch, subjects, sycss WHERE courses.id = sycss.`Course ID` AND year.id = sycss.`Year ID` AND branch.id = sycss.`Specialization ID` AND subjects.id = sycss.`Subject ID` LIMIT :limit OFFSET :offset');
            $this->db->bind(':offset', $offset);
            $this->db->bind(':limit', $limit);
            return $this->db->resultSet();
        }

        public function manageCourse($deleteId) {
            $this->db->query('DELETE FROM courses WHERE courses.id = :id');
            $this->db->bind(':id', $deleteId);
            return $this->db->execute();
        }
        
        public function deleteClass($deleteId) {
            $this->db->query('DELETE FROM subjects WHERE subjects.`ID` = :id');
            $this->db->bind(':id', $deleteId);
            return $this->db->execute();
        }

        public function retrieveCourseCount() {
            $this->db->query('SELECT * FROM courses');
            $row = $this->db->resultSet();
            $count = 0;
            foreach($row as $rowCount):
                $count += 1;
            endforeach;
            return $count;
        }
        public function retrieveStudentsCount() {
            $this->db->query('SELECT * FROM students');
            $row = $this->db->resultSet();
            $count = 0;
            foreach($row as $rowCount):
                $count += 1;
            endforeach;
            return $count;
        }
        public function retrieveSubjectsCount() {
            $this->db->query('SELECT * FROM sycss');
            $row = $this->db->resultSet();
            $count = 0;
            foreach($row as $rowCount):
                $count += 1;
            endforeach;
            return $count;
        }
        public function retrieveResultsCount() {
            $this->db->query('SELECT * FROM student_marks');
            $row = $this->db->resultSet();
            $count = 0;
            foreach($row as $rowCount):
                $count += 1;
            endforeach;
            return $count;
        }
        public function declare($id) {
            $this->db->query('UPDATE `student_marks` SET `student_marks`.`is_declared` = 1 WHERE `student_marks`.`Student ID` = :id');
            $this->db->bind(':id', $id);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function retriveStudent($id) {
            $query = $this->db->query('SELECT `students`.`Name`, `students_info`.`Course`, `students_info`.`Year`, `students_info`.`Specialization` FROM `students_info`, `students` WHERE `students_info`.`Student ID` = :id AND `students`.`ID` = `students_info`.`Student ID`');
            $this->db->bind(':id', $id);
            $info = $this->db->single();
            if(!empty($info)) {
                return $info;
            } else {
                return false;
            }
        }

        public function getSubjects($course, $year, $branch) {     
            $query1 = $this->db->query('SELECT `courses`.`ID` FROM `courses` WHERE `courses`.`Name` = :course');
            $this->db->bind(':course', $course);
            $courseID= $this->db->single();

            $query2 = $this->db->query('SELECT `branch`.`ID` FROM `branch` WHERE `branch`.`Name` = :branch');
            $this->db->bind(':branch', $branch);
            $branchID = $this->db->single();

            $query3 = $this->db->query('SELECT `year`.`ID` FROM `year` WHERE `year`.`Name` = :year');
            $this->db->bind(':year', $year);
            $yearID = $this->db->single();

            $_SESSION['course_id'] = $courseID->{'ID'};
            $_SESSION['year_id'] = $yearID->{'ID'};
            $_SESSION['branch_id'] = $branchID->{'ID'};

            $query = $this->db->query('SELECT `subjects`.`ID`, `subjects`.`Name` FROM `subjects`, `sycss` WHERE `sycss`.`Course ID` = :course_id AND `sycss`.`Year ID` = :year_id AND `sycss`.`Specialization ID` = :branch_id AND `subjects`.`ID` = `sycss`.`Subject ID`');
            $this->db->bind(':course_id', $courseID->{'ID'});
            $this->db->bind(':year_id', $yearID->{'ID'});
            $this->db->bind(':branch_id', $branchID->{'ID'});
            $info = $this->db->resultSet();

            if(!empty($info)) {
                return $info;
            } else {
                return false;
            }
        }

        public function insertMarks($data, $count) {
           $i=1;
           for($j = 1; $j <= $count; $j++) {
               $this->db->query('INSERT INTO `student_marks`(`Student ID`, `Course ID`, `Branch ID`, `Subject ID`, `Marks`) VALUES(:student_id, :course_id, :branch_id, :subject_id, :marks)');
               $this->db->bind(':course_id', $_SESSION['course_id']);
               $this->db->bind(':student_id', $_SESSION['student_id']);
               $this->db->bind(':branch_id', $_SESSION['branch_id']);
               $this->db->bind(':subject_id', $_SESSION['subject_id-' . $j]);
               $this->db->bind(':marks', $data['marks-' . $j]);

               $this->db->execute();
           }
        }

    }