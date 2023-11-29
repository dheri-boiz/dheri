<?php

$con = new mysqli('localhost:3306', 'myadmin', 'password', 'phpcrud');

if(!$con) {
    die(mysqli_error( $con));
}

?>