
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
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
      #ELI_name{
            margin-bottom: 5px;
        }
    /* top bar */
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
            font-weight: 600;
            margin-top: 10px;
    }

    .top_right a {
        text-decoration: none;
        color: #03af5e;
    }

    .top_right a:hover {
        text-decoration: underline;
    }

    .profile-container {
        position: absolute;
        top: 5px;
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
    
    h1{
        text-align: center;
        color: #03af5e;
    }
    
    h2{
        text-align: center;
        color: #2A4D14;
        font-size: 26px;
    }
    
    h3{
        text-align: center;
        color: #03af5e;
        font-size: 26px;
    }
    
    .container-section {
    display: flex;
    justify-content: space-evenly;
    align-items: flex-start;
    margin-top: 100px;
    padding: 20px;
}

.circle-icon {
    position: absolute;
    top: -35px;
    left: 40%;
    width: 75px;
    height: 75px;
    background-color: #eee;
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #ccc;
}

.circle-icon img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.box1,.box2,.box3 {
    width: 25%;
    height: 225px;
    border: 2px solid #03af5e;
    box-sizing: border-box;
    text-align: center;
    padding: 20px;
    background-color: lightgray;
    border-radius: 12px;
    position: relative;
}

.get-started-btn {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background-color: #03af5e;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.get-started-btn:hover {
    background-color: #02894c;
}


    @media screen and (max-width: 1100px) {
        .top_right {
            right: 5%;
        }


    @media screen and (max-width: 950px) {
        .top_right {
            display: none;
        }
                
        .hamburger {
            display: block;
            position: absolute;
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
            display: block;
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
          .container-section {
    flex-direction: column;
    align-items: center;
  }

  .box1, .box2, .box3 {
    width: 80%;
    margin-bottom: 30px;
  }

  .get-started-btn {
    position: static;
    margin-top: 20px;
  }
    }
}
    </style>
</head>
<body>

<div class="top_bar">
    <div class="Logo">
        <a href="homepage.php"><img src="images/ELI-Logo.png" alt="ELI Logo" width="50"></a>
        <a href="homepage.php"><img src="images/ELI_LOGO_NAME.png" alt="ELI Logo" id= "ELI_name" width="50"></a>
    </div>

    <div class="top_right">
        <a href="chat.php">Journal</a>
        <a href="history.php">History</a>
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

<!-- Hamburger Menu Icon -->
<div class="hamburger">
    <div class="hamburger-icon">
        <img src="images/hamburger-icon.webp" alt="hamburger-icon" width="40">
    </div>
    <div class="mobile-menu">
        <a href="chat.php">Journal</a>
        <a href="history.php">History</a>
        <a href="Donation.php">Donation</a>
        <a href="contact.php">Contact</a>
    </div>
</div>

    <h1>Contact Us</h1>
    <h2>We are here to help</h2>    
<div class="container-section">
    <div class="box1">
        <div class="circle-icon">
            <img src="images/phone.png" alt="Icon 1">
        </div>
        <br>
        <br>
        <h2>Call Us</h2>
        <h3>(414)-123-4567</h3>
    
    </div>
    <div class="box2">
         <div class="circle-icon">
            <img src="images/message.png" alt="Icon 1">
        </div>
        <br>
        <br>
        <h2>Chat With Us</h2>
        <a href="contactus.php" class="get-started-btn">Get Started</a>


    </div>
    <div class="box3">
         <div class="circle-icon">
            <img src="images/email.png" alt="Icon 1">
        </div>
        <br>
        <br>
        <h2>Email</h2>
        <h3>ELI@gmail.com</h3>
    
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

    
    

</body>
</html>