<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "lbutler", "embercat", "lbutler");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
    }
    $username = $_POST["Username"];
    $query = "SELECT content FROM Posts WHERE author_id='$username';";
    $postsExist = false;
    if($tryThis = $mysqli->query($query)){
        echo "<table border = "."1"." style = "."width: 100%>";
        echo "<tr>";
        echo "<th>";
        echo "Posts from user ". $username;
        echo "</th>";
        echo "</tr>";
        while($row = $tryThis->fetch_assoc()){
            echo "<tr>";
            echo "<td>";
            echo $row['content'];
            echo "</td>";
            echo "</tr>";
            $postsExist = true;
        }
        if(!($postsExist)){
            echo "<tr>";
            echo "<td>";
            echo "***User has no posts yet.***";
            echo "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        $tryThis->free();
    } else{
        echo "No user selected.";
    }
    $mysqli->close();
?>