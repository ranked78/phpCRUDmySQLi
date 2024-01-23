<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    $sql = "insert into `crud`(firstName,lastName,age,address) values('$firstName','$lastName','$age','$address')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Data Inserted successfully";
        header('location:index.php');
    } else {
        die(mysqli_error($con));
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style-Arcamo.css">
    <title>CRUD OPERATION</title>
</head>

<body>
    <div>
        <form method="post">
            <label>First Name</label>
            <input type="text" pattern="[A-Za-z ]+" name="firstName" placeholder="Your name.." autocomplete="off"
                required>

            <label>Last Name</label>
            <input type="text" [A-Za-z]+ name="lastName" placeholder="Your last name.." autocomplete="off" required>

            <label>Age</label>
            <input type="number" name="age" placeholder="Your Age.." autocomplete="off" required>
            <br>
            <label>Address</label>
            <input type="text" name="address" placeholder="Your Address..">


            <input type="submit" name="submit">
        </form>
    </div>
</body>

</html>