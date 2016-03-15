<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "lbutler", "embercat", "lbutler");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $username = $_POST["Username"];
    echo "testing 1 2";
    //check username if it's empty or if it already exists
    if($username == ""){
        //yell at user for not selling username
        echo "YOU DIDN'T ENTER A USERNAME! GO BACK AND TRY AGAIN IF YOU WANNA POST ON THIS PAGE!";
    } else{
        //check if username is already in database
        $query = "SELECT user_id FROM  Users WHERE user_id==$username";
        if($result = $mysqli->query($query)){
            echo "Username already exists bro.";
        } else{
            $insert = "INSERT INTO Users (user_id) VALUES ($username)";
            echo "yup";
        }
        //$query = "INSERT INTO Users (user_id) VALUES ($username)";
        //echo $username;
    }
?>