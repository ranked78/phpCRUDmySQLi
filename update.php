<?php
include 'connect.php';

// Get the ID from the URL
$id = $_GET['updateid'];

// Fetch existing data from the table
$sql = "SELECT * FROM `crud` WHERE id='$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $age = $row['age'];
    $address = $row['address'];
} else {
    die(mysqli_error($con));
}

if (isset($_POST['submit'])) {
    // Update the data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    $sql = "UPDATE `crud` SET firstName='$firstName', lastName='$lastName', age='$age', address='$address' WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
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
                required value="<?php echo $firstName; ?>">

            <label>Last Name</label>
            <input type="text" pattern="[A-Za-z]+" name="lastName" placeholder="Your last name.." autocomplete="off"
                required value="<?php echo $lastName; ?>">

            <label>Age</label>
            <input type="number" name="age" placeholder="Your Age.." autocomplete="off" required
                value="<?php echo $age; ?>">

            <br>
            <label>Address</label>
            <input type="text" name="address" placeholder="Your Address.." value="<?php echo $address; ?>">

            <input type="submit" name="submit">
        </form>
    </div>
</body>

</html>