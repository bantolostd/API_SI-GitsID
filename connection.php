<?php
$hostname = "localhost";
$database = "tugas18";
$username = "root";
$password = "";
$connect = mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}