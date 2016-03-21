<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "lbutler", "embercat", "lbutler");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
    }
    echo "<table border = "."1"." style = "."width: 100%>";
    $query = "SELECT user_id FROM Users";
    if( $result = $mysqli->query($query)){
        echo "<tr>";
        echo "<th>";
        echo "Users";
        echo "</th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>";
            echo $row['user_id'];
            echo "</td>";
            echo "</tr>";
        }
        $result->free();
    }
    $mysqli->close();
    echo "</table>";
    
?>