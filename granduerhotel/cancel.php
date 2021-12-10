<?php

	include_once 'header.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cancellation</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-image2" style="padding-bottom: 30px;">
	<div class="cancel">
		<div class="form-pg">

			<?php

			if (isset($_GET['errors'])) {
				if ($_GET['errors'] == "emptyfields") {
					echo '<p class="bookerror">Fill in your email !</p>';
				}
				
				else if ($_GET['errors'] == "invalidemail") {
					echo '<p class="bookerror">Enter valid email !</p>';
				}
			}
			else if (isset($_GET['cancelbooking'])) {

				if ($_GET['cancelbooking'] == "success") {

					echo "<script>window.open('cancel_success.php', '_self');</script>";
				}
			}
		?>
			<form method="POST" action="includes/cancelbooking-db.php">
				<fieldset>
					<legend><span class="number">1 </span> Booking Cancellation </legend>
					<label style="font-weight: lighter; color: #ccc;">Use Your Email To Cancel Your Booking</label>
					<br>
					<label>Email:</label>
					<input type="email" name="email" placeholder="Your Email *">
				</fieldset>
				<input type="submit" name="submit" value="Cancel Booking">
			</form>
		</div>

		<div class="form-pg">
			<?php 

			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") {
					echo '<p class="bookerror">Fill in your email !</p>';
				}
				
				else if ($_GET['error'] == "invalidemail") {
					echo '<p class="bookerror">Enter valid email !</p>';
				}
			}
			else if (isset($_GET['cancelreserve'])) {

				if ($_GET['cancelreserve'] == "success") {

					echo "<script>window.open('cancel_success.php', '_self');</script>";
				}
			} 
		?>
			<form method="POST" action="includes/cancelreserve-db.php">
				<fieldset>
					<legend><span class="number">2 </span> Reservation Cancellation </legend>
					<label style="font-weight: lighter; color: #ccc;">Use Your Email To Cancel Your Reservation</label>
					<br>
					<label>Email:</label>
					<input type="email" name="email" placeholder="Your Email *">
				</fieldset>
				<input type="submit" name="submit" value="Cancel Reservation">
			</form>
		</div>
	</div>
	
</body>
</html>

<?php

	include_once 'footer.php';

?>