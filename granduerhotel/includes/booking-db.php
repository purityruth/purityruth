<?php

	if (isset($_POST['submit'])) {
		
		require 'dbh_inc.php';

		$name = $_POST['fname'];
		$email = $_POST['email'];
		$pnum = $_POST['pnum'];
		$rooms = $_POST['rooms'];
		$room_no = $_POST['room-no'];
		$meals = $_POST['meals'];
		$checkin = $_POST['checkin'];
		$checkout = $_POST['checkout'];
		$addinfo = $_POST['add-info'];

		$book_id = rand();

		//Checking for empty slots
		if (empty($name) || empty($email) || empty($pnum) || empty($checkin) || empty($checkout)) {
			header("Location: ../booking.php?error=emptyfields&name=" .$name. "&email=" .$email. "&pnum=" .$pnum. "&rooms=" .$rooms. "&room_no=" .$room_no. "&meals=" .$meals. "&checkin=" .$checkin. "&checkout=" .$checkout. "&addinfo=" .$addinfo);
			exit();
		}
		elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match("/^[a-zA-Z0-9]*$/", $email))) {
			header("Location: ../booking.php?error=invalidemail&name=" .$name. "&pnum=" .$pnum. "&rooms=" .$rooms. "&room_no=" .$room_no. "&meals=" .$meals. "&checkin=" .$checkin. "&checkout=" .$checkout. "&addinfo=" .$addinfo);
			exit();
		}
		elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
			header("Location: ../booking.php?error=invalidnameformat&email=" .$email. "&pnum=" .$pnum. "&rooms=" .$rooms. "&room_no=" .$room_no. "&meals=" .$meals. "&checkin=" .$checkin. "&checkout=" .$checkout. "&addinfo=" .$addinfo);
			exit();
		}
		elseif (!preg_match("/^[0-9]*$/", $pnum)) {
			header("Location: ../booking.php?error=invalidphonenumber&name=" .$name. "&email=" .$email."&rooms=" .$rooms. "&room_no=" .$room_no. "&meals=" .$meals. "&checkin=" .$checkin. "&checkout=" .$checkout. "&addinfo=" .$addinfo);
			exit();
		}

		else
		{
			//Compiling user's information with database while using prepared statements
			$sql = "SELECT * FROM booking WHERE Name=?";
			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../booking.php?error=sql error");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt, "s", $name);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);

				if ($resultCheck > 0) {
					header("Location: ../booking.php?error=usertaken&name=" .$name. "&email=" .$email."&rooms=" .$rooms. "&room_no=" .$room_no. "&meals=" .$meals. "&checkin=" .$checkin. "&checkout=" .$checkout. "&addinfo=" .$addinfo);
				 	exit();
				}
				else 
				{
					$sql = "INSERT INTO booking (Name, Email, Phone, Roomtype, Noofrooms, Mealplan, Checkin, Checkout, Addinfo, Bookid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);

					if (!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location: ../booking.php?error=sql error");
						exit();
					}
					else {
						mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $email, $pnum, $rooms, $room_no, $meals, $checkin, $checkout, $addinfo, $book_id);
						mysqli_stmt_execute($stmt);
						header("Location: ../booking.php?booking=success");
						exit();
					}
				}
			}
		}

	}
	else {
	header("Location: ../booking.php?error=booking error");
	exit();
}