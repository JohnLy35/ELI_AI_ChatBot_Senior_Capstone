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
	    /* FONTS */
	   @font-face{
                        font-family: noto-regular;
                        src: url(NotoSans-Regular.ttf);
                    }
                    
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
        
        /* Main Container - 50/50 Split */
        .container {
            display: flex;
            width: 100%;
            height: 100%;
            background: #f0f0f0; /* Light gray background for the main container */
            border-radius: 10px;
            overflow: hidden;
        }

        /* Left Section - Form */
        .form-container {
            width: 50%; /* 50% width for the left side */
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            background: e0e0e0;
            align-items: center;
        }

        .title-container {
            display: flex;
            align-items: center;
            gap: 10px;
            
        }

        h1 {
            text-align: center;
            color: #03af5e;
            font-size: 60px;
        }

        h2 {
            text-align: center;
            color: #03af5e;
            font-size: 40px;
            @font-face{
                        font-family: slogan;
                        src: url(NotoSans-Bold.ttf);
                    }
            padding-bottom: 20px;
        }
        
        h3 {
            text-align: center;
            font-size: 28px;
            color: #2A4D14;
            @font-face{
                        font-family: h3_font;
                        src: url(NotoSans-Bold.ttf);
                    }
        }

        h4 {
            text-align: center;
            color: #C0C0C0;
            font-weight: 400;
        }


        .other-text{
            font-size: 14px;
            font-weight: 400;
            color: #C0C0C0;
            
        }
        
        
        /* New Login Form Container */
        .login-container {
            width: 60%;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
          
        }
        
        .input-box {
            margin-bottom: 15px;
    
         
        }
        
        #email_style{
               @font-face{
                        font-family: email_font;
                        src: url(NotoSans-Bold.ttf);
                    }
                
                font-size: 14px;
             
           
        }
        
         #pw_style{
               @font-face{
                        font-family: pw_font;
                        src: url(NotoSans-Bold.ttf);
                    }
              
                font-size: 14px;
                
             
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
           
            
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
            font-weight: 600;
            
              }
        

        button:hover {
            background: #A5A58D;
        }

        p {
            text-align: center;
            margin-top: 10px;
        
        }

        a {
           
            text-decoration: none;
            color: blue;
           
        }
        
        a:hover{
            text-decoration: underline;
        }

        /* Forgot Password Link */
        .forgot-password {
            text-align: right;
            
            
          
        }

        .forgot-password a {
            color: blue;
            text-decoration: none;
            font-size: 14px;
            font-weight: 400;
           
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        /* Right Section - Placeholder Image */
        .slideshow-container {
            width: 50%; /* 50% width for the right side */
            display: flex;
            justify-content: center;
            align-items: center;
            background: #D8E2DC;
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


        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center; /* Center the text */
            background-color: #4285F4;
            padding: 5px;
            width: 100%;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            margin-top: 10px;
            font-size:20px;
            font-weight: 600;
        }

        .google-btn img {
            width: 15px;
            margin-right: 5px; /* Keep space between image and text */
        }

        .google-btn span {
            text-align: center;
            flex-grow: 1; /* Ensure the text is centered */
        }

        .google-btn:hover {
            background-color: #357AE8;
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
    <div class="container">
        <!-- Left Side: Login Form -->
        <div class="form-container">
            <div class="title-container">
                <img src="images/ELI_LOGO_NAME.png" alt="ELI Logo" width="175">
                
            </div>
            
            
            <div>   
                <h2>"More than a journal..."</h2>
            </div>
         
         
         
            <br>
            <!-- New Login Form Container -->
        
            <div class="login-container">
                <h3>Login</h3>
                <br>
                <form action="handle_login.php" method="POST">
                    <div class="input-box">
                        <input type="text" ID="email_style" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-box">
                        <input type="password" ID="pw_style" name="password" placeholder="Password" required>
                    </div>
                    
                    <!-- Forgot Password Link -->
                    <div class="forgot-password">
                        <a href="forgot_password.php">Forgot Password?</a>
                        <br><br>
                    </div>
                    
                   <button>Login</button>
                </form>
                
                
                <div class="other-text">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
                <br>
                <h4>OR</h4>
                <br>
                </div>
                
                
              
                <div class="google-btn">
                    <img src="images/google.png" alt="Google Logo">
                    <span>Continue with Google</span>
                </div>
            </div>
            </form>
        </div>
        
        <!-- Right Side: Placeholder Image -->
<div class="slideshow-container">

<div class="mySlides fade">
  <img src="images/slideshow/ELI_Slide1_Words.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/slideshow/ELI_Slide2_Words.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/slideshow/ELI_Slide3_Words.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/slideshow/ELI_Slide4_Words.png" style="width:100%">
</div>

</div>

<script>
let slideIndex = 0;
showSlidesAuto(); // Start auto slideshow

// Auto slideshow
function showSlidesAuto() {
  let slides = document.getElementsByClassName("mySlides");
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex - 1].style.display = "block";  
  setTimeout(showSlidesAuto, 4000); // Change image every 5 seconds
}
</script>
</div>
</body>
</html>