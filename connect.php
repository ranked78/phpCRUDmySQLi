<?php
$con = new mysqli('localhost', 'earcamoc_root', '123', 'earcamoc_crudoperation');

if (!$con) {
    die(mysqli_error($con));
}
?>