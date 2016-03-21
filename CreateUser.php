<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "lbutler", "embercat", "lbutler");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $username = $_POST["Username"];
    //check username if it's empty or if it already exists
    if($username == ""){
        //yell at user for not selling username
        echo "YOU DIDN'T ENTER A USERNAME! GO BACK AND TRY AGAIN IF YOU WANNA POST ON THIS PAGE!";
    } else{
            $insert = "INSERT INTO Users (user_id) VALUES ('$username')";
            echo "<br>";
            if($tryThis = $mysqli->query($insert)){
                echo "Username successfully inserted.";
            } else{
                echo "Username already exists.";
            }
    }
?>