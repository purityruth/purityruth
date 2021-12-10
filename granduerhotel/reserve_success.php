<?php

	include_once 'header.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>Booking success</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<body class="bg-image4" style="padding-bottom: 30px;">
		<div class="res">
		<div class="form-pg">
			<form method="POST" action="includes/reserve-db.php">
				<fieldset class="rese">
					<label class="reservelabel" style="padding-bottom: 30px;">Reservation Successful!</label>
				</fieldset>
				<fieldset rese2>
					<label class="reservelabel2">Thankyou for reserving with us!</label>
					<label class="reservelabel2">Visit the reception with your details on arrival.</label>
				</fieldset>

			</form>
		</div>
		</div>
</body>
</html>

<?php

	include_once 'footer.php';

?>
