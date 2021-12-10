<?php

	if (isset($_POST['submit'])) {
		
		require 'dbh_inc.php';

		$email = $_POST['email'];

		//Checking for empty slots
		if (empty($email)) {
			header("Location: ../cancel.php?errors=emptyfields");
			exit();
		}
		elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match("/^[a-zA-Z0-9]*$/", $email))) 
		{
			header("Location: ../cancel.php?errors=invalidemail");
			exit();
		}
		else
		{
			//Compiling user's information with database while using prepared statements
			$sql = "DELETE FROM booking WHERE Email = '$email'";

			$run = mysqli_query($conn, $sql);
			if (! $run) {
				header("Location: ../cancel.php?errors=sqlerror");
				exit();
			}
			else {
				header("Location: ../cancel.php?cancelbooking=success");
				exit();
			}
		}

	}
	else {
	header("Location: ../cancel.php?error=cancel error");
	exit();
	}