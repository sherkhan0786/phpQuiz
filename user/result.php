<?php
// Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Creating array to get data to show results
$user_answer = array();
$right_answer = array();
$true = array();
$false = array();
$incomplete = array();

// On Submit Quiz
if (isset($_POST['finish'])) {
    $topic = $_POST['id'];
    $opt = $_POST;
    $qry = 'SELECT * FROM Questions WHERE topic = "'.$topic.'"';
    $run = mysqli_query($conn, $qry);
    $rows = mysqli_num_rows($run);
    if ($rows>0) {
        while ($data1 = mysqli_fetch_assoc($run)) {
            for ($i=1; $i<=$rows; $i++) {
                if ($_POST['ques'.$i] == $data1['id']) {
                    array_push($user_answer, $_POST[$i]);
                }
            }
            array_push($right_answer, $data1['answer']);
        }
    }
    for ($i=0;$i<sizeof($user_answer);$i++) {
        if ($user_answer[$i] == $right_answer[$i]) {
            array_push($true, $user_answer[$i]);
        } elseif ($user_answer[$i] == 5) {
            array_push($incomplete, $user_answer[$i]);
        } else {
            array_push($false, $user_answer[$i]);
        }
    }
} else {
    header("location: index.php");
}

include('userHeader.php');
?>

<div class="row row-cols-1 row-cols-md-2 mx-auto">
  <div class="col mx-auto mt-5">
    <div class="card  bg-light text-center">
    <div class="card my-5 text-center bg-danger">
        <div class="card-body">
            RESULT
        </div>
    </div>
        <h2 style="<?php if (sizeof($true)>5) { echo 'color:green;'; } else { echo 'color:red;'; } ?>">
            <?php 
            if (sizeof($true)>5) {
                echo "Congratulations Passed!";
            } else {
                echo "oop's Failed!";
            }
            ?>
        </h2>
        <h2>Right Answer/s</h2>
        <p><strong><?php echo sizeof($true); ?></strong></p>
        <h2>Wrong Answer/s</h2>
        <p><strong><?php echo sizeof($false); ?></strong></p>
        <h2>Not Attempted </h2>
        <p><strong><?php echo sizeof($incomplete); ?></strong></p>
        </div>
    </div>
  </div>
</div>