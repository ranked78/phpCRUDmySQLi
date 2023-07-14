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
        header('location:display.php');
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>CRUD OPERATION</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" pattern="[A-Za-z]+" class="form-control" placeholder="Enter your First Name" name="firstName" autocomplete="off">

            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" pattern="[A-Za-z]+" class="form-control" placeholder="Enter your Last Name" name="lastName" autocomplete="off">

            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" placeholder="Enter your Age" name="age"
                    autocomplete="off">

            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter your Address" name="address">

            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


</body>

</html>