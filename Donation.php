<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Donations</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }
      #ELI_name{
            margin-bottom: 5px;
        }
    /* Top Bar */
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

    .top_right a:hover,
    .top_right a:active {
      text-decoration: underline;
    }

    /* Profile */
    .profile-container {
      position: absolute;
      top: 10px;
      right: 10px;
      z-index: 1000;
    }

    .profile-icon {
      cursor: pointer;
      display: inline-block;
    }

    .dropdown-menu {
      position: absolute;
      top: 40px;
      right: 0;
      background: white;
      width: 150px;
      border-radius: 5px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      opacity: 0;
      visibility: hidden;
      transform: translateY(-10px);
      transition: opacity 0.3s ease, transform 0.2s ease;
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

    /* Hamburger (Mobile Nav) */
    .hamburger,
    .hamburger-icon,
    .mobile-menu {
      display: none;
    }

    .submit-icon {
      background: transparent;
      border: none;
      cursor: pointer;
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
    }

    h1 {
      text-align: center;
      color: #03af5e;
    }

    h2 {
      color: #2A4D14;
      margin-left: 50px;
    }

    .donation-wrapper {
      display: flex;
      justify-content: center;
    }

    .donation {
      position: relative;
      width: 100%;
      max-width: 800px;
      height: 450px;
      background-color: lightgray;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .radio-options {
      display: flex;
      gap: 20px;
      margin-left: 45px;
      margin-bottom: 10px;
      font-size: 16px;
    }

    .quick-buttons {
      display: flex;
      justify-content: space-around;
      gap: 15px;
      width: 100%;
      margin-bottom: 15px;
    }

    .square-btn {
      width: 80px;
      height: 40px;
      padding: 10px;
      font-size: 16px;
      background-color: white;
      color: black;
      border: 1px solid #03af5e;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .square-btn:hover {
      background-color: #028d46;
      color: white;
    }

    .square-btn.selected {
      background-color: #03af5e;
      color: white;
      border: 2px solid #028d46;
    }

    .input-field {
      width: 60%;
      padding: 10px;
      font-size: 16px;
      margin-top: 10px;
      margin-left: 50px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .pay-btn {
      background-color: #03af5e;
      color: white;
      margin: 20px auto 0 50px;
      width: 85%;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      display: block;
    }

    .pay-btn:hover {
      background-color: #028d46;
    }

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

    .modal p1 {
      color: #2A4D14;
      font-size: 28px;
      font-weight: bold;
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

    /* Media Queries */
    @media screen and (max-width: 1300px) {
      .hamburger,
      .hamburger-icon {
        display: block;
        position: absolute;
        top: 40px;
        left: 5px;
        z-index: 1002;
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
        transform: translateY(-10px);
        transition: opacity 0.3s ease, transform 0.2s ease;
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

      .donation-wrapper {
        padding: 10px;
      }

      .donation {
        height: auto;
        padding: 15px;
      }

      h1 {
        font-size: 24px;
      }

      h2 {
        margin-left: 0;
        font-size: 20px;
        text-align: center;
      }

      .radio-options {
        flex-direction: column;
        align-items: flex-start;
        width: 90%;
        margin: 0 auto 15px;
        gap: 10px;
        font-size: 14px;
      }

      .quick-buttons {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        width: 90%;
        margin: 10px auto;
      }

      .square-btn {
        width: 100%;
      }

      .input-field,
      .pay-btn {
        width: 90%;
        margin: 10px auto;
        display: block;
      }

      .submit-icon {
        display: none;
      }
    }
  </style>
</head>
<body>

  <!-- Top Bar -->
  <div class="top_bar">
    <div class="Logo">
      <a href="homepage.php"><img src="images/ELI-Logo.png" alt="ELI Logo" width="50" /></a>
      <a href="homepage.php"><img src="images/ELI_LOGO_NAME.png" alt="ELI Logo" id= "ELI_name" width="50" /></a>
    </div>

    <div class="top_right">
      <a href="chat.php">Journal</a>
      <a href="history.php">History</a>
      <a href="Donation.php">Donation</a>
      <a href="contact.php">Contact</a>
    </div>

    <div class="profile-container">
      <div class="profile-icon"><img src="images/icon.png" alt="icon" width="30" /></div>
      <div class="dropdown-menu">
        <a href="profile.php">Profile</a>
        <a href="login.php">Logout</a>
      </div>
    </div>
  </div>

  <!-- Hamburger Menu -->
  <div class="hamburger">
    <div class="hamburger-icon">
      <img src="images/hamburger-icon.webp" alt="hamburger-icon" width="40" />
    </div>
    <div class="mobile-menu">
      <a href="chat.php">Journal</a>
      <a href="History.php">History</a>
      <a href="Donation.php">Donation</a>
      <a href="contact.php">Contact</a>
    </div>
  </div>

  <h1>Donations</h1>

  <div class="donation-wrapper">
    <div class="donation">
      <h2>Contribute</h2>
      <form onsubmit="event.preventDefault(); showConfirmation();">
        <div class="radio-options">
          <label><input type="radio" name="donation" value="10"> One Time</label>
          <label><input type="radio" name="donation" value="25"> Monthly</label>
        </div>

        <div class="quick-buttons">
          <button type="button" class="square-btn">$5</button>
          <button type="button" class="square-btn">$10</button>
          <button type="button" class="square-btn">$15</button>
          <button type="button" class="square-btn">$20</button>
        </div>

        <input class="input-field" type="text" name="amount" placeholder="$ Custom Amount" />
        <button class="pay-btn" type="submit">Pay</button>
      </form>
    </div>
  </div>

  <!-- Modal -->
  <div id="confirmationModal" class="modal">
    <div class="modal-content">
      <br><br>
      <p1>Payment Successful!</p1>
      <br><br>
      <button onclick="closeModal()">Close</button>
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

    function showConfirmation() {
      const modal = document.getElementById("confirmationModal");
      modal.style.display = "flex";
    }

    function closeModal() {
      window.location.href = "homepage.php";
    }

    window.onclick = function (event) {
      const modal = document.getElementById("confirmationModal");
      if (event.target === modal) {
        window.location.href = "homepage.php";
      }
    }

    const buttons = document.querySelectorAll('.square-btn');
    buttons.forEach(button => {
      button.addEventListener('click', () => {
        buttons.forEach(btn => btn.classList.remove('selected'));
        button.classList.add('selected');
      });
    });
  </script>

</body>
</html>