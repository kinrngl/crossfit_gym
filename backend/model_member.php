<?php
	if(isset($_POST['msg'])){
		if(strcmp($_POST['msg'],'login')==0){
			loginAcct();
		}else if(strcmp($_POST['msg'],'login')==0){
			logoutAcct();
		}
	}

	function loginAcct(){
		include('conn.php');
		session_start();

		$username = $_POST['username'];
		$password = $_POST['password'];

		$stm = "SELECT * FROM `member` WHERE username='".$username."' AND password='".$password."'";

		if($res = mysqli_query($conn,$stm)){
			$row = mysqli_fetch_assoc($res);
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			echo "Successfully Login!!!";
		}else{
			echo "Something wrong with the input or the system. Try Again!";
		}

		mysqli_close($conn);
	}

	function logoutAcct(){
		session_unset();
		session_destroy();

		header('loginMember.php');
	}
?>