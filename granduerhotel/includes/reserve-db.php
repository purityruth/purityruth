<?php

	if (isset($_POST['submit'])) {
		
		require 'dbh_inc.php';

		$name = $_POST['fname'];
		$email = $_POST['email'];
		$pnum = $_POST['pnum'];
		$reserve = $_POST['reserve'];
		$guests = $_POST['guests'];
		$time = $_POST['timein'];
		$addinfo = $_POST['add-info'];

		$reserve_id = rand();

		//Checking for empty slots
		if (empty($name) || empty($email) || empty($pnum) || empty($time)) {
			header("Location: ../reserve.php?error=emptyfields&name=" .$name. "&email=" .$email. "&pnum=" .$pnum. "&reserve=" .$reserve. "&guests=" .$guests. "&time=" .$time. "&addinfo=" .$addinfo);
			exit();
		}
		elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match("/^[a-zA-Z0-9]*$/", $email))) {
			header("Location: ../reserve.php?error=invalidemail&name=" .$name. "&pnum=" .$pnum. "&reserve=" .$reserve. "&guests=" .$guests. "&time=" .$time. "&addinfo=" .$addinfo);
			exit();
		}
		elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
			header("Location: ../reserve.php?error=invalidnameformat&email=" .$email. "&pnum=" .$pnum. "&reserve=" .$reserve. "&guests=" .$guests. "&time=" .$time. "&addinfo=" .$addinfo);
			exit();
		}
		elseif (!preg_match("/^[0-9]*$/", $pnum)) {
			header("Location: ../reserve.php?error=invalidphonenumber&name=" .$name. "&email=" .$email. "&reserve=" .$reserve. "&guests=" .$guests. "&time=" .$time. "&addinfo=" .$addinfo);
			exit();
		}
		else
		{
			//Compiling user's information with database while using prepared statements
			$sql = "SELECT * FROM reserve WHERE Name=?";
			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../reserve.php?error=sql error");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt, "s", $name);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);

				if ($resultCheck > 0) {
					header("Location: ../reserve.php?error=usertaken&name=" .$name. "&email=" .$email. "&reserve=" .$reserve. "&guests=" .$guests. "&time=" .$time. "&addinfo=" .$addinfo);
				 	exit();
				}
				else 
				{
					$sql = "INSERT INTO reserve (Name, Email, Phonenumber, Reservetype, Noofguests, Timereserve, Addinfo, Reserveid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);

					if (!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location: ../reserve.php?error=sql error");
						exit();
					}
					else {
						mysqli_stmt_bind_param($stmt, "ssssssss", $name, $email, $pnum, $reserve, $guests, $time, $addinfo, $reserve_id);
						mysqli_stmt_execute($stmt);
						header("Location: ../reserve.php?reserve=success");
						exit();
					}
				}
			}
		}

	}
	else {
	header("Location: ../reserve.php?error=reserve error");
	exit();
}