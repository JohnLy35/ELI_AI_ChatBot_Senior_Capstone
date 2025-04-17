<?php
session_start();
include('mysqli_connect.php');

if (!isset($_SESSION['user'])) {
    echo json_encode(["error" => "Not logged in"]);
    exit();
}

$user_table = $_SESSION['user'];
$query = "SELECT Date, Summary FROM `$user_table` ORDER BY Date DESC";
$result = mysqli_query($dbc, $query);

$entries = [];
while ($row = mysqli_fetch_assoc($result)) {
    $entries[] = $row;
}

header('Content-Type: application/json');
echo json_encode($entries);
?>
