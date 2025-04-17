<?php

session_start();
include('mysqli_connect.php');

if (!isset($_SESSION['user'])) {
    echo "User not logged in";
    exit();
}

$user_table = $_SESSION['user'];

$query = "DELETE from `$user_table`";
$result = mysqli_query($dbc, $query);

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($dbc)]);

}

?>