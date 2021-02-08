<?php
    class User{
        private $server = "localhost";
        private $username = "root";
        private $password = "";
        private $db = "Quiz";
        private $conn;

        public function __construct(){
            try {
                $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
            } catch (Exception $e) {
                echo "Connection Failed", $e->getMessage();
            }
        }

        public function insert($name, $email, $password){
            $query = "INSERT INTO signup (name, email, password, isadmin)
                VALUES ('$name', '$email', '$password', 0)";
                if ($this->conn->query($query) === TRUE) {
                    echo "<script>alert('Registered successfully')</script>";
                } else {
                    echo "Error: " . $query . "<br>" . $this->conn->error;
                }
        }

        public function login($email, $password){
            $sql = "SELECT * FROM signup WHERE email = '$email' AND password = '$password' ";
            $result = $this->conn->query($sql);
            $arr = mysqli_fetch_assoc($result);
            return $arr;
        }
    }
?>