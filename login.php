
<?php
session_start();
if (isset($_SESSION['ur_id']) != '') {
    // User is not logged in, redirect to login page
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link rel="stylesheet" href="css/singnup.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
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
            <form action="act_login.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username..." required style="background-color: rgb(212, 212, 212);">
                
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Enter password..." required style="background-color: rgb(212, 212, 212);">
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

</body>
</html>
