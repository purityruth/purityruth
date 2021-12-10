<?php

	if (isset($_POST['submit'])) {
		
		require 'dbh_inc.php';

		$email = $_POST['email'];
		$mail = $_POST['mail'];
		$pnum = $_POST['pnum'];
		$sms = $_POST['sms'];
		

		if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match("/^[a-zA-Z0-9]*$/", $email))) {
			header("Location: ../contact.php?error=invalidemail&email=" .$email. "&mail=" .$mail. "&pnum=" .$pnum. "&sms=" .$sms);
			exit();
		}
		
		elseif (!preg_match("/^[0-9]*$/", $pnum)) {
			header("Location: ../contact.php?error=invalidphonenumber&email=" .$email. "&mail=" .$mail."&pnum=" .$pnum. "&sms=" .$sms);
			exit();
		}

		else
		{
			//Compiling user's information with database while using prepared statements
			$sql = "SELECT * FROM contact WHERE Email=?";
			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../contact.php?error=sql error");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt, "s", $name);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);

				if ($resultCheck > 0) {
					header("Location: ../contact.php?error=invalid=" .$email. "&mail=" .$mail."&pnum=" .$pnum. "&sms=" .$sms);
				 	exit();
				}
				else 
				{
					$sql = "INSERT INTO contact (Email, Mail, Pnum, Sms) VALUES (?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);

					if (!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location: ../contact.php?error=sql error");
						exit();
					}
					else {
						mysqli_stmt_bind_param($stmt, "ssss", $email, $mail, $pnum, $sms);
						mysqli_stmt_execute($stmt);
						header("Location: ../contact.php?contact=success");
						exit();
					}
				}
			}
		}

	}
	else {
	header("Location: ../contact.php?error=contact error");
	exit();
}