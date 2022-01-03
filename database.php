<?php
    //Connect to MySQL
    $con = mysqli_connect("localhost:8888", "root", "8898", "shoutits");

    //Test Connection
    if(mysqli_connect_errno()){
        echo 'Failed to connect to MySQL: ', mysqli_connect_error();
    }
