<?php

include('connection.php');


$name = $_POST["name"];
$email = $_POST['email'];
$password = $_POST['password'];

$table = $_POST["sign"];

$query = "INSERT INTO {$table}( name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";


if (mysqli_query($connection, $query)) {
    header("location: login.php");
 } else {
    echo "Error inserting data: " . mysqli_error($connection);
}


























?>