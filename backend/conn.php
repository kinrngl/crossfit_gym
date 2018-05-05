<?php
	$conn = mysqli_connect('localhost','root','','gym_db');

	if(mysqli_connect_errno()){
		echo "Failed to connect with database".mysqli_connect_err(); 
	}
?>