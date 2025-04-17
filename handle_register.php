<?php
session_start(); //create a new session ID file or retrieve a current ID file
include('mysqli_connect.php');

// Pass form data
$f_name = mysqli_real_escape_string($dbc, trim($_POST['f_name']));
$l_name = mysqli_real_escape_string($dbc, trim($_POST['l_name']));
$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
$username = $f_name . $l_name;

// check to see if email is already being used
$checkEmail = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($dbc, $checkEmail);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0){ // email already exists
    $_SESSION['message'] = "The Email you've entered has already been registered. Please try a different Email";
    header("Location:register.php");
} else { 

    // check to see if username is taken
    $checkUsername = "SELECT * FROM users Where username = ?";
    $stmt = mysqli_prepare($dbc, $checkUsername);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $count = 1;
    while (mysqli_num_rows($result) > 0){ // username already exists add one more to the number
        $username = $f_name . $l_name . $count;
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);  // re-execute query 
        $count++; //increment count
    }
        // Formulate the query to add to database
    
        $registerQuery = "INSERT INTO users (email, password, f_name, l_name, username) VALUES ('$email', '$password', '$f_name', '$l_name', '$username')";

        $create_new_table = "CREATE TABLE $username (SummaryID INT AUTO_INCREMENT PRIMARY KEY, Date DATE, Summary TEXT)";
        
        // Register query
        $register = mysqli_query($dbc, $registerQuery);
        $create_table = mysqli_query($dbc, $create_new_table);
        if($register == true){ // if the entry to of the database was successful
            // send to the login page to login
            
            if($create_table == true){
                
            
            $_SESSION['message'] = "Registration Successful! Please log in with credentials.";
            header("Location:login.php");

            exit();
        }
    }
}
exit();
?>