<?php
$con = new mysqli('localhost', 'root', '', 'db-arcamo');

if (!$con) {
    die(mysqli_error($con));
}
?>