<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "lbutler", "embercat", "lbutler");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    //FOUND FROM http://www.html-form-guide.com/php-form/php-form-checkbox.html
    $postDelete = $_POST['Post'];
    if(empty($postDelete)){
        echo "No posts selected. Not deleting.";
    } else {
        $numOfchecks = count($postDelete);
        for($i=0; $i< $numOfchecks; $i++){
            $value = $postDelete[$i];
            $query = "DELETE FROM Posts WHERE post_id = '$value'";
            if($result = $mysqli ->query($query)){
                echo "Post number ".$value. " has been deleted.";
                echo "<br>";
            }
                
        }
    }
?>