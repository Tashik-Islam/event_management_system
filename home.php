<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {font-family: Arial, Helvetica, sans-serif; background-image: url('download.jpg'); background-repeat: no-repeat;
  background-size: 100%;}

.navbar {
  margin-top: 1%;
  width: 100%;
  background-color: transparent #555;
  overflow: auto;
}

.bg{height:100%}

.navbar a {
  float: left;
  padding: 10px 5px;
  color: rgb(255, 255, 255);
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  padding: 5px 5px;
  background-color: #000;
}

.active {
  background-color: #04AA6D;
}
@keyframes mymove {
  50% {text-shadow: 10px 20px 30px blue;}
}
p {
  animation: mymove 5s infinite;
  font-family: Arial, Helvetica, sans-serif;
  text-shadow: 0 0 113px #ff0000, 0 0 15px #0000ff;
  font-size: 100px;
  text-align:center;
  color: white;
  text-indent: 30px;
  margin-top: 13%;
  
  
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}

</style>
<body>




<div class="navbar">
  <a href="home.php"><h4><i class="fa fa-fw fa-home"></i> Home</h4></a> 
  <a href="#"><h4><i class="fa fa-fw fa-search"></i> Search</h4></a> 
  <a href="#"><h4><i class="fa fa-fw fa-envelope"></i> Contact</h4></a> 
  <a href="#"><h4><i class="fa fa-fw fa-user"></i> Login as Manager</h4></a>
  <a href="account.php"><h4><i class="fa fa-fw fa-user"></i>Sign up/Login as User</h4></a>
  <a href="splogin.php"><h4><i class="fa fa-fw fa-user"></i> Login as Catering</h4></a> 
  <a href="d_login.php"><h4><i class="fa fa-fw fa-user"></i> Login as Decorator</h4></a> 
</div>

<div class="navbar">
<p>Rialto Events and Rentals</p>
</div>

</body>
</html> 
