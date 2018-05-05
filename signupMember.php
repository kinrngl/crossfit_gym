<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Account: CrossFit Studio Gym</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

  <?php include('navbar.php'); ?>
    
  <div class="container">
    <center>
    	<h3>Create Account</h3>
    	<br>
	    <form action="bEnd/member_signUp.php" method="POST">
        <input type="text" name="fname" placeholder="First Name" required/><br><br>
        <input type="text" name="lname" placeholder="Last Name" required/><br><br>
        <input type="text" name="contact" placeholder="Contact Number" required/><br><br>
        <input type="text" name="email" placeholder="Email" required/><br><br>
        <label>Birthdate</label><input type="date" name="bday" placeholder="Birthday" required/><br><br>
        <label>Gender</label><select name="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
        <br><br>
        <input type="text" name="username" placeholder="Username" required/><br><br>
        <input type="text" name="password" placeholder="Password" required/><br><br>  
        <br><br>
        <input type="submit">
      </form>
    </center>
  </div>

</body>
</html>
