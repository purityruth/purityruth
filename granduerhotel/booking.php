<?php

	include_once 'header.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<!-- Internal Styling for booking page -->

	<!--<style type="text/css">
		body
		{
			margin-top: 10.5em;
		}
		.bg-image
		{
			background-image: url(img/room.jpg);
			background-size: cover;
			background-position: center;
			height: 100vh;
		}
		.booking-form
		{
			max-width: 600px;
			padding: 10px 20px;
			margin: 5px auto;
			margin-top: 10em;
			padding: 20px;
			background: #f4f7f8;
			border-radius: 8px;
			font-family: Georgia, "Times New Roman", Times, serif;
		}
		.booking-form fieldset
		{
			border: none;
		}
		.booking-form legend 
		{
			font-size: 1.4em;
			margin-bottom: 5px;
		}
		.booking-form label 
		{
			display: block;
			margin-bottom: 5px;
		}

	</style> -->
</head>
<body class="bg-image" style="padding-bottom: 30px;">
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
			else if (isset($_GET['booking'])) {

				if ($_GET['booking'] == "success") {

					echo "<script>window.open('booking_success.php', '_self');</script>";
				}
			}
		?>
		<form method="POST" action="includes/booking-db.php">
			<fieldset>
				<legend><span class="number">1 </span> Booking Info </legend>
				<label>Name:</label>
				<input type="text" name="fname" placeholder="Your Name *">
				<label>Email:</label>
				<input type="email" name="email" placeholder="Your Email *">
				<label>Phone Number:</label>
				<input type="text" name="pnum" placeholder="Your Phone Number *">
				<label>Room Type:</label>
				<select name="rooms">
					<optgroup label="rooms">
						<option value="standard">Standard</option>
						<option value="executive">Executive</option>
					</optgroup>
				</select>
				<label>Number Of Rooms</label>
				<input type="number" name="room-no" min="1" value="1">
				<label>Meal Plan:</label>
				<select name="meals">
					<optgroup label="meals">
						<option value="breakfast">Breakfast</option>
						<option value="lunch">Lunch</option>
						<option value="dessert">Dessert</option>
						<option value="dinner">Dinner</option>
						<option value="roomonly">Room Only</option>
						<option value="fullboard">Full Board</option>
					</optgroup>
				</select>
				<label>Check-In Date:</label>
				<input type="date" name="checkin">
				<label>Check-Out Date:</label>
				<input type="date" name="checkout">
			</fieldset>
			<fieldset>
				<legend><span class="number">2 </span>Additional Info</legend>
				<textarea name="add-info" placeholder="Any more details for your booking (optional)."></textarea>

			</fieldset>
			<input type="submit" name="submit" value="Book Now">

		</form>
	</div>
</body>
</html>

<?php

	include_once 'footer.php';

?>