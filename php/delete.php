<?php
    require('db_connection.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $deletesql = "DELETE FROM tasks WHERE TId = $id";

    if ($conn->query($deletesql) === TRUE) {
        echo "Record updated successfully";
        /* Redirect browser */
        header("Location: http://localhost/Scrum"); 
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
?>

DELETE FROM table_name
WHERE some_column = some_value