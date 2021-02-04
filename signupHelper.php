<?php
    include_once 'User.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new User();
        $user->insert($name, $email, $password);
        echo "<script>window.location.href = 'index.php';</script>";
    }

?>