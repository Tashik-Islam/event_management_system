<?php
require_once('dbconnect.php');

if ((isset($_POST['account_id']) && isset($_POST['password'] ))){
  $i= $_POST['account_id'];
  $p= $_POST['password'];
  $sql= "select * FROM eventManage WHERE account_id='$i' and password='$p'";
  $result= mysqli_query($conn,$sql);
  

  if (mysqli_num_rows ($result) !=0){
    header("Location: index.php");
  }
  else{
    echo 'User ID or Password is wrong. please try action';
  }
}

?>

