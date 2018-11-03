<?php

class User
{
    // Declare database variable
    private $db;

    // Create Constructor
    public function __construct()
    {
        // Init DB
        $this->db = new Database;
    }

    // Register User
    public function register($data)
    {
        $this->db->query('INSERT INTO students(`Name`, `Email ID`, `Password`, `Hash`) VALUES(:name, :email, :password, :hash)');

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

    // Account Verification
    public function account($email, $hash)
    {
        $this->db->query('UPDATE students SET `Active` = 1 WHERE `Email ID`=:email AND `Hash`=:hash');
        $this->db->bind(':email', $email);
        $this->db->bind(':hash', $hash);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Check for login without verification
    public function checkAccount($email)
    {
        $this->db->query('SELECT * FROM students WHERE `Email ID`=:email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        $active = $row->{'Active'};

        if ($active == 1) {
            return true;
        } else {
            return false;
        }
    }

    // Login
    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM students WHERE `Email ID`=:email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        $hashed_password = $row->{'Password'};

        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    // Admin Login
    public function adminLogin($email, $password)
    {
        $this->db->query('SELECT * FROM admins WHERE `Email`=:email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->{'Password'};

        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM students WHERE `Email ID` = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Find user by email
    public function adminFindUserByEmail($email)
    {
        $this->db->query('SELECT * FROM admins WHERE `Email` = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Get user by id
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM students WHERE `ID` = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // Get user by id
    public function adminGetUserById($id)
    {
        $this->db->query('SELECT * FROM admins WHERE `ID` = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // Get Every User
    public function getAllUserData() {
        $this->db->query('SELECT
                            `students`.`ID` as `ID`,
                            `students`.`Name` as `Name`,
                            `students_info`.`Roll Number` as `Roll`,
                            `students_info`.`Year` as `Year`,
                            `students_info`.`Course` as `Course`,
                            `students_info`.`Specialization` as `Branch`
                        FROM `students`, `students_info`
                        WHERE `students`.`ID` = `students_info`.`Student ID`');
        return $this->db->resultSet();
    }

}
