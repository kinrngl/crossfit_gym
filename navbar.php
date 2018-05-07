<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Crossfit Studio Gym</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li class="active"><a href="#">Workout Packages</a></li>
      <li class="active"><a href="#">Trainers</a></li>
      <li class="active"><a href="#">About Us</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">

      <?php
          if(isset($_SESSION['username'])){
            echo '<li><a href="profileMember.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>';
            echo '<li><a href="backend/logoutMember.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
          }else{
            echo '<li><a href="loginMember.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
            echo '<li><a href="signupMember.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
          }
      ?>
      
    </ul>
  </div>
</nav>
