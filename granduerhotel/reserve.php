<?php

	include_once 'header.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Reserve</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-image1" style="padding-bottom: 30px;">
	<div class="form-pg">

		<?php

			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") {
					echo '<p class="bookerror">Fill in all fields !</p>';
				}
				
				else if ($_GET['error'] == "invalidemail") {
					echo '<p class="bookerror">Enter valid email !</p>';
				}
				else if ($_GET['error'] == "invalidnameformat") {
					echo '<p class="bookerror">Enter valid name !</p>';
				}
				else if ($_GET['error'] == "invalidphonenumber") {
					echo '<p class="bookerror">Enter valid phone number !</p>';
				}
				else if ($_GET['error'] == "usertaken") {
					echo '<p class="bookerror">Username is taken. Try again !</p>';
				}
				/*else {
					echo "<script>window.open('booking_success.php', '_self');</script>";
				}*/
			}
			else if (isset($_GET['reserve'])) {

				if ($_GET['reserve'] == "success") {

					echo "<script>window.open('reserve_success.php', '_self');</script>";
				}
			}
		?>

		<form method="POST" action="includes/reserve-db.php">
			<fieldset>
				<legend><span class="number">1 </span> Reservation Info </legend>
				<label>Name:</label>
				<input type="text" name="fname" placeholder="Your Name *">
				<label>Email:</label>
				<input type="email" name="email" placeholder="Your Email *">
				<label>Phone Number:</label>
				<input type="text" name="pnum" placeholder="Your Phone Number *">
				<label>Reservation Type:</label>
				<select name="reserve">
					<optgroup label="reserve">
						<option value="conference">Conference</option>
						<option value="restaurant">Restaurant</option>
						<option value="playground">Playground</option>
						<option value="swimming">Swimming</option>
						<option value="teambuilding">Team Building</option>
					</optgroup>
				</select>
				<label>Number Of Guests</label>
				<input type="number" name="guests" min="1" value="1">
				<label>Time:</label>
				<input type="time" name="timein">
			</fieldset>
			<fieldset>
				<legend><span class="number">2 </span>Additional Info</legend>
				<textarea name="add-info" placeholder="Any more details for your booking (optional)."></textarea>

			</fieldset>
			<input type="submit" name="submit" value="Reserve Now">

		</form>
	</div>
</body>
</html>

<?php

	include_once 'footer.php';

?>