<?php
session_start(); //create a new session ID file or retrieve a current ID file
include('mysqli_connect.php');

// Pass form data
$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
$password = mysqli_real_escape_string($dbc, trim($_POST['password']));

// Formulate the query to check if password matches with the database
$query = "SELECT * from users WHERE email = '$email' AND password = '$password'";

// Run the query
$result = mysqli_query($dbc, $query);

$row_cnt = mysqli_num_rows($result);

if($row_cnt == 1){ // if there is a match found
    // Set a session variable
    $_SESSION['email'] = $email; //define a session var -> can be access later 

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['f_name'] = $row['f_name'];
    $_SESSION['l_name'] = $row['l_name'];
    
    $_SESSION['user'] = $row['f_name'].$row['l_name'];
    $_SESSION['logged_in'] = true;
    // Redirect user to the home page
    header("Location: homepage.php");
    exit();

}else { // else, no match
    // Redirect user to the login page
    $_SESSION['message'] = "Email or password incorrect";
    header("Location:login.php");

    exit();
}
?>