<?php
    session_start();
    if(isset($_SESSION['user']) && $_SESSION['user'] != '')
    {
        header("Location:dashboard.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>JENO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        
        <!-- Theme Config Js -->
        <script src="assets/js/config.js"></script>

        <!-- App css -->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <style>
            
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Poppins';
    }
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f4f4;
    }
    .container {
    display: flex;
    width: 80%;
    max-width: 1200px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 20px;
    }
    .left, .right {
    flex: 1;
    padding: 40px;
   
    }
    .left {
    background-color: #fff;
    }
    .header {
    display: flex;
    justify-content: flex-start;
    margin-bottom: 40px;
    }
    .login-tab {
    background: linear-gradient(90deg, #ae43ef, #d78bfd);
    color: #fff;
    border: none;
    padding: 10px 20px ;
    border-radius: 20px ;
    font-size: 19px;
    cursor: pointer;
    

    }
    .login-tab:hover {
        background: linear-gradient(90deg, #d78bfd, #ae43ef);
    }

    .welcome-message {
    text-align: center;
    }
    .welcome-message h1 {
    font-size: 36px;
    color: #333;
    margin-bottom: 10px;
    }
    .welcome-message p {
    font-size: 18px;
    color: #d78bfd;
    margin-bottom: 28px;
    font-size: 16px;
    }
    .login-form {
    text-align: center;
    }
    .login-form h2 {
    font-size: 15px;
    margin-bottom: 20px;
    font-weight:normal;
    
    }
    form {
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 300px;
    margin: 0 auto;
    }
    label {
    font-size: 14px;
    color: #666;
    text-align: left;
    margin-bottom: 5px;
    }
  
    input[type="text"], input[type="password"], select {
    width: 100%;
    max-width: 300px;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    }
    .password-container {
    position: relative;
    width: 100%;
    max-width: 300px;
    }
    .password-container .show-password {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    }
    
    button[type="submit"] {
    background-color: #ae43ef;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    max-width: 300px;
    }

    .right {
    background: linear-gradient(90deg, #ae43ef, #d78bfd);
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 10px;

    }
    .image-container h1 {
    font-size: 66px;
    margin-bottom: 10px;
    letter-spacing: 10px;

    }
    .image-container p {
    font-size: 18px;
    margin-bottom: 20px;
    letter-spacing: 2px;
    }
    .image-container img {
    width: 100%;
    max-width: 400px;
    height: auto;
    zoom: 4;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
            zoom: 0;
        }
        .image-container h1 {
            font-size: 36px;
        }
        .image-container p {
            font-size: 16px;
        }
    }
        </style>
    </head>
    
    <body class="authentication-bg position-relative">
 
    <div class="container">
    <div class="left">
        <div class="header">
            <button class="login-tab">Login</button>
        </div>
        <div class="welcome-message">
            <h1>Welcome Back!</h1>
            <p>Glad to see you again</p>
        </div>
        <div class="login-form">
            <h2>Login With Your Account Below</h2>
            <form action="actLogin.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username..." required>
                
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Enter password..." required>
                    <span class="show-password"><i class='bx bx-show'></i></span>
                </div>

                <label for="privilege">Privilege</label>
                <select id="privilege" name="role">
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                </select>
                
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <div class="right">
        <div class="image-container">
            <h1>JENO</h1>
            <p><b>EDUCATIONAL ORGANIZATION</b></p>
            <img src="assets/images/logo/Lock1.png" alt="Illustration">
        </div>
    </div>
    </div>



        <footer class="footer footer-alt fw-medium">
            <span class="bg-body"><script>document.write(new Date().getFullYear())</script> © RORIRI SOFTWARE SOLUTIONS PVT. LTD.</span>
        </footer>
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>
</html>
