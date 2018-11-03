<?php 

    class Page {

        private $db;

        public function __construct() {

            // Create instance of Database Model
            $this->db = new Database;

        }

        // Submit Career Form
        public function career($data) {
            $this->db->query('INSERT INTO career(`Name`, `Email ID`, `Contact Number`, `Date`, `Current Organisation`, `Message`, `Permanent Address`, `Pincode`, `Current CTC`, `Expected CTC`, `Gender`) VALUES(:name, :email, :mobile, :date, :curorg, :query, :permaddr, :pincode, :curctc, :expctc, :gender)');

            // Bind Values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':mobile', $data['mobile']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':curorg', $data['curorg']);
            $this->db->bind(':query', $data['query']);
            $this->db->bind(':permaddr', $data['permaddr']);
            $this->db->bind(':pincode', $data['pincode']);
            $this->db->bind(':curctc', $data['curctc']);
            $this->db->bind(':expctc', $data['expctc']);
            $this->db->bind(':gender', $data['gender']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Submit Contact Form
        public function contact($data) {
            $this->db->query('INSERT INTO contact(`Name`, `Email ID`, `Contact Number`, `Course`, `Message`) VALUES(:name, :email, :mobile, :course, :query)');

            // Bind Values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':mobile', $data['mobile']);
            $this->db->bind(':query', $data['query']);
            $this->db->bind(':course', $data['course']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }