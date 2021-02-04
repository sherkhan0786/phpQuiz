<?php
    include_once '../Questions.php';
    if(isset($_POST['submit'])){
        $topic = $_POST['topic'];
        $question = $_POST['question'];
        $optOne = $_POST['optOne'];
        $optTwo = $_POST['optTwo'];
        $optThree = $_POST['optThree'];
        $optFour = $_POST['optFour'];
        $answer = $_POST['answer'];

        $login = new Questions();
        $login->insert($topic, $question, $optOne, $optTwo, $optThree, $optFour, $answer);
        echo "<script>window.location.href = 'adminDash.php';</script>";
    }
?>