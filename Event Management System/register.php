<html>
    <head>
<title>

</title>
    </head>

<body>

<?php
require_one('dbconnect.php');

$user_name = $_POST['register_name'];
$user_address = $_POST['register_address'];
$user_email = $_POST['register_email']
$user_password = $_POST['register_password']

$sql = "INSERT INTO users(register_name, register_address, register_email, register_password) VALUES ($user_name, $user_address, $user_email, $user_password)"

?>
</body>