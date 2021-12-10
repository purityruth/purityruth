<?php

	include_once 'header.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-image1" style="padding-bottom: 30px;">
	<div class="form-pg">
		<?php

			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") {
					echo '<p class="bookerror">Fill in email and subject !</p>';
				}
				
				else if ($_GET['error'] == "invalidemail") {
					echo '<p class="bookerror">Enter valid email !</p>';
				}
				else if ($_GET['error'] == "invalidphonenumber") {
					echo '<p class="bookerror">Enter valid phone number !</p>';
				}
				
			}
			else if (isset($_GET['contact'])) {

				if ($_GET['contact'] == "success") {

					echo '<p class="booksuccess"> Sent !</p>';
				}
			}
		?>
		<form method="POST" action="includes/contact-db.php">
			<fieldset>
				<legend><span class="number">1 </span> Contact Form </legend>
				<label>To:</label>
				<input disabled type="text" name="fname" placeholder="granduerhotel@gmail.com">
				<label>From:</label>
				<input type="email" name="email" placeholder="Your Email *">
				<label>Subject:</label>
				<br>
				<textarea name="mail" placeholder="Type your subject."></textarea>
				<br>
			</fieldset>
			<input type="submit" name="submit" value="Send Email">
			<br>
			<br>
			<fieldset>
				<legend><span class="number">2 </span>SMS Message / Enquiry</legend>
				<label>Phone Number:</label>
				<input type="text" name="pnum" placeholder="Your Phone Number *">
				<br>
				<label>Message:</label>
				<textarea name="sms" placeholder="Type your message here."></textarea>
				<br>
			</fieldset>
			<input type="submit" name="submit" value="Send SMS">
			
			<br>
			<br>
			<fieldset>
				<legend><span class="number">3 </span> Call Our Office </legend>
				<label>Our Office Number:</label>
				<input disabled type="text" name="num" placeholder="+254746862634 / +254723557900">
			</fieldset>
		</form>
	</div>
</body>
</html>

<?php

	include_once 'footer.php';

?>