<?php 

    /* 
    * Main PDO Database Class
    * Connect to Database
    * Create prepared statements
    * Bind values
    * Return rows and results
    */

    class Database {

        // Declare the variables
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $dbname = DB_NAME;

        // Declare variable to use for preparing statements: A PDO object basically
        private $dbh;
        
        // Declare variable for statements
        private $stmt;

        // Declare error storing variable
        private $error;


        // Create constructor to connect to the database so that every instant of an object of Database gets connected to database

        public function __construct() {

            // Using PDO
            // Set DSN
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;

            // Set the options for PDO
            $options = array(

                // To increase performance of database query by checking if the connection is already established
                PDO::ATTR_PERSISTENT => true,  

                // To throw errors in a formal elegant manner
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

            );

            // Create PDO instant - PDO is inbuilt object
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
            } catch(PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }

        }


        // Now prepare the statement outside constructor
        public function query($sql) {

            // $sql is user query
            $this->stmt = $this->dbh->prepare($sql);

        }

        // Once prepared, bind the values
        public function bind($param, $value, $type = null) {

            // Check the type
            if(is_null($type)) {

                // PDO::PARAM_*Statements have a flaw which validate something like say '1a' as int so we need to make extra check using is_int()
                switch(true) {

                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;

                    case is_null($value):
                        $type = PDO::PARAM_NULL;

                    default:
                        $type = PDO::PARAM_STR;

                }

            }

            $this->stmt->bindValue($param, $value, $type);


        }

        // Once the value is binded, execute it
        public function execute() {
            
            // Return the bool value of true on success or false on failure
            return $this->stmt->execute();

        }

        // Query to get single row from the database
        public function single() {
            
            // First execute the query using above execute function
            $this->execute();

            // Return results in the form of Object Array
            return $this->stmt->fetch(PDO::FETCH_OBJ);

        }

        // Query to get result set as object array
        public function resultSet() {

            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);

        }

        // Query to get the row count
        public function rowCount() {

            return $this->stmt->rowCount();
        
        }

    }