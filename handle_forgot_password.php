<?php
session_start(); //create a new session ID file or retrieve a current ID file
include('mysqli_connect.php');

// Pass form data
$email = mysqli_real_escape_string($dbc, trim($_POST['email']));

// Formulate the query to check if password matches with the database
$query = "SELECT * from users WHERE email = '$email' ";

// Run the query
$result = mysqli_query($dbc, $query);

$row_cnt = mysqli_num_rows($result);

if($row_cnt == 1){ // if there is a match found
    // Set a session variable
    $_SESSION['email'] = $email; //define a session var -> can be access later 

    // Redirect user to the change password page
    header("Location:change_password.php");
    exit();

}else { // else, no match
    // Redirect user to the login page
    $_SESSION['message'] = "Email does not exist";
    header("Location:forgot_password.php");

    exit();
}
?>