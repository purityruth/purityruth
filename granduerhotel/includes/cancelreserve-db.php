<?php

	if (isset($_POST['submit'])) {
		
		require 'dbh_inc.php';

		$email = $_POST['email'];

		//Checking for empty slots
		if (empty($email)) {
			header("Location: ../cancel.php?error=emptyfields");
			exit();
		}
		elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match("/^[a-zA-Z0-9]*$/", $email))) 
		{
			header("Location: ../cancel.php?error=invalidemail");
			exit();
		}
		else
		{
			//Compiling user's information with database while using prepared statements
			$sql = "DELETE FROM reserve WHERE Email = '$email'";

			$run = mysqli_query($conn, $sql);
			if (! $run) {
				header("Location: ../cancel.php?error=sqlerror");
				exit();
			}
			else {
				header("Location: ../cancel.php?cancelreserve=success");
				exit();
			}
		}

	}
	else {
	header("Location: ../cancel.php?error=cancel error");
	exit();
	}