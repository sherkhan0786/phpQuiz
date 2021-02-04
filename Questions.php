<?php
    class Questions{
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

        public function insert($topic, $question, $optOne, $optTwo, $optThree, $optFour, $answer){
            $query = "INSERT INTO Questions (topic, question, optOne, optTwo, optThree, optFour, answer)
                VALUES ('$topic', '$question', '$optOne', '$optTwo', '$optThree', '$optFour', '$answer')";
                if ($this->conn->query($query) === TRUE) {
                    echo "<script>alert('Question Crearted successfully')</script>";
                } else {
                    echo "Error: " . $query . "<br>" . $this->conn->error;
                }
        }

        public function fetchQn($topic){
            $data = null;
            $query = "SELECT * FROM Questions WHERE topic='$topic' ";
            if($sql = $this->conn->query($query)){
                while($row = mysqli_fetch_assoc($sql)){
                    $data[] = $row;
                }
                return $data;
            }
        }
    }
?>