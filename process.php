<?php
    include 'database.php';

    if(isset($_POST['submit'])){
    
        $user = mysqli_real_escape_string($con, $_POST['user']);
        $message = mysqli_real_escape_string($con, $_POST['message']);

        //Set Time-Zone
        date_default_timezone_set('Asia/Kolkata');
        $time = date('h:i:s a', time());

        if(!isset($user) || $user == '' || !isset($message) || $message == ''){
            $error = "Please fill all the fields..";
            header("Location: index.php?error=".$error);
        }
        else{
            $query = "insert into shouts (user, message, time) values ('$user', '$message', '$time')";

            if(!mysqli_query($con, $query)){
                die("error: ".mysqli_error($con));
            }
            else{
                header("Location: index.php");
                exit();
            }
        }
    }