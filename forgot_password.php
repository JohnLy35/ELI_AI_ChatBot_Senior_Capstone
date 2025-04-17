<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>ELI - Login</title>
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
            background-color: #f0f0f0; /* Light gray background for the body */
        }
        
        @font-face {
            font-family: 'Menco';
            src: url('fonts/Menco_Medium.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        /* Pop-up Message Styling */
        .message {
        position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #FFDDC1; /* Light red background for error */
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

        /* Animation for the pop-up message */
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
            margin-bottom: 20px;
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
        
        h4{
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
            color: #C0C0C0;
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

        p {
            text-align: center;
            margin-top: 10px;
        }

        a {
            color: #03af5e;
            text-decoration: none;
            font-weight: bold;
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
        
.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 2s;
}

@keyframes fade {
  from { opacity: 0.7}
  to { opacity: 1 }
}
        
        /*remove screen when screen is small*/
        @media screen and (max-width: 800px){
            .image-container{
                display:none;
            }
            .form-container{
                width: 100vw;
            }
            .login-container{
                width: 75%;
               
            }
            .slideshow-container{
                display: none;
            }
        }
        
        @media screen and (max-width: 600px){
            .image-container{
                display:none;
            }
            .form-container{
                width: 100vw;
            }
            .login-container{
                width: 100%;
               
            }
        }
    
</style>
</head>
<body>
    <?php
    // Display pop-up message if set
    if (isset($_SESSION['message'])) {
        echo '<div class="message">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']); // Clear message after displaying
    }
    ?>

    <!-- JavaScript for pop-up message -->
    <script>
        // Check if PHP message is set
        <?php if (isset($_SESSION['message'])) { ?>
            alert("<?php echo $_SESSION['message']; ?>");
        <?php } ?>
    </script>
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
                <h4>Enter your new password</h4>
                <br>
                <form action="handle_forgot_password.php" method="POST">
                    <div class="input-box">
                        <input type="text" name="email" placeholder="Email" required>
                    </div>
                   <button type="submit">Submit</button>
                    <div class="back-to-login">
                        <a href="login.php">Back to Log In</a>
                        <br><br>
                    </div>
                </form>
            </div>
            </form>
        </div>
</div>
</body>
</html>