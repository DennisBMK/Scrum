<?php
    require('db_connection.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    if(isset($_GET['place'])){
        $place = $_GET['place'];
    }
    $updatesql = "UPDATE tasks SET TPlacement = $place WHERE TId = $id";

    if ($conn->query($updatesql) === TRUE) {
        echo "Record updated successfully";
        /* Redirect browser */
        header("Location: http://localhost/Scrum"); 
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
?>