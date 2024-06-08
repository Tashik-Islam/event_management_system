<?php
$servername='localhost';
$username= 'root';
$password="";
$dbname="eventManage";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error){
die("connection falied: ". $conn->connect_error);
}
else{
  mysqli_select_db($conn,$dbname);
}

?>