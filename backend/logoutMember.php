<?php
	session_start();

	if(isset($_SESSION['username']) && isset($_SESSION['password'])){
		session_unset();
		session_destroy();
		header('location: http://localhost/crossfitGym');
	}
?>