<?php
include 'connection.php';

// Establish database connection
if (!$connection) {
    echo "No Connection with Database";
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Retrieve the existing information
        $query = "SELECT * FROM employee_tbl WHERE ID = '$id'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
    }

    if (isset($_POST['submit'])) {
        // Capture edited values
        $First_Name = $_POST['first_name'];
        $Last_Name = $_POST['last_name'];
        $Department = $_POST['department'];
        $Location = $_POST['location'];

        // Perform the database update
        $query = "UPDATE employee_tbl SET First_Name = '$First_Name', Last_Name = '$Last_Name', Department = '$Department', Location = '$Location' WHERE ID = '$id'";
        $res = mysqli_query($connection, $query);

        if ($res) {
            // Update successful
            echo "Data Edited Successfully!";
            header("Location: data.php");
            exit();
        } else {
            // Error handling for update failure
            echo "Error in data update: " . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <form method="POST" action="">
            <p id="heading">Update data</p>
            <div class="field">
                <input autocomplete="off" placeholder="First Name" class="input-field" type="Name" name="first_name" value="<?php echo $row['First_Name'] ?>">
            </div>
    
            <div class="field">
                <input autocomplete="off" placeholder="Last Name" class="input-field" type="Name" name="last_name" value="<?php echo $row['Last_Name'] ?>">
            </div>

            
            <div class="field">
                <input autocomplete="off" placeholder="Username" class="input-field" type="text" name="username" value="<?php echo $row['Username'] ?>">
            </div>
    
            <div class="field">
                <input autocomplete="off" placeholder="Password" class="input-field" type="password" name="password" value="<?php echo $row['Password'] ?>">
            </div>

            <div class="field">
                <input autocomplete="off" placeholder="Department" class="input-field" type="Name" name="department" value="<?php echo $row['Department'] ?>">
            </div>

            <div class="field">
                <input autocomplete="off" placeholder="Location" class="input-field" type="Name" name="location" value="<?php echo $row['Location'] ?>">
            </div>
            <div class="btn">
                <button type="submit" class="button1" name="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>