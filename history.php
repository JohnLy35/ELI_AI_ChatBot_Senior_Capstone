<?php
session_start();
include('mysqli_connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>History</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            margin: 0;
            height:90vh;
            width:100vw;
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
            font-weight: 600;
            margin-top: 10px;
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
        
        /*chat history section*/
        .main{
            width: 100%;
            height:100%;
            display:flex;
            justify-content: start;
            align-items:center;
            flex-direction: column;
        }
        .history-container{
            width:60%;
            max-height:90%;
            min-height:70vh;
            padding:20px;
            overflow:auto;
            
        }
        .delete-container{
            width:60%;
            text-align:right;
            margin-top:5%;
        }
        .delete-button{
            color:red;
            padding:5px;
            cursor:pointer;
        }
        h1{
            color:#03af5e;
            font-weight: 600;
             @font-face{
                        font-family: h3_font;
                        src: url(Menco_Bold.ttf);
                    }
        }
        .chat-log h2{
            color:#2A4D14;
        }
        @keyframes fadeInSlideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .main {
            animation: fadeInSlideUp 1s ease-out;
        }
        @media (max-width: 550px) {
            .history-container {
                width:90%;
            }
            .delete-container{
                width:90%;
            }
        }
        @media (max-width: 900px) {
            .history-container {
                width:80%;
            }
            .delete-container{
                width:80%;
            }
        }
        /*Login Message*/
        .login-message{
            width:100vw;
            height:90vh;
            display:flex;
            justify-content:center;
            align-items:center;
            text-align: center;
            margin:10px;
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
            <?php if ($_SESSION['logged_in'] == true): ?>
                <a href="profile.php">Profile</a>
                <a href="login.php">Logout</a>
            <?php else: ?>
                <a href = "login.php">Login</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
    if (!isset($_SESSION['user'])) {
    echo "<div class = 'login-message'><h1>To have access to the History Page please <br><a href = 'login.php'>Log In</a></h1>
    </div>";
    exit();
}
?>
<div class = "main">
    <h1>History</h1>
    <div class = "history-container">
        <!--
        <div class = "chat-log">
            <h2>April 2nd, 2025</h2>
            <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, testing, and web development. Its purpose is to permit a page layout to be designed, independently of the copy that will subsequently populate it, or to demonstrate various fonts of a typeface without meaningful text that could be distracting.
            </p>
            <hr>
        </div>
        <div class = "chat-log">
            <h2>April 4th, 2025</h2>
            <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, testing, and web development. Its purpose is to permit a page layout to be designed, independently of the copy that will subsequently populate it, or to demonstrate various fonts of a typeface without meaningful text that could be distracting.
            </p>
            <hr>
        </div>
        <div class = "chat-log">
            <h2>April 6th, 2025</h2>
            <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, testing, and web development. Its purpose is to permit a page layout to be designed, independently of the copy that will subsequently populate it, or to demonstrate various fonts of a typeface without meaningful text that could be distracting.
            </p>
            <hr>
        </div>
        <div class = "chat-log">
            <h2>April 7th, 2025</h2>
            <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, testing, and web development. Its purpose is to permit a page layout to be designed, independently of the copy that will subsequently populate it, or to demonstrate various fonts of a typeface without meaningful text that could be distracting.
            </p>
            <hr>
        </div>
        <div class = "chat-log">
            <h2>April 8th, 2025</h2>
            <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, testing, and web development. Its purpose is to permit a page layout to be designed, independently of the copy that will subsequently populate it, or to demonstrate various fonts of a typeface without meaningful text that could be distracting.
            </p>
            <hr>
        </div>
        -->
    </div>
    <div class = "delete-container">
        <button class = "delete-button">Delete History</button>
    </div>
</div>

<!-- Hamburger Menu Icon -->
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
<script>
    const historyContainer = document.querySelector(".history-container");
    const deleteButton = document.querySelector(".delete-button");
    
    fetch('get_journal_entries.php')
        .then(response => response.json())
        .then(data =>{
            data.forEach(entry =>{
                const formattedDate = formatDate(entry.Date);
                const entryElement = document.createElement('div');
                entryElement.classList.add('chat-log');
                entryElement.innerHTML = `<h2>${formattedDate}</h2><p>${entry.Summary}</p><hr>`;
                historyContainer.appendChild(entryElement);
            });
        })
        .catch(error => {
        console.error('Error fetching journal entries:', error);
        });
    
    function formatDate(dateString) {
        const date = new Date(dateString);
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        
        // Get the day with a suffix (st, nd, rd, th)
        const day = date.getDate();
        const suffix = (day % 10 === 1 && day !== 11) ? 'st' :
                      (day % 10 === 2 && day !== 12) ? 'nd' :
                      (day % 10 === 3 && day !== 13) ? 'rd' : 'th';
    
        return `${date.toLocaleDateString('en-US', options).replace(day, day + suffix)}`;
    }
    deleteButton.onclick = function(){
        fetch('delete_journal_entries.php', {
        method: 'POST' 
        })
        .then(response => response.json())  
        .then(data => {
            if (data.success) {
                alert('Journal entries deleted successfully!');
            } else {
                alert('Error deleting entries');
            }
        })
        historyContainer.innerHTML = " ";
    }
    
</script>



</body>
</html>