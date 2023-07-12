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
            <p id="heading">Registration Form</p>
            <img src="./img/undraw_authentication_re_svpt.svg">
            <div class="field">
                <input autocomplete="off" placeholder="First Name" class="input-field" type="Name" name="first_name">
            </div>
    
            <div class="field">
                <input autocomplete="off" placeholder="Last Name" class="input-field" type="Name" name="last_name">
            </div>

            
            <div class="field">
                <input autocomplete="off" placeholder="Username" class="input-field" type="text" name="username">
            </div>
    
            <div class="field">
                <input autocomplete="off" placeholder="Password" class="input-field" type="password" name="password">
            </div>

            <div class="field">
                <input autocomplete="off" placeholder="Department" class="input-field" type="Name" name="department">
            </div>

            <div class="field">
                <input autocomplete="off" placeholder="Location" class="input-field" type="Name" name="location">
            </div>
            <div class="btn">
                <button type="submit" class="button1" name="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include 'connection.php';
if (!$connection) {
    echo "No connection with database";
} else {
    if(isset ($_POST['submit'])) {
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $department = $_POST['department'];
        $location = $_POST['location'];

   

        $query = "INSERT INTO employee_tbl (First_Name , Last_Name, Username, Password , Department, Location) VALUES('$fname','$lname','$username','$password','$department','$location')";

        $res = mysqli_query ($connection, $query);
        echo $res;
        if ($res) {
            echo "Data inserted";
            header("Location: login.php");
        } else {
            echo "Error in data insert";
        }
    }
}
?>