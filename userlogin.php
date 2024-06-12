<?php
require_once('dbconnect.php');

session_start();

if ((isset($_POST['email']) && isset($_POST['password'] ))){
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION["login_sess"] = "1"; 
        $_SESSION["account_id"] = $row['account_id'];
        header("Location: index.php");
    } else {
        echo 'Password is wrong';
    }
}


?>