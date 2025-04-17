
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            margin: 0;
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
            position: absolute;
            top: 5px;
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

        .page-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
    text-align: center;
}

.contact-title {
    font-size: 48px;
    margin-bottom: 30px;
    color: #03af5e;
}

.contact-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    background-color: lightgray; 
    border: 1px solid #03af5e; 
    border-radius: 10px;
    padding: 40px;
    max-width: 575px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
}

        form {
            display: flex;
            flex-direction: column;
        }

        input, textarea {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 16px;
            font-family: 'Noto Sans', sans-serif;
            font-weight: normal;
            color: #333;
            min-width: 500px;
        }

        input::placeholder,
        textarea::placeholder {
            font-family: Arial, sans-serif;
            font-weight: normal;
            color: #C0C0C0;
        }

        textarea {
            resize: vertical;
            min-height: 200px;
        }

        button {
            background-color: #03af5e;
            color: white;
            border: none;
            padding: 12px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #A5A58D;
        }

        /* Custom Popup Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: lightgray;
            border: 2px solid #03af5e; 
            border-radius: 8px;
            text-align: center;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

.modal h2 {
    text-align: center;
    color: #2A4D14;
    margin-top: 40px;
    margin-bottom: 30px;
    font-size: 36px
}

        .modal p {
            color: #555;
            margin-bottom: 30px;
        }

        .modal button {
            background-color: #03af5e;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 30px;
        }

        .modal button:hover {
            background-color: #A5A58D;
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

            input, textarea {
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
        <a href="homepage.php"><img src="images/ELI_LOGO_NAME.png" alt="ELI Logo" width="50"></a>
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

    <div class="page-wrapper">
        <h1 class="contact-title">Contact Us</h1>
        <div class="contact-container">
            <form onsubmit="event.preventDefault(); showConfirmation();">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Comments" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Custom Popup Modal -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <h2>Email Sent!</h2>
            <p>We'll get back to you soon.</p>
            <button onclick="closeModal()">Close</button>
        </div>
    </div>
    
<script>
    function showConfirmation() {
        const modal = document.getElementById("confirmationModal");
        modal.style.display = "flex"; // Show modal as flex to center it
    }

    function closeModal() {
        window.location.href = "homepage.php"; // Redirect to homepage
    }

    window.onclick = function(event) {
        const modal = document.getElementById("confirmationModal");
        if (event.target === modal) {
            window.location.href = "homepage.php"; // Also redirect if clicking outside
        }
    }
</script>
</body>
</html>