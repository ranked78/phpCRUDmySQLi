<?php
$con = new mysqli('localhost', 'root', '123', 'crudoperation');

if (!$con) {
    die(mysqli_error($con));
}
?>