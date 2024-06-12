<?php
require_once('dbconnect.php');
session_start();

if ((isset($_POST['account_id']) && isset($_POST['password'] ))){
    $account_id = $_POST['account_id'];
    $password = $_POST['password'];
    

    $stmt = mysqli_prepare($conn, "SELECT * FROM order_catering  WHERE account_id=? AND password =?");
    mysqli_stmt_bind_param($stmt, "ss", $account_id, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION["login_sess"] = "1"; 
        $_SESSION["account_id"] = $row['account_id'];
        header("Location: Sp_home.php");
    } else {
        echo 'Password is wrong';
    }
}


?>