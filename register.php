<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ELI - Register</title>
  <style>
    /* Reset & Base Styles */
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

    #consentText {
      font-weight: 400;
      color: #2A4D14;
    }

    .message {
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #FFDDC1;
      color: #2A4D14;
      font-size: 15px;
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
      from { opacity: 0; transform: translateX(-50%) translateY(-20px); }
      to { opacity: 1; transform: translateX(-50%) translateY(0); }
    }

    .left_Corner {
      position: absolute;
      top: 10px;
      left: 10px;
      width: 75px;
    }

    .container {
      display: flex;
      width: 100%;
      height: 100%;
      background: #f0f0f0;
      border-radius: 10px;
      overflow: hidden;
    }

    .form-container {
      width: 50%;
      padding: 30px;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      background: #e0e0e0;
    }

    .title-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    p {
      font-size: 14px;
      font-weight: 400;
      color: #C0C0C0;
      text-align: center;
      margin-top: 10px;
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
      padding-bottom: 20px;
    }

    h3 {
      text-align: center;
      font-size: 28px;
      color: #2A4D14;
    }

    h4 {
      text-align: center;
      color: gray;
    }

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

    a {
      color: #03af5e;
      text-decoration: none;
      font-weight: bold;
    }

    .google-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #4285F4;
      padding: 5px;
      width: 100%;
      border-radius: 5px;
      color: white;
      cursor: pointer;
      margin-top: 10px;
      font-size: 16px;
      font-weight: 600;
    }

    .google-btn img {
      width: 15px;
      margin-right: 5px;
    }

    .google-btn span {
      text-align: center;
      flex-grow: 1;
    }

    .google-btn:hover {
      background-color: #357AE8;
    }

    .slideshow-container {
      width: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #D8E2DC;
    }

    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fade {
      from { opacity: 0.7 }
      to { opacity: 1 }
    }

    @media screen and (max-width: 800px) {
      .image-container, .slideshow-container {
        display: none;
      }
      .form-container {
        width: 100vw;
      }
      .login-container {
        width: 75%;
      }
    }

    @media screen and (max-width: 600px) {
      .form-container, .login-container {
        width: 100%;
      }
    }

    /* Popup Overlay */
    .popup-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(211, 211, 211, 0.8);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .popup-content {
      background-color: lightgray;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      max-width: 400px;
      text-align: center;
      position: relative;
    }
    
    .popup-content p{
        color: #2A4D14;
    }
    
    .popup-content h2{
        color: #03af5e;
        font-weight: bold;
        text-align: center;
        font-size: 24px;
    }
    
    .popup-content h3{ 
        color: #03af5e;
        font-weight: bold;
        text-align: left;
        font-size: 16px;
    }
    
    .message-container{
        background-color: white;
        width: 95%;
        height: 85%;
        justify-content: center;
        text-align: center;
        padding: 5px;
    }

    #acceptPopup, #declinePopup,
    #acceptSecondPopup, #declineSecondPopup {
      flex: 1;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    #acceptPopup, #acceptSecondPopup {
      background: #03af5e;
      color: white;
    }

    #acceptPopup:hover, #acceptSecondPopup:hover {
      background-color: #028c4a;
    }

    #declinePopup, #declineSecondPopup {
      background: white;
      color: #03af5e;
    }

    #declinePopup:hover, #declineSecondPopup:hover {
      background-color: #bbb;
    }
  </style>
</head>
<body>

  <?php
  if (isset($_SESSION['message'])) {
    echo '<div class="message">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
  }
  ?>

  <div class="left_Corner">
    <img src="images/Feil_490_Complete_Logo_RGB.png" alt="ELI Logo" width="50">
  </div>

  <div class="container">
    <!-- Left Side -->
    <div class="form-container">
      <div class="title-container">
        <img src="images/ELI_LOGO_NAME.png" alt="ELI Logo" width="175">
      </div>
      <h2>"More than a journal..."</h2>
      <br>
      <div class="login-container">
        <h3>Sign Up</h3>
        <br>
        <form action="handle_register.php" method="POST">
          <div class="input-box"><input type="text" name="f_name" placeholder="First Name" required></div>
          <div class="input-box"><input type="text" name="l_name" placeholder="Last Name" required></div>
          <div class="input-box"><input type="text" name="email" placeholder="Email" required></div>
          <div class="input-box"><input type="password" name="password" placeholder="Password" required></div>
          <button type="button" id="startConsent">Sign Up</button>
        </form>

        <p>OR</p>
        <div class="google-btn">
          <img src="images/google.png" alt="Google Logo">
          <span>Sign up with Google</span>
        </div>
      </div>
    </div>

    <!-- Right Side -->
    <div class="slideshow-container">
      <div class="mySlides fade"><img src="images/slideshow/ELI_Slide1_Words.png" style="width:100%"></div>
      <div class="mySlides fade"><img src="images/slideshow/ELI_Slide2_Words.png" style="width:100%"></div>
      <div class="mySlides fade"><img src="images/slideshow/ELI_Slide3_Words.png" style="width:100%"></div>
      <div class="mySlides fade"><img src="images/slideshow/ELI_Slide4_Words.png" style="width:100%"></div>
    </div>
  </div>

  <!-- First Popup (Terms & Conditions) -->
  <div id="customPopup" class="popup-overlay">
    <div class="popup-content">
        <h2>Terms and Conditions</h2>
        <div class="message-container">
            <h3>Introduction (1/5)</h3>
            <br>
      <p>Thank you for using our journaling platform! to provide you with a seamless experience, we request your consent to temporarily store your journal entries. 
      <br><br>
         Please read the following terms carefully before giving your consent. By agreeing to this consent form, you acknoledge that...
      </p>
      </div>
      <div style="margin-top: 20px; display: flex; justify-content: space-between; gap: 10px;">
        <button id="declinePopup">Decline</button>
        <button id="acceptPopup">Accept</button>
      </div>
    </div>
  </div>

  <!-- Second Popup (Privacy Policy) -->
  <div id="secondPopup" class="popup-overlay">
    <div class="popup-content">
        <h2>Terms and Conditions</h2>
        <div class="message-container">
            <h3>Data Storage & Retention (2/5)</h3>
            <br>
      <p>- Your journal entries will be stored securly on our severs for a period of 14 days(2 weeks) from the date of entry.
      <br>- After the 14-day period, your entires are permantly deleted and can't be recoverd.
      </p>
      </div>
      <div style="margin-top: 20px; display: flex; justify-content: space-between; gap: 10px;">
        <button id="declineSecondPopup">Decline</button>
        <button id="acceptSecondPopup">Accept</button>
      </div>
    </div>
  </div>
  
  <!-- Third Popup (User Responsibility) -->
