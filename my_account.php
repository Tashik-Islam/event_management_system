<?php
require_once('dbconnect.php');
session_start();
require_once('dbconnect.php');
if(!isset($_SESSION["login_sess"])) 
{
    header("location:account.php"); 
}

$account_id = $_SESSION["account_id"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE account_id= '$account_id'");

if($res = mysqli_fetch_array($findresult))
{
    $account_id = $res['account_id']; 
    $name = $res['name'];   
    $address = $res['address'];  
    $email = $res['email'];  
    $image= $res['image'];
}

?> 

 <!DOCTYPE html>
<html>
<head>
    <title> My Account </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            
        </div>
        <div class="col-sm-6">
  <div class="login_form">
   <br> 
     
          <div class="row">
            <div class="col-3"></div>
           <div class="col-6"> 
             <?php if(isset($_GET['profile_updated'])) 
      { ?>
    <div class="successmsg">Profile saved ..</div>
      <?php } ?>
        <?php if(isset($_GET['password_updated'])) 
      { ?>
    <div class="successmsg">Password has been changed...</div>
      <?php } ?>
            <center>
            <?php if($image==NULL)
                {
                 echo '<img src="https://technosmarter.com/assets/icon/user.png">';
                } else { echo '<img src="images/'.$image.'" style="height:80px;width:auto;border-radius:50%;">';}?> 

  <p> Welcome! <span style="color:#33CC00"><?php echo $name; ?></span> </p>
  </center>
           </div>
           
         </div>
          </div>

          <table class="table">
          <tr>
              <th>Name </th>
              <td><?php echo $name; ?></td>
          </tr>
          <tr>
              <th>Address </th>
              <td><?php echo $address; ?></td>
          </tr>
          <tr>
              <th>account_id </th>
              <td><?php echo $account_id; ?></td>
          </tr>
           <tr>
              <th>Email </th>
              <td><?php echo $email; ?></td>
          </tr>
          </table>
           <div class="row">
            <div class="col-sm-2">
            </div>
             <div class="col-sm-4">
                <a href="edit_account.php"><button type="button" class="btn btn-primary">Edit Profile</button></a>
            </div>
            <div class="col-sm-6">
         <a href="index.php"><button type="button" class="btn btn-warning">Back</button></a>
            </div>
           </div>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div> 
</body>