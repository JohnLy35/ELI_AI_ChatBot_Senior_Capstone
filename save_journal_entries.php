<?php

session_start();
include('mysqli_connect.php');

if (!isset($_SESSION['user'])) {
    echo "User not logged in";
    exit();
}

$input = json_decode(file_get_contents("php://input"), true);
$summary = mysqli_real_escape_string($dbc, $input['summary']);
$user_table = $_SESSION['user'];

$query = "INSERT INTO `$user_table` (Date, Summary) VALUES (NOW(), '$summary')";
$result = mysqli_query($dbc, $query);

if ($result) {
    echo "Success";
} else {
    echo "Error: " . mysqli_error($dbc);
}

?>