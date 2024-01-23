<?php
include 'connect.php';



$sql = "SELECT * FROM `crud` ORDER BY age DESC";
$result = mysqli_query($con, $sql);
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
    <div class="container">
        <br>
        <a href="user.php" class="add-user">Add user</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $firstName = $row['firstName'];
                        $lastName = $row['lastName'];
                        $age = $row['age'];
                        $address = $row['address'];
                        echo '<tr>
                        <th>' . $id . '</th>
                        <td>' . $firstName . '</td>
                        <td>' . $lastName . '</td>
                        <td>' . $age . '</td>
                        <td>' . $address . '</td>
                        <td>
                        <a class="update" href="update.php?updateid=' . $id . '">Update</a>
                        <a class="delete" href="delete.php?deleteid=' . $id . '">Delete</a>
                        </td>
                    </tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">No records found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>