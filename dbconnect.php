<?php
$servername='localhost';
$username= 'root';
$password="";
$dbname="eventManage";
$dbc= mysqli_connect($servername, $username, $password, $dbname);

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error){
die("connection falied: ". $conn->connect_error);
}
else{
  mysqli_select_db($conn,$dbname);
}

?>