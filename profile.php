<?php
session_start();

// Optional: Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$firstName = $_SESSION['f_name'];
$lastName = $_SESSION['l_name'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            margin: 0;
        }

        .top_bar {
            position: relative;
            z-index: 1001;
        }

        .top_right {
            position: absolute;
            top: 10px;
            right: 5%;
            display: flex;
            justify-content: space-between;
            gap: 20px;
            z-index: 1002;
        }

        .top_right a {
            text-decoration: none;
            color: #03af5e;
        }

        .top_right a:hover {
            text-decoration: underline;
            color: #03af5e;
        }

        .top_right a:active {
            color: #03af5e;
        }

        .profile-container {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1000;
        }

        .profile-icon {
            display: inline-block;
            cursor: pointer;
        }

        .dropdown-menu {
            position: absolute;
            top: 40px;
            right: 0;
            background: white;
            width: 150px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, transform 0.2s ease;
            transform: translateY(-10px);
            z-index: 2000;
        }

        .profile-container:hover .dropdown-menu,
        .dropdown-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
            transition: background 0.2s;
        }

        .dropdown-menu a:hover {
            background: #f0f0f0;
        }

        .hamburger {
            display: none;
        }

        .hamburger-icon {
            display: none;
            cursor: pointer;
        }

        .mobile-menu {
            display: none;
        }

        h1 {
            margin-right: 20px;
            text-align: center;
            color: #03af5e;
        }

        .top-right-h2 {
            position: absolute;
            top: 5px;
            right: 15px;
            font-size: 14px;
            color: red;
            text-decoration: none;
            cursor: pointer;
        }

        .top-right-h2:hover {
            text-decoration: underline;
            color: darkred;
        }

        .profile-wrapper {
            display: flex;
            justify-content: center;
        }

        .profile {
            position: absolute;
            width: 100%;
            max-width: 800px;
            background-color: lightgray;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: left;
        }

        .profile-picture img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }
        
        .profile p1, p2, p3{
            color: #03af5e;
            font-size: 20px;
            font-weight: bold;
            align-items: center;
            
        }
        
        .profile-content {
            display: flex;
            align-items: center;
            gap: 30px; 
        }

        .credentials {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .credentials p4, p5, p6{
            color: #2A4D14;
            font-weight: normal;
            text-align: center;
            justify-content: center;
        }

        @media screen and (max-width: 1300px) {
            .top_right {
                position: absolute;
                top: 10px;
                right: 5%;
                display: flex;
                justify-content: space-between;
                gap: 20px;
                z-index: 1002;
            }

            .hamburger {
                display: block;
                position: fixed;
                top: 40px;
                left: 5px;
                z-index: 1002;
            }

            .hamburger-icon {
                display: block;
                cursor: pointer;
            }

            .mobile-menu {
                position: absolute;
                top: 70px;
                left: 0;
                background: white;
                width: 150px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease, transform 0.2s ease;
                transform: translateY(-10px);
                z-index: 2000;
            }

            .hamburger:hover .mobile-menu,
            .mobile-menu.active {
                display: block;
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .mobile-menu a {
                display: block;
                padding: 10px;
                color: #333;
                text-decoration: none;
                transition: background 0.2s;
            }

            .mobile-menu a:hover {
                background: #f0f0f0;
            }

            input[type="text"] {
                width: 90%;
                max-width: 400px;
            }

            .submit-icon {
                display: none;
            }
        }

        @media screen and (max-width: 900px) {
            .top_right {
                display: none;
            }

            .hamburger {
                top: 40px;
                left: 5px;
            }

            .submit-icon {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="top_bar">
    <div class="Logo">
        <a href="homepage.php"><img src="images/ELI-Logo.png" alt="ELI Logo" width="50"></a>
        <a href="homepage.php"><img src="images/ELI_LOGO_NAME.png" alt="ELI Logo" width="50"></a>
    </div>

    <div class="top_right">
        <a href="chat.php">Journal</a>
        <a href="History.php">History</a>
        <a href="Donation.php">Donation</a>
        <a href="contact.php">Contact</a>
    </div>

    <div class="profile-container">
        <div class="profile-icon"><img src="images/icon.png" alt="icon" width="30"></div>
        <div class="dropdown-menu">
            <a href="profile.php">Profile</a>
            <a href="login.php">Logout</a>
        </div>
    </div>
</div>

<div class="hamburger">
    <div class="hamburger-icon">
        <img src="images/hamburger-icon.webp" alt="hamburger-icon" width="40">
    </div>
    <div class="mobile-menu">
        <a href="chat.php">Journal</a>
        <a href="History.php">History</a>
        <a href="Donation.php">Donation</a>
        <a href="contact.php">Contact</a>
    </div>
</div>

<script>
    const profileIcon = document.querySelector(".profile-icon");  
    const hamburgerIcon = document.querySelector(".hamburger-icon");
    const dropdownMenu = document.querySelector(".dropdown-menu"); 
    const mobileMenu = document.querySelector(".mobile-menu");

    profileIcon.addEventListener("click", (event) => {
        event.stopPropagation(); 
        dropdownMenu.classList.toggle("active");
    });
    document.addEventListener("click", (event) => {
        if (!profileIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove("active");
        }
    });

    hamburgerIcon.addEventListener("click", (event) => {
        event.stopPropagation(); 
        mobileMenu.classList.toggle("active");
    });

    document.addEventListener("click", (event) => {
        if (!hamburgerIcon.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.remove("active");
        }
    });
</script>

<h1>Profile</h1>
<div class="profile-wrapper"> 
  <div class="profile">
    <div class="profile-content">
      <div class="profile-picture">
        <img src="images/icon.png" alt="icon" width="150">
      </div>
      <div class="credentials">
        <p1>First Name: <p4><?php echo htmlspecialchars($firstName); ?></p4></p1><br>
        <p2>Last Name: <p5><?php echo htmlspecialchars($lastName); ?></p5></p2><br>
        <p3>Email: <p6><?php echo htmlspecialchars($email); ?></p6></p3>
      </div>
    </div>
    <h2 class="top-right-h2" onclick="confirmDelete()">Delete Account</h2>
  </div>
</div>

<script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete your account?")) {
            window.location.href = "chat.php";
        }
    }
</script>

</body>
</html>