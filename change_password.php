<?php
session_start();
include('mysqli_connect.php');

// Redirect if user is not coming from forgot_password.php
if (!isset($_SESSION['email'])) {
    header("Location: forgot_password.php");
    exit();
}

// Error message variable
$error = '';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = mysqli_real_escape_string($dbc, trim($_POST['new_password']));
    $confirm_password = mysqli_real_escape_string($dbc, trim($_POST['confirm_password']));

    if ($new_password === $confirm_password) {

        $email = $_SESSION['email'];
        $query = "UPDATE users SET password = '$confirm_password' WHERE email = '$email'";
        $result = mysqli_query($dbc, $query);

        if ($result) {
            $_SESSION['message'] = "Password successfully changed!";
            session_destroy(); // log out after reset
            header("Location: login.php");
            exit();
        } else {
            $error = "Error updating password. Please try again.";
        }
    } else {
        $error = "Passwords do not match.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>ELI - Change Password</title>
    <style>
        /* General */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }

        @font-face {
            font-family: 'Menco';
            src: url('fonts/Menco_Medium.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        .message {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #FFDDC1;
            color: #333;
            font-size: 18px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 80%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }

        .left_Corner {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 75px;
        }

        .form-container {
            width: 50%;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            margin-top: -50px;
        }

        .title-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: -5px;
        }

        h1 {
            text-align: center;
            color: #03af5e;
            font-size: 60px;
        }

        h2 {
            text-align: center;
            color: #03af5e;
            font-size: 42px;
        }

        h3 {
            text-align: center;
            color: #2A4D14;
            font-family: 'Menco', sans-serif;
            font-size: 28px;
        }

        h4 {
            text-align: center;
            color: lightgray;
            font-weight: normal;
        }

        .reset-container {
            width: 60%;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .input-box {
            margin-bottom: 15px;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            font-family: 'Menco', sans-serif;
            font-weight: bold;
        }

        .input-box input::placeholder {
            font-family: 'Menco', sans-serif;
            font-weight: bold;
            color: #C0C0C0;
            font-size: 18px;
        }
        
        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #03af5e;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #A5A58D;
        }

        .back-to-login {
            text-align: center;
            margin-top: 10px;
        }

        .back-to-login a {
            color: blue;
            text-decoration: none;
            font-size: 14px;
            font-weight: normal;
        }

        .back-to-login a:hover {
            text-decoration: underline;
        }

        @media screen and (max-width: 800px) {
            .form-container {
                width: 100vw;
            }
            .login-container {
                width: 75%;
            }
        }

        @media screen and (max-width: 600px) {
            .form-container {
                width: 100vw;
            }
            .login-container {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php if (!empty($error)): ?>
        <div class="message"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="message"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <div class="left_Corner">
        <img src="images/Feil_490_Complete_Logo_RGB.png" alt="ELI Logo" width="50">
    </div>

    <div class="form-container">
        <div class="title-container">
            <img src="images/ELI_LOGO_NAME.png" alt="ELI Logo" width="175">
        </div>
        <h2>"More Than A Journal..."</h2>
        <br>
        <div class="reset-container">
            <h3>Reset your password</h3>
            <br>
            <h4>Enter your new password below</h4>
            <br>
            <form method="POST">
                <div class="input-box">
                    <input type="password" name="new_password" placeholder="New Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>