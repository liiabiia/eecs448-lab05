<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "lbutler", "embercat", "lbutler");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
    }
    $username = $_POST["Username"];
    $content = $_POST["Post"];
    $validName = "";
    //blank post and username
    if($username == ""){
        echo "Error: You must provide your username. I'm not saving this.";
    
    } else if ($content == ""){
        echo "Error: You cannot give a blank post. I'm not saving this.";
    
    } else{
        $query = "SELECT user_id FROM Users WHERE user_id = '$username'";
        //check to make sure username exists
        if(($result = $mysqli->query($query))){
            //echo "Error: Username does not exist. I'm not saving this.";
            while($row = $result->fetch_assoc()){
                $validName= $row['user_id'];
            }
        } 
        if ($validName == $username) {
            $insert = "INSERT INTO Posts (content, author_id) VALUES ('$content','$username')";
            if($tryThis = $mysqli->query($insert)){
                echo "Welcome back ". $username ."!!! Your post was successfully saved.";
            } else{
                echo "Error: Something went wrong. Post not saved.";
            }
        } else {
            echo "Error: Username does not exist. I'm not saving this.";
        }
        
    }

//welcome back username, your post was succesfully saved.
?>