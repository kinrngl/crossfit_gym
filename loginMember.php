<?php 
  include('C:\xampp2\htdocs\crossfitGym\backend\model_member.php'); 
  session_start();

  if(isset($_SESSION['username']) && isset($_SESSION['password'])){
    header('Location:index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login: CrossFit Studio Gym</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

  <?php include('navbar.php'); ?>
    
  <div class="container">
    <center>
    	<h3>Welcome to Crossfit Gym</h3>
    	<br>
	    <form action="" method="POST">
	    	<input type="text" name="username" placeholder="Username" required/><br><br>
	    	<input type="password" name="password" placeholder="Password" required/><br><br>

	    	<input type="submit" name="msg" value="login">
	    </form>
    </center>
  </div>

</body>
</html>
