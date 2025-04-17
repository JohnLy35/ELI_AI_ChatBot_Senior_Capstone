
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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

        /* top-right container */
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

        /* Profile container */
        .profile-container {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1000;
        }

        /* Profile Icon */
        .profile-icon {
            display: inline-block;
            cursor: pointer;
        }

        /* Dropdown menu box */
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

        /* Show dropdown */
        .profile-container:hover .dropdown-menu,
        .dropdown-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Dropdown menu items */
        .dropdown-menu a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
            transition: background 0.2s;
        }

        /* Hover effect for dropdown items */
        .dropdown-menu a:hover {
            background: #f0f0f0;
        }

        /* middle container */
        .middle-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            gap: 40px;
            position: relative;
            z-index: 1;
            margin-top: -50px;
            padding-top: 0px;
        }

        h1 {
            color: #03af5e;
            font-size: 55px;
        }

        .input {
            position: relative;
            display: flex;
            align-items: center;
        }

        /* input box */
        input[type="text"] {
            width: 800px;
            padding: 10px;
            padding-right: 45px;
            font-size: 16px;
            border: 1px solid gray;
            border-radius: 5px;
            outline: none;
        }

        /* submit icon inside input */
        .submit-icon {
            background: transparent;
            border: none;
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
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

            .middle-container {
                height: auto;
                margin-top: 70px;
                padding: 20px;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                position: relative;
            }

            h1 {
                font-size: 40px;
            }

            input[type="text"] {
                width: 90%;
                min-width: 600px;
            }
            
            .submit-icon{
                display: none;
            }
        }

        @media screen and (max-width: 900px) {
            .top_right{
                display: none;   
            }
            
            h1 {
                font-size: 30px;
            }

            input[type="text"] {
                width: 90%;
                min-width: 300px;
            }

            .hamburger {
                top: 40px;
                left: 5px;
            }
            
            .submit-icon{
                display: none;
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

<div class="middle-container">
    <h1>What's on your mind?</h1>
    <div class="input">
        <form action="chatbot.php" method="POST" class="input">
            <input type="text" name="message" placeholder="Message">
            <button class="submit-icon" type="submit">
                <img src="images/submiticon.png" alt="Submit Icon" width="15">
            </button>
        </form>
    </div>
</div>

<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     const inputField = document.querySelector('input[name="message"]');
    //     const form = document.querySelector('.input form');

    //     inputField.addEventListener("keydown", function(event) {
    //         if (event.key === "Enter") {
    //             event.preventDefault();
    //             form.submit();
    //         }
    //     });
    // });
    document.addEventListener("DOMContentLoaded", function() {
        const inputField = document.querySelector('input[name="message"]');
        const form = document.querySelector('.input form');

        inputField.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                event.preventDefault(); // Prevent default newline behavior in text input
                let userText = this.value;
                localStorage.setItem("userInput", userText); 
                document.body.style.opacity = "0";  // Start fade out
                
                setTimeout(() => {
                    window.location.href = "chat.php"; // Redirect
                }, 500);
            }
        });
    });
</script>
</body>
</html>