<?php
class Category{
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

    public function insert($topic){
        $query = "INSERT INTO Category (topic) VALUES ('$topic')";
            if ($this->conn->query($query) === TRUE) {
                echo "<script>alert('Category Crearted successfully')</script>";
            } else {
                echo "Error: " . $query . "<br>" . $this->conn->error;
            }
    }

    public function fetchCat(){
        $data = null;
        $query = "SELECT * FROM Category ";
        if($sql = $this->conn->query($query)){
            while($row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
            return $data;
        }
    }
}
?>