<?php 
require_once('dbconnect.php');
session_start();
require_once('dbconnect.php');
if(!isset($_SESSION["login_sess"])) 
{
    header("location:d_home.php"); 
}

$account_id = $_SESSION["account_id"];
$findresult = mysqli_query($dbc, "SELECT * FROM decorators  WHERE account_id= '$account_id'");

if($res = mysqli_fetch_array($findresult))
{
    $account_id = $res['account_id']; 
    $decorator_name   = $res['decorator_name'];   
    $password   = $res['password'];  
    $cost_per_sqft  = $res['cost_per_sqft'];  
    $type = $res['type'];
}
 ?> 
 <!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
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
           
     <form action="" method="POST" enctype='multipart/form-data'>
  <div class="login_form">

 <br> <br><?php 
 if(isset($_POST['update_profile'])){
 $decorator_name=$_POST['decorator_name'];
 $type=$_POST['type'];
 $cost_per_sqft =$_POST['cost_per_sqft'];
 $folder='images/';

 $file = $_FILES['image']['tmp_name'];  
$file_name = $_FILES['image']['name']; 
$file_name_array = explode(".", $file_name); 
 $extension = end($file_name_array);
 $new_image_name ='profile_'.rand() . '.' . $extension;
  if ($_FILES["image"]["size"] >1000000) {
   $error[] = 'Sorry, your image is too large. Upload less than 1 MB in size .';
 
}
 if($file != "")
  {
if($extension!= "jpg" && $extension!= "png" && $extension!= "jpeg"
&& $extension!= "gif" && $extension!= "PNG" && $extension!= "JPG" && $extension!= "GIF" && $extension!= "JPEG") {
    
   $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
}

$sql="SELECT * from decorators where account_id='$account_id'";
      $res=mysqli_query($dbc,$sql);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);

   if($oldname!=$name){
     if($name==$row['name'])
     {
           $error[] ='Username alredy Exists. Create Unique username';
          } 
   }
}
    if(!isset($error)){ 
          if($file!= "")
          {
            $stmt = mysqli_query($dbc,"SELECT image FROM  decorators WHERE account_id='$account_id'");
            $row = mysqli_fetch_array($stmt); 
            $deleteimage=$row['image'];
unlink($folder.$deleteimage);
move_uploaded_file($file, $folder . $new_image_name); 
mysqli_query($dbc,"UPDATE decorators SET image='$new_image_name' WHERE account_id='$account_id'");
          }
           $result = mysqli_query($dbc,"UPDATE decorators SET type='$type', cost_per_sqft ='$cost_per_sqft' WHERE account_id = '$account_id' ");
           if($result)
           {
       header("location:d_home.php?profile_updated=1");
           }
           else 
           {
            $error[]='Something went wrong';
           }

    }


        }    
        if(isset($error)){ 

foreach($error as $error){ 
  echo '<p class="errmsg">'.$error.'</p>'; 
}
}


        ?> 
     <form method="post" enctype='multipart/form-data' action="">
          <div class="row">
            <div class="col"></div>
           <div class="col-6"> 
            <center>
            
                <div class="form-group">
                <label>Change Image &#8595;</label>
                <input class="form-control" type="file" name="image" style="width:100%;" >
            </div>

  </center>
           </div>
            <div class="col"><p><a href="d_home.php"><span style="color:red;">Back</span> </a></p>
         </div>
          </div>

          <div class="form-group">
          <div class="row"> 
            <div class="col-3">
                <label>Type</label>
            </div>
             <div class="col">
                <input type="text" name="type" value="<?php echo $type;?>" class="form-control">
            </div>
          </div>
      </div>
      <div class="form-group">
 <div class="row"> 
            <div class="col-3">
                <label>Cost Per Square fett</label>
            </div>
             <div class="col">
                <input type="text" name="cost_per_sqft" value="<?php echo $cost_per_sqft;?>" class="form-control">
            </div>
          </div>
      </div>
      <div class="form-group">

          
      </div>
      
           <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <br>
<button  class="btn btn-success" name="update_profile">Update</button>
            </div>
           </div>
       </form>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>