<?php
include 'connect.php';
$id = $_GET['updateid'];
if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    $sql = "UPDATE `crud` SET firstName='$firstName', lastName='$lastName', age='$age', address='$address' WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Updated successfully";
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


    <title>CRUD OPERATION</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" pattern="[A-Za-z ]+" class="form-control" placeholder="Enter your First Name"
                    name="firstName" autocomplete="off" required>

            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" pattern="[A-Za-z]+" class="form-control" placeholder="Enter your Last Name"
                    name="lastName" autocomplete="off" required>

            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" placeholder="Enter your Age" name="age" autocomplete="off"
                    required>

            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter your address" name="address">

            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>


</body>

</html>