<div id="thirdPopup" class="popup-overlay">
  <div class="popup-content">
        <h2>Terms and Conditions</h2>
        <div class="message-container">
        <h3>Data Privacy & Access (3/5)</h3>
        <br>
    <p>- Your journal entries are private and can only be accessed by you through your account.
    <br> 
       - We do not sell, share, or disclose your data to any third parties.
    <br>
       - No staff or third-party service providers will have access to your stored journal entires.
    </p>
        </div>
    <div style="margin-top: 20px; display: flex; justify-content: space-between; gap: 10px;">
      <button id="declineThirdPopup">Decline</button>
      <button id="acceptThirdPopup">Accept</button>
    </div>
  </div>
</div>

<!-- Fourth Popup (Data Usage) -->
<div id="fourthPopup" class="popup-overlay">
  <div class="popup-content">
        <h2>Terms and Conditions</h2>
        <div class="message-container">
        <h3>User Rights & Withdrawl of Consent (4/5)</h3>
    <p>- You have the right to delete your journal entries at any time before the 14-day rentention period expires.
    <br> 
       - If you wish to withdraw your consent, you may do so by deleting your account or contacting us at loremipsum@email.com Upon withdrawl, all stored entries will be deleted immediately.</p>
        </div>
    <div style="margin-top: 20px; display: flex; justify-content: space-between; gap: 10px;">
      <button id="declineFourthPopup">Decline</button>
      <button id="acceptFourthPopup">Accept</button>
    </div>
  </div>
</div>

<!-- Fifth Popup (Email Updates) -->
<div id="fifthPopup" class="popup-overlay">
  <div class="popup-content"
        <h2>Terms and Conditions</h2>
        <div class="message-container">
        <h3>Agreement & Consent (5/5)</h3>
    <p>By clicking "Accept" below, you confirm that you have read, understood, and agreed to the terms of this consent form regarding the storage of your journal entries.</p>
        </div>
    <div style="margin-top: 20px; display: flex; justify-content: space-between; gap: 10px;">
      <button id="declineFifthPopup">No</button>
      <button id="acceptFifthPopup">Yes</button>
    </div>
  </div>
</div>

  <!-- Scripts -->
  <script>
    let slideIndex = 0;
    function showSlidesAuto() {
      let slides = document.getElementsByClassName("mySlides");
      for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) { slideIndex = 1; }
      slides[slideIndex - 1].style.display = "block";
      setTimeout(showSlidesAuto, 4000);
    }
    showSlidesAuto();

    const firstPopup = document.getElementById("customPopup");
    const secondPopup = document.getElementById("secondPopup");
    const thirdPopup = document.getElementById("thirdPopup");
    const fourthPopup = document.getElementById("fourthPopup");
    const fifthPopup = document.getElementById("fifthPopup");
    const form = document.querySelector("form");

    document.getElementById("startConsent").addEventListener("click", () => {
      firstPopup.style.display = "flex";
    });

    document.getElementById("declinePopup").addEventListener("click", () => {
      firstPopup.style.display = "none";
    });

    document.getElementById("acceptPopup").addEventListener("click", () => {
      firstPopup.style.display = "none";
      secondPopup.style.display = "flex";
    });

    document.getElementById("declineSecondPopup").addEventListener("click", () => {
      secondPopup.style.display = "none";
    });

document.getElementById("acceptSecondPopup").addEventListener("click", () => {
  secondPopup.style.display = "none";
  thirdPopup.style.display = "flex"; 
});
    
  document.getElementById("declineThirdPopup").addEventListener("click", () => {
    thirdPopup.style.display = "none";
  });

  document.getElementById("acceptThirdPopup").addEventListener("click", () => {
    thirdPopup.style.display = "none";
    fourthPopup.style.display = "flex";
  });

  document.getElementById("declineFourthPopup").addEventListener("click", () => {
    fourthPopup.style.display = "none";
  });

  document.getElementById("acceptFourthPopup").addEventListener("click", () => {
    fourthPopup.style.display = "none";
    fifthPopup.style.display = "flex";
  });

  document.getElementById("declineFifthPopup").addEventListener("click", () => {
    fifthPopup.style.display = "none";
    alert("You must accept all Terms and Conditions to register.");
  });

  document.getElementById("acceptFifthPopup").addEventListener("click", () => {
    fifthPopup.style.display = "none";
    form.submit();
  });
  

  </script>

</body>
</html>