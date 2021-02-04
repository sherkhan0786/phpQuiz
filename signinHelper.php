<?php
    session_start();
    include_once 'User.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new User();
        $arr = $user->login($email, $password);
        if($arr['email'] == $email && $arr['password'] == $password){
            if($arr['isadmin'] == 1){
                echo "<script>alert('Welcome Mr. Admin')</script>";
                $_SESSION['user'] = $email;
                // echo $_SESSION['user'];
                echo "<script>window.location.href = 'admin/adminDash.php';</script>";
            }else{
                echo "<script>alert('Welcome User')</script>";
                $_SESSION['user'] = $email;
                // echo $_SESSION['user'];
                echo "<script>window.location.href = 'user';</script>";
            }
        }else{
            echo "<script>alert('Wrong Username Or Password')</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        }
    }
?>