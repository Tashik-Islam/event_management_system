
<?php
$servername='localhost';
$username= 'root';
$password="";
$dbname="eventManage";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error){
  die("Connection failed: " . mysqli_connect_error());
}

$Name =  $_REQUEST['register_name'];
$Email = $_REQUEST['register_email'];
$Password =  $_REQUEST['register_password'];
$Address= $_REQUEST['register_address'];

$sql = "INSERT INTO users (name,address,email,password)
VALUES ('$Name','$Address','$Email', '$Password')";



// $result = mysqli_query($conn, "SELECT account_id FROM users WHERE name = '$Name'");
// $row = mysqli_fetch_assoc($result);
// $id = $row['account_id'];


if (mysqli_query($conn, $sql)) {
    
    
    echo '<script type="text/javascript">';
    
    echo "alert('Registration Successful!. Go back to the login page');";



    
     echo '</script>';
    






} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>