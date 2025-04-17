<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = false; 
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ELI Chatbot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            box-sizing: border-box;
            margin:0;
        }

        body {
            font-family: Arial;
            margin: 0;
            height: 100vh;
            box-sizing: border-box;
        }
        
        #ELI_name{
            margin-bottom: 5px;
        }
        
        /* top bar */
        .top_bar {
            position: relative;
            z-index: 1001;
            height:5%;
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


        h1 {
            color: #03af5e;
            font-size: 55px;
            word-wrap:break-word;
            width:auto;
        }
        .left-container-message{
            font-size: 1.5rem;
        }

        
        
        input[type="text"] {
            width: 90%;
            padding: 10px;
            box-sizing: border-box;
            font-size: 16px;
            border: 1px solid gray;
            border-radius: 5px;
            outline: none;
            position: relative;
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
        #send-btn {
            background: none;
            border: none;
            cursor: pointer;
        }
        
        /* CSS styles for the chatbot interface */
        #chat-container {
            width: 100%;
            height: 80%;
            overflow-y: scroll;
            padding: 10px;
            display:flex;
            flex-direction: column;
            
        }
        
        
        .left-container{
            flex: 1; 
            display: none; 
            justify-content: center; 
            align-items: center;
            flex-direction: column;
            padding-left:70px;
            padding-right:70px;
            box-sizing:border-box;
            
            
        }
        .journal_container{
            
            border-left: 1px solid #ccc;
            
            height:100%;
            width:100%;
            box-sizing:border-box;
            padding-left:70px;
            padding-right:70px;
            padding-top:20px;
            padding-bottom:20px;
            
            
        }
        
        
        
        .message {
            margin-bottom: 10px;
            display: flex;
        }
    
        /*user response box*/
        .user {
            font-family: "Inter", sans-serif;;
            font-weight: normal;
            color: #000000;
            border: 1px #D9D9D9;
            background-color: #D9D9D9;
            border-radius: 30px;
            padding: 15px 20px;
            display: inline-block;
            max-width: 70%; 
            word-wrap: break-word;
            margin-left: auto;
            text-align: left;
            line-height: 1.5;
        }

        .bot {
            font-family: "Inter", sans-serif;;
            font-weight: normal;
            color: #000000;
            padding: 15px 20px;
            display: inline-block;
            max-width: 70%; 
            word-wrap: break-word;
            margin-right:auto;
            text-align: left;
            line-height:1.5;
        }
        .left-container h1{
            color: #03AF5E;
            font-family: "Inter", sans-serif;;
            font-weight: normal;
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
        
        @media (max-width: 1100px) {
            h1 {
                font-size: 2em; /* Smaller size for small screens */
            }
        }
        @media (max-width: 750px) {
            h1 {
                font-size: 1.5em; /* Smaller size for small screens */
            }
            .journal_container{
                padding-left:10px;
                padding-right:10px;
                padding-bottom:5px;
            }
            .left-container{
                padding-left:10px;
                padding-right:10px;
                padding-bottom:5px;
            }
        }
         @media (max-width: 850px) {
            .left-container {
                display:none;
            }
        }
        
        .content-wrapper {
            animation: fadeInSlideUp 1s ease-out;
            height:95%;
        }
        
        /* Input wrapper */
        .input-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            box-sizing: border-box;
            margin-top:10px;
            
        }
        
        .generate-entry-container{
            width:20%;
            background-color:#03af5e;
            color:white;
            cursor:pointer;
            padding: 15px;
            box-sizing: border-box;
            border-radius: 5px;
            outline: none;
            border:none;
            font-size:1em;
            font-weight: 600;
        }
        
        
    </style>
</head>

<body>
    <div class="top_bar">
        <div class="Logo">
            <a href="homepage.php"><img src="images/ELI-Logo.png" alt="ELI Logo" width="50"></a>
            <a href="homepage.php"><img src="images/ELI_LOGO_NAME.png" id= "ELI_name" alt="ELI Logo" width="50"></a>
        </div>
    
        <div class="top_right">
            <a href="homepage.php">Journal</a>
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
    
    <div class= "content-wrapper" style="display: flex;">
        
        <!-- left-container-->
        <div class="left-container">
            <h1 style = "margin-bottom :10px; color:#2A4D14; font-size: 40px; font-weight: 600;">Summary </h1>
            <h1 class = "left-container-message"></h1>
        </div>
    
        <!-- Journal Container -->
        <div class="journal_container" style="flex: 1;">
            <h1 style="text-align: center; font-size: 40px;"; >Journal</h1>
            <br>
            <div id="chat-container">
                <!--<div class = "message user">hello</div>-->
                <!--<div class = "message bot">welcome sir very nice to meet you how can i help you today</div>-->
                <!--<div class = "message user">hello i want a jounraling applicainot that can help with creating my journal entrieshello i want a jounraling applicainot that can help with creating my journal entrie</div>-->
                <!--<div class = "message bot">welcome</div>-->
                <!--<div class = "message user">life</div>-->
                <!--<div class = "message bot">welcome</div>-->
                <!--<div class = "message user">hello</div>-->
                <!--<div class = "message bot">welcome</div>-->
                <!--<div class = "message user">hello</div>-->
                <!--<div class = "message bot">welcome</div>-->
                <!--<div class = "message user">hello</div>-->
                <!--<div class = "message bot">welcome</div>-->
            </div>
            <div class="input-wrapper">
                <input type="text" id="user-input" placeholder="Type your message..." />
                <button id="send-btn">
                    <img src="images/submiticon.png" alt="Submit Icon" width="25">
                </button>
                <button class = "generate-entry-container">
                    Summary
                </button>
            </div>
        </div>

    </div>

    <script>
    const chatContainer = document.getElementById('chat-container');
    const userInput = document.getElementById('user-input');
    const sendBtn = document.getElementById('send-btn');
    const containerMessage = document.querySelector('.left-container-message');
    const left_container = document.querySelector('.left-container');
    const generateEntryButton = document.querySelector('.generate-entry-container');

    let storedInput = localStorage.getItem("userInput");
    if(storedInput){
        userInput.value = storedInput;
        sendMessage();
    }
    
    localStorage.removeItem("userInput");
    
    sendBtn.addEventListener('click', sendMessage);
    userInput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            sendMessage();
        }
    });

    function sendMessage() {
        const userMessage = userInput.value.trim();
        if (userMessage) {
            displayMessage('user', userMessage);
            sendMessageToServer(userMessage);
            userInput.value = '';
        }
    }

    function displayMessage(sender, message) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('message', sender);
        messageElement.textContent = message;
        
        if (message.toLowerCase().startsWith("journal entry") && sender == 'bot') {
            fetch("save_journal_entries.php",{
                method: "POST",
                headers:{
                    "Content-Type":"application/json",
                },
                body: JSON.stringify({summary:message}),
                
            })
            .then(response => response.text())
            .then(data => console.log("Journal saved:", data))
            .catch(error => console.error("Error saving journal:", error));
            
            left_container.style.display = "flex";
            containerMessage.textContent = message;
        }   
        
        
        //if (sender === 'bot') {
         //   left-container.style.display = "block";
         //   containerMessage.textContent = message;
        //}

        chatContainer.appendChild(messageElement);
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    function sendMessageToServer(message) {
        fetch('chatbot.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ question: message }),
        })
        .then((response) => response.json())
        .then((data) => {
            displayMessage('bot', data.response);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
    
    generateEntryButton.onclick = function(){
        sendMessageToServer("Please generate my journale entry");
    }
</script>
</body>
</html>