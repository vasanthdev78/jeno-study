<?php
session_start();
include("db/dbConnection.php");

if (isset($_REQUEST['logout'])) {
    session_destroy();
    header("Location: logout.php");
}

if (isset($_POST['username']) && isset($_POST['username']) != '') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $role = htmlspecialchars($_POST['role']);

    $stmt = mysqli_prepare($conn, "SELECT * FROM admin_tbl WHERE username = ? AND pass = ? AND role = ?");
    mysqli_stmt_bind_param($stmt, "sss", $username, $password,$role);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($res)) {
        $_SESSION['user']   = $row['name'];
        $_SESSION['userId'] = $row['user_id'];
        $_SESSION['role']   = $row['role'];
        $_SESSION['message_type'] = "success"; // You can use this to style the message
        header("Location: dashboard.php");
    } else {
        $_SESSION['message'] = "Invalid username or password.";
        $_SESSION['message_type'] = "error";
        header("Location: index.php");
    }
    }
?>
