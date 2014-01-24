<?php
if($_POST)
	{
	include 'headers/connect_to_mysql.php';
	$username = $_POST['user'];
$password = $_POST['pass'];

 // Connects to your Database  
 $data = mysqli_query($con,"SELECT * FROM user where username ='".$username."' and password='".$password."'") 
 or die(mysqli_error());  

$count=mysqli_num_rows($data);

if($count==1){
 
session_start();
$_SESSION['username'] = $username;
header("location:index.php");
}
else {
echo "Wrong Username or Password";
}
	}
	
	?>

<!DOCTYPE html>
<!-- saved from url=(0066)file:///C:/Users/-/Desktop/Signin%20Template%20for%20Bootstrap.htm -->
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">
<title>QuizUp-Signin</title>

<!-- Bootstrap core CSS -->
<link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
  <form class="form-signin" role="form" action="login.php" method="post">
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="text" class="form-control" id="user" name="user" placeholder="User Id" required autofocus >
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
    <label class="checkbox">
      <input type="checkbox" value="remember-me">
      Remember me </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>
</div>
<!-- /container --> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="./Signin Template for Bootstrap_files/contentScript.js" id="InsectID"></script>
</body>
</html>