<?php
    require('db_connection.php');

    if(isset($_GET['title'])){
        $title = $_GET['title'];
    }

    if(isset($_GET['text'])){
        $text = $_GET['text'];
    }
    $insertsql = "INSERT INTO tasks (TTitle, TText, TPlacement) VALUES ('$title', '$text', '0')";

    if ($conn->query($insertsql) === TRUE) {
        echo "Record updated successfully";
        /* Redirect browser */
        header("Location: http://localhost/Scrum"); 
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
?>