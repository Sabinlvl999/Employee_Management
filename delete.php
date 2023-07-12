<?php
include 'connection.php';

if(isset($_GET['id'])) {
    $id = $_GET ['id'];
    
    $query = "DELETE  FROM employee_tbl WHERE ID = '$id'";
    $result = mysqli_query ($connection, $query);

    if($result) {
        echo "User record deleted successfully";
        header("Location: data.php");
    } else {
        echo "Error deleting User record:";
    }
} else {
    echo "Invalid User ID:";
    exit;
}

mysqli_close($connection);
?>