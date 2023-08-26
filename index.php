<?php
include 'connect.php';

// Pagination variables
$records_per_page = 5;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;

// Query to retrieve limited records based on pagination
$sql = "SELECT * FROM crud LIMIT $offset, $records_per_page";
$result = mysqli_query($con, $sql);
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
    <div class="container">

        <a href="user.php" class="text-light btn btn-primary my-5">Add user</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $mobile = $row['mobile'];
                        $password = $row['password'];
                        echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $name . '</td>
                        <td>' . $email . '</td>
                        <td>' . $mobile . '</td>
                        <td>' . $password . '</td>
                        <td>
                        <a class="btn btn-primary" href="update.php?updateid=' . $id . '">Update</a>
                        <a class="btn btn-danger" href="delete.php?deleteid=' . $id . '">Delete</a>
                        </td>
                    </tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">No records found</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <?php
        // Pagination links
        $total_records = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `crud`"));
        $total_pages = ceil($total_records / $records_per_page);

        echo '<ul class="pagination">';
        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<li class="page-item' . ($current_page == $i ? ' active' : '') . '">
            <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
            </li>';
        }
        echo '</ul>';
        ?>
    </div>
</body>

</html>