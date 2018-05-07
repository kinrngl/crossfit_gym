<?php
	if(isset($_POST['msg'])){
		if(strcmp($_POST['msg'],'login')==0){
			loginAcct();
		}else if(strcmp($_POST['msg'],'signup')==0){
			registerAcct();
		}
	}

	function loginAcct(){
		include('conn.php');
		session_start();

		$username = $_POST['username'];
		$password = $_POST['password'];

		$stm = "SELECT * FROM `member` WHERE username='".$username."' AND password='".$password."' AND status='active'";

		if($res=mysqli_query($conn,$stm)){
			$rows = mysqli_fetch_assoc($res);
			if(strcmp($rows['username'],$username)==0 && strcmp($rows['password'],$password)==0){
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['user_id'] = $rows['id'];
			}
			header('Location: http://localhost/crossfitGym/');
		}else{
			echo "Something wrong with the input or the system. Try Again!";
		}

		mysqli_close($conn);
	}

	function registerAcct(){
		include('conn.php');

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$bday = $_POST['bday'];
		$username = $_POST['username'];
		$gender = $_POST['gender'];
		$password = $_POST['password'];

		$stm = "INSERT INTO `member`(`id`, `fname`, `lname`, `birthdate`, `contact_num`, `email`, `gender`, `username`, `password`, `status`, `type`) VALUES (null,'".$fname."','".$lname."','".$bday."','".$contact."','".$email."','".$gender."','".$username."','".$password."','active','regular')";

		if(mysqli_query($conn,$stm)){
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['user_id'] = $password;

			$stm = "SELECT * FROM `member` WHERE username='".$username."' AND password='".$password."'";

			if($res = mysqli_query($conn,$stm)){
				$row = mysqli_fetch_assoc($res);
				$_SESSION['user_id'] = $row['id'];
			}

			header("Location: http://localhost/crossfitGym/index.php");
		}
		
	}

?>